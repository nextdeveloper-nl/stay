<?php

namespace NextDeveloper\Stay\Http\Requests\CancellationPolicyDates;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class CancellationPolicyDatesCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'start_date' => 'required|date',
        'end_date' => 'required|date',
        'external_id' => 'nullable|string|exists:externals,uuid|uuid',
        'stay_cancellation_policy_id' => 'required|exists:stay_cancellation_policies,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}