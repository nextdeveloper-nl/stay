<?php

namespace NextDeveloper\Stay\Services\AbstractServices;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use NextDeveloper\IAM\Helpers\UserHelper;
use NextDeveloper\Commons\Common\Cache\CacheHelper;
use NextDeveloper\Commons\Helpers\DatabaseHelper;
use NextDeveloper\Stay\Database\Models\Rooms;
use NextDeveloper\Stay\Database\Filters\RoomsQueryFilter;
use NextDeveloper\Commons\Exceptions\ModelNotFoundException;
use NextDeveloper\Stay\Events\Rooms\RoomsCreatedEvent;
use NextDeveloper\Stay\Events\Rooms\RoomsCreatingEvent;
use NextDeveloper\Stay\Events\Rooms\RoomsUpdatedEvent;
use NextDeveloper\Stay\Events\Rooms\RoomsUpdatingEvent;
use NextDeveloper\Stay\Events\Rooms\RoomsDeletedEvent;
use NextDeveloper\Stay\Events\Rooms\RoomsDeletingEvent;

/**
 * This class is responsible from managing the data for Rooms
 *
 * Class RoomsService.
 *
 * @package NextDeveloper\Stay\Database\Models
 */
class AbstractRoomsService
{
    public static function get(RoomsQueryFilter $filter = null, array $params = []) : Collection|LengthAwarePaginator
    {
        $enablePaginate = array_key_exists('paginate', $params);

        /**
        * Here we are adding null request since if filter is null, this means that this function is called from
        * non http application. This is actually not I think its a correct way to handle this problem but it's a workaround.
        *
        * Please let me know if you have any other idea about this; baris.bulut@nextdeveloper.com
        */
        if($filter == null) {
            $filter = new RoomsQueryFilter(new Request());
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

        $model = Rooms::filter($filter);

        if($model && $enablePaginate) {
            return $model->paginate($perPage);
        } else {
            return $model->get();
        }
    }

    public static function getAll()
    {
        return Rooms::all();
    }

    /**
     * This method returns the model by looking at reference id
     *
     * @param  $ref
     * @return mixed
     */
    public static function getByRef($ref) : ?Rooms
    {
        return Rooms::findByRef($ref);
    }

    /**
     * This method returns the model by lookint at its id
     *
     * @param  $id
     * @return Rooms|null
     */
    public static function getById($id) : ?Rooms
    {
        return Rooms::where('id', $id)->first();
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
            $obj = Rooms::where('uuid', $uuid)->first();

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
        event(new RoomsCreatingEvent());

        if (array_key_exists('stay_hotels_id', $data)) {
            $data['stay_hotels_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\Stay\Database\Models\Hotels',
                $data['stay_hotels_id']
            );
        }
        if (array_key_exists('stay_room_type_id', $data)) {
            $data['stay_room_type_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\Stay\Database\Models\RoomTypes',
                $data['stay_room_type_id']
            );
        }
    
        try {
            $model = Rooms::create($data);
        } catch(\Exception $e) {
            throw $e;
        }

        event(new RoomsCreatedEvent($model));

        return $model->fresh();
    }

    /**
     This function expects the ID inside the object.
    
     @param  array $data
     @return Rooms
     */
    public static function updateRaw(array $data) : ?Rooms
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
        $model = Rooms::where('uuid', $id)->first();

        if (array_key_exists('stay_hotels_id', $data)) {
            $data['stay_hotels_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\Stay\Database\Models\Hotels',
                $data['stay_hotels_id']
            );
        }
        if (array_key_exists('stay_room_type_id', $data)) {
            $data['stay_room_type_id'] = DatabaseHelper::uuidToId(
                '\NextDeveloper\Stay\Database\Models\RoomTypes',
                $data['stay_room_type_id']
            );
        }
    
        event(new RoomsUpdatingEvent($model));

        try {
            $isUpdated = $model->update($data);
            $model = $model->fresh();
        } catch(\Exception $e) {
            throw $e;
        }

        event(new RoomsUpdatedEvent($model));

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
        $model = Rooms::where('uuid', $id)->first();

        event(new RoomsDeletingEvent());

        try {
            $model = $model->delete();
        } catch(\Exception $e) {
            throw $e;
        }

        return $model;
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}
