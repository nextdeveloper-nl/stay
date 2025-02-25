<?php

namespace NextDeveloper\Stay\Http\Requests\SupplementTypes;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class SupplementTypesCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
        'class' => 'required|string',
        'control_maintenance' => 'required|string',
        'show_in_bonus' => 'required|boolean',
        'external_id' => 'required|string|exists:externals,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}