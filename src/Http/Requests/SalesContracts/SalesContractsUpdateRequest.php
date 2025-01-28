<?php

namespace NextDeveloper\Stay\Http\Requests\SalesContracts;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class SalesContractsUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'external_id' => 'nullable|exists:externals,uuid|uuid',
        'name' => 'nullable',
        'observations' => 'nullable|string',
        'internal_observations' => 'nullable|string',
        'is_active' => 'boolean',
        'is_approved' => 'boolean',
        'approved_at' => 'nullable|date',
        'contract_type' => 'nullable',
        'season_start_date' => 'nullable|date',
        'season_end_date' => 'nullable|date',
        'booking_start_date' => 'nullable|date',
        'booking_end_date' => 'nullable|date',
        'rates_start_date' => 'nullable|date',
        'rates_end_date' => 'nullable|date',
        'guarantee_start_date' => 'nullable|date',
        'guarantee_end_date' => 'nullable|date',
        'minimum_nights' => 'nullable|integer',
        'maximum_nights' => 'nullable|integer',
        'minimum_adults' => 'nullable|integer',
        'guaranteed_quota' => 'nullable|integer',
        'age_range_a_from' => 'nullable|integer',
        'age_range_a_to' => 'nullable|integer',
        'age_range_b_to' => 'nullable|integer',
        'show_without_quota' => 'boolean',
        'show_without_price' => 'boolean',
        'fetch_other_prices' => 'boolean',
        'is_commissionable' => 'boolean',
        'apply_markup' => 'boolean',
        'markup_value' => 'nullable',
        'markup_priority' => 'nullable|integer',
        'markup_tarification_type' => 'nullable',
        'is_package_enabled' => 'boolean',
        'requires_destination_payment' => 'boolean',
        'allows_multiple_accommodations' => 'boolean',
        'is_optional_supplement_mandatory' => 'boolean',
        'is_fair_template' => 'boolean',
        'is_multi_fair_template' => 'boolean',
        'is_callcenter_only' => 'boolean',
        'rounding_type' => 'nullable',
        'calculation_type' => 'nullable',
        'regularization_type' => 'nullable',
        'price_in_guarantee_invoice' => 'boolean',
        'stay_hotel_id' => 'nullable|exists:stay_hotels,uuid|uuid',
        'stay_main_purchase_contract_id' => 'nullable|exists:stay_main_purchase_contracts,uuid|uuid',
        'stay_tarif_type_id' => 'nullable|exists:stay_tarif_types,uuid|uuid',
        'common_currency_id' => 'nullable|exists:common_currencies,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}