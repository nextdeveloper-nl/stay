<?php

namespace NextDeveloper\Stay\Http\Controllers\Reservations;

use Illuminate\Http\Request;
use NextDeveloper\Stay\Http\Controllers\AbstractController;
use NextDeveloper\Generator\Http\Traits\ResponsableFactory;
use NextDeveloper\Stay\Http\Requests\Reservations\ReservationsUpdateRequest;
use NextDeveloper\Stay\Database\Filters\ReservationsQueryFilter;
use NextDeveloper\Stay\Services\ReservationsService;
use NextDeveloper\Stay\Http\Requests\Reservations\ReservationsCreateRequest;

class ReservationsController extends AbstractController
{
    /**
     * This method returns the list of reservations.
     *
     * optional http params:
     * - paginate: If you set paginate parameter, the result will be returned paginated.
     *
     * @param  ReservationsQueryFilter $filter  An object that builds search query
     * @param  Request                 $request Laravel request object, this holds all data about request. Automatically populated.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ReservationsQueryFilter $filter, Request $request)
    {
        $data = ReservationsService::get($filter, $request->all());

        return ResponsableFactory::makeResponse($this, $data);
    }

    /**
     * This method receives ID for the related model and returns the item to the client.
     *
     * @param  $reservationsId
     * @return mixed|null
     * @throws \Laravel\Octane\Exceptions\DdException
     */
    public function show($ref)
    {
        //  Here we are not using Laravel Route Model Binding. Please check routeBinding.md file
        //  in NextDeveloper Platform Project
        $model = ReservationsService::getByRef($ref);

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method created Reservations object on database.
     *
     * @param  ReservationsCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function store(ReservationsCreateRequest $request)
    {
        $model = ReservationsService::create($request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates Reservations object on database.
     *
     * @param  $reservationsId
     * @param  CountryCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function update($reservationsId, ReservationsUpdateRequest $request)
    {
        $model = ReservationsService::update($reservationsId, $request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates Reservations object on database.
     *
     * @param  $reservationsId
     * @param  CountryCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function destroy($reservationsId)
    {
        $model = ReservationsService::delete($reservationsId);

        return ResponsableFactory::makeResponse($this, $model);
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}