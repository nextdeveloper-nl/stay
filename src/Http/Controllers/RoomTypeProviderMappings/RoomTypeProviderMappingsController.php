<?php

namespace NextDeveloper\Stay\Http\Controllers\RoomTypeProviderMappings;

use Illuminate\Http\Request;
use NextDeveloper\Stay\Http\Controllers\AbstractController;
use NextDeveloper\Commons\Http\Response\ResponsableFactory;
use NextDeveloper\Stay\Http\Requests\RoomTypeProviderMappings\RoomTypeProviderMappingsUpdateRequest;
use NextDeveloper\Stay\Database\Filters\RoomTypeProviderMappingsQueryFilter;
use NextDeveloper\Stay\Database\Models\RoomTypeProviderMappings;
use NextDeveloper\Stay\Services\RoomTypeProviderMappingsService;
use NextDeveloper\Stay\Http\Requests\RoomTypeProviderMappings\RoomTypeProviderMappingsCreateRequest;
use NextDeveloper\Commons\Http\Traits\Tags;use NextDeveloper\Commons\Http\Traits\Addresses;
class RoomTypeProviderMappingsController extends AbstractController
{
    private $model = RoomTypeProviderMappings::class;

    use Tags;
    use Addresses;
    /**
     * This method returns the list of roomtypeprovidermappings.
     *
     * optional http params:
     * - paginate: If you set paginate parameter, the result will be returned paginated.
     *
     * @param  RoomTypeProviderMappingsQueryFilter $filter  An object that builds search query
     * @param  Request                             $request Laravel request object, this holds all data about request. Automatically populated.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(RoomTypeProviderMappingsQueryFilter $filter, Request $request)
    {
        $data = RoomTypeProviderMappingsService::get($filter, $request->all());

        return ResponsableFactory::makeResponse($this, $data);
    }

    /**
     * This function returns the list of actions that can be performed on this object.
     *
     * @return void
     */
    public function getActions()
    {
        $data = RoomTypeProviderMappingsService::getActions();

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
        $actionId = RoomTypeProviderMappingsService::doAction($objectId, $action, request()->all());

        return $this->withArray(
            [
            'action_id' =>  $actionId
            ]
        );
    }

    /**
     * This method receives ID for the related model and returns the item to the client.
     *
     * @param  $roomTypeProviderMappingsId
     * @return mixed|null
     * @throws \Laravel\Octane\Exceptions\DdException
     */
    public function show($ref)
    {
        //  Here we are not using Laravel Route Model Binding. Please check routeBinding.md file
        //  in NextDeveloper Platform Project
        $model = RoomTypeProviderMappingsService::getByRef($ref);

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
        $objects = RoomTypeProviderMappingsService::relatedObjects($ref, $subObject);

        return ResponsableFactory::makeResponse($this, $objects);
    }

    /**
     * This method created RoomTypeProviderMappings object on database.
     *
     * @param  RoomTypeProviderMappingsCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function store(RoomTypeProviderMappingsCreateRequest $request)
    {
        if($request->has('validateOnly') && $request->get('validateOnly') == true) {
            return [
                'validation'    =>  'success'
            ];
        }

        $model = RoomTypeProviderMappingsService::create($request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates RoomTypeProviderMappings object on database.
     *
     * @param  $roomTypeProviderMappingsId
     * @param  RoomTypeProviderMappingsUpdateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function update($roomTypeProviderMappingsId, RoomTypeProviderMappingsUpdateRequest $request)
    {
        if($request->has('validateOnly') && $request->get('validateOnly') == true) {
            return [
                'validation'    =>  'success'
            ];
        }

        $model = RoomTypeProviderMappingsService::update($roomTypeProviderMappingsId, $request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates RoomTypeProviderMappings object on database.
     *
     * @param  $roomTypeProviderMappingsId
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function destroy($roomTypeProviderMappingsId)
    {
        $model = RoomTypeProviderMappingsService::delete($roomTypeProviderMappingsId);

        return $this->noContent();
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}
