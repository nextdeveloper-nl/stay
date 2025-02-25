<?php

namespace NextDeveloper\Stay\Http\Requests\ProductTypes;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class ProductTypesCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
        'product_independent' => 'required|boolean',
        'library' => 'required|string',
        'reservation_class' => 'required|string',
        'is_public' => 'required|boolean',
        'description' => 'nullable|string',
        'external_provider' => 'required|string',
        'visible' => 'required|boolean',
        'module_type' => 'nullable|string',
        'module_type_en' => 'nullable|string',
        'module_type_es' => 'nullable|string',
        'is_direct_booking' => 'required|boolean',
        'is_visible_intranet' => 'required|boolean',
        'external_id' => 'required|string|exists:externals,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}