<?php

namespace NextDeveloper\Stay\Http\Requests\HotelConsumerMappings;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class HotelConsumerMappingsUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'stay_hotel_id' => 'nullable|exists:stay_hotels,uuid|uuid',
        'stay_consumer_id' => 'nullable|exists:stay_consumers,uuid|uuid',
        'consumer_hotel_code' => 'nullable|string',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}