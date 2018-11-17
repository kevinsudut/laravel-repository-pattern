<?php

namespace App\Http\Routes;

interface AuthRouteInterface
{

    /**
     *  Register web routes for the application with spesific auth
     *
     * @return void
     */
    public static function authRoute();

}
