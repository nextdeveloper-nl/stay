<?php

namespace NextDeveloper\Stay\Http\Controllers\RegimeConsumerMappings;

use Illuminate\Http\Request;
use NextDeveloper\Stay\Http\Controllers\AbstractController;
use NextDeveloper\Commons\Http\Response\ResponsableFactory;
use NextDeveloper\Stay\Http\Requests\RegimeConsumerMappings\RegimeConsumerMappingsUpdateRequest;
use NextDeveloper\Stay\Database\Filters\RegimeConsumerMappingsQueryFilter;
use NextDeveloper\Stay\Database\Models\RegimeConsumerMappings;
use NextDeveloper\Stay\Services\RegimeConsumerMappingsService;
use NextDeveloper\Stay\Http\Requests\RegimeConsumerMappings\RegimeConsumerMappingsCreateRequest;
use NextDeveloper\Commons\Http\Traits\Tags;use NextDeveloper\Commons\Http\Traits\Addresses;
class RegimeConsumerMappingsController extends AbstractController
{
    private $model = RegimeConsumerMappings::class;

    use Tags;
    use Addresses;
    /**
     * This method returns the list of regimeconsumermappings.
     *
     * optional http params:
     * - paginate: If you set paginate parameter, the result will be returned paginated.
     *
     * @param  RegimeConsumerMappingsQueryFilter $filter  An object that builds search query
     * @param  Request                           $request Laravel request object, this holds all data about request. Automatically populated.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(RegimeConsumerMappingsQueryFilter $filter, Request $request)
    {
        $data = RegimeConsumerMappingsService::get($filter, $request->all());

        return ResponsableFactory::makeResponse($this, $data);
    }

    /**
     * This function returns the list of actions that can be performed on this object.
     *
     * @return void
     */
    public function getActions()
    {
        $data = RegimeConsumerMappingsService::getActions();

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
        $actionId = RegimeConsumerMappingsService::doAction($objectId, $action, request()->all());

        return $this->withArray(
            [
            'action_id' =>  $actionId
            ]
        );
    }

    /**
     * This method receives ID for the related model and returns the item to the client.
     *
     * @param  $regimeConsumerMappingsId
     * @return mixed|null
     * @throws \Laravel\Octane\Exceptions\DdException
     */
    public function show($ref)
    {
        //  Here we are not using Laravel Route Model Binding. Please check routeBinding.md file
        //  in NextDeveloper Platform Project
        $model = RegimeConsumerMappingsService::getByRef($ref);

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
        $objects = RegimeConsumerMappingsService::relatedObjects($ref, $subObject);

        return ResponsableFactory::makeResponse($this, $objects);
    }

    /**
     * This method created RegimeConsumerMappings object on database.
     *
     * @param  RegimeConsumerMappingsCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function store(RegimeConsumerMappingsCreateRequest $request)
    {
        if($request->has('validateOnly') && $request->get('validateOnly') == true) {
            return [
                'validation'    =>  'success'
            ];
        }

        $model = RegimeConsumerMappingsService::create($request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates RegimeConsumerMappings object on database.
     *
     * @param  $regimeConsumerMappingsId
     * @param  RegimeConsumerMappingsUpdateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function update($regimeConsumerMappingsId, RegimeConsumerMappingsUpdateRequest $request)
    {
        if($request->has('validateOnly') && $request->get('validateOnly') == true) {
            return [
                'validation'    =>  'success'
            ];
        }

        $model = RegimeConsumerMappingsService::update($regimeConsumerMappingsId, $request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates RegimeConsumerMappings object on database.
     *
     * @param  $regimeConsumerMappingsId
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function destroy($regimeConsumerMappingsId)
    {
        $model = RegimeConsumerMappingsService::delete($regimeConsumerMappingsId);

        return $this->noContent();
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}
