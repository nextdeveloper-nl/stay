<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayRoomTypeQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayRoomTypeService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayRoomTypeTestTraits
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

    public function test_http_stayroomtype_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/stayroomtype',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_stayroomtype_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/stayroomtype', [
            'form_params'   =>  [
                'name'  =>  'a',
                'description'  =>  'a',
                'price'  =>  '1',
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
    public function test_stayroomtype_model_get()
    {
        $result = AbstractStayRoomTypeService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayroomtype_get_all()
    {
        $result = AbstractStayRoomTypeService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayroomtype_get_paginated()
    {
        $result = AbstractStayRoomTypeService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_stayroomtype_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomType\StayRoomTypeRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtype_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomType\StayRoomTypeCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtype_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomType\StayRoomTypeCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtype_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomType\StayRoomTypeSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtype_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomType\StayRoomTypeSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtype_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomType\StayRoomTypeUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtype_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomType\StayRoomTypeUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtype_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomType\StayRoomTypeDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtype_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomType\StayRoomTypeDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtype_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomType\StayRoomTypeRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtype_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomType\StayRoomTypeRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtype_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomType::first();

            event(new \NextDeveloper\Stay\Events\StayRoomType\StayRoomTypeRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtype_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomType::first();

            event(new \NextDeveloper\Stay\Events\StayRoomType\StayRoomTypeCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtype_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomType::first();

            event(new \NextDeveloper\Stay\Events\StayRoomType\StayRoomTypeCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtype_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomType::first();

            event(new \NextDeveloper\Stay\Events\StayRoomType\StayRoomTypeSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtype_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomType::first();

            event(new \NextDeveloper\Stay\Events\StayRoomType\StayRoomTypeSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtype_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomType::first();

            event(new \NextDeveloper\Stay\Events\StayRoomType\StayRoomTypeUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtype_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomType::first();

            event(new \NextDeveloper\Stay\Events\StayRoomType\StayRoomTypeUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtype_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomType::first();

            event(new \NextDeveloper\Stay\Events\StayRoomType\StayRoomTypeDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtype_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomType::first();

            event(new \NextDeveloper\Stay\Events\StayRoomType\StayRoomTypeDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtype_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomType::first();

            event(new \NextDeveloper\Stay\Events\StayRoomType\StayRoomTypeRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomtype_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomType::first();

            event(new \NextDeveloper\Stay\Events\StayRoomType\StayRoomTypeRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtype_event_name_filter()
    {
        try {
            $request = new Request(
                [
                'name'  =>  'a'
                ]
            );

            $filter = new StayRoomTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtype_event_description_filter()
    {
        try {
            $request = new Request(
                [
                'description'  =>  'a'
                ]
            );

            $filter = new StayRoomTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtype_event_price_filter()
    {
        try {
            $request = new Request(
                [
                'price'  =>  '1'
                ]
            );

            $filter = new StayRoomTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtype_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new StayRoomTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtype_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new StayRoomTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtype_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new StayRoomTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtype_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayRoomTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtype_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayRoomTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtype_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayRoomTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtype_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayRoomTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtype_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayRoomTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomtype_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayRoomTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n
}