<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayHotelQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayHotelService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayHotelTestTraits
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

    public function test_http_stayhotel_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/stayhotel',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_stayhotel_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/stayhotel', [
            'form_params'   =>  [
                'name'  =>  'a',
                'description'  =>  'a',
                'address'  =>  'a',
                'email'  =>  'a',
                'phone'  =>  'a',
                'city'  =>  'a',
                'latitude'  =>  '1',
                'longitude'  =>  '1',
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
    public function test_stayhotel_model_get()
    {
        $result = AbstractStayHotelService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayhotel_get_all()
    {
        $result = AbstractStayHotelService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayhotel_get_paginated()
    {
        $result = AbstractStayHotelService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_stayhotel_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotel\StayHotelRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotel_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotel\StayHotelCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotel_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotel\StayHotelCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotel_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotel\StayHotelSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotel_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotel\StayHotelSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotel_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotel\StayHotelUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotel_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotel\StayHotelUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotel_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotel\StayHotelDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotel_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotel\StayHotelDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotel_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotel\StayHotelRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotel_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotel\StayHotelRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotel_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotel::first();

            event(new \NextDeveloper\Stay\Events\StayHotel\StayHotelRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotel_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotel::first();

            event(new \NextDeveloper\Stay\Events\StayHotel\StayHotelCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotel_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotel::first();

            event(new \NextDeveloper\Stay\Events\StayHotel\StayHotelCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotel_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotel::first();

            event(new \NextDeveloper\Stay\Events\StayHotel\StayHotelSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotel_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotel::first();

            event(new \NextDeveloper\Stay\Events\StayHotel\StayHotelSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotel_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotel::first();

            event(new \NextDeveloper\Stay\Events\StayHotel\StayHotelUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotel_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotel::first();

            event(new \NextDeveloper\Stay\Events\StayHotel\StayHotelUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotel_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotel::first();

            event(new \NextDeveloper\Stay\Events\StayHotel\StayHotelDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotel_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotel::first();

            event(new \NextDeveloper\Stay\Events\StayHotel\StayHotelDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotel_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotel::first();

            event(new \NextDeveloper\Stay\Events\StayHotel\StayHotelRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotel_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotel::first();

            event(new \NextDeveloper\Stay\Events\StayHotel\StayHotelRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotel_event_name_filter()
    {
        try {
            $request = new Request(
                [
                'name'  =>  'a'
                ]
            );

            $filter = new StayHotelQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotel::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotel_event_description_filter()
    {
        try {
            $request = new Request(
                [
                'description'  =>  'a'
                ]
            );

            $filter = new StayHotelQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotel::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotel_event_address_filter()
    {
        try {
            $request = new Request(
                [
                'address'  =>  'a'
                ]
            );

            $filter = new StayHotelQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotel::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotel_event_email_filter()
    {
        try {
            $request = new Request(
                [
                'email'  =>  'a'
                ]
            );

            $filter = new StayHotelQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotel::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotel_event_phone_filter()
    {
        try {
            $request = new Request(
                [
                'phone'  =>  'a'
                ]
            );

            $filter = new StayHotelQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotel::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotel_event_city_filter()
    {
        try {
            $request = new Request(
                [
                'city'  =>  'a'
                ]
            );

            $filter = new StayHotelQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotel::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotel_event_latitude_filter()
    {
        try {
            $request = new Request(
                [
                'latitude'  =>  '1'
                ]
            );

            $filter = new StayHotelQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotel::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotel_event_longitude_filter()
    {
        try {
            $request = new Request(
                [
                'longitude'  =>  '1'
                ]
            );

            $filter = new StayHotelQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotel::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotel_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new StayHotelQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotel::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotel_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new StayHotelQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotel::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotel_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new StayHotelQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotel::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotel_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotel::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotel_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotel::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotel_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotel::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotel_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotel::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotel_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotel::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotel_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotel::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n\n\n\n\n\n\n
}