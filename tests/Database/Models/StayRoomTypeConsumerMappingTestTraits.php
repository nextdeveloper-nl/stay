<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayRoomTypeConsumerMappingQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayRoomTypeConsumerMappingService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayRoomTypeConsumerMappingTestTraits
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

    public function test_http_stayroomtypeconsumermapping_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/stayroomtypeconsumermapping',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_stayroomtypeconsumermapping_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/stayroomtypeconsumermapping', [
            'form_params'   =>  [
                'consumer_room_type_code'  =>  'a',
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
    public function test_stayroomtypeconsumermapping_model_get()
    {
        $result = AbstractStayRoomTypeConsumerMappingService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayroomtypeconsumermapping_get_all()
    {
        $result = AbstractStayRoomTypeConsumerMappingService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayroomtypeconsumermapping_get_paginated()
    {
        $result = AbstractStayRoomTypeConsumerMappingService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_stayroomtypeconsumermapping_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeConsumerMapping\StayRoomTypeConsumerMappingRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeconsumermapping_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeConsumerMapping\StayRoomTypeConsumerMappingCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeconsumermapping_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeConsumerMapping\StayRoomTypeConsumerMappingCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeconsumermapping_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeConsumerMapping\StayRoomTypeConsumerMappingSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeconsumermapping_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeConsumerMapping\StayRoomTypeConsumerMappingSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeconsumermapping_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeConsumerMapping\StayRoomTypeConsumerMappingUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeconsumermapping_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeConsumerMapping\StayRoomTypeConsumerMappingUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeconsumermapping_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeConsumerMapping\StayRoomTypeConsumerMappingDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeconsumermapping_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeConsumerMapping\StayRoomTypeConsumerMappingDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeconsumermapping_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeConsumerMapping\StayRoomTypeConsumerMappingRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeconsumermapping_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeConsumerMapping\StayRoomTypeConsumerMappingRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtypeconsumermapping_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeConsumerMapping\StayRoomTypeConsumerMappingRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeconsumermapping_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeConsumerMapping\StayRoomTypeConsumerMappingCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeconsumermapping_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeConsumerMapping\StayRoomTypeConsumerMappingCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeconsumermapping_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeConsumerMapping\StayRoomTypeConsumerMappingSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeconsumermapping_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeConsumerMapping\StayRoomTypeConsumerMappingSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeconsumermapping_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeConsumerMapping\StayRoomTypeConsumerMappingUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeconsumermapping_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeConsumerMapping\StayRoomTypeConsumerMappingUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeconsumermapping_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeConsumerMapping\StayRoomTypeConsumerMappingDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeconsumermapping_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeConsumerMapping\StayRoomTypeConsumerMappingDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeconsumermapping_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeConsumerMapping\StayRoomTypeConsumerMappingRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeconsumermapping_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeConsumerMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeConsumerMapping\StayRoomTypeConsumerMappingRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtypeconsumermapping_event_consumer_room_type_code_filter()
    {
        try {
            $request = new Request(
                [
                'consumer_room_type_code'  =>  'a'
                ]
            );

            $filter = new StayRoomTypeConsumerMappingQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeConsumerMapping::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}