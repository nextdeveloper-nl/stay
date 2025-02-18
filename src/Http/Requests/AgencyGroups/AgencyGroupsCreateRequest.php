<?php

namespace NextDeveloper\Stay\Http\Requests\AgencyGroups;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class AgencyGroupsCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
        'observation' => 'nullable|string',
        'visible' => 'boolean',
        'codes' => 'nullable|string',
        'marketplace_account_id' => 'nullable|exists:marketplace_accounts,uuid|uuid',
        'has_external_manager' => 'boolean',
        'round_commission_discount' => 'boolean',
        'notify_blocked_client' => 'boolean',
        'taxes_included' => 'boolean',
        'agency_reference_validator' => 'nullable|string',
        'external_commission_visible' => 'boolean',
        'external_commission_percentage' => 'nullable',
        'block_agencies' => 'boolean',
        'external_commission_editable' => 'boolean',
        'commissionable_price' => 'boolean',
        'deny_markups' => 'boolean',
        'allow_price_increase' => 'boolean',
        'allow_price_decrease' => 'boolean',
        'maximum_allowed_amount_percentage' => 'nullable',
        'indirect_sale_commission' => 'boolean',
        'tax_regime_type' => 'nullable|string',
        'external_id' => 'nullable|string|exists:externals,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}