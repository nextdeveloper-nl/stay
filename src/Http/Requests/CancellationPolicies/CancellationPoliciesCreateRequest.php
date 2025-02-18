<?php

namespace NextDeveloper\Stay\Http\Requests\CancellationPolicies;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class CancellationPoliciesCreateRequest extends AbstractFormRequest
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
        'parent_stay_cancellation_policy_id' => 'nullable|exists:parent_stay_cancellation_policies,uuid|uuid',
        'product_type' => 'required|string',
        'booking_start_date' => 'nullable|date',
        'booking_end_date' => 'nullable|date',
        'travel_start_date' => 'nullable|date',
        'travel_end_date' => 'nullable|date',
        'description_es' => 'nullable|string',
        'description_en' => 'nullable|string',
        'priority' => 'nullable|integer',
        'rules' => 'nullable',
        'common_currency_id' => 'nullable|exists:common_currencies,uuid|uuid',
        'xml_config' => 'nullable',
        'is_verified' => 'boolean',
        'is_default' => 'boolean',
        'external_id' => 'nullable|string|exists:externals,uuid|uuid',
        'stay_agency_group_id' => 'nullable|exists:stay_agency_groups,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}