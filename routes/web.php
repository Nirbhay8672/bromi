<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Rap2hpoutre\LaravelLogViewer\LogViewerController;
use App\Http\Controllers\Builder\HomeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('logs', [LogViewerController::class, 'index']);

Route::group(['middleware' => 'revalidate'], function () {
	Route::get('/home', function () {
		return redirect()->route('admin');
	});
	Route::get('logout', [LoginController::class, 'logout'])->name('what.logout');

	Route::get('/', function () {
		return redirect()->route('admin');
	});

	// Login, Register, Forgot Password, Reset Password
	Auth::routes(['verify' => true]);
});


Route::prefix('builder')->as('builder.')->middleware(['auth'])->group(function () {
    Route::get('/index', [HomeController::class, 'index'])->name('home');

	// project routes
	Route::any('/Projects', [HomeController::class, 'projects'])->name('projects');
	Route::get('/project/add', [HomeController::class, 'addproject'])->name('project.add');
	Route::get('/project/edit/{id}', [HomeController::class, 'editProject'])->name('project.edit');
	Route::post('/save-projects', [HomeController::class, 'saveProject'])->name('saveProject');
	Route::post('/delete-projects', [HomeController::class, 'destroy'])->name('deleteProject');
	Route::any('/project/view/{id}', [HomeController::class, 'viewProject'])->name('viewProject');

	Route::get('/logout', [HomeController::class, 'logout'])->name('logout');
});