<?php

Route::prefix('stay')->group(
    function () {
        Route::prefix('hotels')->group(
            function () {
                Route::get('/', 'Hotels\HotelsController@index');

                Route::get('{stay_hotels}/tags ', 'Hotels\HotelsController@tags');
                Route::post('{stay_hotels}/tags ', 'Hotels\HotelsController@saveTags');

                Route::get('/{stay_hotels}/{subObjects}', 'Hotels\HotelsController@relatedObjects');
                Route::get('/{stay_hotels}', 'Hotels\HotelsController@show');

                Route::post('/', 'Hotels\HotelsController@store');
                Route::patch('/{stay_hotels}', 'Hotels\HotelsController@update');
                Route::delete('/{stay_hotels}', 'Hotels\HotelsController@destroy');
            }
        );

        Route::prefix('reservations')->group(
            function () {
                Route::get('/', 'Reservations\ReservationsController@index');

                Route::get('{stay_reservations}/tags ', 'Reservations\ReservationsController@tags');
                Route::post('{stay_reservations}/tags ', 'Reservations\ReservationsController@saveTags');

                Route::get('/{stay_reservations}/{subObjects}', 'Reservations\ReservationsController@relatedObjects');
                Route::get('/{stay_reservations}', 'Reservations\ReservationsController@show');

                Route::post('/', 'Reservations\ReservationsController@store');
                Route::patch('/{stay_reservations}', 'Reservations\ReservationsController@update');
                Route::delete('/{stay_reservations}', 'Reservations\ReservationsController@destroy');
            }
        );

        Route::prefix('room-types')->group(
            function () {
                Route::get('/', 'RoomTypes\RoomTypesController@index');

                Route::get('{stay_room_types}/tags ', 'RoomTypes\RoomTypesController@tags');
                Route::post('{stay_room_types}/tags ', 'RoomTypes\RoomTypesController@saveTags');

                Route::get('/{stay_room_types}/{subObjects}', 'RoomTypes\RoomTypesController@relatedObjects');
                Route::get('/{stay_room_types}', 'RoomTypes\RoomTypesController@show');

                Route::post('/', 'RoomTypes\RoomTypesController@store');
                Route::patch('/{stay_room_types}', 'RoomTypes\RoomTypesController@update');
                Route::delete('/{stay_room_types}', 'RoomTypes\RoomTypesController@destroy');
            }
        );

        Route::prefix('rooms')->group(
            function () {
                Route::get('/', 'Rooms\RoomsController@index');

                Route::get('{stay_rooms}/tags ', 'Rooms\RoomsController@tags');
                Route::post('{stay_rooms}/tags ', 'Rooms\RoomsController@saveTags');

                Route::get('/{stay_rooms}/{subObjects}', 'Rooms\RoomsController@relatedObjects');
                Route::get('/{stay_rooms}', 'Rooms\RoomsController@show');

                Route::post('/', 'Rooms\RoomsController@store');
                Route::patch('/{stay_rooms}', 'Rooms\RoomsController@update');
                Route::delete('/{stay_rooms}', 'Rooms\RoomsController@destroy');
            }
        );

        Route::prefix('rooms')->group(
            function () {
                Route::get('/', 'Rooms\RoomsController@index');

                Route::get('{stay_rooms}/tags ', 'Rooms\RoomsController@tags');
                Route::post('{stay_rooms}/tags ', 'Rooms\RoomsController@saveTags');
                Route::get('{stay_rooms}/addresses ', 'Rooms\RoomsController@addresses');
                Route::post('{stay_rooms}/addresses ', 'Rooms\RoomsController@saveAddresses');

                Route::get('/{stay_rooms}/{subObjects}', 'Rooms\RoomsController@relatedObjects');
                Route::get('/{stay_rooms}', 'Rooms\RoomsController@show');

                Route::post('/', 'Rooms\RoomsController@store');
                Route::patch('/{stay_rooms}', 'Rooms\RoomsController@update');
                Route::delete('/{stay_rooms}', 'Rooms\RoomsController@destroy');
            }
        );

        Route::prefix('room-types')->group(
            function () {
                Route::get('/', 'RoomTypes\RoomTypesController@index');

                Route::get('{stay_room_types}/tags ', 'RoomTypes\RoomTypesController@tags');
                Route::post('{stay_room_types}/tags ', 'RoomTypes\RoomTypesController@saveTags');
                Route::get('{stay_room_types}/addresses ', 'RoomTypes\RoomTypesController@addresses');
                Route::post('{stay_room_types}/addresses ', 'RoomTypes\RoomTypesController@saveAddresses');

                Route::get('/{stay_room_types}/{subObjects}', 'RoomTypes\RoomTypesController@relatedObjects');
                Route::get('/{stay_room_types}', 'RoomTypes\RoomTypesController@show');

                Route::post('/', 'RoomTypes\RoomTypesController@store');
                Route::patch('/{stay_room_types}', 'RoomTypes\RoomTypesController@update');
                Route::delete('/{stay_room_types}', 'RoomTypes\RoomTypesController@destroy');
            }
        );

        Route::prefix('hotels')->group(
            function () {
                Route::get('/', 'Hotels\HotelsController@index');

                Route::get('{stay_hotels}/tags ', 'Hotels\HotelsController@tags');
                Route::post('{stay_hotels}/tags ', 'Hotels\HotelsController@saveTags');
                Route::get('{stay_hotels}/addresses ', 'Hotels\HotelsController@addresses');
                Route::post('{stay_hotels}/addresses ', 'Hotels\HotelsController@saveAddresses');

                Route::get('/{stay_hotels}/{subObjects}', 'Hotels\HotelsController@relatedObjects');
                Route::get('/{stay_hotels}', 'Hotels\HotelsController@show');

                Route::post('/', 'Hotels\HotelsController@store');
                Route::patch('/{stay_hotels}', 'Hotels\HotelsController@update');
                Route::delete('/{stay_hotels}', 'Hotels\HotelsController@destroy');
            }
        );

        Route::prefix('reservations')->group(
            function () {
                Route::get('/', 'Reservations\ReservationsController@index');

                Route::get('{stay_reservations}/tags ', 'Reservations\ReservationsController@tags');
                Route::post('{stay_reservations}/tags ', 'Reservations\ReservationsController@saveTags');
                Route::get('{stay_reservations}/addresses ', 'Reservations\ReservationsController@addresses');
                Route::post('{stay_reservations}/addresses ', 'Reservations\ReservationsController@saveAddresses');

                Route::get('/{stay_reservations}/{subObjects}', 'Reservations\ReservationsController@relatedObjects');
                Route::get('/{stay_reservations}', 'Reservations\ReservationsController@show');

                Route::post('/', 'Reservations\ReservationsController@store');
                Route::patch('/{stay_reservations}', 'Reservations\ReservationsController@update');
                Route::delete('/{stay_reservations}', 'Reservations\ReservationsController@destroy');
            }
        );

        // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE





    }
);
