<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CityApi;
// use App\Http\Controllers\HomeController;
// // use App\Http\Controllers\Api\ApiController;
// use App\Http\Controllers\Api\UserController;
// use App\Http\Controllers\Api\VerificationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::get('/get', [App\Http\Controllers\Api\AuthController::class, 'get']);

// Api Route Started
Route::post('/register', [App\Http\Controllers\Api\AuthController::class, 'register']);
//API route for login user
Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);
//verification token
    Route::post('/generate_verificationP_token', [App\Http\Controllers\Api\AuthController::class, 'generateToken']);
    Route::post('/verify_verification_token', [App\Http\Controllers\Api\AuthController::class, 'verifyToken']);
    
    
Route::post('/forgot-password', [App\Http\Controllers\Api\AuthController::class, 'sendResetLinkEmail']);
Route::post('/reset-password', [App\Http\Controllers\Api\AuthController::class, 'reset']);

    Route::get('/state', [App\Http\Controllers\Api\AuthController::class, 'getstate']);
Route::get('city', [App\Http\Controllers\Api\AuthController::class, 'getcity']);

//Protecting Routes

//  Route::group(['middleware' => 'auth:sanctum'], function () {
//         Route::get('logout',     [App\Http\Controllers\Api\AuthController::class, 'login']);
//         Route::get('profile',      ' [App\Http\Controllers\Api\AuthController::class, 'profile']');
//     });
Route::group(['middleware' => ['auth:sanctum']], function () {
    
    Route::post('/profile', [App\Http\Controllers\Api\AuthController::class, 'profile']);
    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);

    //forms
    Route::post('/addform', [App\Http\Controllers\Api\FormsController::class, 'addForm']);
    Route::post('/editform', [App\Http\Controllers\Api\FormsController::class, 'editForm']);
    Route::post('/addformtype', [App\Http\Controllers\Api\FormsController::class, 'addFormType']);
    Route::post('/editformtype', [App\Http\Controllers\Api\FormsController::class, 'editFormType']);
    Route::post('/addformfiled', [App\Http\Controllers\Api\FormsController::class, 'addFormFiled']);
    Route::post('/editformfiled', [App\Http\Controllers\Api\FormsController::class, 'editFormFiled']);

    //Property
    Route::get('/list_property', [App\Http\Controllers\Api\propertyController::class, 'index']);
    Route::post('/add_property', [App\Http\Controllers\Api\propertyController::class, 'saveProperty']);
    Route::post('/property', [App\Http\Controllers\Api\propertyController::class, 'index']);
    Route::get('/show_property/{id}', [App\Http\Controllers\Api\propertyController::class, 'show']);

    //Enquiry
    Route::get('/list_enquiry', [App\Http\Controllers\Api\EnquiriesController::class, 'index']);
    Route::post('/add_Inquiry', [App\Http\Controllers\Api\EnquiriesController::class, 'saveEnquiry']);
    Route::post('/update_enquiry', [App\Http\Controllers\Api\EnquiriesController::class, 'saveEnquiry']);
    Route::get('/show_enquiry/{id}', [App\Http\Controllers\Api\EnquiriesController::class, 'show']);
    Route::get('/delete_enquiry/{id}', [App\Http\Controllers\Api\EnquiriesController::class, 'destory']);
    
      //Project
    Route::get('/Projects', [App\Http\Controllers\Api\ProjectsController::class, 'index']);
    Route::get('/show_project/{id}', [App\Http\Controllers\Api\ProjectsController::class, 'show']);
    Route::get('/delete_projects/{id}', [App\Http\Controllers\Api\ProjectsController::class, 'destroy']);
    Route::post('/save_projects', [App\Http\Controllers\Api\ProjectsController::class, 'saveProject']);
    Route::post('/update_projects', [App\Http\Controllers\Api\ProjectsController::class, 'saveProject']);

});


Route::apiResource('cities',CityApi::class);
