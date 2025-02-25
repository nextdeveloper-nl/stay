<?php

namespace NextDeveloper\Stay\Services\AbstractServices;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use NextDeveloper\IAM\Helpers\UserHelper;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Commons\Helpers\DatabaseHelper;
use NextDeveloper\Commons\Database\Models\AvailableActions;
use NextDeveloper\Stay\Database\Models\ProductGroups;
use NextDeveloper\Stay\Database\Filters\ProductGroupsQueryFilter;
use NextDeveloper\Commons\Exceptions\ModelNotFoundException;
use NextDeveloper\Events\Services\Events;
use NextDeveloper\Commons\Exceptions\NotAllowedException;

/**
 * This class is responsible from managing the data for ProductGroups
 *
 * Class ProductGroupsService.
 *
 * @package NextDeveloper\Stay\Database\Models
 */
class AbstractProductGroupsService
{
    public static function get(ProductGroupsQueryFilter $filter = null, array $params = []) : Collection|LengthAwarePaginator
    {
        $enablePaginate = array_key_exists('paginate', $params);

        $request = new Request();

        /**
        * Here we are adding null request since if filter is null, this means that this function is called from
        * non http application. This is actually not I think its a correct way to handle this problem but it's a workaround.
        *
        * Please let me know if you have any other idea about this; baris.bulut@nextdeveloper.com
        */
        if($filter == null) {
            $filter = new ProductGroupsQueryFilter($request);
        }

        $perPage = config('commons.pagination.per_page');

        if($perPage == null) {
            $perPage = 20;
        }

        if(array_key_exists('per_page', $params)) {
            $perPage = intval($params['per_page']);

            if($perPage == 0) {
                $perPage = 20;
            }
        }

        if(array_key_exists('orderBy', $params)) {
            $filter->orderBy($params['orderBy']);
        }

        $model = ProductGroups::filter($filter);

        if($enablePaginate) {
            //  We are using this because we have been experiencing huge security problem when we use the paginate method.
            //  The reason was, when the pagination method was using, somehow paginate was discarding all the filters.
            return new \Illuminate\Pagination\LengthAwarePaginator(
                $model->skip(($request->get('page', 1) - 1) * $perPage)->take($perPage)->get(),
                $model->count(),
                $perPage,
                $request->get('page', 1)
            );
        }

        return $model->get();
    }

    public static function getAll()
    {
        return ProductGroups::all();
    }

    /**
     * This method returns the model by looking at reference id
     *
     * @param  $ref
     * @return mixed
     */
    public static function getByRef($ref) : ?ProductGroups
    {
        return ProductGroups::findByRef($ref);
    }

    public static function getActions()
    {
        $model = ProductGroups::class;

        $model = Str::remove('Database\\Models\\', $model);

        $actions = AvailableActions::where('input', $model)
            ->get();

        return $actions;
    }

    /**
     * This method initiates the related action with the given parameters.
     */
    public static function doAction($objectId, $action, ...$params)
    {
        $object = ProductGroups::where('uuid', $objectId)->first();

        $action = AvailableActions::where('name', $action)->first();
        $class = $action->class;

        if(class_exists($class)) {
            $action = new $class($object, $params);
            dispatch($action);

            return $action->getActionId();
        }

        return null;
    }

    /**
     * This method returns the model by lookint at its id
     *
     * @param  $id
     * @return ProductGroups|null
     */
    public static function getById($id) : ?ProductGroups
    {
        return ProductGroups::where('id', $id)->first();
    }

        /**
         * This method returns the model by looking at its external id
         *
         * @param  $externalId
         * @return ProductGroups|null
         */
    public static function getByExternalId($externalId) : ?ProductGroups
    {
        return ProductGroups::where('external_id', $externalId)->first();
    }
    
    /**
     * This method returns the sub objects of the related models
     *
     * @param  $uuid
     * @param  $object
     * @return void
     * @throws \Laravel\Octane\Exceptions\DdException
     */
    public static function relatedObjects($uuid, $object)
    {
        try {
            $obj = ProductGroups::where('uuid', $uuid)->first();

            if(!$obj) {
                throw new ModelNotFoundException('Cannot find the related model');
            }

            if($obj) {
                return $obj->$object;
            }
        } catch (\Exception $e) {
            dd($e);
        }
    }

