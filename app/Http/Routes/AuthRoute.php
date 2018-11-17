<?php

namespace App\Http\Routes;

use App\Http\Routes\Core\BaseRoute;
use Illuminate\Support\Facades\Route;
use App\Http\Routes\Role\AdminRoute;

class AuthRoute extends BaseRoute implements AuthRouteInterface
{

    public static function route()
    {
        Route::group(['middleware' => ['auth']], function () {
            Route::get('/auth', function() {
                return view('welcome');
            });
            self::authRoute();
        });
    }

    public static function authRoute()
    {
        AdminRoute::route();
    }

}
