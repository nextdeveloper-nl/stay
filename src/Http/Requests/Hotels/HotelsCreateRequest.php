<?php

namespace NextDeveloper\Stay\Http\Requests\Hotels;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class HotelsCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'external_id' => 'required|string|exists:externals,uuid|uuid',
        'name' => 'nullable|string',
        'description' => 'nullable|string',
        'address' => 'required|string',
        'facilities' => 'nullable',
        'email' => 'nullable|string',
        'phone' => 'nullable|string',
        'latitude' => 'nullable|string',
        'longitude' => 'nullable|string',
        'is_public' => 'boolean',
        'common_city_id' => 'nullable|exists:common_cities,uuid|uuid',
        'common_country_id' => 'nullable|exists:common_countries,uuid|uuid',
        'common_currency_id' => 'nullable|exists:common_currencies,uuid|uuid',
        'foreground_media_id' => 'nullable|exists:common_media,uuid|uuid',
        'background_media_id' => 'nullable|exists:common_media,uuid|uuid',
        'stay_provider_id' => 'nullable|exists:stay_providers,uuid|uuid',
        'is_master' => 'boolean',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n


}