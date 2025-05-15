<?php

namespace NextDeveloper\Stay\Database\Filters;

use Illuminate\Database\Eloquent\Builder;
use NextDeveloper\Commons\Database\Filters\AbstractQueryFilter;
        

/**
 * This class automatically puts where clause on database so that use can filter
 * data returned from the query.
 */
class RoomTypeProviderMappingsQueryFilter extends AbstractQueryFilter
{

    /**
     * @var Builder
     */
    protected $builder;
    
    public function providerRoomTypeCode($value)
    {
        return $this->builder->where('provider_room_type_code', 'like', '%' . $value . '%');
    }

    public function stayRoomTypeId($value)
    {
            $stayRoomType = \NextDeveloper\Stay\Database\Models\RoomTypes::where('uuid', $value)->first();

        if($stayRoomType) {
            return $this->builder->where('stay_room_type_id', '=', $stayRoomType->id);
        }
    }

    public function stayProviderId($value)
    {
            $stayProvider = \NextDeveloper\Stay\Database\Models\Providers::where('uuid', $value)->first();

        if($stayProvider) {
            return $this->builder->where('stay_provider_id', '=', $stayProvider->id);
        }
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE


















}
