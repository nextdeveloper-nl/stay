<?php

namespace NextDeveloper\Stay\Services\AbstractServices;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use NextDeveloper\IAM\Helpers\UserHelper;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Commons\Helpers\DatabaseHelper;
use NextDeveloper\Stay\Database\Models\RoomTypes;
use NextDeveloper\Stay\Database\Filters\RoomTypesQueryFilter;
use NextDeveloper\Commons\Exceptions\ModelNotFoundException;
use NextDeveloper\Stay\Events\RoomTypes\RoomTypesCreatedEvent;
use NextDeveloper\Stay\Events\RoomTypes\RoomTypesCreatingEvent;
use NextDeveloper\Stay\Events\RoomTypes\RoomTypesUpdatedEvent;
use NextDeveloper\Stay\Events\RoomTypes\RoomTypesUpdatingEvent;
use NextDeveloper\Stay\Events\RoomTypes\RoomTypesDeletedEvent;
use NextDeveloper\Stay\Events\RoomTypes\RoomTypesDeletingEvent;

/**
 * This class is responsible from managing the data for RoomTypes
 *
 * Class RoomTypesService.
 *
 * @package NextDeveloper\Stay\Database\Models
 */
class AbstractRoomTypesService
{
    public static function get(RoomTypesQueryFilter $filter = null, array $params = []) : Collection|LengthAwarePaginator
    {
        $enablePaginate = array_key_exists('paginate', $params);

        /**
        * Here we are adding null request since if filter is null, this means that this function is called from
        * non http application. This is actually not I think its a correct way to handle this problem but it's a workaround.
        *
        * Please let me know if you have any other idea about this; baris.bulut@nextdeveloper.com
        */
        if($filter == null) {
            $filter = new RoomTypesQueryFilter(new Request());
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

        $model = RoomTypes::filter($filter);

        if($model && $enablePaginate) {
            return $model->paginate($perPage);
        } else {
            return $model->get();
        }
    }

    public static function getAll()
    {
        return RoomTypes::all();
    }

    /**
     * This method returns the model by looking at reference id
     *
     * @param  $ref
     * @return mixed
     */
    public static function getByRef($ref) : ?RoomTypes
    {
        return RoomTypes::findByRef($ref);
    }

    /**
     * This method returns the model by lookint at its id
     *
     * @param  $id
     * @return RoomTypes|null
     */
    public static function getById($id) : ?RoomTypes
    {
        return RoomTypes::where('id', $id)->first();
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
            $obj = RoomTypes::where('uuid', $uuid)->first();

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
        event(new RoomTypesCreatingEvent());

        if (array_key_exists('stay_hotels_id', $data)) {
            $data['stay_hotels_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\Stay\Database\Models\Hotels',
                $data['stay_hotels_id']
            );
        }
        if (array_key_exists('common_currency_id', $data)) {
            $data['common_currency_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\Commons\Database\Models\Currencies',
                $data['common_currency_id']
            );
        }
    
        try {
            $model = RoomTypes::create($data);
        } catch(\Exception $e) {
            throw $e;
        }

        event(new RoomTypesCreatedEvent($model));

        return $model->fresh();
    }

    /**
     This function expects the ID inside the object.
    
     @param  array $data
     @return RoomTypes
     */
    public static function updateRaw(array $data) : ?RoomTypes
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
        $model = RoomTypes::where('uuid', $id)->first();

        if (array_key_exists('stay_hotels_id', $data)) {
            $data['stay_hotels_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\Stay\Database\Models\Hotels',
                $data['stay_hotels_id']
            );
        }
        if (array_key_exists('common_currency_id', $data)) {
            $data['common_currency_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\Commons\Database\Models\Currencies',
                $data['common_currency_id']
            );
        }
    
        event(new RoomTypesUpdatingEvent($model));

        try {
            $isUpdated = $model->update($data);
            $model = $model->fresh();
        } catch(\Exception $e) {
            throw $e;
        }

        event(new RoomTypesUpdatedEvent($model));

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
        $model = RoomTypes::where('uuid', $id)->first();

        event(new RoomTypesDeletingEvent());

        try {
            $model = $model->delete();
        } catch(\Exception $e) {
            throw $e;
        }

        return $model;
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}
