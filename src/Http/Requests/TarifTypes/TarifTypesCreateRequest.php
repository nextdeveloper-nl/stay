<?php

namespace NextDeveloper\Stay\Http\Requests\TarifTypes;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class TarifTypesCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
        'code' => 'required|string',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}