<?php

namespace NextDeveloper\Stay\Http\Requests\Hotels;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class HotelsUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'nullable|string',
        'description' => 'nullable|string',
        'address' => 'nullable|string',
        'facilities' => 'nullable',
        'email' => 'nullable|string',
        'phone' => 'nullable|string',
        'common_city_id' => 'nullable|exists:common_cities,uuid|uuid',
        'common_country_id' => 'nullable|exists:common_countries,uuid|uuid',
        'foreground_media_id' => 'nullable|exists:common_media,uuid|uuid',
        'background_media_id' => 'nullable|exists:common_media,uuid|uuid',
        'latitude' => 'nullable|string',
        'longitude' => 'nullable|string',
        'is_public' => 'boolean',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n
}