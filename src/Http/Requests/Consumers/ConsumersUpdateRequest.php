<?php

namespace NextDeveloper\Stay\Http\Requests\Consumers;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class ConsumersUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'nullable|string',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}