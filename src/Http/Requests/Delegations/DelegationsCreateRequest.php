<?php

namespace NextDeveloper\Stay\Http\Requests\Delegations;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class DelegationsCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
        'address' => 'required|string',
        'phone' => 'nullable|string',
        'fax' => 'nullable|string',
        'schedule' => 'nullable|string',
        'photo' => 'nullable|string',
        'sales_responsible' => 'required|string',
        'purchases_responsible' => 'required|string',
        'is_active' => 'required|boolean',
        'all_groups_id' => 'nullable|string|exists:all_groups,uuid|uuid',
        'send_all_groups_id' => 'nullable|string|exists:send_all_groups,uuid|uuid',
        'code_analitic' => 'nullable|string',
        'letter_tickets' => 'nullable|string',
        'send_extranet' => 'nullable|string',
        'send_always' => 'required|boolean',
        'send_reservation_user_category' => 'required|boolean',
        'external_id' => 'required|string|exists:externals,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}