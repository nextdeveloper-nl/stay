<?php

namespace NextDeveloper\Stay\Database\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use NextDeveloper\Commons\Database\Traits\Filterable;
use NextDeveloper\Stay\Database\Observers\AgencyGroupsObserver;
use NextDeveloper\Commons\Database\Traits\UuidId;
use NextDeveloper\Commons\Common\Cache\Traits\CleanCache;
use NextDeveloper\Commons\Database\Traits\Taggable;

/**
 * AgencyGroups model.
 *
 * @package  NextDeveloper\Stay\Database\Models
 * @property integer $id
 * @property string $uuid
 * @property string $name
 * @property string $observation
 * @property boolean $visible
 * @property string $codes
 * @property integer $marketplace_account_id
 * @property boolean $has_external_manager
 * @property boolean $round_commission_discount
 * @property boolean $notify_blocked_client
 * @property boolean $taxes_included
 * @property string $agency_reference_validator
 * @property boolean $external_commission_visible
 * @property $external_commission_percentage
 * @property boolean $block_agencies
 * @property boolean $external_commission_editable
 * @property boolean $commissionable_price
 * @property boolean $deny_markups
 * @property boolean $allow_price_increase
 * @property boolean $allow_price_decrease
 * @property $maximum_allowed_amount_percentage
 * @property boolean $indirect_sale_commission
 * @property string $tax_regime_type
 * @property string $external_id
 * @property integer $iam_account_id
 * @property integer $iam_user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class AgencyGroups extends Model
{
    use Filterable, UuidId, CleanCache, Taggable;
    use SoftDeletes;


    public $timestamps = true;

    protected $table = 'stay_agency_groups';


    /**
     @var array
     */
    protected $guarded = [];

    protected $fillable = [
            'name',
            'observation',
            'visible',
            'codes',
            'marketplace_account_id',
            'has_external_manager',
            'round_commission_discount',
            'notify_blocked_client',
            'taxes_included',
            'agency_reference_validator',
            'external_commission_visible',
            'external_commission_percentage',
            'block_agencies',
            'external_commission_editable',
            'commissionable_price',
            'deny_markups',
            'allow_price_increase',
            'allow_price_decrease',
            'maximum_allowed_amount_percentage',
            'indirect_sale_commission',
            'tax_regime_type',
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
    'name' => 'string',
    'observation' => 'string',
    'visible' => 'boolean',
    'codes' => 'string',
    'marketplace_account_id' => 'integer',
    'has_external_manager' => 'boolean',
    'round_commission_discount' => 'boolean',
    'notify_blocked_client' => 'boolean',
    'taxes_included' => 'boolean',
    'agency_reference_validator' => 'string',
    'external_commission_visible' => 'boolean',
    'block_agencies' => 'boolean',
    'external_commission_editable' => 'boolean',
    'commissionable_price' => 'boolean',
    'deny_markups' => 'boolean',
    'allow_price_increase' => 'boolean',
    'allow_price_decrease' => 'boolean',
    'indirect_sale_commission' => 'boolean',
    'tax_regime_type' => 'string',
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
        parent::observe(AgencyGroupsObserver::class);

        self::registerScopes();
    }

    public static function registerScopes()
    {
        $globalScopes = config('stay.scopes.global');
        $modelScopes = config('stay.scopes.stay_agency_groups');

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
