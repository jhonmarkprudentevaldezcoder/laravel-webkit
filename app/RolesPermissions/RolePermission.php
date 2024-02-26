<?php

namespace App\Enums;

/**
 * Class RolePermissions
 *
 * This class defines permissions assigned to different roles.
 */
class RolePermissions {

    /**
     * Role permissions mapping.
     * 
     * The keys represent roles, and the values are arrays of permissions assigned to each role.
     */
    const ABILITY = [
        RolesEnums::ADMIN_ROLE => [
            Permission::CAN_READ,
            Permission::CAN_CREATE,
            Permission::CAN_UPDATE,
            Permission::CAN_DELETE,
        ],
        RolesEnums::USER_ROLE => [
            Permission::CAN_READ,
        ],
    ];

}