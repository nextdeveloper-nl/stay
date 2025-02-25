<?php

namespace NextDeveloper\Stay\Http\Requests\Regimes;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class RegimesCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'is_active' => 'required|boolean',
        'abbreviation' => 'nullable|string',
        'generic_code' => 'nullable|string',
        'order_number' => 'nullable|integer',
        'first_service' => 'nullable|string',
        'last_service' => 'nullable|string',
        'regime_type_id' => 'nullable|exists:regime_types,uuid|uuid',
        'breakfast_id' => 'nullable|exists:breakfasts,uuid|uuid',
        'name' => 'nullable|string',
        'hidden' => 'boolean',
        'external_id' => 'required|string|exists:externals,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}