<?php

use App\Http\Controllers\Api\NewsController as ApiNewsController;
use App\Http\Controllers\Api\CommentController as ApiCommentController;
use App\Http\Controllers\Api\CategoryController as ApiCategoryController; // Đảm bảo đã nhập khẩu lớp này
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

// Đăng ký và đăng nhập
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);

// Các route yêu cầu xác thực
Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('news')->group(function () {
        Route::get('/', [ApiNewsController::class, 'index'])->name('api.news.index');
        Route::get('/{id}', [ApiNewsController::class, 'show'])->name('api.news.show');
        Route::post('/', [ApiNewsController::class, 'store'])->name('api.news.store');
        Route::put('/{id}', [ApiNewsController::class, 'update'])->name('api.news.update');
        Route::delete('/{id}', [ApiNewsController::class, 'destroy'])->name('api.news.destroy');
    });

    Route::middleware('auth:sanctum')->prefix('comments')->group(function () {
        // Thêm bình luận
        Route::post('/{newsId}', [ApiCommentController::class, 'store'])->name('api.comments.store');
        // Xóa bình luận
        Route::delete('/{id}', [ApiCommentController::class, 'destroy'])->name('api.comments.destroy');
        // Lấy thông tin bình luận theo ID
        Route::get('/{id}', [ApiCommentController::class, 'show'])->name('api.comments.show');
    });
    

    Route::prefix('categories')->group(function () {
        Route::get('/', [ApiCategoryController::class, 'index'])->name('api.categories.index');
        Route::post('/', [ApiCategoryController::class, 'store'])->name('api.categories.store');
        Route::get('/{id}', [ApiCategoryController::class, 'show'])->name('api.categories.show');
        Route::put('/{id}', [ApiCategoryController::class, 'update'])->name('api.categories.update');
        Route::delete('/{id}', [ApiCategoryController::class, 'destroy'])->name('api.categories.destroy');
    });
});