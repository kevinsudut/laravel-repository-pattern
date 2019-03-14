<?php

/**
 * @author Kevin Surya Wahyudi <kevinsuryaw@gmail.com>
 *
 * Copyright © 2018 | All rights reserved.
 */

namespace App\Http\Routes;

use App\Http\Routes\Core\BaseRoute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class GuestRoute extends BaseRoute
{
    public static function route()
    {
        Route::group(['middleware' => ['guest']], function () {
            Route::get('/', function() {
                return view('welcome');
            });
            Auth::routes();
            Route::get('/product', 'Product\ProductController@index');
        });
    }
}
