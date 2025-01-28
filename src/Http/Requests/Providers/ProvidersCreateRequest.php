<?php

namespace NextDeveloper\Stay\Http\Requests\Providers;

use NextDeveloper\Commons\Http\Requests\AbstractFormRequest;

class ProvidersCreateRequest extends AbstractFormRequest
{

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'external_id' => 'nullable|exists:externals,uuid|uuid',
        'name' => 'required',
        'tax_number' => 'nullable',
        'fiscal_name' => 'nullable',
        'observations' => 'nullable|string',
        'default_export_code' => 'nullable',
        'second_export_code' => 'nullable',
        'external_code' => 'nullable',
        'contact_person' => 'nullable',
        'email' => 'nullable',
        'alternate_email' => 'nullable',
        'phone_1' => 'nullable',
        'phone_2' => 'nullable',
        'admin_phone' => 'nullable',
        'fax' => 'nullable',
        'admin_contact' => 'nullable',
        'admin_email' => 'nullable',
        'address' => 'nullable|string',
        'postal_code' => 'nullable',
        'city' => 'nullable',
        'province' => 'nullable',
        'country_iso' => 'nullable',
        'neighborhood' => 'nullable',
        'municipality' => 'nullable',
        'correspondence_address' => 'nullable|string',
        'correspondence_postal_code' => 'nullable',
        'correspondence_city' => 'nullable',
        'correspondence_region' => 'nullable',
        'correspondence_country' => 'nullable',
        'payment_days' => 'nullable|integer',
        'payment_type' => 'nullable',
        'direct_payment_type' => 'nullable',
        'is_commission_agent' => 'boolean',
        'commission_percentage' => 'nullable',
        'commission_tax' => 'nullable',
        'commission_without_taxes' => 'boolean',
        'commission_before_taxes' => 'boolean',
        'direct_payment_tax_percentage' => 'nullable',
        'bank_account_description' => 'nullable|string',
        'bank_account_number' => 'nullable',
        'bank_account_type' => 'nullable',
        'iban' => 'nullable',
        'swift' => 'nullable',
        'sort_code' => 'nullable',
        'accounting_account' => 'nullable',
        'notify_request' => 'boolean',
        'notify_confirmation' => 'boolean',
        'notify_cancellation' => 'boolean',
        'notify_modification' => 'boolean',
        'notify_direct_payment' => 'boolean',
        'notify_request_without_quota' => 'boolean',
        'notify_cancel_without_quota' => 'boolean',
        'notify_confirm_without_quota' => 'boolean',
        'notify_success_as_pdf' => 'boolean',
        'notify_pdf_attachment' => 'boolean',
        'notify_request_external_res' => 'boolean',
        'communication_language' => 'nullable',
        'communication_text' => 'nullable|string',
        'priority' => 'nullable|integer',
        'is_default' => 'boolean',
        'is_intracommunity' => 'boolean',
        'is_billing_exempt' => 'boolean',
        'has_commission_in_income' => 'boolean',
        'needs_assignment' => 'boolean',
        'has_operative_voucher' => 'boolean',
        'block_payments' => 'boolean',
        'deactivate_voucher' => 'boolean',
        'deactivate_success' => 'boolean',
        'use_provider_base_currency' => 'boolean',
        'block_accommodation' => 'boolean',
        'blocking_reason' => 'nullable|string',
        'allow_credit_agencies' => 'boolean',
        'is_voxel_export' => 'boolean',
        'apply_commission_expenses' => 'boolean',
        'gross_payments' => 'boolean',
        'fiscal_regime_type' => 'nullable',
        'card_activation_date_type' => 'nullable',
        'card_activation_days' => 'nullable|integer',
        'common_country_id' => 'nullable|exists:common_countries,uuid|uuid',
        'common_currency_id' => 'nullable|exists:common_currencies,uuid|uuid',
        ];
    }
    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}