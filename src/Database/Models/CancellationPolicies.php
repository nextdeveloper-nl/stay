<?php

namespace NextDeveloper\Stay\Database\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use NextDeveloper\Commons\Database\Traits\Filterable;
use NextDeveloper\Stay\Database\Observers\CancellationPoliciesObserver;
use NextDeveloper\Commons\Database\Traits\UuidId;
use NextDeveloper\Commons\Common\Cache\Traits\CleanCache;
use NextDeveloper\Commons\Database\Traits\Taggable;

/**
 * CancellationPolicies model.
 *
 * @package  NextDeveloper\Stay\Database\Models
 * @property integer $id
 * @property string $uuid
 * @property string $name
 * @property string $observation
 * @property boolean $visible
 * @property integer $parent_stay_cancellation_policy_id
 * @property string $product_type
 * @property \Carbon\Carbon $booking_start_date
 * @property \Carbon\Carbon $booking_end_date
 * @property \Carbon\Carbon $travel_start_date
 * @property \Carbon\Carbon $travel_end_date
 * @property string $description_es
 * @property string $description_en
 * @property integer $priority
 * @property $rules
 * @property integer $common_currency_id
 * @property $xml_config
 * @property boolean $is_verified
 * @property boolean $is_default
 * @property string $external_id
 * @property integer $stay_agency_group_id
 * @property integer $iam_account_id
 * @property integer $iam_user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class CancellationPolicies extends Model
{
    use Filterable, UuidId, CleanCache, Taggable;
    use SoftDeletes;


    public $timestamps = true;

    protected $table = 'stay_cancellation_policies';


    /**
     @var array
     */
    protected $guarded = [];

    protected $fillable = [
            'name',
            'observation',
            'visible',
            'parent_stay_cancellation_policy_id',
            'product_type',
            'booking_start_date',
            'booking_end_date',
            'travel_start_date',
            'travel_end_date',
            'description_es',
            'description_en',
            'priority',
            'rules',
            'common_currency_id',
            'xml_config',
            'is_verified',
            'is_default',
            'external_id',
            'stay_agency_group_id',
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
    'name' => 'string',
    'observation' => 'string',
    'visible' => 'boolean',
    'parent_stay_cancellation_policy_id' => 'integer',
    'product_type' => 'string',
    'booking_start_date' => 'datetime',
    'booking_end_date' => 'datetime',
    'travel_start_date' => 'datetime',
    'travel_end_date' => 'datetime',
    'description_es' => 'string',
    'description_en' => 'string',
    'priority' => 'integer',
    'rules' => 'array',
    'common_currency_id' => 'integer',
    'xml_config' => 'array',
    'is_verified' => 'boolean',
    'is_default' => 'boolean',
    'external_id' => 'string',
    'stay_agency_group_id' => 'integer',
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
    'travel_start_date',
    'travel_end_date',
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
        parent::observe(CancellationPoliciesObserver::class);

        self::registerScopes();
    }

    public static function registerScopes()
    {
        $globalScopes = config('stay.scopes.global');
        $modelScopes = config('stay.scopes.stay_cancellation_policies');

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
