<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayHotelContractQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayHotelContractService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayHotelContractTestTraits
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

    public function test_http_stayhotelcontract_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/stayhotelcontract',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_stayhotelcontract_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/stayhotelcontract', [
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
    public function test_stayhotelcontract_model_get()
    {
        $result = AbstractStayHotelContractService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayhotelcontract_get_all()
    {
        $result = AbstractStayHotelContractService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayhotelcontract_get_paginated()
    {
        $result = AbstractStayHotelContractService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_stayhotelcontract_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelContract\StayHotelContractRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelcontract_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelContract\StayHotelContractCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelcontract_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelContract\StayHotelContractCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelcontract_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelContract\StayHotelContractSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelcontract_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelContract\StayHotelContractSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelcontract_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelContract\StayHotelContractUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelcontract_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelContract\StayHotelContractUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelcontract_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelContract\StayHotelContractDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelcontract_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelContract\StayHotelContractDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelcontract_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelContract\StayHotelContractRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelcontract_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayHotelContract\StayHotelContractRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelcontract_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelContract::first();

            event(new \NextDeveloper\Stay\Events\StayHotelContract\StayHotelContractRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelcontract_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelContract::first();

            event(new \NextDeveloper\Stay\Events\StayHotelContract\StayHotelContractCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelcontract_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelContract::first();

            event(new \NextDeveloper\Stay\Events\StayHotelContract\StayHotelContractCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelcontract_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelContract::first();

            event(new \NextDeveloper\Stay\Events\StayHotelContract\StayHotelContractSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelcontract_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelContract::first();

            event(new \NextDeveloper\Stay\Events\StayHotelContract\StayHotelContractSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelcontract_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelContract::first();

            event(new \NextDeveloper\Stay\Events\StayHotelContract\StayHotelContractUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelcontract_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelContract::first();

            event(new \NextDeveloper\Stay\Events\StayHotelContract\StayHotelContractUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelcontract_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelContract::first();

            event(new \NextDeveloper\Stay\Events\StayHotelContract\StayHotelContractDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelcontract_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelContract::first();

            event(new \NextDeveloper\Stay\Events\StayHotelContract\StayHotelContractDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelcontract_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelContract::first();

            event(new \NextDeveloper\Stay\Events\StayHotelContract\StayHotelContractRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayhotelcontract_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayHotelContract::first();

            event(new \NextDeveloper\Stay\Events\StayHotelContract\StayHotelContractRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelcontract_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new StayHotelContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelcontract_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new StayHotelContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelcontract_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new StayHotelContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelcontract_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelcontract_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelcontract_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelcontract_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelcontract_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayhotelcontract_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayHotelContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayHotelContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}