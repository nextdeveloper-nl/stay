<?php

namespace NextDeveloper\Stay\Http\Requests\SupplementTypes;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class SupplementTypesUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'nullable|string',
        'class' => 'nullable|string',
        'control_maintenance' => 'nullable|string',
        'show_in_bonus' => 'nullable|boolean',
        'external_id' => 'nullable|string|exists:externals,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}