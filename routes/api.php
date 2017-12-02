<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Users
    Route::get('/users', 'UsersController@index')->name('users');
    Route::post('/users', 'UsersController@store')->name('user-create');
    Route::get('/users/{id}', 'UsersController@show')->name('user-show');
    Route::post('/users/{id}', 'UsersController@update')->name('user-update');
    Route::delete('/users/{id}/delete', 'UsersController@delete')->name('user-delete');
    Route::post('/users/{id}/assign_roles', 'UsersController@assignRoles')->name('user-assign-roles');
});
