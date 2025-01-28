<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayRoomQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayRoomService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayRoomTestTraits
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

    public function test_http_stayroom_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/stayroom',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_stayroom_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/stayroom', [
            'form_params'   =>  [
                'display_order'  =>  '1',
                'min_child_age'  =>  '1',
                'max_infants'  =>  '1',
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
    public function test_stayroom_model_get()
    {
        $result = AbstractStayRoomService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayroom_get_all()
    {
        $result = AbstractStayRoomService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayroom_get_paginated()
    {
        $result = AbstractStayRoomService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_stayroom_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoom\StayRoomRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroom_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoom\StayRoomCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroom_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoom\StayRoomCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroom_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoom\StayRoomSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroom_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoom\StayRoomSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroom_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoom\StayRoomUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroom_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoom\StayRoomUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroom_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoom\StayRoomDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroom_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoom\StayRoomDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroom_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoom\StayRoomRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroom_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoom\StayRoomRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroom_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoom::first();

            event(new \NextDeveloper\Stay\Events\StayRoom\StayRoomRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroom_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoom::first();

            event(new \NextDeveloper\Stay\Events\StayRoom\StayRoomCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroom_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoom::first();

            event(new \NextDeveloper\Stay\Events\StayRoom\StayRoomCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroom_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoom::first();

            event(new \NextDeveloper\Stay\Events\StayRoom\StayRoomSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroom_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoom::first();

            event(new \NextDeveloper\Stay\Events\StayRoom\StayRoomSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroom_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoom::first();

            event(new \NextDeveloper\Stay\Events\StayRoom\StayRoomUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroom_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoom::first();

            event(new \NextDeveloper\Stay\Events\StayRoom\StayRoomUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroom_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoom::first();

            event(new \NextDeveloper\Stay\Events\StayRoom\StayRoomDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroom_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoom::first();

            event(new \NextDeveloper\Stay\Events\StayRoom\StayRoomDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroom_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoom::first();

            event(new \NextDeveloper\Stay\Events\StayRoom\StayRoomRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroom_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoom::first();

            event(new \NextDeveloper\Stay\Events\StayRoom\StayRoomRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroom_event_display_order_filter()
    {
        try {
            $request = new Request(
                [
                'display_order'  =>  '1'
                ]
            );

            $filter = new StayRoomQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoom::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroom_event_min_child_age_filter()
    {
        try {
            $request = new Request(
                [
                'min_child_age'  =>  '1'
                ]
            );

            $filter = new StayRoomQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoom::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroom_event_max_infants_filter()
    {
        try {
            $request = new Request(
                [
                'max_infants'  =>  '1'
                ]
            );

            $filter = new StayRoomQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoom::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroom_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new StayRoomQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoom::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroom_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new StayRoomQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoom::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroom_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new StayRoomQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoom::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroom_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayRoomQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoom::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroom_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayRoomQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoom::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroom_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayRoomQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoom::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroom_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayRoomQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoom::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroom_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayRoomQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoom::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroom_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayRoomQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoom::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n\n\n\n\n\n\n
}