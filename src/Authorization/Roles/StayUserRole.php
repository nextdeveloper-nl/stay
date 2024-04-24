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

class StayUserRole extends AbstractRole implements IAuthorizationRole
{
    public const NAME = 'stay-user';

    public const LEVEL = 150;

    public const DESCRIPTION = 'Stay module user role. This role is required to access hotels, room types and rooms in general. Also to make subscriptions.';

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
        $builder->where([
            'iam_account_id'    =>  UserHelper::currentAccount()->id,
            'iam_user_id'       =>  UserHelper::me()->id
        ])->orWhere('is_public', true);
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
            'stay_rooms:read',
            'stay_room_types:read',
            'stay_reservations:read',
            'stay_reservations:update',
            'stay_reservations:create',
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
