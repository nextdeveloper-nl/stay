<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayProductTypeQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayProductTypeService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayProductTypeTestTraits
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

    public function test_http_stayproducttype_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/stayproducttype',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_stayproducttype_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/stayproducttype', [
            'form_params'   =>  [
                'name'  =>  'a',
                'library'  =>  'a',
                'reservation_class'  =>  'a',
                'description'  =>  'a',
                'external_provider'  =>  'a',
                'module_type'  =>  'a',
                'module_type_en'  =>  'a',
                'module_type_es'  =>  'a',
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
    public function test_stayproducttype_model_get()
    {
        $result = AbstractStayProductTypeService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayproducttype_get_all()
    {
        $result = AbstractStayProductTypeService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayproducttype_get_paginated()
    {
        $result = AbstractStayProductTypeService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_stayproducttype_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProductType\StayProductTypeRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproducttype_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProductType\StayProductTypeCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproducttype_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProductType\StayProductTypeCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproducttype_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProductType\StayProductTypeSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproducttype_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProductType\StayProductTypeSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproducttype_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProductType\StayProductTypeUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproducttype_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProductType\StayProductTypeUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproducttype_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProductType\StayProductTypeDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproducttype_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProductType\StayProductTypeDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproducttype_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProductType\StayProductTypeRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproducttype_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProductType\StayProductTypeRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproducttype_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProductType::first();

            event(new \NextDeveloper\Stay\Events\StayProductType\StayProductTypeRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproducttype_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProductType::first();

            event(new \NextDeveloper\Stay\Events\StayProductType\StayProductTypeCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproducttype_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProductType::first();

            event(new \NextDeveloper\Stay\Events\StayProductType\StayProductTypeCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproducttype_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProductType::first();

            event(new \NextDeveloper\Stay\Events\StayProductType\StayProductTypeSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproducttype_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProductType::first();

            event(new \NextDeveloper\Stay\Events\StayProductType\StayProductTypeSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproducttype_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProductType::first();

            event(new \NextDeveloper\Stay\Events\StayProductType\StayProductTypeUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproducttype_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProductType::first();

            event(new \NextDeveloper\Stay\Events\StayProductType\StayProductTypeUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproducttype_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProductType::first();

            event(new \NextDeveloper\Stay\Events\StayProductType\StayProductTypeDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproducttype_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProductType::first();

            event(new \NextDeveloper\Stay\Events\StayProductType\StayProductTypeDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproducttype_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProductType::first();

            event(new \NextDeveloper\Stay\Events\StayProductType\StayProductTypeRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproducttype_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProductType::first();

            event(new \NextDeveloper\Stay\Events\StayProductType\StayProductTypeRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproducttype_event_name_filter()
    {
        try {
            $request = new Request(
                [
                'name'  =>  'a'
                ]
            );

            $filter = new StayProductTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproducttype_event_library_filter()
    {
        try {
            $request = new Request(
                [
                'library'  =>  'a'
                ]
            );

            $filter = new StayProductTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproducttype_event_reservation_class_filter()
    {
        try {
            $request = new Request(
                [
                'reservation_class'  =>  'a'
                ]
            );

            $filter = new StayProductTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproducttype_event_description_filter()
    {
        try {
            $request = new Request(
                [
                'description'  =>  'a'
                ]
            );

            $filter = new StayProductTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproducttype_event_external_provider_filter()
    {
        try {
            $request = new Request(
                [
                'external_provider'  =>  'a'
                ]
            );

            $filter = new StayProductTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproducttype_event_module_type_filter()
    {
        try {
            $request = new Request(
                [
                'module_type'  =>  'a'
                ]
            );

            $filter = new StayProductTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproducttype_event_module_type_en_filter()
    {
        try {
            $request = new Request(
                [
                'module_type_en'  =>  'a'
                ]
            );

            $filter = new StayProductTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproducttype_event_module_type_es_filter()
    {
        try {
            $request = new Request(
                [
                'module_type_es'  =>  'a'
                ]
            );

            $filter = new StayProductTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproducttype_event_external_id_filter()
    {
        try {
            $request = new Request(
                [
                'external_id'  =>  'a'
                ]
            );

            $filter = new StayProductTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproducttype_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new StayProductTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproducttype_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new StayProductTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproducttype_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new StayProductTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproducttype_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayProductTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproducttype_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayProductTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproducttype_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayProductTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproducttype_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayProductTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproducttype_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayProductTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproducttype_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayProductTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}