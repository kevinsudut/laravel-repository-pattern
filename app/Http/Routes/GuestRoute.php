<?php

namespace App\Http\Routes;

use App\Http\Routes\Core\BaseRoute;
use Illuminate\Support\Facades\Route;

class GuestRoute extends BaseRoute
{

    public function __construct()
    {
        parent::__construct();
    }

    public function route()
    {
        Route::group(['middleware' => ['guest']], function () {
            Route::get('/', function() {
                return view('welcome');
            });
        });
    }

}
