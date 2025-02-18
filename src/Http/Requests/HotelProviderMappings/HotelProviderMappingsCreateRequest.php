<?php

namespace NextDeveloper\Stay\Http\Requests\HotelProviderMappings;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class HotelProviderMappingsCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'stay_hotel_id' => 'required|exists:stay_hotels,uuid|uuid',
        'stay_provider_id' => 'required|exists:stay_providers,uuid|uuid',
        'provider_hotel_code' => 'required|string',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}