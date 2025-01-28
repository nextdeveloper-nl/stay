<?php

namespace NextDeveloper\Stay\Http\Requests\RoomTypeConsumerMappings;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class RoomTypeConsumerMappingsUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'stay_room_type_id' => 'nullable|exists:stay_room_types,uuid|uuid',
        'stay_consumer_id' => 'nullable|exists:stay_consumers,uuid|uuid',
        'consumer_room_type_code' => 'nullable|string',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}