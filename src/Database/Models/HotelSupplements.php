<?php

namespace NextDeveloper\Stay\Database\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use NextDeveloper\Commons\Database\Traits\Filterable;
use NextDeveloper\Stay\Database\Observers\HotelSupplementsObserver;
use NextDeveloper\Commons\Database\Traits\UuidId;
use NextDeveloper\Commons\Common\Cache\Traits\CleanCache;
use NextDeveloper\Commons\Database\Traits\Taggable;

/**
 * HotelSupplements model.
 *
 * @package  NextDeveloper\Stay\Database\Models
 * @property integer $id
 * @property string $uuid
 * @property integer $stay_hotel_supplement_type_id
 * @property \Carbon\Carbon $start_date
 * @property \Carbon\Carbon $end_date
 * @property boolean $is_active
 * @property boolean $is_searcher
 * @property boolean $is_total
 * @property boolean $is_on_request
 * @property $quantity
 * @property boolean $is_percentage
 * @property string $value
 * @property string $information
 * @property boolean $show_in_bonus
 * @property boolean $apply_entry_day
 * @property integer $stay_provider_id
 * @property integer $stay_product_group_id
 * @property integer $stay_sale_contract_id
 * @property integer $price_guarantee
 * @property integer $cost_price_guarantee
 * @property integer $stay_rate_id
 * @property \Carbon\Carbon $payment_date
 * @property $payment_percentage
 * @property boolean $is_early_booking
 * @property $price_type
 * @property boolean $is_discount
 * @property \Carbon\Carbon $creation_date
 * @property \Carbon\Carbon $collection_date
 * @property boolean $is_direct_payment
 * @property integer $stay_hotel_supplement_class_id
 * @property integer $parent_stay_hotel_supplement_id
 * @property boolean $is_associated_contract
 * @property string $promo_text
 * @property integer $base_regime_id
 * @property integer $base_room_type_id
 * @property integer $stay_offer_supplement_type_id
 * @property boolean $has_associated_quota
 * @property boolean $is_special_regime
 * @property \Carbon\Carbon $reservation_start_date
 * @property \Carbon\Carbon $reservation_end_date
 * @property boolean $is_migrated
 * @property boolean $is_by_season
 * @property $season_quote
 * @property $currency
 * @property integer $shift_days
 * @property boolean $show_in_voucher
 * @property boolean $created_by_hotel
 * @property boolean $is_sent
 * @property boolean $is_rate
 * @property $fixed_payment_amount
 * @property $fixed_sale_payment_amount
 * @property boolean $is_promo_text_mandatory
 * @property boolean $round_sale
 * @property boolean $is_version_disabled
 * @property boolean $is_versionable
 * @property boolean $included_extranet_contracts
 * @property boolean $is_per_pax
 * @property boolean $is_early_settled
 * @property boolean $is_historic
 * @property integer $priority
 * @property $adult_export_code
 * @property $child_export_code
 * @property boolean $is_migrated_information
 * @property integer $base_supplement_type_id
 * @property boolean $is_extranet
 * @property boolean $apply_special_markup
 * @property boolean $is_packaged
 * @property $supplement_application
 * @property $supplement_type
 * @property boolean $is_mandatory
 * @property boolean $is_fair_rate
 * @property boolean $is_whole_stay
 * @property boolean $is_not_whole_stay
 * @property boolean $duration_applies_to_reservation
 * @property boolean $apply_default_additionals
 * @property boolean $apply_default_children
 * @property $entry_weekdays
 * @property boolean $apply_exit_weekdays
 * @property $apply_weekdays
 * @property integer $min_reservation_days
 * @property integer $max_reservation_days
 * @property integer $min_advance_days
 * @property integer $max_advance_days
 * @property $generic_type
 * @property boolean $has_baby_occupancy
 * @property integer $child_range_from_a
 * @property integer $child_range_to_a
 * @property integer $child_range_to_b
 * @property boolean $free_additional1
 * @property boolean $free_additional2
 * @property boolean $free_additional_more
 * @property boolean $free_child_a1
 * @property boolean $free_child_a2
 * @property boolean $free_child_a_more
 * @property boolean $free_child_b1
 * @property boolean $free_child_b2
 * @property boolean $free_child_b_more
 * @property integer $regime_change_from_id
 * @property integer $regime_change_to_id
 * @property integer $room_upgrade_from_id
 * @property integer $room_upgrade_to_id
 * @property integer $free_nights_per_each
 * @property integer $free_nights_number
 * @property $free_nights_type
 * @property boolean $free_nights_only_once
 * @property boolean $is_non_refundable
 * @property integer $minimum_age
 * @property boolean $has_shifted_dates
 * @property boolean $is_whole_stay_price
 * @property $price_types
 * @property boolean $applies_only_stay_duration
 * @property integer $service_duration
 * @property integer $min_pax
 * @property integer $max_pax
 * @property $provider_commission
 * @property $client_commissionable
 * @property integer $multiple_stay_days
 * @property integer $access_control_group
 * @property integer $resident_application
 * @property $external_code
 * @property string $external_id
 * @property integer $iam_account_id
 * @property integer $iam_user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class HotelSupplements extends Model
{
    use Filterable, CleanCache, Taggable;
    use UuidId;
    use SoftDeletes;


    public $timestamps = true;




    protected $table = 'stay_hotel_supplements';


    /**
     @var array
     */
    protected $guarded = [];

    protected $fillable = [
            'stay_hotel_supplement_type_id',
            'start_date',
            'end_date',
            'is_active',
            'is_searcher',
            'is_total',
            'is_on_request',
            'quantity',
            'is_percentage',
            'value',
            'information',
            'show_in_bonus',
            'apply_entry_day',
            'stay_provider_id',
            'stay_product_group_id',
            'stay_sale_contract_id',
            'price_guarantee',
            'cost_price_guarantee',
            'stay_rate_id',
            'payment_date',
            'payment_percentage',
            'is_early_booking',
            'price_type',
            'is_discount',
            'creation_date',
            'collection_date',
            'is_direct_payment',
            'stay_hotel_supplement_class_id',
            'parent_stay_hotel_supplement_id',
            'is_associated_contract',
            'promo_text',
            'base_regime_id',
            'base_room_type_id',
            'stay_offer_supplement_type_id',
            'has_associated_quota',
            'is_special_regime',
            'reservation_start_date',
            'reservation_end_date',
            'is_migrated',
            'is_by_season',
            'season_quote',
            'currency',
            'shift_days',
            'show_in_voucher',
            'created_by_hotel',
            'is_sent',
            'is_rate',
            'fixed_payment_amount',
            'fixed_sale_payment_amount',
            'is_promo_text_mandatory',
            'round_sale',
            'is_version_disabled',
            'is_versionable',
            'included_extranet_contracts',
            'is_per_pax',
            'is_early_settled',
            'is_historic',
            'priority',
            'adult_export_code',
            'child_export_code',
            'is_migrated_information',
            'base_supplement_type_id',
            'is_extranet',
            'apply_special_markup',
            'is_packaged',
            'supplement_application',
            'supplement_type',
            'is_mandatory',
            'is_fair_rate',
            'is_whole_stay',
            'is_not_whole_stay',
            'duration_applies_to_reservation',
            'apply_default_additionals',
            'apply_default_children',
            'entry_weekdays',
            'apply_exit_weekdays',
            'apply_weekdays',
            'min_reservation_days',
            'max_reservation_days',
            'min_advance_days',
            'max_advance_days',
            'generic_type',
            'has_baby_occupancy',
            'child_range_from_a',
            'child_range_to_a',
            'child_range_to_b',
            'free_additional1',
            'free_additional2',
            'free_additional_more',
            'free_child_a1',
            'free_child_a2',
            'free_child_a_more',
            'free_child_b1',
            'free_child_b2',
            'free_child_b_more',
            'regime_change_from_id',
            'regime_change_to_id',
            'room_upgrade_from_id',
            'room_upgrade_to_id',
            'free_nights_per_each',
            'free_nights_number',
            'free_nights_type',
            'free_nights_only_once',
            'is_non_refundable',
            'minimum_age',
            'has_shifted_dates',
            'is_whole_stay_price',
            'price_types',
            'applies_only_stay_duration',
            'service_duration',
            'min_pax',
            'max_pax',
            'provider_commission',
            'client_commissionable',
            'multiple_stay_days',
            'access_control_group',
            'resident_application',
            'external_code',
            'external_id',
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
    'stay_hotel_supplement_type_id' => 'integer',
    'start_date' => 'datetime',
    'end_date' => 'datetime',
    'is_active' => 'boolean',
    'is_searcher' => 'boolean',
    'is_total' => 'boolean',
    'is_on_request' => 'boolean',
    'is_percentage' => 'boolean',
    'value' => 'string',
    'information' => 'string',
    'show_in_bonus' => 'boolean',
    'apply_entry_day' => 'boolean',
    'stay_provider_id' => 'integer',
    'stay_product_group_id' => 'integer',
    'stay_sale_contract_id' => 'integer',
    'price_guarantee' => 'integer',
    'cost_price_guarantee' => 'integer',
    'stay_rate_id' => 'integer',
    'payment_date' => 'datetime',
    'is_early_booking' => 'boolean',
    'is_discount' => 'boolean',
    'creation_date' => 'datetime',
    'collection_date' => 'datetime',
    'is_direct_payment' => 'boolean',
    'stay_hotel_supplement_class_id' => 'integer',
    'parent_stay_hotel_supplement_id' => 'integer',
    'is_associated_contract' => 'boolean',
    'promo_text' => 'string',
    'base_regime_id' => 'integer',
    'base_room_type_id' => 'integer',
    'stay_offer_supplement_type_id' => 'integer',
    'has_associated_quota' => 'boolean',
    'is_special_regime' => 'boolean',
    'reservation_start_date' => 'datetime',
    'reservation_end_date' => 'datetime',
    'is_migrated' => 'boolean',
    'is_by_season' => 'boolean',
    'shift_days' => 'integer',
    'show_in_voucher' => 'boolean',
    'created_by_hotel' => 'boolean',
    'is_sent' => 'boolean',
    'is_rate' => 'boolean',
    'is_promo_text_mandatory' => 'boolean',
    'round_sale' => 'boolean',
    'is_version_disabled' => 'boolean',
    'is_versionable' => 'boolean',
    'included_extranet_contracts' => 'boolean',
    'is_per_pax' => 'boolean',
    'is_early_settled' => 'boolean',
    'is_historic' => 'boolean',
    'priority' => 'integer',
    'is_migrated_information' => 'boolean',
    'base_supplement_type_id' => 'integer',
    'is_extranet' => 'boolean',
    'apply_special_markup' => 'boolean',
    'is_packaged' => 'boolean',
    'is_mandatory' => 'boolean',
    'is_fair_rate' => 'boolean',
    'is_whole_stay' => 'boolean',
    'is_not_whole_stay' => 'boolean',
    'duration_applies_to_reservation' => 'boolean',
    'apply_default_additionals' => 'boolean',
    'apply_default_children' => 'boolean',
    'apply_exit_weekdays' => 'boolean',
    'min_reservation_days' => 'integer',
    'max_reservation_days' => 'integer',
    'min_advance_days' => 'integer',
    'max_advance_days' => 'integer',
    'has_baby_occupancy' => 'boolean',
    'child_range_from_a' => 'integer',
    'child_range_to_a' => 'integer',
    'child_range_to_b' => 'integer',
    'free_additional1' => 'boolean',
    'free_additional2' => 'boolean',
    'free_additional_more' => 'boolean',
    'free_child_a1' => 'boolean',
    'free_child_a2' => 'boolean',
    'free_child_a_more' => 'boolean',
    'free_child_b1' => 'boolean',
    'free_child_b2' => 'boolean',
    'free_child_b_more' => 'boolean',
    'regime_change_from_id' => 'integer',
    'regime_change_to_id' => 'integer',
    'room_upgrade_from_id' => 'integer',
    'room_upgrade_to_id' => 'integer',
    'free_nights_per_each' => 'integer',
    'free_nights_number' => 'integer',
    'free_nights_only_once' => 'boolean',
    'is_non_refundable' => 'boolean',
    'minimum_age' => 'integer',
    'has_shifted_dates' => 'boolean',
    'is_whole_stay_price' => 'boolean',
    'applies_only_stay_duration' => 'boolean',
    'service_duration' => 'integer',
    'min_pax' => 'integer',
    'max_pax' => 'integer',
    'multiple_stay_days' => 'integer',
    'access_control_group' => 'integer',
    'resident_application' => 'integer',
    'external_id' => 'string',
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
    'start_date',
    'end_date',
    'payment_date',
    'creation_date',
    'collection_date',
    'reservation_start_date',
    'reservation_end_date',
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
        parent::observe(HotelSupplementsObserver::class);

        self::registerScopes();
    }

    public static function registerScopes()
    {
        $globalScopes = config('stay.scopes.global');
        $modelScopes = config('stay.scopes.stay_hotel_supplements');

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
