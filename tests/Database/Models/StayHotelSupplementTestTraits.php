<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayHotelSupplementQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayHotelSupplementService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayHotelSupplementTestTraits
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

    public function test_http_stayhotelsupplement_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/stayhotelsupplement',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_stayhotelsupplement_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/stayhotelsupplement', [
            'form_params'   =>  [
                'value'  =>  'a',
                'information'  =>  'a',
                'promo_text'  =>  'a',
                'external_id'  =>  'a',
                'price_guarantee'  =>  '1',
                'cost_price_guarantee'  =>  '1',
                'shift_days'  =>  '1',
                'priority'  =>  '1',
                'min_reservation_days'  =>  '1',
                'max_reservation_days'  =>  '1',
                'min_advance_days'  =>  '1',
                'max_advance_days'  =>  '1',
                'child_range_from_a'  =>  '1',
                'child_range_to_a'  =>  '1',
                'child_range_to_b'  =>  '1',
                'free_nights_per_each'  =>  '1',
                'free_nights_number'  =>  '1',
                'minimum_age'  =>  '1',
                'service_duration'  =>  '1',
                'min_pax'  =>  '1',
                'max_pax'  =>  '1',
                'multiple_stay_days'  =>  '1',
                'access_control_group'  =>  '1',
                'resident_application'  =>  '1',
                    'start_date'  =>  now(),
                    'end_date'  =>  now(),
                    'payment_date'  =>  now(),
                    'creation_date'  =>  now(),
                    'collection_date'  =>  now(),
                    'reservation_start_date'  =>  now(),
                    'reservation_end_date'  =>  now(),
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
    public function test_stayhotelsupplement_model_get()
    {
        $result = AbstractStayHotelSupplementService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayhotelsupplement_get_all()
    {
        $result = AbstractStayHotelSupplementService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayhotelsupplement_get_paginated()
    {
        $result = AbstractStayHotelSupplementService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_stayhotelsupplement_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplement\StayHotelSupplementRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplement_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplement\StayHotelSupplementCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplement_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplement\StayHotelSupplementCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplement_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplement\StayHotelSupplementSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplement_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplement\StayHotelSupplementSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplement_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplement\StayHotelSupplementUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplement_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplement\StayHotelSupplementUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplement_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplement\StayHotelSupplementDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplement_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplement\StayHotelSupplementDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplement_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplement\StayHotelSupplementRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplement_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplement\StayHotelSupplementRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplement\StayHotelSupplementRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplement_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplement\StayHotelSupplementCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplement_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplement\StayHotelSupplementCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplement_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplement\StayHotelSupplementSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplement_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplement\StayHotelSupplementSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplement_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplement\StayHotelSupplementUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplement_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplement\StayHotelSupplementUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplement_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplement\StayHotelSupplementDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplement_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplement\StayHotelSupplementDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplement_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplement\StayHotelSupplementRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplement_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplement\StayHotelSupplementRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_value_filter()
    {
        try {
            $request = new Request(
                [
                'value'  =>  'a'
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_information_filter()
    {
        try {
            $request = new Request(
                [
                'information'  =>  'a'
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_promo_text_filter()
    {
        try {
            $request = new Request(
                [
                'promo_text'  =>  'a'
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_external_id_filter()
    {
        try {
            $request = new Request(
                [
                'external_id'  =>  'a'
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_price_guarantee_filter()
    {
        try {
            $request = new Request(
                [
                'price_guarantee'  =>  '1'
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_cost_price_guarantee_filter()
    {
        try {
            $request = new Request(
                [
                'cost_price_guarantee'  =>  '1'
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_shift_days_filter()
    {
        try {
            $request = new Request(
                [
                'shift_days'  =>  '1'
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_priority_filter()
    {
        try {
            $request = new Request(
                [
                'priority'  =>  '1'
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_min_reservation_days_filter()
    {
        try {
            $request = new Request(
                [
                'min_reservation_days'  =>  '1'
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_max_reservation_days_filter()
    {
        try {
            $request = new Request(
                [
                'max_reservation_days'  =>  '1'
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_min_advance_days_filter()
    {
        try {
            $request = new Request(
                [
                'min_advance_days'  =>  '1'
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_max_advance_days_filter()
    {
        try {
            $request = new Request(
                [
                'max_advance_days'  =>  '1'
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_child_range_from_a_filter()
    {
        try {
            $request = new Request(
                [
                'child_range_from_a'  =>  '1'
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_child_range_to_a_filter()
    {
        try {
            $request = new Request(
                [
                'child_range_to_a'  =>  '1'
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_child_range_to_b_filter()
    {
        try {
            $request = new Request(
                [
                'child_range_to_b'  =>  '1'
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_free_nights_per_each_filter()
    {
        try {
            $request = new Request(
                [
                'free_nights_per_each'  =>  '1'
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_free_nights_number_filter()
    {
        try {
            $request = new Request(
                [
                'free_nights_number'  =>  '1'
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_minimum_age_filter()
    {
        try {
            $request = new Request(
                [
                'minimum_age'  =>  '1'
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_service_duration_filter()
    {
        try {
            $request = new Request(
                [
                'service_duration'  =>  '1'
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_min_pax_filter()
    {
        try {
            $request = new Request(
                [
                'min_pax'  =>  '1'
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_max_pax_filter()
    {
        try {
            $request = new Request(
                [
                'max_pax'  =>  '1'
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_multiple_stay_days_filter()
    {
        try {
            $request = new Request(
                [
                'multiple_stay_days'  =>  '1'
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_access_control_group_filter()
    {
        try {
            $request = new Request(
                [
                'access_control_group'  =>  '1'
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_resident_application_filter()
    {
        try {
            $request = new Request(
                [
                'resident_application'  =>  '1'
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_start_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'start_dateStart'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_end_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'end_dateStart'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_payment_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'payment_dateStart'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_creation_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'creation_dateStart'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_collection_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'collection_dateStart'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_reservation_start_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'reservation_start_dateStart'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_reservation_end_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'reservation_end_dateStart'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_start_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'start_dateEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_end_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'end_dateEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_payment_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'payment_dateEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_creation_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'creation_dateEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_collection_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'collection_dateEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_reservation_start_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'reservation_start_dateEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_reservation_end_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'reservation_end_dateEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_start_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'start_dateStart'  =>  now(),
                'start_dateEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_end_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'end_dateStart'  =>  now(),
                'end_dateEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_payment_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'payment_dateStart'  =>  now(),
                'payment_dateEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_creation_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'creation_dateStart'  =>  now(),
                'creation_dateEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_collection_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'collection_dateStart'  =>  now(),
                'collection_dateEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_reservation_start_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'reservation_start_dateStart'  =>  now(),
                'reservation_start_dateEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_reservation_end_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'reservation_end_dateStart'  =>  now(),
                'reservation_end_dateEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplement_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplement::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}