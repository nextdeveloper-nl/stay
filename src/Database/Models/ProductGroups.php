<?php

namespace NextDeveloper\Stay\Database\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use NextDeveloper\Commons\Database\Traits\Filterable;
use NextDeveloper\Stay\Database\Observers\ProductGroupsObserver;
use NextDeveloper\Commons\Database\Traits\UuidId;
use NextDeveloper\Commons\Common\Cache\Traits\CleanCache;
use NextDeveloper\Commons\Database\Traits\Taggable;

/**
 * ProductGroups model.
 *
 * @package  NextDeveloper\Stay\Database\Models
 * @property integer $id
 * @property string $uuid
 * @property string $name
 * @property $commission_rate
 * @property $iva_commission_rate
 * @property string $quickbooks_item
 * @property string $export_code
 * @property integer $parent_id
 * @property \Carbon\Carbon $trip_end_date
 * @property \Carbon\Carbon $trip_start_date
 * @property \Carbon\Carbon $end_date
 * @property \Carbon\Carbon $start_date
 * @property integer $max_children
 * @property integer $min_children
 * @property integer $max_adults
 * @property integer $min_adults
 * @property integer $zone_id
 * @property string $channel_id
 * @property string $room
 * @property integer $status
 * @property integer $provider_id
 * @property integer $price_list_id
 * @property integer $delegation_id
 * @property integer $client_id
 * @property integer $order_number
 * @property string $export_code_c
 * @property string $export_code_vre
 * @property string $export_code_cre
 * @property string $export_code_analytic
 * @property boolean $is_default
 * @property string $commission_account
 * @property string $alternative_export_code
 * @property string $observations
 * @property $iva_commission_export_code
 * @property integer $origin_zone_id
 * @property $default_sender_email
 * @property string $external_id
 * @property integer $iam_account_id
 * @property integer $iam_user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class ProductGroups extends Model
{
    use Filterable, CleanCache, Taggable;
    use UuidId;
    use SoftDeletes;


    public $timestamps = true;




    protected $table = 'stay_product_groups';


    /**
     @var array
     */
    protected $guarded = [];

    protected $fillable = [
            'name',
            'commission_rate',
            'iva_commission_rate',
            'quickbooks_item',
            'export_code',
            'parent_id',
            'trip_end_date',
            'trip_start_date',
            'end_date',
            'start_date',
            'max_children',
            'min_children',
            'max_adults',
            'min_adults',
            'zone_id',
            'channel_id',
            'room',
            'status',
            'provider_id',
            'price_list_id',
            'delegation_id',
            'client_id',
            'order_number',
            'export_code_c',
            'export_code_vre',
            'export_code_cre',
            'export_code_analytic',
            'is_default',
            'commission_account',
            'alternative_export_code',
            'observations',
            'iva_commission_export_code',
            'origin_zone_id',
            'default_sender_email',
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
    'commission_rate' => 'double',
    'iva_commission_rate' => 'double',
    'quickbooks_item' => 'string',
    'export_code' => 'string',
    'parent_id' => 'integer',
    'trip_end_date' => 'datetime',
    'trip_start_date' => 'datetime',
    'end_date' => 'datetime',
    'start_date' => 'datetime',
    'max_children' => 'integer',
    'min_children' => 'integer',
    'max_adults' => 'integer',
    'min_adults' => 'integer',
    'zone_id' => 'integer',
    'channel_id' => 'string',
    'room' => 'string',
    'status' => 'integer',
    'provider_id' => 'integer',
    'price_list_id' => 'integer',
    'delegation_id' => 'integer',
    'client_id' => 'integer',
    'order_number' => 'integer',
    'export_code_c' => 'string',
    'export_code_vre' => 'string',
    'export_code_cre' => 'string',
    'export_code_analytic' => 'string',
    'is_default' => 'boolean',
    'commission_account' => 'string',
    'alternative_export_code' => 'string',
    'observations' => 'string',
    'origin_zone_id' => 'integer',
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
    'trip_end_date',
    'trip_start_date',
    'end_date',
    'start_date',
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
        parent::observe(ProductGroupsObserver::class);

        self::registerScopes();
    }

    public static function registerScopes()
    {
        $globalScopes = config('stay.scopes.global');
        $modelScopes = config('stay.scopes.stay_product_groups');

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
