<?php

use App\Http\Controllers\Backend\Admin\MailController;
use App\Http\Controllers\Backend\Admin\PermissionController;
use App\Http\Controllers\Backend\Admin\RoleController;
use App\Http\Controllers\Backend\Admin\UserController;
use App\Http\Controllers\Backend\FrontController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [FrontendController::class, 'index'])->name('home');

Route::get('/dashboard', [FrontController::class, 'index'])->name('admin.dashboard');

Route::middleware(['auth', 'verified', 'roles:super-admin'])->group(function () {

    // Permission All Route
    Route::controller(RoleController::class)->group(function () {
        Route::get('/all/permission', 'AllPermission')->name('all.permission');
        Route::get('/add/permission', 'AddPermission')->name('add.permission');
        Route::post('/store/permission', 'StorePermission')->name('store.permission');
        Route::get('/edit/{id}/permission', 'EditPermission')->name('edit.permission');
        Route::post('/update/permission', 'UpdatePermission')->name('update.permission');
        Route::get('/delete/{id}/permission', 'DeletePermission')->name('delete.permission');

    });
    // Role All Route
    Route::controller(RoleController::class)->group(function () {
        Route::get('/all/roles', 'AllRoles')->name('all.roles');
        Route::get('/add/role', 'AddRole')->name('add.role');
        Route::post('/store/role', 'StoreRole')->name('store.role');
        Route::get('/edit/{id}/role', 'EditRole')->name('edit.role');
        Route::post('/update/role', 'UpdateRole')->name('update.role');
        Route::get('/delete/{id}/role', 'DeleteRole')->name('delete.role');


        Route::get('/add/roles/permission', 'AddRolesPermission')->name('add.roles.permission');
        Route::post('/store/roles/permission', 'StoreRolesPermission')->name('store.roles.permission');
        Route::get('/all/roles/permission', 'AllRolesPermission')->name('all.roles.permission');
        Route::get('/edit/{id}/roles/permission', 'EditRolesPermission')->name('edit.roles.permission');
        Route::post('/update/roles/permission', 'UpdateRolesPermission')->name('update.roles.permission');
        Route::get('/delete/{id}/roles/permission', 'DeleteRolesPermission')->name('delete.roles.permission');

    });

    // Permission All Route
    Route::controller(UserController::class)->group(function () {
        Route::get('/all/user', 'AllUser')->name('all.user');
        Route::get('/add/user', 'AddUser')->name('add.user');
        Route::post('/store/user', 'StoreUser')->name('store.user');
        Route::get('/edit/{id}/user', 'EditUser')->name('edit.user');
        Route::post('/update/user', 'UpdateUser')->name('update.user');
        Route::post('/update/user/status/{id}', 'updateUserStatus')->name('update.user.status');
        Route::get('/delete/{id}/user', 'DeleteUser')->name('delete.user');

    });

    Route::controller(MailController::class)->group(function () {
        Route::get('/smtp/', 'SmtpSettings')->name('smtp.settings');
        Route::post('/smtp/', 'UpdateSmtp')->name('update.smtp');

    });


});




Route::middleware(['auth', 'verified'])->group(function () {
    // Admin View Section

    Route::get('/logout', [ProfileController::class, 'UserLogout'])->name('user.logout');
    Route::get('/profile', [ProfileController::class, 'UserProfile'])->name('user.profile');
    Route::post('/profile/store', [ProfileController::class, 'UserProfileStore'])->name('user.profile.store');
    Route::get('/profile/{id}/delete', [ProfileController::class, 'UserProfileDelete'])->name('user.profile.delete');

    Route::get('/change/password', [ProfileController::class, 'UserChangePassword'])->name('user.change.password');
    Route::post('/password/update', [ProfileController::class, 'UserPasswordUpdate'])->name('user.password.update');
});

require __DIR__.'/auth.php';
