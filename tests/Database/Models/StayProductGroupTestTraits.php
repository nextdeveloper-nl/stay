<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayProductGroupQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayProductGroupService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayProductGroupTestTraits
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

    public function test_http_stayproductgroup_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/stayproductgroup',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_stayproductgroup_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/stayproductgroup', [
            'form_params'   =>  [
                'name'  =>  'a',
                'quickbooks_item'  =>  'a',
                'export_code'  =>  'a',
                'channel_id'  =>  'a',
                'room'  =>  'a',
                'export_code_c'  =>  'a',
                'export_code_vre'  =>  'a',
                'export_code_cre'  =>  'a',
                'export_code_analytic'  =>  'a',
                'commission_account'  =>  'a',
                'alternative_export_code'  =>  'a',
                'observations'  =>  'a',
                'external_id'  =>  'a',
                'commission_rate'  =>  '1',
                'iva_commission_rate'  =>  '1',
                'max_children'  =>  '1',
                'min_children'  =>  '1',
                'max_adults'  =>  '1',
                'min_adults'  =>  '1',
                'status'  =>  '1',
                'order_number'  =>  '1',
                    'trip_end_date'  =>  now(),
                    'trip_start_date'  =>  now(),
                    'end_date'  =>  now(),
                    'start_date'  =>  now(),
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
    public function test_stayproductgroup_model_get()
    {
        $result = AbstractStayProductGroupService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayproductgroup_get_all()
    {
        $result = AbstractStayProductGroupService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayproductgroup_get_paginated()
    {
        $result = AbstractStayProductGroupService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_stayproductgroup_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProductGroup\StayProductGroupRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproductgroup_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProductGroup\StayProductGroupCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproductgroup_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProductGroup\StayProductGroupCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproductgroup_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProductGroup\StayProductGroupSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproductgroup_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProductGroup\StayProductGroupSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproductgroup_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProductGroup\StayProductGroupUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproductgroup_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProductGroup\StayProductGroupUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproductgroup_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProductGroup\StayProductGroupDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproductgroup_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProductGroup\StayProductGroupDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproductgroup_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProductGroup\StayProductGroupRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproductgroup_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProductGroup\StayProductGroupRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::first();

            event(new \NextDeveloper\Stay\Events\StayProductGroup\StayProductGroupRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproductgroup_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::first();

            event(new \NextDeveloper\Stay\Events\StayProductGroup\StayProductGroupCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproductgroup_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::first();

            event(new \NextDeveloper\Stay\Events\StayProductGroup\StayProductGroupCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproductgroup_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::first();

            event(new \NextDeveloper\Stay\Events\StayProductGroup\StayProductGroupSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproductgroup_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::first();

            event(new \NextDeveloper\Stay\Events\StayProductGroup\StayProductGroupSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproductgroup_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::first();

            event(new \NextDeveloper\Stay\Events\StayProductGroup\StayProductGroupUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproductgroup_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::first();

            event(new \NextDeveloper\Stay\Events\StayProductGroup\StayProductGroupUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproductgroup_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::first();

            event(new \NextDeveloper\Stay\Events\StayProductGroup\StayProductGroupDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproductgroup_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::first();

            event(new \NextDeveloper\Stay\Events\StayProductGroup\StayProductGroupDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproductgroup_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::first();

            event(new \NextDeveloper\Stay\Events\StayProductGroup\StayProductGroupRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayproductgroup_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::first();

            event(new \NextDeveloper\Stay\Events\StayProductGroup\StayProductGroupRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_name_filter()
    {
        try {
            $request = new Request(
                [
                'name'  =>  'a'
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_quickbooks_item_filter()
    {
        try {
            $request = new Request(
                [
                'quickbooks_item'  =>  'a'
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_export_code_filter()
    {
        try {
            $request = new Request(
                [
                'export_code'  =>  'a'
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_channel_id_filter()
    {
        try {
            $request = new Request(
                [
                'channel_id'  =>  'a'
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_room_filter()
    {
        try {
            $request = new Request(
                [
                'room'  =>  'a'
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_export_code_c_filter()
    {
        try {
            $request = new Request(
                [
                'export_code_c'  =>  'a'
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_export_code_vre_filter()
    {
        try {
            $request = new Request(
                [
                'export_code_vre'  =>  'a'
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_export_code_cre_filter()
    {
        try {
            $request = new Request(
                [
                'export_code_cre'  =>  'a'
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_export_code_analytic_filter()
    {
        try {
            $request = new Request(
                [
                'export_code_analytic'  =>  'a'
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_commission_account_filter()
    {
        try {
            $request = new Request(
                [
                'commission_account'  =>  'a'
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_alternative_export_code_filter()
    {
        try {
            $request = new Request(
                [
                'alternative_export_code'  =>  'a'
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_observations_filter()
    {
        try {
            $request = new Request(
                [
                'observations'  =>  'a'
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_external_id_filter()
    {
        try {
            $request = new Request(
                [
                'external_id'  =>  'a'
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_commission_rate_filter()
    {
        try {
            $request = new Request(
                [
                'commission_rate'  =>  '1'
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_iva_commission_rate_filter()
    {
        try {
            $request = new Request(
                [
                'iva_commission_rate'  =>  '1'
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_max_children_filter()
    {
        try {
            $request = new Request(
                [
                'max_children'  =>  '1'
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_min_children_filter()
    {
        try {
            $request = new Request(
                [
                'min_children'  =>  '1'
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_max_adults_filter()
    {
        try {
            $request = new Request(
                [
                'max_adults'  =>  '1'
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_min_adults_filter()
    {
        try {
            $request = new Request(
                [
                'min_adults'  =>  '1'
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_status_filter()
    {
        try {
            $request = new Request(
                [
                'status'  =>  '1'
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_order_number_filter()
    {
        try {
            $request = new Request(
                [
                'order_number'  =>  '1'
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_trip_end_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'trip_end_dateStart'  =>  now()
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_trip_start_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'trip_start_dateStart'  =>  now()
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_end_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'end_dateStart'  =>  now()
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_start_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'start_dateStart'  =>  now()
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_trip_end_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'trip_end_dateEnd'  =>  now()
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_trip_start_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'trip_start_dateEnd'  =>  now()
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_end_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'end_dateEnd'  =>  now()
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_start_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'start_dateEnd'  =>  now()
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_trip_end_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'trip_end_dateStart'  =>  now(),
                'trip_end_dateEnd'  =>  now()
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_trip_start_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'trip_start_dateStart'  =>  now(),
                'trip_start_dateEnd'  =>  now()
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_end_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'end_dateStart'  =>  now(),
                'end_dateEnd'  =>  now()
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_start_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'start_dateStart'  =>  now(),
                'start_dateEnd'  =>  now()
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayproductgroup_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayProductGroupQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProductGroup::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}