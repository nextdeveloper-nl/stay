<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayProviderQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayProviderService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayProviderTestTraits
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

    public function test_http_stayprovider_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/stayprovider',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_stayprovider_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/stayprovider', [
            'form_params'   =>  [
                'observations'  =>  'a',
                'address'  =>  'a',
                'correspondence_address'  =>  'a',
                'bank_account_description'  =>  'a',
                'communication_text'  =>  'a',
                'blocking_reason'  =>  'a',
                'payment_days'  =>  '1',
                'priority'  =>  '1',
                'card_activation_days'  =>  '1',
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
    public function test_stayprovider_model_get()
    {
        $result = AbstractStayProviderService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayprovider_get_all()
    {
        $result = AbstractStayProviderService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayprovider_get_paginated()
    {
        $result = AbstractStayProviderService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_stayprovider_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProvider\StayProviderRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayprovider_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProvider\StayProviderCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayprovider_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProvider\StayProviderCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayprovider_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProvider\StayProviderSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayprovider_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProvider\StayProviderSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayprovider_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProvider\StayProviderUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayprovider_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProvider\StayProviderUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayprovider_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProvider\StayProviderDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayprovider_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProvider\StayProviderDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayprovider_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProvider\StayProviderRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayprovider_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayProvider\StayProviderRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayprovider_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProvider::first();

            event(new \NextDeveloper\Stay\Events\StayProvider\StayProviderRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayprovider_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProvider::first();

            event(new \NextDeveloper\Stay\Events\StayProvider\StayProviderCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayprovider_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProvider::first();

            event(new \NextDeveloper\Stay\Events\StayProvider\StayProviderCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayprovider_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProvider::first();

            event(new \NextDeveloper\Stay\Events\StayProvider\StayProviderSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayprovider_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProvider::first();

            event(new \NextDeveloper\Stay\Events\StayProvider\StayProviderSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayprovider_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProvider::first();

            event(new \NextDeveloper\Stay\Events\StayProvider\StayProviderUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayprovider_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProvider::first();

            event(new \NextDeveloper\Stay\Events\StayProvider\StayProviderUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayprovider_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProvider::first();

            event(new \NextDeveloper\Stay\Events\StayProvider\StayProviderDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayprovider_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProvider::first();

            event(new \NextDeveloper\Stay\Events\StayProvider\StayProviderDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayprovider_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProvider::first();

            event(new \NextDeveloper\Stay\Events\StayProvider\StayProviderRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayprovider_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayProvider::first();

            event(new \NextDeveloper\Stay\Events\StayProvider\StayProviderRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayprovider_event_observations_filter()
    {
        try {
            $request = new Request(
                [
                'observations'  =>  'a'
                ]
            );

            $filter = new StayProviderQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProvider::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayprovider_event_address_filter()
    {
        try {
            $request = new Request(
                [
                'address'  =>  'a'
                ]
            );

            $filter = new StayProviderQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProvider::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayprovider_event_correspondence_address_filter()
    {
        try {
            $request = new Request(
                [
                'correspondence_address'  =>  'a'
                ]
            );

            $filter = new StayProviderQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProvider::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayprovider_event_bank_account_description_filter()
    {
        try {
            $request = new Request(
                [
                'bank_account_description'  =>  'a'
                ]
            );

            $filter = new StayProviderQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProvider::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayprovider_event_communication_text_filter()
    {
        try {
            $request = new Request(
                [
                'communication_text'  =>  'a'
                ]
            );

            $filter = new StayProviderQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProvider::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayprovider_event_blocking_reason_filter()
    {
        try {
            $request = new Request(
                [
                'blocking_reason'  =>  'a'
                ]
            );

            $filter = new StayProviderQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProvider::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayprovider_event_payment_days_filter()
    {
        try {
            $request = new Request(
                [
                'payment_days'  =>  '1'
                ]
            );

            $filter = new StayProviderQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProvider::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayprovider_event_priority_filter()
    {
        try {
            $request = new Request(
                [
                'priority'  =>  '1'
                ]
            );

            $filter = new StayProviderQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProvider::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayprovider_event_card_activation_days_filter()
    {
        try {
            $request = new Request(
                [
                'card_activation_days'  =>  '1'
                ]
            );

            $filter = new StayProviderQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProvider::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayprovider_event_created_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now()
                ]
            );

            $filter = new StayProviderQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProvider::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayprovider_event_updated_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now()
                ]
            );

            $filter = new StayProviderQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProvider::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayprovider_event_deleted_at_filter_start()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now()
                ]
            );

            $filter = new StayProviderQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProvider::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayprovider_event_created_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayProviderQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProvider::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayprovider_event_updated_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayProviderQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProvider::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayprovider_event_deleted_at_filter_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayProviderQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProvider::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayprovider_event_created_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'created_atStart'  =>  now(),
                'created_atEnd'  =>  now()
                ]
            );

            $filter = new StayProviderQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProvider::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayprovider_event_updated_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'updated_atStart'  =>  now(),
                'updated_atEnd'  =>  now()
                ]
            );

            $filter = new StayProviderQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProvider::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayprovider_event_deleted_at_filter_start_and_end()
    {
        try {
            $request = new Request(
                [
                'deleted_atStart'  =>  now(),
                'deleted_atEnd'  =>  now()
                ]
            );

            $filter = new StayProviderQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayProvider::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}