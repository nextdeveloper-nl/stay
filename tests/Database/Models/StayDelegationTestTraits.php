<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayDelegationQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayDelegationService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayDelegationTestTraits
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

    public function test_http_staydelegation_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/staydelegation',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_staydelegation_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/staydelegation', [
            'form_params'   =>  [
                'name'  =>  'a',
                'address'  =>  'a',
                'phone'  =>  'a',
                'fax'  =>  'a',
                'schedule'  =>  'a',
                'photo'  =>  'a',
                'sales_responsible'  =>  'a',
                'purchases_responsible'  =>  'a',
                'all_groups_id'  =>  'a',
                'send_all_groups_id'  =>  'a',
                'code_analitic'  =>  'a',
                'letter_tickets'  =>  'a',
                'send_extranet'  =>  'a',
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
    public function test_staydelegation_model_get()
    {
        $result = AbstractStayDelegationService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_staydelegation_get_all()
    {
        $result = AbstractStayDelegationService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_staydelegation_get_paginated()
    {
        $result = AbstractStayDelegationService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_staydelegation_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayDelegation\StayDelegationRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staydelegation_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayDelegation\StayDelegationCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staydelegation_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayDelegation\StayDelegationCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staydelegation_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayDelegation\StayDelegationSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staydelegation_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayDelegation\StayDelegationSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staydelegation_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayDelegation\StayDelegationUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staydelegation_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayDelegation\StayDelegationUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staydelegation_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayDelegation\StayDelegationDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staydelegation_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayDelegation\StayDelegationDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staydelegation_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayDelegation\StayDelegationRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staydelegation_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayDelegation\StayDelegationRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staydelegation_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::first();

            event(new \NextDeveloper\Stay\Events\StayDelegation\StayDelegationRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staydelegation_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::first();

            event(new \NextDeveloper\Stay\Events\StayDelegation\StayDelegationCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staydelegation_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::first();

            event(new \NextDeveloper\Stay\Events\StayDelegation\StayDelegationCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staydelegation_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::first();

            event(new \NextDeveloper\Stay\Events\StayDelegation\StayDelegationSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staydelegation_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::first();

            event(new \NextDeveloper\Stay\Events\StayDelegation\StayDelegationSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staydelegation_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::first();

            event(new \NextDeveloper\Stay\Events\StayDelegation\StayDelegationUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staydelegation_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::first();

            event(new \NextDeveloper\Stay\Events\StayDelegation\StayDelegationUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staydelegation_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::first();

            event(new \NextDeveloper\Stay\Events\StayDelegation\StayDelegationDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staydelegation_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::first();

            event(new \NextDeveloper\Stay\Events\StayDelegation\StayDelegationDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staydelegation_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::first();

            event(new \NextDeveloper\Stay\Events\StayDelegation\StayDelegationRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staydelegation_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::first();

            event(new \NextDeveloper\Stay\Events\StayDelegation\StayDelegationRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staydelegation_event_name_filter()
    {
        try {
            $request = new Request(
                [
                'name'  =>  'a'
                ]
            );

            $filter = new StayDelegationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staydelegation_event_address_filter()
    {
        try {
            $request = new Request(
                [
                'address'  =>  'a'
                ]
            );

            $filter = new StayDelegationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staydelegation_event_phone_filter()
    {
        try {
            $request = new Request(
                [
                'phone'  =>  'a'
                ]
            );

            $filter = new StayDelegationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staydelegation_event_fax_filter()
    {
        try {
            $request = new Request(
                [
                'fax'  =>  'a'
                ]
            );

            $filter = new StayDelegationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staydelegation_event_schedule_filter()
    {
        try {
            $request = new Request(
                [
                'schedule'  =>  'a'
                ]
            );

            $filter = new StayDelegationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staydelegation_event_photo_filter()
    {
        try {
            $request = new Request(
                [
                'photo'  =>  'a'
                ]
            );

            $filter = new StayDelegationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staydelegation_event_sales_responsible_filter()
    {
        try {
            $request = new Request(
                [
                'sales_responsible'  =>  'a'
                ]
            );

            $filter = new StayDelegationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staydelegation_event_purchases_responsible_filter()
    {
        try {
            $request = new Request(
                [
                'purchases_responsible'  =>  'a'
                ]
            );

            $filter = new StayDelegationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staydelegation_event_all_groups_id_filter()
    {
        try {
            $request = new Request(
                [
                'all_groups_id'  =>  'a'
                ]
            );

            $filter = new StayDelegationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staydelegation_event_send_all_groups_id_filter()
    {
        try {
            $request = new Request(
                [
                'send_all_groups_id'  =>  'a'
                ]
            );

            $filter = new StayDelegationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staydelegation_event_code_analitic_filter()
    {
        try {
            $request = new Request(
                [
                'code_analitic'  =>  'a'
                ]
            );

            $filter = new StayDelegationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staydelegation_event_letter_tickets_filter()
    {
        try {
            $request = new Request(
                [
                'letter_tickets'  =>  'a'
                ]
            );

            $filter = new StayDelegationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staydelegation_event_send_extranet_filter()
    {
        try {
            $request = new Request(
                [
                'send_extranet'  =>  'a'
                ]
            );

            $filter = new StayDelegationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staydelegation_event_external_id_filter()
    {
        try {
            $request = new Request(
                [
                'external_id'  =>  'a'
                ]
            );

            $filter = new StayDelegationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staydelegation_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new StayDelegationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staydelegation_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new StayDelegationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staydelegation_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new StayDelegationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staydelegation_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayDelegationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staydelegation_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayDelegationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staydelegation_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayDelegationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staydelegation_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayDelegationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staydelegation_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayDelegationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staydelegation_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayDelegationQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayDelegation::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}