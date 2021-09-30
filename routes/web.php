<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\PostController as DashboardPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Models\Post;

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

    $posts = Post::with('user')->withCount('comments')->paginate(2);

    return view('welcome', [
        'posts' => $posts
    ]);

})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
    DASHBOARD POST ROUTES || START
*/

    Route::prefix('/dashboard/post')
        ->middleware(['auth', 'verified'])
        ->group(function()
        {
            Route::get('/', [DashboardPostController::class, 'index'])->name('dashboard.post.index');
            Route::post('/', [DashboardPostController::class, 'store'])->name('dashboard.post.store');
            Route::get('/create', [DashboardPostController::class, 'create'])->name('dashboard.post.create');
            Route::get('/{post}', [DashboardPostController::class, 'show'])->name('dashboard.post.show');
            Route::patch('/{post}', [DashboardPostController::class, 'update'])->name('dashboard.post.update');
            Route::delete('/{post}', [DashboardPostController::class, 'destroy'])->name('dashboard.post.destroy');
            Route::get('/{post}/edit', [DashboardPostController::class, 'edit'])->name('dashboard.post.edit');
        });

/*
    DASHBOARD POST ROUTES || END
*/


/*
    COMMENT ROUTES || START
*/

    Route::prefix('/comment')
        ->middleware(['auth', 'verified'])
        ->group(function()
        {
            Route::post('/', [CommentController::class, 'store'])->name('comment.store');
            // Route::get('/create', [CommentController::class, 'create'])->name('comment.create');
            // Route::get('/{comment}', [CommentController::class, 'show'])->name('comment.show');
            Route::patch('/{comment}', [CommentController::class, 'update'])->name('comment.update');
            Route::delete('/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');
            Route::get('/{comment}/edit', [CommentController::class, 'edit'])->name('comment.edit');
        });

/*
    COMMENT ROUTES || END
*/

/*
    CLIENT POST ROUTES || START
*/

    Route::prefix('post')
        ->group(function()
        {
            // Route::get('/', [PostController::class, 'index'])->name('dashboard.post.index');
            // Route::post('/', [PostController::class, 'store'])->name('dashboard.post.store');
            // Route::get('/create', [PostController::class, 'create'])->name('dashboard.post.create');
            Route::get('/{post}', [PostController::class, 'show'])->name('post.show');
            // Route::patch('/{post}', [PostController::class, 'update'])->name('dashboard.post.update');
            // Route::delete('/{post}', [PostController::class, 'destroy'])->name('dashboard.post.destroy');
            // Route::get('/{post}/edit', [PostController::class, 'edit'])->name('dashboard.post.edit');
        });

/*
    CLIENT POST ROUTES || END
*/

require __DIR__.'/auth.php';
