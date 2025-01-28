<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayTarifTypeQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayTarifTypeService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayTarifTypeTestTraits
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

    public function test_http_staytariftype_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/staytariftype',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_staytariftype_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/staytariftype', [
            'form_params'   =>  [
                'name'  =>  'a',
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
    public function test_staytariftype_model_get()
    {
        $result = AbstractStayTarifTypeService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_staytariftype_get_all()
    {
        $result = AbstractStayTarifTypeService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_staytariftype_get_paginated()
    {
        $result = AbstractStayTarifTypeService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_staytariftype_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayTarifType\StayTarifTypeRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staytariftype_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayTarifType\StayTarifTypeCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staytariftype_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayTarifType\StayTarifTypeCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staytariftype_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayTarifType\StayTarifTypeSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staytariftype_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayTarifType\StayTarifTypeSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staytariftype_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayTarifType\StayTarifTypeUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staytariftype_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayTarifType\StayTarifTypeUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staytariftype_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayTarifType\StayTarifTypeDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staytariftype_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayTarifType\StayTarifTypeDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staytariftype_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayTarifType\StayTarifTypeRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staytariftype_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayTarifType\StayTarifTypeRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staytariftype_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayTarifType::first();

            event(new \NextDeveloper\Stay\Events\StayTarifType\StayTarifTypeRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staytariftype_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayTarifType::first();

            event(new \NextDeveloper\Stay\Events\StayTarifType\StayTarifTypeCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staytariftype_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayTarifType::first();

            event(new \NextDeveloper\Stay\Events\StayTarifType\StayTarifTypeCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staytariftype_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayTarifType::first();

            event(new \NextDeveloper\Stay\Events\StayTarifType\StayTarifTypeSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staytariftype_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayTarifType::first();

            event(new \NextDeveloper\Stay\Events\StayTarifType\StayTarifTypeSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staytariftype_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayTarifType::first();

            event(new \NextDeveloper\Stay\Events\StayTarifType\StayTarifTypeUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staytariftype_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayTarifType::first();

            event(new \NextDeveloper\Stay\Events\StayTarifType\StayTarifTypeUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staytariftype_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayTarifType::first();

            event(new \NextDeveloper\Stay\Events\StayTarifType\StayTarifTypeDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staytariftype_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayTarifType::first();

            event(new \NextDeveloper\Stay\Events\StayTarifType\StayTarifTypeDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staytariftype_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayTarifType::first();

            event(new \NextDeveloper\Stay\Events\StayTarifType\StayTarifTypeRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staytariftype_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayTarifType::first();

            event(new \NextDeveloper\Stay\Events\StayTarifType\StayTarifTypeRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staytariftype_event_name_filter()
    {
        try {
            $request = new Request(
                [
                'name'  =>  'a'
                ]
            );

            $filter = new StayTarifTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayTarifType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staytariftype_event_code_filter()
    {
        try {
            $request = new Request(
                [
                'code'  =>  'a'
                ]
            );

            $filter = new StayTarifTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayTarifType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staytariftype_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new StayTarifTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayTarifType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staytariftype_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new StayTarifTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayTarifType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staytariftype_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new StayTarifTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayTarifType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staytariftype_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayTarifTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayTarifType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staytariftype_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayTarifTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayTarifType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staytariftype_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayTarifTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayTarifType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staytariftype_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayTarifTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayTarifType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staytariftype_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayTarifTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayTarifType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staytariftype_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayTarifTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayTarifType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}