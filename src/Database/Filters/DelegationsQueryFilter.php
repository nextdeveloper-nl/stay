<?php

namespace NextDeveloper\Stay\Database\Filters;

use Illuminate\Database\Eloquent\Builder;
use NextDeveloper\Commons\Database\Filters\AbstractQueryFilter;
                

/**
 * This class automatically puts where clause on database so that use can filter
 * data returned from the query.
 */
class DelegationsQueryFilter extends AbstractQueryFilter
{

    /**
     * @var Builder
     */
    protected $builder;
    
    public function name($value)
    {
        return $this->builder->where('name', 'like', '%' . $value . '%');
    }
    
    public function address($value)
    {
        return $this->builder->where('address', 'like', '%' . $value . '%');
    }
    
    public function phone($value)
    {
        return $this->builder->where('phone', 'like', '%' . $value . '%');
    }
    
    public function fax($value)
    {
        return $this->builder->where('fax', 'like', '%' . $value . '%');
    }
    
    public function schedule($value)
    {
        return $this->builder->where('schedule', 'like', '%' . $value . '%');
    }
    
    public function photo($value)
    {
        return $this->builder->where('photo', 'like', '%' . $value . '%');
    }
    
    public function salesResponsible($value)
    {
        return $this->builder->where('sales_responsible', 'like', '%' . $value . '%');
    }
    
    public function purchasesResponsible($value)
    {
        return $this->builder->where('purchases_responsible', 'like', '%' . $value . '%');
    }
    
    public function allGroupsId($value)
    {
        return $this->builder->where('all_groups_id', 'like', '%' . $value . '%');
    }
    
    public function sendAllGroupsId($value)
    {
        return $this->builder->where('send_all_groups_id', 'like', '%' . $value . '%');
    }
    
    public function codeAnalitic($value)
    {
        return $this->builder->where('code_analitic', 'like', '%' . $value . '%');
    }
    
    public function letterTickets($value)
    {
        return $this->builder->where('letter_tickets', 'like', '%' . $value . '%');
    }
    
    public function sendExtranet($value)
    {
        return $this->builder->where('send_extranet', 'like', '%' . $value . '%');
    }
    
    public function externalId($value)
    {
        return $this->builder->where('external_id', 'like', '%' . $value . '%');
    }

    public function isActive($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_active', $value);
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

    public function allGroupsId($value)
    {
            $allGroups = \NextDeveloper\\Database\Models\AllGroups::where('uuid', $value)->first();

        if($allGroups) {
            return $this->builder->where('all_groups_id', '=', $allGroups->id);
        }
    }

    public function sendAllGroupsId($value)
    {
            $sendAllGroups = \NextDeveloper\\Database\Models\SendAllGroups::where('uuid', $value)->first();

        if($sendAllGroups) {
            return $this->builder->where('send_all_groups_id', '=', $sendAllGroups->id);
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
