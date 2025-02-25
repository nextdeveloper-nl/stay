<?php

namespace NextDeveloper\Stay\Database\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use NextDeveloper\Commons\Database\Traits\Filterable;
use NextDeveloper\Stay\Database\Observers\DelegationsObserver;
use NextDeveloper\Commons\Database\Traits\UuidId;
use NextDeveloper\Commons\Common\Cache\Traits\CleanCache;
use NextDeveloper\Commons\Database\Traits\Taggable;

/**
 * Delegations model.
 *
 * @package  NextDeveloper\Stay\Database\Models
 * @property integer $id
 * @property string $uuid
 * @property string $name
 * @property string $address
 * @property string $phone
 * @property string $fax
 * @property string $schedule
 * @property string $photo
 * @property string $sales_responsible
 * @property string $purchases_responsible
 * @property boolean $is_active
 * @property string $all_groups_id
 * @property string $send_all_groups_id
 * @property string $code_analitic
 * @property string $letter_tickets
 * @property string $send_extranet
 * @property boolean $send_always
 * @property boolean $send_reservation_user_category
 * @property string $external_id
 * @property integer $iam_account_id
 * @property integer $iam_user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class Delegations extends Model
{
    use Filterable, UuidId, CleanCache, Taggable;
    use SoftDeletes;


    public $timestamps = true;

    protected $table = 'stay_delegations';


    /**
     @var array
     */
    protected $guarded = [];

    protected $fillable = [
            'name',
            'address',
            'phone',
            'fax',
            'schedule',
            'photo',
            'sales_responsible',
            'purchases_responsible',
            'is_active',
            'all_groups_id',
            'send_all_groups_id',
            'code_analitic',
            'letter_tickets',
            'send_extranet',
            'send_always',
            'send_reservation_user_category',
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
    'address' => 'string',
    'phone' => 'string',
    'fax' => 'string',
    'schedule' => 'string',
    'photo' => 'string',
    'sales_responsible' => 'string',
    'purchases_responsible' => 'string',
    'is_active' => 'boolean',
    'all_groups_id' => 'string',
    'send_all_groups_id' => 'string',
    'code_analitic' => 'string',
    'letter_tickets' => 'string',
    'send_extranet' => 'string',
    'send_always' => 'boolean',
    'send_reservation_user_category' => 'boolean',
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
        parent::observe(DelegationsObserver::class);

        self::registerScopes();
    }

    public static function registerScopes()
    {
        $globalScopes = config('stay.scopes.global');
        $modelScopes = config('stay.scopes.stay_delegations');

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
