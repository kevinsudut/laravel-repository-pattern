<?php

namespace App\Http\Routes;

use App\Http\Routes\Core\BaseRoute;
use Illuminate\Support\Facades\Route;
use App\Http\Routes\Role\AdminRoute;

class AuthRoute extends BaseRoute
{
    private $admin = null;

    public function __construct()
    {
        parent::__construct();
        $this->admin = new AdminRoute();
    }

    public function route()
    {
        Route::group(['middleware' => ['auth']], function () {
            Route::get('/auth', function() {
                return view('welcome');
            });
            $this->admin->route();
        });
    }

}
