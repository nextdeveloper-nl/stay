<?php

namespace NextDeveloper\Stay\Database\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use NextDeveloper\Commons\Database\Traits\Filterable;
use NextDeveloper\Stay\Database\Observers\RegimeConsumerMappingsObserver;
use NextDeveloper\Commons\Database\Traits\UuidId;
use NextDeveloper\Commons\Common\Cache\Traits\CleanCache;
use NextDeveloper\Commons\Database\Traits\Taggable;

/**
 * RegimeConsumerMappings model.
 *
 * @package  NextDeveloper\Stay\Database\Models
 * @property integer $stay_regime_id
 * @property integer $stay_consumer_id
 * @property string $consumer_rate_plan_code
 */
class RegimeConsumerMappings extends Model
{
    use Filterable, CleanCache, Taggable;


    public $timestamps = false;

    public $incrementing = false;



    protected $table = 'stay_regime_consumer_mappings';


    /**
     @var array
     */
    protected $guarded = [];

    protected $fillable = [
            'stay_regime_id',
            'stay_consumer_id',
            'consumer_rate_plan_code',
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
    'stay_regime_id' => 'integer',
    'stay_consumer_id' => 'integer',
    'consumer_rate_plan_code' => 'string',
    ];

    /**
     We are casting data fields.
     *
     @var array
     */
    protected $dates = [

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
        parent::observe(RegimeConsumerMappingsObserver::class);

        self::registerScopes();
    }

    public static function registerScopes()
    {
        $globalScopes = config('stay.scopes.global');
        $modelScopes = config('stay.scopes.stay_regime_consumer_mappings');

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
