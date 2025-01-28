<?php

namespace NextDeveloper\Stay\Database\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use NextDeveloper\Commons\Database\Traits\Filterable;
use NextDeveloper\Stay\Database\Observers\HotelsObserver;
use NextDeveloper\Commons\Database\Traits\UuidId;
use NextDeveloper\Commons\Common\Cache\Traits\CleanCache;
use NextDeveloper\Commons\Database\Traits\Taggable;

/**
 * Hotels model.
 *
 * @package  NextDeveloper\Stay\Database\Models
 * @property integer $id
 * @property string $uuid
 * @property string $external_id
 * @property string $name
 * @property string $description
 * @property string $address
 * @property $facilities
 * @property string $email
 * @property string $phone
 * @property string $latitude
 * @property string $longitude
 * @property boolean $is_public
 * @property integer $common_city_id
 * @property integer $common_country_id
 * @property integer $common_currency_id
 * @property integer $foreground_media_id
 * @property integer $background_media_id
 * @property integer $stay_provider_id
 * @property integer $iam_account_id
 * @property integer $iam_user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class Hotels extends Model
{
    use Filterable, UuidId, CleanCache, Taggable;
    use SoftDeletes;


    public $timestamps = true;

    protected $table = 'stay_hotels';


    /**
     @var array
     */
    protected $guarded = [];

    protected $fillable = [
            'external_id',
            'name',
            'description',
            'address',
            'facilities',
            'email',
            'phone',
            'latitude',
            'longitude',
            'is_public',
            'common_city_id',
            'common_country_id',
            'common_currency_id',
            'foreground_media_id',
            'background_media_id',
            'stay_provider_id',
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
    'name' => 'string',
    'description' => 'string',
    'address' => 'string',
    'facilities' => 'array',
    'email' => 'string',
    'phone' => 'string',
    'latitude' => 'string',
    'longitude' => 'string',
    'is_public' => 'boolean',
    'common_city_id' => 'integer',
    'common_country_id' => 'integer',
    'common_currency_id' => 'integer',
    'foreground_media_id' => 'integer',
    'background_media_id' => 'integer',
    'stay_provider_id' => 'integer',
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
        parent::observe(HotelsObserver::class);

        self::registerScopes();
    }

    public static function registerScopes()
    {
        $globalScopes = config('stay.scopes.global');
        $modelScopes = config('stay.scopes.stay_hotels');

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
