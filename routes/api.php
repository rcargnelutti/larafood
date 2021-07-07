<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\AuthClientController;

Route::post('/sanctum/token', 'App\\Http\\Controllers\\Api\\Auth\\AuthClientController@auth');

Route::group([
    'middleware' => ['auth:sanctum']
], function() {
    Route::get('/me', 'App\\Http\\Controllers\\Api\\Auth\\AuthClientController@me');
    Route::post('/logout', 'App\\Http\\Controllers\\Api\\Auth\\AuthClientController@logout');

    Route::post('/auth/v1/orders', 'App\\Http\\Controllers\\Api\\OrderApiController@store');
});

Route::group([
    'prefix' => 'v1',
    'namespace' => 'App\\Http\\Controllers\\Api',
], function () {
    Route::get('/tenants/{id}', 'TenantApiController@show');
    Route::get('/tenants', 'TenantApiController@index');

    Route::get('/categories/{identify}', 'CategoryApiController@show');
    Route::get('/categories', 'CategoryApiController@categoriesByTenant');

    Route::get('/tables/{identify}', 'TablesApiController@show');
    Route::get('/tables', 'TablesApiController@tablesByTenant');

    Route::get('/products/{identify}', 'ProductApiController@show');
    Route::get('/products', 'ProductApiController@productsByTenant');

    Route::post('/client', 'Auth\\RegisterController@store');

    //Route::post('/orders', 'OrderApiController@store');
    Route::get('/orders/{identify}', 'OrderApiController@show');


 });

 //EXEMPLO PARA ATUALIZAÇÃO DA API
 Route::group([
    'prefix' => 'v2',
    'namespace' => 'App\\Http\\Controllers\\Api',
], function () {
    Route::get('/tenants/{id}', 'TenantApiController@show');
    Route::get('/tenants', 'TenantApiController@index');

    Route::get('/categories/{url}', 'CategoryApiController@show');
    Route::get('/categories', 'CategoryApiController@categoriesByTenant');

    Route::get('/tables/{identify}', 'TablesApiController@show');
    Route::get('/tables', 'TablesApiController@tablesByTenant');

    Route::get('/products/{flag}', 'ProductApiController@show');
    Route::get('/products', 'ProductApiController@productsByTenant');
 });

 //FORMA TRADICIONAL COM NAMESPACE COMPLETO
// Route::get('/tenants/{id}', 'App\\Http\\Controllers\\Api\\TenantApiController@show');
// Route::get('/tenants', 'App\\Http\\Controllers\\Api\\TenantApiController@index');

// Route::get('/categories/{url}', 'App\\Http\\Controllers\\Api\\CategoryApiController@show');
// Route::get('/categories', 'App\\Http\\Controllers\\Api\\CategoryApiController@categoriesByTenant');

// Route::get('/tables/{identify}', 'App\\Http\\Controllers\\Api\\TablesApiController@show');
// Route::get('/tables', 'App\\Http\\Controllers\\Api\\TablesApiController@tablesByTenant');

// Route::get('/products/{flag}', 'App\\Http\\Controllers\\Api\\ProductApiController@show');
// Route::get('/products', 'App\\Http\\Controllers\\Api\\ProductApiController@productsByTenant');


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
