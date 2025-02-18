<?php

namespace NextDeveloper\Stay\Database\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use NextDeveloper\Commons\Database\Traits\Filterable;
use NextDeveloper\Stay\Database\Observers\SalesContractsObserver;
use NextDeveloper\Commons\Database\Traits\UuidId;
use NextDeveloper\Commons\Common\Cache\Traits\CleanCache;
use NextDeveloper\Commons\Database\Traits\Taggable;

/**
 * SalesContracts model.
 *
 * @package  NextDeveloper\Stay\Database\Models
 * @property integer $id
 * @property string $uuid
 * @property $external_id
 * @property $name
 * @property string $observations
 * @property string $internal_observations
 * @property boolean $is_active
 * @property boolean $is_approved
 * @property \Carbon\Carbon $approved_at
 * @property $contract_type
 * @property \Carbon\Carbon $season_start_date
 * @property \Carbon\Carbon $season_end_date
 * @property \Carbon\Carbon $booking_start_date
 * @property \Carbon\Carbon $booking_end_date
 * @property \Carbon\Carbon $rates_start_date
 * @property \Carbon\Carbon $rates_end_date
 * @property \Carbon\Carbon $guarantee_start_date
 * @property \Carbon\Carbon $guarantee_end_date
 * @property integer $minimum_nights
 * @property integer $maximum_nights
 * @property integer $minimum_adults
 * @property integer $guaranteed_quota
 * @property integer $age_range_a_from
 * @property integer $age_range_a_to
 * @property integer $age_range_b_to
 * @property boolean $show_without_quota
 * @property boolean $show_without_price
 * @property boolean $fetch_other_prices
 * @property boolean $is_commissionable
 * @property boolean $apply_markup
 * @property $markup_value
 * @property integer $markup_priority
 * @property $markup_tarification_type
 * @property boolean $is_package_enabled
 * @property boolean $requires_destination_payment
 * @property boolean $allows_multiple_accommodations
 * @property boolean $is_optional_supplement_mandatory
 * @property boolean $is_fair_template
 * @property boolean $is_multi_fair_template
 * @property boolean $is_callcenter_only
 * @property $rounding_type
 * @property $calculation_type
 * @property $regularization_type
 * @property boolean $price_in_guarantee_invoice
 * @property integer $stay_hotel_id
 * @property integer $stay_main_purchase_contract_id
 * @property integer $stay_tarif_type_id
 * @property integer $common_currency_id
 * @property integer $iam_account_id
 * @property integer $iam_user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class SalesContracts extends Model
{
    use Filterable, UuidId, CleanCache, Taggable;
    use SoftDeletes;


    public $timestamps = true;

    protected $table = 'stay_sales_contracts';


    /**
     @var array
     */
    protected $guarded = [];

    protected $fillable = [
            'external_id',
            'name',
            'observations',
            'internal_observations',
            'is_active',
            'is_approved',
            'approved_at',
            'contract_type',
            'season_start_date',
            'season_end_date',
            'booking_start_date',
            'booking_end_date',
            'rates_start_date',
            'rates_end_date',
            'guarantee_start_date',
            'guarantee_end_date',
            'minimum_nights',
            'maximum_nights',
            'minimum_adults',
            'guaranteed_quota',
            'age_range_a_from',
            'age_range_a_to',
            'age_range_b_to',
            'show_without_quota',
            'show_without_price',
            'fetch_other_prices',
            'is_commissionable',
            'apply_markup',
            'markup_value',
            'markup_priority',
            'markup_tarification_type',
            'is_package_enabled',
            'requires_destination_payment',
            'allows_multiple_accommodations',
            'is_optional_supplement_mandatory',
            'is_fair_template',
            'is_multi_fair_template',
            'is_callcenter_only',
            'rounding_type',
            'calculation_type',
            'regularization_type',
            'price_in_guarantee_invoice',
            'stay_hotel_id',
            'stay_main_purchase_contract_id',
            'stay_tarif_type_id',
            'common_currency_id',
            'iam_account_id',
            'iam_user_id',
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
    'internal_observations' => 'string',
    'is_active' => 'boolean',
    'is_approved' => 'boolean',
    'approved_at' => 'datetime',
    'season_start_date' => 'datetime',
    'season_end_date' => 'datetime',
    'booking_start_date' => 'datetime',
    'booking_end_date' => 'datetime',
    'rates_start_date' => 'datetime',
    'rates_end_date' => 'datetime',
    'guarantee_start_date' => 'datetime',
    'guarantee_end_date' => 'datetime',
    'minimum_nights' => 'integer',
    'maximum_nights' => 'integer',
    'minimum_adults' => 'integer',
    'guaranteed_quota' => 'integer',
    'age_range_a_from' => 'integer',
    'age_range_a_to' => 'integer',
    'age_range_b_to' => 'integer',
    'show_without_quota' => 'boolean',
    'show_without_price' => 'boolean',
    'fetch_other_prices' => 'boolean',
    'is_commissionable' => 'boolean',
    'apply_markup' => 'boolean',
    'markup_priority' => 'integer',
    'is_package_enabled' => 'boolean',
    'requires_destination_payment' => 'boolean',
    'allows_multiple_accommodations' => 'boolean',
    'is_optional_supplement_mandatory' => 'boolean',
    'is_fair_template' => 'boolean',
    'is_multi_fair_template' => 'boolean',
    'is_callcenter_only' => 'boolean',
    'price_in_guarantee_invoice' => 'boolean',
    'stay_hotel_id' => 'integer',
    'stay_main_purchase_contract_id' => 'integer',
    'stay_tarif_type_id' => 'integer',
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
    'approved_at',
    'season_start_date',
    'season_end_date',
    'booking_start_date',
    'booking_end_date',
    'rates_start_date',
    'rates_end_date',
    'guarantee_start_date',
    'guarantee_end_date',
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
        parent::observe(SalesContractsObserver::class);

        self::registerScopes();
    }

    public static function registerScopes()
    {
        $globalScopes = config('stay.scopes.global');
        $modelScopes = config('stay.scopes.stay_sales_contracts');

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
