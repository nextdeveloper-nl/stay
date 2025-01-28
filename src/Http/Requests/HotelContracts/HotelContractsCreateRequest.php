<?php

namespace NextDeveloper\Stay\Http\Requests\HotelContracts;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class HotelContractsCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'external_id' => 'nullable|exists:externals,uuid|uuid',
        'stay_main_purchase_contract_id' => 'nullable|exists:stay_main_purchase_contracts,uuid|uuid',
        'stay_sales_contract_id' => 'nullable|exists:stay_sales_contracts,uuid|uuid',
        'stay_quota_contract_id' => 'nullable|exists:stay_quota_contracts,uuid|uuid',
        'quota_block_key' => 'nullable',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}