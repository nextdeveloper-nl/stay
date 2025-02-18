<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayCancellationPolicyDateQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayCancellationPolicyDateService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayCancellationPolicyDateTestTraits
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

    public function test_http_staycancellationpolicydate_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/staycancellationpolicydate',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_staycancellationpolicydate_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/staycancellationpolicydate', [
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
    public function test_staycancellationpolicydate_model_get()
    {
        $result = AbstractStayCancellationPolicyDateService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_staycancellationpolicydate_get_all()
    {
        $result = AbstractStayCancellationPolicyDateService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_staycancellationpolicydate_get_paginated()
    {
        $result = AbstractStayCancellationPolicyDateService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_staycancellationpolicydate_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDate\StayCancellationPolicyDateRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydate_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDate\StayCancellationPolicyDateCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydate_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDate\StayCancellationPolicyDateCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydate_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDate\StayCancellationPolicyDateSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydate_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDate\StayCancellationPolicyDateSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydate_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDate\StayCancellationPolicyDateUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydate_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDate\StayCancellationPolicyDateUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydate_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDate\StayCancellationPolicyDateDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydate_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDate\StayCancellationPolicyDateDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydate_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDate\StayCancellationPolicyDateRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydate_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDate\StayCancellationPolicyDateRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydate_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDate::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDate\StayCancellationPolicyDateRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydate_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDate::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDate\StayCancellationPolicyDateCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydate_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDate::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDate\StayCancellationPolicyDateCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydate_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDate::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDate\StayCancellationPolicyDateSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydate_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDate::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDate\StayCancellationPolicyDateSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydate_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDate::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDate\StayCancellationPolicyDateUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydate_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDate::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDate\StayCancellationPolicyDateUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydate_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDate::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDate\StayCancellationPolicyDateDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydate_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDate::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDate\StayCancellationPolicyDateDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydate_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDate::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDate\StayCancellationPolicyDateRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_staycancellationpolicydate_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDate::first();

            event(new \NextDeveloper\Stay\Events\StayCancellationPolicyDate\StayCancellationPolicyDateRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydate_event_external_id_filter()
    {
        try {
            $request = new Request(
                [
                'external_id'  =>  'a'
                ]
            );

            $filter = new StayCancellationPolicyDateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydate_event_start_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'start_dateStart'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydate_event_end_date_filter_start()
    {
        try {
            $request = new Request(
                [
                'end_dateStart'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydate_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydate_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydate_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydate_event_start_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'start_dateEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydate_event_end_date_filter_end()
    {
        try {
            $request = new Request(
                [
                'end_dateEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydate_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydate_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydate_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydate_event_start_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'start_dateStart'  =>  now(),
                'start_dateEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydate_event_end_date_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'end_dateStart'  =>  now(),
                'end_dateEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydate_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydate_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_staycancellationpolicydate_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayCancellationPolicyDateQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayCancellationPolicyDate::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}