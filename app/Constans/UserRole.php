<?php

namespace App\Constans;

final class UserRole {

    const ADMIN    = 0;
    const USER     = 1;

    const LIST = [
        'admin',
        'operator',
    ];

    public static function getString($status) {
        return self::LIST[$status];
    }
}