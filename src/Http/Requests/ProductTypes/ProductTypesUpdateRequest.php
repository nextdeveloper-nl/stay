<?php

namespace NextDeveloper\Stay\Http\Requests\ProductTypes;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class ProductTypesUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'nullable|string',
        'product_independent' => 'nullable|boolean',
        'library' => 'nullable|string',
        'reservation_class' => 'nullable|string',
        'is_public' => 'nullable|boolean',
        'description' => 'nullable|string',
        'external_provider' => 'nullable|string',
        'visible' => 'nullable|boolean',
        'module_type' => 'nullable|string',
        'module_type_en' => 'nullable|string',
        'module_type_es' => 'nullable|string',
        'is_direct_booking' => 'nullable|boolean',
        'is_visible_intranet' => 'nullable|boolean',
        'external_id' => 'nullable|string|exists:externals,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}