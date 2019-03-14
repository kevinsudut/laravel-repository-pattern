<?php

/**
 * @author Kevin Surya Wahyudi <kevinsuryaw@gmail.com>
 *
 * Copyright © 2018 | All rights reserved.
 */

namespace App\Http\Routes\Interfaces;

interface AuthRouteInterface
{
    /**
     *  Register web routes for the application with spesific auth
     *
     * @return void
     */
    public static function authRoute();
}
