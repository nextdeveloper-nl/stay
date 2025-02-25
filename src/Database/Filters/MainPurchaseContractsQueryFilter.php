<?php

namespace NextDeveloper\Stay\Database\Filters;

use Illuminate\Database\Eloquent\Builder;
use NextDeveloper\Commons\Database\Filters\AbstractQueryFilter;
                        

/**
 * This class automatically puts where clause on database so that use can filter
 * data returned from the query.
 */
class MainPurchaseContractsQueryFilter extends AbstractQueryFilter
{

    /**
     * @var Builder
     */
    protected $builder;
    
    public function externalId($value)
    {
        return $this->builder->where('external_id', 'like', '%' . $value . '%');
    }
    
    public function observations($value)
    {
        return $this->builder->where('observations', 'like', '%' . $value . '%');
    }
    
    public function internalObservations($value)
    {
        return $this->builder->where('internal_observations', 'like', '%' . $value . '%');
    }

    public function minimumNights($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('minimum_nights', $operator, $value);
    }

    public function maximumNights($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('maximum_nights', $operator, $value);
    }

    public function initialQuota($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('initial_quota', $operator, $value);
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

    public function minimumAge($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('minimum_age', $operator, $value);
    }

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

    public function ageRangeCTo($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('age_range_c_to', $operator, $value);
    }

    public function isActive($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_active', $value);
    }

    public function isApproved($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_approved', $value);
    }

    public function isFreeRate($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_free_rate', $value);
    }

    public function isExtranetEnabled($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_extranet_enabled', $value);
    }

    public function isNonRefundable($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_non_refundable', $value);
    }

    public function isPackageEnabled($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_package_enabled', $value);
    }

    public function isBlocked($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_blocked', $value);
    }

    public function approvedAtStart($date)
    {
        return $this->builder->where('approved_at', '>=', $date);
    }

    public function approvedAtEnd($date)
    {
        return $this->builder->where('approved_at', '<=', $date);
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

    public function guaranteeStartDateStart($date)
    {
        return $this->builder->where('guarantee_start_date', '>=', $date);
    }

    public function guaranteeStartDateEnd($date)
    {
        return $this->builder->where('guarantee_start_date', '<=', $date);
    }

    public function guaranteeEndDateStart($date)
    {
        return $this->builder->where('guarantee_end_date', '>=', $date);
    }

    public function guaranteeEndDateEnd($date)
    {
        return $this->builder->where('guarantee_end_date', '<=', $date);
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

    public function commonCurrencyId($value)
    {
            $commonCurrency = \NextDeveloper\Commons\Database\Models\Currencies::where('uuid', $value)->first();

        if($commonCurrency) {
            return $this->builder->where('common_currency_id', '=', $commonCurrency->id);
        }
    }

    public function parentStayMainPurchaseContractId($value)
    {
            $parentStayMainPurchaseContract = \NextDeveloper\\Database\Models\ParentStayMainPurchaseContracts::where('uuid', $value)->first();

        if($parentStayMainPurchaseContract) {
            return $this->builder->where('parent_stay_main_purchase_contract_id', '=', $parentStayMainPurchaseContract->id);
        }
    }

    public function stayTarifTypeId($value)
    {
            $stayTarifType = \NextDeveloper\Stay\Database\Models\TarifTypes::where('uuid', $value)->first();

        if($stayTarifType) {
            return $this->builder->where('stay_tarif_type_id', '=', $stayTarifType->id);
        }
    }

    public function stayHotelId($value)
    {
            $stayHotel = \NextDeveloper\Stay\Database\Models\Hotels::where('uuid', $value)->first();

        if($stayHotel) {
            return $this->builder->where('stay_hotel_id', '=', $stayHotel->id);
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
