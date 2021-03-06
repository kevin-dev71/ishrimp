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


/**
 * Auth routes
 */
Route::group(['namespace' => 'Auth'], function () {

    // Authentication Routes...
    Route::get('login', 'LoginController@showLoginForm')->name('login');
    Route::post('login', 'LoginController@login');
    Route::get('logout', 'LoginController@logout')->name('logout');

    // Registration Routes...
    if (config('auth.users.registration')) {
        Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
        Route::post('register', 'RegisterController@register');
    }

    // Password Reset Routes...
    Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'ResetPasswordController@reset');

    // Confirmation Routes...
    if (config('auth.users.confirm_email')) {
        Route::get('confirm/{user_by_code}', 'ConfirmController@confirm')->name('confirm');
        Route::get('confirm/resend/{user_by_email}', 'ConfirmController@sendEmail')->name('confirm.send');
    }

    // Social Authentication Routes...
    Route::get('social/redirect/{provider}', 'SocialLoginController@redirect')->name('social.redirect');
    Route::get('social/login/{provider}', 'SocialLoginController@login')->name('social.login');

});

/**
 * Backend routes
 */
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'admin'], function () {

    // Dashboard
    Route::get('/', 'DashboardController@index')->name('dashboard');

    //Users
    Route::get('users', 'UserController@index')->name('users');
    Route::get('users/{user}', 'UserController@show')->name('users.show');
    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit');
    Route::put('users/{user}', 'UserController@update')->name('users.update');
    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');
    Route::get('permissions', 'PermissionController@index')->name('permissions');
    Route::get('permissions/{user}/repeat', 'PermissionController@repeat')->name('permissions.repeat');
    Route::get('dashboard/log-chart', 'DashboardController@getLogChartData')->name('dashboard.log.chart');
    Route::get('dashboard/registration-chart', 'DashboardController@getRegistrationChartData')->name('dashboard.registration.chart');

    Route::resource('fincas' , 'FincaController');
    Route::resource('metrics' , 'MetricController');
    Route::resource('tallas' , 'TallaController');
    Route::resource('products' , 'ProductController');
    Route::resource('insumos' , 'InsumoController');
    Route::resource('planificaciones' , 'PlanificacionController');

});


Route::get('/', 'HomeController@index');

/**
 * Membership
 */
Route::group(['as' => 'protection.'], function () {
    Route::get('membership', 'MembershipController@index')->name('membership')->middleware('protection:' . config('protection.membership.product_module_number') . ',protection.membership.failed');
    Route::get('membership/access-denied', 'MembershipController@failed')->name('membership.failed');
    Route::get('membership/clear-cache/', 'MembershipController@clearValidationCache')->name('membership.clear_validation_cache');
});

/**
 * Rutas de operadores y admin
 */

Route::group(['middleware' => ['auth']] , function(){
    Route::get('ciclos' , 'CicloController@index')->name('ciclos.index');
    Route::get('ciclos/show/{finca_id}' , 'CicloController@show')->name('ciclos.show');
    Route::get('ciclos/create/{finca_id}' , 'CicloController@create')->name('ciclos.create');
    Route::post('ciclos/store' , 'CicloController@store')->name('ciclos.store');
    Route::get('ciclos/{ciclo}/edit' , 'CicloController@edit')->name('ciclos.edit');
    Route::put('ciclos/{ciclo}' , 'CicloController@update')->name('ciclos.update');
    Route::delete('ciclos/{ciclo}' , 'CicloController@destroy')->name('ciclos.destroy');
    Route::get('ciclos/create/balanceado/{ciclo}' , 'CicloController@createBalanceado')->name('ciclos.create.balanceado');
    Route::get('ciclos/create/insumo/{ciclo}' , 'CicloController@createInsumo')->name('ciclos.create.insumo');
    Route::get('ciclos/aplicaciones/{ciclo}' , 'CicloController@aplicacionesIndex')->name('ciclos.aplicaciones');
    Route::post('ciclos/balanceado/store' , 'CicloController@storeBalanceado')->name('ciclos.store.balanceado');
    Route::delete('ciclos/balanceado/{product_id}' , 'CicloController@destroyBalanceado')->name('ciclos.destroy.balanceado');
    Route::post('ciclos/insumo/store' , 'CicloController@storeInsumo')->name('ciclos.store.insumo');
    Route::delete('ciclos/insumo/{insumo_id}' , 'CicloController@destroyInsumo')->name('ciclos.destroy.insumo');

    Route::get('cosechas/create/{ciclo_id}/{piscina_id}' , 'CicloController@createTalla')->name('cosechas.create');
    Route::post('cosechas/store' , 'CicloController@storeTalla')->name('cosechas.store');
    Route::delete('cosechas/{ciclo_talla_id}' , 'CicloController@destroyTalla')->name('cosechas.destroy');
    Route::get('cosechas/finalizar/{ciclo_id}' , 'CicloController@finalizarCosecha')->name('cosechas.finalizar');
});


