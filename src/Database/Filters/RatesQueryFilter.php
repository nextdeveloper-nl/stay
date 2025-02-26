<?php

namespace NextDeveloper\Stay\Database\Filters;

use Illuminate\Database\Eloquent\Builder;
use NextDeveloper\Commons\Database\Filters\AbstractQueryFilter;
            

/**
 * This class automatically puts where clause on database so that use can filter
 * data returned from the query.
 */
class RatesQueryFilter extends AbstractQueryFilter
{

    /**
     * @var Builder
     */
    protected $builder;

    public function ageRangeAFrom($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('age_range_a_from', $operator, $value);
    }

    public function ageRangeATo($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('age_range_a_to', $operator, $value);
    }

    public function ageRangeBTo($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('age_range_b_to', $operator, $value);
    }

    public function isGuaranteed($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_guaranteed', $value);
    }

    public function isCostValidated($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_cost_validated', $value);
    }

    public function bookingStartDateStart($date)
    {
        return $this->builder->where('booking_start_date', '>=', $date);
    }

    public function bookingStartDateEnd($date)
    {
        return $this->builder->where('booking_start_date', '<=', $date);
    }

    public function bookingEndDateStart($date)
    {
        return $this->builder->where('booking_end_date', '>=', $date);
    }

    public function bookingEndDateEnd($date)
    {
        return $this->builder->where('booking_end_date', '<=', $date);
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

    public function stayHotelId($value)
    {
            $stayHotel = \NextDeveloper\Stay\Database\Models\Hotels::where('uuid', $value)->first();

        if($stayHotel) {
            return $this->builder->where('stay_hotel_id', '=', $stayHotel->id);
        }
    }

    public function stayParentRateId($value)
    {
            $stayParentRate = \NextDeveloper\Stay\Database\Models\ParentRates::where('uuid', $value)->first();

        if($stayParentRate) {
            return $this->builder->where('stay_parent_rate_id', '=', $stayParentRate->id);
        }
    }

    public function stayHotelContractId($value)
    {
            $stayHotelContract = \NextDeveloper\Stay\Database\Models\HotelContracts::where('uuid', $value)->first();

        if($stayHotelContract) {
            return $this->builder->where('stay_hotel_contract_id', '=', $stayHotelContract->id);
        }
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE



















}
