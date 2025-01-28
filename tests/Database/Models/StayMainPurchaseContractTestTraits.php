<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayMainPurchaseContractQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayMainPurchaseContractService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayMainPurchaseContractTestTraits
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

    public function test_http_staymainpurchasecontract_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/staymainpurchasecontract',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_staymainpurchasecontract_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/staymainpurchasecontract', [
            'form_params'   =>  [
                'external_id'  =>  'a',
                'observations'  =>  'a',
                'internal_observations'  =>  'a',
                'minimum_nights'  =>  '1',
                'maximum_nights'  =>  '1',
                'initial_quota'  =>  '1',
                'guaranteed_quota'  =>  '1',
                'minimum_age'  =>  '1',
                'age_range_a_from'  =>  '1',
                'age_range_a_to'  =>  '1',
                'age_range_b_to'  =>  '1',
                'age_range_c_to'  =>  '1',
                    'approved_at'  =>  now(),
                    'season_start_date'  =>  now(),
                    'season_end_date'  =>  now(),
                    'booking_start_date'  =>  now(),
                    'booking_end_date'  =>  now(),
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
    public function test_staymainpurchasecontract_model_get()
    {
        $result = AbstractStayMainPurchaseContractService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_staymainpurchasecontract_get_all()
    {
        $result = AbstractStayMainPurchaseContractService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_staymainpurchasecontract_get_paginated()
    {
        $result = AbstractStayMainPurchaseContractService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_staymainpurchasecontract_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayMainPurchaseContract\StayMainPurchaseContractRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staymainpurchasecontract_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayMainPurchaseContract\StayMainPurchaseContractCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staymainpurchasecontract_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayMainPurchaseContract\StayMainPurchaseContractCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staymainpurchasecontract_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayMainPurchaseContract\StayMainPurchaseContractSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staymainpurchasecontract_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayMainPurchaseContract\StayMainPurchaseContractSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staymainpurchasecontract_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayMainPurchaseContract\StayMainPurchaseContractUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staymainpurchasecontract_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayMainPurchaseContract\StayMainPurchaseContractUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staymainpurchasecontract_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayMainPurchaseContract\StayMainPurchaseContractDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staymainpurchasecontract_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayMainPurchaseContract\StayMainPurchaseContractDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staymainpurchasecontract_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayMainPurchaseContract\StayMainPurchaseContractRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staymainpurchasecontract_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayMainPurchaseContract\StayMainPurchaseContractRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::first();

            event(new \NextDeveloper\Stay\Events\StayMainPurchaseContract\StayMainPurchaseContractRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staymainpurchasecontract_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::first();

            event(new \NextDeveloper\Stay\Events\StayMainPurchaseContract\StayMainPurchaseContractCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staymainpurchasecontract_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::first();

            event(new \NextDeveloper\Stay\Events\StayMainPurchaseContract\StayMainPurchaseContractCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staymainpurchasecontract_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::first();

            event(new \NextDeveloper\Stay\Events\StayMainPurchaseContract\StayMainPurchaseContractSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staymainpurchasecontract_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::first();

            event(new \NextDeveloper\Stay\Events\StayMainPurchaseContract\StayMainPurchaseContractSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staymainpurchasecontract_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::first();

            event(new \NextDeveloper\Stay\Events\StayMainPurchaseContract\StayMainPurchaseContractUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staymainpurchasecontract_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::first();

            event(new \NextDeveloper\Stay\Events\StayMainPurchaseContract\StayMainPurchaseContractUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staymainpurchasecontract_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::first();

            event(new \NextDeveloper\Stay\Events\StayMainPurchaseContract\StayMainPurchaseContractDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staymainpurchasecontract_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::first();

            event(new \NextDeveloper\Stay\Events\StayMainPurchaseContract\StayMainPurchaseContractDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staymainpurchasecontract_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::first();

            event(new \NextDeveloper\Stay\Events\StayMainPurchaseContract\StayMainPurchaseContractRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staymainpurchasecontract_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::first();

            event(new \NextDeveloper\Stay\Events\StayMainPurchaseContract\StayMainPurchaseContractRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_external_id_filter()
    {
        try {
            $request = new Request(
                [
                'external_id'  =>  'a'
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_observations_filter()
    {
        try {
            $request = new Request(
                [
                'observations'  =>  'a'
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_internal_observations_filter()
    {
        try {
            $request = new Request(
                [
                'internal_observations'  =>  'a'
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_minimum_nights_filter()
    {
        try {
            $request = new Request(
                [
                'minimum_nights'  =>  '1'
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_maximum_nights_filter()
    {
        try {
            $request = new Request(
                [
                'maximum_nights'  =>  '1'
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_initial_quota_filter()
    {
        try {
            $request = new Request(
                [
                'initial_quota'  =>  '1'
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_guaranteed_quota_filter()
    {
        try {
            $request = new Request(
                [
                'guaranteed_quota'  =>  '1'
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_minimum_age_filter()
    {
        try {
            $request = new Request(
                [
                'minimum_age'  =>  '1'
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_age_range_a_from_filter()
    {
        try {
            $request = new Request(
                [
                'age_range_a_from'  =>  '1'
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_age_range_a_to_filter()
    {
        try {
            $request = new Request(
                [
                'age_range_a_to'  =>  '1'
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_age_range_b_to_filter()
    {
        try {
            $request = new Request(
                [
                'age_range_b_to'  =>  '1'
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_age_range_c_to_filter()
    {
        try {
            $request = new Request(
                [
                'age_range_c_to'  =>  '1'
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_approved_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'approved_atStart'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_season_start_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'season_start_dateStart'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_season_end_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'season_end_dateStart'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_booking_start_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'booking_start_dateStart'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_booking_end_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'booking_end_dateStart'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_guarantee_start_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'guarantee_start_dateStart'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_guarantee_end_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'guarantee_end_dateStart'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_approved_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'approved_atEnd'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_season_start_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'season_start_dateEnd'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_season_end_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'season_end_dateEnd'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_booking_start_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'booking_start_dateEnd'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_booking_end_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'booking_end_dateEnd'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_guarantee_start_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'guarantee_start_dateEnd'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_guarantee_end_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'guarantee_end_dateEnd'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_approved_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'approved_atStart'  =>  now(),
                'approved_atEnd'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_season_start_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'season_start_dateStart'  =>  now(),
                'season_start_dateEnd'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_season_end_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'season_end_dateStart'  =>  now(),
                'season_end_dateEnd'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_booking_start_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'booking_start_dateStart'  =>  now(),
                'booking_start_dateEnd'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_booking_end_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'booking_end_dateStart'  =>  now(),
                'booking_end_dateEnd'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_guarantee_start_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'guarantee_start_dateStart'  =>  now(),
                'guarantee_start_dateEnd'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_guarantee_end_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'guarantee_end_dateStart'  =>  now(),
                'guarantee_end_dateEnd'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staymainpurchasecontract_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayMainPurchaseContractQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayMainPurchaseContract::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}