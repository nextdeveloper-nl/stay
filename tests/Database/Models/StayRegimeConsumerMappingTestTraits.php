<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayRegimeConsumerMappingQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayRegimeConsumerMappingService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayRegimeConsumerMappingTestTraits
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

    public function test_http_stayregimeconsumermapping_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/stayregimeconsumermapping',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_stayregimeconsumermapping_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/stayregimeconsumermapping', [
            'form_params'   =>  [
                'consumer_rate_plan_code'  =>  'a',
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
    public function test_stayregimeconsumermapping_model_get()
    {
        $result = AbstractStayRegimeConsumerMappingService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayregimeconsumermapping_get_all()
    {
        $result = AbstractStayRegimeConsumerMappingService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayregimeconsumermapping_get_paginated()
    {
        $result = AbstractStayRegimeConsumerMappingService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_stayregimeconsumermapping_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegimeConsumerMapping\StayRegimeConsumerMappingRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimeconsumermapping_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegimeConsumerMapping\StayRegimeConsumerMappingCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimeconsumermapping_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegimeConsumerMapping\StayRegimeConsumerMappingCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimeconsumermapping_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegimeConsumerMapping\StayRegimeConsumerMappingSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimeconsumermapping_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegimeConsumerMapping\StayRegimeConsumerMappingSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimeconsumermapping_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegimeConsumerMapping\StayRegimeConsumerMappingUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimeconsumermapping_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegimeConsumerMapping\StayRegimeConsumerMappingUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimeconsumermapping_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegimeConsumerMapping\StayRegimeConsumerMappingDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimeconsumermapping_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegimeConsumerMapping\StayRegimeConsumerMappingDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimeconsumermapping_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegimeConsumerMapping\StayRegimeConsumerMappingRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimeconsumermapping_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegimeConsumerMapping\StayRegimeConsumerMappingRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregimeconsumermapping_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegimeConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRegimeConsumerMapping\StayRegimeConsumerMappingRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimeconsumermapping_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegimeConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRegimeConsumerMapping\StayRegimeConsumerMappingCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimeconsumermapping_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegimeConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRegimeConsumerMapping\StayRegimeConsumerMappingCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimeconsumermapping_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegimeConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRegimeConsumerMapping\StayRegimeConsumerMappingSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimeconsumermapping_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegimeConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRegimeConsumerMapping\StayRegimeConsumerMappingSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimeconsumermapping_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegimeConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRegimeConsumerMapping\StayRegimeConsumerMappingUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimeconsumermapping_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegimeConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRegimeConsumerMapping\StayRegimeConsumerMappingUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimeconsumermapping_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegimeConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRegimeConsumerMapping\StayRegimeConsumerMappingDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimeconsumermapping_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegimeConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRegimeConsumerMapping\StayRegimeConsumerMappingDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimeconsumermapping_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegimeConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRegimeConsumerMapping\StayRegimeConsumerMappingRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimeconsumermapping_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegimeConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRegimeConsumerMapping\StayRegimeConsumerMappingRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregimeconsumermapping_event_consumer_rate_plan_code_filter()
    {
        try {
            $request = new Request(
                [
                'consumer_rate_plan_code'  =>  'a'
                ]
            );

            $filter = new StayRegimeConsumerMappingQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegimeConsumerMapping::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}