<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthenticationController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UserController;
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
Route::get('/', [\App\Http\Controllers\Front\IndexController::class,'home'])->name('home');
Route::get('/category/{slug}', [\App\Http\Controllers\Front\IndexController::class,'category'])->name('category');
Route::get('/article/{slug}', [\App\Http\Controllers\Front\IndexController::class,'article'])->name('article');
Route::get('/articles', [\App\Http\Controllers\Front\IndexController::class,'articles'])->name('articles');
Route::post('/comment/{id}', [\App\Http\Controllers\Front\IndexController::class,'comment'])->name('comment');
Route::get('/page/{slug}', [\App\Http\Controllers\Front\IndexController::class,'page'])->name('page');
Route::get('/search', [\App\Http\Controllers\Front\IndexController::class,'search'])->name('search');
Route::post('/subscription', [\App\Http\Controllers\Front\IndexController::class,'subscription'])->name('subscription');


Route::get('/admin/login',[AuthenticationController::class,'loginPage']);
Route::post('/admin/login',[AuthenticationController::class,'login'])->name('admin.login');
Route::group(["middleware" => ["auth:admin"], 'prefix' => 'admin'], function () {
    Route::post('/logout',[AuthenticationController::class,'logout'])->name('admin.logout');
    Route::get('/home',[IndexController::class,'index'])->name('admin.dashboard');
    Route::resource('admins', AdminController::class);
    Route::resource('role', RoleController::class);
    Route::resource('user', UserController::class);
    Route::resource('slider', SliderController::class);
    Route::resource('gallery', GalleryController::class);
    Route::resource('page', PageController::class);
    Route::resource('menu', MenuController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('log', LogController::class);
    Route::resource('contact-us', ContactUsController::class);
    Route::resource('news', NewsController::class);
//    Route::resource('config', ConfigController::class);

    Route::get('comment', [CommentController::class, 'index']);
    Route::get('comment/{comment}/edit', [CommentController::class, 'edit']);
    Route::post('comment', [CommentController::class, 'store']);
    Route::post('comment/change-status', [CommentController::class, 'changeStatus']);




});


