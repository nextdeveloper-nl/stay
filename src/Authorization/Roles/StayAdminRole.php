<?php

namespace NextDeveloper\Stay\Authorization\Roles;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use NextDeveloper\CRM\Database\Models\AccountManagers;
use NextDeveloper\IAM\Authorization\Roles\AbstractRole;
use NextDeveloper\IAM\Authorization\Roles\IAuthorizationRole;
use NextDeveloper\IAM\Database\Models\Users;
use NextDeveloper\IAM\Helpers\UserHelper;

class StayAdminRole extends AbstractRole implements IAuthorizationRole
{
    public const NAME = 'stay-admin';

    public const LEVEL = 100;

    public const DESCRIPTION = 'Stay Admin';

    public const DB_PREFIX = 'stay';

    /**
     * Applies basic member role sql for Eloquent
     *
     * @param Builder $builder
     * @param Model $model
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {

    }

    public function checkPrivileges(Users $users = null)
    {
        //return UserHelper::hasRole(self::NAME, $users);
    }

    public function getModule()
    {
        return 'stay';
    }

    public function allowedOperations() :array
    {


        return [
            'stay_agency_group:read',
            'stay_agency_group:update',
            'stay_agency_group:create',
            'stay_agency_group:delete',
            'stay_cancellation_policy:read',
            'stay_cancellation_policy:update',
            'stay_cancellation_policy:create',
            'stay_cancellation_policy:delete',
            'stay_cancellation_policy_date_stays:read',
            'stay_cancellation_policy_date_stays:update',
            'stay_cancellation_policy_date_stays:create',
            'stay_cancellation_policy_date_stays:delete',
            'stay_consumers:read',
            'stay_consumers:update',
            'stay_consumers:create',
            'stay_consumers:delete',
            'stay_hotel_consumer_mappings:read',
            'stay_hotel_consumer_mappings:update',
            'stay_hotel_consumer_mappings:create',
            'stay_hotel_consumer_mappings:delete',
            'stay_hotel_contracts:read',
            'stay_hotel_contracts:update',
            'stay_hotel_contracts:create',
            'stay_hotel_contracts:delete',
            'stay_hotel_provider_mappings:read',
            'stay_hotel_provider_mappings:update',
            'stay_hotel_provider_mappings:create',
            'stay_hotel_provider_mappings:delete',
            'stay_hotels:read',
            'stay_hotels:update',
            'stay_hotels:create',
            'stay_hotels:delete',
            'stay_main_purchase_contracts:read',
            'stay_main_purchase_contracts:update',
            'stay_main_purchase_contracts:create',
            'stay_main_purchase_contracts:delete',
            'stay_providers:read',
            'stay_providers:update',
            'stay_providers:create',
            'stay_providers:delete',
            'stay_quota_contracts:read',
            'stay_quota_contracts:update',
            'stay_quota_contracts:create',
            'stay_quota_contracts:delete',
            'stay_rate_prices:read',
            'stay_rate_prices:update',
            'stay_rate_prices:create',
            'stay_rate_prices:delete',
            'stay_rates:read',
            'stay_rates:update',
            'stay_rates:create',
            'stay_rates:delete',
            'stay_reservations:read',
            'stay_reservations:update',
            'stay_reservations:create',
            'stay_reservations:delete',
            'stay_reservations:checkin',
            'stay_reservations:checkout',
            'stay_reservations:cancel',
            'stay_reservations:refund',
            'stay_reservations:confirm',
            'stay_reservations:unconfirm',
            'stay_reservations:assign',
            'stay_reservations:unassign',
            'stay_reservations:move',
            'stay_reservations:unmove',
            'stay_reservations:change',
            'stay_reservations:unchange',
            'stay_room_type_consumer_mappings:read',
            'stay_room_type_consumer_mappings:update',
            'stay_room_type_consumer_mappings:create',
            'stay_room_type_consumer_mappings:delete',
            'stay_room_type_provider_mappings:read',
            'stay_room_type_provider_mappings:update',
            'stay_room_type_provider_mappings:create',
            'stay_room_type_provider_mappings:delete',
            'stay_room_types:read',
            'stay_room_types:update',
            'stay_room_types:create',
            'stay_room_types:delete',
            'stay_rooms:read',
            'stay_rooms:update',
            'stay_rooms:create',
            'stay_rooms:delete',
            'stay_sales_contracts:read',
            'stay_sales_contracts:update',
            'stay_sales_contracts:create',
            'stay_sales_contracts:delete',
            'stay_tarif_types:read',
            'stay_tarif_types:update',
            'stay_tarif_types:create',
            'stay_tarif_types:delete'
        ];
    }

    public function getLevel(): int
    {
        return self::LEVEL;
    }

    public function getDescription(): string
    {
        return self::DESCRIPTION;
    }

    public function getName(): string
    {
        return self::NAME;
    }

    public function canBeApplied($column)
    {
        if(self::DB_PREFIX === '*') {
            return true;
        }

        if(Str::startsWith($column, self::DB_PREFIX)) {
            return true;
        }

        return false;
    }

    public function getDbPrefix()
    {
        return self::DB_PREFIX;
    }

    public function checkRules(Users $users): bool
    {
        // TODO: Implement checkRules() method.
    }
}
