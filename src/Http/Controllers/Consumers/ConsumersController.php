<?php

namespace NextDeveloper\Stay\Http\Controllers\Consumers;

use Illuminate\Http\Request;
use NextDeveloper\Stay\Http\Controllers\AbstractController;
use NextDeveloper\Commons\Http\Response\ResponsableFactory;
use NextDeveloper\Stay\Http\Requests\Consumers\ConsumersUpdateRequest;
use NextDeveloper\Stay\Database\Filters\ConsumersQueryFilter;
use NextDeveloper\Stay\Database\Models\Consumers;
use NextDeveloper\Stay\Services\ConsumersService;
use NextDeveloper\Stay\Http\Requests\Consumers\ConsumersCreateRequest;
use NextDeveloper\Commons\Http\Traits\Tags;use NextDeveloper\Commons\Http\Traits\Addresses;
class ConsumersController extends AbstractController
{
    private $model = Consumers::class;

    use Tags;
    use Addresses;
    /**
     * This method returns the list of consumers.
     *
     * optional http params:
     * - paginate: If you set paginate parameter, the result will be returned paginated.
     *
     * @param  ConsumersQueryFilter $filter  An object that builds search query
     * @param  Request              $request Laravel request object, this holds all data about request. Automatically populated.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(ConsumersQueryFilter $filter, Request $request)
    {
        $data = ConsumersService::get($filter, $request->all());

        return ResponsableFactory::makeResponse($this, $data);
    }

    /**
     * This function returns the list of actions that can be performed on this object.
     *
     * @return void
     */
    public function getActions()
    {
        $data = ConsumersService::getActions();

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
        $actionId = ConsumersService::doAction($objectId, $action, request()->all());

        return $this->withArray(
            [
            'action_id' =>  $actionId
            ]
        );
    }

    /**
     * This method receives ID for the related model and returns the item to the client.
     *
     * @param  $consumersId
     * @return mixed|null
     * @throws \Laravel\Octane\Exceptions\DdException
     */
    public function show($ref)
    {
        //  Here we are not using Laravel Route Model Binding. Please check routeBinding.md file
        //  in NextDeveloper Platform Project
        $model = ConsumersService::getByRef($ref);

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
        $objects = ConsumersService::relatedObjects($ref, $subObject);

        return ResponsableFactory::makeResponse($this, $objects);
    }

    /**
     * This method created Consumers object on database.
     *
     * @param  ConsumersCreateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function store(ConsumersCreateRequest $request)
    {
        if($request->has('validateOnly') && $request->get('validateOnly') == true) {
            return [
                'validation'    =>  'success'
            ];
        }

        $model = ConsumersService::create($request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates Consumers object on database.
     *
     * @param  $consumersId
     * @param  ConsumersUpdateRequest $request
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function update($consumersId, ConsumersUpdateRequest $request)
    {
        if($request->has('validateOnly') && $request->get('validateOnly') == true) {
            return [
                'validation'    =>  'success'
            ];
        }

        $model = ConsumersService::update($consumersId, $request->validated());

        return ResponsableFactory::makeResponse($this, $model);
    }

    /**
     * This method updates Consumers object on database.
     *
     * @param  $consumersId
     * @return mixed|null
     * @throws \NextDeveloper\Commons\Exceptions\CannotCreateModelException
     */
    public function destroy($consumersId)
    {
        $model = ConsumersService::delete($consumersId);

        return $this->noContent();
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

}
