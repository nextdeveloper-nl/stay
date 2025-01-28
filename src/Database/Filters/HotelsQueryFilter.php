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
    
    public function externalId($value)
    {
        return $this->builder->where('external_id', 'like', '%' . $value . '%');
    }
    
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
    
    public function latitude($value)
    {
        return $this->builder->where('latitude', 'like', '%' . $value . '%');
    }
    
    public function longitude($value)
    {
        return $this->builder->where('longitude', 'like', '%' . $value . '%');
    }

    public function isPublic($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_public', $value);
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

    public function externalId($value)
    {
            $external = \NextDeveloper\\Database\Models\Externals::where('uuid', $value)->first();

        if($external) {
            return $this->builder->where('external_id', '=', $external->id);
        }
    }

    public function commonCityId($value)
    {
            $commonCity = \NextDeveloper\Commons\Database\Models\Cities::where('uuid', $value)->first();

        if($commonCity) {
            return $this->builder->where('common_city_id', '=', $commonCity->id);
        }
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

    public function foregroundMediaId($value)
    {
            $foregroundMedia = \NextDeveloper\Commons\Database\Models\Media::where('uuid', $value)->first();

        if($foregroundMedia) {
            return $this->builder->where('foreground_media_id', '=', $foregroundMedia->id);
        }
    }

    public function backgroundMediaId($value)
    {
            $backgroundMedia = \NextDeveloper\Commons\Database\Models\Media::where('uuid', $value)->first();

        if($backgroundMedia) {
            return $this->builder->where('background_media_id', '=', $backgroundMedia->id);
        }
    }

    public function stayProviderId($value)
    {
            $stayProvider = \NextDeveloper\Stay\Database\Models\Providers::where('uuid', $value)->first();

        if($stayProvider) {
            return $this->builder->where('stay_provider_id', '=', $stayProvider->id);
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

    // EDIT AFTER HERE - WARNING: ABOVE THIS LINE MAY BE REGENERATED AND YOU MAY LOSE CODE\n\n\n\n\n\n\n\n\n\n














}
