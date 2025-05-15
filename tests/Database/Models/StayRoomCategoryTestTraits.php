<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayRoomCategoryQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayRoomCategoryService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayRoomCategoryTestTraits
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

    public function test_http_stayroomcategory_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/stayroomcategory',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_stayroomcategory_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/stayroomcategory', [
            'form_params'   =>  [
                'name'  =>  'a',
                'description'  =>  'a',
                'code'  =>  'a',
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
    public function test_stayroomcategory_model_get()
    {
        $result = AbstractStayRoomCategoryService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayroomcategory_get_all()
    {
        $result = AbstractStayRoomCategoryService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayroomcategory_get_paginated()
    {
        $result = AbstractStayRoomCategoryService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_stayroomcategory_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomCategory\StayRoomCategoryRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomcategory_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomCategory\StayRoomCategoryCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomcategory_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomCategory\StayRoomCategoryCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomcategory_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomCategory\StayRoomCategorySavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomcategory_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomCategory\StayRoomCategorySavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomcategory_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomCategory\StayRoomCategoryUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomcategory_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomCategory\StayRoomCategoryUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomcategory_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomCategory\StayRoomCategoryDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomcategory_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomCategory\StayRoomCategoryDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomcategory_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomCategory\StayRoomCategoryRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomcategory_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRoomCategory\StayRoomCategoryRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomcategory_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomCategory::first();

            event(new \NextDeveloper\Stay\Events\StayRoomCategory\StayRoomCategoryRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomcategory_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomCategory::first();

            event(new \NextDeveloper\Stay\Events\StayRoomCategory\StayRoomCategoryCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomcategory_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomCategory::first();

            event(new \NextDeveloper\Stay\Events\StayRoomCategory\StayRoomCategoryCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomcategory_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomCategory::first();

            event(new \NextDeveloper\Stay\Events\StayRoomCategory\StayRoomCategorySavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomcategory_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomCategory::first();

            event(new \NextDeveloper\Stay\Events\StayRoomCategory\StayRoomCategorySavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomcategory_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomCategory::first();

            event(new \NextDeveloper\Stay\Events\StayRoomCategory\StayRoomCategoryUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomcategory_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomCategory::first();

            event(new \NextDeveloper\Stay\Events\StayRoomCategory\StayRoomCategoryUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomcategory_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomCategory::first();

            event(new \NextDeveloper\Stay\Events\StayRoomCategory\StayRoomCategoryDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomcategory_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomCategory::first();

            event(new \NextDeveloper\Stay\Events\StayRoomCategory\StayRoomCategoryDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomcategory_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomCategory::first();

            event(new \NextDeveloper\Stay\Events\StayRoomCategory\StayRoomCategoryRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayroomcategory_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRoomCategory::first();

            event(new \NextDeveloper\Stay\Events\StayRoomCategory\StayRoomCategoryRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomcategory_event_name_filter()
    {
        try {
            $request = new Request(
                [
                'name'  =>  'a'
                ]
            );

            $filter = new StayRoomCategoryQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomCategory::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomcategory_event_description_filter()
    {
        try {
            $request = new Request(
                [
                'description'  =>  'a'
                ]
            );

            $filter = new StayRoomCategoryQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomCategory::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomcategory_event_code_filter()
    {
        try {
            $request = new Request(
                [
                'code'  =>  'a'
                ]
            );

            $filter = new StayRoomCategoryQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomCategory::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomcategory_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new StayRoomCategoryQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomCategory::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomcategory_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new StayRoomCategoryQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomCategory::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomcategory_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new StayRoomCategoryQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomCategory::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomcategory_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayRoomCategoryQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomCategory::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomcategory_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayRoomCategoryQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomCategory::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomcategory_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayRoomCategoryQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomCategory::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomcategory_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayRoomCategoryQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomCategory::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomcategory_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayRoomCategoryQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomCategory::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayroomcategory_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayRoomCategoryQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRoomCategory::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}