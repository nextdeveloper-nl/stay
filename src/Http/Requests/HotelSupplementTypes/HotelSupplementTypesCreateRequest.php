<?php

namespace NextDeveloper\Stay\Http\Requests\HotelSupplementTypes;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class HotelSupplementTypesCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
        'class' => 'required|string',
        'maintenance_control' => 'required|string',
        'is_bonus' => 'required|boolean',
        'external_id' => 'required|string|exists:externals,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}