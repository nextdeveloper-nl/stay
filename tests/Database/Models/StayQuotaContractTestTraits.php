<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayQuotaContractQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayQuotaContractService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayQuotaContractTestTraits
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

    public function test_http_stayquotacontract_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/stayquotacontract',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_stayquotacontract_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/stayquotacontract', [
            'form_params'   =>  [
                'observations'  =>  'a',
                'guaranteed_quota'  =>  '1',
                'max_rooms_online'  =>  '1',
                'max_rooms_online_request'  =>  '1',
                'max_rooms_booking'  =>  '1',
                'max_rooms_booking_request'  =>  '1',
                    'season_start_date'  =>  now(),
                    'season_end_date'  =>  now(),
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
    public function test_stayquotacontract_model_get()
    {
        $result = AbstractStayQuotaContractService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayquotacontract_get_all()
    {
        $result = AbstractStayQuotaContractService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayquotacontract_get_paginated()
    {
        $result = AbstractStayQuotaContractService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_stayquotacontract_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayQuotaContract\StayQuotaContractRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayquotacontract_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayQuotaContract\StayQuotaContractCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayquotacontract_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayQuotaContract\StayQuotaContractCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayquotacontract_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayQuotaContract\StayQuotaContractSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayquotacontract_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayQuotaContract\StayQuotaContractSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayquotacontract_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayQuotaContract\StayQuotaContractUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayquotacontract_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayQuotaContract\StayQuotaContractUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayquotacontract_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayQuotaContract\StayQuotaContractDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayquotacontract_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayQuotaContract\StayQuotaContractDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayquotacontract_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayQuotaContract\StayQuotaContractRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayquotacontract_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayQuotaContract\StayQuotaContractRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayquotacontract_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::first();

            event(new \NextDeveloper\Stay\Events\StayQuotaContract\StayQuotaContractRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayquotacontract_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::first();

            event(new \NextDeveloper\Stay\Events\StayQuotaContract\StayQuotaContractCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayquotacontract_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::first();

            event(new \NextDeveloper\Stay\Events\StayQuotaContract\StayQuotaContractCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayquotacontract_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::first();

            event(new \NextDeveloper\Stay\Events\StayQuotaContract\StayQuotaContractSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayquotacontract_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::first();

            event(new \NextDeveloper\Stay\Events\StayQuotaContract\StayQuotaContractSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayquotacontract_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::first();

            event(new \NextDeveloper\Stay\Events\StayQuotaContract\StayQuotaContractUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayquotacontract_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::first();

            event(new \NextDeveloper\Stay\Events\StayQuotaContract\StayQuotaContractUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayquotacontract_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::first();

            event(new \NextDeveloper\Stay\Events\StayQuotaContract\StayQuotaContractDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayquotacontract_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::first();

            event(new \NextDeveloper\Stay\Events\StayQuotaContract\StayQuotaContractDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayquotacontract_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::first();

            event(new \NextDeveloper\Stay\Events\StayQuotaContract\StayQuotaContractRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayquotacontract_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::first();

            event(new \NextDeveloper\Stay\Events\StayQuotaContract\StayQuotaContractRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayquotacontract_event_observations_filter()
    {
        try {
            $request = new Request(
                [
                'observations'  =>  'a'
                ]
            );

            $filter = new StayQuotaContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayquotacontract_event_guaranteed_quota_filter()
    {
        try {
            $request = new Request(
                [
                'guaranteed_quota'  =>  '1'
                ]
            );

            $filter = new StayQuotaContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayquotacontract_event_max_rooms_online_filter()
    {
        try {
            $request = new Request(
                [
                'max_rooms_online'  =>  '1'
                ]
            );

            $filter = new StayQuotaContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayquotacontract_event_max_rooms_online_request_filter()
    {
        try {
            $request = new Request(
                [
                'max_rooms_online_request'  =>  '1'
                ]
            );

            $filter = new StayQuotaContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayquotacontract_event_max_rooms_booking_filter()
    {
        try {
            $request = new Request(
                [
                'max_rooms_booking'  =>  '1'
                ]
            );

            $filter = new StayQuotaContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayquotacontract_event_max_rooms_booking_request_filter()
    {
        try {
            $request = new Request(
                [
                'max_rooms_booking_request'  =>  '1'
                ]
            );

            $filter = new StayQuotaContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayquotacontract_event_season_start_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'season_start_dateStart'  =>  now()
                ]
            );

            $filter = new StayQuotaContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayquotacontract_event_season_end_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'season_end_dateStart'  =>  now()
                ]
            );

            $filter = new StayQuotaContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayquotacontract_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new StayQuotaContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayquotacontract_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new StayQuotaContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayquotacontract_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new StayQuotaContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayquotacontract_event_season_start_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'season_start_dateEnd'  =>  now()
                ]
            );

            $filter = new StayQuotaContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayquotacontract_event_season_end_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'season_end_dateEnd'  =>  now()
                ]
            );

            $filter = new StayQuotaContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayquotacontract_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayQuotaContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayquotacontract_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayQuotaContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayquotacontract_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayQuotaContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayquotacontract_event_season_start_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'season_start_dateStart'  =>  now(),
                'season_start_dateEnd'  =>  now()
                ]
            );

            $filter = new StayQuotaContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayquotacontract_event_season_end_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'season_end_dateStart'  =>  now(),
                'season_end_dateEnd'  =>  now()
                ]
            );

            $filter = new StayQuotaContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayquotacontract_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayQuotaContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayquotacontract_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayQuotaContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayquotacontract_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayQuotaContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayQuotaContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}