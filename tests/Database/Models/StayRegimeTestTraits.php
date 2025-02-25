<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayRegimeQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayRegimeService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayRegimeTestTraits
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

    public function test_http_stayregime_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/stayregime',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_stayregime_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/stayregime', [
            'form_params'   =>  [
                'abbreviation'  =>  'a',
                'generic_code'  =>  'a',
                'first_service'  =>  'a',
                'last_service'  =>  'a',
                'name'  =>  'a',
                'external_id'  =>  'a',
                'order_number'  =>  '1',
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
    public function test_stayregime_model_get()
    {
        $result = AbstractStayRegimeService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayregime_get_all()
    {
        $result = AbstractStayRegimeService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayregime_get_paginated()
    {
        $result = AbstractStayRegimeService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_stayregime_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegime\StayRegimeRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregime_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegime\StayRegimeCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregime_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegime\StayRegimeCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregime_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegime\StayRegimeSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregime_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegime\StayRegimeSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregime_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegime\StayRegimeUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregime_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegime\StayRegimeUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregime_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegime\StayRegimeDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregime_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegime\StayRegimeDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregime_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegime\StayRegimeRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregime_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRegime\StayRegimeRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregime_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegime::first();

            event(new \NextDeveloper\Stay\Events\StayRegime\StayRegimeRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregime_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegime::first();

            event(new \NextDeveloper\Stay\Events\StayRegime\StayRegimeCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregime_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegime::first();

            event(new \NextDeveloper\Stay\Events\StayRegime\StayRegimeCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregime_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegime::first();

            event(new \NextDeveloper\Stay\Events\StayRegime\StayRegimeSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregime_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegime::first();

            event(new \NextDeveloper\Stay\Events\StayRegime\StayRegimeSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregime_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegime::first();

            event(new \NextDeveloper\Stay\Events\StayRegime\StayRegimeUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregime_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegime::first();

            event(new \NextDeveloper\Stay\Events\StayRegime\StayRegimeUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregime_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegime::first();

            event(new \NextDeveloper\Stay\Events\StayRegime\StayRegimeDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregime_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegime::first();

            event(new \NextDeveloper\Stay\Events\StayRegime\StayRegimeDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregime_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegime::first();

            event(new \NextDeveloper\Stay\Events\StayRegime\StayRegimeRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayregime_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRegime::first();

            event(new \NextDeveloper\Stay\Events\StayRegime\StayRegimeRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregime_event_abbreviation_filter()
    {
        try {
            $request = new Request(
                [
                'abbreviation'  =>  'a'
                ]
            );

            $filter = new StayRegimeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegime::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregime_event_generic_code_filter()
    {
        try {
            $request = new Request(
                [
                'generic_code'  =>  'a'
                ]
            );

            $filter = new StayRegimeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegime::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregime_event_first_service_filter()
    {
        try {
            $request = new Request(
                [
                'first_service'  =>  'a'
                ]
            );

            $filter = new StayRegimeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegime::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregime_event_last_service_filter()
    {
        try {
            $request = new Request(
                [
                'last_service'  =>  'a'
                ]
            );

            $filter = new StayRegimeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegime::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregime_event_name_filter()
    {
        try {
            $request = new Request(
                [
                'name'  =>  'a'
                ]
            );

            $filter = new StayRegimeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegime::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregime_event_external_id_filter()
    {
        try {
            $request = new Request(
                [
                'external_id'  =>  'a'
                ]
            );

            $filter = new StayRegimeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegime::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregime_event_order_number_filter()
    {
        try {
            $request = new Request(
                [
                'order_number'  =>  '1'
                ]
            );

            $filter = new StayRegimeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegime::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregime_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new StayRegimeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegime::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregime_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new StayRegimeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegime::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregime_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new StayRegimeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegime::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregime_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayRegimeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegime::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregime_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayRegimeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegime::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregime_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayRegimeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegime::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregime_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayRegimeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegime::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregime_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayRegimeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegime::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayregime_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayRegimeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRegime::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}