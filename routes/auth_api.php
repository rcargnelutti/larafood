<?php

//use Illuminate\Routing\Route;

Route::group([
    'prefix' => 'v1',
    'namespace' => 'App\\Http\\Controllers\\Api',
], function () {
    Route::get('/my-orders', 'Auth\OrderTenantController@index')->middleware(['auth']);
    Route::patch('/my-orders', 'Auth\OrderTenantController@update')->middleware(['auth']);
});
