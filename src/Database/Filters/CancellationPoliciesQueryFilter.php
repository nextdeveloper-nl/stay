<?php

namespace NextDeveloper\Stay\Database\Filters;

use Illuminate\Database\Eloquent\Builder;
use NextDeveloper\Commons\Database\Filters\AbstractQueryFilter;
                    

/**
 * This class automatically puts where clause on database so that use can filter
 * data returned from the query.
 */
class CancellationPoliciesQueryFilter extends AbstractQueryFilter
{

    /**
     * @var Builder
     */
    protected $builder;
    
    public function name($value)
    {
        return $this->builder->where('name', 'like', '%' . $value . '%');
    }
    
    public function observation($value)
    {
        return $this->builder->where('observation', 'like', '%' . $value . '%');
    }
    
    public function productType($value)
    {
        return $this->builder->where('product_type', 'like', '%' . $value . '%');
    }
    
    public function descriptionEs($value)
    {
        return $this->builder->where('description_es', 'like', '%' . $value . '%');
    }
    
    public function descriptionEn($value)
    {
        return $this->builder->where('description_en', 'like', '%' . $value . '%');
    }
    
    public function externalId($value)
    {
        return $this->builder->where('external_id', 'like', '%' . $value . '%');
    }

    public function priority($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('priority', $operator, $value);
    }

    public function isVerified($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_verified', $value);
    }

    public function isDefault($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_default', $value);
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

    public function travelStartDateStart($date)
    {
        return $this->builder->where('travel_start_date', '>=', $date);
    }

    public function travelStartDateEnd($date)
    {
        return $this->builder->where('travel_start_date', '<=', $date);
    }

    public function travelEndDateStart($date)
    {
        return $this->builder->where('travel_end_date', '>=', $date);
    }

    public function travelEndDateEnd($date)
    {
        return $this->builder->where('travel_end_date', '<=', $date);
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

    public function parentStayCancellationPolicyId($value)
    {
            $parentStayCancellationPolicy = \NextDeveloper\\Database\Models\ParentStayCancellationPolicies::where('uuid', $value)->first();

        if($parentStayCancellationPolicy) {
            return $this->builder->where('parent_stay_cancellation_policy_id', '=', $parentStayCancellationPolicy->id);
        }
    }

    public function commonCurrencyId($value)
    {
            $commonCurrency = \NextDeveloper\Commons\Database\Models\Currencies::where('uuid', $value)->first();

        if($commonCurrency) {
            return $this->builder->where('common_currency_id', '=', $commonCurrency->id);
        }
    }

    public function stayAgencyGroupId($value)
    {
            $stayAgencyGroup = \NextDeveloper\Stay\Database\Models\AgencyGroups::where('uuid', $value)->first();

        if($stayAgencyGroup) {
            return $this->builder->where('stay_agency_group_id', '=', $stayAgencyGroup->id);
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
