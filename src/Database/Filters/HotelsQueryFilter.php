<?php

namespace NextDeveloper\Stay\Database\Filters;

use Illuminate\Database\Eloquent\Builder;
use NextDeveloper\Commons\Database\Filters\AbstractQueryFilter;
                    

/**
 * This class automatically puts where clause on database so that use can filter
 * data returned from the query.
 */
class HotelsQueryFilter extends AbstractQueryFilter
{
    /**
     * @var Builder
     */
    protected $builder;
    
    public function name($value)
    {
        return $this->builder->where('name', 'like', '%' . $value . '%');
    }
    
    public function description($value)
    {
        return $this->builder->where('description', 'like', '%' . $value . '%');
    }
    
    public function address($value)
    {
        return $this->builder->where('address', 'like', '%' . $value . '%');
    }
    
    public function email($value)
    {
        return $this->builder->where('email', 'like', '%' . $value . '%');
    }
    
    public function phone($value)
    {
        return $this->builder->where('phone', 'like', '%' . $value . '%');
    }
    
    public function city($value)
    {
        return $this->builder->where('city', 'like', '%' . $value . '%');
    }

    public function latitude($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('latitude', $operator, $value);
    }
    
    public function longitude($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('longitude', $operator, $value);
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

    public function commonCountryId($value)
    {
            $commonCountry = \NextDeveloper\Commons\Database\Models\Countries::where('uuid', $value)->first();

        if($commonCountry) {
            return $this->builder->where('common_country_id', '=', $commonCountry->id);
        }
    }

    public function foregroundMediaId($value)
    {
            $foregroundMedia = \NextDeveloper\\Database\Models\ForegroundMedia::where('uuid', $value)->first();

        if($foregroundMedia) {
            return $this->builder->where('foreground_media_id', '=', $foregroundMedia->id);
        }
    }

    public function backgroundMediaId($value)
    {
            $backgroundMedia = \NextDeveloper\\Database\Models\BackgroundMedia::where('uuid', $value)->first();

        if($backgroundMedia) {
            return $this->builder->where('background_media_id', '=', $backgroundMedia->id);
        }
    }

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n\n\n

}