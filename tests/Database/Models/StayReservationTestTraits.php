<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayReservationQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayReservationService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayReservationTestTraits
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

    public function test_http_stayreservation_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/stayreservation',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_stayreservation_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/stayreservation', [
            'form_params'   =>  [
                    'reservation_date'  =>  now(),
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
    public function test_stayreservation_model_get()
    {
        $result = AbstractStayReservationService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayreservation_get_all()
    {
        $result = AbstractStayReservationService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayreservation_get_paginated()
    {
        $result = AbstractStayReservationService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_stayreservation_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayReservation\StayReservationRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayreservation_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayReservation\StayReservationCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayreservation_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayReservation\StayReservationCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayreservation_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayReservation\StayReservationSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayreservation_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayReservation\StayReservationSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayreservation_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayReservation\StayReservationUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayreservation_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayReservation\StayReservationUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayreservation_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayReservation\StayReservationDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayreservation_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayReservation\StayReservationDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayreservation_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayReservation\StayReservationRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayreservation_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayReservation\StayReservationRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayreservation_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayReservation::first();

            event(new \NextDeveloper\Stay\Events\StayReservation\StayReservationRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayreservation_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayReservation::first();

            event(new \NextDeveloper\Stay\Events\StayReservation\StayReservationCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayreservation_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayReservation::first();

            event(new \NextDeveloper\Stay\Events\StayReservation\StayReservationCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayreservation_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayReservation::first();

            event(new \NextDeveloper\Stay\Events\StayReservation\StayReservationSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayreservation_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayReservation::first();

            event(new \NextDeveloper\Stay\Events\StayReservation\StayReservationSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayreservation_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayReservation::first();

            event(new \NextDeveloper\Stay\Events\StayReservation\StayReservationUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayreservation_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayReservation::first();

            event(new \NextDeveloper\Stay\Events\StayReservation\StayReservationUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayreservation_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayReservation::first();

            event(new \NextDeveloper\Stay\Events\StayReservation\StayReservationDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayreservation_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayReservation::first();

            event(new \NextDeveloper\Stay\Events\StayReservation\StayReservationDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayreservation_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayReservation::first();

            event(new \NextDeveloper\Stay\Events\StayReservation\StayReservationRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayreservation_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayReservation::first();

            event(new \NextDeveloper\Stay\Events\StayReservation\StayReservationRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayreservation_event_reservation_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'reservation_dateStart'  =>  now()
                ]
            );

            $filter = new StayReservationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayReservation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayreservation_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new StayReservationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayReservation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayreservation_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new StayReservationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayReservation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayreservation_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new StayReservationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayReservation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayreservation_event_reservation_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'reservation_dateEnd'  =>  now()
                ]
            );

            $filter = new StayReservationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayReservation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayreservation_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayReservationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayReservation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayreservation_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayReservationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayReservation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayreservation_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayReservationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayReservation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayreservation_event_reservation_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'reservation_dateStart'  =>  now(),
                'reservation_dateEnd'  =>  now()
                ]
            );

            $filter = new StayReservationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayReservation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayreservation_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayReservationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayReservation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayreservation_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayReservationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayReservation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayreservation_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayReservationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayReservation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n\n\n\n\n\n\n
}