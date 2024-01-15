<?php

namespace NextDeveloper\Stay\Http\Controllers\Hotels;

use Illuminate\Http\Request;
use NextDeveloper\Stay\Http\Controllers\AbstractController;
use NextDeveloper\Commons\Http\Traits\ResponsableFactory;
use NextDeveloper\Stay\Http\Requests\Hotels\HotelsUpdateRequest;
use NextDeveloper\Stay\Database\Filters\HotelsQueryFilter;
use NextDeveloper\Stay\Database\Models\Hotels;
use NextDeveloper\Stay\Services\HotelsService;
use NextDeveloper\Stay\Http\Requests\Hotels\HotelsCreateRequest;
use NextDeveloper\Commons\Http\Traits\Tags;
class HotelsController extends AbstractController
{
    private $model = Hotels::class;

    use Tags;
    /**
     * This method returns the list of hotels.
     *
     * optional http params:
     * - paginate: If you set paginate parameter, the result will be returned paginated.
     *
     * @param  HotelsQueryFilter $filter  An object that builds search query
     * @param  Request           $request Laravel request object, this holds all data about request. Automatically populated.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(HotelsQueryFilter $filter, Request $request)
    {
        $data = HotelsService::get($filter, $request->all());

        return ResponsableFactory::makeResponse($this, $data);
    }

    /**
     * This method receives ID for the related model and returns the item to the client.
     *
     * @param  $hotelsId
     * @return mixed|null
     * @throws \Laravel\Octane\Exceptions\DdException
     */
    public function show($ref)
    {
        //  Here we are not using Laravel Route Model Binding. Please check routeBinding.md file
        //  in NextDeveloper Platform Project
        $model = HotelsService::getByRef($ref);

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
        $objects = HotelsService::relatedObjects($ref, $subObject);

        return ResponsableFactory::makeResponse($this, $objects);
    }

    /**
     * This method created Hotels object on database.
     *
     * @param  HotelsCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function store(HotelsCreateRequest $request)
    {
        $model = HotelsService::create($request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates Hotels object on database.
     *
     * @param  $hotelsId
     * @param  CountryCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function update($hotelsId, HotelsUpdateRequest $request)
    {
        $model = HotelsService::update($hotelsId, $request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates Hotels object on database.
     *
     * @param  $hotelsId
     * @param  CountryCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function destroy($hotelsId)
    {
        $model = HotelsService::delete($hotelsId);

        return $this->noContent();
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}
