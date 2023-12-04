<?php

namespace NextDeveloper\Stay\Http\Controllers\RoomTypes;

use Illuminate\Http\Request;
use NextDeveloper\Stay\Http\Controllers\AbstractController;
use NextDeveloper\Generator\Http\Traits\ResponsableFactory;
use NextDeveloper\Stay\Http\Requests\RoomTypes\RoomTypesUpdateRequest;
use NextDeveloper\Stay\Database\Filters\RoomTypesQueryFilter;
use NextDeveloper\Stay\Database\Models\RoomTypes;
use NextDeveloper\Stay\Services\RoomTypesService;
use NextDeveloper\Stay\Http\Requests\RoomTypes\RoomTypesCreateRequest;
use NextDeveloper\Commons\Http\Traits\Tags;
class RoomTypesController extends AbstractController
{
    private $model = RoomTypes::class;

    use Tags;
    /**
     * This method returns the list of roomtypes.
     *
     * optional http params:
     * - paginate: If you set paginate parameter, the result will be returned paginated.
     *
     * @param  RoomTypesQueryFilter $filter  An object that builds search query
     * @param  Request              $request Laravel request object, this holds all data about request. Automatically populated.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(RoomTypesQueryFilter $filter, Request $request)
    {
        $data = RoomTypesService::get($filter, $request->all());

        return ResponsableFactory::makeResponse($this, $data);
    }

    /**
     * This method receives ID for the related model and returns the item to the client.
     *
     * @param  $roomTypesId
     * @return mixed|null
     * @throws \Laravel\Octane\Exceptions\DdException
     */
    public function show($ref)
    {
        //  Here we are not using Laravel Route Model Binding. Please check routeBinding.md file
        //  in NextDeveloper Platform Project
        $model = RoomTypesService::getByRef($ref);

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method returns the list of sub objects the related object. Sub object means an object which is preowned by
     * this object.
     *
     * It can be tags, addresses, states etc.
     *
     * @param  $ref
     * @param  $subObject
     * @return void
     */
    public function relatedObjects($ref, $subObject)
    {
        $objects = RoomTypesService::relatedObjects($ref, $subObject);

        return ResponsableFactory::makeResponse($this, $objects);
    }

    /**
     * This method created RoomTypes object on database.
     *
     * @param  RoomTypesCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function store(RoomTypesCreateRequest $request)
    {
        $model = RoomTypesService::create($request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates RoomTypes object on database.
     *
     * @param  $roomTypesId
     * @param  CountryCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function update($roomTypesId, RoomTypesUpdateRequest $request)
    {
        $model = RoomTypesService::update($roomTypesId, $request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates RoomTypes object on database.
     *
     * @param  $roomTypesId
     * @param  CountryCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function destroy($roomTypesId)
    {
        $model = RoomTypesService::delete($roomTypesId);

        return $this->noContent();
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}
