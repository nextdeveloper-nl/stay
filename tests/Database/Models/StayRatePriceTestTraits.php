<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayRatePriceQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayRatePriceService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayRatePriceTestTraits
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

    public function test_http_stayrateprice_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/stayrateprice',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_stayrateprice_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/stayrateprice', [
            'form_params'   =>  [
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
    public function test_stayrateprice_model_get()
    {
        $result = AbstractStayRatePriceService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayrateprice_get_all()
    {
        $result = AbstractStayRatePriceService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayrateprice_get_paginated()
    {
        $result = AbstractStayRatePriceService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_stayrateprice_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRatePrice\StayRatePriceRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrateprice_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRatePrice\StayRatePriceCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrateprice_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRatePrice\StayRatePriceCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrateprice_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRatePrice\StayRatePriceSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrateprice_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRatePrice\StayRatePriceSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrateprice_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRatePrice\StayRatePriceUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrateprice_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRatePrice\StayRatePriceUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrateprice_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRatePrice\StayRatePriceDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrateprice_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRatePrice\StayRatePriceDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrateprice_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRatePrice\StayRatePriceRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrateprice_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayRatePrice\StayRatePriceRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrateprice_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRatePrice::first();

            event(new \NextDeveloper\Stay\Events\StayRatePrice\StayRatePriceRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrateprice_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRatePrice::first();

            event(new \NextDeveloper\Stay\Events\StayRatePrice\StayRatePriceCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrateprice_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRatePrice::first();

            event(new \NextDeveloper\Stay\Events\StayRatePrice\StayRatePriceCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrateprice_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRatePrice::first();

            event(new \NextDeveloper\Stay\Events\StayRatePrice\StayRatePriceSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrateprice_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRatePrice::first();

            event(new \NextDeveloper\Stay\Events\StayRatePrice\StayRatePriceSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrateprice_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRatePrice::first();

            event(new \NextDeveloper\Stay\Events\StayRatePrice\StayRatePriceUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrateprice_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRatePrice::first();

            event(new \NextDeveloper\Stay\Events\StayRatePrice\StayRatePriceUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrateprice_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRatePrice::first();

            event(new \NextDeveloper\Stay\Events\StayRatePrice\StayRatePriceDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrateprice_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRatePrice::first();

            event(new \NextDeveloper\Stay\Events\StayRatePrice\StayRatePriceDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrateprice_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRatePrice::first();

            event(new \NextDeveloper\Stay\Events\StayRatePrice\StayRatePriceRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayrateprice_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayRatePrice::first();

            event(new \NextDeveloper\Stay\Events\StayRatePrice\StayRatePriceRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrateprice_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new StayRatePriceQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRatePrice::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrateprice_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new StayRatePriceQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRatePrice::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrateprice_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new StayRatePriceQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRatePrice::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrateprice_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayRatePriceQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRatePrice::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrateprice_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayRatePriceQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRatePrice::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrateprice_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayRatePriceQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRatePrice::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrateprice_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayRatePriceQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRatePrice::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrateprice_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayRatePriceQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRatePrice::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayrateprice_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayRatePriceQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayRatePrice::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}