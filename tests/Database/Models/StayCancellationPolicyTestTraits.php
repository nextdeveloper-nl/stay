<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayCancellationPolicyQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayCancellationPolicyService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayCancellationPolicyTestTraits
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

    public function test_http_staycancellationpolicy_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/staycancellationpolicy',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_staycancellationpolicy_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/staycancellationpolicy', [
            'form_params'   =>  [
                'name'  =>  'a',
                'observation'  =>  'a',
                'product_type'  =>  'a',
                'description_es'  =>  'a',
                'description_en'  =>  'a',
                'external_id'  =>  'a',
                'priority'  =>  '1',
                    'booking_start_date'  =>  now(),
                    'booking_end_date'  =>  now(),
                    'travel_start_date'  =>  now(),
                    'travel_end_date'  =>  now(),
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
    public function test_staycancellationpolicy_model_get()
    {
        $result = AbstractStayCancellationPolicyService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_staycancellationpolicy_get_all()
    {
        $result = AbstractStayCancellationPolicyService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_staycancellationpolicy_get_paginated()
    {
        $result = AbstractStayCancellationPolicyService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_staycancellationpolicy_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicy\StayCancellationPolicyRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicy_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicy\StayCancellationPolicyCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicy_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicy\StayCancellationPolicyCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicy_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicy\StayCancellationPolicySavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicy_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicy\StayCancellationPolicySavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicy_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicy\StayCancellationPolicyUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicy_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicy\StayCancellationPolicyUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicy_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicy\StayCancellationPolicyDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicy_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicy\StayCancellationPolicyDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicy_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicy\StayCancellationPolicyRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicy_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicy\StayCancellationPolicyRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicy\StayCancellationPolicyRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicy_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicy\StayCancellationPolicyCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicy_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicy\StayCancellationPolicyCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicy_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicy\StayCancellationPolicySavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicy_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicy\StayCancellationPolicySavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicy_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicy\StayCancellationPolicyUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicy_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicy\StayCancellationPolicyUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicy_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicy\StayCancellationPolicyDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicy_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicy\StayCancellationPolicyDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicy_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicy\StayCancellationPolicyRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicy_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicy\StayCancellationPolicyRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_name_filter()
    {
        try {
            $request = new Request(
                [
                'name'  =>  'a'
                ]
            );

            $filter = new StayCancellationPolicyQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_observation_filter()
    {
        try {
            $request = new Request(
                [
                'observation'  =>  'a'
                ]
            );

            $filter = new StayCancellationPolicyQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_product_type_filter()
    {
        try {
            $request = new Request(
                [
                'product_type'  =>  'a'
                ]
            );

            $filter = new StayCancellationPolicyQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_description_es_filter()
    {
        try {
            $request = new Request(
                [
                'description_es'  =>  'a'
                ]
            );

            $filter = new StayCancellationPolicyQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_description_en_filter()
    {
        try {
            $request = new Request(
                [
                'description_en'  =>  'a'
                ]
            );

            $filter = new StayCancellationPolicyQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_external_id_filter()
    {
        try {
            $request = new Request(
                [
                'external_id'  =>  'a'
                ]
            );

            $filter = new StayCancellationPolicyQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_priority_filter()
    {
        try {
            $request = new Request(
                [
                'priority'  =>  '1'
                ]
            );

            $filter = new StayCancellationPolicyQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_booking_start_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'booking_start_dateStart'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_booking_end_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'booking_end_dateStart'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_travel_start_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'travel_start_dateStart'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_travel_end_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'travel_end_dateStart'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_booking_start_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'booking_start_dateEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_booking_end_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'booking_end_dateEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_travel_start_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'travel_start_dateEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_travel_end_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'travel_end_dateEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_booking_start_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'booking_start_dateStart'  =>  now(),
                'booking_start_dateEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_booking_end_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'booking_end_dateStart'  =>  now(),
                'booking_end_dateEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_travel_start_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'travel_start_dateStart'  =>  now(),
                'travel_start_dateEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_travel_end_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'travel_end_dateStart'  =>  now(),
                'travel_end_dateEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicy_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicy::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}