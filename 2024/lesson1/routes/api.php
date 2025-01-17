<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\ReportTypeController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\PrisonerController;
use App\Http\Controllers\UserController;



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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/comment/all/{report_id}',[CommentController::class,'getComments']);
Route::get('/prisoner/all',[PrisonerController::class,'getPrisoners']);

Route::group(['middleware'=>'auth:sanctum'],function(){
    Route::get("report_types/all",[ReportTypeController::class,'getReportTypes']);
    Route::put('report/add',[ReportController::class,'addReport']);
    Route::put('report_types/add',[ReportTypeController::class,'addReportType']);
    Route::put('report_types/edit',[ReportTypeController::class,'editReportType']);
    Route::put('report/edit',[ReportController::class,'editReport']); 
    Route::get("report/delete/{id}",[ReportController::class,'deleteReport']);
    Route::get("report_types/delete/{id}",[ReportTypeController::class,'deleteReportType']);
    Route::resource('/comment',CommentController::class, ['except' => ['show']]);
    Route::resource('/user',UserController::class, ['except' => ['show']]);
    Route::resource('/prisoner',PrisonerController::class, ['except' => ['show']]);
});
Route::resource('/comment', CommentController::class,['only'=>['show']]);
Route::resource('/prisoner',PrisonerController::class, ['only' => ['show']]);
Route::resource('/prisoner',PrisonerController::class, ['only' => ['search']]);
Route::get("report/all",[ReportController::class,'getReports']);
Route::get("report/{id}",[ReportController::class,'getReport']);
Route::get("report_types/{id}",[ReportTypeController::class,'getReportType']);
Route::get("report_types/tag/{tag}",[ReportTypeController::class,'getReportTypeByTag']);
Route::get("report_types_all/",[ReportTypeController::class,'getReportTypes']);
 
 
