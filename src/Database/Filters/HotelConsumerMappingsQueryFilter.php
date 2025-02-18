<?php

namespace NextDeveloper\Stay\Database\Filters;

use Illuminate\Database\Eloquent\Builder;
use NextDeveloper\Commons\Database\Filters\AbstractQueryFilter;
        

/**
 * This class automatically puts where clause on database so that use can filter
 * data returned from the query.
 */
class HotelConsumerMappingsQueryFilter extends AbstractQueryFilter
{

    /**
     * @var Builder
     */
    protected $builder;
    
    public function consumerHotelCode($value)
    {
        return $this->builder->where('consumer_hotel_code', 'like', '%' . $value . '%');
    }

    public function stayHotelId($value)
    {
            $stayHotel = \NextDeveloper\Stay\Database\Models\Hotels::where('uuid', $value)->first();

        if($stayHotel) {
            return $this->builder->where('stay_hotel_id', '=', $stayHotel->id);
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
