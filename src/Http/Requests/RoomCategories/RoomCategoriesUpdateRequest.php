<?php

namespace NextDeveloper\Stay\Http\Requests\RoomCategories;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class RoomCategoriesUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'nullable|string',
        'description' => 'nullable|string',
        'is_active' => 'nullable|boolean',
        'code' => 'nullable|string',
        'external_id' => 'nullable|exists:externals,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}