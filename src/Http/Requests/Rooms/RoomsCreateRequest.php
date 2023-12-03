<?php

namespace NextDeveloper\Stay\Http\Requests\Rooms;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class RoomsCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name'              => 'required|string|max:50',
        'features'          => 'nullable',
        'stay_hotels_id'    => 'nullable|exists:stay_hotels,uuid|uuid',
        'stay_room_type_id' => 'nullable|exists:stay_room_types,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n
}