<?php

namespace NextDeveloper\Stay\Database\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use NextDeveloper\Commons\Database\Traits\Filterable;
use NextDeveloper\Stay\Database\Observers\RatePricesObserver;
use NextDeveloper\Commons\Database\Traits\UuidId;
use NextDeveloper\Commons\Common\Cache\Traits\CleanCache;
use NextDeveloper\Commons\Database\Traits\Taggable;

/**
 * RatePrices model.
 *
 * @package  NextDeveloper\Stay\Database\Models
 * @property integer $id
 * @property string $uuid
 * @property integer $stay_rate_id
 * @property integer $stay_room_type_id
 * @property $external_id
 * @property $price_type
 * @property $base_price
 * @property $room_price
 * @property $child_a_price_1
 * @property $child_a_price_2
 * @property $child_a_price_3
 * @property $child_a_price_4
 * @property $child_a_price_5
 * @property $child_b_price_1
 * @property $child_b_price_2
 * @property $child_b_price_3
 * @property $child_b_price_4
 * @property $child_b_price_5
 * @property $additional_price_1
 * @property $additional_price_2
 * @property $additional_price_3
 * @property $additional_price_4
 * @property $additional_price_5
 * @property $additional_price_6
 * @property $additional_price_7
 * @property $additional_price_8
 * @property integer $iam_account_id
 * @property integer $iam_user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class RatePrices extends Model
{
    use Filterable, CleanCache, Taggable;
    use UuidId;
    use SoftDeletes;


    public $timestamps = true;




    protected $table = 'stay_rate_prices';


    /**
     @var array
     */
    protected $guarded = [];

    protected $fillable = [
            'stay_rate_id',
            'stay_room_type_id',
            'external_id',
            'price_type',
            'base_price',
            'room_price',
            'child_a_price_1',
            'child_a_price_2',
            'child_a_price_3',
            'child_a_price_4',
            'child_a_price_5',
            'child_b_price_1',
            'child_b_price_2',
            'child_b_price_3',
            'child_b_price_4',
            'child_b_price_5',
            'additional_price_1',
            'additional_price_2',
            'additional_price_3',
            'additional_price_4',
            'additional_price_5',
            'additional_price_6',
            'additional_price_7',
            'additional_price_8',
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
    'stay_rate_id' => 'integer',
    'stay_room_type_id' => 'integer',
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
        parent::observe(RatePricesObserver::class);

        self::registerScopes();
    }

    public static function registerScopes()
    {
        $globalScopes = config('stay.scopes.global');
        $modelScopes = config('stay.scopes.stay_rate_prices');

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
