<?php

namespace NextDeveloper\Stay\Http\Requests\MainPurchaseContracts;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class MainPurchaseContractsUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'external_id' => 'nullable|string|exists:externals,uuid|uuid',
        'name' => 'nullable',
        'observations' => 'nullable|string',
        'internal_observations' => 'nullable|string',
        'is_active' => 'boolean',
        'is_approved' => 'boolean',
        'approved_at' => 'nullable|date',
        'season_start_date' => 'nullable|date',
        'season_end_date' => 'nullable|date',
        'booking_start_date' => 'nullable|date',
        'booking_end_date' => 'nullable|date',
        'guarantee_start_date' => 'nullable|date',
        'guarantee_end_date' => 'nullable|date',
        'minimum_nights' => 'nullable|integer',
        'maximum_nights' => 'nullable|integer',
        'value' => 'nullable',
        'calculation_type' => 'nullable',
        'provider_commission' => 'nullable',
        'provider_commission_type' => 'nullable',
        'extranet_commission' => 'nullable',
        'initial_quota' => 'nullable|integer',
        'guaranteed_quota' => 'nullable|integer',
        'return_security_quota' => 'boolean',
        'has_own_extranet_quota' => 'boolean',
        'minimum_age' => 'nullable|integer',
        'age_range_a_from' => 'nullable|integer',
        'age_range_a_to' => 'nullable|integer',
        'age_range_b_to' => 'nullable|integer',
        'age_range_c_to' => 'nullable|integer',
        'is_free_rate' => 'boolean',
        'is_extranet_enabled' => 'boolean',
        'has_multi_markup' => 'boolean',
        'has_recommended_prices' => 'boolean',
        'requires_immediate_payment' => 'boolean',
        'is_non_refundable' => 'boolean',
        'has_destination_payment' => 'boolean',
        'is_package_enabled' => 'boolean',
        'is_blocked' => 'boolean',
        'notify_integrator_bookings' => 'boolean',
        'representative_name' => 'nullable',
        'representative_position' => 'nullable',
        'responsible_person' => 'nullable',
        'hotel_booking_email' => 'nullable',
        'valuation_email' => 'nullable',
        'common_currency_id' => 'nullable|exists:common_currencies,uuid|uuid',
        'parent_stay_main_purchase_contract_id' => 'nullable|exists:parent_stay_main_purchase_contracts,uuid|uuid',
        'stay_tarif_type_id' => 'nullable|exists:stay_tarif_types,uuid|uuid',
        'stay_hotel_id' => 'nullable|exists:stay_hotels,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}