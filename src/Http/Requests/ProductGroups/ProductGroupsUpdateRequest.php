<?php

namespace NextDeveloper\Stay\Http\Requests\ProductGroups;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class ProductGroupsUpdateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'nullable|string',
        'commission_rate' => 'nullable|numeric',
        'iva_commission_rate' => 'nullable|numeric',
        'quickbooks_item' => 'nullable|string',
        'export_code' => 'nullable|string',
        'parent_id' => 'nullable|exists:parents,uuid|uuid',
        'trip_end_date' => 'nullable|date',
        'trip_start_date' => 'nullable|date',
        'end_date' => 'nullable|date',
        'start_date' => 'nullable|date',
        'max_children' => 'nullable|integer',
        'min_children' => 'nullable|integer',
        'max_adults' => 'nullable|integer',
        'min_adults' => 'nullable|integer',
        'zone_id' => 'nullable|exists:zones,uuid|uuid',
        'channel_id' => 'nullable|string|exists:channels,uuid|uuid',
        'room' => 'nullable|string',
        'status' => 'nullable|integer',
        'provider_id' => 'nullable|exists:providers,uuid|uuid',
        'price_list_id' => 'nullable|exists:price_lists,uuid|uuid',
        'delegation_id' => 'nullable|exists:delegations,uuid|uuid',
        'client_id' => 'nullable|exists:clients,uuid|uuid',
        'order_number' => 'nullable|integer',
        'export_code_c' => 'nullable|string',
        'export_code_vre' => 'nullable|string',
        'export_code_cre' => 'nullable|string',
        'export_code_analytic' => 'nullable|string',
        'is_default' => 'nullable|boolean',
        'commission_account' => 'nullable|string',
        'alternative_export_code' => 'nullable|string',
        'observations' => 'nullable|string',
        'iva_commission_export_code' => 'nullable',
        'origin_zone_id' => 'nullable|exists:origin_zones,uuid|uuid',
        'default_sender_email' => 'nullable',
        'external_id' => 'nullable|string|exists:externals,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}