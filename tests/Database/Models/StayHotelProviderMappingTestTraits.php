<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayHotelProviderMappingQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayHotelProviderMappingService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayHotelProviderMappingTestTraits
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

    public function test_http_stayhotelprovidermapping_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/stayhotelprovidermapping',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_stayhotelprovidermapping_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/stayhotelprovidermapping', [
            'form_params'   =>  [
                'provider_hotel_code'  =>  'a',
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
    public function test_stayhotelprovidermapping_model_get()
    {
        $result = AbstractStayHotelProviderMappingService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayhotelprovidermapping_get_all()
    {
        $result = AbstractStayHotelProviderMappingService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayhotelprovidermapping_get_paginated()
    {
        $result = AbstractStayHotelProviderMappingService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_stayhotelprovidermapping_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelProviderMapping\StayHotelProviderMappingRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelprovidermapping_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelProviderMapping\StayHotelProviderMappingCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelprovidermapping_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelProviderMapping\StayHotelProviderMappingCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelprovidermapping_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelProviderMapping\StayHotelProviderMappingSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelprovidermapping_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelProviderMapping\StayHotelProviderMappingSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelprovidermapping_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelProviderMapping\StayHotelProviderMappingUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelprovidermapping_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelProviderMapping\StayHotelProviderMappingUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelprovidermapping_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelProviderMapping\StayHotelProviderMappingDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelprovidermapping_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelProviderMapping\StayHotelProviderMappingDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelprovidermapping_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelProviderMapping\StayHotelProviderMappingRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelprovidermapping_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelProviderMapping\StayHotelProviderMappingRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelprovidermapping_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelProviderMapping::first();

            event(new \NextDeveloper\Stay\Events\StayHotelProviderMapping\StayHotelProviderMappingRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelprovidermapping_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelProviderMapping::first();

            event(new \NextDeveloper\Stay\Events\StayHotelProviderMapping\StayHotelProviderMappingCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelprovidermapping_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelProviderMapping::first();

            event(new \NextDeveloper\Stay\Events\StayHotelProviderMapping\StayHotelProviderMappingCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelprovidermapping_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelProviderMapping::first();

            event(new \NextDeveloper\Stay\Events\StayHotelProviderMapping\StayHotelProviderMappingSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelprovidermapping_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelProviderMapping::first();

            event(new \NextDeveloper\Stay\Events\StayHotelProviderMapping\StayHotelProviderMappingSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelprovidermapping_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelProviderMapping::first();

            event(new \NextDeveloper\Stay\Events\StayHotelProviderMapping\StayHotelProviderMappingUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelprovidermapping_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelProviderMapping::first();

            event(new \NextDeveloper\Stay\Events\StayHotelProviderMapping\StayHotelProviderMappingUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelprovidermapping_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelProviderMapping::first();

            event(new \NextDeveloper\Stay\Events\StayHotelProviderMapping\StayHotelProviderMappingDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelprovidermapping_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelProviderMapping::first();

            event(new \NextDeveloper\Stay\Events\StayHotelProviderMapping\StayHotelProviderMappingDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelprovidermapping_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelProviderMapping::first();

            event(new \NextDeveloper\Stay\Events\StayHotelProviderMapping\StayHotelProviderMappingRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelprovidermapping_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelProviderMapping::first();

            event(new \NextDeveloper\Stay\Events\StayHotelProviderMapping\StayHotelProviderMappingRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelprovidermapping_event_provider_hotel_code_filter()
    {
        try {
            $request = new Request(
                [
                'provider_hotel_code'  =>  'a'
                ]
            );

            $filter = new StayHotelProviderMappingQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelProviderMapping::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}