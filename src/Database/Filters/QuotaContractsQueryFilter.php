<?php

namespace NextDeveloper\Stay\Database\Filters;

use Illuminate\Database\Eloquent\Builder;
use NextDeveloper\Commons\Database\Filters\AbstractQueryFilter;
                    

/**
 * This class automatically puts where clause on database so that use can filter
 * data returned from the query.
 */
class QuotaContractsQueryFilter extends AbstractQueryFilter
{

    /**
     * @var Builder
     */
    protected $builder;
    
    public function observations($value)
    {
        return $this->builder->where('observations', 'like', '%' . $value . '%');
    }

    public function guaranteedQuota($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('guaranteed_quota', $operator, $value);
    }

    public function maxRoomsOnline($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('max_rooms_online', $operator, $value);
    }

    public function maxRoomsOnlineRequest($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('max_rooms_online_request', $operator, $value);
    }

    public function maxRoomsBooking($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('max_rooms_booking', $operator, $value);
    }

    public function maxRoomsBookingRequest($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('max_rooms_booking_request', $operator, $value);
    }

    public function isActive($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_active', $value);
    }

    public function isExtranetEnabled($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_extranet_enabled', $value);
    }

    public function seasonStartDateStart($date)
    {
        return $this->builder->where('season_start_date', '>=', $date);
    }

    public function seasonStartDateEnd($date)
    {
        return $this->builder->where('season_start_date', '<=', $date);
    }

    public function seasonEndDateStart($date)
    {
        return $this->builder->where('season_end_date', '>=', $date);
    }

    public function seasonEndDateEnd($date)
    {
        return $this->builder->where('season_end_date', '<=', $date);
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

    public function parentStayQuotaContractId($value)
    {
            $parentStayQuotaContract = \NextDeveloper\\Database\Models\ParentStayQuotaContracts::where('uuid', $value)->first();

        if($parentStayQuotaContract) {
            return $this->builder->where('parent_stay_quota_contract_id', '=', $parentStayQuotaContract->id);
        }
    }

    public function stayTarifTypeId($value)
    {
            $stayTarifType = \NextDeveloper\Stay\Database\Models\TarifTypes::where('uuid', $value)->first();

        if($stayTarifType) {
            return $this->builder->where('stay_tarif_type_id', '=', $stayTarifType->id);
        }
    }

    public function iamAccountId($value)
    {
            $iamAccount = \NextDeveloper\IAM\Database\Models\Accounts::where('uuid', $value)->first();

        if($iamAccount) {
            return $this->builder->where('iam_account_id', '=', $iamAccount->id);
        }
    }

    public function iamUserId($value)
    {
            $iamUser = \NextDeveloper\IAM\Database\Models\Users::where('uuid', $value)->first();

        if($iamUser) {
            return $this->builder->where('iam_user_id', '=', $iamUser->id);
        }
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE




















}
