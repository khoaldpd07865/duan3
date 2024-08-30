<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\QuanTriTinController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Routes cho dashboard người dùng
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Routes cho profile
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/news2/{id}', [NewsController::class, 'show'])->name('news2.show');
Route::get('/tin/{id}', [NewsController::class, 'show'])->name('news.show');


// Routes cho download
Route::get('download', function () {
    return view('download');
})->middleware('auth');

// Routes cho trang chủ
Route::get('/', [HomeController::class, 'index'])->name('home');

// Routes cho categories và news
Route::get('/category/{id}', [CategoryController::class, 'show'])->name('category.show');
Route::get('/news/{id}', [NewsController::class, 'show'])->name('news.show');
Route::get('/search', [HomeController::class, 'search'])->name('search');

// Routes cho admin với middleware auth và admin
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/tin/them', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/tin/them', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/tin/capnhat/{id}', [AdminController::class, 'edit'])->name('admin.edit');
    Route::put('/tin/capnhat/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/tin/xoa/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

    // Route cho danh sách người dùng
    Route::get('/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::post('/users/{id}/update-group', [UserController::class, 'updateGroup'])->name('admin.users.updateGroup');

    // Route cho quản lý bình luận
    Route::get('/comments', [CommentController::class, 'index'])->name('admin.comments');
    Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('admin.comments.destroy');
    Route::get('/admin/contacts', [App\Http\Controllers\AdminController::class, 'showContacts'])->name('admin.contacts');

});

// Routes cho QuanTriTinController
Route::get('/quantritin', [QuanTriTinController::class, 'index'])->name('quantritin');

// Routes cho bình luận
Route::post('/news/{id}/comments', [NewsController::class, 'store'])->name('comments.store');
Route::put('/admin/users/{id}/update-group', [UserController::class, 'updateGroup'])->name('admin.users.updateGroup');
// routes/web.php
// routes/web.php
Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Routes cho login, logout và register sử dụng Laravel Breeze
require __DIR__ . '/auth.php';