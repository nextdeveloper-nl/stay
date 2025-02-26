<?php

namespace NextDeveloper\Stay\Database\Filters;

use Illuminate\Database\Eloquent\Builder;
use NextDeveloper\Commons\Database\Filters\AbstractQueryFilter;
                

/**
 * This class automatically puts where clause on database so that use can filter
 * data returned from the query.
 */
class ProvidersQueryFilter extends AbstractQueryFilter
{

    /**
     * @var Builder
     */
    protected $builder;
    
    public function observations($value)
    {
        return $this->builder->where('observations', 'like', '%' . $value . '%');
    }
    
    public function address($value)
    {
        return $this->builder->where('address', 'like', '%' . $value . '%');
    }
    
    public function correspondenceAddress($value)
    {
        return $this->builder->where('correspondence_address', 'like', '%' . $value . '%');
    }
    
    public function bankAccountDescription($value)
    {
        return $this->builder->where('bank_account_description', 'like', '%' . $value . '%');
    }
    
    public function communicationText($value)
    {
        return $this->builder->where('communication_text', 'like', '%' . $value . '%');
    }
    
    public function blockingReason($value)
    {
        return $this->builder->where('blocking_reason', 'like', '%' . $value . '%');
    }

    public function paymentDays($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('payment_days', $operator, $value);
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

    public function cardActivationDays($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('card_activation_days', $operator, $value);
    }

    public function isCommissionAgent($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_commission_agent', $value);
    }

    public function isDefault($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_default', $value);
    }

    public function isIntracommunity($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_intracommunity', $value);
    }

    public function isBillingExempt($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_billing_exempt', $value);
    }

    public function isVoxelExport($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_voxel_export', $value);
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

    public function commonCountryId($value)
    {
            $commonCountry = \NextDeveloper\Commons\Database\Models\Countries::where('uuid', $value)->first();

        if($commonCountry) {
            return $this->builder->where('common_country_id', '=', $commonCountry->id);
        }
    }

    public function commonCurrencyId($value)
    {
            $commonCurrency = \NextDeveloper\Commons\Database\Models\Currencies::where('uuid', $value)->first();

        if($commonCurrency) {
            return $this->builder->where('common_currency_id', '=', $commonCurrency->id);
        }
    }

    public function iamUserId($value)
    {
            $iamUser = \NextDeveloper\IAM\Database\Models\Users::where('uuid', $value)->first();

        if($iamUser) {
            return $this->builder->where('iam_user_id', '=', $iamUser->id);
        }
    }

    public function iamAccountId($value)
    {
            $iamAccount = \NextDeveloper\IAM\Database\Models\Accounts::where('uuid', $value)->first();

        if($iamAccount) {
            return $this->builder->where('iam_account_id', '=', $iamAccount->id);
        }
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE




















}
