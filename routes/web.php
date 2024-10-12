<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GssController;
use App\Http\Controllers\LecturerController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
})->name('home');
Route::post('login', [AuthController::class, 'authenticate'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');


Route::get('admin/login', [AuthController::class, 'showAdmin'])->name('admin.login')->middleware(['guest']);
Route::post('admin/login', [AuthController::class, 'authenticateAdmin']);

Route::get('lecturer/login', [AuthController::class, 'showLecturer'])->name('lecturer.login')->middleware(['guest']);
Route::post('lecturer/login', [AuthController::class, 'authenticateLecturer']);

Route::prefix('admin')->middleware(['admins'])->group(function () {
    Route::get('/',  [AdminController::class, 'show'])->name('admin.dashboard');
    Route::get('/users',  [AdminController::class, 'users'])->name('admin.users');
    Route::get('/lecturers',  [AdminController::class, 'lecturers'])->name('admin.lecturers');
    Route::get('/faculties',  [AdminController::class, 'faculties'])->name('admin.faculties');
});

Route::prefix('lecturer')->middleware(['lecturers'])->group(function () {
    Route::get('/',  [LecturerController::class, 'show'])->name('lecturer.dashboard');
    Route::get('/users',  [LecturerController::class, 'users'])->name('lecturer.materials');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/courses',  [DashboardController::class, 'courses'])->name('courses');
    Route::get('/courses/add',  [CourseController::class, 'addAllCourses'])->name('courses.add');
    Route::get('/courses/delete/{id}',  [CourseController::class, 'deleteCourse'])->name('courses.delete');

    Route::get('/lectures',  [DashboardController::class, 'lectures'])->name('lectures');
    Route::get('/sgs',  [GssController::class, 'sgs'])->name('sgs');
    Route::get('/sgs/courses',  [GssController::class, 'sgsCourses'])->name('sgs.courses');
    Route::get('/sgs/fees',  [GssController::class, 'sgsFees'])->name('sgs.fees');
    Route::get('/sgs/results',  [GssController::class, 'sgsResults'])->name('sgs.results');
    Route::get('/results',  [DashboardController::class, 'results'])->name('results');
    Route::get('/fees',  [DashboardController::class, 'fees'])->name('fees');
    Route::post('/fees/generate',  [DashboardController::class, 'generateRef'])->name('generate.ref');
    Route::get('/profile',  [DashboardController::class, 'profile'])->name('profile');
});
