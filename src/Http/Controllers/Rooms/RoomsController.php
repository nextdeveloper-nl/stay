<?php

namespace NextDeveloper\Stay\Http\Controllers\Rooms;

use Illuminate\Http\Request;
use NextDeveloper\Stay\Http\Controllers\AbstractController;
use NextDeveloper\Generator\Http\Traits\ResponsableFactory;
use NextDeveloper\Stay\Http\Requests\Rooms\RoomsUpdateRequest;
use NextDeveloper\Stay\Database\Filters\RoomsQueryFilter;
use NextDeveloper\Stay\Services\RoomsService;
use NextDeveloper\Stay\Http\Requests\Rooms\RoomsCreateRequest;

class RoomsController extends AbstractController
{
    /**
     * This method returns the list of rooms.
     *
     * optional http params:
     * - paginate: If you set paginate parameter, the result will be returned paginated.
     *
     * @param  RoomsQueryFilter $filter  An object that builds search query
     * @param  Request          $request Laravel request object, this holds all data about request. Automatically populated.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(RoomsQueryFilter $filter, Request $request)
    {
        $data = RoomsService::get($filter, $request->all());

        return ResponsableFactory::makeResponse($this, $data);
    }

    /**
     * This method receives ID for the related model and returns the item to the client.
     *
     * @param  $roomsId
     * @return mixed|null
     * @throws \Laravel\Octane\Exceptions\DdException
     */
    public function show($ref)
    {
        //  Here we are not using Laravel Route Model Binding. Please check routeBinding.md file
        //  in NextDeveloper Platform Project
        $model = RoomsService::getByRef($ref);

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method created Rooms object on database.
     *
     * @param  RoomsCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function store(RoomsCreateRequest $request)
    {
        $model = RoomsService::create($request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates Rooms object on database.
     *
     * @param  $roomsId
     * @param  CountryCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function update($roomsId, RoomsUpdateRequest $request)
    {
        $model = RoomsService::update($roomsId, $request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates Rooms object on database.
     *
     * @param  $roomsId
     * @param  CountryCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function destroy($roomsId)
    {
        $model = RoomsService::delete($roomsId);

        return ResponsableFactory::makeResponse($this, $model);
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}