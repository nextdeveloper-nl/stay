<?php

namespace NextDeveloper\Stay\Database\Filters;

use Illuminate\Database\Eloquent\Builder;
use NextDeveloper\Commons\Database\Filters\AbstractQueryFilter;
                

/**
 * This class automatically puts where clause on database so that use can filter
 * data returned from the query.
 */
class ReservationsQueryFilter extends AbstractQueryFilter
{

    /**
     * @var Builder
     */
    protected $builder;

    public function reservationDateStart($date)
    {
        return $this->builder->where('reservation_date', '>=', $date);
    }

    public function reservationDateEnd($date)
    {
        return $this->builder->where('reservation_date', '<=', $date);
    }

    public function createdAtStart($date)
    {
        return $this->builder->where('created_at', '>=', $date);
    }

    public function createdAtEnd($date)
    {
        return $this->builder->where('created_at', '<=', $date);
    }

    public function updatedAtStart($date)
    {
        return $this->builder->where('updated_at', '>=', $date);
    }

    public function updatedAtEnd($date)
    {
        return $this->builder->where('updated_at', '<=', $date);
    }

    public function deletedAtStart($date)
    {
        return $this->builder->where('deleted_at', '>=', $date);
    }

    public function deletedAtEnd($date)
    {
        return $this->builder->where('deleted_at', '<=', $date);
    }

    public function stayHotelsId($value)
    {
            $stayHotels = \NextDeveloper\Stay\Database\Models\Hotels::where('uuid', $value)->first();

        if($stayHotels) {
            return $this->builder->where('stay_hotels_id', '=', $stayHotels->id);
        }
    }

    public function stayRoomId($value)
    {
            $stayRoom = \NextDeveloper\Stay\Database\Models\Rooms::where('uuid', $value)->first();

        if($stayRoom) {
            return $this->builder->where('stay_room_id', '=', $stayRoom->id);
        }
    }

    public function stayRoomTypeId($value)
    {
            $stayRoomType = \NextDeveloper\Stay\Database\Models\RoomTypes::where('uuid', $value)->first();

        if($stayRoomType) {
            return $this->builder->where('stay_room_type_id', '=', $stayRoomType->id);
        }
    }

    public function iamUserId($value)
    {
            $iamUser = \NextDeveloper\IAM\Database\Models\Users::where('uuid', $value)->first();

        if($iamUser) {
            return $this->builder->where('iam_user_id', '=', $iamUser->id);
        }
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n\n\n





















}
