<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\AutoStoryViewerController;
use App\Http\Controllers\InstagramLogin_client;
use App\Http\Controllers\InstagramLogin_Dump;
use App\Http\Controllers\InstagramLoginController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

//agent routes
Route::middleware(['auth', 'role:agent'])->group(function () {
    Route::get('/agent/dashboard', [AgentController::class, 'dashboard'])->name('agent.dashboard');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [AutoStoryViewerController::class, 'index'])->name('dashboard');
    Route::post('/auto-story-viewer-start', [AutoStoryViewerController::class, 'startAutoStory']);
    Route::post('/auto-story-viewer-stop', [AutoStoryViewerController::class, 'stopAutoStory']);
    Route::post('/process-targets', [AutoStoryViewerController::class, 'processTargets']);
    Route::get('/status-output', [AutoStoryViewerController::class, 'outputStatus']);
    Route::post('/instagram-login', [InstagramLogin_Dump::class, 'login'])->name('instagram.login');
    Route::get('/instagram-login', function () {
        return view('auth.login');
    })->name('instagram.login');

    Route::post('/instagram-login-client', [InstagramLogin_client::class, 'login'])->name('instagram.login_client');
    Route::get('/instagram-login-client', function () {
        return view('dashboard');
    })->name('instagram.login_client');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::resource('dashboard', DashboardController::class);
});
require __DIR__ . '/auth.php';