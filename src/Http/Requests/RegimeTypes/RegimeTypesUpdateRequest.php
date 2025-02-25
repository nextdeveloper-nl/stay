<?php

namespace NextDeveloper\Stay\Http\Requests\RegimeTypes;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class RegimeTypesUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name_es' => 'nullable|string',
        'description_es' => 'nullable|string',
        'name_en' => 'nullable|string',
        'description_en' => 'nullable|string',
        'is_active' => 'nullable|boolean',
        'code' => 'nullable|string',
        'external_id' => 'nullable|string|exists:externals,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}