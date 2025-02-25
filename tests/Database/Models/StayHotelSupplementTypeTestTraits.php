<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayHotelSupplementTypeQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayHotelSupplementTypeService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayHotelSupplementTypeTestTraits
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

    public function test_http_stayhotelsupplementtype_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/stayhotelsupplementtype',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_stayhotelsupplementtype_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/stayhotelsupplementtype', [
            'form_params'   =>  [
                'name'  =>  'a',
                'class'  =>  'a',
                'maintenance_control'  =>  'a',
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
    public function test_stayhotelsupplementtype_model_get()
    {
        $result = AbstractStayHotelSupplementTypeService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayhotelsupplementtype_get_all()
    {
        $result = AbstractStayHotelSupplementTypeService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayhotelsupplementtype_get_paginated()
    {
        $result = AbstractStayHotelSupplementTypeService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_stayhotelsupplementtype_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplementType\StayHotelSupplementTypeRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementtype_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplementType\StayHotelSupplementTypeCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementtype_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplementType\StayHotelSupplementTypeCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementtype_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplementType\StayHotelSupplementTypeSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementtype_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplementType\StayHotelSupplementTypeSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementtype_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplementType\StayHotelSupplementTypeUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementtype_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplementType\StayHotelSupplementTypeUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementtype_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplementType\StayHotelSupplementTypeDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementtype_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplementType\StayHotelSupplementTypeDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementtype_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplementType\StayHotelSupplementTypeRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementtype_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelSupplementType\StayHotelSupplementTypeRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplementtype_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementType::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplementType\StayHotelSupplementTypeRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementtype_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementType::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplementType\StayHotelSupplementTypeCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementtype_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementType::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplementType\StayHotelSupplementTypeCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementtype_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementType::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplementType\StayHotelSupplementTypeSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementtype_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementType::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplementType\StayHotelSupplementTypeSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementtype_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementType::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplementType\StayHotelSupplementTypeUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementtype_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementType::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplementType\StayHotelSupplementTypeUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementtype_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementType::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplementType\StayHotelSupplementTypeDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementtype_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementType::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplementType\StayHotelSupplementTypeDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementtype_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementType::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplementType\StayHotelSupplementTypeRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelsupplementtype_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementType::first();

            event(new \NextDeveloper\Stay\Events\StayHotelSupplementType\StayHotelSupplementTypeRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplementtype_event_name_filter()
    {
        try {
            $request = new Request(
                [
                'name'  =>  'a'
                ]
            );

            $filter = new StayHotelSupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplementtype_event_class_filter()
    {
        try {
            $request = new Request(
                [
                'class'  =>  'a'
                ]
            );

            $filter = new StayHotelSupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplementtype_event_maintenance_control_filter()
    {
        try {
            $request = new Request(
                [
                'maintenance_control'  =>  'a'
                ]
            );

            $filter = new StayHotelSupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplementtype_event_external_id_filter()
    {
        try {
            $request = new Request(
                [
                'external_id'  =>  'a'
                ]
            );

            $filter = new StayHotelSupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplementtype_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplementtype_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplementtype_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplementtype_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplementtype_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplementtype_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplementtype_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplementtype_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelsupplementtype_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelSupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelSupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}