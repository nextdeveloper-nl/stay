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
            'name'                => 'required|string|max:500',
        'description'         => 'nullable|string',
        'address'             => 'required|string|max:500',
        'facilities'          => 'nullable',
        'email'               => 'nullable|string|max:100',
        'phone'               => 'nullable|string|max:20',
        'city'                => 'nullable|string|max:50',
        'common_country_id'   => 'nullable|exists:common_countries,uuid|uuid',
        'foreground_media_id' => 'nullable|exists:foreground_media,uuid|uuid',
        'background_media_id' => 'nullable|exists:background_media,uuid|uuid',
        'latitude'            => 'nullable|numeric',
        'longitude'           => 'nullable|numeric',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n
}