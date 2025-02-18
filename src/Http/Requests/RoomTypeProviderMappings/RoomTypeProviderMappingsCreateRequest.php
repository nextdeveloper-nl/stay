<?php

namespace NextDeveloper\Stay\Http\Requests\RoomTypeProviderMappings;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class RoomTypeProviderMappingsCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'stay_room_type_id' => 'required|exists:stay_room_types,uuid|uuid',
        'stay_provider_id' => 'required|exists:stay_providers,uuid|uuid',
        'provider_room_type_code' => 'required|string',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}