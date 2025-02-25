<?php

namespace NextDeveloper\Stay\Http\Requests\RoomTypeOccupations;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class RoomTypeOccupationsCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'stay_room_type_id' => 'required|exists:stay_room_types,uuid|uuid',
        'adults_min' => 'required|integer',
        'adults_max' => 'required|integer',
        'children_min' => 'required|integer',
        'children_max' => 'required|integer',
        'external_id' => 'required|string|exists:externals,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}