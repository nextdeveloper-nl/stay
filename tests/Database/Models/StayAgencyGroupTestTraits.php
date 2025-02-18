<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayAgencyGroupQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayAgencyGroupService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayAgencyGroupTestTraits
{
    public $http;

    /**
     *   Creating the Guzzle object
     */
    public function setupGuzzle()
    {
        $this->http = new Client(
            [
            'base_uri'  =>  '127.0.0.1:8000'
            ]
        );
    }

    /**
     *   Destroying the Guzzle object
     */
    public function destroyGuzzle()
    {
        $this->http = null;
    }

    public function test_http_stayagencygroup_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/stayagencygroup',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_stayagencygroup_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/stayagencygroup', [
            'form_params'   =>  [
                'name'  =>  'a',
                'observation'  =>  'a',
                'codes'  =>  'a',
                'agency_reference_validator'  =>  'a',
                'tax_regime_type'  =>  'a',
                'external_id'  =>  'a',
                            ],
                ['http_errors' => false]
            ]
        );

        $this->assertEquals($response->getStatusCode(), Response::HTTP_OK);
    }

    /**
     * Get test
     *
     * @return bool
     */
    public function test_stayagencygroup_model_get()
    {
        $result = AbstractStayAgencyGroupService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayagencygroup_get_all()
    {
        $result = AbstractStayAgencyGroupService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayagencygroup_get_paginated()
    {
        $result = AbstractStayAgencyGroupService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_stayagencygroup_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayAgencyGroup\StayAgencyGroupRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayagencygroup_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayAgencyGroup\StayAgencyGroupCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayagencygroup_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayAgencyGroup\StayAgencyGroupCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayagencygroup_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayAgencyGroup\StayAgencyGroupSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayagencygroup_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayAgencyGroup\StayAgencyGroupSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayagencygroup_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayAgencyGroup\StayAgencyGroupUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayagencygroup_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayAgencyGroup\StayAgencyGroupUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayagencygroup_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayAgencyGroup\StayAgencyGroupDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayagencygroup_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayAgencyGroup\StayAgencyGroupDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayagencygroup_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayAgencyGroup\StayAgencyGroupRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayagencygroup_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayAgencyGroup\StayAgencyGroupRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayagencygroup_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayAgencyGroup::first();

            event(new \NextDeveloper\Stay\Events\StayAgencyGroup\StayAgencyGroupRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayagencygroup_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayAgencyGroup::first();

            event(new \NextDeveloper\Stay\Events\StayAgencyGroup\StayAgencyGroupCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayagencygroup_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayAgencyGroup::first();

            event(new \NextDeveloper\Stay\Events\StayAgencyGroup\StayAgencyGroupCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayagencygroup_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayAgencyGroup::first();

            event(new \NextDeveloper\Stay\Events\StayAgencyGroup\StayAgencyGroupSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayagencygroup_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayAgencyGroup::first();

            event(new \NextDeveloper\Stay\Events\StayAgencyGroup\StayAgencyGroupSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayagencygroup_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayAgencyGroup::first();

            event(new \NextDeveloper\Stay\Events\StayAgencyGroup\StayAgencyGroupUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayagencygroup_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayAgencyGroup::first();

            event(new \NextDeveloper\Stay\Events\StayAgencyGroup\StayAgencyGroupUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayagencygroup_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayAgencyGroup::first();

            event(new \NextDeveloper\Stay\Events\StayAgencyGroup\StayAgencyGroupDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayagencygroup_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayAgencyGroup::first();

            event(new \NextDeveloper\Stay\Events\StayAgencyGroup\StayAgencyGroupDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayagencygroup_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayAgencyGroup::first();

            event(new \NextDeveloper\Stay\Events\StayAgencyGroup\StayAgencyGroupRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayagencygroup_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayAgencyGroup::first();

            event(new \NextDeveloper\Stay\Events\StayAgencyGroup\StayAgencyGroupRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayagencygroup_event_name_filter()
    {
        try {
            $request = new Request(
                [
                'name'  =>  'a'
                ]
            );

            $filter = new StayAgencyGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayAgencyGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayagencygroup_event_observation_filter()
    {
        try {
            $request = new Request(
                [
                'observation'  =>  'a'
                ]
            );

            $filter = new StayAgencyGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayAgencyGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayagencygroup_event_codes_filter()
    {
        try {
            $request = new Request(
                [
                'codes'  =>  'a'
                ]
            );

            $filter = new StayAgencyGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayAgencyGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayagencygroup_event_agency_reference_validator_filter()
    {
        try {
            $request = new Request(
                [
                'agency_reference_validator'  =>  'a'
                ]
            );

            $filter = new StayAgencyGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayAgencyGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayagencygroup_event_tax_regime_type_filter()
    {
        try {
            $request = new Request(
                [
                'tax_regime_type'  =>  'a'
                ]
            );

            $filter = new StayAgencyGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayAgencyGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayagencygroup_event_external_id_filter()
    {
        try {
            $request = new Request(
                [
                'external_id'  =>  'a'
                ]
            );

            $filter = new StayAgencyGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayAgencyGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayagencygroup_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new StayAgencyGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayAgencyGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayagencygroup_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new StayAgencyGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayAgencyGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayagencygroup_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new StayAgencyGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayAgencyGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayagencygroup_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayAgencyGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayAgencyGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayagencygroup_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayAgencyGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayAgencyGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayagencygroup_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayAgencyGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayAgencyGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayagencygroup_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayAgencyGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayAgencyGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayagencygroup_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayAgencyGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayAgencyGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayagencygroup_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayAgencyGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayAgencyGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}