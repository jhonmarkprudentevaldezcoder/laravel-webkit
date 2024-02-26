<?php

namespace App\Enums;

/**
 * Class RolesEnums
 *
 * This class defines the roles used in the application.
 */
class RolesEnums
{
    public const ADMIN_ROLE = 'admin';
    public const USER_ROLE = 'user';

    /**
     * Get all available roles.
     *
     * @return array
     */
    public static function roles(): array
    {
        return [self::ADMIN_ROLE, self::USER_ROLE];
    }
}