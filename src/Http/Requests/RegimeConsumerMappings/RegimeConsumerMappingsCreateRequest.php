<?php

namespace NextDeveloper\Stay\Http\Requests\RegimeConsumerMappings;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class RegimeConsumerMappingsCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'stay_regime_id' => 'required|exists:stay_regimes,uuid|uuid',
        'stay_consumer_id' => 'required|exists:stay_consumers,uuid|uuid',
        'consumer_rate_plan_code' => 'required|string',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}