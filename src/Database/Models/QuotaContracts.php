<?php

namespace NextDeveloper\Stay\Database\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use NextDeveloper\Commons\Database\Traits\Filterable;
use NextDeveloper\Stay\Database\Observers\QuotaContractsObserver;
use NextDeveloper\Commons\Database\Traits\UuidId;
use NextDeveloper\Commons\Common\Cache\Traits\CleanCache;
use NextDeveloper\Commons\Database\Traits\Taggable;

/**
 * QuotaContracts model.
 *
 * @package  NextDeveloper\Stay\Database\Models
 * @property integer $id
 * @property string $uuid
 * @property $external_id
 * @property $name
 * @property $external_code
 * @property string $observations
 * @property boolean $is_active
 * @property \Carbon\Carbon $season_start_date
 * @property \Carbon\Carbon $season_end_date
 * @property integer $guaranteed_quota
 * @property boolean $return_security_quota
 * @property boolean $allow_negative_quota
 * @property integer $max_rooms_online
 * @property integer $max_rooms_online_request
 * @property integer $max_rooms_booking
 * @property integer $max_rooms_booking_request
 * @property boolean $is_extranet_enabled
 * @property integer $stay_hotel_id
 * @property integer $parent_stay_quota_contract_id
 * @property integer $stay_tarif_type_id
 * @property integer $iam_account_id
 * @property integer $iam_user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class QuotaContracts extends Model
{
    use Filterable, UuidId, CleanCache, Taggable;
    use SoftDeletes;


    public $timestamps = true;

    protected $table = 'stay_quota_contracts';


    /**
     @var array
     */
    protected $guarded = [];

    protected $fillable = [
            'external_id',
            'name',
            'external_code',
            'observations',
            'is_active',
            'season_start_date',
            'season_end_date',
            'guaranteed_quota',
            'return_security_quota',
            'allow_negative_quota',
            'max_rooms_online',
            'max_rooms_online_request',
            'max_rooms_booking',
            'max_rooms_booking_request',
            'is_extranet_enabled',
            'stay_hotel_id',
            'parent_stay_quota_contract_id',
            'stay_tarif_type_id',
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
    'is_active' => 'boolean',
    'season_start_date' => 'datetime',
    'season_end_date' => 'datetime',
    'guaranteed_quota' => 'integer',
    'return_security_quota' => 'boolean',
    'allow_negative_quota' => 'boolean',
    'max_rooms_online' => 'integer',
    'max_rooms_online_request' => 'integer',
    'max_rooms_booking' => 'integer',
    'max_rooms_booking_request' => 'integer',
    'is_extranet_enabled' => 'boolean',
    'stay_hotel_id' => 'integer',
    'parent_stay_quota_contract_id' => 'integer',
    'stay_tarif_type_id' => 'integer',
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
    'season_start_date',
    'season_end_date',
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
        parent::observe(QuotaContractsObserver::class);

        self::registerScopes();
    }

    public static function registerScopes()
    {
        $globalScopes = config('stay.scopes.global');
        $modelScopes = config('stay.scopes.stay_quota_contracts');

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
