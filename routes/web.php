<?php


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
});


Route::get('/login', 'LoginController@loginview')->name('login');
Route::post('/login', 'LoginController@login')->name('login-post');
Route::get('/phone-num', 'LoginController@PhoneNumView')->name('phone-num');
Route::post('/phone-num', 'LoginController@PhoneNum')->name('phone-num-post');
Route::get('/verify', 'LoginController@VerifyView')->name('verify');
Route::post('/verify', 'LoginController@Verify')->name('verify-post');
Route::post('/logout', 'LoginController@Logout')->name('logout');
Route::get('/resend', 'LoginController@ReSend')->name('resend');

Route::group(['prefix' => 'recovery'], function() {
    Route::get('/way', 'RecoveryController@RecoveryWay')->name('recovery-way');
    Route::get('/phone', 'RecoveryController@RecoveryPhoneView')->name('recovery-phone');
    Route::post('/phone', 'RecoveryController@RecoveryPhone')->name('recovery-phone-post');
    Route::get('/email', 'RecoveryController@RecoveryEmailView')->name('recovery-email');
    Route::post('/email', 'RecoveryController@RecoveryEmail')->name('recovery-email-post');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', 'DashboardController@dashboard')->name('dashboard');
    Route::get('/active/sessions', 'DashboardController@ActiveSessions')->name('active-sessions');
    Route::get('/user/data', 'DashboardController@DataUserView')->name('change-user-data');
    Route::post('/user/data', 'DashboardController@DataUser')->name('change-user-data-post');
    Route::get('/change/password', 'ChangePasswordController@ChangePasswordView')->name('change-password');
    Route::post('/change/password', 'ChangePasswordController@ChangePassword')->name('change-password-post');
    Route::get('/users', 'DashboardController@UsersList')->name('users');
    Route::get('/create/permission', 'DashboardController@CreatePermissionView')->name('create-permission');
    Route::post('/create/permission', 'DashboardController@CreatePermission')->name('role-post');
    Route::get('/permissions', 'DashboardController@Role')->name('permissions');
    Route::get('/edit/user/{id}', 'DashboardController@EditUserView')->name('edit-user');
    Route::post('/edit/user/{id}', 'DashboardController@EditUser')->name('edit-user-post');
    Route::get('/roles', 'DashboardController@RoleList')->name('roles');
    Route::get('/edit/role/{id}', 'DashboardController@EditRoleView')->name('edit-role');
    Route::post('/edit/role/{id}', 'DashboardController@EditRole')->name('edit-role-post');
    Route::delete('/delete/role/{id}', 'DashboardController@DeleteRole')->name('delete-role');

    Route::delete('/delete/{id}', 'DashboardController@DeleteSession');
});
