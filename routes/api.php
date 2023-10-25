<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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
//verification token
Route::get('/state', [App\Http\Controllers\Api\AuthController::class, 'getstate']);
Route::post('/city', [App\Http\Controllers\Api\AuthController::class, 'getcity']);

Route::post('/forgot-password', [App\Http\Controllers\Api\AuthController::class, 'sendResetLinkEmail']);
Route::post('/reset-password', [App\Http\Controllers\Api\AuthController::class, 'reset']);


//Protecting Routes

//  Route::group(['middleware' => 'auth:sanctum'], function () {
//         Route::get('logout',     [App\Http\Controllers\Api\AuthController::class, 'login']);
//         Route::get('profile',      ' [App\Http\Controllers\Api\AuthController::class, 'profile']');
//     });
Route::group(['middleware' => ['auth:sanctum']], function () {
    
    Route::post('/profile', [App\Http\Controllers\Api\AuthController::class, 'profile']);
    Route::post('/edit_profile', [App\Http\Controllers\Api\AuthController::class, 'chnageProfile']);
    Route::post('/changepassword', [App\Http\Controllers\Api\AuthController::class, 'chnagePassword'])->name('change-pwd');

    // API route for logout user
    Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);

    
    //forms    
    Route::get('/getformdata', [App\Http\Controllers\Api\FormsController::class, 'getformdata']);
    Route::post('/addform', [App\Http\Controllers\Api\FormsController::class, 'addForm']);
    Route::post('/editform', [App\Http\Controllers\Api\FormsController::class, 'editForm']);
    Route::post('/addformtype', [App\Http\Controllers\Api\FormsController::class, 'addFormType']);
    Route::post('/editformtype', [App\Http\Controllers\Api\FormsController::class, 'editFormType']);
    Route::post('/addformfiled', [App\Http\Controllers\Api\FormsController::class, 'addFormFiled']);
    Route::post('/editformfiled', [App\Http\Controllers\Api\FormsController::class, 'editFormFiled']);
    Route::post('/formfieldimport', [App\Http\Controllers\Api\FormsController::class, 'importExcel']);

    //Property
    Route::post('/list_property', [App\Http\Controllers\Api\propertyController::class, 'index']);
    Route::post('/add_property', [App\Http\Controllers\Api\propertyController::class, 'saveProperty']);
    Route::post('/property', [App\Http\Controllers\Api\propertyController::class, 'index']);
    Route::get('/show_property/{id}', [App\Http\Controllers\Api\propertyController::class, 'show']);
    Route::get('/delete/{id}', [App\Http\Controllers\Api\propertyController::class, 'destory']);
    Route::get('/isfavorites', [App\Http\Controllers\Api\propertyController::class, 'IsFavorites']);
    Route::post('/export-property', [App\Http\Controllers\Api\PropertyController::class, 'exportProperty']);

    // add proprty in steps routes
    Route::post('properties/step1', [App\Http\Controllers\Api\propertyController::class, 'createPropertyStep1']);
    Route::patch('properties/step2/{property}', [App\Http\Controllers\Api\propertyController::class, 'createPropertyStep2']);
    Route::patch('properties/step3/{property}', [App\Http\Controllers\Api\propertyController::class, 'createPropertyStep3']);



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
    Route::post('/add_projects', [App\Http\Controllers\Api\ProjectsController::class, 'saveProject']);
    Route::post('/update_projects', [App\Http\Controllers\Api\ProjectsController::class, 'saveProject']);

    //Report
    Route::any('/employee-audit-log', [App\Http\Controllers\Api\ReportsController::class, 'EmployeeAuditLog']);
    Route::any('/employee-by-enquiry', [App\Http\Controllers\Api\ReportsController::class, 'EmployeeByEnquiry']);
    Route::any('/employee-logged', [App\Http\Controllers\Api\ReportsController::class, 'EmployeeLogged']);
    Route::any('/employee-remarks', [App\Http\Controllers\Api\ReportsController::class, 'EnquiryRemarks']);
    Route::any('/property-rented-sold', [App\Http\Controllers\Api\ReportsController::class, 'PropertySold']);
    Route::any('/property-viewer', [App\Http\Controllers\Api\ReportsController::class, 'PropertyViewer']);
    Route::any('/Enquiry-Period', [App\Http\Controllers\Api\ReportsController::class, 'EnquiryPeriod']);
    Route::any('/employee-performance', [App\Http\Controllers\Api\ReportsController::class, 'employeePerformance']);
    Route::any('/reports', [App\Http\Controllers\Api\ReportsController::class, 'ReportPage']);
    Route::get('/Profile-details', [HomeController::class, 'ProfileDetails']);
    Route::get('/share-property', [PropertyController::class, 'ShareProperty']);

    Route::get('/dashboard', [App\Http\Controllers\Api\HomeController::class, 'index']);

});
