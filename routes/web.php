<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
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


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {

Route::get('top', [PostsController::class, 'index']);

Route::post('post/store', [PostsController::class, 'store']);

Route::post('post/update', [PostsController::class, 'update']);

Route::get('post/{id}/destroy', [PostsController::class, 'destroy']);

Route::get('profile', [ProfileController::class, 'edit'])->name('auth.profile');

Route::get('{userId}/profile', [ProfileController::class, 'show'])->name('other.profile');

Route::get('search', [UsersController::class, 'index']);

Route::get('follow/{userId}', [UsersController::class, 'store'])->name('follow');

Route::get('unfollow/{userId}', [UsersController::class, 'destroy'])->name('unfollow');

Route::get('follow-list', [UsersController::class, 'followList']);

Route::get('follower-list', [UsersController::class, 'followerList']);

});
