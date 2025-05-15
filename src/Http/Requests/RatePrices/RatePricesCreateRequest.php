<?php

namespace NextDeveloper\Stay\Http\Requests\RatePrices;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class RatePricesCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'stay_rate_id' => 'required|exists:stay_rates,uuid|uuid',
        'stay_room_type_id' => 'nullable|exists:stay_room_types,uuid|uuid',
        'external_id' => 'nullable|exists:externals,uuid|uuid',
        'price_type' => 'required',
        'base_price' => 'nullable',
        'room_price' => 'nullable',
        'child_a_price_1' => 'nullable',
        'child_a_price_2' => 'nullable',
        'child_a_price_3' => 'nullable',
        'child_a_price_4' => 'nullable',
        'child_a_price_5' => 'nullable',
        'child_b_price_1' => 'nullable',
        'child_b_price_2' => 'nullable',
        'child_b_price_3' => 'nullable',
        'child_b_price_4' => 'nullable',
        'child_b_price_5' => 'nullable',
        'additional_price_1' => 'nullable',
        'additional_price_2' => 'nullable',
        'additional_price_3' => 'nullable',
        'additional_price_4' => 'nullable',
        'additional_price_5' => 'nullable',
        'additional_price_6' => 'nullable',
        'additional_price_7' => 'nullable',
        'additional_price_8' => 'nullable',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}