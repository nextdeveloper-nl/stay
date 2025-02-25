<?php

namespace NextDeveloper\Stay\Http\Controllers\HotelSupplementTypes;

use Illuminate\Http\Request;
use NextDeveloper\Stay\Http\Controllers\AbstractController;
use NextDeveloper\Commons\Http\Response\ResponsableFactory;
use NextDeveloper\Stay\Http\Requests\HotelSupplementTypes\HotelSupplementTypesUpdateRequest;
use NextDeveloper\Stay\Database\Filters\HotelSupplementTypesQueryFilter;
use NextDeveloper\Stay\Database\Models\HotelSupplementTypes;
use NextDeveloper\Stay\Services\HotelSupplementTypesService;
use NextDeveloper\Stay\Http\Requests\HotelSupplementTypes\HotelSupplementTypesCreateRequest;
use NextDeveloper\Commons\Http\Traits\Tags;use NextDeveloper\Commons\Http\Traits\Addresses;
class HotelSupplementTypesController extends AbstractController
{
    private $model = HotelSupplementTypes::class;

    use Tags;
    use Addresses;
    /**
     * This method returns the list of hotelsupplementtypes.
     *
     * optional http params:
     * - paginate: If you set paginate parameter, the result will be returned paginated.
     *
     * @param  HotelSupplementTypesQueryFilter $filter  An object that builds search query
     * @param  Request                         $request Laravel request object, this holds all data about request. Automatically populated.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(HotelSupplementTypesQueryFilter $filter, Request $request)
    {
        $data = HotelSupplementTypesService::get($filter, $request->all());

        return ResponsableFactory::makeResponse($this, $data);
    }

    /**
     * This function returns the list of actions that can be performed on this object.
     *
     * @return void
     */
    public function getActions()
    {
        $data = HotelSupplementTypesService::getActions();

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
        $actionId = HotelSupplementTypesService::doAction($objectId, $action, request()->all());

        return $this->withArray(
            [
            'action_id' =>  $actionId
            ]
        );
    }

    /**
     * This method receives ID for the related model and returns the item to the client.
     *
     * @param  $hotelSupplementTypesId
     * @return mixed|null
     * @throws \Laravel\Octane\Exceptions\DdException
     */
    public function show($ref)
    {
        //  Here we are not using Laravel Route Model Binding. Please check routeBinding.md file
        //  in NextDeveloper Platform Project
        $model = HotelSupplementTypesService::getByRef($ref);

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
        $objects = HotelSupplementTypesService::relatedObjects($ref, $subObject);

        return ResponsableFactory::makeResponse($this, $objects);
    }

    /**
     * This method created HotelSupplementTypes object on database.
     *
     * @param  HotelSupplementTypesCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function store(HotelSupplementTypesCreateRequest $request)
    {
        if($request->has('validateOnly') && $request->get('validateOnly') == true) {
            return [
                'validation'    =>  'success'
            ];
        }

        $model = HotelSupplementTypesService::create($request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates HotelSupplementTypes object on database.
     *
     * @param  $hotelSupplementTypesId
     * @param  HotelSupplementTypesUpdateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function update($hotelSupplementTypesId, HotelSupplementTypesUpdateRequest $request)
    {
        if($request->has('validateOnly') && $request->get('validateOnly') == true) {
            return [
                'validation'    =>  'success'
            ];
        }

        $model = HotelSupplementTypesService::update($hotelSupplementTypesId, $request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates HotelSupplementTypes object on database.
     *
     * @param  $hotelSupplementTypesId
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function destroy($hotelSupplementTypesId)
    {
        $model = HotelSupplementTypesService::delete($hotelSupplementTypesId);

        return $this->noContent();
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}
