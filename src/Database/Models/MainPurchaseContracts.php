<?php

namespace NextDeveloper\Stay\Database\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use NextDeveloper\Commons\Database\Traits\Filterable;
use NextDeveloper\Stay\Database\Observers\MainPurchaseContractsObserver;
use NextDeveloper\Commons\Database\Traits\UuidId;
use NextDeveloper\Commons\Common\Cache\Traits\CleanCache;
use NextDeveloper\Commons\Database\Traits\Taggable;

/**
 * MainPurchaseContracts model.
 *
 * @package  NextDeveloper\Stay\Database\Models
 * @property integer $id
 * @property string $uuid
 * @property string $external_id
 * @property $name
 * @property string $observations
 * @property string $internal_observations
 * @property boolean $is_active
 * @property boolean $is_approved
 * @property \Carbon\Carbon $approved_at
 * @property \Carbon\Carbon $season_start_date
 * @property \Carbon\Carbon $season_end_date
 * @property \Carbon\Carbon $booking_start_date
 * @property \Carbon\Carbon $booking_end_date
 * @property \Carbon\Carbon $guarantee_start_date
 * @property \Carbon\Carbon $guarantee_end_date
 * @property integer $minimum_nights
 * @property integer $maximum_nights
 * @property $value
 * @property $calculation_type
 * @property $provider_commission
 * @property $provider_commission_type
 * @property $extranet_commission
 * @property integer $initial_quota
 * @property integer $guaranteed_quota
 * @property boolean $return_security_quota
 * @property boolean $has_own_extranet_quota
 * @property integer $minimum_age
 * @property integer $age_range_a_from
 * @property integer $age_range_a_to
 * @property integer $age_range_b_to
 * @property integer $age_range_c_to
 * @property boolean $is_free_rate
 * @property boolean $is_extranet_enabled
 * @property boolean $has_multi_markup
 * @property boolean $has_recommended_prices
 * @property boolean $requires_immediate_payment
 * @property boolean $is_non_refundable
 * @property boolean $has_destination_payment
 * @property boolean $is_package_enabled
 * @property boolean $is_blocked
 * @property boolean $notify_integrator_bookings
 * @property $representative_name
 * @property $representative_position
 * @property $responsible_person
 * @property $hotel_booking_email
 * @property $valuation_email
 * @property integer $common_currency_id
 * @property integer $parent_stay_main_purchase_contract_id
 * @property integer $stay_tarif_type_id
 * @property integer $stay_hotel_id
 * @property integer $iam_account_id
 * @property integer $iam_user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class MainPurchaseContracts extends Model
{
    use Filterable, CleanCache, Taggable;
    use UuidId;
    use SoftDeletes;


    public $timestamps = true;




    protected $table = 'stay_main_purchase_contracts';


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
            'season_start_date',
            'season_end_date',
            'booking_start_date',
            'booking_end_date',
            'guarantee_start_date',
            'guarantee_end_date',
            'minimum_nights',
            'maximum_nights',
            'value',
            'calculation_type',
            'provider_commission',
            'provider_commission_type',
            'extranet_commission',
            'initial_quota',
            'guaranteed_quota',
            'return_security_quota',
            'has_own_extranet_quota',
            'minimum_age',
            'age_range_a_from',
            'age_range_a_to',
            'age_range_b_to',
            'age_range_c_to',
            'is_free_rate',
            'is_extranet_enabled',
            'has_multi_markup',
            'has_recommended_prices',
            'requires_immediate_payment',
            'is_non_refundable',
            'has_destination_payment',
            'is_package_enabled',
            'is_blocked',
            'notify_integrator_bookings',
            'representative_name',
            'representative_position',
            'responsible_person',
            'hotel_booking_email',
            'valuation_email',
            'common_currency_id',
            'parent_stay_main_purchase_contract_id',
            'stay_tarif_type_id',
            'stay_hotel_id',
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
    'external_id' => 'string',
    'observations' => 'string',
    'internal_observations' => 'string',
    'is_active' => 'boolean',
    'is_approved' => 'boolean',
    'approved_at' => 'datetime',
    'season_start_date' => 'datetime',
    'season_end_date' => 'datetime',
    'booking_start_date' => 'datetime',
    'booking_end_date' => 'datetime',
    'guarantee_start_date' => 'datetime',
    'guarantee_end_date' => 'datetime',
    'minimum_nights' => 'integer',
    'maximum_nights' => 'integer',
    'initial_quota' => 'integer',
    'guaranteed_quota' => 'integer',
    'return_security_quota' => 'boolean',
    'has_own_extranet_quota' => 'boolean',
    'minimum_age' => 'integer',
    'age_range_a_from' => 'integer',
    'age_range_a_to' => 'integer',
    'age_range_b_to' => 'integer',
    'age_range_c_to' => 'integer',
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
    'common_currency_id' => 'integer',
    'parent_stay_main_purchase_contract_id' => 'integer',
    'stay_tarif_type_id' => 'integer',
    'stay_hotel_id' => 'integer',
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
        parent::observe(MainPurchaseContractsObserver::class);

        self::registerScopes();
    }

    public static function registerScopes()
    {
        $globalScopes = config('stay.scopes.global');
        $modelScopes = config('stay.scopes.stay_main_purchase_contracts');

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
