<?php

namespace NextDeveloper\Stay\Http\Requests\RegimeTypes;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class RegimeTypesCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name_es' => 'required|string',
        'description_es' => 'nullable|string',
        'name_en' => 'required|string',
        'description_en' => 'nullable|string',
        'is_active' => 'required|boolean',
        'code' => 'nullable|string',
        'external_id' => 'required|string|exists:externals,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}