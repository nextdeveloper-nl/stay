<?php

namespace NextDeveloper\Stay\Http\Requests\HotelConsumerMappings;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class HotelConsumerMappingsCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'stay_hotel_id' => 'required|exists:stay_hotels,uuid|uuid',
        'stay_consumer_id' => 'required|exists:stay_consumers,uuid|uuid',
        'consumer_hotel_code' => 'required|string',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}