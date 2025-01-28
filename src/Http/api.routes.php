<?php

Route::prefix('stay')->group(
    function () {
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

        // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

























































































































































    }
);









































