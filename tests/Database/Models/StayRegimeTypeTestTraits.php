<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayRegimeTypeQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayRegimeTypeService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayRegimeTypeTestTraits
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

    public function test_http_stayregimetype_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/stayregimetype',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_stayregimetype_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/stayregimetype', [
            'form_params'   =>  [
                'name_es'  =>  'a',
                'description_es'  =>  'a',
                'name_en'  =>  'a',
                'description_en'  =>  'a',
                'code'  =>  'a',
                'external_id'  =>  'a',
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
    public function test_stayregimetype_model_get()
    {
        $result = AbstractStayRegimeTypeService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayregimetype_get_all()
    {
        $result = AbstractStayRegimeTypeService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayregimetype_get_paginated()
    {
        $result = AbstractStayRegimeTypeService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_stayregimetype_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegimeType\StayRegimeTypeRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimetype_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegimeType\StayRegimeTypeCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimetype_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegimeType\StayRegimeTypeCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimetype_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegimeType\StayRegimeTypeSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimetype_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegimeType\StayRegimeTypeSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimetype_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegimeType\StayRegimeTypeUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimetype_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegimeType\StayRegimeTypeUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimetype_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegimeType\StayRegimeTypeDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimetype_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegimeType\StayRegimeTypeDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimetype_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegimeType\StayRegimeTypeRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimetype_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegimeType\StayRegimeTypeRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregimetype_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegimeType::first();

            event(new \NextDeveloper\Stay\Events\StayRegimeType\StayRegimeTypeRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimetype_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegimeType::first();

            event(new \NextDeveloper\Stay\Events\StayRegimeType\StayRegimeTypeCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimetype_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegimeType::first();

            event(new \NextDeveloper\Stay\Events\StayRegimeType\StayRegimeTypeCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimetype_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegimeType::first();

            event(new \NextDeveloper\Stay\Events\StayRegimeType\StayRegimeTypeSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimetype_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegimeType::first();

            event(new \NextDeveloper\Stay\Events\StayRegimeType\StayRegimeTypeSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimetype_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegimeType::first();

            event(new \NextDeveloper\Stay\Events\StayRegimeType\StayRegimeTypeUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimetype_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegimeType::first();

            event(new \NextDeveloper\Stay\Events\StayRegimeType\StayRegimeTypeUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimetype_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegimeType::first();

            event(new \NextDeveloper\Stay\Events\StayRegimeType\StayRegimeTypeDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimetype_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegimeType::first();

            event(new \NextDeveloper\Stay\Events\StayRegimeType\StayRegimeTypeDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimetype_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegimeType::first();

            event(new \NextDeveloper\Stay\Events\StayRegimeType\StayRegimeTypeRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregimetype_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegimeType::first();

            event(new \NextDeveloper\Stay\Events\StayRegimeType\StayRegimeTypeRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregimetype_event_name_es_filter()
    {
        try {
            $request = new Request(
                [
                'name_es'  =>  'a'
                ]
            );

            $filter = new StayRegimeTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegimeType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregimetype_event_description_es_filter()
    {
        try {
            $request = new Request(
                [
                'description_es'  =>  'a'
                ]
            );

            $filter = new StayRegimeTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegimeType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregimetype_event_name_en_filter()
    {
        try {
            $request = new Request(
                [
                'name_en'  =>  'a'
                ]
            );

            $filter = new StayRegimeTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegimeType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregimetype_event_description_en_filter()
    {
        try {
            $request = new Request(
                [
                'description_en'  =>  'a'
                ]
            );

            $filter = new StayRegimeTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegimeType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregimetype_event_code_filter()
    {
        try {
            $request = new Request(
                [
                'code'  =>  'a'
                ]
            );

            $filter = new StayRegimeTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegimeType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregimetype_event_external_id_filter()
    {
        try {
            $request = new Request(
                [
                'external_id'  =>  'a'
                ]
            );

            $filter = new StayRegimeTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegimeType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregimetype_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new StayRegimeTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegimeType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregimetype_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new StayRegimeTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegimeType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregimetype_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new StayRegimeTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegimeType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregimetype_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayRegimeTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegimeType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregimetype_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayRegimeTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegimeType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregimetype_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayRegimeTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegimeType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregimetype_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayRegimeTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegimeType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregimetype_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayRegimeTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegimeType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregimetype_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayRegimeTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegimeType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}