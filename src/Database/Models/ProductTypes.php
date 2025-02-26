<?php

namespace NextDeveloper\Stay\Database\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use NextDeveloper\Commons\Database\Traits\Filterable;
use NextDeveloper\Stay\Database\Observers\ProductTypesObserver;
use NextDeveloper\Commons\Database\Traits\UuidId;
use NextDeveloper\Commons\Common\Cache\Traits\CleanCache;
use NextDeveloper\Commons\Database\Traits\Taggable;

/**
 * ProductTypes model.
 *
 * @package  NextDeveloper\Stay\Database\Models
 * @property integer $id
 * @property string $uuid
 * @property string $name
 * @property boolean $product_independent
 * @property string $library
 * @property string $reservation_class
 * @property boolean $is_public
 * @property string $description
 * @property string $external_provider
 * @property boolean $visible
 * @property string $module_type
 * @property string $module_type_en
 * @property string $module_type_es
 * @property boolean $is_direct_booking
 * @property boolean $is_visible_intranet
 * @property string $external_id
 * @property integer $iam_account_id
 * @property integer $iam_user_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class ProductTypes extends Model
{
    use Filterable, CleanCache, Taggable;
    use UuidId;
    use SoftDeletes;


    public $timestamps = true;




    protected $table = 'stay_product_types';


    /**
     @var array
     */
    protected $guarded = [];

    protected $fillable = [
            'name',
            'product_independent',
            'library',
            'reservation_class',
            'is_public',
            'description',
            'external_provider',
            'visible',
            'module_type',
            'module_type_en',
            'module_type_es',
            'is_direct_booking',
            'is_visible_intranet',
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
    'product_independent' => 'boolean',
    'library' => 'string',
    'reservation_class' => 'string',
    'is_public' => 'boolean',
    'description' => 'string',
    'external_provider' => 'string',
    'visible' => 'boolean',
    'module_type' => 'string',
    'module_type_en' => 'string',
    'module_type_es' => 'string',
    'is_direct_booking' => 'boolean',
    'is_visible_intranet' => 'boolean',
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
        parent::observe(ProductTypesObserver::class);

        self::registerScopes();
    }

    public static function registerScopes()
    {
        $globalScopes = config('stay.scopes.global');
        $modelScopes = config('stay.scopes.stay_product_types');

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
