<?php

namespace NextDeveloper\Stay\Http\Requests\HotelSupplementClasses;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class HotelSupplementClassesUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'nullable|string',
        'code' => 'nullable|string',
        'is_active' => 'nullable|boolean',
        'applies_to' => 'nullable|integer',
        'show_hours' => 'nullable|boolean',
        'external_id' => 'nullable|string|exists:externals,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}