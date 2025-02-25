<?php

namespace NextDeveloper\Stay\Http\Requests\RoomTypeOccupations;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class RoomTypeOccupationsUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'stay_room_type_id' => 'nullable|exists:stay_room_types,uuid|uuid',
        'adults_min' => 'nullable|integer',
        'adults_max' => 'nullable|integer',
        'children_min' => 'nullable|integer',
        'children_max' => 'nullable|integer',
        'external_id' => 'nullable|string|exists:externals,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}