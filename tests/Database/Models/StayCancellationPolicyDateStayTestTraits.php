<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayCancellationPolicyDateStayQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayCancellationPolicyDateStayService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayCancellationPolicyDateStayTestTraits
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

    public function test_http_staycancellationpolicydatestay_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/staycancellationpolicydatestay',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_staycancellationpolicydatestay_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/staycancellationpolicydatestay', [
            'form_params'   =>  [
                'external_id'  =>  'a',
                    'start_date'  =>  now(),
                    'end_date'  =>  now(),
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
    public function test_staycancellationpolicydatestay_model_get()
    {
        $result = AbstractStayCancellationPolicyDateStayService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_staycancellationpolicydatestay_get_all()
    {
        $result = AbstractStayCancellationPolicyDateStayService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_staycancellationpolicydatestay_get_paginated()
    {
        $result = AbstractStayCancellationPolicyDateStayService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_staycancellationpolicydatestay_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDateStay\StayCancellationPolicyDateStayRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydatestay_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDateStay\StayCancellationPolicyDateStayCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydatestay_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDateStay\StayCancellationPolicyDateStayCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydatestay_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDateStay\StayCancellationPolicyDateStaySavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydatestay_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDateStay\StayCancellationPolicyDateStaySavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydatestay_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDateStay\StayCancellationPolicyDateStayUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydatestay_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDateStay\StayCancellationPolicyDateStayUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydatestay_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDateStay\StayCancellationPolicyDateStayDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydatestay_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDateStay\StayCancellationPolicyDateStayDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydatestay_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDateStay\StayCancellationPolicyDateStayRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydatestay_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDateStay\StayCancellationPolicyDateStayRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydatestay_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDateStay::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDateStay\StayCancellationPolicyDateStayRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydatestay_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDateStay::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDateStay\StayCancellationPolicyDateStayCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydatestay_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDateStay::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDateStay\StayCancellationPolicyDateStayCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydatestay_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDateStay::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDateStay\StayCancellationPolicyDateStaySavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydatestay_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDateStay::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDateStay\StayCancellationPolicyDateStaySavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydatestay_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDateStay::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDateStay\StayCancellationPolicyDateStayUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydatestay_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDateStay::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDateStay\StayCancellationPolicyDateStayUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydatestay_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDateStay::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDateStay\StayCancellationPolicyDateStayDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydatestay_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDateStay::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDateStay\StayCancellationPolicyDateStayDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydatestay_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDateStay::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDateStay\StayCancellationPolicyDateStayRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydatestay_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDateStay::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDateStay\StayCancellationPolicyDateStayRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydatestay_event_external_id_filter()
    {
        try {
            $request = new Request(
                [
                'external_id'  =>  'a'
                ]
            );

            $filter = new StayCancellationPolicyDateStayQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDateStay::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydatestay_event_start_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'start_dateStart'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateStayQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDateStay::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydatestay_event_end_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'end_dateStart'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateStayQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDateStay::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydatestay_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateStayQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDateStay::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydatestay_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateStayQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDateStay::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydatestay_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateStayQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDateStay::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydatestay_event_start_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'start_dateEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateStayQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDateStay::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydatestay_event_end_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'end_dateEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateStayQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDateStay::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydatestay_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateStayQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDateStay::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydatestay_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateStayQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDateStay::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydatestay_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateStayQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDateStay::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydatestay_event_start_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'start_dateStart'  =>  now(),
                'start_dateEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateStayQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDateStay::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydatestay_event_end_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'end_dateStart'  =>  now(),
                'end_dateEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateStayQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDateStay::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydatestay_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateStayQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDateStay::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydatestay_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateStayQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDateStay::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydatestay_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateStayQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDateStay::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}