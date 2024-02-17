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

    public const LEVEL = 50;

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
        /**
         * Here user will be able to list all models, because by default, sales manager can see everybody.
         */
        $ids = AccountManagers::withoutGlobalScopes()
            ->where('iam_account_id', UserHelper::currentAccount()->id)
            ->pluck('crm_account_id');

        $builder->whereIn('iam_account_id', $ids);
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
            'stay_hotels:read',
            'stay_hotels:update',
            'stay_hotels:create',
            'stay_hotels:delete',
            'stay_rooms:read',
            'stay_rooms:update',
            'stay_rooms:create',
            'stay_rooms:delete',
            'stay_room_types:read',
            'stay_room_types:update',
            'stay_room_types:create',
            'stay_room_types:delete',
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
            'stay_room_prices:read',
            'stay_room_prices:update',
            'stay_room_prices:create',
            'stay_room_prices:delete',
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
}
