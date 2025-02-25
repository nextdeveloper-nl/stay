<?php

namespace NextDeveloper\Stay\Http\Requests\HotelSupplementTypes;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class HotelSupplementTypesUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'nullable|string',
        'class' => 'nullable|string',
        'maintenance_control' => 'nullable|string',
        'is_bonus' => 'nullable|boolean',
        'external_id' => 'nullable|string|exists:externals,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}