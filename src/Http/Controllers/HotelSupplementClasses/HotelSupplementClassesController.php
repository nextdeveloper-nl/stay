<?php

namespace NextDeveloper\Stay\Http\Controllers\HotelSupplementClasses;

use Illuminate\Http\Request;
use NextDeveloper\Stay\Http\Controllers\AbstractController;
use NextDeveloper\Commons\Http\Response\ResponsableFactory;
use NextDeveloper\Stay\Http\Requests\HotelSupplementClasses\HotelSupplementClassesUpdateRequest;
use NextDeveloper\Stay\Database\Filters\HotelSupplementClassesQueryFilter;
use NextDeveloper\Stay\Database\Models\HotelSupplementClasses;
use NextDeveloper\Stay\Services\HotelSupplementClassesService;
use NextDeveloper\Stay\Http\Requests\HotelSupplementClasses\HotelSupplementClassesCreateRequest;
use NextDeveloper\Commons\Http\Traits\Tags;use NextDeveloper\Commons\Http\Traits\Addresses;
class HotelSupplementClassesController extends AbstractController
{
    private $model = HotelSupplementClasses::class;

    use Tags;
    use Addresses;
    /**
     * This method returns the list of hotelsupplementclasses.
     *
     * optional http params:
     * - paginate: If you set paginate parameter, the result will be returned paginated.
     *
     * @param  HotelSupplementClassesQueryFilter $filter  An object that builds search query
     * @param  Request                           $request Laravel request object, this holds all data about request. Automatically populated.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(HotelSupplementClassesQueryFilter $filter, Request $request)
    {
        $data = HotelSupplementClassesService::get($filter, $request->all());

        return ResponsableFactory::makeResponse($this, $data);
    }

    /**
     * This function returns the list of actions that can be performed on this object.
     *
     * @return void
     */
    public function getActions()
    {
        $data = HotelSupplementClassesService::getActions();

        return ResponsableFactory::makeResponse($this, $data);
    }

    /**
     * Makes the related action to the object
     *
     * @param  $objectId
     * @param  $action
     * @return array
     */
    public function doAction($objectId, $action)
    {
        $actionId = HotelSupplementClassesService::doAction($objectId, $action, request()->all());

        return $this->withArray(
            [
            'action_id' =>  $actionId
            ]
        );
    }

    /**
     * This method receives ID for the related model and returns the item to the client.
     *
     * @param  $hotelSupplementClassesId
     * @return mixed|null
     * @throws \Laravel\Octane\Exceptions\DdException
     */
    public function show($ref)
    {
        //  Here we are not using Laravel Route Model Binding. Please check routeBinding.md file
        //  in NextDeveloper Platform Project
        $model = HotelSupplementClassesService::getByRef($ref);

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
        $objects = HotelSupplementClassesService::relatedObjects($ref, $subObject);

        return ResponsableFactory::makeResponse($this, $objects);
    }

    /**
     * This method created HotelSupplementClasses object on database.
     *
     * @param  HotelSupplementClassesCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function store(HotelSupplementClassesCreateRequest $request)
    {
        if($request->has('validateOnly') && $request->get('validateOnly') == true) {
            return [
                'validation'    =>  'success'
            ];
        }

        $model = HotelSupplementClassesService::create($request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates HotelSupplementClasses object on database.
     *
     * @param  $hotelSupplementClassesId
     * @param  HotelSupplementClassesUpdateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function update($hotelSupplementClassesId, HotelSupplementClassesUpdateRequest $request)
    {
        if($request->has('validateOnly') && $request->get('validateOnly') == true) {
            return [
                'validation'    =>  'success'
            ];
        }

        $model = HotelSupplementClassesService::update($hotelSupplementClassesId, $request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates HotelSupplementClasses object on database.
     *
     * @param  $hotelSupplementClassesId
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function destroy($hotelSupplementClassesId)
    {
        $model = HotelSupplementClassesService::delete($hotelSupplementClassesId);

        return $this->noContent();
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}
