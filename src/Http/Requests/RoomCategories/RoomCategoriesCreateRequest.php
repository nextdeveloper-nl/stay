<?php

namespace NextDeveloper\Stay\Http\Requests\RoomCategories;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class RoomCategoriesCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
        'description' => 'nullable|string',
        'is_active' => 'required|boolean',
        'code' => 'nullable|string',
        'external_id' => 'required|exists:externals,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}