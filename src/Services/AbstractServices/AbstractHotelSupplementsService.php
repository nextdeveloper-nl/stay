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
use NextDeveloper\Stay\Database\Models\HotelSupplements;
use NextDeveloper\Stay\Database\Filters\HotelSupplementsQueryFilter;
use NextDeveloper\Commons\Exceptions\ModelNotFoundException;
use NextDeveloper\Events\Services\Events;
use NextDeveloper\Commons\Exceptions\NotAllowedException;

/**
 * This class is responsible from managing the data for HotelSupplements
 *
 * Class HotelSupplementsService.
 *
 * @package NextDeveloper\Stay\Database\Models
 */
class AbstractHotelSupplementsService
{
    public static function get(HotelSupplementsQueryFilter $filter = null, array $params = []) : Collection|LengthAwarePaginator
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
            $filter = new HotelSupplementsQueryFilter($request);
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

        $model = HotelSupplements::filter($filter);

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
        return HotelSupplements::all();
    }

    /**
     * This method returns the model by looking at reference id
     *
     * @param  $ref
     * @return mixed
     */
    public static function getByRef($ref) : ?HotelSupplements
    {
        return HotelSupplements::findByRef($ref);
    }

    public static function getActions()
    {
        $model = HotelSupplements::class;

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
        $object = HotelSupplements::where('uuid', $objectId)->first();

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
     * @return HotelSupplements|null
     */
    public static function getById($id) : ?HotelSupplements
    {
        return HotelSupplements::where('id', $id)->first();
    }

        /**
         * This method returns the model by looking at its external id
         *
         * @param  $externalId
         * @return HotelSupplements|null
         */
    public static function getByExternalId($externalId) : ?HotelSupplements
    {
        return HotelSupplements::where('external_id', $externalId)->first();
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
            $obj = HotelSupplements::where('uuid', $uuid)->first();

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
        if (array_key_exists('stay_hotel_supplement_type_id', $data)) {
            $data['stay_hotel_supplement_type_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\Stay\Database\Models\HotelSupplementTypes',
                $data['stay_hotel_supplement_type_id']
            );
        }
        if (array_key_exists('stay_provider_id', $data)) {
            $data['stay_provider_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\Stay\Database\Models\Providers',
                $data['stay_provider_id']
            );
        }
        if (array_key_exists('stay_product_group_id', $data)) {
            $data['stay_product_group_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\Stay\Database\Models\ProductGroups',
                $data['stay_product_group_id']
            );
        }
        if (array_key_exists('stay_sale_contract_id', $data)) {
            $data['stay_sale_contract_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\Stay\Database\Models\SaleContracts',
                $data['stay_sale_contract_id']
            );
        }
        if (array_key_exists('stay_rate_id', $data)) {
            $data['stay_rate_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\Stay\Database\Models\Rates',
                $data['stay_rate_id']
            );
        }
        if (array_key_exists('stay_hotel_supplement_class_id', $data)) {
            $data['stay_hotel_supplement_class_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\Stay\Database\Models\HotelSupplementClasses',
                $data['stay_hotel_supplement_class_id']
            );
        }
        if (array_key_exists('parent_stay_hotel_supplement_id', $data)) {
            $data['parent_stay_hotel_supplement_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\ParentStayHotelSupplements',
                $data['parent_stay_hotel_supplement_id']
            );
        }
        if (array_key_exists('base_regime_id', $data)) {
            $data['base_regime_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\BaseRegimes',
                $data['base_regime_id']
            );
        }
        if (array_key_exists('base_room_type_id', $data)) {
            $data['base_room_type_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\BaseRoomTypes',
                $data['base_room_type_id']
            );
        }
        if (array_key_exists('stay_offer_supplement_type_id', $data)) {
            $data['stay_offer_supplement_type_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\Stay\Database\Models\OfferSupplementTypes',
                $data['stay_offer_supplement_type_id']
            );
        }
        if (array_key_exists('base_supplement_type_id', $data)) {
            $data['base_supplement_type_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\BaseSupplementTypes',
                $data['base_supplement_type_id']
            );
        }
        if (array_key_exists('regime_change_from_id', $data)) {
            $data['regime_change_from_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\RegimeChangeFroms',
                $data['regime_change_from_id']
            );
        }
        if (array_key_exists('regime_change_to_id', $data)) {
            $data['regime_change_to_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\RegimeChangeTos',
                $data['regime_change_to_id']
            );
        }
        if (array_key_exists('room_upgrade_from_id', $data)) {
            $data['room_upgrade_from_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\RoomUpgradeFroms',
                $data['room_upgrade_from_id']
            );
        }
        if (array_key_exists('room_upgrade_to_id', $data)) {
            $data['room_upgrade_to_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\RoomUpgradeTos',
                $data['room_upgrade_to_id']
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
            $model = HotelSupplements::create($data);
        } catch(\Exception $e) {
            throw $e;
        }

        Events::fire('created:NextDeveloper\Stay\HotelSupplements', $model);

        return $model->fresh();
    }

    /**
     * This function expects the ID inside the object.
     *
     * @param  array $data
     * @return HotelSupplements
     */
    public static function updateRaw(array $data) : ?HotelSupplements
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
        $model = HotelSupplements::where('uuid', $id)->first();

        if(!$model) {
            throw new NotAllowedException(
                'We cannot find the related object to update. ' .
                'Maybe you dont have the permission to update this object?'
            );
        }

        if (array_key_exists('stay_hotel_supplement_type_id', $data)) {
            $data['stay_hotel_supplement_type_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\Stay\Database\Models\HotelSupplementTypes',
                $data['stay_hotel_supplement_type_id']
            );
        }
        if (array_key_exists('stay_provider_id', $data)) {
            $data['stay_provider_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\Stay\Database\Models\Providers',
                $data['stay_provider_id']
            );
        }
        if (array_key_exists('stay_product_group_id', $data)) {
            $data['stay_product_group_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\Stay\Database\Models\ProductGroups',
                $data['stay_product_group_id']
            );
        }
        if (array_key_exists('stay_sale_contract_id', $data)) {
            $data['stay_sale_contract_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\Stay\Database\Models\SaleContracts',
                $data['stay_sale_contract_id']
            );
        }
        if (array_key_exists('stay_rate_id', $data)) {
            $data['stay_rate_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\Stay\Database\Models\Rates',
                $data['stay_rate_id']
            );
        }
        if (array_key_exists('stay_hotel_supplement_class_id', $data)) {
            $data['stay_hotel_supplement_class_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\Stay\Database\Models\HotelSupplementClasses',
                $data['stay_hotel_supplement_class_id']
            );
        }
        if (array_key_exists('parent_stay_hotel_supplement_id', $data)) {
            $data['parent_stay_hotel_supplement_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\ParentStayHotelSupplements',
                $data['parent_stay_hotel_supplement_id']
            );
        }
        if (array_key_exists('base_regime_id', $data)) {
            $data['base_regime_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\BaseRegimes',
                $data['base_regime_id']
            );
        }
        if (array_key_exists('base_room_type_id', $data)) {
            $data['base_room_type_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\BaseRoomTypes',
                $data['base_room_type_id']
            );
        }
        if (array_key_exists('stay_offer_supplement_type_id', $data)) {
            $data['stay_offer_supplement_type_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\Stay\Database\Models\OfferSupplementTypes',
                $data['stay_offer_supplement_type_id']
            );
        }
        if (array_key_exists('base_supplement_type_id', $data)) {
            $data['base_supplement_type_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\BaseSupplementTypes',
                $data['base_supplement_type_id']
            );
        }
        if (array_key_exists('regime_change_from_id', $data)) {
            $data['regime_change_from_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\RegimeChangeFroms',
                $data['regime_change_from_id']
            );
        }
        if (array_key_exists('regime_change_to_id', $data)) {
            $data['regime_change_to_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\RegimeChangeTos',
                $data['regime_change_to_id']
            );
        }
        if (array_key_exists('room_upgrade_from_id', $data)) {
            $data['room_upgrade_from_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\RoomUpgradeFroms',
                $data['room_upgrade_from_id']
            );
        }
        if (array_key_exists('room_upgrade_to_id', $data)) {
            $data['room_upgrade_to_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\\Database\Models\RoomUpgradeTos',
                $data['room_upgrade_to_id']
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
    
        Events::fire('updating:NextDeveloper\Stay\HotelSupplements', $model);

        try {
            $isUpdated = $model->update($data);
            $model = $model->fresh();
        } catch(\Exception $e) {
            throw $e;
        }

        Events::fire('updated:NextDeveloper\Stay\HotelSupplements', $model);

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
        $model = HotelSupplements::where('uuid', $id)->first();

        if(!$model) {
            throw new NotAllowedException(
                'We cannot find the related object to delete. ' .
                'Maybe you dont have the permission to update this object?'
            );
        }

        Events::fire('deleted:NextDeveloper\Stay\HotelSupplements', $model);

        try {
            $model = $model->delete();
        } catch(\Exception $e) {
            throw $e;
        }

        return $model;
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}
