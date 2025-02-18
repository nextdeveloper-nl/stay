<?php

namespace NextDeveloper\Stay\Database\Filters;

use Illuminate\Database\Eloquent\Builder;
use NextDeveloper\Commons\Database\Filters\AbstractQueryFilter;
                    

/**
 * This class automatically puts where clause on database so that use can filter
 * data returned from the query.
 */
class HotelContractsQueryFilter extends AbstractQueryFilter
{

    /**
     * @var Builder
     */
    protected $builder;

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

    public function stayMainPurchaseContractId($value)
    {
            $stayMainPurchaseContract = \NextDeveloper\Stay\Database\Models\MainPurchaseContracts::where('uuid', $value)->first();

        if($stayMainPurchaseContract) {
            return $this->builder->where('stay_main_purchase_contract_id', '=', $stayMainPurchaseContract->id);
        }
    }

    public function staySalesContractId($value)
    {
            $staySalesContract = \NextDeveloper\Stay\Database\Models\SalesContracts::where('uuid', $value)->first();

        if($staySalesContract) {
            return $this->builder->where('stay_sales_contract_id', '=', $staySalesContract->id);
        }
    }

    public function stayQuotaContractId($value)
    {
            $stayQuotaContract = \NextDeveloper\Stay\Database\Models\QuotaContracts::where('uuid', $value)->first();

        if($stayQuotaContract) {
            return $this->builder->where('stay_quota_contract_id', '=', $stayQuotaContract->id);
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
