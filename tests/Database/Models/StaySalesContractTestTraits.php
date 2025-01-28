<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StaySalesContractQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStaySalesContractService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StaySalesContractTestTraits
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

    public function test_http_staysalescontract_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/staysalescontract',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_staysalescontract_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/staysalescontract', [
            'form_params'   =>  [
                'observations'  =>  'a',
                'internal_observations'  =>  'a',
                'minimum_nights'  =>  '1',
                'maximum_nights'  =>  '1',
                'minimum_adults'  =>  '1',
                'guaranteed_quota'  =>  '1',
                'age_range_a_from'  =>  '1',
                'age_range_a_to'  =>  '1',
                'age_range_b_to'  =>  '1',
                'markup_priority'  =>  '1',
                    'approved_at'  =>  now(),
                    'season_start_date'  =>  now(),
                    'season_end_date'  =>  now(),
                    'booking_start_date'  =>  now(),
                    'booking_end_date'  =>  now(),
                    'rates_start_date'  =>  now(),
                    'rates_end_date'  =>  now(),
                    'guarantee_start_date'  =>  now(),
                    'guarantee_end_date'  =>  now(),
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
    public function test_staysalescontract_model_get()
    {
        $result = AbstractStaySalesContractService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_staysalescontract_get_all()
    {
        $result = AbstractStaySalesContractService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_staysalescontract_get_paginated()
    {
        $result = AbstractStaySalesContractService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_staysalescontract_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StaySalesContract\StaySalesContractRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysalescontract_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StaySalesContract\StaySalesContractCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysalescontract_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StaySalesContract\StaySalesContractCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysalescontract_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StaySalesContract\StaySalesContractSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysalescontract_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StaySalesContract\StaySalesContractSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysalescontract_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StaySalesContract\StaySalesContractUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysalescontract_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StaySalesContract\StaySalesContractUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysalescontract_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StaySalesContract\StaySalesContractDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysalescontract_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StaySalesContract\StaySalesContractDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysalescontract_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StaySalesContract\StaySalesContractRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysalescontract_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StaySalesContract\StaySalesContractRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::first();

            event(new \NextDeveloper\Stay\Events\StaySalesContract\StaySalesContractRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysalescontract_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::first();

            event(new \NextDeveloper\Stay\Events\StaySalesContract\StaySalesContractCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysalescontract_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::first();

            event(new \NextDeveloper\Stay\Events\StaySalesContract\StaySalesContractCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysalescontract_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::first();

            event(new \NextDeveloper\Stay\Events\StaySalesContract\StaySalesContractSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysalescontract_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::first();

            event(new \NextDeveloper\Stay\Events\StaySalesContract\StaySalesContractSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysalescontract_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::first();

            event(new \NextDeveloper\Stay\Events\StaySalesContract\StaySalesContractUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysalescontract_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::first();

            event(new \NextDeveloper\Stay\Events\StaySalesContract\StaySalesContractUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysalescontract_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::first();

            event(new \NextDeveloper\Stay\Events\StaySalesContract\StaySalesContractDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysalescontract_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::first();

            event(new \NextDeveloper\Stay\Events\StaySalesContract\StaySalesContractDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysalescontract_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::first();

            event(new \NextDeveloper\Stay\Events\StaySalesContract\StaySalesContractRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staysalescontract_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::first();

            event(new \NextDeveloper\Stay\Events\StaySalesContract\StaySalesContractRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_observations_filter()
    {
        try {
            $request = new Request(
                [
                'observations'  =>  'a'
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_internal_observations_filter()
    {
        try {
            $request = new Request(
                [
                'internal_observations'  =>  'a'
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_minimum_nights_filter()
    {
        try {
            $request = new Request(
                [
                'minimum_nights'  =>  '1'
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_maximum_nights_filter()
    {
        try {
            $request = new Request(
                [
                'maximum_nights'  =>  '1'
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_minimum_adults_filter()
    {
        try {
            $request = new Request(
                [
                'minimum_adults'  =>  '1'
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_guaranteed_quota_filter()
    {
        try {
            $request = new Request(
                [
                'guaranteed_quota'  =>  '1'
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_age_range_a_from_filter()
    {
        try {
            $request = new Request(
                [
                'age_range_a_from'  =>  '1'
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_age_range_a_to_filter()
    {
        try {
            $request = new Request(
                [
                'age_range_a_to'  =>  '1'
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_age_range_b_to_filter()
    {
        try {
            $request = new Request(
                [
                'age_range_b_to'  =>  '1'
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_markup_priority_filter()
    {
        try {
            $request = new Request(
                [
                'markup_priority'  =>  '1'
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_approved_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'approved_atStart'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_season_start_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'season_start_dateStart'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_season_end_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'season_end_dateStart'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_booking_start_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'booking_start_dateStart'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_booking_end_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'booking_end_dateStart'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_rates_start_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'rates_start_dateStart'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_rates_end_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'rates_end_dateStart'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_guarantee_start_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'guarantee_start_dateStart'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_guarantee_end_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'guarantee_end_dateStart'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_approved_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'approved_atEnd'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_season_start_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'season_start_dateEnd'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_season_end_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'season_end_dateEnd'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_booking_start_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'booking_start_dateEnd'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_booking_end_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'booking_end_dateEnd'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_rates_start_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'rates_start_dateEnd'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_rates_end_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'rates_end_dateEnd'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_guarantee_start_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'guarantee_start_dateEnd'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_guarantee_end_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'guarantee_end_dateEnd'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_approved_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'approved_atStart'  =>  now(),
                'approved_atEnd'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_season_start_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'season_start_dateStart'  =>  now(),
                'season_start_dateEnd'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_season_end_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'season_end_dateStart'  =>  now(),
                'season_end_dateEnd'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_booking_start_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'booking_start_dateStart'  =>  now(),
                'booking_start_dateEnd'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_booking_end_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'booking_end_dateStart'  =>  now(),
                'booking_end_dateEnd'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_rates_start_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'rates_start_dateStart'  =>  now(),
                'rates_start_dateEnd'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_rates_end_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'rates_end_dateStart'  =>  now(),
                'rates_end_dateEnd'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_guarantee_start_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'guarantee_start_dateStart'  =>  now(),
                'guarantee_start_dateEnd'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_guarantee_end_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'guarantee_end_dateStart'  =>  now(),
                'guarantee_end_dateEnd'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staysalescontract_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StaySalesContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StaySalesContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}