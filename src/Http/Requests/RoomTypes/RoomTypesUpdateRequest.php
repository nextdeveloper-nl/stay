<?php

namespace NextDeveloper\Stay\Http\Requests\RoomTypes;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class RoomTypesUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'stay_hotels_id' => 'nullable|exists:stay_hotels,uuid|uuid',
        'name' => 'nullable|string',
        'description' => 'nullable|string',
        'facilities' => 'nullable',
        'price' => 'nullable',
        'common_currency_id' => 'nullable|exists:common_currencies,uuid|uuid',
        'is_public' => 'boolean',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n
}