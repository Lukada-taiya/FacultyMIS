<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\DepartmentsController;
use App\Http\Controllers\LevelsController;
use App\Http\Controllers\ProgrammesController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\SemestersController;
use App\Http\Controllers\UsersController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('frontend/Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('frontend.home');

Route::get('/about', function () {
    return Inertia::render('frontend/About');
})->name('frontend.about');

Route::get('/contact', function () {
    return Inertia::render('frontend/Contact');
})->name('frontend.contact');


Route::get('/notice-board', function () {
    return Inertia::render('frontend/NoticeBoard');
})->name('frontend.notice-board');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('backend/Dashboard');
    })->name('dashboard');
});

Route::resource('/users', UsersController::class);

// Route::get('/request/all', function () {
//     return Inertia::render('backend/request/All');
// })->name('requests.all');
Route::get('/request-view', [RequestController::class, 'requestView'])->name('requests.view');
// Route::get('/pdf-preview', [RequestController::class, 'previewPdf'])->name('requests.preview');
Route::get('/requests/approve', [RequestController::class, 'approveRequest'])->name('requests.approve');
Route::get('/request/received', function () {
    return Inertia::render('backend/requests/Received');
})->name('requests.received');
Route::get('/request/sent', function () {
    return Inertia::render('backend/requests/Sent');
})->name('requests.sent');
Route::resource('/requests', RequestController::class);
Route::resource('/programmes', ProgrammesController::class);
Route::resource('/levels', LevelsController::class);
Route::resource('/semesters', SemestersController::class);
Route::resource('/courses', CoursesController::class);
Route::resource('/departments', DepartmentsController::class);

require_once __DIR__ . "/fortify.php";
require_once __DIR__ . "/jetstream.php";
