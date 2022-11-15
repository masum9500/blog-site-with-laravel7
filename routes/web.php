<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\loginController;

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
Route::group(['middleware'=>'UserMiddleware'],function(){
	Route::get('/', [HomeController::class, 'index'])->name('/');
	Route::get('/about-us', [HomeController::class, 'about'])->name('about.us');
	Route::get('/blog-list', [BlogController::class, 'list'])->name('blog.list');
	Route::post('/commentAdd', [BlogController::class, 'commentAdd']);
	Route::post('/replyComment', [BlogController::class, 'replyComment']);
	Route::get('/blog-post/{id}', [BlogController::class, 'post'])->name('blog.post');
	Route::get('ViewBlog', [AdminController::class, 'ViewBlog'])->name('Blogview');
	Route::get('/logout', [loginController::class, 'logout'])->name('logout');
});
Route::group(['middleware'=>'AdminMiddleware'],function(){
	Route::get('admin/dashboard/add-post', [BlogController::class, 'addPost'])->name('add_post');
	Route::post('submiteBlog', [AdminController::class, 'submiteBlog']);
	Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin_dashboard');
	Route::get('/admin/dashboard/AddSubAdmin', [AdminController::class, 'addsubadmin'])->name('subAdminAdd');
	Route::post('registration', [loginController::class, 'registration']);
	Route::get('/admin/dashboard/subAdminView', [AdminController::class, 'subAdminView'])->name('subAdminView');
	Route::get('/admin/dashboard/subAdminView/inactive/{id}', [AdminController::class, 'Userinctive'])->name('inactive');
	Route::get('/admin/dashboard/subAdminView/active/{id}', [AdminController::class, 'Useractive'])->name('active');
	Route::get('admin/dashboard/view-post', [BlogController::class, 'viewPost'])->name('Post_view');
	Route::get('admin/dashboard/view-post/blogDetails/{id}', [BlogController::class, 'blogDetails'])->name('blogDetails');
	Route::post('admin/dashboard/view-post/blogDetails', [BlogController::class, 'updateStatus'])->name('updateStatus');
});




Route::get('/login-form', [loginController::class, 'index']);

Route::post('loginsubmit', [loginController::class, 'loginsubmit']);