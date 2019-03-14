<?php

/**
 * @author Kevin Surya Wahyudi <kevinsuryaw@gmail.com>
 *
 * Copyright © 2018 | All rights reserved.
 */

namespace App\Http\Routes;

use App\Http\Routes\Core\BaseRoute;
use App\Http\Routes\Interfaces\AuthRouteInterface;
use App\Http\Routes\Role\AdminRoute;
use Illuminate\Support\Facades\Route;

class AuthRoute extends BaseRoute implements AuthRouteInterface
{
    public static function route()
    {
        Route::group(['middleware' => ['auth']], function () {
            Route::get('/auth', function() {
                return view('welcome');
            });
            Route::get('/home', 'HomeController@index')->name('home');
            self::authRoute();
        });
    }

    public static function authRoute()
    {
        AdminRoute::route();
    }
}
