<?php

namespace NextDeveloper\Stay\Database\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use NextDeveloper\Commons\Database\Traits\Filterable;
use NextDeveloper\Stay\Database\Observers\RatesObserver;
use NextDeveloper\Commons\Database\Traits\UuidId;
use NextDeveloper\Commons\Common\Cache\Traits\CleanCache;
use NextDeveloper\Commons\Database\Traits\Taggable;

/**
 * Rates model.
 *
 * @package  NextDeveloper\Stay\Database\Models
 * @property integer $id
 * @property string $uuid
 * @property $external_id
 * @property $rate_mode
 * @property $rate_type
 * @property boolean $has_fixed_prices
 * @property boolean $allows_zero_prices
 * @property boolean $is_guaranteed
 * @property boolean $is_cost_validated
 * @property integer $age_range_a_from
 * @property integer $age_range_a_to
 * @property integer $age_range_b_to
 * @property \Carbon\Carbon $booking_start_date
 * @property \Carbon\Carbon $booking_end_date
 * @property $child_a_discount_1
 * @property $child_a_discount_2
 * @property $child_a_discount_3
 * @property $child_a_discount_4
 * @property $child_a_discount_5
 * @property $child_b_discount_1
 * @property $child_b_discount_2
 * @property $child_b_discount_3
 * @property $child_b_discount_4
 * @property $child_b_discount_5
 * @property $additional_discount_1
 * @property $additional_discount_2
 * @property $additional_discount_3
 * @property $additional_discount_4
 * @property $additional_discount_5
 * @property $additional_discount_6
 * @property $additional_discount_7
 * @property $additional_discount_8
 * @property $markup_percentage
 * @property $fixed_markup
 * @property $supplement_markup
 * @property $recommended_profit
 * @property integer $stay_hotel_id
 * @property integer $stay_parent_rate_id
 * @property integer $stay_hotel_contract_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class Rates extends Model
{
    use Filterable, UuidId, CleanCache, Taggable;
    use SoftDeletes;


    public $timestamps = true;

    protected $table = 'stay_rates';


    /**
     @var array
     */
    protected $guarded = [];

    protected $fillable = [
            'external_id',
            'rate_mode',
            'rate_type',
            'has_fixed_prices',
            'allows_zero_prices',
            'is_guaranteed',
            'is_cost_validated',
            'age_range_a_from',
            'age_range_a_to',
            'age_range_b_to',
            'booking_start_date',
            'booking_end_date',
            'child_a_discount_1',
            'child_a_discount_2',
            'child_a_discount_3',
            'child_a_discount_4',
            'child_a_discount_5',
            'child_b_discount_1',
            'child_b_discount_2',
            'child_b_discount_3',
            'child_b_discount_4',
            'child_b_discount_5',
            'additional_discount_1',
            'additional_discount_2',
            'additional_discount_3',
            'additional_discount_4',
            'additional_discount_5',
            'additional_discount_6',
            'additional_discount_7',
            'additional_discount_8',
            'markup_percentage',
            'fixed_markup',
            'supplement_markup',
            'recommended_profit',
            'stay_hotel_id',
            'stay_parent_rate_id',
            'stay_hotel_contract_id',
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
    'has_fixed_prices' => 'boolean',
    'allows_zero_prices' => 'boolean',
    'is_guaranteed' => 'boolean',
    'is_cost_validated' => 'boolean',
    'age_range_a_from' => 'integer',
    'age_range_a_to' => 'integer',
    'age_range_b_to' => 'integer',
    'booking_start_date' => 'datetime',
    'booking_end_date' => 'datetime',
    'stay_hotel_id' => 'integer',
    'stay_parent_rate_id' => 'integer',
    'stay_hotel_contract_id' => 'integer',
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
    'booking_start_date',
    'booking_end_date',
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
        parent::observe(RatesObserver::class);

        self::registerScopes();
    }

    public static function registerScopes()
    {
        $globalScopes = config('stay.scopes.global');
        $modelScopes = config('stay.scopes.stay_rates');

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
