<?php

namespace NextDeveloper\Stay\Database\Filters;

use Illuminate\Database\Eloquent\Builder;
use NextDeveloper\Commons\Database\Filters\AbstractQueryFilter;
        

/**
 * This class automatically puts where clause on database so that use can filter
 * data returned from the query.
 */
class RoomTypeConsumerMappingsQueryFilter extends AbstractQueryFilter
{

    /**
     * @var Builder
     */
    protected $builder;
    
    public function consumerRoomTypeCode($value)
    {
        return $this->builder->where('consumer_room_type_code', 'like', '%' . $value . '%');
    }

    public function stayRoomTypeId($value)
    {
            $stayRoomType = \NextDeveloper\Stay\Database\Models\RoomTypes::where('uuid', $value)->first();

        if($stayRoomType) {
            return $this->builder->where('stay_room_type_id', '=', $stayRoomType->id);
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