    /**
     * This method created the model from an array.
     *
     * Throws an exception if stuck with any problem.
     *
     * @param  array $data
     * @return mixed
     * @throw  Exception
     */
    public static function create(array $data)
    {
        if (array_key_exists('parent_id', $data)) {
            $data['parent_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\Parents',
                $data['parent_id']
            );
        }
        if (array_key_exists('zone_id', $data)) {
            $data['zone_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\Zones',
                $data['zone_id']
            );
        }
        if (array_key_exists('channel_id', $data)) {
            $data['channel_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\Channels',
                $data['channel_id']
            );
        }
        if (array_key_exists('provider_id', $data)) {
            $data['provider_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\Providers',
                $data['provider_id']
            );
        }
        if (array_key_exists('price_list_id', $data)) {
            $data['price_list_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\PriceLists',
                $data['price_list_id']
            );
        }
        if (array_key_exists('delegation_id', $data)) {
            $data['delegation_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\Delegations',
                $data['delegation_id']
            );
        }
        if (array_key_exists('client_id', $data)) {
            $data['client_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\Clients',
                $data['client_id']
            );
        }
        if (array_key_exists('origin_zone_id', $data)) {
            $data['origin_zone_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\OriginZones',
                $data['origin_zone_id']
            );
        }
        if (array_key_exists('iam_account_id', $data)) {
            $data['iam_account_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\IAM\Database\Models\Accounts',
                $data['iam_account_id']
            );
        }
            
        if(!array_key_exists('iam_account_id', $data)) {
            $data['iam_account_id'] = UserHelper::currentAccount()->id;
        }
        if (array_key_exists('iam_user_id', $data)) {
            $data['iam_user_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\IAM\Database\Models\Users',
                $data['iam_user_id']
            );
        }
                    
        if(!array_key_exists('iam_user_id', $data)) {
            $data['iam_user_id']    = UserHelper::me()->id;
        }
            
        try {
            $model = ProductGroups::create($data);
        } catch(\Exception $e) {
            throw $e;
        }

        Events::fire('created:NextDeveloper\Stay\ProductGroups', $model);

        return $model->fresh();
    }

    /**
     * This function expects the ID inside the object.
     *
     * @param  array $data
     * @return ProductGroups
     */
    public static function updateRaw(array $data) : ?ProductGroups
    {
        if(array_key_exists('id', $data)) {
            return self::update($data['id'], $data);
        }

        return null;
    }

    /**
     * This method updated the model from an array.
     *
     * Throws an exception if stuck with any problem.
     *
     * @param
     * @param  array $data
     * @return mixed
     * @throw  Exception
     */
    public static function update($id, array $data)
    {
        $model = ProductGroups::where('uuid', $id)->first();

        if(!$model) {
            throw new NotAllowedException(
                'We cannot find the related object to update. ' .
                'Maybe you dont have the permission to update this object?'
            );
        }

        if (array_key_exists('parent_id', $data)) {
            $data['parent_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\Parents',
                $data['parent_id']
            );
        }
        if (array_key_exists('zone_id', $data)) {
            $data['zone_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\Zones',
                $data['zone_id']
            );
        }
        if (array_key_exists('channel_id', $data)) {
            $data['channel_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\Channels',
                $data['channel_id']
            );
        }
        if (array_key_exists('provider_id', $data)) {
            $data['provider_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\Providers',
                $data['provider_id']
            );
        }
        if (array_key_exists('price_list_id', $data)) {
            $data['price_list_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\PriceLists',
                $data['price_list_id']
            );
        }
        if (array_key_exists('delegation_id', $data)) {
            $data['delegation_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\Delegations',
                $data['delegation_id']
            );
        }
        if (array_key_exists('client_id', $data)) {
            $data['client_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\Clients',
                $data['client_id']
            );
        }
        if (array_key_exists('origin_zone_id', $data)) {
            $data['origin_zone_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\OriginZones',
                $data['origin_zone_id']
            );
        }
        if (array_key_exists('iam_account_id', $data)) {
            $data['iam_account_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\IAM\Database\Models\Accounts',
                $data['iam_account_id']
            );
        }
        if (array_key_exists('iam_user_id', $data)) {
            $data['iam_user_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\IAM\Database\Models\Users',
                $data['iam_user_id']
            );
        }
    
        Events::fire('updating:NextDeveloper\Stay\ProductGroups', $model);

        try {
            $isUpdated = $model->update($data);
            $model = $model->fresh();
        } catch(\Exception $e) {
            throw $e;
        }

        Events::fire('updated:NextDeveloper\Stay\ProductGroups', $model);

        return $model->fresh();
    }

    /**
     * This method updated the model from an array.
     *
     * Throws an exception if stuck with any problem.
     *
     * @param
     * @param  array $data
     * @return mixed
     * @throw  Exception
     */
    public static function delete($id)
    {
        $model = ProductGroups::where('uuid', $id)->first();

        if(!$model) {
            throw new NotAllowedException(
                'We cannot find the related object to delete. ' .
                'Maybe you dont have the permission to update this object?'
            );
        }

        Events::fire('deleted:NextDeveloper\Stay\ProductGroups', $model);

        try {
            $model = $model->delete();
        } catch(\Exception $e) {
            throw $e;
        }

        return $model;
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}
