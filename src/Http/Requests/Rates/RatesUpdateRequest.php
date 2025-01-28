<?php

namespace NextDeveloper\Stay\Http\Requests\Rates;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class RatesUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'external_id' => 'nullable|exists:externals,uuid|uuid',
        'rate_mode' => 'nullable',
        'rate_type' => 'nullable',
        'has_fixed_prices' => 'boolean',
        'allows_zero_prices' => 'boolean',
        'is_guaranteed' => 'boolean',
        'is_cost_validated' => 'boolean',
        'age_range_a_from' => 'nullable|integer',
        'age_range_a_to' => 'nullable|integer',
        'age_range_b_to' => 'nullable|integer',
        'booking_start_date' => 'nullable|date',
        'booking_end_date' => 'nullable|date',
        'child_a_discount_1' => 'nullable',
        'child_a_discount_2' => 'nullable',
        'child_a_discount_3' => 'nullable',
        'child_a_discount_4' => 'nullable',
        'child_a_discount_5' => 'nullable',
        'child_b_discount_1' => 'nullable',
        'child_b_discount_2' => 'nullable',
        'child_b_discount_3' => 'nullable',
        'child_b_discount_4' => 'nullable',
        'child_b_discount_5' => 'nullable',
        'additional_discount_1' => 'nullable',
        'additional_discount_2' => 'nullable',
        'additional_discount_3' => 'nullable',
        'additional_discount_4' => 'nullable',
        'additional_discount_5' => 'nullable',
        'additional_discount_6' => 'nullable',
        'additional_discount_7' => 'nullable',
        'additional_discount_8' => 'nullable',
        'markup_percentage' => 'nullable',
        'fixed_markup' => 'nullable',
        'supplement_markup' => 'nullable',
        'recommended_profit' => 'nullable',
        'stay_hotel_id' => 'nullable|exists:stay_hotels,uuid|uuid',
        'stay_parent_rate_id' => 'nullable|exists:stay_parent_rates,uuid|uuid',
        'stay_hotel_contract_id' => 'nullable|exists:stay_hotel_contracts,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}