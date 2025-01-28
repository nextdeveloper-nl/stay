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
            'external_id' => 'nullable|string|exists:externals,uuid|uuid',
        'name' => 'nullable|string',
        'description' => 'nullable|string',
        'number_adults' => 'integer',
        'number_children' => 'integer',
        'capacity_max' => 'nullable|integer',
        'capacity_min' => 'integer',
        'is_active' => 'boolean',
        'is_visible_extranet' => 'boolean',
        'is_package_enabled' => 'boolean',
        'is_cruise_enabled' => 'boolean',
        'display_order' => 'nullable|integer',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n
}