<?php

namespace NextDeveloper\Stay\Http\Requests\HotelSupplementClasses;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class HotelSupplementClassesCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
        'code' => 'required|string',
        'is_active' => 'required|boolean',
        'applies_to' => 'nullable|integer',
        'show_hours' => 'required|boolean',
        'external_id' => 'required|string|exists:externals,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}