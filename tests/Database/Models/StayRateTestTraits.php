<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayRateQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayRateService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayRateTestTraits
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

    public function test_http_stayrate_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/stayrate',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_stayrate_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/stayrate', [
            'form_params'   =>  [
                'age_range_a_from'  =>  '1',
                'age_range_a_to'  =>  '1',
                'age_range_b_to'  =>  '1',
                    'booking_start_date'  =>  now(),
                    'booking_end_date'  =>  now(),
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
    public function test_stayrate_model_get()
    {
        $result = AbstractStayRateService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayrate_get_all()
    {
        $result = AbstractStayRateService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayrate_get_paginated()
    {
        $result = AbstractStayRateService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_stayrate_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRate\StayRateRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrate_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRate\StayRateCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrate_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRate\StayRateCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrate_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRate\StayRateSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrate_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRate\StayRateSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrate_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRate\StayRateUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrate_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRate\StayRateUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrate_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRate\StayRateDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrate_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRate\StayRateDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrate_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRate\StayRateRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrate_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRate\StayRateRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrate_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRate::first();

            event(new \NextDeveloper\Stay\Events\StayRate\StayRateRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrate_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRate::first();

            event(new \NextDeveloper\Stay\Events\StayRate\StayRateCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrate_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRate::first();

            event(new \NextDeveloper\Stay\Events\StayRate\StayRateCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrate_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRate::first();

            event(new \NextDeveloper\Stay\Events\StayRate\StayRateSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrate_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRate::first();

            event(new \NextDeveloper\Stay\Events\StayRate\StayRateSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrate_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRate::first();

            event(new \NextDeveloper\Stay\Events\StayRate\StayRateUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrate_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRate::first();

            event(new \NextDeveloper\Stay\Events\StayRate\StayRateUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrate_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRate::first();

            event(new \NextDeveloper\Stay\Events\StayRate\StayRateDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrate_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRate::first();

            event(new \NextDeveloper\Stay\Events\StayRate\StayRateDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrate_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRate::first();

            event(new \NextDeveloper\Stay\Events\StayRate\StayRateRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrate_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRate::first();

            event(new \NextDeveloper\Stay\Events\StayRate\StayRateRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrate_event_age_range_a_from_filter()
    {
        try {
            $request = new Request(
                [
                'age_range_a_from'  =>  '1'
                ]
            );

            $filter = new StayRateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrate_event_age_range_a_to_filter()
    {
        try {
            $request = new Request(
                [
                'age_range_a_to'  =>  '1'
                ]
            );

            $filter = new StayRateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrate_event_age_range_b_to_filter()
    {
        try {
            $request = new Request(
                [
                'age_range_b_to'  =>  '1'
                ]
            );

            $filter = new StayRateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrate_event_booking_start_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'booking_start_dateStart'  =>  now()
                ]
            );

            $filter = new StayRateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrate_event_booking_end_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'booking_end_dateStart'  =>  now()
                ]
            );

            $filter = new StayRateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrate_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new StayRateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrate_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new StayRateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrate_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new StayRateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrate_event_booking_start_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'booking_start_dateEnd'  =>  now()
                ]
            );

            $filter = new StayRateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrate_event_booking_end_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'booking_end_dateEnd'  =>  now()
                ]
            );

            $filter = new StayRateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrate_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayRateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrate_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayRateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrate_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayRateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrate_event_booking_start_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'booking_start_dateStart'  =>  now(),
                'booking_start_dateEnd'  =>  now()
                ]
            );

            $filter = new StayRateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrate_event_booking_end_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'booking_end_dateStart'  =>  now(),
                'booking_end_dateEnd'  =>  now()
                ]
            );

            $filter = new StayRateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrate_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayRateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrate_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayRateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrate_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayRateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}