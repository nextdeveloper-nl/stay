<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayRoomTypeOccupationQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayRoomTypeOccupationService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayRoomTypeOccupationTestTraits
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

    public function test_http_stayroomtypeoccupation_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/stayroomtypeoccupation',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_stayroomtypeoccupation_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/stayroomtypeoccupation', [
            'form_params'   =>  [
                'external_id'  =>  'a',
                'adults_min'  =>  '1',
                'adults_max'  =>  '1',
                'children_min'  =>  '1',
                'children_max'  =>  '1',
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
    public function test_stayroomtypeoccupation_model_get()
    {
        $result = AbstractStayRoomTypeOccupationService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayroomtypeoccupation_get_all()
    {
        $result = AbstractStayRoomTypeOccupationService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayroomtypeoccupation_get_paginated()
    {
        $result = AbstractStayRoomTypeOccupationService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_stayroomtypeoccupation_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeOccupation\StayRoomTypeOccupationRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeoccupation_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeOccupation\StayRoomTypeOccupationCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeoccupation_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeOccupation\StayRoomTypeOccupationCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeoccupation_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeOccupation\StayRoomTypeOccupationSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeoccupation_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeOccupation\StayRoomTypeOccupationSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeoccupation_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeOccupation\StayRoomTypeOccupationUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeoccupation_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeOccupation\StayRoomTypeOccupationUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeoccupation_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeOccupation\StayRoomTypeOccupationDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeoccupation_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeOccupation\StayRoomTypeOccupationDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeoccupation_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeOccupation\StayRoomTypeOccupationRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeoccupation_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomTypeOccupation\StayRoomTypeOccupationRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtypeoccupation_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeOccupation::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeOccupation\StayRoomTypeOccupationRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeoccupation_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeOccupation::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeOccupation\StayRoomTypeOccupationCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeoccupation_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeOccupation::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeOccupation\StayRoomTypeOccupationCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeoccupation_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeOccupation::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeOccupation\StayRoomTypeOccupationSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeoccupation_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeOccupation::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeOccupation\StayRoomTypeOccupationSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeoccupation_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeOccupation::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeOccupation\StayRoomTypeOccupationUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeoccupation_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeOccupation::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeOccupation\StayRoomTypeOccupationUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeoccupation_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeOccupation::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeOccupation\StayRoomTypeOccupationDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeoccupation_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeOccupation::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeOccupation\StayRoomTypeOccupationDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeoccupation_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeOccupation::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeOccupation\StayRoomTypeOccupationRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtypeoccupation_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeOccupation::first();

            event(new \NextDeveloper\Stay\Events\StayRoomTypeOccupation\StayRoomTypeOccupationRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtypeoccupation_event_external_id_filter()
    {
        try {
            $request = new Request(
                [
                'external_id'  =>  'a'
                ]
            );

            $filter = new StayRoomTypeOccupationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeOccupation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtypeoccupation_event_adults_min_filter()
    {
        try {
            $request = new Request(
                [
                'adults_min'  =>  '1'
                ]
            );

            $filter = new StayRoomTypeOccupationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeOccupation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtypeoccupation_event_adults_max_filter()
    {
        try {
            $request = new Request(
                [
                'adults_max'  =>  '1'
                ]
            );

            $filter = new StayRoomTypeOccupationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeOccupation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtypeoccupation_event_children_min_filter()
    {
        try {
            $request = new Request(
                [
                'children_min'  =>  '1'
                ]
            );

            $filter = new StayRoomTypeOccupationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeOccupation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtypeoccupation_event_children_max_filter()
    {
        try {
            $request = new Request(
                [
                'children_max'  =>  '1'
                ]
            );

            $filter = new StayRoomTypeOccupationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeOccupation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtypeoccupation_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new StayRoomTypeOccupationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeOccupation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtypeoccupation_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new StayRoomTypeOccupationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeOccupation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtypeoccupation_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new StayRoomTypeOccupationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeOccupation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtypeoccupation_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayRoomTypeOccupationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeOccupation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtypeoccupation_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayRoomTypeOccupationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeOccupation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtypeoccupation_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayRoomTypeOccupationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeOccupation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtypeoccupation_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayRoomTypeOccupationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeOccupation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtypeoccupation_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayRoomTypeOccupationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeOccupation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtypeoccupation_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayRoomTypeOccupationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomTypeOccupation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}