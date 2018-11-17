<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Routes\AuthRoute;
use App\Http\Routes\GuestRoute;

/**
 * Register all route with guest middelware
 *
 * Change route at \App\Htpp\Routes\GuestRoute
 */
GuestRoute::route();

/**
 * Register all route with auth middelware
 *
 * Change route at \App\Htpp\Routes\AuthRoute
 */
AuthRoute::route();
