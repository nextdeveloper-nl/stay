<?php

namespace NextDeveloper\Stay\Database\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use NextDeveloper\Commons\Database\Traits\Filterable;
use NextDeveloper\Stay\Database\Observers\ProvidersObserver;
use NextDeveloper\Commons\Database\Traits\UuidId;
use NextDeveloper\Commons\Common\Cache\Traits\CleanCache;
use NextDeveloper\Commons\Database\Traits\Taggable;

/**
 * Providers model.
 *
 * @package  NextDeveloper\Stay\Database\Models
 * @property integer $id
 * @property string $uuid
 * @property $external_id
 * @property $name
 * @property $tax_number
 * @property $fiscal_name
 * @property string $observations
 * @property $default_export_code
 * @property $second_export_code
 * @property $external_code
 * @property $contact_person
 * @property $email
 * @property $alternate_email
 * @property $phone_1
 * @property $phone_2
 * @property $admin_phone
 * @property $fax
 * @property $admin_contact
 * @property $admin_email
 * @property string $address
 * @property $postal_code
 * @property $city
 * @property $province
 * @property $country_iso
 * @property $neighborhood
 * @property $municipality
 * @property string $correspondence_address
 * @property $correspondence_postal_code
 * @property $correspondence_city
 * @property $correspondence_region
 * @property $correspondence_country
 * @property integer $payment_days
 * @property $payment_type
 * @property $direct_payment_type
 * @property boolean $is_commission_agent
 * @property $commission_percentage
 * @property $commission_tax
 * @property boolean $commission_without_taxes
 * @property boolean $commission_before_taxes
 * @property $direct_payment_tax_percentage
 * @property string $bank_account_description
 * @property $bank_account_number
 * @property $bank_account_type
 * @property $iban
 * @property $swift
 * @property $sort_code
 * @property $accounting_account
 * @property boolean $notify_request
 * @property boolean $notify_confirmation
 * @property boolean $notify_cancellation
 * @property boolean $notify_modification
 * @property boolean $notify_direct_payment
 * @property boolean $notify_request_without_quota
 * @property boolean $notify_cancel_without_quota
 * @property boolean $notify_confirm_without_quota
 * @property boolean $notify_success_as_pdf
 * @property boolean $notify_pdf_attachment
 * @property boolean $notify_request_external_res
 * @property $communication_language
 * @property string $communication_text
 * @property integer $priority
 * @property boolean $is_default
 * @property boolean $is_intracommunity
 * @property boolean $is_billing_exempt
 * @property boolean $has_commission_in_income
 * @property boolean $needs_assignment
 * @property boolean $has_operative_voucher
 * @property boolean $block_payments
 * @property boolean $deactivate_voucher
 * @property boolean $deactivate_success
 * @property boolean $use_provider_base_currency
 * @property boolean $block_accommodation
 * @property string $blocking_reason
 * @property boolean $allow_credit_agencies
 * @property boolean $is_voxel_export
 * @property boolean $apply_commission_expenses
 * @property boolean $gross_payments
 * @property $fiscal_regime_type
 * @property $card_activation_date_type
 * @property integer $card_activation_days
 * @property integer $common_country_id
 * @property integer $common_currency_id
 * @property integer $iam_user_id
 * @property integer $iam_account_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class Providers extends Model
{
    use Filterable, UuidId, CleanCache, Taggable;
    use SoftDeletes;


    public $timestamps = true;

    protected $table = 'stay_providers';


    /**
     @var array
     */
    protected $guarded = [];

    protected $fillable = [
            'external_id',
            'name',
            'tax_number',
            'fiscal_name',
            'observations',
            'default_export_code',
            'second_export_code',
            'external_code',
            'contact_person',
            'email',
            'alternate_email',
            'phone_1',
            'phone_2',
            'admin_phone',
            'fax',
            'admin_contact',
            'admin_email',
            'address',
            'postal_code',
            'city',
            'province',
            'country_iso',
            'neighborhood',
            'municipality',
            'correspondence_address',
            'correspondence_postal_code',
            'correspondence_city',
            'correspondence_region',
            'correspondence_country',
            'payment_days',
            'payment_type',
            'direct_payment_type',
            'is_commission_agent',
            'commission_percentage',
            'commission_tax',
            'commission_without_taxes',
            'commission_before_taxes',
            'direct_payment_tax_percentage',
            'bank_account_description',
            'bank_account_number',
            'bank_account_type',
            'iban',
            'swift',
            'sort_code',
            'accounting_account',
            'notify_request',
            'notify_confirmation',
            'notify_cancellation',
            'notify_modification',
            'notify_direct_payment',
            'notify_request_without_quota',
            'notify_cancel_without_quota',
            'notify_confirm_without_quota',
            'notify_success_as_pdf',
            'notify_pdf_attachment',
            'notify_request_external_res',
            'communication_language',
            'communication_text',
            'priority',
            'is_default',
            'is_intracommunity',
            'is_billing_exempt',
            'has_commission_in_income',
            'needs_assignment',
            'has_operative_voucher',
            'block_payments',
            'deactivate_voucher',
            'deactivate_success',
            'use_provider_base_currency',
            'block_accommodation',
            'blocking_reason',
            'allow_credit_agencies',
            'is_voxel_export',
            'apply_commission_expenses',
            'gross_payments',
            'fiscal_regime_type',
            'card_activation_date_type',
            'card_activation_days',
            'common_country_id',
            'common_currency_id',
            'iam_user_id',
            'iam_account_id',
    ];

    /**
      Here we have the fulltext fields. We can use these for fulltext search if enabled.
     */
    protected $fullTextFields = [

    ];

    /**
     @var array
     */
    protected $appends = [

    ];

    /**
     We are casting fields to objects so that we can work on them better
     *
     @var array
     */
    protected $casts = [
    'id' => 'integer',
    'observations' => 'string',
    'address' => 'string',
    'correspondence_address' => 'string',
    'payment_days' => 'integer',
    'is_commission_agent' => 'boolean',
    'commission_without_taxes' => 'boolean',
    'commission_before_taxes' => 'boolean',
    'bank_account_description' => 'string',
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
    'communication_text' => 'string',
    'priority' => 'integer',
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
    'blocking_reason' => 'string',
    'allow_credit_agencies' => 'boolean',
    'is_voxel_export' => 'boolean',
    'apply_commission_expenses' => 'boolean',
    'gross_payments' => 'boolean',
    'card_activation_days' => 'integer',
    'common_country_id' => 'integer',
    'common_currency_id' => 'integer',
    'created_at' => 'datetime',
    'updated_at' => 'datetime',
    'deleted_at' => 'datetime',
    ];

    /**
     We are casting data fields.
     *
     @var array
     */
    protected $dates = [
    'created_at',
    'updated_at',
    'deleted_at',
    ];

    /**
     @var array
     */
    protected $with = [

    ];

    /**
     @var int
     */
    protected $perPage = 20;

    /**
     @return void
     */
    public static function boot()
    {
        parent::boot();

        //  We create and add Observer even if we wont use it.
        parent::observe(ProvidersObserver::class);

        self::registerScopes();
    }

    public static function registerScopes()
    {
        $globalScopes = config('stay.scopes.global');
        $modelScopes = config('stay.scopes.stay_providers');

        if(!$modelScopes) { $modelScopes = [];
        }
        if (!$globalScopes) { $globalScopes = [];
        }

        $scopes = array_merge(
            $globalScopes,
            $modelScopes
        );

        if($scopes) {
            foreach ($scopes as $scope) {
                static::addGlobalScope(app($scope));
            }
        }
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE
}
