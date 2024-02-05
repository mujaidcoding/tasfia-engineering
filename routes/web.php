<?php

use App\Http\Controllers\Backend\Admin\BlogsController;
use App\Http\Controllers\Backend\Admin\FaqsController;
use App\Http\Controllers\Backend\Admin\MailController;
use App\Http\Controllers\Backend\Admin\PermissionController;
use App\Http\Controllers\Backend\Admin\ProjectController;
use App\Http\Controllers\Backend\Admin\RoleController;
use App\Http\Controllers\Backend\Admin\ServiceController;
use App\Http\Controllers\Backend\Admin\TestimonialController;
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
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/services', [FrontendController::class, 'services'])->name('services');
Route::get('/service/{slug}', [FrontendController::class, 'serviceDetail'])->name('service.detail');
Route::get('/projects', [FrontendController::class, 'projects'])->name('projects');
Route::get('/feedbacks', [FrontendController::class, 'feedbacks'])->name('feedbacks');
Route::get('/faqs', [FrontendController::class, 'faqs'])->name('faqs');
Route::get('/blogs', [FrontendController::class, 'blogs'])->name('blogs');
Route::get('/blog/{slug}', [FrontendController::class, 'blogCategory'])->name('all.category');
Route::get('/blog/details/{slug}', [FrontendController::class, 'blogDetail'])->name('blog.detail');
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');

Route::get('/dashboard', [FrontController::class, 'index'])->name('admin.dashboard');

// ////// Service All Routes ////////////////
Route::controller(ServiceController::class)->group(function () {
    Route::get('/all/services', 'AllServices')->name('all.services');
    Route::get('/add/service', 'AddService')->name('add.service');
    Route::post('/add/service', 'StoreService')->name('store.service');
    Route::get('/edit/{id}/service', 'EditService')->name('edit.service');
    Route::post('/update/service', 'UpdateService')->name('update.service');
    Route::get('/delete/{id}/service', 'DeleteService')->name('delete.service');

});

//////// Projects All Routes ////////////////
Route::controller(ProjectController::class)->group(function () {
    Route::get('/all/projects', 'AllProjects')->name('all.projects');
    Route::get('/add/project', 'AddProject')->name('add.project');
    Route::post('/add/project', 'StoreProject')->name('store.project');
    Route::get('/edit/{id}/project', 'EditProject')->name('edit.project');
    Route::post('/update/project', 'UpdateProject')->name('update.project');
    Route::get('/delete/{id}/project', 'DeleteProject')->name('delete.project');
});

// ////// Faqs All Routes ////////////////

Route::controller(FaqsController::class)->group(function () {
    Route::get('/all/faqs', 'AllFaqs')->name('all.faqs');
    Route::get('/add/faq', 'AddFaq')->name('add.faq');
    Route::post('/add/faq', 'StoreFaq')->name('store.faq');
    Route::get('/edit/{id}/faq', 'EditFaq')->name('edit.faq');
    Route::post('/update/faq', 'UpdateFaq')->name('update.faq');
    Route::get('/delete/{id}/faq', 'DeleteFaq')->name('delete.faq');
});


// ////// Feedback All Routes ////////////////

Route::controller(TestimonialController::class)->group(function () {
    Route::get('/all/feedbacks', 'AllFeedbacks')->name('all.feedbacks');
    Route::get('/add/feedback', 'AddFeedback')->name('add.feedback');
    Route::post('/add/feedback', 'StoreFeedback')->name('store.feedback');
    Route::get('/edit/{id}/feedback', 'EditFeedback')->name('edit.feedback');
    Route::post('/update/feedback', 'UpdateFeedback')->name('update.feedback');
    Route::get('/delete/{id}/feedback', 'DeleteFeedback')->name('delete.feedback');
});



// ////// Blogs All Routes ////////////////

Route::controller(BlogsController::class)->group(function () {

    // Blog category Controller All Route
    Route::get('all/blog/category', 'AllBlogCategory')->name('blog.category');
    Route::post('/add/category', 'StoreBlogCategory')->name('store.blog.category');
    Route::get('/edit/blog/category/{id}', 'EditBlogCategory')->name('edit.blog.category');
    Route::post('/update/category', 'UpdateBlogCategory')->name('update.blog.category');
    Route::get('/delete/{id}/category', 'DeleteBlogCategory')->name('delete.blog.category');

    // Blog Posts Controller All Route

    Route::get('all/blog/', 'AllBlogs')->name('all.blogs');
    Route::get('/add/blog', 'AddBlog')->name('add.blog');
    Route::post('/add/blog', 'StoreBlog')->name('store.blog');
    Route::get('/edit/{id}/blog/', 'EditBlog')->name('edit.blog');
    Route::post('/update/blog', 'UpdateBlog')->name('update.blog');
    Route::get('/delete/{id}/blog', 'DeleteBlog')->name('delete.blog');

});

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
