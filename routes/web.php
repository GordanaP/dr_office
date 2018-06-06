<?php

Route::get('/test', function(){
    return view('test')->with([
        'roles' => \App\Role::all()
    ]);
});

/**
 * Auth
 */
Route::namespace('Auth')->group(function(){
    Route::post('/login', 'LoginController@login')->name('login');
    Route::get('/login', 'LoginController@showLoginForm');
    Route::post('/logout', 'LoginController@logout')->name('logout');
    Route::post('/password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/reset', 'ResetPasswordController@reset');
    Route::get('/password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
});

/**
 * Page
 */
Route::get('/', 'PageController@index')->name('index');
Route::get('/home', 'PageController@home')->name('home');
Route::get('admin/dashboard', 'PageController@dashboard')->name('admin.dashboard');
Route::get('admin/settings', 'PageController@settings')->name('admin.settings');

/**
 * ActivationToken
 */
Route::resource('accounts/token','Auth\ActivationController', [
    'parameters' => ['token' => 'activationToken'],
    'only' => ['create', 'store', 'show']
]);

/**
 * User
 */
Route::prefix('settings')->namespace('User')->name('users.')->group(function() {

    /**
     * Account
     */
    Route::get('/myaccount', 'AccountController@edit')->name('accounts.edit');
    Route::put('/myaccount', 'AccountController@update')->name('accounts.update');

    /**
     * Profile
     */
    Route::get('/myprofile', 'ProfileController@edit')->name('profiles.edit');
    Route::put('/myprofile', 'ProfileController@update')->name('profiles.update');

    /**
     * Avatar
     */
    Route::get('/myavatar', 'AvatarController@edit')->name('avatars.edit');
    Route::put('/myavatar', 'AvatarController@update')->name('avatars.update');
});

/**
 * Admin
 */
Route::prefix('admin')->namespace('User')->name('admin.')->group(function() {

    /**
     * Account
     */
    Route::get('/accounts/list', 'AccountController@accountsList')->name('accounts.list');
    Route::resource('/accounts', 'AccountController', [
        'parameters' => ['accounts' => 'userId'],
        'only' => ['index','store', 'show', 'update', 'destroy']
    ]);

    /**
     * Role
     */
    Route::delete('/roles-revoke/{userId}', 'RoleController@revoke')->name('roles.revoke');
    Route::resource('/roles', 'RoleController', [
        'only' => ['index', 'store', 'edit', 'update', 'destroy']
    ]);

    /**
     * Profile
     */
    Route::resource('/profiles', 'ProfileController', [
        'parameters' => ['profiles' => 'userId'],
        'only' => ['show', 'update', 'destroy']
    ]);

    /**
     * Avatar
     */
    Route::resource('avatars', 'AvatarController', [
        'parameters' => ['avatars' => 'userId'],
        'only' => ['show', 'update']
    ]);
});