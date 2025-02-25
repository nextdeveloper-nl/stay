<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayHotelSupplementClassQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayHotelSupplementClassService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayHotelSupplementClassTestTraits
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

    public function test_http_stayhotelsupplementclass_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/stayhotelsupplementclass',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_stayhotelsupplementclass_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/stayhotelsupplementclass', [
            'form_params'   =>  [
                'name'  =>  'a',
                'code'  =>  'a',
                'external_id'  =>  'a',
                'applies_to'  =>  '1',
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
    public function test_stayhotelsupplementclass_model_get()
    {
        $result = AbstractStayHotelSupplementClassService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayhotelsupplementclass_get_all()
    {
        $result = AbstractStayHotelSupplementClassService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayhotelsupplementclass_get_paginated()
    {
        $result = AbstractStayHotelSupplementClassService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_stayhotelsupplementclass_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplementClass\StayHotelSupplementClassRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementclass_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplementClass\StayHotelSupplementClassCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementclass_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplementClass\StayHotelSupplementClassCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementclass_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplementClass\StayHotelSupplementClassSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementclass_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplementClass\StayHotelSupplementClassSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementclass_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplementClass\StayHotelSupplementClassUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementclass_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplementClass\StayHotelSupplementClassUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementclass_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplementClass\StayHotelSupplementClassDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementclass_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplementClass\StayHotelSupplementClassDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementclass_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplementClass\StayHotelSupplementClassRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementclass_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplementClass\StayHotelSupplementClassRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplementclass_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementClass::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplementClass\StayHotelSupplementClassRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementclass_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementClass::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplementClass\StayHotelSupplementClassCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementclass_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementClass::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplementClass\StayHotelSupplementClassCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementclass_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementClass::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplementClass\StayHotelSupplementClassSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementclass_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementClass::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplementClass\StayHotelSupplementClassSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementclass_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementClass::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplementClass\StayHotelSupplementClassUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementclass_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementClass::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplementClass\StayHotelSupplementClassUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementclass_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementClass::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplementClass\StayHotelSupplementClassDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementclass_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementClass::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplementClass\StayHotelSupplementClassDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementclass_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementClass::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplementClass\StayHotelSupplementClassRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementclass_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementClass::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplementClass\StayHotelSupplementClassRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplementclass_event_name_filter()
    {
        try {
            $request = new Request(
                [
                'name'  =>  'a'
                ]
            );

            $filter = new StayHotelSupplementClassQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementClass::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplementclass_event_code_filter()
    {
        try {
            $request = new Request(
                [
                'code'  =>  'a'
                ]
            );

            $filter = new StayHotelSupplementClassQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementClass::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplementclass_event_external_id_filter()
    {
        try {
            $request = new Request(
                [
                'external_id'  =>  'a'
                ]
            );

            $filter = new StayHotelSupplementClassQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementClass::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplementclass_event_applies_to_filter()
    {
        try {
            $request = new Request(
                [
                'applies_to'  =>  '1'
                ]
            );

            $filter = new StayHotelSupplementClassQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementClass::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplementclass_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementClassQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementClass::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplementclass_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementClassQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementClass::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplementclass_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementClassQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementClass::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplementclass_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementClassQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementClass::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplementclass_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementClassQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementClass::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplementclass_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementClassQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementClass::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplementclass_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementClassQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementClass::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplementclass_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementClassQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementClass::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplementclass_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementClassQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementClass::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}