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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => 'auth'], function () {

    Route::get('/home', 'HomeController@index')->name('dashboard');
    // Route::resource('access/permission', 'Access\\PermissionController');
    // Route::resource('access/role', 'Access\\RoleController');
    // Route::resource('access/users', 'Access\\UserController');

    Route::prefix('access')->group(function () {

        //User Management
        Route::get('users', 'Access\UserController@index')->name('users.index');

        Route::get('users/create', 'Access\UserController@create')->name('users.create');

        Route::post('users', 'Access\UserController@store')->name('users.save');

        Route::get('users/{id}', 'Access\UserController@show')->name('users.show');

        Route::get('users/{id}/edit', 'Access\UserController@edit')->name('users.edit');

        Route::patch('users/{id}', 'Access\UserController@update')->name('users.update');

        Route::delete('users/{id}/delete', 'Access\UserController@destroy')->name('users.delete');

        Route::get('users/{id}/deactivate', 'Access\UserController@deactivate');

        Route::get('users/{id}/reactivate', 'Access\UserController@reactivate');

        Route::get('users/{id}/password', 'Access\UserController@password')->name('users.password.change');

        Route::patch('users/change/{id}', 'Access\UserController@resetPassword');

        //Role Management
        Route::get('roles', 'Access\RoleController@index')->name('roles.index');

        Route::get('roles/create', 'Access\RoleController@create')->name('roles.create');

        Route::post('roles', 'Access\RoleController@store')->name('roles.save');

        Route::get('roles/{id}', 'Access\RoleController@show')->name('roles.show');

        Route::get('roles/{id}/edit', 'Access\RoleController@edit')->name('roles.edit');

        Route::patch('roles/{id}', 'Access\RoleController@update')->name('roles.update');

        Route::delete('roles/{id}/delete', 'Access\RoleController@destroy')->name('roles.delete');

        //Permission Management
        Route::get('permissions', 'Access\PermissionController@index')->name('permissions.index');

        Route::get('permissions/create', 'Access\PermissionController@create')->name('permissions.create');

        Route::post('permissions', 'Access\PermissionController@store')->name('permissions.save');

        Route::get('permissions/{id}', 'Access\PermissionController@show')->name('permissions.show');

        Route::get('permissions/{id}/edit', 'Access\PermissionController@edit')->name('permissions.edit');

        Route::patch('permissions/{id}', 'Access\PermissionController@update')->name('permissions.update');

        Route::delete('permissions/{id}/delete', 'Access\PermissionController@destroy')->name('permissions.delete');

    });

    Route::get('profile', 'ProfileController@index')->name('profile.index');

    Route::get('profile/{id}/edit', 'ProfileController@edit')->name('profile.edit');

    Route::patch('profile/{id}', 'ProfileController@update')->name('profile.update');

    //View Template
    Route::view('/sample/dashboard', 'samples.dashboard');
    Route::view('/sample/buttons', 'samples.buttons');
    Route::view('/sample/social', 'samples.social');
    Route::view('/sample/cards', 'samples.cards');
    Route::view('/sample/forms', 'samples.forms');
    Route::view('/sample/modals', 'samples.modals');
    Route::view('/sample/switches', 'samples.switches');
    Route::view('/sample/tables', 'samples.tables');
    Route::view('/sample/tabs', 'samples.tabs');
    Route::view('/sample/icons-font-awesome', 'samples.font-awesome-icons');
    Route::view('/sample/icons-simple-line', 'samples.simple-line-icons');
    Route::view('/sample/widgets', 'samples.widgets');
    Route::view('/sample/charts', 'samples.charts');

    Route::view('/sample/error404', 'errors.404')->name('error404');
    Route::view('/sample/error500', 'errors.500')->name('error500');

    Route::view('/page/login', 'pages.login');
    Route::view('/page/register', 'pages.register');

});

/*
 * These routes require no users to be logged in
 */
Route::group(['middleware' => 'guest'], function () {

    Route::get('/', 'Auth\LoginController@showLoginForm')->name('login.main');

    Route::post('login', 'Auth\LoginController@login')->name('login.post');

});

Auth::routes();
