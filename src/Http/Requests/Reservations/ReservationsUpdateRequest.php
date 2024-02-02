<?php

namespace NextDeveloper\Stay\Http\Requests\Reservations;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class ReservationsUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'stay_hotels_id' => 'nullable|exists:stay_hotels,uuid|uuid',
        'stay_room_id' => 'nullable|exists:stay_rooms,uuid|uuid',
        'stay_room_type_id' => 'nullable|exists:stay_room_types,uuid|uuid',
        'reservation_date' => 'nullable|date',
        'reservation_data' => 'nullable',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n
}