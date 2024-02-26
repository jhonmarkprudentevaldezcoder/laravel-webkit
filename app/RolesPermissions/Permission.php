<?php

namespace App\Enums;

/**
 * Class Permission
 *
 * This class defines permissions used in the application.
 */
class Permission {

    /**
     * Permission to read data.
     */
    const CAN_READ = 'read';

    /**
     * Permission to create data.
     */
    const CAN_CREATE = 'create';

    /**
     * Permission to update data.
     */
    const CAN_UPDATE = 'update';

    /**
     * Permission to delete data.
     */
    const CAN_DELETE = 'delete';

}