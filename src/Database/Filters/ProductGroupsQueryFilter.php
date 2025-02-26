<?php

namespace NextDeveloper\Stay\Database\Filters;

use Illuminate\Database\Eloquent\Builder;
use NextDeveloper\Commons\Database\Filters\AbstractQueryFilter;
                                        

/**
 * This class automatically puts where clause on database so that use can filter
 * data returned from the query.
 */
class ProductGroupsQueryFilter extends AbstractQueryFilter
{

    /**
     * @var Builder
     */
    protected $builder;
    
    public function name($value)
    {
        return $this->builder->where('name', 'like', '%' . $value . '%');
    }
    
    public function quickbooksItem($value)
    {
        return $this->builder->where('quickbooks_item', 'like', '%' . $value . '%');
    }
    
    public function exportCode($value)
    {
        return $this->builder->where('export_code', 'like', '%' . $value . '%');
    }
    
    public function channelId($value)
    {
        return $this->builder->where('channel_id', 'like', '%' . $value . '%');
    }
    
    public function room($value)
    {
        return $this->builder->where('room', 'like', '%' . $value . '%');
    }
    
    public function exportCodeC($value)
    {
        return $this->builder->where('export_code_c', 'like', '%' . $value . '%');
    }
    
    public function exportCodeVre($value)
    {
        return $this->builder->where('export_code_vre', 'like', '%' . $value . '%');
    }
    
    public function exportCodeCre($value)
    {
        return $this->builder->where('export_code_cre', 'like', '%' . $value . '%');
    }
    
    public function exportCodeAnalytic($value)
    {
        return $this->builder->where('export_code_analytic', 'like', '%' . $value . '%');
    }
    
    public function commissionAccount($value)
    {
        return $this->builder->where('commission_account', 'like', '%' . $value . '%');
    }
    
    public function alternativeExportCode($value)
    {
        return $this->builder->where('alternative_export_code', 'like', '%' . $value . '%');
    }
    
    public function observations($value)
    {
        return $this->builder->where('observations', 'like', '%' . $value . '%');
    }
    
    public function externalId($value)
    {
        return $this->builder->where('external_id', 'like', '%' . $value . '%');
    }

    public function commissionRate($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('commission_rate', $operator, $value);
    }

    public function ivaCommissionRate($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('iva_commission_rate', $operator, $value);
    }

    public function maxChildren($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('max_children', $operator, $value);
    }

    public function minChildren($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('min_children', $operator, $value);
    }

    public function maxAdults($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('max_adults', $operator, $value);
    }

    public function minAdults($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('min_adults', $operator, $value);
    }

    public function status($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('status', $operator, $value);
    }

    public function orderNumber($value)
    {
        $operator = substr($value, 0, 1);

        if ($operator != '<' || $operator != '>') {
            $operator = '=';
        } else {
            $value = substr($value, 1);
        }

        return $this->builder->where('order_number', $operator, $value);
    }

    public function isDefault($value)
    {
        if(!is_bool($value)) {
            $value = false;
        }

        return $this->builder->where('is_default', $value);
    }

    public function tripEndDateStart($date)
    {
        return $this->builder->where('trip_end_date', '>=', $date);
    }

    public function tripEndDateEnd($date)
    {
        return $this->builder->where('trip_end_date', '<=', $date);
    }

    public function tripStartDateStart($date)
    {
        return $this->builder->where('trip_start_date', '>=', $date);
    }

    public function tripStartDateEnd($date)
    {
        return $this->builder->where('trip_start_date', '<=', $date);
    }

    public function endDateStart($date)
    {
        return $this->builder->where('end_date', '>=', $date);
    }

    public function endDateEnd($date)
    {
        return $this->builder->where('end_date', '<=', $date);
    }

    public function startDateStart($date)
    {
        return $this->builder->where('start_date', '>=', $date);
    }

    public function startDateEnd($date)
    {
        return $this->builder->where('start_date', '<=', $date);
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

    public function parentId($value)
    {
            $parent = \NextDeveloper\\Database\Models\Parents::where('uuid', $value)->first();

        if($parent) {
            return $this->builder->where('parent_id', '=', $parent->id);
        }
    }

    public function zoneId($value)
    {
            $zone = \NextDeveloper\\Database\Models\Zones::where('uuid', $value)->first();

        if($zone) {
            return $this->builder->where('zone_id', '=', $zone->id);
        }
    }

    public function channelId($value)
    {
            $channel = \NextDeveloper\\Database\Models\Channels::where('uuid', $value)->first();

        if($channel) {
            return $this->builder->where('channel_id', '=', $channel->id);
        }
    }

    public function providerId($value)
    {
            $provider = \NextDeveloper\\Database\Models\Providers::where('uuid', $value)->first();

        if($provider) {
            return $this->builder->where('provider_id', '=', $provider->id);
        }
    }

    public function priceListId($value)
    {
            $priceList = \NextDeveloper\\Database\Models\PriceLists::where('uuid', $value)->first();

        if($priceList) {
            return $this->builder->where('price_list_id', '=', $priceList->id);
        }
    }

    public function delegationId($value)
    {
            $delegation = \NextDeveloper\\Database\Models\Delegations::where('uuid', $value)->first();

        if($delegation) {
            return $this->builder->where('delegation_id', '=', $delegation->id);
        }
    }

    public function clientId($value)
    {
            $client = \NextDeveloper\\Database\Models\Clients::where('uuid', $value)->first();

        if($client) {
            return $this->builder->where('client_id', '=', $client->id);
        }
    }

    public function originZoneId($value)
    {
            $originZone = \NextDeveloper\\Database\Models\OriginZones::where('uuid', $value)->first();

        if($originZone) {
            return $this->builder->where('origin_zone_id', '=', $originZone->id);
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
