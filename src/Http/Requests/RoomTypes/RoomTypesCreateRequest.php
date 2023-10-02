<?php

namespace NextDeveloper\Stay\Http\Requests\RoomTypes;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class RoomTypesCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'stay_hotels_id'     => 'nullable|exists:stay_hotels,uuid|uuid',
        'name'               => 'required|string|max:500',
        'description'        => 'nullable|string',
        'facilities'         => 'nullable',
        'price'              => 'nullable|numeric',
        'common_currency_id' => 'nullable|exists:common_currencies,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}