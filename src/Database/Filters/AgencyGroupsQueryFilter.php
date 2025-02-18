<?php

namespace NextDeveloper\Stay\Database\Filters;

use Illuminate\Database\Eloquent\Builder;
use NextDeveloper\Commons\Database\Filters\AbstractQueryFilter;
                

/**
 * This class automatically puts where clause on database so that use can filter
 * data returned from the query.
 */
class AgencyGroupsQueryFilter extends AbstractQueryFilter
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
    
    public function codes($value)
    {
        return $this->builder->where('codes', 'like', '%' . $value . '%');
    }
    
    public function agencyReferenceValidator($value)
    {
        return $this->builder->where('agency_reference_validator', 'like', '%' . $value . '%');
    }
    
    public function taxRegimeType($value)
    {
        return $this->builder->where('tax_regime_type', 'like', '%' . $value . '%');
    }
    
    public function externalId($value)
    {
        return $this->builder->where('external_id', 'like', '%' . $value . '%');
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

    public function marketplaceAccountId($value)
    {
            $marketplaceAccount = \NextDeveloper\Marketplace\Database\Models\Accounts::where('uuid', $value)->first();

        if($marketplaceAccount) {
            return $this->builder->where('marketplace_account_id', '=', $marketplaceAccount->id);
        }
    }

    public function externalId($value)
    {
            $external = \NextDeveloper\\Database\Models\Externals::where('uuid', $value)->first();

        if($external) {
            return $this->builder->where('external_id', '=', $external->id);
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
