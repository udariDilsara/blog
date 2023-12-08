<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;

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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/post', [PostController::class, 'create'])->name('post.create');
    Route::post('/post', [PostController::class, 'store'])->name('post.store');
    //::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');

    Route::get('/post/list', [PostController::class, 'getPostlist'])->name('post.postlist');
    //Route::get('/post/{postId}/index', [PostController::class, 'getCommentList'])->name('comment.list');
    Route::get('/post//{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::put('/post/{post}/update', [PostController::class, 'update'])->name('post.update');
    Route::delete('/post/{post}/delete', [PostController::class, 'delete'])->name('post.destroy');
    Route::get('/post/{postId}/view', [PostController::class, 'show'])->name('post.view');

    //Route::get('/comment', [CommentController::class, 'create'])->name('comment.create');

    Route::post('/comment/{postId}/store', [CommentController::class, 'store'])->name('comment.store');
    Route::get('/comment/{postId}/index', [CommentController::class, 'index'])->name('comment.index');
    // Route::get('/comment/index', [CommentController::class, 'indexx'])->name('comment.indexx');

    //Route::get('/comment/{comment}/edit', [CommentController::class, 'edit'])->name('comment.edit');
    Route::get('/comment/{id}/edit', [CommentController::class, 'edit'])->name('comment.edit');
    Route::put('/comment/{id}/update', [CommentController::class, 'update'])->name('comment.update');
    Route::delete('/comment/{id}/destroy', [CommentController::class, 'destroy'])->name('comment.destroy');

    Route::post('/like/{postId}/store', [LikeController::class, 'store'])->name('like.store');
});

require __DIR__ . '/auth.php';
