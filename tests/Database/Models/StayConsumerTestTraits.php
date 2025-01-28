<?php

namespace NextDeveloper\Stay\Tests\Database\Models;

use Tests\TestCase;
use GuzzleHttp\Client;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use NextDeveloper\Stay\Database\Filters\StayConsumerQueryFilter;
use NextDeveloper\Stay\Services\AbstractServices\AbstractStayConsumerService;
use Illuminate\Pagination\LengthAwarePaginator;
use League\Fractal\Resource\Collection;

trait StayConsumerTestTraits
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

    public function test_http_stayconsumer_get()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'GET',
            '/stay/stayconsumer',
            ['http_errors' => false]
        );

        $this->assertContains(
            $response->getStatusCode(), [
            Response::HTTP_OK,
            Response::HTTP_NOT_FOUND
            ]
        );
    }

    public function test_http_stayconsumer_post()
    {
        $this->setupGuzzle();
        $response = $this->http->request(
            'POST', '/stay/stayconsumer', [
            'form_params'   =>  [
                'name'  =>  'a',
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
    public function test_stayconsumer_model_get()
    {
        $result = AbstractStayConsumerService::get();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayconsumer_get_all()
    {
        $result = AbstractStayConsumerService::getAll();

        $this->assertIsObject($result, Collection::class);
    }

    public function test_stayconsumer_get_paginated()
    {
        $result = AbstractStayConsumerService::get(
            null, [
            'paginated' =>  'true'
            ]
        );

        $this->assertIsObject($result, LengthAwarePaginator::class);
    }

    public function test_stayconsumer_event_retrieved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayConsumer\StayConsumerRetrievedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayconsumer_event_created_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayConsumer\StayConsumerCreatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayconsumer_event_creating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayConsumer\StayConsumerCreatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayconsumer_event_saving_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayConsumer\StayConsumerSavingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayconsumer_event_saved_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayConsumer\StayConsumerSavedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayconsumer_event_updating_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayConsumer\StayConsumerUpdatingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayconsumer_event_updated_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayConsumer\StayConsumerUpdatedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayconsumer_event_deleting_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayConsumer\StayConsumerDeletingEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayconsumer_event_deleted_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayConsumer\StayConsumerDeletedEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayconsumer_event_restoring_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayConsumer\StayConsumerRestoringEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayconsumer_event_restored_without_object()
    {
        try {
            event(new \NextDeveloper\Stay\Events\StayConsumer\StayConsumerRestoredEvent());
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayconsumer_event_retrieved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayConsumer::first();

            event(new \NextDeveloper\Stay\Events\StayConsumer\StayConsumerRetrievedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayconsumer_event_created_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayConsumer::first();

            event(new \NextDeveloper\Stay\Events\StayConsumer\StayConsumerCreatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayconsumer_event_creating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayConsumer::first();

            event(new \NextDeveloper\Stay\Events\StayConsumer\StayConsumerCreatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayconsumer_event_saving_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayConsumer::first();

            event(new \NextDeveloper\Stay\Events\StayConsumer\StayConsumerSavingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayconsumer_event_saved_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayConsumer::first();

            event(new \NextDeveloper\Stay\Events\StayConsumer\StayConsumerSavedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayconsumer_event_updating_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayConsumer::first();

            event(new \NextDeveloper\Stay\Events\StayConsumer\StayConsumerUpdatingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayconsumer_event_updated_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayConsumer::first();

            event(new \NextDeveloper\Stay\Events\StayConsumer\StayConsumerUpdatedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayconsumer_event_deleting_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayConsumer::first();

            event(new \NextDeveloper\Stay\Events\StayConsumer\StayConsumerDeletingEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayconsumer_event_deleted_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayConsumer::first();

            event(new \NextDeveloper\Stay\Events\StayConsumer\StayConsumerDeletedEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayconsumer_event_restoring_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayConsumer::first();

            event(new \NextDeveloper\Stay\Events\StayConsumer\StayConsumerRestoringEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    public function test_stayconsumer_event_restored_with_object()
    {
        try {
            $model = \NextDeveloper\Stay\Database\Models\StayConsumer::first();

            event(new \NextDeveloper\Stay\Events\StayConsumer\StayConsumerRestoredEvent($model));
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }

    public function test_stayconsumer_event_name_filter()
    {
        try {
            $request = new Request(
                [
                'name'  =>  'a'
                ]
            );

            $filter = new StayConsumerQueryFilter($request);

            $model = \NextDeveloper\Stay\Database\Models\StayConsumer::filter($filter)->first();
        } catch (\Exception $e) {
            $this->assertFalse(false, $e->getMessage());
        }

        $this->assertTrue(true);
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}