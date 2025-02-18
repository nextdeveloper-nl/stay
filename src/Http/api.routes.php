<?php

Route::prefix('stay')->group(
    function () {
        Route::prefix('agency-groups')->group(
            function () {
                Route::get('/', 'AgencyGroups\AgencyGroupsController@index');
                Route::get('/actions', 'AgencyGroups\AgencyGroupsController@getActions');

                Route::get('{stay_agency_groups}/tags ', 'AgencyGroups\AgencyGroupsController@tags');
                Route::post('{stay_agency_groups}/tags ', 'AgencyGroups\AgencyGroupsController@saveTags');
                Route::get('{stay_agency_groups}/addresses ', 'AgencyGroups\AgencyGroupsController@addresses');
                Route::post('{stay_agency_groups}/addresses ', 'AgencyGroups\AgencyGroupsController@saveAddresses');

                Route::get('/{stay_agency_groups}/{subObjects}', 'AgencyGroups\AgencyGroupsController@relatedObjects');
                Route::get('/{stay_agency_groups}', 'AgencyGroups\AgencyGroupsController@show');

                Route::post('/', 'AgencyGroups\AgencyGroupsController@store');
                Route::post('/{stay_agency_groups}/do/{action}', 'AgencyGroups\AgencyGroupsController@doAction');

                Route::patch('/{stay_agency_groups}', 'AgencyGroups\AgencyGroupsController@update');
                Route::delete('/{stay_agency_groups}', 'AgencyGroups\AgencyGroupsController@destroy');
            }
        );

        Route::prefix('cancellation-policies')->group(
            function () {
                Route::get('/', 'CancellationPolicies\CancellationPoliciesController@index');
                Route::get('/actions', 'CancellationPolicies\CancellationPoliciesController@getActions');

                Route::get('{stay_cancellation_policies}/tags ', 'CancellationPolicies\CancellationPoliciesController@tags');
                Route::post('{stay_cancellation_policies}/tags ', 'CancellationPolicies\CancellationPoliciesController@saveTags');
                Route::get('{stay_cancellation_policies}/addresses ', 'CancellationPolicies\CancellationPoliciesController@addresses');
                Route::post('{stay_cancellation_policies}/addresses ', 'CancellationPolicies\CancellationPoliciesController@saveAddresses');

                Route::get('/{stay_cancellation_policies}/{subObjects}', 'CancellationPolicies\CancellationPoliciesController@relatedObjects');
                Route::get('/{stay_cancellation_policies}', 'CancellationPolicies\CancellationPoliciesController@show');

                Route::post('/', 'CancellationPolicies\CancellationPoliciesController@store');
                Route::post('/{stay_cancellation_policies}/do/{action}', 'CancellationPolicies\CancellationPoliciesController@doAction');

                Route::patch('/{stay_cancellation_policies}', 'CancellationPolicies\CancellationPoliciesController@update');
                Route::delete('/{stay_cancellation_policies}', 'CancellationPolicies\CancellationPoliciesController@destroy');
            }
        );

        Route::prefix('cancellation-policy-dates')->group(
            function () {
                Route::get('/', 'CancellationPolicyDates\CancellationPolicyDatesController@index');
                Route::get('/actions', 'CancellationPolicyDates\CancellationPolicyDatesController@getActions');

                Route::get('{stay_cancellation_policy_dates}/tags ', 'CancellationPolicyDates\CancellationPolicyDatesController@tags');
                Route::post('{stay_cancellation_policy_dates}/tags ', 'CancellationPolicyDates\CancellationPolicyDatesController@saveTags');
                Route::get('{stay_cancellation_policy_dates}/addresses ', 'CancellationPolicyDates\CancellationPolicyDatesController@addresses');
                Route::post('{stay_cancellation_policy_dates}/addresses ', 'CancellationPolicyDates\CancellationPolicyDatesController@saveAddresses');

                Route::get('/{stay_cancellation_policy_dates}/{subObjects}', 'CancellationPolicyDates\CancellationPolicyDatesController@relatedObjects');
                Route::get('/{stay_cancellation_policy_dates}', 'CancellationPolicyDates\CancellationPolicyDatesController@show');

                Route::post('/', 'CancellationPolicyDates\CancellationPolicyDatesController@store');
                Route::post('/{stay_cancellation_policy_dates}/do/{action}', 'CancellationPolicyDates\CancellationPolicyDatesController@doAction');

                Route::patch('/{stay_cancellation_policy_dates}', 'CancellationPolicyDates\CancellationPolicyDatesController@update');
                Route::delete('/{stay_cancellation_policy_dates}', 'CancellationPolicyDates\CancellationPolicyDatesController@destroy');
            }
        );

        Route::prefix('providers')->group(
            function () {
                Route::get('/', 'Providers\ProvidersController@index');
                Route::get('/actions', 'Providers\ProvidersController@getActions');

                Route::get('{stay_providers}/tags ', 'Providers\ProvidersController@tags');
                Route::post('{stay_providers}/tags ', 'Providers\ProvidersController@saveTags');
                Route::get('{stay_providers}/addresses ', 'Providers\ProvidersController@addresses');
                Route::post('{stay_providers}/addresses ', 'Providers\ProvidersController@saveAddresses');

                Route::get('/{stay_providers}/{subObjects}', 'Providers\ProvidersController@relatedObjects');
                Route::get('/{stay_providers}', 'Providers\ProvidersController@show');

                Route::post('/', 'Providers\ProvidersController@store');
                Route::post('/{stay_providers}/do/{action}', 'Providers\ProvidersController@doAction');

                Route::patch('/{stay_providers}', 'Providers\ProvidersController@update');
                Route::delete('/{stay_providers}', 'Providers\ProvidersController@destroy');
            }
        );

        Route::prefix('hotels')->group(
            function () {
                Route::get('/', 'Hotels\HotelsController@index');
                Route::get('/actions', 'Hotels\HotelsController@getActions');

                Route::get('{stay_hotels}/tags ', 'Hotels\HotelsController@tags');
                Route::post('{stay_hotels}/tags ', 'Hotels\HotelsController@saveTags');
                Route::get('{stay_hotels}/addresses ', 'Hotels\HotelsController@addresses');
                Route::post('{stay_hotels}/addresses ', 'Hotels\HotelsController@saveAddresses');

                Route::get('/{stay_hotels}/{subObjects}', 'Hotels\HotelsController@relatedObjects');
                Route::get('/{stay_hotels}', 'Hotels\HotelsController@show');

                Route::post('/', 'Hotels\HotelsController@store');
                Route::post('/{stay_hotels}/do/{action}', 'Hotels\HotelsController@doAction');

                Route::patch('/{stay_hotels}', 'Hotels\HotelsController@update');
                Route::delete('/{stay_hotels}', 'Hotels\HotelsController@destroy');
            }
        );

        Route::prefix('room-types')->group(
            function () {
                Route::get('/', 'RoomTypes\RoomTypesController@index');
                Route::get('/actions', 'RoomTypes\RoomTypesController@getActions');

                Route::get('{stay_room_types}/tags ', 'RoomTypes\RoomTypesController@tags');
                Route::post('{stay_room_types}/tags ', 'RoomTypes\RoomTypesController@saveTags');
                Route::get('{stay_room_types}/addresses ', 'RoomTypes\RoomTypesController@addresses');
                Route::post('{stay_room_types}/addresses ', 'RoomTypes\RoomTypesController@saveAddresses');

                Route::get('/{stay_room_types}/{subObjects}', 'RoomTypes\RoomTypesController@relatedObjects');
                Route::get('/{stay_room_types}', 'RoomTypes\RoomTypesController@show');

                Route::post('/', 'RoomTypes\RoomTypesController@store');
                Route::post('/{stay_room_types}/do/{action}', 'RoomTypes\RoomTypesController@doAction');

                Route::patch('/{stay_room_types}', 'RoomTypes\RoomTypesController@update');
                Route::delete('/{stay_room_types}', 'RoomTypes\RoomTypesController@destroy');
            }
        );

        Route::prefix('rooms')->group(
            function () {
                Route::get('/', 'Rooms\RoomsController@index');
                Route::get('/actions', 'Rooms\RoomsController@getActions');

                Route::get('{stay_rooms}/tags ', 'Rooms\RoomsController@tags');
                Route::post('{stay_rooms}/tags ', 'Rooms\RoomsController@saveTags');
                Route::get('{stay_rooms}/addresses ', 'Rooms\RoomsController@addresses');
                Route::post('{stay_rooms}/addresses ', 'Rooms\RoomsController@saveAddresses');

                Route::get('/{stay_rooms}/{subObjects}', 'Rooms\RoomsController@relatedObjects');
                Route::get('/{stay_rooms}', 'Rooms\RoomsController@show');

                Route::post('/', 'Rooms\RoomsController@store');
                Route::post('/{stay_rooms}/do/{action}', 'Rooms\RoomsController@doAction');

                Route::patch('/{stay_rooms}', 'Rooms\RoomsController@update');
                Route::delete('/{stay_rooms}', 'Rooms\RoomsController@destroy');
            }
        );

        Route::prefix('tarif-types')->group(
            function () {
                Route::get('/', 'TarifTypes\TarifTypesController@index');
                Route::get('/actions', 'TarifTypes\TarifTypesController@getActions');

                Route::get('{stay_tarif_types}/tags ', 'TarifTypes\TarifTypesController@tags');
                Route::post('{stay_tarif_types}/tags ', 'TarifTypes\TarifTypesController@saveTags');
                Route::get('{stay_tarif_types}/addresses ', 'TarifTypes\TarifTypesController@addresses');
                Route::post('{stay_tarif_types}/addresses ', 'TarifTypes\TarifTypesController@saveAddresses');

                Route::get('/{stay_tarif_types}/{subObjects}', 'TarifTypes\TarifTypesController@relatedObjects');
                Route::get('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@show');

                Route::post('/', 'TarifTypes\TarifTypesController@store');
                Route::post('/{stay_tarif_types}/do/{action}', 'TarifTypes\TarifTypesController@doAction');

                Route::patch('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@update');
                Route::delete('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@destroy');
            }
        );

        Route::prefix('reservations')->group(
            function () {
                Route::get('/', 'Reservations\ReservationsController@index');
                Route::get('/actions', 'Reservations\ReservationsController@getActions');

                Route::get('{stay_reservations}/tags ', 'Reservations\ReservationsController@tags');
                Route::post('{stay_reservations}/tags ', 'Reservations\ReservationsController@saveTags');
                Route::get('{stay_reservations}/addresses ', 'Reservations\ReservationsController@addresses');
                Route::post('{stay_reservations}/addresses ', 'Reservations\ReservationsController@saveAddresses');

                Route::get('/{stay_reservations}/{subObjects}', 'Reservations\ReservationsController@relatedObjects');
                Route::get('/{stay_reservations}', 'Reservations\ReservationsController@show');

                Route::post('/', 'Reservations\ReservationsController@store');
                Route::post('/{stay_reservations}/do/{action}', 'Reservations\ReservationsController@doAction');

                Route::patch('/{stay_reservations}', 'Reservations\ReservationsController@update');
                Route::delete('/{stay_reservations}', 'Reservations\ReservationsController@destroy');
            }
        );

        Route::prefix('main-purchase-contracts')->group(
            function () {
                Route::get('/', 'MainPurchaseContracts\MainPurchaseContractsController@index');
                Route::get('/actions', 'MainPurchaseContracts\MainPurchaseContractsController@getActions');

                Route::get('{stay_main_purchase_contracts}/tags ', 'MainPurchaseContracts\MainPurchaseContractsController@tags');
                Route::post('{stay_main_purchase_contracts}/tags ', 'MainPurchaseContracts\MainPurchaseContractsController@saveTags');
                Route::get('{stay_main_purchase_contracts}/addresses ', 'MainPurchaseContracts\MainPurchaseContractsController@addresses');
                Route::post('{stay_main_purchase_contracts}/addresses ', 'MainPurchaseContracts\MainPurchaseContractsController@saveAddresses');

                Route::get('/{stay_main_purchase_contracts}/{subObjects}', 'MainPurchaseContracts\MainPurchaseContractsController@relatedObjects');
                Route::get('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@show');

                Route::post('/', 'MainPurchaseContracts\MainPurchaseContractsController@store');
                Route::post('/{stay_main_purchase_contracts}/do/{action}', 'MainPurchaseContracts\MainPurchaseContractsController@doAction');

                Route::patch('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@update');
                Route::delete('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@destroy');
            }
        );

        Route::prefix('sales-contracts')->group(
            function () {
                Route::get('/', 'SalesContracts\SalesContractsController@index');
                Route::get('/actions', 'SalesContracts\SalesContractsController@getActions');

                Route::get('{stay_sales_contracts}/tags ', 'SalesContracts\SalesContractsController@tags');
                Route::post('{stay_sales_contracts}/tags ', 'SalesContracts\SalesContractsController@saveTags');
                Route::get('{stay_sales_contracts}/addresses ', 'SalesContracts\SalesContractsController@addresses');
                Route::post('{stay_sales_contracts}/addresses ', 'SalesContracts\SalesContractsController@saveAddresses');

                Route::get('/{stay_sales_contracts}/{subObjects}', 'SalesContracts\SalesContractsController@relatedObjects');
                Route::get('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@show');

                Route::post('/', 'SalesContracts\SalesContractsController@store');
                Route::post('/{stay_sales_contracts}/do/{action}', 'SalesContracts\SalesContractsController@doAction');

                Route::patch('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@update');
                Route::delete('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@destroy');
            }
        );

        Route::prefix('quota-contracts')->group(
            function () {
                Route::get('/', 'QuotaContracts\QuotaContractsController@index');
                Route::get('/actions', 'QuotaContracts\QuotaContractsController@getActions');

                Route::get('{stay_quota_contracts}/tags ', 'QuotaContracts\QuotaContractsController@tags');
                Route::post('{stay_quota_contracts}/tags ', 'QuotaContracts\QuotaContractsController@saveTags');
                Route::get('{stay_quota_contracts}/addresses ', 'QuotaContracts\QuotaContractsController@addresses');
                Route::post('{stay_quota_contracts}/addresses ', 'QuotaContracts\QuotaContractsController@saveAddresses');

                Route::get('/{stay_quota_contracts}/{subObjects}', 'QuotaContracts\QuotaContractsController@relatedObjects');
                Route::get('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@show');

                Route::post('/', 'QuotaContracts\QuotaContractsController@store');
                Route::post('/{stay_quota_contracts}/do/{action}', 'QuotaContracts\QuotaContractsController@doAction');

                Route::patch('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@update');
                Route::delete('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@destroy');
            }
        );

        Route::prefix('hotel-contracts')->group(
            function () {
                Route::get('/', 'HotelContracts\HotelContractsController@index');
                Route::get('/actions', 'HotelContracts\HotelContractsController@getActions');

                Route::get('{stay_hotel_contracts}/tags ', 'HotelContracts\HotelContractsController@tags');
                Route::post('{stay_hotel_contracts}/tags ', 'HotelContracts\HotelContractsController@saveTags');
                Route::get('{stay_hotel_contracts}/addresses ', 'HotelContracts\HotelContractsController@addresses');
                Route::post('{stay_hotel_contracts}/addresses ', 'HotelContracts\HotelContractsController@saveAddresses');

                Route::get('/{stay_hotel_contracts}/{subObjects}', 'HotelContracts\HotelContractsController@relatedObjects');
                Route::get('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@show');

                Route::post('/', 'HotelContracts\HotelContractsController@store');
                Route::post('/{stay_hotel_contracts}/do/{action}', 'HotelContracts\HotelContractsController@doAction');

                Route::patch('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@update');
                Route::delete('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@destroy');
            }
        );

        Route::prefix('rates')->group(
            function () {
                Route::get('/', 'Rates\RatesController@index');
                Route::get('/actions', 'Rates\RatesController@getActions');

                Route::get('{stay_rates}/tags ', 'Rates\RatesController@tags');
                Route::post('{stay_rates}/tags ', 'Rates\RatesController@saveTags');
                Route::get('{stay_rates}/addresses ', 'Rates\RatesController@addresses');
                Route::post('{stay_rates}/addresses ', 'Rates\RatesController@saveAddresses');

                Route::get('/{stay_rates}/{subObjects}', 'Rates\RatesController@relatedObjects');
                Route::get('/{stay_rates}', 'Rates\RatesController@show');

                Route::post('/', 'Rates\RatesController@store');
                Route::post('/{stay_rates}/do/{action}', 'Rates\RatesController@doAction');

                Route::patch('/{stay_rates}', 'Rates\RatesController@update');
                Route::delete('/{stay_rates}', 'Rates\RatesController@destroy');
            }
        );

        Route::prefix('rate-prices')->group(
            function () {
                Route::get('/', 'RatePrices\RatePricesController@index');
                Route::get('/actions', 'RatePrices\RatePricesController@getActions');

                Route::get('{stay_rate_prices}/tags ', 'RatePrices\RatePricesController@tags');
                Route::post('{stay_rate_prices}/tags ', 'RatePrices\RatePricesController@saveTags');
                Route::get('{stay_rate_prices}/addresses ', 'RatePrices\RatePricesController@addresses');
                Route::post('{stay_rate_prices}/addresses ', 'RatePrices\RatePricesController@saveAddresses');

                Route::get('/{stay_rate_prices}/{subObjects}', 'RatePrices\RatePricesController@relatedObjects');
                Route::get('/{stay_rate_prices}', 'RatePrices\RatePricesController@show');

                Route::post('/', 'RatePrices\RatePricesController@store');
                Route::post('/{stay_rate_prices}/do/{action}', 'RatePrices\RatePricesController@doAction');

                Route::patch('/{stay_rate_prices}', 'RatePrices\RatePricesController@update');
                Route::delete('/{stay_rate_prices}', 'RatePrices\RatePricesController@destroy');
            }
        );

        Route::prefix('room-type-provider-mappings')->group(
            function () {
                Route::get('/', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@index');
                Route::get('/actions', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@getActions');

                Route::get('{stay_room_type_provider_mappings}/tags ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@tags');
                Route::post('{stay_room_type_provider_mappings}/tags ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@saveTags');
                Route::get('{stay_room_type_provider_mappings}/addresses ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@addresses');
                Route::post('{stay_room_type_provider_mappings}/addresses ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@saveAddresses');

                Route::get('/{stay_room_type_provider_mappings}/{subObjects}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@relatedObjects');
                Route::get('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@show');

                Route::post('/', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@store');
                Route::post('/{stay_room_type_provider_mappings}/do/{action}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@doAction');

                Route::patch('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@update');
                Route::delete('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@destroy');
            }
        );

        Route::prefix('hotel-consumer-mappings')->group(
            function () {
                Route::get('/', 'HotelConsumerMappings\HotelConsumerMappingsController@index');
                Route::get('/actions', 'HotelConsumerMappings\HotelConsumerMappingsController@getActions');

                Route::get('{stay_hotel_consumer_mappings}/tags ', 'HotelConsumerMappings\HotelConsumerMappingsController@tags');
                Route::post('{stay_hotel_consumer_mappings}/tags ', 'HotelConsumerMappings\HotelConsumerMappingsController@saveTags');
                Route::get('{stay_hotel_consumer_mappings}/addresses ', 'HotelConsumerMappings\HotelConsumerMappingsController@addresses');
                Route::post('{stay_hotel_consumer_mappings}/addresses ', 'HotelConsumerMappings\HotelConsumerMappingsController@saveAddresses');

                Route::get('/{stay_hotel_consumer_mappings}/{subObjects}', 'HotelConsumerMappings\HotelConsumerMappingsController@relatedObjects');
                Route::get('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@show');

                Route::post('/', 'HotelConsumerMappings\HotelConsumerMappingsController@store');
                Route::post('/{stay_hotel_consumer_mappings}/do/{action}', 'HotelConsumerMappings\HotelConsumerMappingsController@doAction');

                Route::patch('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@update');
                Route::delete('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@destroy');
            }
        );

        Route::prefix('consumers')->group(
            function () {
                Route::get('/', 'Consumers\ConsumersController@index');
                Route::get('/actions', 'Consumers\ConsumersController@getActions');

                Route::get('{stay_consumers}/tags ', 'Consumers\ConsumersController@tags');
                Route::post('{stay_consumers}/tags ', 'Consumers\ConsumersController@saveTags');
                Route::get('{stay_consumers}/addresses ', 'Consumers\ConsumersController@addresses');
                Route::post('{stay_consumers}/addresses ', 'Consumers\ConsumersController@saveAddresses');

                Route::get('/{stay_consumers}/{subObjects}', 'Consumers\ConsumersController@relatedObjects');
                Route::get('/{stay_consumers}', 'Consumers\ConsumersController@show');

                Route::post('/', 'Consumers\ConsumersController@store');
                Route::post('/{stay_consumers}/do/{action}', 'Consumers\ConsumersController@doAction');

                Route::patch('/{stay_consumers}', 'Consumers\ConsumersController@update');
                Route::delete('/{stay_consumers}', 'Consumers\ConsumersController@destroy');
            }
        );

        Route::prefix('room-type-consumer-mappings')->group(
            function () {
                Route::get('/', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@index');
                Route::get('/actions', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@getActions');

                Route::get('{stay_room_type_consumer_mappings}/tags ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@tags');
                Route::post('{stay_room_type_consumer_mappings}/tags ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@saveTags');
                Route::get('{stay_room_type_consumer_mappings}/addresses ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@addresses');
                Route::post('{stay_room_type_consumer_mappings}/addresses ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@saveAddresses');

                Route::get('/{stay_room_type_consumer_mappings}/{subObjects}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@relatedObjects');
                Route::get('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@show');

                Route::post('/', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@store');
                Route::post('/{stay_room_type_consumer_mappings}/do/{action}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@doAction');

                Route::patch('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@update');
                Route::delete('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@destroy');
            }
        );

        Route::prefix('hotel-provider-mappings')->group(
            function () {
                Route::get('/', 'HotelProviderMappings\HotelProviderMappingsController@index');
                Route::get('/actions', 'HotelProviderMappings\HotelProviderMappingsController@getActions');

                Route::get('{stay_hotel_provider_mappings}/tags ', 'HotelProviderMappings\HotelProviderMappingsController@tags');
                Route::post('{stay_hotel_provider_mappings}/tags ', 'HotelProviderMappings\HotelProviderMappingsController@saveTags');
                Route::get('{stay_hotel_provider_mappings}/addresses ', 'HotelProviderMappings\HotelProviderMappingsController@addresses');
                Route::post('{stay_hotel_provider_mappings}/addresses ', 'HotelProviderMappings\HotelProviderMappingsController@saveAddresses');

                Route::get('/{stay_hotel_provider_mappings}/{subObjects}', 'HotelProviderMappings\HotelProviderMappingsController@relatedObjects');
                Route::get('/{stay_hotel_provider_mappings}', 'HotelProviderMappings\HotelProviderMappingsController@show');

                Route::post('/', 'HotelProviderMappings\HotelProviderMappingsController@store');
                Route::post('/{stay_hotel_provider_mappings}/do/{action}', 'HotelProviderMappings\HotelProviderMappingsController@doAction');

                Route::patch('/{stay_hotel_provider_mappings}', 'HotelProviderMappings\HotelProviderMappingsController@update');
                Route::delete('/{stay_hotel_provider_mappings}', 'HotelProviderMappings\HotelProviderMappingsController@destroy');
            }
        );

        // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE























































































































































































































        Route::prefix('hotels')->group(
            function () {
                Route::get('external/{externalId}/show', 'Hotels\HotelsController@getByExternalId');
            }
        );

        Route::prefix('providers')->group(
            function () {
                Route::get('/', 'Providers\ProvidersController@index');
                Route::get('/actions', 'Providers\ProvidersController@getActions');

                Route::get('{stay_providers}/tags ', 'Providers\ProvidersController@tags');
                Route::post('{stay_providers}/tags ', 'Providers\ProvidersController@saveTags');
                Route::get('{stay_providers}/addresses ', 'Providers\ProvidersController@addresses');
                Route::post('{stay_providers}/addresses ', 'Providers\ProvidersController@saveAddresses');

                Route::get('/{stay_providers}/{subObjects}', 'Providers\ProvidersController@relatedObjects');
                Route::get('/{stay_providers}', 'Providers\ProvidersController@show');

                Route::post('/', 'Providers\ProvidersController@store');
                Route::post('/{stay_providers}/do/{action}', 'Providers\ProvidersController@doAction');

                Route::patch('/{stay_providers}', 'Providers\ProvidersController@update');
                Route::delete('/{stay_providers}', 'Providers\ProvidersController@destroy');
            }
        );

        Route::prefix('hotels')->group(
            function () {
                Route::get('/', 'Hotels\HotelsController@index');
                Route::get('/actions', 'Hotels\HotelsController@getActions');

                Route::get('{stay_hotels}/tags ', 'Hotels\HotelsController@tags');
                Route::post('{stay_hotels}/tags ', 'Hotels\HotelsController@saveTags');
                Route::get('{stay_hotels}/addresses ', 'Hotels\HotelsController@addresses');
                Route::post('{stay_hotels}/addresses ', 'Hotels\HotelsController@saveAddresses');

                Route::get('/{stay_hotels}/{subObjects}', 'Hotels\HotelsController@relatedObjects');
                Route::get('/{stay_hotels}', 'Hotels\HotelsController@show');

                Route::post('/', 'Hotels\HotelsController@store');
                Route::post('/{stay_hotels}/do/{action}', 'Hotels\HotelsController@doAction');

                Route::patch('/{stay_hotels}', 'Hotels\HotelsController@update');
                Route::delete('/{stay_hotels}', 'Hotels\HotelsController@destroy');
            }
        );

        Route::prefix('room-types')->group(
            function () {
                Route::get('/', 'RoomTypes\RoomTypesController@index');
                Route::get('/actions', 'RoomTypes\RoomTypesController@getActions');

                Route::get('{stay_room_types}/tags ', 'RoomTypes\RoomTypesController@tags');
                Route::post('{stay_room_types}/tags ', 'RoomTypes\RoomTypesController@saveTags');
                Route::get('{stay_room_types}/addresses ', 'RoomTypes\RoomTypesController@addresses');
                Route::post('{stay_room_types}/addresses ', 'RoomTypes\RoomTypesController@saveAddresses');

                Route::get('/{stay_room_types}/{subObjects}', 'RoomTypes\RoomTypesController@relatedObjects');
                Route::get('/{stay_room_types}', 'RoomTypes\RoomTypesController@show');

                Route::post('/', 'RoomTypes\RoomTypesController@store');
                Route::post('/{stay_room_types}/do/{action}', 'RoomTypes\RoomTypesController@doAction');

                Route::patch('/{stay_room_types}', 'RoomTypes\RoomTypesController@update');
                Route::delete('/{stay_room_types}', 'RoomTypes\RoomTypesController@destroy');
            }
        );

        Route::prefix('rooms')->group(
            function () {
                Route::get('/', 'Rooms\RoomsController@index');
                Route::get('/actions', 'Rooms\RoomsController@getActions');

                Route::get('{stay_rooms}/tags ', 'Rooms\RoomsController@tags');
                Route::post('{stay_rooms}/tags ', 'Rooms\RoomsController@saveTags');
                Route::get('{stay_rooms}/addresses ', 'Rooms\RoomsController@addresses');
                Route::post('{stay_rooms}/addresses ', 'Rooms\RoomsController@saveAddresses');

                Route::get('/{stay_rooms}/{subObjects}', 'Rooms\RoomsController@relatedObjects');
                Route::get('/{stay_rooms}', 'Rooms\RoomsController@show');

                Route::post('/', 'Rooms\RoomsController@store');
                Route::post('/{stay_rooms}/do/{action}', 'Rooms\RoomsController@doAction');

                Route::patch('/{stay_rooms}', 'Rooms\RoomsController@update');
                Route::delete('/{stay_rooms}', 'Rooms\RoomsController@destroy');
            }
        );

        Route::prefix('tarif-types')->group(
            function () {
                Route::get('/', 'TarifTypes\TarifTypesController@index');
                Route::get('/actions', 'TarifTypes\TarifTypesController@getActions');

                Route::get('{stay_tarif_types}/tags ', 'TarifTypes\TarifTypesController@tags');
                Route::post('{stay_tarif_types}/tags ', 'TarifTypes\TarifTypesController@saveTags');
                Route::get('{stay_tarif_types}/addresses ', 'TarifTypes\TarifTypesController@addresses');
                Route::post('{stay_tarif_types}/addresses ', 'TarifTypes\TarifTypesController@saveAddresses');

                Route::get('/{stay_tarif_types}/{subObjects}', 'TarifTypes\TarifTypesController@relatedObjects');
                Route::get('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@show');

                Route::post('/', 'TarifTypes\TarifTypesController@store');
                Route::post('/{stay_tarif_types}/do/{action}', 'TarifTypes\TarifTypesController@doAction');

                Route::patch('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@update');
                Route::delete('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@destroy');
            }
        );

        Route::prefix('reservations')->group(
            function () {
                Route::get('/', 'Reservations\ReservationsController@index');
                Route::get('/actions', 'Reservations\ReservationsController@getActions');

                Route::get('{stay_reservations}/tags ', 'Reservations\ReservationsController@tags');
                Route::post('{stay_reservations}/tags ', 'Reservations\ReservationsController@saveTags');
                Route::get('{stay_reservations}/addresses ', 'Reservations\ReservationsController@addresses');
                Route::post('{stay_reservations}/addresses ', 'Reservations\ReservationsController@saveAddresses');

                Route::get('/{stay_reservations}/{subObjects}', 'Reservations\ReservationsController@relatedObjects');
                Route::get('/{stay_reservations}', 'Reservations\ReservationsController@show');

                Route::post('/', 'Reservations\ReservationsController@store');
                Route::post('/{stay_reservations}/do/{action}', 'Reservations\ReservationsController@doAction');

                Route::patch('/{stay_reservations}', 'Reservations\ReservationsController@update');
                Route::delete('/{stay_reservations}', 'Reservations\ReservationsController@destroy');
            }
        );

        Route::prefix('main-purchase-contracts')->group(
            function () {
                Route::get('/', 'MainPurchaseContracts\MainPurchaseContractsController@index');
                Route::get('/actions', 'MainPurchaseContracts\MainPurchaseContractsController@getActions');

                Route::get('{stay_main_purchase_contracts}/tags ', 'MainPurchaseContracts\MainPurchaseContractsController@tags');
                Route::post('{stay_main_purchase_contracts}/tags ', 'MainPurchaseContracts\MainPurchaseContractsController@saveTags');
                Route::get('{stay_main_purchase_contracts}/addresses ', 'MainPurchaseContracts\MainPurchaseContractsController@addresses');
                Route::post('{stay_main_purchase_contracts}/addresses ', 'MainPurchaseContracts\MainPurchaseContractsController@saveAddresses');

                Route::get('/{stay_main_purchase_contracts}/{subObjects}', 'MainPurchaseContracts\MainPurchaseContractsController@relatedObjects');
                Route::get('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@show');

                Route::post('/', 'MainPurchaseContracts\MainPurchaseContractsController@store');
                Route::post('/{stay_main_purchase_contracts}/do/{action}', 'MainPurchaseContracts\MainPurchaseContractsController@doAction');

                Route::patch('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@update');
                Route::delete('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@destroy');
            }
        );

        Route::prefix('providers')->group(
            function () {
                Route::get('/', 'Providers\ProvidersController@index');
                Route::get('/actions', 'Providers\ProvidersController@getActions');

                Route::get('{stay_providers}/tags ', 'Providers\ProvidersController@tags');
                Route::post('{stay_providers}/tags ', 'Providers\ProvidersController@saveTags');
                Route::get('{stay_providers}/addresses ', 'Providers\ProvidersController@addresses');
                Route::post('{stay_providers}/addresses ', 'Providers\ProvidersController@saveAddresses');

                Route::get('/{stay_providers}/{subObjects}', 'Providers\ProvidersController@relatedObjects');
                Route::get('/{stay_providers}', 'Providers\ProvidersController@show');

                Route::post('/', 'Providers\ProvidersController@store');
                Route::post('/{stay_providers}/do/{action}', 'Providers\ProvidersController@doAction');

                Route::patch('/{stay_providers}', 'Providers\ProvidersController@update');
                Route::delete('/{stay_providers}', 'Providers\ProvidersController@destroy');
            }
        );

        Route::prefix('hotels')->group(
            function () {
                Route::get('/', 'Hotels\HotelsController@index');
                Route::get('/actions', 'Hotels\HotelsController@getActions');

                Route::get('{stay_hotels}/tags ', 'Hotels\HotelsController@tags');
                Route::post('{stay_hotels}/tags ', 'Hotels\HotelsController@saveTags');
                Route::get('{stay_hotels}/addresses ', 'Hotels\HotelsController@addresses');
                Route::post('{stay_hotels}/addresses ', 'Hotels\HotelsController@saveAddresses');

                Route::get('/{stay_hotels}/{subObjects}', 'Hotels\HotelsController@relatedObjects');
                Route::get('/{stay_hotels}', 'Hotels\HotelsController@show');

                Route::post('/', 'Hotels\HotelsController@store');
                Route::post('/{stay_hotels}/do/{action}', 'Hotels\HotelsController@doAction');

                Route::patch('/{stay_hotels}', 'Hotels\HotelsController@update');
                Route::delete('/{stay_hotels}', 'Hotels\HotelsController@destroy');
            }
        );

        Route::prefix('room-types')->group(
            function () {
                Route::get('/', 'RoomTypes\RoomTypesController@index');
                Route::get('/actions', 'RoomTypes\RoomTypesController@getActions');

                Route::get('{stay_room_types}/tags ', 'RoomTypes\RoomTypesController@tags');
                Route::post('{stay_room_types}/tags ', 'RoomTypes\RoomTypesController@saveTags');
                Route::get('{stay_room_types}/addresses ', 'RoomTypes\RoomTypesController@addresses');
                Route::post('{stay_room_types}/addresses ', 'RoomTypes\RoomTypesController@saveAddresses');

                Route::get('/{stay_room_types}/{subObjects}', 'RoomTypes\RoomTypesController@relatedObjects');
                Route::get('/{stay_room_types}', 'RoomTypes\RoomTypesController@show');

                Route::post('/', 'RoomTypes\RoomTypesController@store');
                Route::post('/{stay_room_types}/do/{action}', 'RoomTypes\RoomTypesController@doAction');

                Route::patch('/{stay_room_types}', 'RoomTypes\RoomTypesController@update');
                Route::delete('/{stay_room_types}', 'RoomTypes\RoomTypesController@destroy');
            }
        );

        Route::prefix('rooms')->group(
            function () {
                Route::get('/', 'Rooms\RoomsController@index');
                Route::get('/actions', 'Rooms\RoomsController@getActions');

                Route::get('{stay_rooms}/tags ', 'Rooms\RoomsController@tags');
                Route::post('{stay_rooms}/tags ', 'Rooms\RoomsController@saveTags');
                Route::get('{stay_rooms}/addresses ', 'Rooms\RoomsController@addresses');
                Route::post('{stay_rooms}/addresses ', 'Rooms\RoomsController@saveAddresses');

                Route::get('/{stay_rooms}/{subObjects}', 'Rooms\RoomsController@relatedObjects');
                Route::get('/{stay_rooms}', 'Rooms\RoomsController@show');

                Route::post('/', 'Rooms\RoomsController@store');
                Route::post('/{stay_rooms}/do/{action}', 'Rooms\RoomsController@doAction');

                Route::patch('/{stay_rooms}', 'Rooms\RoomsController@update');
                Route::delete('/{stay_rooms}', 'Rooms\RoomsController@destroy');
            }
        );

        Route::prefix('tarif-types')->group(
            function () {
                Route::get('/', 'TarifTypes\TarifTypesController@index');
                Route::get('/actions', 'TarifTypes\TarifTypesController@getActions');

                Route::get('{stay_tarif_types}/tags ', 'TarifTypes\TarifTypesController@tags');
                Route::post('{stay_tarif_types}/tags ', 'TarifTypes\TarifTypesController@saveTags');
                Route::get('{stay_tarif_types}/addresses ', 'TarifTypes\TarifTypesController@addresses');
                Route::post('{stay_tarif_types}/addresses ', 'TarifTypes\TarifTypesController@saveAddresses');

                Route::get('/{stay_tarif_types}/{subObjects}', 'TarifTypes\TarifTypesController@relatedObjects');
                Route::get('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@show');

                Route::post('/', 'TarifTypes\TarifTypesController@store');
                Route::post('/{stay_tarif_types}/do/{action}', 'TarifTypes\TarifTypesController@doAction');

                Route::patch('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@update');
                Route::delete('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@destroy');
            }
        );

        Route::prefix('reservations')->group(
            function () {
                Route::get('/', 'Reservations\ReservationsController@index');
                Route::get('/actions', 'Reservations\ReservationsController@getActions');

                Route::get('{stay_reservations}/tags ', 'Reservations\ReservationsController@tags');
                Route::post('{stay_reservations}/tags ', 'Reservations\ReservationsController@saveTags');
                Route::get('{stay_reservations}/addresses ', 'Reservations\ReservationsController@addresses');
                Route::post('{stay_reservations}/addresses ', 'Reservations\ReservationsController@saveAddresses');

                Route::get('/{stay_reservations}/{subObjects}', 'Reservations\ReservationsController@relatedObjects');
                Route::get('/{stay_reservations}', 'Reservations\ReservationsController@show');

                Route::post('/', 'Reservations\ReservationsController@store');
                Route::post('/{stay_reservations}/do/{action}', 'Reservations\ReservationsController@doAction');

                Route::patch('/{stay_reservations}', 'Reservations\ReservationsController@update');
                Route::delete('/{stay_reservations}', 'Reservations\ReservationsController@destroy');
            }
        );

        Route::prefix('main-purchase-contracts')->group(
            function () {
                Route::get('/', 'MainPurchaseContracts\MainPurchaseContractsController@index');
                Route::get('/actions', 'MainPurchaseContracts\MainPurchaseContractsController@getActions');

                Route::get('{stay_main_purchase_contracts}/tags ', 'MainPurchaseContracts\MainPurchaseContractsController@tags');
                Route::post('{stay_main_purchase_contracts}/tags ', 'MainPurchaseContracts\MainPurchaseContractsController@saveTags');
                Route::get('{stay_main_purchase_contracts}/addresses ', 'MainPurchaseContracts\MainPurchaseContractsController@addresses');
                Route::post('{stay_main_purchase_contracts}/addresses ', 'MainPurchaseContracts\MainPurchaseContractsController@saveAddresses');

                Route::get('/{stay_main_purchase_contracts}/{subObjects}', 'MainPurchaseContracts\MainPurchaseContractsController@relatedObjects');
                Route::get('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@show');

                Route::post('/', 'MainPurchaseContracts\MainPurchaseContractsController@store');
                Route::post('/{stay_main_purchase_contracts}/do/{action}', 'MainPurchaseContracts\MainPurchaseContractsController@doAction');

                Route::patch('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@update');
                Route::delete('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@destroy');
            }
        );

        Route::prefix('sales-contracts')->group(
            function () {
                Route::get('/', 'SalesContracts\SalesContractsController@index');
                Route::get('/actions', 'SalesContracts\SalesContractsController@getActions');

                Route::get('{stay_sales_contracts}/tags ', 'SalesContracts\SalesContractsController@tags');
                Route::post('{stay_sales_contracts}/tags ', 'SalesContracts\SalesContractsController@saveTags');
                Route::get('{stay_sales_contracts}/addresses ', 'SalesContracts\SalesContractsController@addresses');
                Route::post('{stay_sales_contracts}/addresses ', 'SalesContracts\SalesContractsController@saveAddresses');

                Route::get('/{stay_sales_contracts}/{subObjects}', 'SalesContracts\SalesContractsController@relatedObjects');
                Route::get('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@show');

                Route::post('/', 'SalesContracts\SalesContractsController@store');
                Route::post('/{stay_sales_contracts}/do/{action}', 'SalesContracts\SalesContractsController@doAction');

                Route::patch('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@update');
                Route::delete('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@destroy');
            }
        );

        Route::prefix('quota-contracts')->group(
            function () {
                Route::get('/', 'QuotaContracts\QuotaContractsController@index');
                Route::get('/actions', 'QuotaContracts\QuotaContractsController@getActions');

                Route::get('{stay_quota_contracts}/tags ', 'QuotaContracts\QuotaContractsController@tags');
                Route::post('{stay_quota_contracts}/tags ', 'QuotaContracts\QuotaContractsController@saveTags');
                Route::get('{stay_quota_contracts}/addresses ', 'QuotaContracts\QuotaContractsController@addresses');
                Route::post('{stay_quota_contracts}/addresses ', 'QuotaContracts\QuotaContractsController@saveAddresses');

                Route::get('/{stay_quota_contracts}/{subObjects}', 'QuotaContracts\QuotaContractsController@relatedObjects');
                Route::get('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@show');

                Route::post('/', 'QuotaContracts\QuotaContractsController@store');
                Route::post('/{stay_quota_contracts}/do/{action}', 'QuotaContracts\QuotaContractsController@doAction');

                Route::patch('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@update');
                Route::delete('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@destroy');
            }
        );

        Route::prefix('hotel-contracts')->group(
            function () {
                Route::get('/', 'HotelContracts\HotelContractsController@index');
                Route::get('/actions', 'HotelContracts\HotelContractsController@getActions');

                Route::get('{stay_hotel_contracts}/tags ', 'HotelContracts\HotelContractsController@tags');
                Route::post('{stay_hotel_contracts}/tags ', 'HotelContracts\HotelContractsController@saveTags');
                Route::get('{stay_hotel_contracts}/addresses ', 'HotelContracts\HotelContractsController@addresses');
                Route::post('{stay_hotel_contracts}/addresses ', 'HotelContracts\HotelContractsController@saveAddresses');

                Route::get('/{stay_hotel_contracts}/{subObjects}', 'HotelContracts\HotelContractsController@relatedObjects');
                Route::get('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@show');

                Route::post('/', 'HotelContracts\HotelContractsController@store');
                Route::post('/{stay_hotel_contracts}/do/{action}', 'HotelContracts\HotelContractsController@doAction');

                Route::patch('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@update');
                Route::delete('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@destroy');
            }
        );

        Route::prefix('rates')->group(
            function () {
                Route::get('/', 'Rates\RatesController@index');
                Route::get('/actions', 'Rates\RatesController@getActions');

                Route::get('{stay_rates}/tags ', 'Rates\RatesController@tags');
                Route::post('{stay_rates}/tags ', 'Rates\RatesController@saveTags');
                Route::get('{stay_rates}/addresses ', 'Rates\RatesController@addresses');
                Route::post('{stay_rates}/addresses ', 'Rates\RatesController@saveAddresses');

                Route::get('/{stay_rates}/{subObjects}', 'Rates\RatesController@relatedObjects');
                Route::get('/{stay_rates}', 'Rates\RatesController@show');

                Route::post('/', 'Rates\RatesController@store');
                Route::post('/{stay_rates}/do/{action}', 'Rates\RatesController@doAction');

                Route::patch('/{stay_rates}', 'Rates\RatesController@update');
                Route::delete('/{stay_rates}', 'Rates\RatesController@destroy');
            }
        );

        Route::prefix('rate-prices')->group(
            function () {
                Route::get('/', 'RatePrices\RatePricesController@index');
                Route::get('/actions', 'RatePrices\RatePricesController@getActions');

                Route::get('{stay_rate_prices}/tags ', 'RatePrices\RatePricesController@tags');
                Route::post('{stay_rate_prices}/tags ', 'RatePrices\RatePricesController@saveTags');
                Route::get('{stay_rate_prices}/addresses ', 'RatePrices\RatePricesController@addresses');
                Route::post('{stay_rate_prices}/addresses ', 'RatePrices\RatePricesController@saveAddresses');

                Route::get('/{stay_rate_prices}/{subObjects}', 'RatePrices\RatePricesController@relatedObjects');
                Route::get('/{stay_rate_prices}', 'RatePrices\RatePricesController@show');

                Route::post('/', 'RatePrices\RatePricesController@store');
                Route::post('/{stay_rate_prices}/do/{action}', 'RatePrices\RatePricesController@doAction');

                Route::patch('/{stay_rate_prices}', 'RatePrices\RatePricesController@update');
                Route::delete('/{stay_rate_prices}', 'RatePrices\RatePricesController@destroy');
            }
        );

        Route::prefix('hotel-consumer-mappings')->group(
            function () {
                Route::get('/', 'HotelConsumerMappings\HotelConsumerMappingsController@index');
                Route::get('/actions', 'HotelConsumerMappings\HotelConsumerMappingsController@getActions');

                Route::get('{stay_hotel_consumer_mappings}/tags ', 'HotelConsumerMappings\HotelConsumerMappingsController@tags');
                Route::post('{stay_hotel_consumer_mappings}/tags ', 'HotelConsumerMappings\HotelConsumerMappingsController@saveTags');
                Route::get('{stay_hotel_consumer_mappings}/addresses ', 'HotelConsumerMappings\HotelConsumerMappingsController@addresses');
                Route::post('{stay_hotel_consumer_mappings}/addresses ', 'HotelConsumerMappings\HotelConsumerMappingsController@saveAddresses');

                Route::get('/{stay_hotel_consumer_mappings}/{subObjects}', 'HotelConsumerMappings\HotelConsumerMappingsController@relatedObjects');
                Route::get('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@show');

                Route::post('/', 'HotelConsumerMappings\HotelConsumerMappingsController@store');
                Route::post('/{stay_hotel_consumer_mappings}/do/{action}', 'HotelConsumerMappings\HotelConsumerMappingsController@doAction');

                Route::patch('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@update');
                Route::delete('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@destroy');
            }
        );

        Route::prefix('consumers')->group(
            function () {
                Route::get('/', 'Consumers\ConsumersController@index');
                Route::get('/actions', 'Consumers\ConsumersController@getActions');

                Route::get('{stay_consumers}/tags ', 'Consumers\ConsumersController@tags');
                Route::post('{stay_consumers}/tags ', 'Consumers\ConsumersController@saveTags');
                Route::get('{stay_consumers}/addresses ', 'Consumers\ConsumersController@addresses');
                Route::post('{stay_consumers}/addresses ', 'Consumers\ConsumersController@saveAddresses');

                Route::get('/{stay_consumers}/{subObjects}', 'Consumers\ConsumersController@relatedObjects');
                Route::get('/{stay_consumers}', 'Consumers\ConsumersController@show');

                Route::post('/', 'Consumers\ConsumersController@store');
                Route::post('/{stay_consumers}/do/{action}', 'Consumers\ConsumersController@doAction');

                Route::patch('/{stay_consumers}', 'Consumers\ConsumersController@update');
                Route::delete('/{stay_consumers}', 'Consumers\ConsumersController@destroy');
            }
        );

        Route::prefix('room-type-consumer-mappings')->group(
            function () {
                Route::get('/', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@index');
                Route::get('/actions', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@getActions');

                Route::get('{stay_room_type_consumer_mappings}/tags ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@tags');
                Route::post('{stay_room_type_consumer_mappings}/tags ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@saveTags');
                Route::get('{stay_room_type_consumer_mappings}/addresses ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@addresses');
                Route::post('{stay_room_type_consumer_mappings}/addresses ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@saveAddresses');

                Route::get('/{stay_room_type_consumer_mappings}/{subObjects}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@relatedObjects');
                Route::get('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@show');

                Route::post('/', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@store');
                Route::post('/{stay_room_type_consumer_mappings}/do/{action}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@doAction');

                Route::patch('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@update');
                Route::delete('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@destroy');
            }
        );

        Route::prefix('providers')->group(
            function () {
                Route::get('/', 'Providers\ProvidersController@index');
                Route::get('/actions', 'Providers\ProvidersController@getActions');

                Route::get('{stay_providers}/tags ', 'Providers\ProvidersController@tags');
                Route::post('{stay_providers}/tags ', 'Providers\ProvidersController@saveTags');
                Route::get('{stay_providers}/addresses ', 'Providers\ProvidersController@addresses');
                Route::post('{stay_providers}/addresses ', 'Providers\ProvidersController@saveAddresses');

                Route::get('/{stay_providers}/{subObjects}', 'Providers\ProvidersController@relatedObjects');
                Route::get('/{stay_providers}', 'Providers\ProvidersController@show');

                Route::post('/', 'Providers\ProvidersController@store');
                Route::post('/{stay_providers}/do/{action}', 'Providers\ProvidersController@doAction');

                Route::patch('/{stay_providers}', 'Providers\ProvidersController@update');
                Route::delete('/{stay_providers}', 'Providers\ProvidersController@destroy');
            }
        );

        Route::prefix('hotels')->group(
            function () {
                Route::get('/', 'Hotels\HotelsController@index');
                Route::get('/actions', 'Hotels\HotelsController@getActions');

                Route::get('{stay_hotels}/tags ', 'Hotels\HotelsController@tags');
                Route::post('{stay_hotels}/tags ', 'Hotels\HotelsController@saveTags');
                Route::get('{stay_hotels}/addresses ', 'Hotels\HotelsController@addresses');
                Route::post('{stay_hotels}/addresses ', 'Hotels\HotelsController@saveAddresses');

                Route::get('/{stay_hotels}/{subObjects}', 'Hotels\HotelsController@relatedObjects');
                Route::get('/{stay_hotels}', 'Hotels\HotelsController@show');

                Route::post('/', 'Hotels\HotelsController@store');
                Route::post('/{stay_hotels}/do/{action}', 'Hotels\HotelsController@doAction');

                Route::patch('/{stay_hotels}', 'Hotels\HotelsController@update');
                Route::delete('/{stay_hotels}', 'Hotels\HotelsController@destroy');
            }
        );

        Route::prefix('room-types')->group(
            function () {
                Route::get('/', 'RoomTypes\RoomTypesController@index');
                Route::get('/actions', 'RoomTypes\RoomTypesController@getActions');

                Route::get('{stay_room_types}/tags ', 'RoomTypes\RoomTypesController@tags');
                Route::post('{stay_room_types}/tags ', 'RoomTypes\RoomTypesController@saveTags');
                Route::get('{stay_room_types}/addresses ', 'RoomTypes\RoomTypesController@addresses');
                Route::post('{stay_room_types}/addresses ', 'RoomTypes\RoomTypesController@saveAddresses');

                Route::get('/{stay_room_types}/{subObjects}', 'RoomTypes\RoomTypesController@relatedObjects');
                Route::get('/{stay_room_types}', 'RoomTypes\RoomTypesController@show');

                Route::post('/', 'RoomTypes\RoomTypesController@store');
                Route::post('/{stay_room_types}/do/{action}', 'RoomTypes\RoomTypesController@doAction');

                Route::patch('/{stay_room_types}', 'RoomTypes\RoomTypesController@update');
                Route::delete('/{stay_room_types}', 'RoomTypes\RoomTypesController@destroy');
            }
        );

        Route::prefix('rooms')->group(
            function () {
                Route::get('/', 'Rooms\RoomsController@index');
                Route::get('/actions', 'Rooms\RoomsController@getActions');

                Route::get('{stay_rooms}/tags ', 'Rooms\RoomsController@tags');
                Route::post('{stay_rooms}/tags ', 'Rooms\RoomsController@saveTags');
                Route::get('{stay_rooms}/addresses ', 'Rooms\RoomsController@addresses');
                Route::post('{stay_rooms}/addresses ', 'Rooms\RoomsController@saveAddresses');

                Route::get('/{stay_rooms}/{subObjects}', 'Rooms\RoomsController@relatedObjects');
                Route::get('/{stay_rooms}', 'Rooms\RoomsController@show');

                Route::post('/', 'Rooms\RoomsController@store');
                Route::post('/{stay_rooms}/do/{action}', 'Rooms\RoomsController@doAction');

                Route::patch('/{stay_rooms}', 'Rooms\RoomsController@update');
                Route::delete('/{stay_rooms}', 'Rooms\RoomsController@destroy');
            }
        );

        Route::prefix('tarif-types')->group(
            function () {
                Route::get('/', 'TarifTypes\TarifTypesController@index');
                Route::get('/actions', 'TarifTypes\TarifTypesController@getActions');

                Route::get('{stay_tarif_types}/tags ', 'TarifTypes\TarifTypesController@tags');
                Route::post('{stay_tarif_types}/tags ', 'TarifTypes\TarifTypesController@saveTags');
                Route::get('{stay_tarif_types}/addresses ', 'TarifTypes\TarifTypesController@addresses');
                Route::post('{stay_tarif_types}/addresses ', 'TarifTypes\TarifTypesController@saveAddresses');

                Route::get('/{stay_tarif_types}/{subObjects}', 'TarifTypes\TarifTypesController@relatedObjects');
                Route::get('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@show');

                Route::post('/', 'TarifTypes\TarifTypesController@store');
                Route::post('/{stay_tarif_types}/do/{action}', 'TarifTypes\TarifTypesController@doAction');

                Route::patch('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@update');
                Route::delete('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@destroy');
            }
        );

        Route::prefix('reservations')->group(
            function () {
                Route::get('/', 'Reservations\ReservationsController@index');
                Route::get('/actions', 'Reservations\ReservationsController@getActions');

                Route::get('{stay_reservations}/tags ', 'Reservations\ReservationsController@tags');
                Route::post('{stay_reservations}/tags ', 'Reservations\ReservationsController@saveTags');
                Route::get('{stay_reservations}/addresses ', 'Reservations\ReservationsController@addresses');
                Route::post('{stay_reservations}/addresses ', 'Reservations\ReservationsController@saveAddresses');

                Route::get('/{stay_reservations}/{subObjects}', 'Reservations\ReservationsController@relatedObjects');
                Route::get('/{stay_reservations}', 'Reservations\ReservationsController@show');

                Route::post('/', 'Reservations\ReservationsController@store');
                Route::post('/{stay_reservations}/do/{action}', 'Reservations\ReservationsController@doAction');

                Route::patch('/{stay_reservations}', 'Reservations\ReservationsController@update');
                Route::delete('/{stay_reservations}', 'Reservations\ReservationsController@destroy');
            }
        );

        Route::prefix('main-purchase-contracts')->group(
            function () {
                Route::get('/', 'MainPurchaseContracts\MainPurchaseContractsController@index');
                Route::get('/actions', 'MainPurchaseContracts\MainPurchaseContractsController@getActions');

                Route::get('{stay_main_purchase_contracts}/tags ', 'MainPurchaseContracts\MainPurchaseContractsController@tags');
                Route::post('{stay_main_purchase_contracts}/tags ', 'MainPurchaseContracts\MainPurchaseContractsController@saveTags');
                Route::get('{stay_main_purchase_contracts}/addresses ', 'MainPurchaseContracts\MainPurchaseContractsController@addresses');
                Route::post('{stay_main_purchase_contracts}/addresses ', 'MainPurchaseContracts\MainPurchaseContractsController@saveAddresses');

                Route::get('/{stay_main_purchase_contracts}/{subObjects}', 'MainPurchaseContracts\MainPurchaseContractsController@relatedObjects');
                Route::get('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@show');

                Route::post('/', 'MainPurchaseContracts\MainPurchaseContractsController@store');
                Route::post('/{stay_main_purchase_contracts}/do/{action}', 'MainPurchaseContracts\MainPurchaseContractsController@doAction');

                Route::patch('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@update');
                Route::delete('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@destroy');
            }
        );

        Route::prefix('sales-contracts')->group(
            function () {
                Route::get('/', 'SalesContracts\SalesContractsController@index');
                Route::get('/actions', 'SalesContracts\SalesContractsController@getActions');

                Route::get('{stay_sales_contracts}/tags ', 'SalesContracts\SalesContractsController@tags');
                Route::post('{stay_sales_contracts}/tags ', 'SalesContracts\SalesContractsController@saveTags');
                Route::get('{stay_sales_contracts}/addresses ', 'SalesContracts\SalesContractsController@addresses');
                Route::post('{stay_sales_contracts}/addresses ', 'SalesContracts\SalesContractsController@saveAddresses');

                Route::get('/{stay_sales_contracts}/{subObjects}', 'SalesContracts\SalesContractsController@relatedObjects');
                Route::get('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@show');

                Route::post('/', 'SalesContracts\SalesContractsController@store');
                Route::post('/{stay_sales_contracts}/do/{action}', 'SalesContracts\SalesContractsController@doAction');

                Route::patch('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@update');
                Route::delete('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@destroy');
            }
        );

        Route::prefix('quota-contracts')->group(
            function () {
                Route::get('/', 'QuotaContracts\QuotaContractsController@index');
                Route::get('/actions', 'QuotaContracts\QuotaContractsController@getActions');

                Route::get('{stay_quota_contracts}/tags ', 'QuotaContracts\QuotaContractsController@tags');
                Route::post('{stay_quota_contracts}/tags ', 'QuotaContracts\QuotaContractsController@saveTags');
                Route::get('{stay_quota_contracts}/addresses ', 'QuotaContracts\QuotaContractsController@addresses');
                Route::post('{stay_quota_contracts}/addresses ', 'QuotaContracts\QuotaContractsController@saveAddresses');

                Route::get('/{stay_quota_contracts}/{subObjects}', 'QuotaContracts\QuotaContractsController@relatedObjects');
                Route::get('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@show');

                Route::post('/', 'QuotaContracts\QuotaContractsController@store');
                Route::post('/{stay_quota_contracts}/do/{action}', 'QuotaContracts\QuotaContractsController@doAction');

                Route::patch('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@update');
                Route::delete('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@destroy');
            }
        );

        Route::prefix('hotel-contracts')->group(
            function () {
                Route::get('/', 'HotelContracts\HotelContractsController@index');
                Route::get('/actions', 'HotelContracts\HotelContractsController@getActions');

                Route::get('{stay_hotel_contracts}/tags ', 'HotelContracts\HotelContractsController@tags');
                Route::post('{stay_hotel_contracts}/tags ', 'HotelContracts\HotelContractsController@saveTags');
                Route::get('{stay_hotel_contracts}/addresses ', 'HotelContracts\HotelContractsController@addresses');
                Route::post('{stay_hotel_contracts}/addresses ', 'HotelContracts\HotelContractsController@saveAddresses');

                Route::get('/{stay_hotel_contracts}/{subObjects}', 'HotelContracts\HotelContractsController@relatedObjects');
                Route::get('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@show');

                Route::post('/', 'HotelContracts\HotelContractsController@store');
                Route::post('/{stay_hotel_contracts}/do/{action}', 'HotelContracts\HotelContractsController@doAction');

                Route::patch('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@update');
                Route::delete('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@destroy');
            }
        );

        Route::prefix('rates')->group(
            function () {
                Route::get('/', 'Rates\RatesController@index');
                Route::get('/actions', 'Rates\RatesController@getActions');

                Route::get('{stay_rates}/tags ', 'Rates\RatesController@tags');
                Route::post('{stay_rates}/tags ', 'Rates\RatesController@saveTags');
                Route::get('{stay_rates}/addresses ', 'Rates\RatesController@addresses');
                Route::post('{stay_rates}/addresses ', 'Rates\RatesController@saveAddresses');

                Route::get('/{stay_rates}/{subObjects}', 'Rates\RatesController@relatedObjects');
                Route::get('/{stay_rates}', 'Rates\RatesController@show');

                Route::post('/', 'Rates\RatesController@store');
                Route::post('/{stay_rates}/do/{action}', 'Rates\RatesController@doAction');

                Route::patch('/{stay_rates}', 'Rates\RatesController@update');
                Route::delete('/{stay_rates}', 'Rates\RatesController@destroy');
            }
        );

        Route::prefix('rate-prices')->group(
            function () {
                Route::get('/', 'RatePrices\RatePricesController@index');
                Route::get('/actions', 'RatePrices\RatePricesController@getActions');

                Route::get('{stay_rate_prices}/tags ', 'RatePrices\RatePricesController@tags');
                Route::post('{stay_rate_prices}/tags ', 'RatePrices\RatePricesController@saveTags');
                Route::get('{stay_rate_prices}/addresses ', 'RatePrices\RatePricesController@addresses');
                Route::post('{stay_rate_prices}/addresses ', 'RatePrices\RatePricesController@saveAddresses');

                Route::get('/{stay_rate_prices}/{subObjects}', 'RatePrices\RatePricesController@relatedObjects');
                Route::get('/{stay_rate_prices}', 'RatePrices\RatePricesController@show');

                Route::post('/', 'RatePrices\RatePricesController@store');
                Route::post('/{stay_rate_prices}/do/{action}', 'RatePrices\RatePricesController@doAction');

                Route::patch('/{stay_rate_prices}', 'RatePrices\RatePricesController@update');
                Route::delete('/{stay_rate_prices}', 'RatePrices\RatePricesController@destroy');
            }
        );

        Route::prefix('room-type-provider-mappings')->group(
            function () {
                Route::get('/', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@index');
                Route::get('/actions', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@getActions');

                Route::get('{stay_room_type_provider_mappings}/tags ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@tags');
                Route::post('{stay_room_type_provider_mappings}/tags ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@saveTags');
                Route::get('{stay_room_type_provider_mappings}/addresses ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@addresses');
                Route::post('{stay_room_type_provider_mappings}/addresses ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@saveAddresses');

                Route::get('/{stay_room_type_provider_mappings}/{subObjects}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@relatedObjects');
                Route::get('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@show');

                Route::post('/', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@store');
                Route::post('/{stay_room_type_provider_mappings}/do/{action}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@doAction');

                Route::patch('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@update');
                Route::delete('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@destroy');
            }
        );

        Route::prefix('hotel-consumer-mappings')->group(
            function () {
                Route::get('/', 'HotelConsumerMappings\HotelConsumerMappingsController@index');
                Route::get('/actions', 'HotelConsumerMappings\HotelConsumerMappingsController@getActions');

                Route::get('{stay_hotel_consumer_mappings}/tags ', 'HotelConsumerMappings\HotelConsumerMappingsController@tags');
                Route::post('{stay_hotel_consumer_mappings}/tags ', 'HotelConsumerMappings\HotelConsumerMappingsController@saveTags');
                Route::get('{stay_hotel_consumer_mappings}/addresses ', 'HotelConsumerMappings\HotelConsumerMappingsController@addresses');
                Route::post('{stay_hotel_consumer_mappings}/addresses ', 'HotelConsumerMappings\HotelConsumerMappingsController@saveAddresses');

                Route::get('/{stay_hotel_consumer_mappings}/{subObjects}', 'HotelConsumerMappings\HotelConsumerMappingsController@relatedObjects');
                Route::get('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@show');

                Route::post('/', 'HotelConsumerMappings\HotelConsumerMappingsController@store');
                Route::post('/{stay_hotel_consumer_mappings}/do/{action}', 'HotelConsumerMappings\HotelConsumerMappingsController@doAction');

                Route::patch('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@update');
                Route::delete('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@destroy');
            }
        );

        Route::prefix('consumers')->group(
            function () {
                Route::get('/', 'Consumers\ConsumersController@index');
                Route::get('/actions', 'Consumers\ConsumersController@getActions');

                Route::get('{stay_consumers}/tags ', 'Consumers\ConsumersController@tags');
                Route::post('{stay_consumers}/tags ', 'Consumers\ConsumersController@saveTags');
                Route::get('{stay_consumers}/addresses ', 'Consumers\ConsumersController@addresses');
                Route::post('{stay_consumers}/addresses ', 'Consumers\ConsumersController@saveAddresses');

                Route::get('/{stay_consumers}/{subObjects}', 'Consumers\ConsumersController@relatedObjects');
                Route::get('/{stay_consumers}', 'Consumers\ConsumersController@show');

                Route::post('/', 'Consumers\ConsumersController@store');
                Route::post('/{stay_consumers}/do/{action}', 'Consumers\ConsumersController@doAction');

                Route::patch('/{stay_consumers}', 'Consumers\ConsumersController@update');
                Route::delete('/{stay_consumers}', 'Consumers\ConsumersController@destroy');
            }
        );

        Route::prefix('room-type-consumer-mappings')->group(
            function () {
                Route::get('/', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@index');
                Route::get('/actions', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@getActions');

                Route::get('{stay_room_type_consumer_mappings}/tags ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@tags');
                Route::post('{stay_room_type_consumer_mappings}/tags ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@saveTags');
                Route::get('{stay_room_type_consumer_mappings}/addresses ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@addresses');
                Route::post('{stay_room_type_consumer_mappings}/addresses ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@saveAddresses');

                Route::get('/{stay_room_type_consumer_mappings}/{subObjects}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@relatedObjects');
                Route::get('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@show');

                Route::post('/', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@store');
                Route::post('/{stay_room_type_consumer_mappings}/do/{action}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@doAction');

                Route::patch('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@update');
                Route::delete('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@destroy');
            }
        );

        Route::prefix('hotel-provider-mappings')->group(
            function () {
                Route::get('/', 'HotelProviderMappings\HotelProviderMappingsController@index');
                Route::get('/actions', 'HotelProviderMappings\HotelProviderMappingsController@getActions');

                Route::get('{stay_hotel_provider_mappings}/tags ', 'HotelProviderMappings\HotelProviderMappingsController@tags');
                Route::post('{stay_hotel_provider_mappings}/tags ', 'HotelProviderMappings\HotelProviderMappingsController@saveTags');
                Route::get('{stay_hotel_provider_mappings}/addresses ', 'HotelProviderMappings\HotelProviderMappingsController@addresses');
                Route::post('{stay_hotel_provider_mappings}/addresses ', 'HotelProviderMappings\HotelProviderMappingsController@saveAddresses');

                Route::get('/{stay_hotel_provider_mappings}/{subObjects}', 'HotelProviderMappings\HotelProviderMappingsController@relatedObjects');
                Route::get('/{stay_hotel_provider_mappings}', 'HotelProviderMappings\HotelProviderMappingsController@show');

                Route::post('/', 'HotelProviderMappings\HotelProviderMappingsController@store');
                Route::post('/{stay_hotel_provider_mappings}/do/{action}', 'HotelProviderMappings\HotelProviderMappingsController@doAction');

                Route::patch('/{stay_hotel_provider_mappings}', 'HotelProviderMappings\HotelProviderMappingsController@update');
                Route::delete('/{stay_hotel_provider_mappings}', 'HotelProviderMappings\HotelProviderMappingsController@destroy');
            }
        );

        Route::prefix('cancellation-policy')->group(
            function () {
                Route::get('/', 'CancellationPolicy\CancellationPolicyController@index');
                Route::get('/actions', 'CancellationPolicy\CancellationPolicyController@getActions');

                Route::get('{stay_cancellation_policy}/tags ', 'CancellationPolicy\CancellationPolicyController@tags');
                Route::post('{stay_cancellation_policy}/tags ', 'CancellationPolicy\CancellationPolicyController@saveTags');
                Route::get('{stay_cancellation_policy}/addresses ', 'CancellationPolicy\CancellationPolicyController@addresses');
                Route::post('{stay_cancellation_policy}/addresses ', 'CancellationPolicy\CancellationPolicyController@saveAddresses');

                Route::get('/{stay_cancellation_policy}/{subObjects}', 'CancellationPolicy\CancellationPolicyController@relatedObjects');
                Route::get('/{stay_cancellation_policy}', 'CancellationPolicy\CancellationPolicyController@show');

                Route::post('/', 'CancellationPolicy\CancellationPolicyController@store');
                Route::post('/{stay_cancellation_policy}/do/{action}', 'CancellationPolicy\CancellationPolicyController@doAction');

                Route::patch('/{stay_cancellation_policy}', 'CancellationPolicy\CancellationPolicyController@update');
                Route::delete('/{stay_cancellation_policy}', 'CancellationPolicy\CancellationPolicyController@destroy');
            }
        );

        Route::prefix('agency-group')->group(
            function () {
                Route::get('/', 'AgencyGroup\AgencyGroupController@index');
                Route::get('/actions', 'AgencyGroup\AgencyGroupController@getActions');

                Route::get('{stay_agency_group}/tags ', 'AgencyGroup\AgencyGroupController@tags');
                Route::post('{stay_agency_group}/tags ', 'AgencyGroup\AgencyGroupController@saveTags');
                Route::get('{stay_agency_group}/addresses ', 'AgencyGroup\AgencyGroupController@addresses');
                Route::post('{stay_agency_group}/addresses ', 'AgencyGroup\AgencyGroupController@saveAddresses');

                Route::get('/{stay_agency_group}/{subObjects}', 'AgencyGroup\AgencyGroupController@relatedObjects');
                Route::get('/{stay_agency_group}', 'AgencyGroup\AgencyGroupController@show');

                Route::post('/', 'AgencyGroup\AgencyGroupController@store');
                Route::post('/{stay_agency_group}/do/{action}', 'AgencyGroup\AgencyGroupController@doAction');

                Route::patch('/{stay_agency_group}', 'AgencyGroup\AgencyGroupController@update');
                Route::delete('/{stay_agency_group}', 'AgencyGroup\AgencyGroupController@destroy');
            }
        );

        Route::prefix('cancellation-policy-date-stays')->group(
            function () {
                Route::get('/', 'CancellationPolicyDates\CancellationPolicyDatesController@index');
                Route::get('/actions', 'CancellationPolicyDates\CancellationPolicyDatesController@getActions');

                Route::get('{scpds}/tags ', 'CancellationPolicyDates\CancellationPolicyDatesController@tags');
                Route::post('{scpds}/tags ', 'CancellationPolicyDates\CancellationPolicyDatesController@saveTags');
                Route::get('{scpds}/addresses ', 'CancellationPolicyDates\CancellationPolicyDatesController@addresses');
                Route::post('{scpds}/addresses ', 'CancellationPolicyDates\CancellationPolicyDatesController@saveAddresses');

                Route::get('/{scpds}/{subObjects}', 'CancellationPolicyDates\CancellationPolicyDatesController@relatedObjects');
                Route::get('/{scpds}', 'CancellationPolicyDates\CancellationPolicyDatesController@show');

                Route::post('/', 'CancellationPolicyDates\CancellationPolicyDatesController@store');
                Route::post('/{scpds}/do/{action}', 'CancellationPolicyDates\CancellationPolicyDatesController@doAction');

                Route::patch('/{scpds}', 'CancellationPolicyDates\CancellationPolicyDatesController@update');
                Route::delete('/{scpds}', 'CancellationPolicyDates\CancellationPolicyDatesController@destroy');
            }
        );

        Route::prefix('agency-group')->group(
            function () {
                Route::get('/', 'AgencyGroup\AgencyGroupController@index');
                Route::get('/actions', 'AgencyGroup\AgencyGroupController@getActions');

                Route::get('{stay_agency_group}/tags ', 'AgencyGroup\AgencyGroupController@tags');
                Route::post('{stay_agency_group}/tags ', 'AgencyGroup\AgencyGroupController@saveTags');
                Route::get('{stay_agency_group}/addresses ', 'AgencyGroup\AgencyGroupController@addresses');
                Route::post('{stay_agency_group}/addresses ', 'AgencyGroup\AgencyGroupController@saveAddresses');

                Route::get('/{stay_agency_group}/{subObjects}', 'AgencyGroup\AgencyGroupController@relatedObjects');
                Route::get('/{stay_agency_group}', 'AgencyGroup\AgencyGroupController@show');

                Route::post('/', 'AgencyGroup\AgencyGroupController@store');
                Route::post('/{stay_agency_group}/do/{action}', 'AgencyGroup\AgencyGroupController@doAction');

                Route::patch('/{stay_agency_group}', 'AgencyGroup\AgencyGroupController@update');
                Route::delete('/{stay_agency_group}', 'AgencyGroup\AgencyGroupController@destroy');
            }
        );

        Route::prefix('cancellation-policy')->group(
            function () {
                Route::get('/', 'CancellationPolicy\CancellationPolicyController@index');
                Route::get('/actions', 'CancellationPolicy\CancellationPolicyController@getActions');

                Route::get('{stay_cancellation_policy}/tags ', 'CancellationPolicy\CancellationPolicyController@tags');
                Route::post('{stay_cancellation_policy}/tags ', 'CancellationPolicy\CancellationPolicyController@saveTags');
                Route::get('{stay_cancellation_policy}/addresses ', 'CancellationPolicy\CancellationPolicyController@addresses');
                Route::post('{stay_cancellation_policy}/addresses ', 'CancellationPolicy\CancellationPolicyController@saveAddresses');

                Route::get('/{stay_cancellation_policy}/{subObjects}', 'CancellationPolicy\CancellationPolicyController@relatedObjects');
                Route::get('/{stay_cancellation_policy}', 'CancellationPolicy\CancellationPolicyController@show');

                Route::post('/', 'CancellationPolicy\CancellationPolicyController@store');
                Route::post('/{stay_cancellation_policy}/do/{action}', 'CancellationPolicy\CancellationPolicyController@doAction');

                Route::patch('/{stay_cancellation_policy}', 'CancellationPolicy\CancellationPolicyController@update');
                Route::delete('/{stay_cancellation_policy}', 'CancellationPolicy\CancellationPolicyController@destroy');
            }
        );

        Route::prefix('cancellation-policy-date-stays')->group(
            function () {
                Route::get('/', 'CancellationPolicyDates\CancellationPolicyDatesController@index');
                Route::get('/actions', 'CancellationPolicyDates\CancellationPolicyDatesController@getActions');

                Route::get('{scpds}/tags ', 'CancellationPolicyDates\CancellationPolicyDatesController@tags');
                Route::post('{scpds}/tags ', 'CancellationPolicyDates\CancellationPolicyDatesController@saveTags');
                Route::get('{scpds}/addresses ', 'CancellationPolicyDates\CancellationPolicyDatesController@addresses');
                Route::post('{scpds}/addresses ', 'CancellationPolicyDates\CancellationPolicyDatesController@saveAddresses');

                Route::get('/{scpds}/{subObjects}', 'CancellationPolicyDates\CancellationPolicyDatesController@relatedObjects');
                Route::get('/{scpds}', 'CancellationPolicyDates\CancellationPolicyDatesController@show');

                Route::post('/', 'CancellationPolicyDates\CancellationPolicyDatesController@store');
                Route::post('/{scpds}/do/{action}', 'CancellationPolicyDates\CancellationPolicyDatesController@doAction');

                Route::patch('/{scpds}', 'CancellationPolicyDates\CancellationPolicyDatesController@update');
                Route::delete('/{scpds}', 'CancellationPolicyDates\CancellationPolicyDatesController@destroy');
            }
        );

        Route::prefix('providers')->group(
            function () {
                Route::get('/', 'Providers\ProvidersController@index');
                Route::get('/actions', 'Providers\ProvidersController@getActions');

                Route::get('{stay_providers}/tags ', 'Providers\ProvidersController@tags');
                Route::post('{stay_providers}/tags ', 'Providers\ProvidersController@saveTags');
                Route::get('{stay_providers}/addresses ', 'Providers\ProvidersController@addresses');
                Route::post('{stay_providers}/addresses ', 'Providers\ProvidersController@saveAddresses');

                Route::get('/{stay_providers}/{subObjects}', 'Providers\ProvidersController@relatedObjects');
                Route::get('/{stay_providers}', 'Providers\ProvidersController@show');

                Route::post('/', 'Providers\ProvidersController@store');
                Route::post('/{stay_providers}/do/{action}', 'Providers\ProvidersController@doAction');

                Route::patch('/{stay_providers}', 'Providers\ProvidersController@update');
                Route::delete('/{stay_providers}', 'Providers\ProvidersController@destroy');
            }
        );

        Route::prefix('hotels')->group(
            function () {
                Route::get('/', 'Hotels\HotelsController@index');
                Route::get('/actions', 'Hotels\HotelsController@getActions');

                Route::get('{stay_hotels}/tags ', 'Hotels\HotelsController@tags');
                Route::post('{stay_hotels}/tags ', 'Hotels\HotelsController@saveTags');
                Route::get('{stay_hotels}/addresses ', 'Hotels\HotelsController@addresses');
                Route::post('{stay_hotels}/addresses ', 'Hotels\HotelsController@saveAddresses');

                Route::get('/{stay_hotels}/{subObjects}', 'Hotels\HotelsController@relatedObjects');
                Route::get('/{stay_hotels}', 'Hotels\HotelsController@show');

                Route::post('/', 'Hotels\HotelsController@store');
                Route::post('/{stay_hotels}/do/{action}', 'Hotels\HotelsController@doAction');

                Route::patch('/{stay_hotels}', 'Hotels\HotelsController@update');
                Route::delete('/{stay_hotels}', 'Hotels\HotelsController@destroy');
            }
        );

        Route::prefix('room-types')->group(
            function () {
                Route::get('/', 'RoomTypes\RoomTypesController@index');
                Route::get('/actions', 'RoomTypes\RoomTypesController@getActions');

                Route::get('{stay_room_types}/tags ', 'RoomTypes\RoomTypesController@tags');
                Route::post('{stay_room_types}/tags ', 'RoomTypes\RoomTypesController@saveTags');
                Route::get('{stay_room_types}/addresses ', 'RoomTypes\RoomTypesController@addresses');
                Route::post('{stay_room_types}/addresses ', 'RoomTypes\RoomTypesController@saveAddresses');

                Route::get('/{stay_room_types}/{subObjects}', 'RoomTypes\RoomTypesController@relatedObjects');
                Route::get('/{stay_room_types}', 'RoomTypes\RoomTypesController@show');

                Route::post('/', 'RoomTypes\RoomTypesController@store');
                Route::post('/{stay_room_types}/do/{action}', 'RoomTypes\RoomTypesController@doAction');

                Route::patch('/{stay_room_types}', 'RoomTypes\RoomTypesController@update');
                Route::delete('/{stay_room_types}', 'RoomTypes\RoomTypesController@destroy');
            }
        );

        Route::prefix('rooms')->group(
            function () {
                Route::get('/', 'Rooms\RoomsController@index');
                Route::get('/actions', 'Rooms\RoomsController@getActions');

                Route::get('{stay_rooms}/tags ', 'Rooms\RoomsController@tags');
                Route::post('{stay_rooms}/tags ', 'Rooms\RoomsController@saveTags');
                Route::get('{stay_rooms}/addresses ', 'Rooms\RoomsController@addresses');
                Route::post('{stay_rooms}/addresses ', 'Rooms\RoomsController@saveAddresses');

                Route::get('/{stay_rooms}/{subObjects}', 'Rooms\RoomsController@relatedObjects');
                Route::get('/{stay_rooms}', 'Rooms\RoomsController@show');

                Route::post('/', 'Rooms\RoomsController@store');
                Route::post('/{stay_rooms}/do/{action}', 'Rooms\RoomsController@doAction');

                Route::patch('/{stay_rooms}', 'Rooms\RoomsController@update');
                Route::delete('/{stay_rooms}', 'Rooms\RoomsController@destroy');
            }
        );

        Route::prefix('tarif-types')->group(
            function () {
                Route::get('/', 'TarifTypes\TarifTypesController@index');
                Route::get('/actions', 'TarifTypes\TarifTypesController@getActions');

                Route::get('{stay_tarif_types}/tags ', 'TarifTypes\TarifTypesController@tags');
                Route::post('{stay_tarif_types}/tags ', 'TarifTypes\TarifTypesController@saveTags');
                Route::get('{stay_tarif_types}/addresses ', 'TarifTypes\TarifTypesController@addresses');
                Route::post('{stay_tarif_types}/addresses ', 'TarifTypes\TarifTypesController@saveAddresses');

                Route::get('/{stay_tarif_types}/{subObjects}', 'TarifTypes\TarifTypesController@relatedObjects');
                Route::get('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@show');

                Route::post('/', 'TarifTypes\TarifTypesController@store');
                Route::post('/{stay_tarif_types}/do/{action}', 'TarifTypes\TarifTypesController@doAction');

                Route::patch('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@update');
                Route::delete('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@destroy');
            }
        );

        Route::prefix('reservations')->group(
            function () {
                Route::get('/', 'Reservations\ReservationsController@index');
                Route::get('/actions', 'Reservations\ReservationsController@getActions');

                Route::get('{stay_reservations}/tags ', 'Reservations\ReservationsController@tags');
                Route::post('{stay_reservations}/tags ', 'Reservations\ReservationsController@saveTags');
                Route::get('{stay_reservations}/addresses ', 'Reservations\ReservationsController@addresses');
                Route::post('{stay_reservations}/addresses ', 'Reservations\ReservationsController@saveAddresses');

                Route::get('/{stay_reservations}/{subObjects}', 'Reservations\ReservationsController@relatedObjects');
                Route::get('/{stay_reservations}', 'Reservations\ReservationsController@show');

                Route::post('/', 'Reservations\ReservationsController@store');
                Route::post('/{stay_reservations}/do/{action}', 'Reservations\ReservationsController@doAction');

                Route::patch('/{stay_reservations}', 'Reservations\ReservationsController@update');
                Route::delete('/{stay_reservations}', 'Reservations\ReservationsController@destroy');
            }
        );

        Route::prefix('main-purchase-contracts')->group(
            function () {
                Route::get('/', 'MainPurchaseContracts\MainPurchaseContractsController@index');
                Route::get('/actions', 'MainPurchaseContracts\MainPurchaseContractsController@getActions');

                Route::get('{stay_main_purchase_contracts}/tags ', 'MainPurchaseContracts\MainPurchaseContractsController@tags');
                Route::post('{stay_main_purchase_contracts}/tags ', 'MainPurchaseContracts\MainPurchaseContractsController@saveTags');
                Route::get('{stay_main_purchase_contracts}/addresses ', 'MainPurchaseContracts\MainPurchaseContractsController@addresses');
                Route::post('{stay_main_purchase_contracts}/addresses ', 'MainPurchaseContracts\MainPurchaseContractsController@saveAddresses');

                Route::get('/{stay_main_purchase_contracts}/{subObjects}', 'MainPurchaseContracts\MainPurchaseContractsController@relatedObjects');
                Route::get('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@show');

                Route::post('/', 'MainPurchaseContracts\MainPurchaseContractsController@store');
                Route::post('/{stay_main_purchase_contracts}/do/{action}', 'MainPurchaseContracts\MainPurchaseContractsController@doAction');

                Route::patch('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@update');
                Route::delete('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@destroy');
            }
        );

        Route::prefix('sales-contracts')->group(
            function () {
                Route::get('/', 'SalesContracts\SalesContractsController@index');
                Route::get('/actions', 'SalesContracts\SalesContractsController@getActions');

                Route::get('{stay_sales_contracts}/tags ', 'SalesContracts\SalesContractsController@tags');
                Route::post('{stay_sales_contracts}/tags ', 'SalesContracts\SalesContractsController@saveTags');
                Route::get('{stay_sales_contracts}/addresses ', 'SalesContracts\SalesContractsController@addresses');
                Route::post('{stay_sales_contracts}/addresses ', 'SalesContracts\SalesContractsController@saveAddresses');

                Route::get('/{stay_sales_contracts}/{subObjects}', 'SalesContracts\SalesContractsController@relatedObjects');
                Route::get('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@show');

                Route::post('/', 'SalesContracts\SalesContractsController@store');
                Route::post('/{stay_sales_contracts}/do/{action}', 'SalesContracts\SalesContractsController@doAction');

                Route::patch('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@update');
                Route::delete('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@destroy');
            }
        );

        Route::prefix('quota-contracts')->group(
            function () {
                Route::get('/', 'QuotaContracts\QuotaContractsController@index');
                Route::get('/actions', 'QuotaContracts\QuotaContractsController@getActions');

                Route::get('{stay_quota_contracts}/tags ', 'QuotaContracts\QuotaContractsController@tags');
                Route::post('{stay_quota_contracts}/tags ', 'QuotaContracts\QuotaContractsController@saveTags');
                Route::get('{stay_quota_contracts}/addresses ', 'QuotaContracts\QuotaContractsController@addresses');
                Route::post('{stay_quota_contracts}/addresses ', 'QuotaContracts\QuotaContractsController@saveAddresses');

                Route::get('/{stay_quota_contracts}/{subObjects}', 'QuotaContracts\QuotaContractsController@relatedObjects');
                Route::get('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@show');

                Route::post('/', 'QuotaContracts\QuotaContractsController@store');
                Route::post('/{stay_quota_contracts}/do/{action}', 'QuotaContracts\QuotaContractsController@doAction');

                Route::patch('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@update');
                Route::delete('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@destroy');
            }
        );

        Route::prefix('hotel-contracts')->group(
            function () {
                Route::get('/', 'HotelContracts\HotelContractsController@index');
                Route::get('/actions', 'HotelContracts\HotelContractsController@getActions');

                Route::get('{stay_hotel_contracts}/tags ', 'HotelContracts\HotelContractsController@tags');
                Route::post('{stay_hotel_contracts}/tags ', 'HotelContracts\HotelContractsController@saveTags');
                Route::get('{stay_hotel_contracts}/addresses ', 'HotelContracts\HotelContractsController@addresses');
                Route::post('{stay_hotel_contracts}/addresses ', 'HotelContracts\HotelContractsController@saveAddresses');

                Route::get('/{stay_hotel_contracts}/{subObjects}', 'HotelContracts\HotelContractsController@relatedObjects');
                Route::get('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@show');

                Route::post('/', 'HotelContracts\HotelContractsController@store');
                Route::post('/{stay_hotel_contracts}/do/{action}', 'HotelContracts\HotelContractsController@doAction');

                Route::patch('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@update');
                Route::delete('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@destroy');
            }
        );

        Route::prefix('rates')->group(
            function () {
                Route::get('/', 'Rates\RatesController@index');
                Route::get('/actions', 'Rates\RatesController@getActions');

                Route::get('{stay_rates}/tags ', 'Rates\RatesController@tags');
                Route::post('{stay_rates}/tags ', 'Rates\RatesController@saveTags');
                Route::get('{stay_rates}/addresses ', 'Rates\RatesController@addresses');
                Route::post('{stay_rates}/addresses ', 'Rates\RatesController@saveAddresses');

                Route::get('/{stay_rates}/{subObjects}', 'Rates\RatesController@relatedObjects');
                Route::get('/{stay_rates}', 'Rates\RatesController@show');

                Route::post('/', 'Rates\RatesController@store');
                Route::post('/{stay_rates}/do/{action}', 'Rates\RatesController@doAction');

                Route::patch('/{stay_rates}', 'Rates\RatesController@update');
                Route::delete('/{stay_rates}', 'Rates\RatesController@destroy');
            }
        );

        Route::prefix('rate-prices')->group(
            function () {
                Route::get('/', 'RatePrices\RatePricesController@index');
                Route::get('/actions', 'RatePrices\RatePricesController@getActions');

                Route::get('{stay_rate_prices}/tags ', 'RatePrices\RatePricesController@tags');
                Route::post('{stay_rate_prices}/tags ', 'RatePrices\RatePricesController@saveTags');
                Route::get('{stay_rate_prices}/addresses ', 'RatePrices\RatePricesController@addresses');
                Route::post('{stay_rate_prices}/addresses ', 'RatePrices\RatePricesController@saveAddresses');

                Route::get('/{stay_rate_prices}/{subObjects}', 'RatePrices\RatePricesController@relatedObjects');
                Route::get('/{stay_rate_prices}', 'RatePrices\RatePricesController@show');

                Route::post('/', 'RatePrices\RatePricesController@store');
                Route::post('/{stay_rate_prices}/do/{action}', 'RatePrices\RatePricesController@doAction');

                Route::patch('/{stay_rate_prices}', 'RatePrices\RatePricesController@update');
                Route::delete('/{stay_rate_prices}', 'RatePrices\RatePricesController@destroy');
            }
        );

        Route::prefix('room-type-provider-mappings')->group(
            function () {
                Route::get('/', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@index');
                Route::get('/actions', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@getActions');

                Route::get('{stay_room_type_provider_mappings}/tags ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@tags');
                Route::post('{stay_room_type_provider_mappings}/tags ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@saveTags');
                Route::get('{stay_room_type_provider_mappings}/addresses ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@addresses');
                Route::post('{stay_room_type_provider_mappings}/addresses ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@saveAddresses');

                Route::get('/{stay_room_type_provider_mappings}/{subObjects}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@relatedObjects');
                Route::get('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@show');

                Route::post('/', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@store');
                Route::post('/{stay_room_type_provider_mappings}/do/{action}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@doAction');

                Route::patch('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@update');
                Route::delete('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@destroy');
            }
        );

        Route::prefix('hotel-consumer-mappings')->group(
            function () {
                Route::get('/', 'HotelConsumerMappings\HotelConsumerMappingsController@index');
                Route::get('/actions', 'HotelConsumerMappings\HotelConsumerMappingsController@getActions');

                Route::get('{stay_hotel_consumer_mappings}/tags ', 'HotelConsumerMappings\HotelConsumerMappingsController@tags');
                Route::post('{stay_hotel_consumer_mappings}/tags ', 'HotelConsumerMappings\HotelConsumerMappingsController@saveTags');
                Route::get('{stay_hotel_consumer_mappings}/addresses ', 'HotelConsumerMappings\HotelConsumerMappingsController@addresses');
                Route::post('{stay_hotel_consumer_mappings}/addresses ', 'HotelConsumerMappings\HotelConsumerMappingsController@saveAddresses');

                Route::get('/{stay_hotel_consumer_mappings}/{subObjects}', 'HotelConsumerMappings\HotelConsumerMappingsController@relatedObjects');
                Route::get('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@show');

                Route::post('/', 'HotelConsumerMappings\HotelConsumerMappingsController@store');
                Route::post('/{stay_hotel_consumer_mappings}/do/{action}', 'HotelConsumerMappings\HotelConsumerMappingsController@doAction');

                Route::patch('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@update');
                Route::delete('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@destroy');
            }
        );

        Route::prefix('consumers')->group(
            function () {
                Route::get('/', 'Consumers\ConsumersController@index');
                Route::get('/actions', 'Consumers\ConsumersController@getActions');

                Route::get('{stay_consumers}/tags ', 'Consumers\ConsumersController@tags');
                Route::post('{stay_consumers}/tags ', 'Consumers\ConsumersController@saveTags');
                Route::get('{stay_consumers}/addresses ', 'Consumers\ConsumersController@addresses');
                Route::post('{stay_consumers}/addresses ', 'Consumers\ConsumersController@saveAddresses');

                Route::get('/{stay_consumers}/{subObjects}', 'Consumers\ConsumersController@relatedObjects');
                Route::get('/{stay_consumers}', 'Consumers\ConsumersController@show');

                Route::post('/', 'Consumers\ConsumersController@store');
                Route::post('/{stay_consumers}/do/{action}', 'Consumers\ConsumersController@doAction');

                Route::patch('/{stay_consumers}', 'Consumers\ConsumersController@update');
                Route::delete('/{stay_consumers}', 'Consumers\ConsumersController@destroy');
            }
        );

        Route::prefix('room-type-consumer-mappings')->group(
            function () {
                Route::get('/', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@index');
                Route::get('/actions', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@getActions');

                Route::get('{stay_room_type_consumer_mappings}/tags ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@tags');
                Route::post('{stay_room_type_consumer_mappings}/tags ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@saveTags');
                Route::get('{stay_room_type_consumer_mappings}/addresses ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@addresses');
                Route::post('{stay_room_type_consumer_mappings}/addresses ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@saveAddresses');

                Route::get('/{stay_room_type_consumer_mappings}/{subObjects}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@relatedObjects');
                Route::get('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@show');

                Route::post('/', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@store');
                Route::post('/{stay_room_type_consumer_mappings}/do/{action}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@doAction');

                Route::patch('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@update');
                Route::delete('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@destroy');
            }
        );

        Route::prefix('hotel-provider-mappings')->group(
            function () {
                Route::get('/', 'HotelProviderMappings\HotelProviderMappingsController@index');
                Route::get('/actions', 'HotelProviderMappings\HotelProviderMappingsController@getActions');

                Route::get('{stay_hotel_provider_mappings}/tags ', 'HotelProviderMappings\HotelProviderMappingsController@tags');
                Route::post('{stay_hotel_provider_mappings}/tags ', 'HotelProviderMappings\HotelProviderMappingsController@saveTags');
                Route::get('{stay_hotel_provider_mappings}/addresses ', 'HotelProviderMappings\HotelProviderMappingsController@addresses');
                Route::post('{stay_hotel_provider_mappings}/addresses ', 'HotelProviderMappings\HotelProviderMappingsController@saveAddresses');

                Route::get('/{stay_hotel_provider_mappings}/{subObjects}', 'HotelProviderMappings\HotelProviderMappingsController@relatedObjects');
                Route::get('/{stay_hotel_provider_mappings}', 'HotelProviderMappings\HotelProviderMappingsController@show');

                Route::post('/', 'HotelProviderMappings\HotelProviderMappingsController@store');
                Route::post('/{stay_hotel_provider_mappings}/do/{action}', 'HotelProviderMappings\HotelProviderMappingsController@doAction');

                Route::patch('/{stay_hotel_provider_mappings}', 'HotelProviderMappings\HotelProviderMappingsController@update');
                Route::delete('/{stay_hotel_provider_mappings}', 'HotelProviderMappings\HotelProviderMappingsController@destroy');
            }
        );

        Route::prefix('agency-group')->group(
            function () {
                Route::get('/', 'AgencyGroup\AgencyGroupController@index');
                Route::get('/actions', 'AgencyGroup\AgencyGroupController@getActions');

                Route::get('{stay_agency_group}/tags ', 'AgencyGroup\AgencyGroupController@tags');
                Route::post('{stay_agency_group}/tags ', 'AgencyGroup\AgencyGroupController@saveTags');
                Route::get('{stay_agency_group}/addresses ', 'AgencyGroup\AgencyGroupController@addresses');
                Route::post('{stay_agency_group}/addresses ', 'AgencyGroup\AgencyGroupController@saveAddresses');

                Route::get('/{stay_agency_group}/{subObjects}', 'AgencyGroup\AgencyGroupController@relatedObjects');
                Route::get('/{stay_agency_group}', 'AgencyGroup\AgencyGroupController@show');

                Route::post('/', 'AgencyGroup\AgencyGroupController@store');
                Route::post('/{stay_agency_group}/do/{action}', 'AgencyGroup\AgencyGroupController@doAction');

                Route::patch('/{stay_agency_group}', 'AgencyGroup\AgencyGroupController@update');
                Route::delete('/{stay_agency_group}', 'AgencyGroup\AgencyGroupController@destroy');
            }
        );

        Route::prefix('cancellation-policy-date-stays')->group(
            function () {
                Route::get('/', 'CancellationPolicyDates\CancellationPolicyDatesController@index');
                Route::get('/actions', 'CancellationPolicyDates\CancellationPolicyDatesController@getActions');

                Route::get('{scpds}/tags ', 'CancellationPolicyDates\CancellationPolicyDatesController@tags');
                Route::post('{scpds}/tags ', 'CancellationPolicyDates\CancellationPolicyDatesController@saveTags');
                Route::get('{scpds}/addresses ', 'CancellationPolicyDates\CancellationPolicyDatesController@addresses');
                Route::post('{scpds}/addresses ', 'CancellationPolicyDates\CancellationPolicyDatesController@saveAddresses');

                Route::get('/{scpds}/{subObjects}', 'CancellationPolicyDates\CancellationPolicyDatesController@relatedObjects');
                Route::get('/{scpds}', 'CancellationPolicyDates\CancellationPolicyDatesController@show');

                Route::post('/', 'CancellationPolicyDates\CancellationPolicyDatesController@store');
                Route::post('/{scpds}/do/{action}', 'CancellationPolicyDates\CancellationPolicyDatesController@doAction');

                Route::patch('/{scpds}', 'CancellationPolicyDates\CancellationPolicyDatesController@update');
                Route::delete('/{scpds}', 'CancellationPolicyDates\CancellationPolicyDatesController@destroy');
            }
        );

        Route::prefix('cancellation-policy')->group(
            function () {
                Route::get('/', 'CancellationPolicy\CancellationPolicyController@index');
                Route::get('/actions', 'CancellationPolicy\CancellationPolicyController@getActions');

                Route::get('{stay_cancellation_policy}/tags ', 'CancellationPolicy\CancellationPolicyController@tags');
                Route::post('{stay_cancellation_policy}/tags ', 'CancellationPolicy\CancellationPolicyController@saveTags');
                Route::get('{stay_cancellation_policy}/addresses ', 'CancellationPolicy\CancellationPolicyController@addresses');
                Route::post('{stay_cancellation_policy}/addresses ', 'CancellationPolicy\CancellationPolicyController@saveAddresses');

                Route::get('/{stay_cancellation_policy}/{subObjects}', 'CancellationPolicy\CancellationPolicyController@relatedObjects');
                Route::get('/{stay_cancellation_policy}', 'CancellationPolicy\CancellationPolicyController@show');

                Route::post('/', 'CancellationPolicy\CancellationPolicyController@store');
                Route::post('/{stay_cancellation_policy}/do/{action}', 'CancellationPolicy\CancellationPolicyController@doAction');

                Route::patch('/{stay_cancellation_policy}', 'CancellationPolicy\CancellationPolicyController@update');
                Route::delete('/{stay_cancellation_policy}', 'CancellationPolicy\CancellationPolicyController@destroy');
            }
        );

        Route::prefix('providers')->group(
            function () {
                Route::get('/', 'Providers\ProvidersController@index');
                Route::get('/actions', 'Providers\ProvidersController@getActions');

                Route::get('{stay_providers}/tags ', 'Providers\ProvidersController@tags');
                Route::post('{stay_providers}/tags ', 'Providers\ProvidersController@saveTags');
                Route::get('{stay_providers}/addresses ', 'Providers\ProvidersController@addresses');
                Route::post('{stay_providers}/addresses ', 'Providers\ProvidersController@saveAddresses');

                Route::get('/{stay_providers}/{subObjects}', 'Providers\ProvidersController@relatedObjects');
                Route::get('/{stay_providers}', 'Providers\ProvidersController@show');

                Route::post('/', 'Providers\ProvidersController@store');
                Route::post('/{stay_providers}/do/{action}', 'Providers\ProvidersController@doAction');

                Route::patch('/{stay_providers}', 'Providers\ProvidersController@update');
                Route::delete('/{stay_providers}', 'Providers\ProvidersController@destroy');
            }
        );

        Route::prefix('hotels')->group(
            function () {
                Route::get('/', 'Hotels\HotelsController@index');
                Route::get('/actions', 'Hotels\HotelsController@getActions');

                Route::get('{stay_hotels}/tags ', 'Hotels\HotelsController@tags');
                Route::post('{stay_hotels}/tags ', 'Hotels\HotelsController@saveTags');
                Route::get('{stay_hotels}/addresses ', 'Hotels\HotelsController@addresses');
                Route::post('{stay_hotels}/addresses ', 'Hotels\HotelsController@saveAddresses');

                Route::get('/{stay_hotels}/{subObjects}', 'Hotels\HotelsController@relatedObjects');
                Route::get('/{stay_hotels}', 'Hotels\HotelsController@show');

                Route::post('/', 'Hotels\HotelsController@store');
                Route::post('/{stay_hotels}/do/{action}', 'Hotels\HotelsController@doAction');

                Route::patch('/{stay_hotels}', 'Hotels\HotelsController@update');
                Route::delete('/{stay_hotels}', 'Hotels\HotelsController@destroy');
            }
        );

        Route::prefix('room-types')->group(
            function () {
                Route::get('/', 'RoomTypes\RoomTypesController@index');
                Route::get('/actions', 'RoomTypes\RoomTypesController@getActions');

                Route::get('{stay_room_types}/tags ', 'RoomTypes\RoomTypesController@tags');
                Route::post('{stay_room_types}/tags ', 'RoomTypes\RoomTypesController@saveTags');
                Route::get('{stay_room_types}/addresses ', 'RoomTypes\RoomTypesController@addresses');
                Route::post('{stay_room_types}/addresses ', 'RoomTypes\RoomTypesController@saveAddresses');

                Route::get('/{stay_room_types}/{subObjects}', 'RoomTypes\RoomTypesController@relatedObjects');
                Route::get('/{stay_room_types}', 'RoomTypes\RoomTypesController@show');

                Route::post('/', 'RoomTypes\RoomTypesController@store');
                Route::post('/{stay_room_types}/do/{action}', 'RoomTypes\RoomTypesController@doAction');

                Route::patch('/{stay_room_types}', 'RoomTypes\RoomTypesController@update');
                Route::delete('/{stay_room_types}', 'RoomTypes\RoomTypesController@destroy');
            }
        );

        Route::prefix('rooms')->group(
            function () {
                Route::get('/', 'Rooms\RoomsController@index');
                Route::get('/actions', 'Rooms\RoomsController@getActions');

                Route::get('{stay_rooms}/tags ', 'Rooms\RoomsController@tags');
                Route::post('{stay_rooms}/tags ', 'Rooms\RoomsController@saveTags');
                Route::get('{stay_rooms}/addresses ', 'Rooms\RoomsController@addresses');
                Route::post('{stay_rooms}/addresses ', 'Rooms\RoomsController@saveAddresses');

                Route::get('/{stay_rooms}/{subObjects}', 'Rooms\RoomsController@relatedObjects');
                Route::get('/{stay_rooms}', 'Rooms\RoomsController@show');

                Route::post('/', 'Rooms\RoomsController@store');
                Route::post('/{stay_rooms}/do/{action}', 'Rooms\RoomsController@doAction');

                Route::patch('/{stay_rooms}', 'Rooms\RoomsController@update');
                Route::delete('/{stay_rooms}', 'Rooms\RoomsController@destroy');
            }
        );

        Route::prefix('tarif-types')->group(
            function () {
                Route::get('/', 'TarifTypes\TarifTypesController@index');
                Route::get('/actions', 'TarifTypes\TarifTypesController@getActions');

                Route::get('{stay_tarif_types}/tags ', 'TarifTypes\TarifTypesController@tags');
                Route::post('{stay_tarif_types}/tags ', 'TarifTypes\TarifTypesController@saveTags');
                Route::get('{stay_tarif_types}/addresses ', 'TarifTypes\TarifTypesController@addresses');
                Route::post('{stay_tarif_types}/addresses ', 'TarifTypes\TarifTypesController@saveAddresses');

                Route::get('/{stay_tarif_types}/{subObjects}', 'TarifTypes\TarifTypesController@relatedObjects');
                Route::get('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@show');

                Route::post('/', 'TarifTypes\TarifTypesController@store');
                Route::post('/{stay_tarif_types}/do/{action}', 'TarifTypes\TarifTypesController@doAction');

                Route::patch('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@update');
                Route::delete('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@destroy');
            }
        );

        Route::prefix('reservations')->group(
            function () {
                Route::get('/', 'Reservations\ReservationsController@index');
                Route::get('/actions', 'Reservations\ReservationsController@getActions');

                Route::get('{stay_reservations}/tags ', 'Reservations\ReservationsController@tags');
                Route::post('{stay_reservations}/tags ', 'Reservations\ReservationsController@saveTags');
                Route::get('{stay_reservations}/addresses ', 'Reservations\ReservationsController@addresses');
                Route::post('{stay_reservations}/addresses ', 'Reservations\ReservationsController@saveAddresses');

                Route::get('/{stay_reservations}/{subObjects}', 'Reservations\ReservationsController@relatedObjects');
                Route::get('/{stay_reservations}', 'Reservations\ReservationsController@show');

                Route::post('/', 'Reservations\ReservationsController@store');
                Route::post('/{stay_reservations}/do/{action}', 'Reservations\ReservationsController@doAction');

                Route::patch('/{stay_reservations}', 'Reservations\ReservationsController@update');
                Route::delete('/{stay_reservations}', 'Reservations\ReservationsController@destroy');
            }
        );

        Route::prefix('main-purchase-contracts')->group(
            function () {
                Route::get('/', 'MainPurchaseContracts\MainPurchaseContractsController@index');
                Route::get('/actions', 'MainPurchaseContracts\MainPurchaseContractsController@getActions');

                Route::get('{stay_main_purchase_contracts}/tags ', 'MainPurchaseContracts\MainPurchaseContractsController@tags');
                Route::post('{stay_main_purchase_contracts}/tags ', 'MainPurchaseContracts\MainPurchaseContractsController@saveTags');
                Route::get('{stay_main_purchase_contracts}/addresses ', 'MainPurchaseContracts\MainPurchaseContractsController@addresses');
                Route::post('{stay_main_purchase_contracts}/addresses ', 'MainPurchaseContracts\MainPurchaseContractsController@saveAddresses');

                Route::get('/{stay_main_purchase_contracts}/{subObjects}', 'MainPurchaseContracts\MainPurchaseContractsController@relatedObjects');
                Route::get('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@show');

                Route::post('/', 'MainPurchaseContracts\MainPurchaseContractsController@store');
                Route::post('/{stay_main_purchase_contracts}/do/{action}', 'MainPurchaseContracts\MainPurchaseContractsController@doAction');

                Route::patch('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@update');
                Route::delete('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@destroy');
            }
        );

        Route::prefix('sales-contracts')->group(
            function () {
                Route::get('/', 'SalesContracts\SalesContractsController@index');
                Route::get('/actions', 'SalesContracts\SalesContractsController@getActions');

                Route::get('{stay_sales_contracts}/tags ', 'SalesContracts\SalesContractsController@tags');
                Route::post('{stay_sales_contracts}/tags ', 'SalesContracts\SalesContractsController@saveTags');
                Route::get('{stay_sales_contracts}/addresses ', 'SalesContracts\SalesContractsController@addresses');
                Route::post('{stay_sales_contracts}/addresses ', 'SalesContracts\SalesContractsController@saveAddresses');

                Route::get('/{stay_sales_contracts}/{subObjects}', 'SalesContracts\SalesContractsController@relatedObjects');
                Route::get('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@show');

                Route::post('/', 'SalesContracts\SalesContractsController@store');
                Route::post('/{stay_sales_contracts}/do/{action}', 'SalesContracts\SalesContractsController@doAction');

                Route::patch('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@update');
                Route::delete('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@destroy');
            }
        );

        Route::prefix('quota-contracts')->group(
            function () {
                Route::get('/', 'QuotaContracts\QuotaContractsController@index');
                Route::get('/actions', 'QuotaContracts\QuotaContractsController@getActions');

                Route::get('{stay_quota_contracts}/tags ', 'QuotaContracts\QuotaContractsController@tags');
                Route::post('{stay_quota_contracts}/tags ', 'QuotaContracts\QuotaContractsController@saveTags');
                Route::get('{stay_quota_contracts}/addresses ', 'QuotaContracts\QuotaContractsController@addresses');
                Route::post('{stay_quota_contracts}/addresses ', 'QuotaContracts\QuotaContractsController@saveAddresses');

                Route::get('/{stay_quota_contracts}/{subObjects}', 'QuotaContracts\QuotaContractsController@relatedObjects');
                Route::get('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@show');

                Route::post('/', 'QuotaContracts\QuotaContractsController@store');
                Route::post('/{stay_quota_contracts}/do/{action}', 'QuotaContracts\QuotaContractsController@doAction');

                Route::patch('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@update');
                Route::delete('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@destroy');
            }
        );

        Route::prefix('hotel-contracts')->group(
            function () {
                Route::get('/', 'HotelContracts\HotelContractsController@index');
                Route::get('/actions', 'HotelContracts\HotelContractsController@getActions');

                Route::get('{stay_hotel_contracts}/tags ', 'HotelContracts\HotelContractsController@tags');
                Route::post('{stay_hotel_contracts}/tags ', 'HotelContracts\HotelContractsController@saveTags');
                Route::get('{stay_hotel_contracts}/addresses ', 'HotelContracts\HotelContractsController@addresses');
                Route::post('{stay_hotel_contracts}/addresses ', 'HotelContracts\HotelContractsController@saveAddresses');

                Route::get('/{stay_hotel_contracts}/{subObjects}', 'HotelContracts\HotelContractsController@relatedObjects');
                Route::get('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@show');

                Route::post('/', 'HotelContracts\HotelContractsController@store');
                Route::post('/{stay_hotel_contracts}/do/{action}', 'HotelContracts\HotelContractsController@doAction');

                Route::patch('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@update');
                Route::delete('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@destroy');
            }
        );

        Route::prefix('rates')->group(
            function () {
                Route::get('/', 'Rates\RatesController@index');
                Route::get('/actions', 'Rates\RatesController@getActions');

                Route::get('{stay_rates}/tags ', 'Rates\RatesController@tags');
                Route::post('{stay_rates}/tags ', 'Rates\RatesController@saveTags');
                Route::get('{stay_rates}/addresses ', 'Rates\RatesController@addresses');
                Route::post('{stay_rates}/addresses ', 'Rates\RatesController@saveAddresses');

                Route::get('/{stay_rates}/{subObjects}', 'Rates\RatesController@relatedObjects');
                Route::get('/{stay_rates}', 'Rates\RatesController@show');

                Route::post('/', 'Rates\RatesController@store');
                Route::post('/{stay_rates}/do/{action}', 'Rates\RatesController@doAction');

                Route::patch('/{stay_rates}', 'Rates\RatesController@update');
                Route::delete('/{stay_rates}', 'Rates\RatesController@destroy');
            }
        );

        Route::prefix('rate-prices')->group(
            function () {
                Route::get('/', 'RatePrices\RatePricesController@index');
                Route::get('/actions', 'RatePrices\RatePricesController@getActions');

                Route::get('{stay_rate_prices}/tags ', 'RatePrices\RatePricesController@tags');
                Route::post('{stay_rate_prices}/tags ', 'RatePrices\RatePricesController@saveTags');
                Route::get('{stay_rate_prices}/addresses ', 'RatePrices\RatePricesController@addresses');
                Route::post('{stay_rate_prices}/addresses ', 'RatePrices\RatePricesController@saveAddresses');

                Route::get('/{stay_rate_prices}/{subObjects}', 'RatePrices\RatePricesController@relatedObjects');
                Route::get('/{stay_rate_prices}', 'RatePrices\RatePricesController@show');

                Route::post('/', 'RatePrices\RatePricesController@store');
                Route::post('/{stay_rate_prices}/do/{action}', 'RatePrices\RatePricesController@doAction');

                Route::patch('/{stay_rate_prices}', 'RatePrices\RatePricesController@update');
                Route::delete('/{stay_rate_prices}', 'RatePrices\RatePricesController@destroy');
            }
        );

        Route::prefix('room-type-provider-mappings')->group(
            function () {
                Route::get('/', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@index');
                Route::get('/actions', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@getActions');

                Route::get('{stay_room_type_provider_mappings}/tags ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@tags');
                Route::post('{stay_room_type_provider_mappings}/tags ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@saveTags');
                Route::get('{stay_room_type_provider_mappings}/addresses ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@addresses');
                Route::post('{stay_room_type_provider_mappings}/addresses ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@saveAddresses');

                Route::get('/{stay_room_type_provider_mappings}/{subObjects}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@relatedObjects');
                Route::get('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@show');

                Route::post('/', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@store');
                Route::post('/{stay_room_type_provider_mappings}/do/{action}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@doAction');

                Route::patch('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@update');
                Route::delete('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@destroy');
            }
        );

        Route::prefix('hotel-consumer-mappings')->group(
            function () {
                Route::get('/', 'HotelConsumerMappings\HotelConsumerMappingsController@index');
                Route::get('/actions', 'HotelConsumerMappings\HotelConsumerMappingsController@getActions');

                Route::get('{stay_hotel_consumer_mappings}/tags ', 'HotelConsumerMappings\HotelConsumerMappingsController@tags');
                Route::post('{stay_hotel_consumer_mappings}/tags ', 'HotelConsumerMappings\HotelConsumerMappingsController@saveTags');
                Route::get('{stay_hotel_consumer_mappings}/addresses ', 'HotelConsumerMappings\HotelConsumerMappingsController@addresses');
                Route::post('{stay_hotel_consumer_mappings}/addresses ', 'HotelConsumerMappings\HotelConsumerMappingsController@saveAddresses');

                Route::get('/{stay_hotel_consumer_mappings}/{subObjects}', 'HotelConsumerMappings\HotelConsumerMappingsController@relatedObjects');
                Route::get('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@show');

                Route::post('/', 'HotelConsumerMappings\HotelConsumerMappingsController@store');
                Route::post('/{stay_hotel_consumer_mappings}/do/{action}', 'HotelConsumerMappings\HotelConsumerMappingsController@doAction');

                Route::patch('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@update');
                Route::delete('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@destroy');
            }
        );

        Route::prefix('consumers')->group(
            function () {
                Route::get('/', 'Consumers\ConsumersController@index');
                Route::get('/actions', 'Consumers\ConsumersController@getActions');

                Route::get('{stay_consumers}/tags ', 'Consumers\ConsumersController@tags');
                Route::post('{stay_consumers}/tags ', 'Consumers\ConsumersController@saveTags');
                Route::get('{stay_consumers}/addresses ', 'Consumers\ConsumersController@addresses');
                Route::post('{stay_consumers}/addresses ', 'Consumers\ConsumersController@saveAddresses');

                Route::get('/{stay_consumers}/{subObjects}', 'Consumers\ConsumersController@relatedObjects');
                Route::get('/{stay_consumers}', 'Consumers\ConsumersController@show');

                Route::post('/', 'Consumers\ConsumersController@store');
                Route::post('/{stay_consumers}/do/{action}', 'Consumers\ConsumersController@doAction');

                Route::patch('/{stay_consumers}', 'Consumers\ConsumersController@update');
                Route::delete('/{stay_consumers}', 'Consumers\ConsumersController@destroy');
            }
        );

        Route::prefix('room-type-consumer-mappings')->group(
            function () {
                Route::get('/', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@index');
                Route::get('/actions', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@getActions');

                Route::get('{stay_room_type_consumer_mappings}/tags ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@tags');
                Route::post('{stay_room_type_consumer_mappings}/tags ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@saveTags');
                Route::get('{stay_room_type_consumer_mappings}/addresses ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@addresses');
                Route::post('{stay_room_type_consumer_mappings}/addresses ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@saveAddresses');

                Route::get('/{stay_room_type_consumer_mappings}/{subObjects}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@relatedObjects');
                Route::get('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@show');

                Route::post('/', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@store');
                Route::post('/{stay_room_type_consumer_mappings}/do/{action}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@doAction');

                Route::patch('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@update');
                Route::delete('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@destroy');
            }
        );

        Route::prefix('agency-group')->group(
            function () {
                Route::get('/', 'AgencyGroup\AgencyGroupController@index');
                Route::get('/actions', 'AgencyGroup\AgencyGroupController@getActions');

                Route::get('{stay_agency_group}/tags ', 'AgencyGroup\AgencyGroupController@tags');
                Route::post('{stay_agency_group}/tags ', 'AgencyGroup\AgencyGroupController@saveTags');
                Route::get('{stay_agency_group}/addresses ', 'AgencyGroup\AgencyGroupController@addresses');
                Route::post('{stay_agency_group}/addresses ', 'AgencyGroup\AgencyGroupController@saveAddresses');

                Route::get('/{stay_agency_group}/{subObjects}', 'AgencyGroup\AgencyGroupController@relatedObjects');
                Route::get('/{stay_agency_group}', 'AgencyGroup\AgencyGroupController@show');

                Route::post('/', 'AgencyGroup\AgencyGroupController@store');
                Route::post('/{stay_agency_group}/do/{action}', 'AgencyGroup\AgencyGroupController@doAction');

                Route::patch('/{stay_agency_group}', 'AgencyGroup\AgencyGroupController@update');
                Route::delete('/{stay_agency_group}', 'AgencyGroup\AgencyGroupController@destroy');
            }
        );

        Route::prefix('cancellation-policy-date-stays')->group(
            function () {
                Route::get('/', 'CancellationPolicyDates\CancellationPolicyDatesController@index');
                Route::get('/actions', 'CancellationPolicyDates\CancellationPolicyDatesController@getActions');

                Route::get('{scpds}/tags ', 'CancellationPolicyDates\CancellationPolicyDatesController@tags');
                Route::post('{scpds}/tags ', 'CancellationPolicyDates\CancellationPolicyDatesController@saveTags');
                Route::get('{scpds}/addresses ', 'CancellationPolicyDates\CancellationPolicyDatesController@addresses');
                Route::post('{scpds}/addresses ', 'CancellationPolicyDates\CancellationPolicyDatesController@saveAddresses');

                Route::get('/{scpds}/{subObjects}', 'CancellationPolicyDates\CancellationPolicyDatesController@relatedObjects');
                Route::get('/{scpds}', 'CancellationPolicyDates\CancellationPolicyDatesController@show');

                Route::post('/', 'CancellationPolicyDates\CancellationPolicyDatesController@store');
                Route::post('/{scpds}/do/{action}', 'CancellationPolicyDates\CancellationPolicyDatesController@doAction');

                Route::patch('/{scpds}', 'CancellationPolicyDates\CancellationPolicyDatesController@update');
                Route::delete('/{scpds}', 'CancellationPolicyDates\CancellationPolicyDatesController@destroy');
            }
        );

        Route::prefix('cancellation-policy')->group(
            function () {
                Route::get('/', 'CancellationPolicy\CancellationPolicyController@index');
                Route::get('/actions', 'CancellationPolicy\CancellationPolicyController@getActions');

                Route::get('{stay_cancellation_policy}/tags ', 'CancellationPolicy\CancellationPolicyController@tags');
                Route::post('{stay_cancellation_policy}/tags ', 'CancellationPolicy\CancellationPolicyController@saveTags');
                Route::get('{stay_cancellation_policy}/addresses ', 'CancellationPolicy\CancellationPolicyController@addresses');
                Route::post('{stay_cancellation_policy}/addresses ', 'CancellationPolicy\CancellationPolicyController@saveAddresses');

                Route::get('/{stay_cancellation_policy}/{subObjects}', 'CancellationPolicy\CancellationPolicyController@relatedObjects');
                Route::get('/{stay_cancellation_policy}', 'CancellationPolicy\CancellationPolicyController@show');

                Route::post('/', 'CancellationPolicy\CancellationPolicyController@store');
                Route::post('/{stay_cancellation_policy}/do/{action}', 'CancellationPolicy\CancellationPolicyController@doAction');

                Route::patch('/{stay_cancellation_policy}', 'CancellationPolicy\CancellationPolicyController@update');
                Route::delete('/{stay_cancellation_policy}', 'CancellationPolicy\CancellationPolicyController@destroy');
            }
        );

        Route::prefix('providers')->group(
            function () {
                Route::get('/', 'Providers\ProvidersController@index');
                Route::get('/actions', 'Providers\ProvidersController@getActions');

                Route::get('{stay_providers}/tags ', 'Providers\ProvidersController@tags');
                Route::post('{stay_providers}/tags ', 'Providers\ProvidersController@saveTags');
                Route::get('{stay_providers}/addresses ', 'Providers\ProvidersController@addresses');
                Route::post('{stay_providers}/addresses ', 'Providers\ProvidersController@saveAddresses');

                Route::get('/{stay_providers}/{subObjects}', 'Providers\ProvidersController@relatedObjects');
                Route::get('/{stay_providers}', 'Providers\ProvidersController@show');

                Route::post('/', 'Providers\ProvidersController@store');
                Route::post('/{stay_providers}/do/{action}', 'Providers\ProvidersController@doAction');

                Route::patch('/{stay_providers}', 'Providers\ProvidersController@update');
                Route::delete('/{stay_providers}', 'Providers\ProvidersController@destroy');
            }
        );

        Route::prefix('hotels')->group(
            function () {
                Route::get('/', 'Hotels\HotelsController@index');
                Route::get('/actions', 'Hotels\HotelsController@getActions');

                Route::get('{stay_hotels}/tags ', 'Hotels\HotelsController@tags');
                Route::post('{stay_hotels}/tags ', 'Hotels\HotelsController@saveTags');
                Route::get('{stay_hotels}/addresses ', 'Hotels\HotelsController@addresses');
                Route::post('{stay_hotels}/addresses ', 'Hotels\HotelsController@saveAddresses');

                Route::get('/{stay_hotels}/{subObjects}', 'Hotels\HotelsController@relatedObjects');
                Route::get('/{stay_hotels}', 'Hotels\HotelsController@show');

                Route::post('/', 'Hotels\HotelsController@store');
                Route::post('/{stay_hotels}/do/{action}', 'Hotels\HotelsController@doAction');

                Route::patch('/{stay_hotels}', 'Hotels\HotelsController@update');
                Route::delete('/{stay_hotels}', 'Hotels\HotelsController@destroy');
            }
        );

        Route::prefix('room-types')->group(
            function () {
                Route::get('/', 'RoomTypes\RoomTypesController@index');
                Route::get('/actions', 'RoomTypes\RoomTypesController@getActions');

                Route::get('{stay_room_types}/tags ', 'RoomTypes\RoomTypesController@tags');
                Route::post('{stay_room_types}/tags ', 'RoomTypes\RoomTypesController@saveTags');
                Route::get('{stay_room_types}/addresses ', 'RoomTypes\RoomTypesController@addresses');
                Route::post('{stay_room_types}/addresses ', 'RoomTypes\RoomTypesController@saveAddresses');

                Route::get('/{stay_room_types}/{subObjects}', 'RoomTypes\RoomTypesController@relatedObjects');
                Route::get('/{stay_room_types}', 'RoomTypes\RoomTypesController@show');

                Route::post('/', 'RoomTypes\RoomTypesController@store');
                Route::post('/{stay_room_types}/do/{action}', 'RoomTypes\RoomTypesController@doAction');

                Route::patch('/{stay_room_types}', 'RoomTypes\RoomTypesController@update');
                Route::delete('/{stay_room_types}', 'RoomTypes\RoomTypesController@destroy');
            }
        );

        Route::prefix('rooms')->group(
            function () {
                Route::get('/', 'Rooms\RoomsController@index');
                Route::get('/actions', 'Rooms\RoomsController@getActions');

                Route::get('{stay_rooms}/tags ', 'Rooms\RoomsController@tags');
                Route::post('{stay_rooms}/tags ', 'Rooms\RoomsController@saveTags');
                Route::get('{stay_rooms}/addresses ', 'Rooms\RoomsController@addresses');
                Route::post('{stay_rooms}/addresses ', 'Rooms\RoomsController@saveAddresses');

                Route::get('/{stay_rooms}/{subObjects}', 'Rooms\RoomsController@relatedObjects');
                Route::get('/{stay_rooms}', 'Rooms\RoomsController@show');

                Route::post('/', 'Rooms\RoomsController@store');
                Route::post('/{stay_rooms}/do/{action}', 'Rooms\RoomsController@doAction');

                Route::patch('/{stay_rooms}', 'Rooms\RoomsController@update');
                Route::delete('/{stay_rooms}', 'Rooms\RoomsController@destroy');
            }
        );

        Route::prefix('tarif-types')->group(
            function () {
                Route::get('/', 'TarifTypes\TarifTypesController@index');
                Route::get('/actions', 'TarifTypes\TarifTypesController@getActions');

                Route::get('{stay_tarif_types}/tags ', 'TarifTypes\TarifTypesController@tags');
                Route::post('{stay_tarif_types}/tags ', 'TarifTypes\TarifTypesController@saveTags');
                Route::get('{stay_tarif_types}/addresses ', 'TarifTypes\TarifTypesController@addresses');
                Route::post('{stay_tarif_types}/addresses ', 'TarifTypes\TarifTypesController@saveAddresses');

                Route::get('/{stay_tarif_types}/{subObjects}', 'TarifTypes\TarifTypesController@relatedObjects');
                Route::get('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@show');

                Route::post('/', 'TarifTypes\TarifTypesController@store');
                Route::post('/{stay_tarif_types}/do/{action}', 'TarifTypes\TarifTypesController@doAction');

                Route::patch('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@update');
                Route::delete('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@destroy');
            }
        );

        Route::prefix('reservations')->group(
            function () {
                Route::get('/', 'Reservations\ReservationsController@index');
                Route::get('/actions', 'Reservations\ReservationsController@getActions');

                Route::get('{stay_reservations}/tags ', 'Reservations\ReservationsController@tags');
                Route::post('{stay_reservations}/tags ', 'Reservations\ReservationsController@saveTags');
                Route::get('{stay_reservations}/addresses ', 'Reservations\ReservationsController@addresses');
                Route::post('{stay_reservations}/addresses ', 'Reservations\ReservationsController@saveAddresses');

                Route::get('/{stay_reservations}/{subObjects}', 'Reservations\ReservationsController@relatedObjects');
                Route::get('/{stay_reservations}', 'Reservations\ReservationsController@show');

                Route::post('/', 'Reservations\ReservationsController@store');
                Route::post('/{stay_reservations}/do/{action}', 'Reservations\ReservationsController@doAction');

                Route::patch('/{stay_reservations}', 'Reservations\ReservationsController@update');
                Route::delete('/{stay_reservations}', 'Reservations\ReservationsController@destroy');
            }
        );

        Route::prefix('main-purchase-contracts')->group(
            function () {
                Route::get('/', 'MainPurchaseContracts\MainPurchaseContractsController@index');
                Route::get('/actions', 'MainPurchaseContracts\MainPurchaseContractsController@getActions');

                Route::get('{stay_main_purchase_contracts}/tags ', 'MainPurchaseContracts\MainPurchaseContractsController@tags');
                Route::post('{stay_main_purchase_contracts}/tags ', 'MainPurchaseContracts\MainPurchaseContractsController@saveTags');
                Route::get('{stay_main_purchase_contracts}/addresses ', 'MainPurchaseContracts\MainPurchaseContractsController@addresses');
                Route::post('{stay_main_purchase_contracts}/addresses ', 'MainPurchaseContracts\MainPurchaseContractsController@saveAddresses');

                Route::get('/{stay_main_purchase_contracts}/{subObjects}', 'MainPurchaseContracts\MainPurchaseContractsController@relatedObjects');
                Route::get('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@show');

                Route::post('/', 'MainPurchaseContracts\MainPurchaseContractsController@store');
                Route::post('/{stay_main_purchase_contracts}/do/{action}', 'MainPurchaseContracts\MainPurchaseContractsController@doAction');

                Route::patch('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@update');
                Route::delete('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@destroy');
            }
        );

        Route::prefix('sales-contracts')->group(
            function () {
                Route::get('/', 'SalesContracts\SalesContractsController@index');
                Route::get('/actions', 'SalesContracts\SalesContractsController@getActions');

                Route::get('{stay_sales_contracts}/tags ', 'SalesContracts\SalesContractsController@tags');
                Route::post('{stay_sales_contracts}/tags ', 'SalesContracts\SalesContractsController@saveTags');
                Route::get('{stay_sales_contracts}/addresses ', 'SalesContracts\SalesContractsController@addresses');
                Route::post('{stay_sales_contracts}/addresses ', 'SalesContracts\SalesContractsController@saveAddresses');

                Route::get('/{stay_sales_contracts}/{subObjects}', 'SalesContracts\SalesContractsController@relatedObjects');
                Route::get('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@show');

                Route::post('/', 'SalesContracts\SalesContractsController@store');
                Route::post('/{stay_sales_contracts}/do/{action}', 'SalesContracts\SalesContractsController@doAction');

                Route::patch('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@update');
                Route::delete('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@destroy');
            }
        );

        Route::prefix('quota-contracts')->group(
            function () {
                Route::get('/', 'QuotaContracts\QuotaContractsController@index');
                Route::get('/actions', 'QuotaContracts\QuotaContractsController@getActions');

                Route::get('{stay_quota_contracts}/tags ', 'QuotaContracts\QuotaContractsController@tags');
                Route::post('{stay_quota_contracts}/tags ', 'QuotaContracts\QuotaContractsController@saveTags');
                Route::get('{stay_quota_contracts}/addresses ', 'QuotaContracts\QuotaContractsController@addresses');
                Route::post('{stay_quota_contracts}/addresses ', 'QuotaContracts\QuotaContractsController@saveAddresses');

                Route::get('/{stay_quota_contracts}/{subObjects}', 'QuotaContracts\QuotaContractsController@relatedObjects');
                Route::get('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@show');

                Route::post('/', 'QuotaContracts\QuotaContractsController@store');
                Route::post('/{stay_quota_contracts}/do/{action}', 'QuotaContracts\QuotaContractsController@doAction');

                Route::patch('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@update');
                Route::delete('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@destroy');
            }
        );

        Route::prefix('hotel-contracts')->group(
            function () {
                Route::get('/', 'HotelContracts\HotelContractsController@index');
                Route::get('/actions', 'HotelContracts\HotelContractsController@getActions');

                Route::get('{stay_hotel_contracts}/tags ', 'HotelContracts\HotelContractsController@tags');
                Route::post('{stay_hotel_contracts}/tags ', 'HotelContracts\HotelContractsController@saveTags');
                Route::get('{stay_hotel_contracts}/addresses ', 'HotelContracts\HotelContractsController@addresses');
                Route::post('{stay_hotel_contracts}/addresses ', 'HotelContracts\HotelContractsController@saveAddresses');

                Route::get('/{stay_hotel_contracts}/{subObjects}', 'HotelContracts\HotelContractsController@relatedObjects');
                Route::get('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@show');

                Route::post('/', 'HotelContracts\HotelContractsController@store');
                Route::post('/{stay_hotel_contracts}/do/{action}', 'HotelContracts\HotelContractsController@doAction');

                Route::patch('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@update');
                Route::delete('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@destroy');
            }
        );

        Route::prefix('rates')->group(
            function () {
                Route::get('/', 'Rates\RatesController@index');
                Route::get('/actions', 'Rates\RatesController@getActions');

                Route::get('{stay_rates}/tags ', 'Rates\RatesController@tags');
                Route::post('{stay_rates}/tags ', 'Rates\RatesController@saveTags');
                Route::get('{stay_rates}/addresses ', 'Rates\RatesController@addresses');
                Route::post('{stay_rates}/addresses ', 'Rates\RatesController@saveAddresses');

                Route::get('/{stay_rates}/{subObjects}', 'Rates\RatesController@relatedObjects');
                Route::get('/{stay_rates}', 'Rates\RatesController@show');

                Route::post('/', 'Rates\RatesController@store');
                Route::post('/{stay_rates}/do/{action}', 'Rates\RatesController@doAction');

                Route::patch('/{stay_rates}', 'Rates\RatesController@update');
                Route::delete('/{stay_rates}', 'Rates\RatesController@destroy');
            }
        );

        Route::prefix('rate-prices')->group(
            function () {
                Route::get('/', 'RatePrices\RatePricesController@index');
                Route::get('/actions', 'RatePrices\RatePricesController@getActions');

                Route::get('{stay_rate_prices}/tags ', 'RatePrices\RatePricesController@tags');
                Route::post('{stay_rate_prices}/tags ', 'RatePrices\RatePricesController@saveTags');
                Route::get('{stay_rate_prices}/addresses ', 'RatePrices\RatePricesController@addresses');
                Route::post('{stay_rate_prices}/addresses ', 'RatePrices\RatePricesController@saveAddresses');

                Route::get('/{stay_rate_prices}/{subObjects}', 'RatePrices\RatePricesController@relatedObjects');
                Route::get('/{stay_rate_prices}', 'RatePrices\RatePricesController@show');

                Route::post('/', 'RatePrices\RatePricesController@store');
                Route::post('/{stay_rate_prices}/do/{action}', 'RatePrices\RatePricesController@doAction');

                Route::patch('/{stay_rate_prices}', 'RatePrices\RatePricesController@update');
                Route::delete('/{stay_rate_prices}', 'RatePrices\RatePricesController@destroy');
            }
        );

        Route::prefix('room-type-provider-mappings')->group(
            function () {
                Route::get('/', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@index');
                Route::get('/actions', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@getActions');

                Route::get('{stay_room_type_provider_mappings}/tags ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@tags');
                Route::post('{stay_room_type_provider_mappings}/tags ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@saveTags');
                Route::get('{stay_room_type_provider_mappings}/addresses ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@addresses');
                Route::post('{stay_room_type_provider_mappings}/addresses ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@saveAddresses');

                Route::get('/{stay_room_type_provider_mappings}/{subObjects}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@relatedObjects');
                Route::get('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@show');

                Route::post('/', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@store');
                Route::post('/{stay_room_type_provider_mappings}/do/{action}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@doAction');

                Route::patch('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@update');
                Route::delete('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@destroy');
            }
        );

        Route::prefix('hotel-consumer-mappings')->group(
            function () {
                Route::get('/', 'HotelConsumerMappings\HotelConsumerMappingsController@index');
                Route::get('/actions', 'HotelConsumerMappings\HotelConsumerMappingsController@getActions');

                Route::get('{stay_hotel_consumer_mappings}/tags ', 'HotelConsumerMappings\HotelConsumerMappingsController@tags');
                Route::post('{stay_hotel_consumer_mappings}/tags ', 'HotelConsumerMappings\HotelConsumerMappingsController@saveTags');
                Route::get('{stay_hotel_consumer_mappings}/addresses ', 'HotelConsumerMappings\HotelConsumerMappingsController@addresses');
                Route::post('{stay_hotel_consumer_mappings}/addresses ', 'HotelConsumerMappings\HotelConsumerMappingsController@saveAddresses');

                Route::get('/{stay_hotel_consumer_mappings}/{subObjects}', 'HotelConsumerMappings\HotelConsumerMappingsController@relatedObjects');
                Route::get('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@show');

                Route::post('/', 'HotelConsumerMappings\HotelConsumerMappingsController@store');
                Route::post('/{stay_hotel_consumer_mappings}/do/{action}', 'HotelConsumerMappings\HotelConsumerMappingsController@doAction');

                Route::patch('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@update');
                Route::delete('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@destroy');
            }
        );

        Route::prefix('consumers')->group(
            function () {
                Route::get('/', 'Consumers\ConsumersController@index');
                Route::get('/actions', 'Consumers\ConsumersController@getActions');

                Route::get('{stay_consumers}/tags ', 'Consumers\ConsumersController@tags');
                Route::post('{stay_consumers}/tags ', 'Consumers\ConsumersController@saveTags');
                Route::get('{stay_consumers}/addresses ', 'Consumers\ConsumersController@addresses');
                Route::post('{stay_consumers}/addresses ', 'Consumers\ConsumersController@saveAddresses');

                Route::get('/{stay_consumers}/{subObjects}', 'Consumers\ConsumersController@relatedObjects');
                Route::get('/{stay_consumers}', 'Consumers\ConsumersController@show');

                Route::post('/', 'Consumers\ConsumersController@store');
                Route::post('/{stay_consumers}/do/{action}', 'Consumers\ConsumersController@doAction');

                Route::patch('/{stay_consumers}', 'Consumers\ConsumersController@update');
                Route::delete('/{stay_consumers}', 'Consumers\ConsumersController@destroy');
            }
        );

        Route::prefix('room-type-consumer-mappings')->group(
            function () {
                Route::get('/', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@index');
                Route::get('/actions', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@getActions');

                Route::get('{stay_room_type_consumer_mappings}/tags ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@tags');
                Route::post('{stay_room_type_consumer_mappings}/tags ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@saveTags');
                Route::get('{stay_room_type_consumer_mappings}/addresses ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@addresses');
                Route::post('{stay_room_type_consumer_mappings}/addresses ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@saveAddresses');

                Route::get('/{stay_room_type_consumer_mappings}/{subObjects}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@relatedObjects');
                Route::get('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@show');

                Route::post('/', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@store');
                Route::post('/{stay_room_type_consumer_mappings}/do/{action}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@doAction');

                Route::patch('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@update');
                Route::delete('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@destroy');
            }
        );

        Route::prefix('hotel-provider-mappings')->group(
            function () {
                Route::get('/', 'HotelProviderMappings\HotelProviderMappingsController@index');
                Route::get('/actions', 'HotelProviderMappings\HotelProviderMappingsController@getActions');

                Route::get('{stay_hotel_provider_mappings}/tags ', 'HotelProviderMappings\HotelProviderMappingsController@tags');
                Route::post('{stay_hotel_provider_mappings}/tags ', 'HotelProviderMappings\HotelProviderMappingsController@saveTags');
                Route::get('{stay_hotel_provider_mappings}/addresses ', 'HotelProviderMappings\HotelProviderMappingsController@addresses');
                Route::post('{stay_hotel_provider_mappings}/addresses ', 'HotelProviderMappings\HotelProviderMappingsController@saveAddresses');

                Route::get('/{stay_hotel_provider_mappings}/{subObjects}', 'HotelProviderMappings\HotelProviderMappingsController@relatedObjects');
                Route::get('/{stay_hotel_provider_mappings}', 'HotelProviderMappings\HotelProviderMappingsController@show');

                Route::post('/', 'HotelProviderMappings\HotelProviderMappingsController@store');
                Route::post('/{stay_hotel_provider_mappings}/do/{action}', 'HotelProviderMappings\HotelProviderMappingsController@doAction');

                Route::patch('/{stay_hotel_provider_mappings}', 'HotelProviderMappings\HotelProviderMappingsController@update');
                Route::delete('/{stay_hotel_provider_mappings}', 'HotelProviderMappings\HotelProviderMappingsController@destroy');
            }
        );

        Route::prefix('agency-groups')->group(
            function () {
                Route::get('/', 'AgencyGroups\AgencyGroupsController@index');
                Route::get('/actions', 'AgencyGroups\AgencyGroupsController@getActions');

                Route::get('{stay_agency_groups}/tags ', 'AgencyGroups\AgencyGroupsController@tags');
                Route::post('{stay_agency_groups}/tags ', 'AgencyGroups\AgencyGroupsController@saveTags');
                Route::get('{stay_agency_groups}/addresses ', 'AgencyGroups\AgencyGroupsController@addresses');
                Route::post('{stay_agency_groups}/addresses ', 'AgencyGroups\AgencyGroupsController@saveAddresses');

                Route::get('/{stay_agency_groups}/{subObjects}', 'AgencyGroups\AgencyGroupsController@relatedObjects');
                Route::get('/{stay_agency_groups}', 'AgencyGroups\AgencyGroupsController@show');

                Route::post('/', 'AgencyGroups\AgencyGroupsController@store');
                Route::post('/{stay_agency_groups}/do/{action}', 'AgencyGroups\AgencyGroupsController@doAction');

                Route::patch('/{stay_agency_groups}', 'AgencyGroups\AgencyGroupsController@update');
                Route::delete('/{stay_agency_groups}', 'AgencyGroups\AgencyGroupsController@destroy');
            }
        );

        Route::prefix('cancellation-policies')->group(
            function () {
                Route::get('/', 'CancellationPolicies\CancellationPoliciesController@index');
                Route::get('/actions', 'CancellationPolicies\CancellationPoliciesController@getActions');

                Route::get('{stay_cancellation_policies}/tags ', 'CancellationPolicies\CancellationPoliciesController@tags');
                Route::post('{stay_cancellation_policies}/tags ', 'CancellationPolicies\CancellationPoliciesController@saveTags');
                Route::get('{stay_cancellation_policies}/addresses ', 'CancellationPolicies\CancellationPoliciesController@addresses');
                Route::post('{stay_cancellation_policies}/addresses ', 'CancellationPolicies\CancellationPoliciesController@saveAddresses');

                Route::get('/{stay_cancellation_policies}/{subObjects}', 'CancellationPolicies\CancellationPoliciesController@relatedObjects');
                Route::get('/{stay_cancellation_policies}', 'CancellationPolicies\CancellationPoliciesController@show');

                Route::post('/', 'CancellationPolicies\CancellationPoliciesController@store');
                Route::post('/{stay_cancellation_policies}/do/{action}', 'CancellationPolicies\CancellationPoliciesController@doAction');

                Route::patch('/{stay_cancellation_policies}', 'CancellationPolicies\CancellationPoliciesController@update');
                Route::delete('/{stay_cancellation_policies}', 'CancellationPolicies\CancellationPoliciesController@destroy');
            }
        );

        Route::prefix('cancellation-policy-dates')->group(
            function () {
                Route::get('/', 'CancellationPolicyDates\CancellationPolicyDatesController@index');
                Route::get('/actions', 'CancellationPolicyDates\CancellationPolicyDatesController@getActions');

                Route::get('{stay_cancellation_policy_dates}/tags ', 'CancellationPolicyDates\CancellationPolicyDatesController@tags');
                Route::post('{stay_cancellation_policy_dates}/tags ', 'CancellationPolicyDates\CancellationPolicyDatesController@saveTags');
                Route::get('{stay_cancellation_policy_dates}/addresses ', 'CancellationPolicyDates\CancellationPolicyDatesController@addresses');
                Route::post('{stay_cancellation_policy_dates}/addresses ', 'CancellationPolicyDates\CancellationPolicyDatesController@saveAddresses');

                Route::get('/{stay_cancellation_policy_dates}/{subObjects}', 'CancellationPolicyDates\CancellationPolicyDatesController@relatedObjects');
                Route::get('/{stay_cancellation_policy_dates}', 'CancellationPolicyDates\CancellationPolicyDatesController@show');

                Route::post('/', 'CancellationPolicyDates\CancellationPolicyDatesController@store');
                Route::post('/{stay_cancellation_policy_dates}/do/{action}', 'CancellationPolicyDates\CancellationPolicyDatesController@doAction');

                Route::patch('/{stay_cancellation_policy_dates}', 'CancellationPolicyDates\CancellationPolicyDatesController@update');
                Route::delete('/{stay_cancellation_policy_dates}', 'CancellationPolicyDates\CancellationPolicyDatesController@destroy');
            }
        );

        Route::prefix('providers')->group(
            function () {
                Route::get('/', 'Providers\ProvidersController@index');
                Route::get('/actions', 'Providers\ProvidersController@getActions');

                Route::get('{stay_providers}/tags ', 'Providers\ProvidersController@tags');
                Route::post('{stay_providers}/tags ', 'Providers\ProvidersController@saveTags');
                Route::get('{stay_providers}/addresses ', 'Providers\ProvidersController@addresses');
                Route::post('{stay_providers}/addresses ', 'Providers\ProvidersController@saveAddresses');

                Route::get('/{stay_providers}/{subObjects}', 'Providers\ProvidersController@relatedObjects');
                Route::get('/{stay_providers}', 'Providers\ProvidersController@show');

                Route::post('/', 'Providers\ProvidersController@store');
                Route::post('/{stay_providers}/do/{action}', 'Providers\ProvidersController@doAction');

                Route::patch('/{stay_providers}', 'Providers\ProvidersController@update');
                Route::delete('/{stay_providers}', 'Providers\ProvidersController@destroy');
            }
        );

        Route::prefix('hotels')->group(
            function () {
                Route::get('/', 'Hotels\HotelsController@index');
                Route::get('/actions', 'Hotels\HotelsController@getActions');

                Route::get('{stay_hotels}/tags ', 'Hotels\HotelsController@tags');
                Route::post('{stay_hotels}/tags ', 'Hotels\HotelsController@saveTags');
                Route::get('{stay_hotels}/addresses ', 'Hotels\HotelsController@addresses');
                Route::post('{stay_hotels}/addresses ', 'Hotels\HotelsController@saveAddresses');

                Route::get('/{stay_hotels}/{subObjects}', 'Hotels\HotelsController@relatedObjects');
                Route::get('/{stay_hotels}', 'Hotels\HotelsController@show');

                Route::post('/', 'Hotels\HotelsController@store');
                Route::post('/{stay_hotels}/do/{action}', 'Hotels\HotelsController@doAction');

                Route::patch('/{stay_hotels}', 'Hotels\HotelsController@update');
                Route::delete('/{stay_hotels}', 'Hotels\HotelsController@destroy');
            }
        );

        Route::prefix('room-types')->group(
            function () {
                Route::get('/', 'RoomTypes\RoomTypesController@index');
                Route::get('/actions', 'RoomTypes\RoomTypesController@getActions');

                Route::get('{stay_room_types}/tags ', 'RoomTypes\RoomTypesController@tags');
                Route::post('{stay_room_types}/tags ', 'RoomTypes\RoomTypesController@saveTags');
                Route::get('{stay_room_types}/addresses ', 'RoomTypes\RoomTypesController@addresses');
                Route::post('{stay_room_types}/addresses ', 'RoomTypes\RoomTypesController@saveAddresses');

                Route::get('/{stay_room_types}/{subObjects}', 'RoomTypes\RoomTypesController@relatedObjects');
                Route::get('/{stay_room_types}', 'RoomTypes\RoomTypesController@show');

                Route::post('/', 'RoomTypes\RoomTypesController@store');
                Route::post('/{stay_room_types}/do/{action}', 'RoomTypes\RoomTypesController@doAction');

                Route::patch('/{stay_room_types}', 'RoomTypes\RoomTypesController@update');
                Route::delete('/{stay_room_types}', 'RoomTypes\RoomTypesController@destroy');
            }
        );

        Route::prefix('rooms')->group(
            function () {
                Route::get('/', 'Rooms\RoomsController@index');
                Route::get('/actions', 'Rooms\RoomsController@getActions');

                Route::get('{stay_rooms}/tags ', 'Rooms\RoomsController@tags');
                Route::post('{stay_rooms}/tags ', 'Rooms\RoomsController@saveTags');
                Route::get('{stay_rooms}/addresses ', 'Rooms\RoomsController@addresses');
                Route::post('{stay_rooms}/addresses ', 'Rooms\RoomsController@saveAddresses');

                Route::get('/{stay_rooms}/{subObjects}', 'Rooms\RoomsController@relatedObjects');
                Route::get('/{stay_rooms}', 'Rooms\RoomsController@show');

                Route::post('/', 'Rooms\RoomsController@store');
                Route::post('/{stay_rooms}/do/{action}', 'Rooms\RoomsController@doAction');

                Route::patch('/{stay_rooms}', 'Rooms\RoomsController@update');
                Route::delete('/{stay_rooms}', 'Rooms\RoomsController@destroy');
            }
        );

        Route::prefix('tarif-types')->group(
            function () {
                Route::get('/', 'TarifTypes\TarifTypesController@index');
                Route::get('/actions', 'TarifTypes\TarifTypesController@getActions');

                Route::get('{stay_tarif_types}/tags ', 'TarifTypes\TarifTypesController@tags');
                Route::post('{stay_tarif_types}/tags ', 'TarifTypes\TarifTypesController@saveTags');
                Route::get('{stay_tarif_types}/addresses ', 'TarifTypes\TarifTypesController@addresses');
                Route::post('{stay_tarif_types}/addresses ', 'TarifTypes\TarifTypesController@saveAddresses');

                Route::get('/{stay_tarif_types}/{subObjects}', 'TarifTypes\TarifTypesController@relatedObjects');
                Route::get('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@show');

                Route::post('/', 'TarifTypes\TarifTypesController@store');
                Route::post('/{stay_tarif_types}/do/{action}', 'TarifTypes\TarifTypesController@doAction');

                Route::patch('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@update');
                Route::delete('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@destroy');
            }
        );

        Route::prefix('reservations')->group(
            function () {
                Route::get('/', 'Reservations\ReservationsController@index');
                Route::get('/actions', 'Reservations\ReservationsController@getActions');

                Route::get('{stay_reservations}/tags ', 'Reservations\ReservationsController@tags');
                Route::post('{stay_reservations}/tags ', 'Reservations\ReservationsController@saveTags');
                Route::get('{stay_reservations}/addresses ', 'Reservations\ReservationsController@addresses');
                Route::post('{stay_reservations}/addresses ', 'Reservations\ReservationsController@saveAddresses');

                Route::get('/{stay_reservations}/{subObjects}', 'Reservations\ReservationsController@relatedObjects');
                Route::get('/{stay_reservations}', 'Reservations\ReservationsController@show');

                Route::post('/', 'Reservations\ReservationsController@store');
                Route::post('/{stay_reservations}/do/{action}', 'Reservations\ReservationsController@doAction');

                Route::patch('/{stay_reservations}', 'Reservations\ReservationsController@update');
                Route::delete('/{stay_reservations}', 'Reservations\ReservationsController@destroy');
            }
        );

        Route::prefix('main-purchase-contracts')->group(
            function () {
                Route::get('/', 'MainPurchaseContracts\MainPurchaseContractsController@index');
                Route::get('/actions', 'MainPurchaseContracts\MainPurchaseContractsController@getActions');

                Route::get('{stay_main_purchase_contracts}/tags ', 'MainPurchaseContracts\MainPurchaseContractsController@tags');
                Route::post('{stay_main_purchase_contracts}/tags ', 'MainPurchaseContracts\MainPurchaseContractsController@saveTags');
                Route::get('{stay_main_purchase_contracts}/addresses ', 'MainPurchaseContracts\MainPurchaseContractsController@addresses');
                Route::post('{stay_main_purchase_contracts}/addresses ', 'MainPurchaseContracts\MainPurchaseContractsController@saveAddresses');

                Route::get('/{stay_main_purchase_contracts}/{subObjects}', 'MainPurchaseContracts\MainPurchaseContractsController@relatedObjects');
                Route::get('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@show');

                Route::post('/', 'MainPurchaseContracts\MainPurchaseContractsController@store');
                Route::post('/{stay_main_purchase_contracts}/do/{action}', 'MainPurchaseContracts\MainPurchaseContractsController@doAction');

                Route::patch('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@update');
                Route::delete('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@destroy');
            }
        );

        Route::prefix('sales-contracts')->group(
            function () {
                Route::get('/', 'SalesContracts\SalesContractsController@index');
                Route::get('/actions', 'SalesContracts\SalesContractsController@getActions');

                Route::get('{stay_sales_contracts}/tags ', 'SalesContracts\SalesContractsController@tags');
                Route::post('{stay_sales_contracts}/tags ', 'SalesContracts\SalesContractsController@saveTags');
                Route::get('{stay_sales_contracts}/addresses ', 'SalesContracts\SalesContractsController@addresses');
                Route::post('{stay_sales_contracts}/addresses ', 'SalesContracts\SalesContractsController@saveAddresses');

                Route::get('/{stay_sales_contracts}/{subObjects}', 'SalesContracts\SalesContractsController@relatedObjects');
                Route::get('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@show');

                Route::post('/', 'SalesContracts\SalesContractsController@store');
                Route::post('/{stay_sales_contracts}/do/{action}', 'SalesContracts\SalesContractsController@doAction');

                Route::patch('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@update');
                Route::delete('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@destroy');
            }
        );

        Route::prefix('quota-contracts')->group(
            function () {
                Route::get('/', 'QuotaContracts\QuotaContractsController@index');
                Route::get('/actions', 'QuotaContracts\QuotaContractsController@getActions');

                Route::get('{stay_quota_contracts}/tags ', 'QuotaContracts\QuotaContractsController@tags');
                Route::post('{stay_quota_contracts}/tags ', 'QuotaContracts\QuotaContractsController@saveTags');
                Route::get('{stay_quota_contracts}/addresses ', 'QuotaContracts\QuotaContractsController@addresses');
                Route::post('{stay_quota_contracts}/addresses ', 'QuotaContracts\QuotaContractsController@saveAddresses');

                Route::get('/{stay_quota_contracts}/{subObjects}', 'QuotaContracts\QuotaContractsController@relatedObjects');
                Route::get('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@show');

                Route::post('/', 'QuotaContracts\QuotaContractsController@store');
                Route::post('/{stay_quota_contracts}/do/{action}', 'QuotaContracts\QuotaContractsController@doAction');

                Route::patch('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@update');
                Route::delete('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@destroy');
            }
        );

        Route::prefix('hotel-contracts')->group(
            function () {
                Route::get('/', 'HotelContracts\HotelContractsController@index');
                Route::get('/actions', 'HotelContracts\HotelContractsController@getActions');

                Route::get('{stay_hotel_contracts}/tags ', 'HotelContracts\HotelContractsController@tags');
                Route::post('{stay_hotel_contracts}/tags ', 'HotelContracts\HotelContractsController@saveTags');
                Route::get('{stay_hotel_contracts}/addresses ', 'HotelContracts\HotelContractsController@addresses');
                Route::post('{stay_hotel_contracts}/addresses ', 'HotelContracts\HotelContractsController@saveAddresses');

                Route::get('/{stay_hotel_contracts}/{subObjects}', 'HotelContracts\HotelContractsController@relatedObjects');
                Route::get('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@show');

                Route::post('/', 'HotelContracts\HotelContractsController@store');
                Route::post('/{stay_hotel_contracts}/do/{action}', 'HotelContracts\HotelContractsController@doAction');

                Route::patch('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@update');
                Route::delete('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@destroy');
            }
        );

        Route::prefix('rates')->group(
            function () {
                Route::get('/', 'Rates\RatesController@index');
                Route::get('/actions', 'Rates\RatesController@getActions');

                Route::get('{stay_rates}/tags ', 'Rates\RatesController@tags');
                Route::post('{stay_rates}/tags ', 'Rates\RatesController@saveTags');
                Route::get('{stay_rates}/addresses ', 'Rates\RatesController@addresses');
                Route::post('{stay_rates}/addresses ', 'Rates\RatesController@saveAddresses');

                Route::get('/{stay_rates}/{subObjects}', 'Rates\RatesController@relatedObjects');
                Route::get('/{stay_rates}', 'Rates\RatesController@show');

                Route::post('/', 'Rates\RatesController@store');
                Route::post('/{stay_rates}/do/{action}', 'Rates\RatesController@doAction');

                Route::patch('/{stay_rates}', 'Rates\RatesController@update');
                Route::delete('/{stay_rates}', 'Rates\RatesController@destroy');
            }
        );

        Route::prefix('rate-prices')->group(
            function () {
                Route::get('/', 'RatePrices\RatePricesController@index');
                Route::get('/actions', 'RatePrices\RatePricesController@getActions');

                Route::get('{stay_rate_prices}/tags ', 'RatePrices\RatePricesController@tags');
                Route::post('{stay_rate_prices}/tags ', 'RatePrices\RatePricesController@saveTags');
                Route::get('{stay_rate_prices}/addresses ', 'RatePrices\RatePricesController@addresses');
                Route::post('{stay_rate_prices}/addresses ', 'RatePrices\RatePricesController@saveAddresses');

                Route::get('/{stay_rate_prices}/{subObjects}', 'RatePrices\RatePricesController@relatedObjects');
                Route::get('/{stay_rate_prices}', 'RatePrices\RatePricesController@show');

                Route::post('/', 'RatePrices\RatePricesController@store');
                Route::post('/{stay_rate_prices}/do/{action}', 'RatePrices\RatePricesController@doAction');

                Route::patch('/{stay_rate_prices}', 'RatePrices\RatePricesController@update');
                Route::delete('/{stay_rate_prices}', 'RatePrices\RatePricesController@destroy');
            }
        );

        Route::prefix('room-type-provider-mappings')->group(
            function () {
                Route::get('/', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@index');
                Route::get('/actions', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@getActions');

                Route::get('{stay_room_type_provider_mappings}/tags ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@tags');
                Route::post('{stay_room_type_provider_mappings}/tags ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@saveTags');
                Route::get('{stay_room_type_provider_mappings}/addresses ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@addresses');
                Route::post('{stay_room_type_provider_mappings}/addresses ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@saveAddresses');

                Route::get('/{stay_room_type_provider_mappings}/{subObjects}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@relatedObjects');
                Route::get('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@show');

                Route::post('/', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@store');
                Route::post('/{stay_room_type_provider_mappings}/do/{action}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@doAction');

                Route::patch('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@update');
                Route::delete('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@destroy');
            }
        );

        Route::prefix('hotel-consumer-mappings')->group(
            function () {
                Route::get('/', 'HotelConsumerMappings\HotelConsumerMappingsController@index');
                Route::get('/actions', 'HotelConsumerMappings\HotelConsumerMappingsController@getActions');

                Route::get('{stay_hotel_consumer_mappings}/tags ', 'HotelConsumerMappings\HotelConsumerMappingsController@tags');
                Route::post('{stay_hotel_consumer_mappings}/tags ', 'HotelConsumerMappings\HotelConsumerMappingsController@saveTags');
                Route::get('{stay_hotel_consumer_mappings}/addresses ', 'HotelConsumerMappings\HotelConsumerMappingsController@addresses');
                Route::post('{stay_hotel_consumer_mappings}/addresses ', 'HotelConsumerMappings\HotelConsumerMappingsController@saveAddresses');

                Route::get('/{stay_hotel_consumer_mappings}/{subObjects}', 'HotelConsumerMappings\HotelConsumerMappingsController@relatedObjects');
                Route::get('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@show');

                Route::post('/', 'HotelConsumerMappings\HotelConsumerMappingsController@store');
                Route::post('/{stay_hotel_consumer_mappings}/do/{action}', 'HotelConsumerMappings\HotelConsumerMappingsController@doAction');

                Route::patch('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@update');
                Route::delete('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@destroy');
            }
        );

        Route::prefix('consumers')->group(
            function () {
                Route::get('/', 'Consumers\ConsumersController@index');
                Route::get('/actions', 'Consumers\ConsumersController@getActions');

                Route::get('{stay_consumers}/tags ', 'Consumers\ConsumersController@tags');
                Route::post('{stay_consumers}/tags ', 'Consumers\ConsumersController@saveTags');
                Route::get('{stay_consumers}/addresses ', 'Consumers\ConsumersController@addresses');
                Route::post('{stay_consumers}/addresses ', 'Consumers\ConsumersController@saveAddresses');

                Route::get('/{stay_consumers}/{subObjects}', 'Consumers\ConsumersController@relatedObjects');
                Route::get('/{stay_consumers}', 'Consumers\ConsumersController@show');

                Route::post('/', 'Consumers\ConsumersController@store');
                Route::post('/{stay_consumers}/do/{action}', 'Consumers\ConsumersController@doAction');

                Route::patch('/{stay_consumers}', 'Consumers\ConsumersController@update');
                Route::delete('/{stay_consumers}', 'Consumers\ConsumersController@destroy');
            }
        );

        Route::prefix('room-type-consumer-mappings')->group(
            function () {
                Route::get('/', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@index');
                Route::get('/actions', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@getActions');

                Route::get('{stay_room_type_consumer_mappings}/tags ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@tags');
                Route::post('{stay_room_type_consumer_mappings}/tags ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@saveTags');
                Route::get('{stay_room_type_consumer_mappings}/addresses ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@addresses');
                Route::post('{stay_room_type_consumer_mappings}/addresses ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@saveAddresses');

                Route::get('/{stay_room_type_consumer_mappings}/{subObjects}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@relatedObjects');
                Route::get('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@show');

                Route::post('/', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@store');
                Route::post('/{stay_room_type_consumer_mappings}/do/{action}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@doAction');

                Route::patch('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@update');
                Route::delete('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@destroy');
            }
        );

        Route::prefix('hotel-provider-mappings')->group(
            function () {
                Route::get('/', 'HotelProviderMappings\HotelProviderMappingsController@index');
                Route::get('/actions', 'HotelProviderMappings\HotelProviderMappingsController@getActions');

                Route::get('{stay_hotel_provider_mappings}/tags ', 'HotelProviderMappings\HotelProviderMappingsController@tags');
                Route::post('{stay_hotel_provider_mappings}/tags ', 'HotelProviderMappings\HotelProviderMappingsController@saveTags');
                Route::get('{stay_hotel_provider_mappings}/addresses ', 'HotelProviderMappings\HotelProviderMappingsController@addresses');
                Route::post('{stay_hotel_provider_mappings}/addresses ', 'HotelProviderMappings\HotelProviderMappingsController@saveAddresses');

                Route::get('/{stay_hotel_provider_mappings}/{subObjects}', 'HotelProviderMappings\HotelProviderMappingsController@relatedObjects');
                Route::get('/{stay_hotel_provider_mappings}', 'HotelProviderMappings\HotelProviderMappingsController@show');

                Route::post('/', 'HotelProviderMappings\HotelProviderMappingsController@store');
                Route::post('/{stay_hotel_provider_mappings}/do/{action}', 'HotelProviderMappings\HotelProviderMappingsController@doAction');

                Route::patch('/{stay_hotel_provider_mappings}', 'HotelProviderMappings\HotelProviderMappingsController@update');
                Route::delete('/{stay_hotel_provider_mappings}', 'HotelProviderMappings\HotelProviderMappingsController@destroy');
            }
        );

        Route::prefix('agency-groups')->group(
            function () {
                Route::get('/', 'AgencyGroups\AgencyGroupsController@index');
                Route::get('/actions', 'AgencyGroups\AgencyGroupsController@getActions');

                Route::get('{stay_agency_groups}/tags ', 'AgencyGroups\AgencyGroupsController@tags');
                Route::post('{stay_agency_groups}/tags ', 'AgencyGroups\AgencyGroupsController@saveTags');
                Route::get('{stay_agency_groups}/addresses ', 'AgencyGroups\AgencyGroupsController@addresses');
                Route::post('{stay_agency_groups}/addresses ', 'AgencyGroups\AgencyGroupsController@saveAddresses');

                Route::get('/{stay_agency_groups}/{subObjects}', 'AgencyGroups\AgencyGroupsController@relatedObjects');
                Route::get('/{stay_agency_groups}', 'AgencyGroups\AgencyGroupsController@show');

                Route::post('/', 'AgencyGroups\AgencyGroupsController@store');
                Route::post('/{stay_agency_groups}/do/{action}', 'AgencyGroups\AgencyGroupsController@doAction');

                Route::patch('/{stay_agency_groups}', 'AgencyGroups\AgencyGroupsController@update');
                Route::delete('/{stay_agency_groups}', 'AgencyGroups\AgencyGroupsController@destroy');
            }
        );

        Route::prefix('cancellation-policies')->group(
            function () {
                Route::get('/', 'CancellationPolicies\CancellationPoliciesController@index');
                Route::get('/actions', 'CancellationPolicies\CancellationPoliciesController@getActions');

                Route::get('{stay_cancellation_policies}/tags ', 'CancellationPolicies\CancellationPoliciesController@tags');
                Route::post('{stay_cancellation_policies}/tags ', 'CancellationPolicies\CancellationPoliciesController@saveTags');
                Route::get('{stay_cancellation_policies}/addresses ', 'CancellationPolicies\CancellationPoliciesController@addresses');
                Route::post('{stay_cancellation_policies}/addresses ', 'CancellationPolicies\CancellationPoliciesController@saveAddresses');

                Route::get('/{stay_cancellation_policies}/{subObjects}', 'CancellationPolicies\CancellationPoliciesController@relatedObjects');
                Route::get('/{stay_cancellation_policies}', 'CancellationPolicies\CancellationPoliciesController@show');

                Route::post('/', 'CancellationPolicies\CancellationPoliciesController@store');
                Route::post('/{stay_cancellation_policies}/do/{action}', 'CancellationPolicies\CancellationPoliciesController@doAction');

                Route::patch('/{stay_cancellation_policies}', 'CancellationPolicies\CancellationPoliciesController@update');
                Route::delete('/{stay_cancellation_policies}', 'CancellationPolicies\CancellationPoliciesController@destroy');
            }
        );

        Route::prefix('cancellation-policy-dates')->group(
            function () {
                Route::get('/', 'CancellationPolicyDates\CancellationPolicyDatesController@index');
                Route::get('/actions', 'CancellationPolicyDates\CancellationPolicyDatesController@getActions');

                Route::get('{stay_cancellation_policy_dates}/tags ', 'CancellationPolicyDates\CancellationPolicyDatesController@tags');
                Route::post('{stay_cancellation_policy_dates}/tags ', 'CancellationPolicyDates\CancellationPolicyDatesController@saveTags');
                Route::get('{stay_cancellation_policy_dates}/addresses ', 'CancellationPolicyDates\CancellationPolicyDatesController@addresses');
                Route::post('{stay_cancellation_policy_dates}/addresses ', 'CancellationPolicyDates\CancellationPolicyDatesController@saveAddresses');

                Route::get('/{stay_cancellation_policy_dates}/{subObjects}', 'CancellationPolicyDates\CancellationPolicyDatesController@relatedObjects');
                Route::get('/{stay_cancellation_policy_dates}', 'CancellationPolicyDates\CancellationPolicyDatesController@show');

                Route::post('/', 'CancellationPolicyDates\CancellationPolicyDatesController@store');
                Route::post('/{stay_cancellation_policy_dates}/do/{action}', 'CancellationPolicyDates\CancellationPolicyDatesController@doAction');

                Route::patch('/{stay_cancellation_policy_dates}', 'CancellationPolicyDates\CancellationPolicyDatesController@update');
                Route::delete('/{stay_cancellation_policy_dates}', 'CancellationPolicyDates\CancellationPolicyDatesController@destroy');
            }
        );

        Route::prefix('providers')->group(
            function () {
                Route::get('/', 'Providers\ProvidersController@index');
                Route::get('/actions', 'Providers\ProvidersController@getActions');

                Route::get('{stay_providers}/tags ', 'Providers\ProvidersController@tags');
                Route::post('{stay_providers}/tags ', 'Providers\ProvidersController@saveTags');
                Route::get('{stay_providers}/addresses ', 'Providers\ProvidersController@addresses');
                Route::post('{stay_providers}/addresses ', 'Providers\ProvidersController@saveAddresses');

                Route::get('/{stay_providers}/{subObjects}', 'Providers\ProvidersController@relatedObjects');
                Route::get('/{stay_providers}', 'Providers\ProvidersController@show');

                Route::post('/', 'Providers\ProvidersController@store');
                Route::post('/{stay_providers}/do/{action}', 'Providers\ProvidersController@doAction');

                Route::patch('/{stay_providers}', 'Providers\ProvidersController@update');
                Route::delete('/{stay_providers}', 'Providers\ProvidersController@destroy');
            }
        );

        Route::prefix('hotels')->group(
            function () {
                Route::get('/', 'Hotels\HotelsController@index');
                Route::get('/actions', 'Hotels\HotelsController@getActions');

                Route::get('{stay_hotels}/tags ', 'Hotels\HotelsController@tags');
                Route::post('{stay_hotels}/tags ', 'Hotels\HotelsController@saveTags');
                Route::get('{stay_hotels}/addresses ', 'Hotels\HotelsController@addresses');
                Route::post('{stay_hotels}/addresses ', 'Hotels\HotelsController@saveAddresses');

                Route::get('/{stay_hotels}/{subObjects}', 'Hotels\HotelsController@relatedObjects');
                Route::get('/{stay_hotels}', 'Hotels\HotelsController@show');

                Route::post('/', 'Hotels\HotelsController@store');
                Route::post('/{stay_hotels}/do/{action}', 'Hotels\HotelsController@doAction');

                Route::patch('/{stay_hotels}', 'Hotels\HotelsController@update');
                Route::delete('/{stay_hotels}', 'Hotels\HotelsController@destroy');
            }
        );

        Route::prefix('room-types')->group(
            function () {
                Route::get('/', 'RoomTypes\RoomTypesController@index');
                Route::get('/actions', 'RoomTypes\RoomTypesController@getActions');

                Route::get('{stay_room_types}/tags ', 'RoomTypes\RoomTypesController@tags');
                Route::post('{stay_room_types}/tags ', 'RoomTypes\RoomTypesController@saveTags');
                Route::get('{stay_room_types}/addresses ', 'RoomTypes\RoomTypesController@addresses');
                Route::post('{stay_room_types}/addresses ', 'RoomTypes\RoomTypesController@saveAddresses');

                Route::get('/{stay_room_types}/{subObjects}', 'RoomTypes\RoomTypesController@relatedObjects');
                Route::get('/{stay_room_types}', 'RoomTypes\RoomTypesController@show');

                Route::post('/', 'RoomTypes\RoomTypesController@store');
                Route::post('/{stay_room_types}/do/{action}', 'RoomTypes\RoomTypesController@doAction');

                Route::patch('/{stay_room_types}', 'RoomTypes\RoomTypesController@update');
                Route::delete('/{stay_room_types}', 'RoomTypes\RoomTypesController@destroy');
            }
        );

        Route::prefix('rooms')->group(
            function () {
                Route::get('/', 'Rooms\RoomsController@index');
                Route::get('/actions', 'Rooms\RoomsController@getActions');

                Route::get('{stay_rooms}/tags ', 'Rooms\RoomsController@tags');
                Route::post('{stay_rooms}/tags ', 'Rooms\RoomsController@saveTags');
                Route::get('{stay_rooms}/addresses ', 'Rooms\RoomsController@addresses');
                Route::post('{stay_rooms}/addresses ', 'Rooms\RoomsController@saveAddresses');

                Route::get('/{stay_rooms}/{subObjects}', 'Rooms\RoomsController@relatedObjects');
                Route::get('/{stay_rooms}', 'Rooms\RoomsController@show');

                Route::post('/', 'Rooms\RoomsController@store');
                Route::post('/{stay_rooms}/do/{action}', 'Rooms\RoomsController@doAction');

                Route::patch('/{stay_rooms}', 'Rooms\RoomsController@update');
                Route::delete('/{stay_rooms}', 'Rooms\RoomsController@destroy');
            }
        );

        Route::prefix('tarif-types')->group(
            function () {
                Route::get('/', 'TarifTypes\TarifTypesController@index');
                Route::get('/actions', 'TarifTypes\TarifTypesController@getActions');

                Route::get('{stay_tarif_types}/tags ', 'TarifTypes\TarifTypesController@tags');
                Route::post('{stay_tarif_types}/tags ', 'TarifTypes\TarifTypesController@saveTags');
                Route::get('{stay_tarif_types}/addresses ', 'TarifTypes\TarifTypesController@addresses');
                Route::post('{stay_tarif_types}/addresses ', 'TarifTypes\TarifTypesController@saveAddresses');

                Route::get('/{stay_tarif_types}/{subObjects}', 'TarifTypes\TarifTypesController@relatedObjects');
                Route::get('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@show');

                Route::post('/', 'TarifTypes\TarifTypesController@store');
                Route::post('/{stay_tarif_types}/do/{action}', 'TarifTypes\TarifTypesController@doAction');

                Route::patch('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@update');
                Route::delete('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@destroy');
            }
        );

        Route::prefix('reservations')->group(
            function () {
                Route::get('/', 'Reservations\ReservationsController@index');
                Route::get('/actions', 'Reservations\ReservationsController@getActions');

                Route::get('{stay_reservations}/tags ', 'Reservations\ReservationsController@tags');
                Route::post('{stay_reservations}/tags ', 'Reservations\ReservationsController@saveTags');
                Route::get('{stay_reservations}/addresses ', 'Reservations\ReservationsController@addresses');
                Route::post('{stay_reservations}/addresses ', 'Reservations\ReservationsController@saveAddresses');

                Route::get('/{stay_reservations}/{subObjects}', 'Reservations\ReservationsController@relatedObjects');
                Route::get('/{stay_reservations}', 'Reservations\ReservationsController@show');

                Route::post('/', 'Reservations\ReservationsController@store');
                Route::post('/{stay_reservations}/do/{action}', 'Reservations\ReservationsController@doAction');

                Route::patch('/{stay_reservations}', 'Reservations\ReservationsController@update');
                Route::delete('/{stay_reservations}', 'Reservations\ReservationsController@destroy');
            }
        );

        Route::prefix('main-purchase-contracts')->group(
            function () {
                Route::get('/', 'MainPurchaseContracts\MainPurchaseContractsController@index');
                Route::get('/actions', 'MainPurchaseContracts\MainPurchaseContractsController@getActions');

                Route::get('{stay_main_purchase_contracts}/tags ', 'MainPurchaseContracts\MainPurchaseContractsController@tags');
                Route::post('{stay_main_purchase_contracts}/tags ', 'MainPurchaseContracts\MainPurchaseContractsController@saveTags');
                Route::get('{stay_main_purchase_contracts}/addresses ', 'MainPurchaseContracts\MainPurchaseContractsController@addresses');
                Route::post('{stay_main_purchase_contracts}/addresses ', 'MainPurchaseContracts\MainPurchaseContractsController@saveAddresses');

                Route::get('/{stay_main_purchase_contracts}/{subObjects}', 'MainPurchaseContracts\MainPurchaseContractsController@relatedObjects');
                Route::get('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@show');

                Route::post('/', 'MainPurchaseContracts\MainPurchaseContractsController@store');
                Route::post('/{stay_main_purchase_contracts}/do/{action}', 'MainPurchaseContracts\MainPurchaseContractsController@doAction');

                Route::patch('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@update');
                Route::delete('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@destroy');
            }
        );

        Route::prefix('sales-contracts')->group(
            function () {
                Route::get('/', 'SalesContracts\SalesContractsController@index');
                Route::get('/actions', 'SalesContracts\SalesContractsController@getActions');

                Route::get('{stay_sales_contracts}/tags ', 'SalesContracts\SalesContractsController@tags');
                Route::post('{stay_sales_contracts}/tags ', 'SalesContracts\SalesContractsController@saveTags');
                Route::get('{stay_sales_contracts}/addresses ', 'SalesContracts\SalesContractsController@addresses');
                Route::post('{stay_sales_contracts}/addresses ', 'SalesContracts\SalesContractsController@saveAddresses');

                Route::get('/{stay_sales_contracts}/{subObjects}', 'SalesContracts\SalesContractsController@relatedObjects');
                Route::get('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@show');

                Route::post('/', 'SalesContracts\SalesContractsController@store');
                Route::post('/{stay_sales_contracts}/do/{action}', 'SalesContracts\SalesContractsController@doAction');

                Route::patch('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@update');
                Route::delete('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@destroy');
            }
        );

        Route::prefix('quota-contracts')->group(
            function () {
                Route::get('/', 'QuotaContracts\QuotaContractsController@index');
                Route::get('/actions', 'QuotaContracts\QuotaContractsController@getActions');

                Route::get('{stay_quota_contracts}/tags ', 'QuotaContracts\QuotaContractsController@tags');
                Route::post('{stay_quota_contracts}/tags ', 'QuotaContracts\QuotaContractsController@saveTags');
                Route::get('{stay_quota_contracts}/addresses ', 'QuotaContracts\QuotaContractsController@addresses');
                Route::post('{stay_quota_contracts}/addresses ', 'QuotaContracts\QuotaContractsController@saveAddresses');

                Route::get('/{stay_quota_contracts}/{subObjects}', 'QuotaContracts\QuotaContractsController@relatedObjects');
                Route::get('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@show');

                Route::post('/', 'QuotaContracts\QuotaContractsController@store');
                Route::post('/{stay_quota_contracts}/do/{action}', 'QuotaContracts\QuotaContractsController@doAction');

                Route::patch('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@update');
                Route::delete('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@destroy');
            }
        );

        Route::prefix('hotel-contracts')->group(
            function () {
                Route::get('/', 'HotelContracts\HotelContractsController@index');
                Route::get('/actions', 'HotelContracts\HotelContractsController@getActions');

                Route::get('{stay_hotel_contracts}/tags ', 'HotelContracts\HotelContractsController@tags');
                Route::post('{stay_hotel_contracts}/tags ', 'HotelContracts\HotelContractsController@saveTags');
                Route::get('{stay_hotel_contracts}/addresses ', 'HotelContracts\HotelContractsController@addresses');
                Route::post('{stay_hotel_contracts}/addresses ', 'HotelContracts\HotelContractsController@saveAddresses');

                Route::get('/{stay_hotel_contracts}/{subObjects}', 'HotelContracts\HotelContractsController@relatedObjects');
                Route::get('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@show');

                Route::post('/', 'HotelContracts\HotelContractsController@store');
                Route::post('/{stay_hotel_contracts}/do/{action}', 'HotelContracts\HotelContractsController@doAction');

                Route::patch('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@update');
                Route::delete('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@destroy');
            }
        );

        Route::prefix('rates')->group(
            function () {
                Route::get('/', 'Rates\RatesController@index');
                Route::get('/actions', 'Rates\RatesController@getActions');

                Route::get('{stay_rates}/tags ', 'Rates\RatesController@tags');
                Route::post('{stay_rates}/tags ', 'Rates\RatesController@saveTags');
                Route::get('{stay_rates}/addresses ', 'Rates\RatesController@addresses');
                Route::post('{stay_rates}/addresses ', 'Rates\RatesController@saveAddresses');

                Route::get('/{stay_rates}/{subObjects}', 'Rates\RatesController@relatedObjects');
                Route::get('/{stay_rates}', 'Rates\RatesController@show');

                Route::post('/', 'Rates\RatesController@store');
                Route::post('/{stay_rates}/do/{action}', 'Rates\RatesController@doAction');

                Route::patch('/{stay_rates}', 'Rates\RatesController@update');
                Route::delete('/{stay_rates}', 'Rates\RatesController@destroy');
            }
        );

        Route::prefix('rate-prices')->group(
            function () {
                Route::get('/', 'RatePrices\RatePricesController@index');
                Route::get('/actions', 'RatePrices\RatePricesController@getActions');

                Route::get('{stay_rate_prices}/tags ', 'RatePrices\RatePricesController@tags');
                Route::post('{stay_rate_prices}/tags ', 'RatePrices\RatePricesController@saveTags');
                Route::get('{stay_rate_prices}/addresses ', 'RatePrices\RatePricesController@addresses');
                Route::post('{stay_rate_prices}/addresses ', 'RatePrices\RatePricesController@saveAddresses');

                Route::get('/{stay_rate_prices}/{subObjects}', 'RatePrices\RatePricesController@relatedObjects');
                Route::get('/{stay_rate_prices}', 'RatePrices\RatePricesController@show');

                Route::post('/', 'RatePrices\RatePricesController@store');
                Route::post('/{stay_rate_prices}/do/{action}', 'RatePrices\RatePricesController@doAction');

                Route::patch('/{stay_rate_prices}', 'RatePrices\RatePricesController@update');
                Route::delete('/{stay_rate_prices}', 'RatePrices\RatePricesController@destroy');
            }
        );

        Route::prefix('room-type-provider-mappings')->group(
            function () {
                Route::get('/', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@index');
                Route::get('/actions', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@getActions');

                Route::get('{stay_room_type_provider_mappings}/tags ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@tags');
                Route::post('{stay_room_type_provider_mappings}/tags ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@saveTags');
                Route::get('{stay_room_type_provider_mappings}/addresses ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@addresses');
                Route::post('{stay_room_type_provider_mappings}/addresses ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@saveAddresses');

                Route::get('/{stay_room_type_provider_mappings}/{subObjects}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@relatedObjects');
                Route::get('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@show');

                Route::post('/', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@store');
                Route::post('/{stay_room_type_provider_mappings}/do/{action}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@doAction');

                Route::patch('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@update');
                Route::delete('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@destroy');
            }
        );

        Route::prefix('hotel-consumer-mappings')->group(
            function () {
                Route::get('/', 'HotelConsumerMappings\HotelConsumerMappingsController@index');
                Route::get('/actions', 'HotelConsumerMappings\HotelConsumerMappingsController@getActions');

                Route::get('{stay_hotel_consumer_mappings}/tags ', 'HotelConsumerMappings\HotelConsumerMappingsController@tags');
                Route::post('{stay_hotel_consumer_mappings}/tags ', 'HotelConsumerMappings\HotelConsumerMappingsController@saveTags');
                Route::get('{stay_hotel_consumer_mappings}/addresses ', 'HotelConsumerMappings\HotelConsumerMappingsController@addresses');
                Route::post('{stay_hotel_consumer_mappings}/addresses ', 'HotelConsumerMappings\HotelConsumerMappingsController@saveAddresses');

                Route::get('/{stay_hotel_consumer_mappings}/{subObjects}', 'HotelConsumerMappings\HotelConsumerMappingsController@relatedObjects');
                Route::get('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@show');

                Route::post('/', 'HotelConsumerMappings\HotelConsumerMappingsController@store');
                Route::post('/{stay_hotel_consumer_mappings}/do/{action}', 'HotelConsumerMappings\HotelConsumerMappingsController@doAction');

                Route::patch('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@update');
                Route::delete('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@destroy');
            }
        );

        Route::prefix('consumers')->group(
            function () {
                Route::get('/', 'Consumers\ConsumersController@index');
                Route::get('/actions', 'Consumers\ConsumersController@getActions');

                Route::get('{stay_consumers}/tags ', 'Consumers\ConsumersController@tags');
                Route::post('{stay_consumers}/tags ', 'Consumers\ConsumersController@saveTags');
                Route::get('{stay_consumers}/addresses ', 'Consumers\ConsumersController@addresses');
                Route::post('{stay_consumers}/addresses ', 'Consumers\ConsumersController@saveAddresses');

                Route::get('/{stay_consumers}/{subObjects}', 'Consumers\ConsumersController@relatedObjects');
                Route::get('/{stay_consumers}', 'Consumers\ConsumersController@show');

                Route::post('/', 'Consumers\ConsumersController@store');
                Route::post('/{stay_consumers}/do/{action}', 'Consumers\ConsumersController@doAction');

                Route::patch('/{stay_consumers}', 'Consumers\ConsumersController@update');
                Route::delete('/{stay_consumers}', 'Consumers\ConsumersController@destroy');
            }
        );

        Route::prefix('room-type-consumer-mappings')->group(
            function () {
                Route::get('/', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@index');
                Route::get('/actions', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@getActions');

                Route::get('{stay_room_type_consumer_mappings}/tags ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@tags');
                Route::post('{stay_room_type_consumer_mappings}/tags ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@saveTags');
                Route::get('{stay_room_type_consumer_mappings}/addresses ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@addresses');
                Route::post('{stay_room_type_consumer_mappings}/addresses ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@saveAddresses');

                Route::get('/{stay_room_type_consumer_mappings}/{subObjects}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@relatedObjects');
                Route::get('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@show');

                Route::post('/', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@store');
                Route::post('/{stay_room_type_consumer_mappings}/do/{action}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@doAction');

                Route::patch('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@update');
                Route::delete('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@destroy');
            }
        );

        Route::prefix('hotel-provider-mappings')->group(
            function () {
                Route::get('/', 'HotelProviderMappings\HotelProviderMappingsController@index');
                Route::get('/actions', 'HotelProviderMappings\HotelProviderMappingsController@getActions');

                Route::get('{stay_hotel_provider_mappings}/tags ', 'HotelProviderMappings\HotelProviderMappingsController@tags');
                Route::post('{stay_hotel_provider_mappings}/tags ', 'HotelProviderMappings\HotelProviderMappingsController@saveTags');
                Route::get('{stay_hotel_provider_mappings}/addresses ', 'HotelProviderMappings\HotelProviderMappingsController@addresses');
                Route::post('{stay_hotel_provider_mappings}/addresses ', 'HotelProviderMappings\HotelProviderMappingsController@saveAddresses');

                Route::get('/{stay_hotel_provider_mappings}/{subObjects}', 'HotelProviderMappings\HotelProviderMappingsController@relatedObjects');
                Route::get('/{stay_hotel_provider_mappings}', 'HotelProviderMappings\HotelProviderMappingsController@show');

                Route::post('/', 'HotelProviderMappings\HotelProviderMappingsController@store');
                Route::post('/{stay_hotel_provider_mappings}/do/{action}', 'HotelProviderMappings\HotelProviderMappingsController@doAction');

                Route::patch('/{stay_hotel_provider_mappings}', 'HotelProviderMappings\HotelProviderMappingsController@update');
                Route::delete('/{stay_hotel_provider_mappings}', 'HotelProviderMappings\HotelProviderMappingsController@destroy');
            }
        );

        Route::prefix('agency-groups')->group(
            function () {
                Route::get('/', 'AgencyGroups\AgencyGroupsController@index');
                Route::get('/actions', 'AgencyGroups\AgencyGroupsController@getActions');

                Route::get('{stay_agency_groups}/tags ', 'AgencyGroups\AgencyGroupsController@tags');
                Route::post('{stay_agency_groups}/tags ', 'AgencyGroups\AgencyGroupsController@saveTags');
                Route::get('{stay_agency_groups}/addresses ', 'AgencyGroups\AgencyGroupsController@addresses');
                Route::post('{stay_agency_groups}/addresses ', 'AgencyGroups\AgencyGroupsController@saveAddresses');

                Route::get('/{stay_agency_groups}/{subObjects}', 'AgencyGroups\AgencyGroupsController@relatedObjects');
                Route::get('/{stay_agency_groups}', 'AgencyGroups\AgencyGroupsController@show');

                Route::post('/', 'AgencyGroups\AgencyGroupsController@store');
                Route::post('/{stay_agency_groups}/do/{action}', 'AgencyGroups\AgencyGroupsController@doAction');

                Route::patch('/{stay_agency_groups}', 'AgencyGroups\AgencyGroupsController@update');
                Route::delete('/{stay_agency_groups}', 'AgencyGroups\AgencyGroupsController@destroy');
            }
        );

        Route::prefix('cancellation-policies')->group(
            function () {
                Route::get('/', 'CancellationPolicies\CancellationPoliciesController@index');
                Route::get('/actions', 'CancellationPolicies\CancellationPoliciesController@getActions');

                Route::get('{stay_cancellation_policies}/tags ', 'CancellationPolicies\CancellationPoliciesController@tags');
                Route::post('{stay_cancellation_policies}/tags ', 'CancellationPolicies\CancellationPoliciesController@saveTags');
                Route::get('{stay_cancellation_policies}/addresses ', 'CancellationPolicies\CancellationPoliciesController@addresses');
                Route::post('{stay_cancellation_policies}/addresses ', 'CancellationPolicies\CancellationPoliciesController@saveAddresses');

                Route::get('/{stay_cancellation_policies}/{subObjects}', 'CancellationPolicies\CancellationPoliciesController@relatedObjects');
                Route::get('/{stay_cancellation_policies}', 'CancellationPolicies\CancellationPoliciesController@show');

                Route::post('/', 'CancellationPolicies\CancellationPoliciesController@store');
                Route::post('/{stay_cancellation_policies}/do/{action}', 'CancellationPolicies\CancellationPoliciesController@doAction');

                Route::patch('/{stay_cancellation_policies}', 'CancellationPolicies\CancellationPoliciesController@update');
                Route::delete('/{stay_cancellation_policies}', 'CancellationPolicies\CancellationPoliciesController@destroy');
            }
        );

        Route::prefix('cancellation-policy-dates')->group(
            function () {
                Route::get('/', 'CancellationPolicyDates\CancellationPolicyDatesController@index');
                Route::get('/actions', 'CancellationPolicyDates\CancellationPolicyDatesController@getActions');

                Route::get('{stay_cancellation_policy_dates}/tags ', 'CancellationPolicyDates\CancellationPolicyDatesController@tags');
                Route::post('{stay_cancellation_policy_dates}/tags ', 'CancellationPolicyDates\CancellationPolicyDatesController@saveTags');
                Route::get('{stay_cancellation_policy_dates}/addresses ', 'CancellationPolicyDates\CancellationPolicyDatesController@addresses');
                Route::post('{stay_cancellation_policy_dates}/addresses ', 'CancellationPolicyDates\CancellationPolicyDatesController@saveAddresses');

                Route::get('/{stay_cancellation_policy_dates}/{subObjects}', 'CancellationPolicyDates\CancellationPolicyDatesController@relatedObjects');
                Route::get('/{stay_cancellation_policy_dates}', 'CancellationPolicyDates\CancellationPolicyDatesController@show');

                Route::post('/', 'CancellationPolicyDates\CancellationPolicyDatesController@store');
                Route::post('/{stay_cancellation_policy_dates}/do/{action}', 'CancellationPolicyDates\CancellationPolicyDatesController@doAction');

                Route::patch('/{stay_cancellation_policy_dates}', 'CancellationPolicyDates\CancellationPolicyDatesController@update');
                Route::delete('/{stay_cancellation_policy_dates}', 'CancellationPolicyDates\CancellationPolicyDatesController@destroy');
            }
        );

        Route::prefix('providers')->group(
            function () {
                Route::get('/', 'Providers\ProvidersController@index');
                Route::get('/actions', 'Providers\ProvidersController@getActions');

                Route::get('{stay_providers}/tags ', 'Providers\ProvidersController@tags');
                Route::post('{stay_providers}/tags ', 'Providers\ProvidersController@saveTags');
                Route::get('{stay_providers}/addresses ', 'Providers\ProvidersController@addresses');
                Route::post('{stay_providers}/addresses ', 'Providers\ProvidersController@saveAddresses');

                Route::get('/{stay_providers}/{subObjects}', 'Providers\ProvidersController@relatedObjects');
                Route::get('/{stay_providers}', 'Providers\ProvidersController@show');

                Route::post('/', 'Providers\ProvidersController@store');
                Route::post('/{stay_providers}/do/{action}', 'Providers\ProvidersController@doAction');

                Route::patch('/{stay_providers}', 'Providers\ProvidersController@update');
                Route::delete('/{stay_providers}', 'Providers\ProvidersController@destroy');
            }
        );

        Route::prefix('hotels')->group(
            function () {
                Route::get('/', 'Hotels\HotelsController@index');
                Route::get('/actions', 'Hotels\HotelsController@getActions');

                Route::get('{stay_hotels}/tags ', 'Hotels\HotelsController@tags');
                Route::post('{stay_hotels}/tags ', 'Hotels\HotelsController@saveTags');
                Route::get('{stay_hotels}/addresses ', 'Hotels\HotelsController@addresses');
                Route::post('{stay_hotels}/addresses ', 'Hotels\HotelsController@saveAddresses');

                Route::get('/{stay_hotels}/{subObjects}', 'Hotels\HotelsController@relatedObjects');
                Route::get('/{stay_hotels}', 'Hotels\HotelsController@show');

                Route::post('/', 'Hotels\HotelsController@store');
                Route::post('/{stay_hotels}/do/{action}', 'Hotels\HotelsController@doAction');

                Route::patch('/{stay_hotels}', 'Hotels\HotelsController@update');
                Route::delete('/{stay_hotels}', 'Hotels\HotelsController@destroy');
            }
        );

        Route::prefix('room-types')->group(
            function () {
                Route::get('/', 'RoomTypes\RoomTypesController@index');
                Route::get('/actions', 'RoomTypes\RoomTypesController@getActions');

                Route::get('{stay_room_types}/tags ', 'RoomTypes\RoomTypesController@tags');
                Route::post('{stay_room_types}/tags ', 'RoomTypes\RoomTypesController@saveTags');
                Route::get('{stay_room_types}/addresses ', 'RoomTypes\RoomTypesController@addresses');
                Route::post('{stay_room_types}/addresses ', 'RoomTypes\RoomTypesController@saveAddresses');

                Route::get('/{stay_room_types}/{subObjects}', 'RoomTypes\RoomTypesController@relatedObjects');
                Route::get('/{stay_room_types}', 'RoomTypes\RoomTypesController@show');

                Route::post('/', 'RoomTypes\RoomTypesController@store');
                Route::post('/{stay_room_types}/do/{action}', 'RoomTypes\RoomTypesController@doAction');

                Route::patch('/{stay_room_types}', 'RoomTypes\RoomTypesController@update');
                Route::delete('/{stay_room_types}', 'RoomTypes\RoomTypesController@destroy');
            }
        );

        Route::prefix('rooms')->group(
            function () {
                Route::get('/', 'Rooms\RoomsController@index');
                Route::get('/actions', 'Rooms\RoomsController@getActions');

                Route::get('{stay_rooms}/tags ', 'Rooms\RoomsController@tags');
                Route::post('{stay_rooms}/tags ', 'Rooms\RoomsController@saveTags');
                Route::get('{stay_rooms}/addresses ', 'Rooms\RoomsController@addresses');
                Route::post('{stay_rooms}/addresses ', 'Rooms\RoomsController@saveAddresses');

                Route::get('/{stay_rooms}/{subObjects}', 'Rooms\RoomsController@relatedObjects');
                Route::get('/{stay_rooms}', 'Rooms\RoomsController@show');

                Route::post('/', 'Rooms\RoomsController@store');
                Route::post('/{stay_rooms}/do/{action}', 'Rooms\RoomsController@doAction');

                Route::patch('/{stay_rooms}', 'Rooms\RoomsController@update');
                Route::delete('/{stay_rooms}', 'Rooms\RoomsController@destroy');
            }
        );

        Route::prefix('tarif-types')->group(
            function () {
                Route::get('/', 'TarifTypes\TarifTypesController@index');
                Route::get('/actions', 'TarifTypes\TarifTypesController@getActions');

                Route::get('{stay_tarif_types}/tags ', 'TarifTypes\TarifTypesController@tags');
                Route::post('{stay_tarif_types}/tags ', 'TarifTypes\TarifTypesController@saveTags');
                Route::get('{stay_tarif_types}/addresses ', 'TarifTypes\TarifTypesController@addresses');
                Route::post('{stay_tarif_types}/addresses ', 'TarifTypes\TarifTypesController@saveAddresses');

                Route::get('/{stay_tarif_types}/{subObjects}', 'TarifTypes\TarifTypesController@relatedObjects');
                Route::get('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@show');

                Route::post('/', 'TarifTypes\TarifTypesController@store');
                Route::post('/{stay_tarif_types}/do/{action}', 'TarifTypes\TarifTypesController@doAction');

                Route::patch('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@update');
                Route::delete('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@destroy');
            }
        );

        Route::prefix('reservations')->group(
            function () {
                Route::get('/', 'Reservations\ReservationsController@index');
                Route::get('/actions', 'Reservations\ReservationsController@getActions');

                Route::get('{stay_reservations}/tags ', 'Reservations\ReservationsController@tags');
                Route::post('{stay_reservations}/tags ', 'Reservations\ReservationsController@saveTags');
                Route::get('{stay_reservations}/addresses ', 'Reservations\ReservationsController@addresses');
                Route::post('{stay_reservations}/addresses ', 'Reservations\ReservationsController@saveAddresses');

                Route::get('/{stay_reservations}/{subObjects}', 'Reservations\ReservationsController@relatedObjects');
                Route::get('/{stay_reservations}', 'Reservations\ReservationsController@show');

                Route::post('/', 'Reservations\ReservationsController@store');
                Route::post('/{stay_reservations}/do/{action}', 'Reservations\ReservationsController@doAction');

                Route::patch('/{stay_reservations}', 'Reservations\ReservationsController@update');
                Route::delete('/{stay_reservations}', 'Reservations\ReservationsController@destroy');
            }
        );

        Route::prefix('main-purchase-contracts')->group(
            function () {
                Route::get('/', 'MainPurchaseContracts\MainPurchaseContractsController@index');
                Route::get('/actions', 'MainPurchaseContracts\MainPurchaseContractsController@getActions');

                Route::get('{stay_main_purchase_contracts}/tags ', 'MainPurchaseContracts\MainPurchaseContractsController@tags');
                Route::post('{stay_main_purchase_contracts}/tags ', 'MainPurchaseContracts\MainPurchaseContractsController@saveTags');
                Route::get('{stay_main_purchase_contracts}/addresses ', 'MainPurchaseContracts\MainPurchaseContractsController@addresses');
                Route::post('{stay_main_purchase_contracts}/addresses ', 'MainPurchaseContracts\MainPurchaseContractsController@saveAddresses');

                Route::get('/{stay_main_purchase_contracts}/{subObjects}', 'MainPurchaseContracts\MainPurchaseContractsController@relatedObjects');
                Route::get('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@show');

                Route::post('/', 'MainPurchaseContracts\MainPurchaseContractsController@store');
                Route::post('/{stay_main_purchase_contracts}/do/{action}', 'MainPurchaseContracts\MainPurchaseContractsController@doAction');

                Route::patch('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@update');
                Route::delete('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@destroy');
            }
        );

        Route::prefix('sales-contracts')->group(
            function () {
                Route::get('/', 'SalesContracts\SalesContractsController@index');
                Route::get('/actions', 'SalesContracts\SalesContractsController@getActions');

                Route::get('{stay_sales_contracts}/tags ', 'SalesContracts\SalesContractsController@tags');
                Route::post('{stay_sales_contracts}/tags ', 'SalesContracts\SalesContractsController@saveTags');
                Route::get('{stay_sales_contracts}/addresses ', 'SalesContracts\SalesContractsController@addresses');
                Route::post('{stay_sales_contracts}/addresses ', 'SalesContracts\SalesContractsController@saveAddresses');

                Route::get('/{stay_sales_contracts}/{subObjects}', 'SalesContracts\SalesContractsController@relatedObjects');
                Route::get('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@show');

                Route::post('/', 'SalesContracts\SalesContractsController@store');
                Route::post('/{stay_sales_contracts}/do/{action}', 'SalesContracts\SalesContractsController@doAction');

                Route::patch('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@update');
                Route::delete('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@destroy');
            }
        );

        Route::prefix('quota-contracts')->group(
            function () {
                Route::get('/', 'QuotaContracts\QuotaContractsController@index');
                Route::get('/actions', 'QuotaContracts\QuotaContractsController@getActions');

                Route::get('{stay_quota_contracts}/tags ', 'QuotaContracts\QuotaContractsController@tags');
                Route::post('{stay_quota_contracts}/tags ', 'QuotaContracts\QuotaContractsController@saveTags');
                Route::get('{stay_quota_contracts}/addresses ', 'QuotaContracts\QuotaContractsController@addresses');
                Route::post('{stay_quota_contracts}/addresses ', 'QuotaContracts\QuotaContractsController@saveAddresses');

                Route::get('/{stay_quota_contracts}/{subObjects}', 'QuotaContracts\QuotaContractsController@relatedObjects');
                Route::get('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@show');

                Route::post('/', 'QuotaContracts\QuotaContractsController@store');
                Route::post('/{stay_quota_contracts}/do/{action}', 'QuotaContracts\QuotaContractsController@doAction');

                Route::patch('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@update');
                Route::delete('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@destroy');
            }
        );

        Route::prefix('hotel-contracts')->group(
            function () {
                Route::get('/', 'HotelContracts\HotelContractsController@index');
                Route::get('/actions', 'HotelContracts\HotelContractsController@getActions');

                Route::get('{stay_hotel_contracts}/tags ', 'HotelContracts\HotelContractsController@tags');
                Route::post('{stay_hotel_contracts}/tags ', 'HotelContracts\HotelContractsController@saveTags');
                Route::get('{stay_hotel_contracts}/addresses ', 'HotelContracts\HotelContractsController@addresses');
                Route::post('{stay_hotel_contracts}/addresses ', 'HotelContracts\HotelContractsController@saveAddresses');

                Route::get('/{stay_hotel_contracts}/{subObjects}', 'HotelContracts\HotelContractsController@relatedObjects');
                Route::get('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@show');

                Route::post('/', 'HotelContracts\HotelContractsController@store');
                Route::post('/{stay_hotel_contracts}/do/{action}', 'HotelContracts\HotelContractsController@doAction');

                Route::patch('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@update');
                Route::delete('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@destroy');
            }
        );

        Route::prefix('rates')->group(
            function () {
                Route::get('/', 'Rates\RatesController@index');
                Route::get('/actions', 'Rates\RatesController@getActions');

                Route::get('{stay_rates}/tags ', 'Rates\RatesController@tags');
                Route::post('{stay_rates}/tags ', 'Rates\RatesController@saveTags');
                Route::get('{stay_rates}/addresses ', 'Rates\RatesController@addresses');
                Route::post('{stay_rates}/addresses ', 'Rates\RatesController@saveAddresses');

                Route::get('/{stay_rates}/{subObjects}', 'Rates\RatesController@relatedObjects');
                Route::get('/{stay_rates}', 'Rates\RatesController@show');

                Route::post('/', 'Rates\RatesController@store');
                Route::post('/{stay_rates}/do/{action}', 'Rates\RatesController@doAction');

                Route::patch('/{stay_rates}', 'Rates\RatesController@update');
                Route::delete('/{stay_rates}', 'Rates\RatesController@destroy');
            }
        );

        Route::prefix('rate-prices')->group(
            function () {
                Route::get('/', 'RatePrices\RatePricesController@index');
                Route::get('/actions', 'RatePrices\RatePricesController@getActions');

                Route::get('{stay_rate_prices}/tags ', 'RatePrices\RatePricesController@tags');
                Route::post('{stay_rate_prices}/tags ', 'RatePrices\RatePricesController@saveTags');
                Route::get('{stay_rate_prices}/addresses ', 'RatePrices\RatePricesController@addresses');
                Route::post('{stay_rate_prices}/addresses ', 'RatePrices\RatePricesController@saveAddresses');

                Route::get('/{stay_rate_prices}/{subObjects}', 'RatePrices\RatePricesController@relatedObjects');
                Route::get('/{stay_rate_prices}', 'RatePrices\RatePricesController@show');

                Route::post('/', 'RatePrices\RatePricesController@store');
                Route::post('/{stay_rate_prices}/do/{action}', 'RatePrices\RatePricesController@doAction');

                Route::patch('/{stay_rate_prices}', 'RatePrices\RatePricesController@update');
                Route::delete('/{stay_rate_prices}', 'RatePrices\RatePricesController@destroy');
            }
        );

        Route::prefix('room-type-provider-mappings')->group(
            function () {
                Route::get('/', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@index');
                Route::get('/actions', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@getActions');

                Route::get('{stay_room_type_provider_mappings}/tags ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@tags');
                Route::post('{stay_room_type_provider_mappings}/tags ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@saveTags');
                Route::get('{stay_room_type_provider_mappings}/addresses ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@addresses');
                Route::post('{stay_room_type_provider_mappings}/addresses ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@saveAddresses');

                Route::get('/{stay_room_type_provider_mappings}/{subObjects}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@relatedObjects');
                Route::get('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@show');

                Route::post('/', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@store');
                Route::post('/{stay_room_type_provider_mappings}/do/{action}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@doAction');

                Route::patch('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@update');
                Route::delete('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@destroy');
            }
        );

        Route::prefix('hotel-consumer-mappings')->group(
            function () {
                Route::get('/', 'HotelConsumerMappings\HotelConsumerMappingsController@index');
                Route::get('/actions', 'HotelConsumerMappings\HotelConsumerMappingsController@getActions');

                Route::get('{stay_hotel_consumer_mappings}/tags ', 'HotelConsumerMappings\HotelConsumerMappingsController@tags');
                Route::post('{stay_hotel_consumer_mappings}/tags ', 'HotelConsumerMappings\HotelConsumerMappingsController@saveTags');
                Route::get('{stay_hotel_consumer_mappings}/addresses ', 'HotelConsumerMappings\HotelConsumerMappingsController@addresses');
                Route::post('{stay_hotel_consumer_mappings}/addresses ', 'HotelConsumerMappings\HotelConsumerMappingsController@saveAddresses');

                Route::get('/{stay_hotel_consumer_mappings}/{subObjects}', 'HotelConsumerMappings\HotelConsumerMappingsController@relatedObjects');
                Route::get('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@show');

                Route::post('/', 'HotelConsumerMappings\HotelConsumerMappingsController@store');
                Route::post('/{stay_hotel_consumer_mappings}/do/{action}', 'HotelConsumerMappings\HotelConsumerMappingsController@doAction');

                Route::patch('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@update');
                Route::delete('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@destroy');
            }
        );

        Route::prefix('consumers')->group(
            function () {
                Route::get('/', 'Consumers\ConsumersController@index');
                Route::get('/actions', 'Consumers\ConsumersController@getActions');

                Route::get('{stay_consumers}/tags ', 'Consumers\ConsumersController@tags');
                Route::post('{stay_consumers}/tags ', 'Consumers\ConsumersController@saveTags');
                Route::get('{stay_consumers}/addresses ', 'Consumers\ConsumersController@addresses');
                Route::post('{stay_consumers}/addresses ', 'Consumers\ConsumersController@saveAddresses');

                Route::get('/{stay_consumers}/{subObjects}', 'Consumers\ConsumersController@relatedObjects');
                Route::get('/{stay_consumers}', 'Consumers\ConsumersController@show');

                Route::post('/', 'Consumers\ConsumersController@store');
                Route::post('/{stay_consumers}/do/{action}', 'Consumers\ConsumersController@doAction');

                Route::patch('/{stay_consumers}', 'Consumers\ConsumersController@update');
                Route::delete('/{stay_consumers}', 'Consumers\ConsumersController@destroy');
            }
        );

        Route::prefix('room-type-consumer-mappings')->group(
            function () {
                Route::get('/', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@index');
                Route::get('/actions', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@getActions');

                Route::get('{stay_room_type_consumer_mappings}/tags ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@tags');
                Route::post('{stay_room_type_consumer_mappings}/tags ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@saveTags');
                Route::get('{stay_room_type_consumer_mappings}/addresses ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@addresses');
                Route::post('{stay_room_type_consumer_mappings}/addresses ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@saveAddresses');

                Route::get('/{stay_room_type_consumer_mappings}/{subObjects}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@relatedObjects');
                Route::get('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@show');

                Route::post('/', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@store');
                Route::post('/{stay_room_type_consumer_mappings}/do/{action}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@doAction');

                Route::patch('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@update');
                Route::delete('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@destroy');
            }
        );

        Route::prefix('hotel-provider-mappings')->group(
            function () {
                Route::get('/', 'HotelProviderMappings\HotelProviderMappingsController@index');
                Route::get('/actions', 'HotelProviderMappings\HotelProviderMappingsController@getActions');

                Route::get('{stay_hotel_provider_mappings}/tags ', 'HotelProviderMappings\HotelProviderMappingsController@tags');
                Route::post('{stay_hotel_provider_mappings}/tags ', 'HotelProviderMappings\HotelProviderMappingsController@saveTags');
                Route::get('{stay_hotel_provider_mappings}/addresses ', 'HotelProviderMappings\HotelProviderMappingsController@addresses');
                Route::post('{stay_hotel_provider_mappings}/addresses ', 'HotelProviderMappings\HotelProviderMappingsController@saveAddresses');

                Route::get('/{stay_hotel_provider_mappings}/{subObjects}', 'HotelProviderMappings\HotelProviderMappingsController@relatedObjects');
                Route::get('/{stay_hotel_provider_mappings}', 'HotelProviderMappings\HotelProviderMappingsController@show');

                Route::post('/', 'HotelProviderMappings\HotelProviderMappingsController@store');
                Route::post('/{stay_hotel_provider_mappings}/do/{action}', 'HotelProviderMappings\HotelProviderMappingsController@doAction');

                Route::patch('/{stay_hotel_provider_mappings}', 'HotelProviderMappings\HotelProviderMappingsController@update');
                Route::delete('/{stay_hotel_provider_mappings}', 'HotelProviderMappings\HotelProviderMappingsController@destroy');
            }
        );

        Route::prefix('agency-groups')->group(
            function () {
                Route::get('/', 'AgencyGroups\AgencyGroupsController@index');
                Route::get('/actions', 'AgencyGroups\AgencyGroupsController@getActions');

                Route::get('{stay_agency_groups}/tags ', 'AgencyGroups\AgencyGroupsController@tags');
                Route::post('{stay_agency_groups}/tags ', 'AgencyGroups\AgencyGroupsController@saveTags');
                Route::get('{stay_agency_groups}/addresses ', 'AgencyGroups\AgencyGroupsController@addresses');
                Route::post('{stay_agency_groups}/addresses ', 'AgencyGroups\AgencyGroupsController@saveAddresses');

                Route::get('/{stay_agency_groups}/{subObjects}', 'AgencyGroups\AgencyGroupsController@relatedObjects');
                Route::get('/{stay_agency_groups}', 'AgencyGroups\AgencyGroupsController@show');

                Route::post('/', 'AgencyGroups\AgencyGroupsController@store');
                Route::post('/{stay_agency_groups}/do/{action}', 'AgencyGroups\AgencyGroupsController@doAction');

                Route::patch('/{stay_agency_groups}', 'AgencyGroups\AgencyGroupsController@update');
                Route::delete('/{stay_agency_groups}', 'AgencyGroups\AgencyGroupsController@destroy');
            }
        );

        Route::prefix('cancellation-policies')->group(
            function () {
                Route::get('/', 'CancellationPolicies\CancellationPoliciesController@index');
                Route::get('/actions', 'CancellationPolicies\CancellationPoliciesController@getActions');

                Route::get('{stay_cancellation_policies}/tags ', 'CancellationPolicies\CancellationPoliciesController@tags');
                Route::post('{stay_cancellation_policies}/tags ', 'CancellationPolicies\CancellationPoliciesController@saveTags');
                Route::get('{stay_cancellation_policies}/addresses ', 'CancellationPolicies\CancellationPoliciesController@addresses');
                Route::post('{stay_cancellation_policies}/addresses ', 'CancellationPolicies\CancellationPoliciesController@saveAddresses');

                Route::get('/{stay_cancellation_policies}/{subObjects}', 'CancellationPolicies\CancellationPoliciesController@relatedObjects');
                Route::get('/{stay_cancellation_policies}', 'CancellationPolicies\CancellationPoliciesController@show');

                Route::post('/', 'CancellationPolicies\CancellationPoliciesController@store');
                Route::post('/{stay_cancellation_policies}/do/{action}', 'CancellationPolicies\CancellationPoliciesController@doAction');

                Route::patch('/{stay_cancellation_policies}', 'CancellationPolicies\CancellationPoliciesController@update');
                Route::delete('/{stay_cancellation_policies}', 'CancellationPolicies\CancellationPoliciesController@destroy');
            }
        );

        Route::prefix('cancellation-policy-dates')->group(
            function () {
                Route::get('/', 'CancellationPolicyDates\CancellationPolicyDatesController@index');
                Route::get('/actions', 'CancellationPolicyDates\CancellationPolicyDatesController@getActions');

                Route::get('{stay_cancellation_policy_dates}/tags ', 'CancellationPolicyDates\CancellationPolicyDatesController@tags');
                Route::post('{stay_cancellation_policy_dates}/tags ', 'CancellationPolicyDates\CancellationPolicyDatesController@saveTags');
                Route::get('{stay_cancellation_policy_dates}/addresses ', 'CancellationPolicyDates\CancellationPolicyDatesController@addresses');
                Route::post('{stay_cancellation_policy_dates}/addresses ', 'CancellationPolicyDates\CancellationPolicyDatesController@saveAddresses');

                Route::get('/{stay_cancellation_policy_dates}/{subObjects}', 'CancellationPolicyDates\CancellationPolicyDatesController@relatedObjects');
                Route::get('/{stay_cancellation_policy_dates}', 'CancellationPolicyDates\CancellationPolicyDatesController@show');

                Route::post('/', 'CancellationPolicyDates\CancellationPolicyDatesController@store');
                Route::post('/{stay_cancellation_policy_dates}/do/{action}', 'CancellationPolicyDates\CancellationPolicyDatesController@doAction');

                Route::patch('/{stay_cancellation_policy_dates}', 'CancellationPolicyDates\CancellationPolicyDatesController@update');
                Route::delete('/{stay_cancellation_policy_dates}', 'CancellationPolicyDates\CancellationPolicyDatesController@destroy');
            }
        );

        Route::prefix('providers')->group(
            function () {
                Route::get('/', 'Providers\ProvidersController@index');
                Route::get('/actions', 'Providers\ProvidersController@getActions');

                Route::get('{stay_providers}/tags ', 'Providers\ProvidersController@tags');
                Route::post('{stay_providers}/tags ', 'Providers\ProvidersController@saveTags');
                Route::get('{stay_providers}/addresses ', 'Providers\ProvidersController@addresses');
                Route::post('{stay_providers}/addresses ', 'Providers\ProvidersController@saveAddresses');

                Route::get('/{stay_providers}/{subObjects}', 'Providers\ProvidersController@relatedObjects');
                Route::get('/{stay_providers}', 'Providers\ProvidersController@show');

                Route::post('/', 'Providers\ProvidersController@store');
                Route::post('/{stay_providers}/do/{action}', 'Providers\ProvidersController@doAction');

                Route::patch('/{stay_providers}', 'Providers\ProvidersController@update');
                Route::delete('/{stay_providers}', 'Providers\ProvidersController@destroy');
            }
        );

        Route::prefix('hotels')->group(
            function () {
                Route::get('/', 'Hotels\HotelsController@index');
                Route::get('/actions', 'Hotels\HotelsController@getActions');

                Route::get('{stay_hotels}/tags ', 'Hotels\HotelsController@tags');
                Route::post('{stay_hotels}/tags ', 'Hotels\HotelsController@saveTags');
                Route::get('{stay_hotels}/addresses ', 'Hotels\HotelsController@addresses');
                Route::post('{stay_hotels}/addresses ', 'Hotels\HotelsController@saveAddresses');

                Route::get('/{stay_hotels}/{subObjects}', 'Hotels\HotelsController@relatedObjects');
                Route::get('/{stay_hotels}', 'Hotels\HotelsController@show');

                Route::post('/', 'Hotels\HotelsController@store');
                Route::post('/{stay_hotels}/do/{action}', 'Hotels\HotelsController@doAction');

                Route::patch('/{stay_hotels}', 'Hotels\HotelsController@update');
                Route::delete('/{stay_hotels}', 'Hotels\HotelsController@destroy');
            }
        );

        Route::prefix('room-types')->group(
            function () {
                Route::get('/', 'RoomTypes\RoomTypesController@index');
                Route::get('/actions', 'RoomTypes\RoomTypesController@getActions');

                Route::get('{stay_room_types}/tags ', 'RoomTypes\RoomTypesController@tags');
                Route::post('{stay_room_types}/tags ', 'RoomTypes\RoomTypesController@saveTags');
                Route::get('{stay_room_types}/addresses ', 'RoomTypes\RoomTypesController@addresses');
                Route::post('{stay_room_types}/addresses ', 'RoomTypes\RoomTypesController@saveAddresses');

                Route::get('/{stay_room_types}/{subObjects}', 'RoomTypes\RoomTypesController@relatedObjects');
                Route::get('/{stay_room_types}', 'RoomTypes\RoomTypesController@show');

                Route::post('/', 'RoomTypes\RoomTypesController@store');
                Route::post('/{stay_room_types}/do/{action}', 'RoomTypes\RoomTypesController@doAction');

                Route::patch('/{stay_room_types}', 'RoomTypes\RoomTypesController@update');
                Route::delete('/{stay_room_types}', 'RoomTypes\RoomTypesController@destroy');
            }
        );

        Route::prefix('rooms')->group(
            function () {
                Route::get('/', 'Rooms\RoomsController@index');
                Route::get('/actions', 'Rooms\RoomsController@getActions');

                Route::get('{stay_rooms}/tags ', 'Rooms\RoomsController@tags');
                Route::post('{stay_rooms}/tags ', 'Rooms\RoomsController@saveTags');
                Route::get('{stay_rooms}/addresses ', 'Rooms\RoomsController@addresses');
                Route::post('{stay_rooms}/addresses ', 'Rooms\RoomsController@saveAddresses');

                Route::get('/{stay_rooms}/{subObjects}', 'Rooms\RoomsController@relatedObjects');
                Route::get('/{stay_rooms}', 'Rooms\RoomsController@show');

                Route::post('/', 'Rooms\RoomsController@store');
                Route::post('/{stay_rooms}/do/{action}', 'Rooms\RoomsController@doAction');

                Route::patch('/{stay_rooms}', 'Rooms\RoomsController@update');
                Route::delete('/{stay_rooms}', 'Rooms\RoomsController@destroy');
            }
        );

        Route::prefix('tarif-types')->group(
            function () {
                Route::get('/', 'TarifTypes\TarifTypesController@index');
                Route::get('/actions', 'TarifTypes\TarifTypesController@getActions');

                Route::get('{stay_tarif_types}/tags ', 'TarifTypes\TarifTypesController@tags');
                Route::post('{stay_tarif_types}/tags ', 'TarifTypes\TarifTypesController@saveTags');
                Route::get('{stay_tarif_types}/addresses ', 'TarifTypes\TarifTypesController@addresses');
                Route::post('{stay_tarif_types}/addresses ', 'TarifTypes\TarifTypesController@saveAddresses');

                Route::get('/{stay_tarif_types}/{subObjects}', 'TarifTypes\TarifTypesController@relatedObjects');
                Route::get('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@show');

                Route::post('/', 'TarifTypes\TarifTypesController@store');
                Route::post('/{stay_tarif_types}/do/{action}', 'TarifTypes\TarifTypesController@doAction');

                Route::patch('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@update');
                Route::delete('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@destroy');
            }
        );

        Route::prefix('reservations')->group(
            function () {
                Route::get('/', 'Reservations\ReservationsController@index');
                Route::get('/actions', 'Reservations\ReservationsController@getActions');

                Route::get('{stay_reservations}/tags ', 'Reservations\ReservationsController@tags');
                Route::post('{stay_reservations}/tags ', 'Reservations\ReservationsController@saveTags');
                Route::get('{stay_reservations}/addresses ', 'Reservations\ReservationsController@addresses');
                Route::post('{stay_reservations}/addresses ', 'Reservations\ReservationsController@saveAddresses');

                Route::get('/{stay_reservations}/{subObjects}', 'Reservations\ReservationsController@relatedObjects');
                Route::get('/{stay_reservations}', 'Reservations\ReservationsController@show');

                Route::post('/', 'Reservations\ReservationsController@store');
                Route::post('/{stay_reservations}/do/{action}', 'Reservations\ReservationsController@doAction');

                Route::patch('/{stay_reservations}', 'Reservations\ReservationsController@update');
                Route::delete('/{stay_reservations}', 'Reservations\ReservationsController@destroy');
            }
        );

        Route::prefix('main-purchase-contracts')->group(
            function () {
                Route::get('/', 'MainPurchaseContracts\MainPurchaseContractsController@index');
                Route::get('/actions', 'MainPurchaseContracts\MainPurchaseContractsController@getActions');

                Route::get('{stay_main_purchase_contracts}/tags ', 'MainPurchaseContracts\MainPurchaseContractsController@tags');
                Route::post('{stay_main_purchase_contracts}/tags ', 'MainPurchaseContracts\MainPurchaseContractsController@saveTags');
                Route::get('{stay_main_purchase_contracts}/addresses ', 'MainPurchaseContracts\MainPurchaseContractsController@addresses');
                Route::post('{stay_main_purchase_contracts}/addresses ', 'MainPurchaseContracts\MainPurchaseContractsController@saveAddresses');

                Route::get('/{stay_main_purchase_contracts}/{subObjects}', 'MainPurchaseContracts\MainPurchaseContractsController@relatedObjects');
                Route::get('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@show');

                Route::post('/', 'MainPurchaseContracts\MainPurchaseContractsController@store');
                Route::post('/{stay_main_purchase_contracts}/do/{action}', 'MainPurchaseContracts\MainPurchaseContractsController@doAction');

                Route::patch('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@update');
                Route::delete('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@destroy');
            }
        );

        Route::prefix('sales-contracts')->group(
            function () {
                Route::get('/', 'SalesContracts\SalesContractsController@index');
                Route::get('/actions', 'SalesContracts\SalesContractsController@getActions');

                Route::get('{stay_sales_contracts}/tags ', 'SalesContracts\SalesContractsController@tags');
                Route::post('{stay_sales_contracts}/tags ', 'SalesContracts\SalesContractsController@saveTags');
                Route::get('{stay_sales_contracts}/addresses ', 'SalesContracts\SalesContractsController@addresses');
                Route::post('{stay_sales_contracts}/addresses ', 'SalesContracts\SalesContractsController@saveAddresses');

                Route::get('/{stay_sales_contracts}/{subObjects}', 'SalesContracts\SalesContractsController@relatedObjects');
                Route::get('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@show');

                Route::post('/', 'SalesContracts\SalesContractsController@store');
                Route::post('/{stay_sales_contracts}/do/{action}', 'SalesContracts\SalesContractsController@doAction');

                Route::patch('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@update');
                Route::delete('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@destroy');
            }
        );

        Route::prefix('quota-contracts')->group(
            function () {
                Route::get('/', 'QuotaContracts\QuotaContractsController@index');
                Route::get('/actions', 'QuotaContracts\QuotaContractsController@getActions');

                Route::get('{stay_quota_contracts}/tags ', 'QuotaContracts\QuotaContractsController@tags');
                Route::post('{stay_quota_contracts}/tags ', 'QuotaContracts\QuotaContractsController@saveTags');
                Route::get('{stay_quota_contracts}/addresses ', 'QuotaContracts\QuotaContractsController@addresses');
                Route::post('{stay_quota_contracts}/addresses ', 'QuotaContracts\QuotaContractsController@saveAddresses');

                Route::get('/{stay_quota_contracts}/{subObjects}', 'QuotaContracts\QuotaContractsController@relatedObjects');
                Route::get('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@show');

                Route::post('/', 'QuotaContracts\QuotaContractsController@store');
                Route::post('/{stay_quota_contracts}/do/{action}', 'QuotaContracts\QuotaContractsController@doAction');

                Route::patch('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@update');
                Route::delete('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@destroy');
            }
        );

        Route::prefix('hotel-contracts')->group(
            function () {
                Route::get('/', 'HotelContracts\HotelContractsController@index');
                Route::get('/actions', 'HotelContracts\HotelContractsController@getActions');

                Route::get('{stay_hotel_contracts}/tags ', 'HotelContracts\HotelContractsController@tags');
                Route::post('{stay_hotel_contracts}/tags ', 'HotelContracts\HotelContractsController@saveTags');
                Route::get('{stay_hotel_contracts}/addresses ', 'HotelContracts\HotelContractsController@addresses');
                Route::post('{stay_hotel_contracts}/addresses ', 'HotelContracts\HotelContractsController@saveAddresses');

                Route::get('/{stay_hotel_contracts}/{subObjects}', 'HotelContracts\HotelContractsController@relatedObjects');
                Route::get('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@show');

                Route::post('/', 'HotelContracts\HotelContractsController@store');
                Route::post('/{stay_hotel_contracts}/do/{action}', 'HotelContracts\HotelContractsController@doAction');

                Route::patch('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@update');
                Route::delete('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@destroy');
            }
        );

        Route::prefix('rates')->group(
            function () {
                Route::get('/', 'Rates\RatesController@index');
                Route::get('/actions', 'Rates\RatesController@getActions');

                Route::get('{stay_rates}/tags ', 'Rates\RatesController@tags');
                Route::post('{stay_rates}/tags ', 'Rates\RatesController@saveTags');
                Route::get('{stay_rates}/addresses ', 'Rates\RatesController@addresses');
                Route::post('{stay_rates}/addresses ', 'Rates\RatesController@saveAddresses');

                Route::get('/{stay_rates}/{subObjects}', 'Rates\RatesController@relatedObjects');
                Route::get('/{stay_rates}', 'Rates\RatesController@show');

                Route::post('/', 'Rates\RatesController@store');
                Route::post('/{stay_rates}/do/{action}', 'Rates\RatesController@doAction');

                Route::patch('/{stay_rates}', 'Rates\RatesController@update');
                Route::delete('/{stay_rates}', 'Rates\RatesController@destroy');
            }
        );

        Route::prefix('rate-prices')->group(
            function () {
                Route::get('/', 'RatePrices\RatePricesController@index');
                Route::get('/actions', 'RatePrices\RatePricesController@getActions');

                Route::get('{stay_rate_prices}/tags ', 'RatePrices\RatePricesController@tags');
                Route::post('{stay_rate_prices}/tags ', 'RatePrices\RatePricesController@saveTags');
                Route::get('{stay_rate_prices}/addresses ', 'RatePrices\RatePricesController@addresses');
                Route::post('{stay_rate_prices}/addresses ', 'RatePrices\RatePricesController@saveAddresses');

                Route::get('/{stay_rate_prices}/{subObjects}', 'RatePrices\RatePricesController@relatedObjects');
                Route::get('/{stay_rate_prices}', 'RatePrices\RatePricesController@show');

                Route::post('/', 'RatePrices\RatePricesController@store');
                Route::post('/{stay_rate_prices}/do/{action}', 'RatePrices\RatePricesController@doAction');

                Route::patch('/{stay_rate_prices}', 'RatePrices\RatePricesController@update');
                Route::delete('/{stay_rate_prices}', 'RatePrices\RatePricesController@destroy');
            }
        );

        Route::prefix('room-type-provider-mappings')->group(
            function () {
                Route::get('/', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@index');
                Route::get('/actions', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@getActions');

                Route::get('{stay_room_type_provider_mappings}/tags ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@tags');
                Route::post('{stay_room_type_provider_mappings}/tags ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@saveTags');
                Route::get('{stay_room_type_provider_mappings}/addresses ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@addresses');
                Route::post('{stay_room_type_provider_mappings}/addresses ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@saveAddresses');

                Route::get('/{stay_room_type_provider_mappings}/{subObjects}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@relatedObjects');
                Route::get('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@show');

                Route::post('/', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@store');
                Route::post('/{stay_room_type_provider_mappings}/do/{action}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@doAction');

                Route::patch('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@update');
                Route::delete('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@destroy');
            }
        );

        Route::prefix('hotel-consumer-mappings')->group(
            function () {
                Route::get('/', 'HotelConsumerMappings\HotelConsumerMappingsController@index');
                Route::get('/actions', 'HotelConsumerMappings\HotelConsumerMappingsController@getActions');

                Route::get('{stay_hotel_consumer_mappings}/tags ', 'HotelConsumerMappings\HotelConsumerMappingsController@tags');
                Route::post('{stay_hotel_consumer_mappings}/tags ', 'HotelConsumerMappings\HotelConsumerMappingsController@saveTags');
                Route::get('{stay_hotel_consumer_mappings}/addresses ', 'HotelConsumerMappings\HotelConsumerMappingsController@addresses');
                Route::post('{stay_hotel_consumer_mappings}/addresses ', 'HotelConsumerMappings\HotelConsumerMappingsController@saveAddresses');

                Route::get('/{stay_hotel_consumer_mappings}/{subObjects}', 'HotelConsumerMappings\HotelConsumerMappingsController@relatedObjects');
                Route::get('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@show');

                Route::post('/', 'HotelConsumerMappings\HotelConsumerMappingsController@store');
                Route::post('/{stay_hotel_consumer_mappings}/do/{action}', 'HotelConsumerMappings\HotelConsumerMappingsController@doAction');

                Route::patch('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@update');
                Route::delete('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@destroy');
            }
        );

        Route::prefix('consumers')->group(
            function () {
                Route::get('/', 'Consumers\ConsumersController@index');
                Route::get('/actions', 'Consumers\ConsumersController@getActions');

                Route::get('{stay_consumers}/tags ', 'Consumers\ConsumersController@tags');
                Route::post('{stay_consumers}/tags ', 'Consumers\ConsumersController@saveTags');
                Route::get('{stay_consumers}/addresses ', 'Consumers\ConsumersController@addresses');
                Route::post('{stay_consumers}/addresses ', 'Consumers\ConsumersController@saveAddresses');

                Route::get('/{stay_consumers}/{subObjects}', 'Consumers\ConsumersController@relatedObjects');
                Route::get('/{stay_consumers}', 'Consumers\ConsumersController@show');

                Route::post('/', 'Consumers\ConsumersController@store');
                Route::post('/{stay_consumers}/do/{action}', 'Consumers\ConsumersController@doAction');

                Route::patch('/{stay_consumers}', 'Consumers\ConsumersController@update');
                Route::delete('/{stay_consumers}', 'Consumers\ConsumersController@destroy');
            }
        );

        Route::prefix('room-type-consumer-mappings')->group(
            function () {
                Route::get('/', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@index');
                Route::get('/actions', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@getActions');

                Route::get('{stay_room_type_consumer_mappings}/tags ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@tags');
                Route::post('{stay_room_type_consumer_mappings}/tags ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@saveTags');
                Route::get('{stay_room_type_consumer_mappings}/addresses ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@addresses');
                Route::post('{stay_room_type_consumer_mappings}/addresses ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@saveAddresses');

                Route::get('/{stay_room_type_consumer_mappings}/{subObjects}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@relatedObjects');
                Route::get('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@show');

                Route::post('/', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@store');
                Route::post('/{stay_room_type_consumer_mappings}/do/{action}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@doAction');

                Route::patch('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@update');
                Route::delete('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@destroy');
            }
        );

        Route::prefix('hotel-provider-mappings')->group(
            function () {
                Route::get('/', 'HotelProviderMappings\HotelProviderMappingsController@index');
                Route::get('/actions', 'HotelProviderMappings\HotelProviderMappingsController@getActions');

                Route::get('{stay_hotel_provider_mappings}/tags ', 'HotelProviderMappings\HotelProviderMappingsController@tags');
                Route::post('{stay_hotel_provider_mappings}/tags ', 'HotelProviderMappings\HotelProviderMappingsController@saveTags');
                Route::get('{stay_hotel_provider_mappings}/addresses ', 'HotelProviderMappings\HotelProviderMappingsController@addresses');
                Route::post('{stay_hotel_provider_mappings}/addresses ', 'HotelProviderMappings\HotelProviderMappingsController@saveAddresses');

                Route::get('/{stay_hotel_provider_mappings}/{subObjects}', 'HotelProviderMappings\HotelProviderMappingsController@relatedObjects');
                Route::get('/{stay_hotel_provider_mappings}', 'HotelProviderMappings\HotelProviderMappingsController@show');

                Route::post('/', 'HotelProviderMappings\HotelProviderMappingsController@store');
                Route::post('/{stay_hotel_provider_mappings}/do/{action}', 'HotelProviderMappings\HotelProviderMappingsController@doAction');

                Route::patch('/{stay_hotel_provider_mappings}', 'HotelProviderMappings\HotelProviderMappingsController@update');
                Route::delete('/{stay_hotel_provider_mappings}', 'HotelProviderMappings\HotelProviderMappingsController@destroy');
            }
        );

        Route::prefix('agency-groups')->group(
            function () {
                Route::get('/', 'AgencyGroups\AgencyGroupsController@index');
                Route::get('/actions', 'AgencyGroups\AgencyGroupsController@getActions');

                Route::get('{stay_agency_groups}/tags ', 'AgencyGroups\AgencyGroupsController@tags');
                Route::post('{stay_agency_groups}/tags ', 'AgencyGroups\AgencyGroupsController@saveTags');
                Route::get('{stay_agency_groups}/addresses ', 'AgencyGroups\AgencyGroupsController@addresses');
                Route::post('{stay_agency_groups}/addresses ', 'AgencyGroups\AgencyGroupsController@saveAddresses');

                Route::get('/{stay_agency_groups}/{subObjects}', 'AgencyGroups\AgencyGroupsController@relatedObjects');
                Route::get('/{stay_agency_groups}', 'AgencyGroups\AgencyGroupsController@show');

                Route::post('/', 'AgencyGroups\AgencyGroupsController@store');
                Route::post('/{stay_agency_groups}/do/{action}', 'AgencyGroups\AgencyGroupsController@doAction');

                Route::patch('/{stay_agency_groups}', 'AgencyGroups\AgencyGroupsController@update');
                Route::delete('/{stay_agency_groups}', 'AgencyGroups\AgencyGroupsController@destroy');
            }
        );

        Route::prefix('cancellation-policies')->group(
            function () {
                Route::get('/', 'CancellationPolicies\CancellationPoliciesController@index');
                Route::get('/actions', 'CancellationPolicies\CancellationPoliciesController@getActions');

                Route::get('{stay_cancellation_policies}/tags ', 'CancellationPolicies\CancellationPoliciesController@tags');
                Route::post('{stay_cancellation_policies}/tags ', 'CancellationPolicies\CancellationPoliciesController@saveTags');
                Route::get('{stay_cancellation_policies}/addresses ', 'CancellationPolicies\CancellationPoliciesController@addresses');
                Route::post('{stay_cancellation_policies}/addresses ', 'CancellationPolicies\CancellationPoliciesController@saveAddresses');

                Route::get('/{stay_cancellation_policies}/{subObjects}', 'CancellationPolicies\CancellationPoliciesController@relatedObjects');
                Route::get('/{stay_cancellation_policies}', 'CancellationPolicies\CancellationPoliciesController@show');

                Route::post('/', 'CancellationPolicies\CancellationPoliciesController@store');
                Route::post('/{stay_cancellation_policies}/do/{action}', 'CancellationPolicies\CancellationPoliciesController@doAction');

                Route::patch('/{stay_cancellation_policies}', 'CancellationPolicies\CancellationPoliciesController@update');
                Route::delete('/{stay_cancellation_policies}', 'CancellationPolicies\CancellationPoliciesController@destroy');
            }
        );

        Route::prefix('cancellation-policy-dates')->group(
            function () {
                Route::get('/', 'CancellationPolicyDates\CancellationPolicyDatesController@index');
                Route::get('/actions', 'CancellationPolicyDates\CancellationPolicyDatesController@getActions');

                Route::get('{stay_cancellation_policy_dates}/tags ', 'CancellationPolicyDates\CancellationPolicyDatesController@tags');
                Route::post('{stay_cancellation_policy_dates}/tags ', 'CancellationPolicyDates\CancellationPolicyDatesController@saveTags');
                Route::get('{stay_cancellation_policy_dates}/addresses ', 'CancellationPolicyDates\CancellationPolicyDatesController@addresses');
                Route::post('{stay_cancellation_policy_dates}/addresses ', 'CancellationPolicyDates\CancellationPolicyDatesController@saveAddresses');

                Route::get('/{stay_cancellation_policy_dates}/{subObjects}', 'CancellationPolicyDates\CancellationPolicyDatesController@relatedObjects');
                Route::get('/{stay_cancellation_policy_dates}', 'CancellationPolicyDates\CancellationPolicyDatesController@show');

                Route::post('/', 'CancellationPolicyDates\CancellationPolicyDatesController@store');
                Route::post('/{stay_cancellation_policy_dates}/do/{action}', 'CancellationPolicyDates\CancellationPolicyDatesController@doAction');

                Route::patch('/{stay_cancellation_policy_dates}', 'CancellationPolicyDates\CancellationPolicyDatesController@update');
                Route::delete('/{stay_cancellation_policy_dates}', 'CancellationPolicyDates\CancellationPolicyDatesController@destroy');
            }
        );

        Route::prefix('providers')->group(
            function () {
                Route::get('/', 'Providers\ProvidersController@index');
                Route::get('/actions', 'Providers\ProvidersController@getActions');

                Route::get('{stay_providers}/tags ', 'Providers\ProvidersController@tags');
                Route::post('{stay_providers}/tags ', 'Providers\ProvidersController@saveTags');
                Route::get('{stay_providers}/addresses ', 'Providers\ProvidersController@addresses');
                Route::post('{stay_providers}/addresses ', 'Providers\ProvidersController@saveAddresses');

                Route::get('/{stay_providers}/{subObjects}', 'Providers\ProvidersController@relatedObjects');
                Route::get('/{stay_providers}', 'Providers\ProvidersController@show');

                Route::post('/', 'Providers\ProvidersController@store');
                Route::post('/{stay_providers}/do/{action}', 'Providers\ProvidersController@doAction');

                Route::patch('/{stay_providers}', 'Providers\ProvidersController@update');
                Route::delete('/{stay_providers}', 'Providers\ProvidersController@destroy');
            }
        );

        Route::prefix('hotels')->group(
            function () {
                Route::get('/', 'Hotels\HotelsController@index');
                Route::get('/actions', 'Hotels\HotelsController@getActions');

                Route::get('{stay_hotels}/tags ', 'Hotels\HotelsController@tags');
                Route::post('{stay_hotels}/tags ', 'Hotels\HotelsController@saveTags');
                Route::get('{stay_hotels}/addresses ', 'Hotels\HotelsController@addresses');
                Route::post('{stay_hotels}/addresses ', 'Hotels\HotelsController@saveAddresses');

                Route::get('/{stay_hotels}/{subObjects}', 'Hotels\HotelsController@relatedObjects');
                Route::get('/{stay_hotels}', 'Hotels\HotelsController@show');

                Route::post('/', 'Hotels\HotelsController@store');
                Route::post('/{stay_hotels}/do/{action}', 'Hotels\HotelsController@doAction');

                Route::patch('/{stay_hotels}', 'Hotels\HotelsController@update');
                Route::delete('/{stay_hotels}', 'Hotels\HotelsController@destroy');
            }
        );

        Route::prefix('room-types')->group(
            function () {
                Route::get('/', 'RoomTypes\RoomTypesController@index');
                Route::get('/actions', 'RoomTypes\RoomTypesController@getActions');

                Route::get('{stay_room_types}/tags ', 'RoomTypes\RoomTypesController@tags');
                Route::post('{stay_room_types}/tags ', 'RoomTypes\RoomTypesController@saveTags');
                Route::get('{stay_room_types}/addresses ', 'RoomTypes\RoomTypesController@addresses');
                Route::post('{stay_room_types}/addresses ', 'RoomTypes\RoomTypesController@saveAddresses');

                Route::get('/{stay_room_types}/{subObjects}', 'RoomTypes\RoomTypesController@relatedObjects');
                Route::get('/{stay_room_types}', 'RoomTypes\RoomTypesController@show');

                Route::post('/', 'RoomTypes\RoomTypesController@store');
                Route::post('/{stay_room_types}/do/{action}', 'RoomTypes\RoomTypesController@doAction');

                Route::patch('/{stay_room_types}', 'RoomTypes\RoomTypesController@update');
                Route::delete('/{stay_room_types}', 'RoomTypes\RoomTypesController@destroy');
            }
        );

        Route::prefix('rooms')->group(
            function () {
                Route::get('/', 'Rooms\RoomsController@index');
                Route::get('/actions', 'Rooms\RoomsController@getActions');

                Route::get('{stay_rooms}/tags ', 'Rooms\RoomsController@tags');
                Route::post('{stay_rooms}/tags ', 'Rooms\RoomsController@saveTags');
                Route::get('{stay_rooms}/addresses ', 'Rooms\RoomsController@addresses');
                Route::post('{stay_rooms}/addresses ', 'Rooms\RoomsController@saveAddresses');

                Route::get('/{stay_rooms}/{subObjects}', 'Rooms\RoomsController@relatedObjects');
                Route::get('/{stay_rooms}', 'Rooms\RoomsController@show');

                Route::post('/', 'Rooms\RoomsController@store');
                Route::post('/{stay_rooms}/do/{action}', 'Rooms\RoomsController@doAction');

                Route::patch('/{stay_rooms}', 'Rooms\RoomsController@update');
                Route::delete('/{stay_rooms}', 'Rooms\RoomsController@destroy');
            }
        );

        Route::prefix('tarif-types')->group(
            function () {
                Route::get('/', 'TarifTypes\TarifTypesController@index');
                Route::get('/actions', 'TarifTypes\TarifTypesController@getActions');

                Route::get('{stay_tarif_types}/tags ', 'TarifTypes\TarifTypesController@tags');
                Route::post('{stay_tarif_types}/tags ', 'TarifTypes\TarifTypesController@saveTags');
                Route::get('{stay_tarif_types}/addresses ', 'TarifTypes\TarifTypesController@addresses');
                Route::post('{stay_tarif_types}/addresses ', 'TarifTypes\TarifTypesController@saveAddresses');

                Route::get('/{stay_tarif_types}/{subObjects}', 'TarifTypes\TarifTypesController@relatedObjects');
                Route::get('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@show');

                Route::post('/', 'TarifTypes\TarifTypesController@store');
                Route::post('/{stay_tarif_types}/do/{action}', 'TarifTypes\TarifTypesController@doAction');

                Route::patch('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@update');
                Route::delete('/{stay_tarif_types}', 'TarifTypes\TarifTypesController@destroy');
            }
        );

        Route::prefix('reservations')->group(
            function () {
                Route::get('/', 'Reservations\ReservationsController@index');
                Route::get('/actions', 'Reservations\ReservationsController@getActions');

                Route::get('{stay_reservations}/tags ', 'Reservations\ReservationsController@tags');
                Route::post('{stay_reservations}/tags ', 'Reservations\ReservationsController@saveTags');
                Route::get('{stay_reservations}/addresses ', 'Reservations\ReservationsController@addresses');
                Route::post('{stay_reservations}/addresses ', 'Reservations\ReservationsController@saveAddresses');

                Route::get('/{stay_reservations}/{subObjects}', 'Reservations\ReservationsController@relatedObjects');
                Route::get('/{stay_reservations}', 'Reservations\ReservationsController@show');

                Route::post('/', 'Reservations\ReservationsController@store');
                Route::post('/{stay_reservations}/do/{action}', 'Reservations\ReservationsController@doAction');

                Route::patch('/{stay_reservations}', 'Reservations\ReservationsController@update');
                Route::delete('/{stay_reservations}', 'Reservations\ReservationsController@destroy');
            }
        );

        Route::prefix('main-purchase-contracts')->group(
            function () {
                Route::get('/', 'MainPurchaseContracts\MainPurchaseContractsController@index');
                Route::get('/actions', 'MainPurchaseContracts\MainPurchaseContractsController@getActions');

                Route::get('{stay_main_purchase_contracts}/tags ', 'MainPurchaseContracts\MainPurchaseContractsController@tags');
                Route::post('{stay_main_purchase_contracts}/tags ', 'MainPurchaseContracts\MainPurchaseContractsController@saveTags');
                Route::get('{stay_main_purchase_contracts}/addresses ', 'MainPurchaseContracts\MainPurchaseContractsController@addresses');
                Route::post('{stay_main_purchase_contracts}/addresses ', 'MainPurchaseContracts\MainPurchaseContractsController@saveAddresses');

                Route::get('/{stay_main_purchase_contracts}/{subObjects}', 'MainPurchaseContracts\MainPurchaseContractsController@relatedObjects');
                Route::get('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@show');

                Route::post('/', 'MainPurchaseContracts\MainPurchaseContractsController@store');
                Route::post('/{stay_main_purchase_contracts}/do/{action}', 'MainPurchaseContracts\MainPurchaseContractsController@doAction');

                Route::patch('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@update');
                Route::delete('/{stay_main_purchase_contracts}', 'MainPurchaseContracts\MainPurchaseContractsController@destroy');
            }
        );

        Route::prefix('sales-contracts')->group(
            function () {
                Route::get('/', 'SalesContracts\SalesContractsController@index');
                Route::get('/actions', 'SalesContracts\SalesContractsController@getActions');

                Route::get('{stay_sales_contracts}/tags ', 'SalesContracts\SalesContractsController@tags');
                Route::post('{stay_sales_contracts}/tags ', 'SalesContracts\SalesContractsController@saveTags');
                Route::get('{stay_sales_contracts}/addresses ', 'SalesContracts\SalesContractsController@addresses');
                Route::post('{stay_sales_contracts}/addresses ', 'SalesContracts\SalesContractsController@saveAddresses');

                Route::get('/{stay_sales_contracts}/{subObjects}', 'SalesContracts\SalesContractsController@relatedObjects');
                Route::get('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@show');

                Route::post('/', 'SalesContracts\SalesContractsController@store');
                Route::post('/{stay_sales_contracts}/do/{action}', 'SalesContracts\SalesContractsController@doAction');

                Route::patch('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@update');
                Route::delete('/{stay_sales_contracts}', 'SalesContracts\SalesContractsController@destroy');
            }
        );

        Route::prefix('quota-contracts')->group(
            function () {
                Route::get('/', 'QuotaContracts\QuotaContractsController@index');
                Route::get('/actions', 'QuotaContracts\QuotaContractsController@getActions');

                Route::get('{stay_quota_contracts}/tags ', 'QuotaContracts\QuotaContractsController@tags');
                Route::post('{stay_quota_contracts}/tags ', 'QuotaContracts\QuotaContractsController@saveTags');
                Route::get('{stay_quota_contracts}/addresses ', 'QuotaContracts\QuotaContractsController@addresses');
                Route::post('{stay_quota_contracts}/addresses ', 'QuotaContracts\QuotaContractsController@saveAddresses');

                Route::get('/{stay_quota_contracts}/{subObjects}', 'QuotaContracts\QuotaContractsController@relatedObjects');
                Route::get('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@show');

                Route::post('/', 'QuotaContracts\QuotaContractsController@store');
                Route::post('/{stay_quota_contracts}/do/{action}', 'QuotaContracts\QuotaContractsController@doAction');

                Route::patch('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@update');
                Route::delete('/{stay_quota_contracts}', 'QuotaContracts\QuotaContractsController@destroy');
            }
        );

        Route::prefix('hotel-contracts')->group(
            function () {
                Route::get('/', 'HotelContracts\HotelContractsController@index');
                Route::get('/actions', 'HotelContracts\HotelContractsController@getActions');

                Route::get('{stay_hotel_contracts}/tags ', 'HotelContracts\HotelContractsController@tags');
                Route::post('{stay_hotel_contracts}/tags ', 'HotelContracts\HotelContractsController@saveTags');
                Route::get('{stay_hotel_contracts}/addresses ', 'HotelContracts\HotelContractsController@addresses');
                Route::post('{stay_hotel_contracts}/addresses ', 'HotelContracts\HotelContractsController@saveAddresses');

                Route::get('/{stay_hotel_contracts}/{subObjects}', 'HotelContracts\HotelContractsController@relatedObjects');
                Route::get('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@show');

                Route::post('/', 'HotelContracts\HotelContractsController@store');
                Route::post('/{stay_hotel_contracts}/do/{action}', 'HotelContracts\HotelContractsController@doAction');

                Route::patch('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@update');
                Route::delete('/{stay_hotel_contracts}', 'HotelContracts\HotelContractsController@destroy');
            }
        );

        Route::prefix('rates')->group(
            function () {
                Route::get('/', 'Rates\RatesController@index');
                Route::get('/actions', 'Rates\RatesController@getActions');

                Route::get('{stay_rates}/tags ', 'Rates\RatesController@tags');
                Route::post('{stay_rates}/tags ', 'Rates\RatesController@saveTags');
                Route::get('{stay_rates}/addresses ', 'Rates\RatesController@addresses');
                Route::post('{stay_rates}/addresses ', 'Rates\RatesController@saveAddresses');

                Route::get('/{stay_rates}/{subObjects}', 'Rates\RatesController@relatedObjects');
                Route::get('/{stay_rates}', 'Rates\RatesController@show');

                Route::post('/', 'Rates\RatesController@store');
                Route::post('/{stay_rates}/do/{action}', 'Rates\RatesController@doAction');

                Route::patch('/{stay_rates}', 'Rates\RatesController@update');
                Route::delete('/{stay_rates}', 'Rates\RatesController@destroy');
            }
        );

        Route::prefix('rate-prices')->group(
            function () {
                Route::get('/', 'RatePrices\RatePricesController@index');
                Route::get('/actions', 'RatePrices\RatePricesController@getActions');

                Route::get('{stay_rate_prices}/tags ', 'RatePrices\RatePricesController@tags');
                Route::post('{stay_rate_prices}/tags ', 'RatePrices\RatePricesController@saveTags');
                Route::get('{stay_rate_prices}/addresses ', 'RatePrices\RatePricesController@addresses');
                Route::post('{stay_rate_prices}/addresses ', 'RatePrices\RatePricesController@saveAddresses');

                Route::get('/{stay_rate_prices}/{subObjects}', 'RatePrices\RatePricesController@relatedObjects');
                Route::get('/{stay_rate_prices}', 'RatePrices\RatePricesController@show');

                Route::post('/', 'RatePrices\RatePricesController@store');
                Route::post('/{stay_rate_prices}/do/{action}', 'RatePrices\RatePricesController@doAction');

                Route::patch('/{stay_rate_prices}', 'RatePrices\RatePricesController@update');
                Route::delete('/{stay_rate_prices}', 'RatePrices\RatePricesController@destroy');
            }
        );

        Route::prefix('room-type-provider-mappings')->group(
            function () {
                Route::get('/', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@index');
                Route::get('/actions', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@getActions');

                Route::get('{stay_room_type_provider_mappings}/tags ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@tags');
                Route::post('{stay_room_type_provider_mappings}/tags ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@saveTags');
                Route::get('{stay_room_type_provider_mappings}/addresses ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@addresses');
                Route::post('{stay_room_type_provider_mappings}/addresses ', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@saveAddresses');

                Route::get('/{stay_room_type_provider_mappings}/{subObjects}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@relatedObjects');
                Route::get('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@show');

                Route::post('/', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@store');
                Route::post('/{stay_room_type_provider_mappings}/do/{action}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@doAction');

                Route::patch('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@update');
                Route::delete('/{stay_room_type_provider_mappings}', 'RoomTypeProviderMappings\RoomTypeProviderMappingsController@destroy');
            }
        );

        Route::prefix('hotel-consumer-mappings')->group(
            function () {
                Route::get('/', 'HotelConsumerMappings\HotelConsumerMappingsController@index');
                Route::get('/actions', 'HotelConsumerMappings\HotelConsumerMappingsController@getActions');

                Route::get('{stay_hotel_consumer_mappings}/tags ', 'HotelConsumerMappings\HotelConsumerMappingsController@tags');
                Route::post('{stay_hotel_consumer_mappings}/tags ', 'HotelConsumerMappings\HotelConsumerMappingsController@saveTags');
                Route::get('{stay_hotel_consumer_mappings}/addresses ', 'HotelConsumerMappings\HotelConsumerMappingsController@addresses');
                Route::post('{stay_hotel_consumer_mappings}/addresses ', 'HotelConsumerMappings\HotelConsumerMappingsController@saveAddresses');

                Route::get('/{stay_hotel_consumer_mappings}/{subObjects}', 'HotelConsumerMappings\HotelConsumerMappingsController@relatedObjects');
                Route::get('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@show');

                Route::post('/', 'HotelConsumerMappings\HotelConsumerMappingsController@store');
                Route::post('/{stay_hotel_consumer_mappings}/do/{action}', 'HotelConsumerMappings\HotelConsumerMappingsController@doAction');

                Route::patch('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@update');
                Route::delete('/{stay_hotel_consumer_mappings}', 'HotelConsumerMappings\HotelConsumerMappingsController@destroy');
            }
        );

        Route::prefix('consumers')->group(
            function () {
                Route::get('/', 'Consumers\ConsumersController@index');
                Route::get('/actions', 'Consumers\ConsumersController@getActions');

                Route::get('{stay_consumers}/tags ', 'Consumers\ConsumersController@tags');
                Route::post('{stay_consumers}/tags ', 'Consumers\ConsumersController@saveTags');
                Route::get('{stay_consumers}/addresses ', 'Consumers\ConsumersController@addresses');
                Route::post('{stay_consumers}/addresses ', 'Consumers\ConsumersController@saveAddresses');

                Route::get('/{stay_consumers}/{subObjects}', 'Consumers\ConsumersController@relatedObjects');
                Route::get('/{stay_consumers}', 'Consumers\ConsumersController@show');

                Route::post('/', 'Consumers\ConsumersController@store');
                Route::post('/{stay_consumers}/do/{action}', 'Consumers\ConsumersController@doAction');

                Route::patch('/{stay_consumers}', 'Consumers\ConsumersController@update');
                Route::delete('/{stay_consumers}', 'Consumers\ConsumersController@destroy');
            }
        );

        Route::prefix('room-type-consumer-mappings')->group(
            function () {
                Route::get('/', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@index');
                Route::get('/actions', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@getActions');

                Route::get('{stay_room_type_consumer_mappings}/tags ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@tags');
                Route::post('{stay_room_type_consumer_mappings}/tags ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@saveTags');
                Route::get('{stay_room_type_consumer_mappings}/addresses ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@addresses');
                Route::post('{stay_room_type_consumer_mappings}/addresses ', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@saveAddresses');

                Route::get('/{stay_room_type_consumer_mappings}/{subObjects}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@relatedObjects');
                Route::get('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@show');

                Route::post('/', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@store');
                Route::post('/{stay_room_type_consumer_mappings}/do/{action}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@doAction');

                Route::patch('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@update');
                Route::delete('/{stay_room_type_consumer_mappings}', 'RoomTypeConsumerMappings\RoomTypeConsumerMappingsController@destroy');
            }
        );

        Route::prefix('hotel-provider-mappings')->group(
            function () {
                Route::get('/', 'HotelProviderMappings\HotelProviderMappingsController@index');
                Route::get('/actions', 'HotelProviderMappings\HotelProviderMappingsController@getActions');

                Route::get('{stay_hotel_provider_mappings}/tags ', 'HotelProviderMappings\HotelProviderMappingsController@tags');
                Route::post('{stay_hotel_provider_mappings}/tags ', 'HotelProviderMappings\HotelProviderMappingsController@saveTags');
                Route::get('{stay_hotel_provider_mappings}/addresses ', 'HotelProviderMappings\HotelProviderMappingsController@addresses');
                Route::post('{stay_hotel_provider_mappings}/addresses ', 'HotelProviderMappings\HotelProviderMappingsController@saveAddresses');

                Route::get('/{stay_hotel_provider_mappings}/{subObjects}', 'HotelProviderMappings\HotelProviderMappingsController@relatedObjects');
                Route::get('/{stay_hotel_provider_mappings}', 'HotelProviderMappings\HotelProviderMappingsController@show');

                Route::post('/', 'HotelProviderMappings\HotelProviderMappingsController@store');
                Route::post('/{stay_hotel_provider_mappings}/do/{action}', 'HotelProviderMappings\HotelProviderMappingsController@doAction');

                Route::patch('/{stay_hotel_provider_mappings}', 'HotelProviderMappings\HotelProviderMappingsController@update');
                Route::delete('/{stay_hotel_provider_mappings}', 'HotelProviderMappings\HotelProviderMappingsController@destroy');
            }
        );

        // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE












































































































































































































































































































































    }
);


















































