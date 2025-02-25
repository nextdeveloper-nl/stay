<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StaySupplementTypeQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStaySupplementTypeService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StaySupplementTypeTestTraits
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

    public function test_http_staysupplementtype_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/staysupplementtype',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_staysupplementtype_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/staysupplementtype', [
            'form_params'   =>  [
                'name'  =>  'a',
                'class'  =>  'a',
                'control_maintenance'  =>  'a',
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
    public function test_staysupplementtype_model_get()
    {
        $result = AbstractStaySupplementTypeService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_staysupplementtype_get_all()
    {
        $result = AbstractStaySupplementTypeService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_staysupplementtype_get_paginated()
    {
        $result = AbstractStaySupplementTypeService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_staysupplementtype_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StaySupplementType\StaySupplementTypeRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysupplementtype_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StaySupplementType\StaySupplementTypeCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysupplementtype_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StaySupplementType\StaySupplementTypeCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysupplementtype_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StaySupplementType\StaySupplementTypeSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysupplementtype_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StaySupplementType\StaySupplementTypeSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysupplementtype_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StaySupplementType\StaySupplementTypeUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysupplementtype_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StaySupplementType\StaySupplementTypeUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysupplementtype_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StaySupplementType\StaySupplementTypeDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysupplementtype_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StaySupplementType\StaySupplementTypeDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysupplementtype_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StaySupplementType\StaySupplementTypeRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysupplementtype_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StaySupplementType\StaySupplementTypeRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysupplementtype_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StaySupplementType::first();

            event(new \NextDeveloper\Stay\Events\StaySupplementType\StaySupplementTypeRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysupplementtype_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StaySupplementType::first();

            event(new \NextDeveloper\Stay\Events\StaySupplementType\StaySupplementTypeCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysupplementtype_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StaySupplementType::first();

            event(new \NextDeveloper\Stay\Events\StaySupplementType\StaySupplementTypeCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysupplementtype_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StaySupplementType::first();

            event(new \NextDeveloper\Stay\Events\StaySupplementType\StaySupplementTypeSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysupplementtype_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StaySupplementType::first();

            event(new \NextDeveloper\Stay\Events\StaySupplementType\StaySupplementTypeSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysupplementtype_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StaySupplementType::first();

            event(new \NextDeveloper\Stay\Events\StaySupplementType\StaySupplementTypeUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysupplementtype_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StaySupplementType::first();

            event(new \NextDeveloper\Stay\Events\StaySupplementType\StaySupplementTypeUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysupplementtype_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StaySupplementType::first();

            event(new \NextDeveloper\Stay\Events\StaySupplementType\StaySupplementTypeDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysupplementtype_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StaySupplementType::first();

            event(new \NextDeveloper\Stay\Events\StaySupplementType\StaySupplementTypeDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysupplementtype_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StaySupplementType::first();

            event(new \NextDeveloper\Stay\Events\StaySupplementType\StaySupplementTypeRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysupplementtype_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StaySupplementType::first();

            event(new \NextDeveloper\Stay\Events\StaySupplementType\StaySupplementTypeRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysupplementtype_event_name_filter()
    {
        try {
            $request = new Request(
                [
                'name'  =>  'a'
                ]
            );

            $filter = new StaySupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysupplementtype_event_class_filter()
    {
        try {
            $request = new Request(
                [
                'class'  =>  'a'
                ]
            );

            $filter = new StaySupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysupplementtype_event_control_maintenance_filter()
    {
        try {
            $request = new Request(
                [
                'control_maintenance'  =>  'a'
                ]
            );

            $filter = new StaySupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysupplementtype_event_external_id_filter()
    {
        try {
            $request = new Request(
                [
                'external_id'  =>  'a'
                ]
            );

            $filter = new StaySupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysupplementtype_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new StaySupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysupplementtype_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new StaySupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysupplementtype_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new StaySupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysupplementtype_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StaySupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysupplementtype_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StaySupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysupplementtype_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StaySupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysupplementtype_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StaySupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysupplementtype_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StaySupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysupplementtype_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StaySupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}