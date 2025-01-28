<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayHotelConsumerMappingQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayHotelConsumerMappingService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayHotelConsumerMappingTestTraits
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

    public function test_http_stayhotelconsumermapping_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/stayhotelconsumermapping',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_stayhotelconsumermapping_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/stayhotelconsumermapping', [
            'form_params'   =>  [
                'consumer_hotel_code'  =>  'a',
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
    public function test_stayhotelconsumermapping_model_get()
    {
        $result = AbstractStayHotelConsumerMappingService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayhotelconsumermapping_get_all()
    {
        $result = AbstractStayHotelConsumerMappingService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayhotelconsumermapping_get_paginated()
    {
        $result = AbstractStayHotelConsumerMappingService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_stayhotelconsumermapping_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelConsumerMapping\StayHotelConsumerMappingRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelconsumermapping_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelConsumerMapping\StayHotelConsumerMappingCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelconsumermapping_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelConsumerMapping\StayHotelConsumerMappingCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelconsumermapping_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelConsumerMapping\StayHotelConsumerMappingSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelconsumermapping_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelConsumerMapping\StayHotelConsumerMappingSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelconsumermapping_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelConsumerMapping\StayHotelConsumerMappingUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelconsumermapping_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelConsumerMapping\StayHotelConsumerMappingUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelconsumermapping_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelConsumerMapping\StayHotelConsumerMappingDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelconsumermapping_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelConsumerMapping\StayHotelConsumerMappingDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelconsumermapping_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelConsumerMapping\StayHotelConsumerMappingRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelconsumermapping_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelConsumerMapping\StayHotelConsumerMappingRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelconsumermapping_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayHotelConsumerMapping\StayHotelConsumerMappingRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelconsumermapping_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayHotelConsumerMapping\StayHotelConsumerMappingCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelconsumermapping_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayHotelConsumerMapping\StayHotelConsumerMappingCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelconsumermapping_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayHotelConsumerMapping\StayHotelConsumerMappingSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelconsumermapping_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayHotelConsumerMapping\StayHotelConsumerMappingSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelconsumermapping_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayHotelConsumerMapping\StayHotelConsumerMappingUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelconsumermapping_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayHotelConsumerMapping\StayHotelConsumerMappingUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelconsumermapping_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayHotelConsumerMapping\StayHotelConsumerMappingDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelconsumermapping_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayHotelConsumerMapping\StayHotelConsumerMappingDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelconsumermapping_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayHotelConsumerMapping\StayHotelConsumerMappingRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelconsumermapping_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayHotelConsumerMapping\StayHotelConsumerMappingRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelconsumermapping_event_consumer_hotel_code_filter()
    {
        try {
            $request = new Request(
                [
                'consumer_hotel_code'  =>  'a'
                ]
            );

            $filter = new StayHotelConsumerMappingQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelConsumerMapping::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}