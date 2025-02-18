<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayRoomTypeProviderMappingQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayRoomTypeProviderMappingService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayRoomTypeProviderMappingTestTraits
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

    public function test_http_stayroomtypeprovidermapping_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/stayroomtypeprovidermapping',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_stayroomtypeprovidermapping_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/stayroomtypeprovidermapping', [
            'form_params'   =>  [
                'provider_room_type_code'  =>  'a',
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
    public function test_stayroomtypeprovidermapping_model_get()
    {
        $result = AbstractStayRoomTypeProviderMappingService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayroomtypeprovidermapping_get_all()
    {
        $result = AbstractStayRoomTypeProviderMappingService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayroomtypeprovidermapping_get_paginated()
    {
        $result = AbstractStayRoomTypeProviderMappingService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_stayroomtypeprovidermapping_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeProviderMapping\StayRoomTypeProviderMappingRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeprovidermapping_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeProviderMapping\StayRoomTypeProviderMappingCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeprovidermapping_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeProviderMapping\StayRoomTypeProviderMappingCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeprovidermapping_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeProviderMapping\StayRoomTypeProviderMappingSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeprovidermapping_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeProviderMapping\StayRoomTypeProviderMappingSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeprovidermapping_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeProviderMapping\StayRoomTypeProviderMappingUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeprovidermapping_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeProviderMapping\StayRoomTypeProviderMappingUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeprovidermapping_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeProviderMapping\StayRoomTypeProviderMappingDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeprovidermapping_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeProviderMapping\StayRoomTypeProviderMappingDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeprovidermapping_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeProviderMapping\StayRoomTypeProviderMappingRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeprovidermapping_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeProviderMapping\StayRoomTypeProviderMappingRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtypeprovidermapping_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeProviderMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeProviderMapping\StayRoomTypeProviderMappingRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeprovidermapping_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeProviderMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeProviderMapping\StayRoomTypeProviderMappingCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeprovidermapping_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeProviderMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeProviderMapping\StayRoomTypeProviderMappingCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeprovidermapping_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeProviderMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeProviderMapping\StayRoomTypeProviderMappingSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeprovidermapping_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeProviderMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeProviderMapping\StayRoomTypeProviderMappingSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeprovidermapping_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeProviderMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeProviderMapping\StayRoomTypeProviderMappingUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeprovidermapping_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeProviderMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeProviderMapping\StayRoomTypeProviderMappingUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeprovidermapping_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeProviderMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeProviderMapping\StayRoomTypeProviderMappingDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeprovidermapping_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeProviderMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeProviderMapping\StayRoomTypeProviderMappingDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeprovidermapping_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeProviderMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeProviderMapping\StayRoomTypeProviderMappingRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeprovidermapping_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeProviderMapping::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeProviderMapping\StayRoomTypeProviderMappingRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtypeprovidermapping_event_provider_room_type_code_filter()
    {
        try {
            $request = new Request(
                [
                'provider_room_type_code'  =>  'a'
                ]
            );

            $filter = new StayRoomTypeProviderMappingQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeProviderMapping::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}