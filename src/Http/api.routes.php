<?php

Route::prefix('stay')->group(function () {
    Route::prefix('hotels')->group(
        function () {
            Route::get('/', 'Hotels\HotelsController@index');
            Route::get('/{stay_hotels}', 'Hotels\HotelsController@show');
            Route::get('/{stay_hotels}/{subObjects}', 'Hotels\HotelsController@subObjects');
            Route::post('/', 'Hotels\HotelsController@store');
            Route::patch('/{stay_hotels}', 'Hotels\HotelsController@update');
            Route::delete('/{stay_hotels}', 'Hotels\HotelsController@destroy');
        }
    );

    Route::prefix('reservations')->group(
        function () {
            Route::get('/', 'Reservations\ReservationsController@index');
            Route::get('/{stay_reservations}', 'Reservations\ReservationsController@show');
            Route::get('/{stay_reservations}/{subObjects}', 'Reservations\ReservationsController@subObjects');
            Route::post('/', 'Reservations\ReservationsController@store');
            Route::patch('/{stay_reservations}', 'Reservations\ReservationsController@update');
            Route::delete('/{stay_reservations}', 'Reservations\ReservationsController@destroy');
        }
    );

    Route::prefix('room-types')->group(
        function () {
            Route::get('/', 'RoomTypes\RoomTypesController@index');
            Route::get('/{stay_room_types}', 'RoomTypes\RoomTypesController@show');
            Route::get('/{stay_room_types}/{subObjects}', 'RoomTypes\RoomTypesController@subObjects');
            Route::post('/', 'RoomTypes\RoomTypesController@store');
            Route::patch('/{stay_room_types}', 'RoomTypes\RoomTypesController@update');
            Route::delete('/{stay_room_types}', 'RoomTypes\RoomTypesController@destroy');
        }
    );

    Route::prefix('rooms')->group(
        function () {
            Route::get('/', 'Rooms\RoomsController@index');
            Route::get('/{stay_rooms}', 'Rooms\RoomsController@show');
            Route::get('/{stay_rooms}/{subObjects}', 'Rooms\RoomsController@subObjects');
            Route::post('/', 'Rooms\RoomsController@store');
            Route::patch('/{stay_rooms}', 'Rooms\RoomsController@update');
            Route::delete('/{stay_rooms}', 'Rooms\RoomsController@destroy');
        }
    );

// EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE

});
