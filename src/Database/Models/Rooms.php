<?php

namespace NextDeveloper\Stay\Database\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use NextDeveloper\Commons\Database\Traits\Filterable;
use NextDeveloper\Stay\Database\Observers\RoomsObserver;
use NextDeveloper\Commons\Database\Traits\UuidId;
use NextDeveloper\Commons\Common\Cache\Traits\CleanCache;
use NextDeveloper\Commons\Database\Traits\Taggable;

/**
 * Rooms model.
 *
 * @package  NextDeveloper\Stay\Database\Models
 * @property integer $id
 * @property string $uuid
 * @property integer $stay_hotel_id
 * @property integer $stay_room_type_id
 * @property $price
 * @property $extra_adult_price
 * @property integer $display_order
 * @property $external_code
 * @property $minimum_price
 * @property $maximum_price
 * @property integer $min_child_age
 * @property boolean $is_non_refundable
 * @property $room_size
 * @property $room_size_unit
 * @property integer $max_infants
 * @property $original_name
 * @property boolean $is_active
 * @property boolean $is_hidden_in_allotment
 * @property boolean $child_can_be_priced_as_adult
 * @property boolean $infant_priced_as_child
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class Rooms extends Model
{
    use Filterable, UuidId, CleanCache, Taggable;
    use SoftDeletes;


    public $timestamps = true;

    protected $table = 'stay_rooms';


    /**
     @var array
     */
    protected $guarded = [];

    protected $fillable = [
            'stay_hotel_id',
            'stay_room_type_id',
            'price',
            'extra_adult_price',
            'display_order',
            'external_code',
            'minimum_price',
            'maximum_price',
            'min_child_age',
            'is_non_refundable',
            'room_size',
            'room_size_unit',
            'max_infants',
            'original_name',
            'is_active',
            'is_hidden_in_allotment',
            'child_can_be_priced_as_adult',
            'infant_priced_as_child',
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
    'stay_hotel_id' => 'integer',
    'stay_room_type_id' => 'integer',
    'display_order' => 'integer',
    'min_child_age' => 'integer',
    'is_non_refundable' => 'boolean',
    'max_infants' => 'integer',
    'is_active' => 'boolean',
    'is_hidden_in_allotment' => 'boolean',
    'child_can_be_priced_as_adult' => 'boolean',
    'infant_priced_as_child' => 'boolean',
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
        parent::observe(RoomsObserver::class);

        self::registerScopes();
    }

    public static function registerScopes()
    {
        $globalScopes = config('stay.scopes.global');
        $modelScopes = config('stay.scopes.stay_rooms');

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

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n\n\n\n\n\n\n


























































}
