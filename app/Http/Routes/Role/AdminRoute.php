<?php

namespace App\Http\Routes\Role;

use App\Http\Routes\Core\BaseRoute;
use Illuminate\Support\Facades\Route;

class AdminRoute extends BaseRoute
{

    public static function route()
    {
        Route::group(['middleware' => ['']], function () {
            Route::get('/admin', function () {

            });
        });
    }

}
