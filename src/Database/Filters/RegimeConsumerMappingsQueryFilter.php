<?php

namespace NextDeveloper\Stay\Database\Filters;

use Illuminate\Database\Eloquent\Builder;
use NextDeveloper\Commons\Database\Filters\AbstractQueryFilter;
        

/**
 * This class automatically puts where clause on database so that use can filter
 * data returned from the query.
 */
class RegimeConsumerMappingsQueryFilter extends AbstractQueryFilter
{

    /**
     * @var Builder
     */
    protected $builder;
    
    public function consumerRatePlanCode($value)
    {
        return $this->builder->where('consumer_rate_plan_code', 'like', '%' . $value . '%');
    }

    public function stayRegimeId($value)
    {
            $stayRegime = \NextDeveloper\Stay\Database\Models\Regimes::where('uuid', $value)->first();

        if($stayRegime) {
            return $this->builder->where('stay_regime_id', '=', $stayRegime->id);
        }
    }

    public function stayConsumerId($value)
    {
            $stayConsumer = \NextDeveloper\Stay\Database\Models\Consumers::where('uuid', $value)->first();

        if($stayConsumer) {
            return $this->builder->where('stay_consumer_id', '=', $stayConsumer->id);
        }
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE


}
