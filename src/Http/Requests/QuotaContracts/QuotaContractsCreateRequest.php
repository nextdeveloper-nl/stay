<?php

namespace NextDeveloper\Stay\Http\Requests\QuotaContracts;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class QuotaContractsCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'external_id' => 'required|exists:externals,uuid|uuid',
        'name' => 'required',
        'external_code' => 'nullable',
        'observations' => 'nullable|string',
        'is_active' => 'boolean',
        'season_start_date' => 'nullable|date',
        'season_end_date' => 'nullable|date',
        'guaranteed_quota' => 'integer',
        'return_security_quota' => 'boolean',
        'allow_negative_quota' => 'boolean',
        'max_rooms_online' => 'nullable|integer',
        'max_rooms_online_request' => 'nullable|integer',
        'max_rooms_booking' => 'nullable|integer',
        'max_rooms_booking_request' => 'nullable|integer',
        'is_extranet_enabled' => 'boolean',
        'stay_hotel_id' => 'required|exists:stay_hotels,uuid|uuid',
        'parent_stay_quota_contract_id' => 'nullable|exists:parent_stay_quota_contracts,uuid|uuid',
        'stay_tarif_type_id' => 'required|exists:stay_tarif_types,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}