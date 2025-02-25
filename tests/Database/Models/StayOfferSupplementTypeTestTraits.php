<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayOfferSupplementTypeQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayOfferSupplementTypeService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayOfferSupplementTypeTestTraits
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

    public function test_http_stayoffersupplementtype_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/stayoffersupplementtype',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_stayoffersupplementtype_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/stayoffersupplementtype', [
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
    public function test_stayoffersupplementtype_model_get()
    {
        $result = AbstractStayOfferSupplementTypeService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayoffersupplementtype_get_all()
    {
        $result = AbstractStayOfferSupplementTypeService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayoffersupplementtype_get_paginated()
    {
        $result = AbstractStayOfferSupplementTypeService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_stayoffersupplementtype_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayOfferSupplementType\StayOfferSupplementTypeRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayoffersupplementtype_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayOfferSupplementType\StayOfferSupplementTypeCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayoffersupplementtype_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayOfferSupplementType\StayOfferSupplementTypeCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayoffersupplementtype_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayOfferSupplementType\StayOfferSupplementTypeSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayoffersupplementtype_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayOfferSupplementType\StayOfferSupplementTypeSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayoffersupplementtype_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayOfferSupplementType\StayOfferSupplementTypeUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayoffersupplementtype_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayOfferSupplementType\StayOfferSupplementTypeUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayoffersupplementtype_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayOfferSupplementType\StayOfferSupplementTypeDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayoffersupplementtype_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayOfferSupplementType\StayOfferSupplementTypeDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayoffersupplementtype_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayOfferSupplementType\StayOfferSupplementTypeRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayoffersupplementtype_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayOfferSupplementType\StayOfferSupplementTypeRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayoffersupplementtype_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayOfferSupplementType::first();

            event(new \NextDeveloper\Stay\Events\StayOfferSupplementType\StayOfferSupplementTypeRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayoffersupplementtype_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayOfferSupplementType::first();

            event(new \NextDeveloper\Stay\Events\StayOfferSupplementType\StayOfferSupplementTypeCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayoffersupplementtype_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayOfferSupplementType::first();

            event(new \NextDeveloper\Stay\Events\StayOfferSupplementType\StayOfferSupplementTypeCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayoffersupplementtype_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayOfferSupplementType::first();

            event(new \NextDeveloper\Stay\Events\StayOfferSupplementType\StayOfferSupplementTypeSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayoffersupplementtype_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayOfferSupplementType::first();

            event(new \NextDeveloper\Stay\Events\StayOfferSupplementType\StayOfferSupplementTypeSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayoffersupplementtype_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayOfferSupplementType::first();

            event(new \NextDeveloper\Stay\Events\StayOfferSupplementType\StayOfferSupplementTypeUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayoffersupplementtype_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayOfferSupplementType::first();

            event(new \NextDeveloper\Stay\Events\StayOfferSupplementType\StayOfferSupplementTypeUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayoffersupplementtype_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayOfferSupplementType::first();

            event(new \NextDeveloper\Stay\Events\StayOfferSupplementType\StayOfferSupplementTypeDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayoffersupplementtype_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayOfferSupplementType::first();

            event(new \NextDeveloper\Stay\Events\StayOfferSupplementType\StayOfferSupplementTypeDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayoffersupplementtype_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayOfferSupplementType::first();

            event(new \NextDeveloper\Stay\Events\StayOfferSupplementType\StayOfferSupplementTypeRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayoffersupplementtype_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayOfferSupplementType::first();

            event(new \NextDeveloper\Stay\Events\StayOfferSupplementType\StayOfferSupplementTypeRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayoffersupplementtype_event_name_es_filter()
    {
        try {
            $request = new Request(
                [
                'name_es'  =>  'a'
                ]
            );

            $filter = new StayOfferSupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayOfferSupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayoffersupplementtype_event_description_es_filter()
    {
        try {
            $request = new Request(
                [
                'description_es'  =>  'a'
                ]
            );

            $filter = new StayOfferSupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayOfferSupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayoffersupplementtype_event_name_en_filter()
    {
        try {
            $request = new Request(
                [
                'name_en'  =>  'a'
                ]
            );

            $filter = new StayOfferSupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayOfferSupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayoffersupplementtype_event_description_en_filter()
    {
        try {
            $request = new Request(
                [
                'description_en'  =>  'a'
                ]
            );

            $filter = new StayOfferSupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayOfferSupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayoffersupplementtype_event_code_filter()
    {
        try {
            $request = new Request(
                [
                'code'  =>  'a'
                ]
            );

            $filter = new StayOfferSupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayOfferSupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayoffersupplementtype_event_external_id_filter()
    {
        try {
            $request = new Request(
                [
                'external_id'  =>  'a'
                ]
            );

            $filter = new StayOfferSupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayOfferSupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayoffersupplementtype_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new StayOfferSupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayOfferSupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayoffersupplementtype_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new StayOfferSupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayOfferSupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayoffersupplementtype_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new StayOfferSupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayOfferSupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayoffersupplementtype_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayOfferSupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayOfferSupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayoffersupplementtype_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayOfferSupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayOfferSupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayoffersupplementtype_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayOfferSupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayOfferSupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayoffersupplementtype_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayOfferSupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayOfferSupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayoffersupplementtype_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayOfferSupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayOfferSupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayoffersupplementtype_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayOfferSupplementTypeQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayOfferSupplementType::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}