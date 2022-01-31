<?php

use App\Http\Controllers\API\v1\Auth\LoginController;
use App\Http\Controllers\API\v1\Auth\LogoutController;
use App\Http\Controllers\API\v1\Auth\RegisterController;
use App\Http\Controllers\API\v1\Auth\UserController;
use App\Http\Controllers\API\v1\BudgedActivity\CreateBudgedActivityController;
use App\Http\Controllers\API\v1\BudgedActivity\DeleteBudgedActivityController;
use App\Http\Controllers\API\v1\BudgedActivity\GetBudgedActivityController;
use App\Http\Controllers\API\v1\BudgedActivity\MakController;
use App\Http\Controllers\API\v1\BudgedActivity\Monitoring\CreateMonitoringController;
use App\Http\Controllers\API\v1\BudgedActivity\Monitoring\DeleteMonitoringController;
use App\Http\Controllers\API\v1\BudgedActivity\Monitoring\GetMonitoringController;
use App\Http\Controllers\API\v1\BudgedActivity\Monitoring\UpdateMonitoringController;
use App\Http\Controllers\API\v1\BudgedActivity\UpdateBudgedActivityController;
use App\Http\Controllers\API\v1\Client\ClientController;
use App\Http\Controllers\API\v1\Comment\CommentController;
use App\Http\Controllers\API\v1\File\FileController;
use App\Http\Controllers\API\v1\Helpdesk\CreateHelpdeskController;
use App\Http\Controllers\API\v1\Helpdesk\DeleteHelpdeskController;
use App\Http\Controllers\API\v1\Helpdesk\FileHelpdeskController;
use App\Http\Controllers\API\v1\Helpdesk\GetHelpdeskController;
use App\Http\Controllers\API\v1\Helpdesk\HelpdeskAssigmentController;
use App\Http\Controllers\API\v1\Helpdesk\HelpdeskStep\FileHelpdeskStepController;
use App\Http\Controllers\API\v1\Helpdesk\HelpdeskStep\GetHelpdeskStepController;
use App\Http\Controllers\API\v1\Helpdesk\HelpdeskStep\UpdateHelpdeskStepController;
use App\Http\Controllers\API\v1\Helpdesk\UpdateHelpdeskController;
use App\Http\Controllers\API\v1\History\HistoryController;
use App\Http\Controllers\API\v1\Params\ParamsController;
use App\Http\Controllers\API\v1\ServiceCategory\ServiceCategoryController;
use App\Http\Controllers\API\v1\User\GetUserController;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function() {
    Route::post('/login', LoginController::class);
    Route::post("/register", RegisterController::class);

    Route::prefix('/param')->group(function() {
        Route::get('/eselon1', [ParamsController::class, 'get_eselon1']);
        Route::get('/eselon2', [ParamsController::class, 'get_eselon2']);
    });

    Route::middleware('auth:api')->group(function() {
        Route::get("/user-login", UserController::class);
        Route::delete("/logout", LogoutController::class);

        Route::prefix('/user')->group(function() {
            Route::get('/', [GetUserController::class, 'get']);
        });
        
        Route::prefix('/param')->group(function() {
            Route::get('/email_type', [ParamsController::class, 'get_email_type']);
            Route::get('/signature', [ParamsController::class, 'get_signature']);
            Route::get('/class_type', [ParamsController::class, 'get_class_type']);
            Route::get('/update_type', [ParamsController::class, 'get_update_type']);
            Route::get('/complaint_type', [ParamsController::class, 'get_complaint_type']);
            Route::get('/category_client', [ParamsController::class, 'get_category_client']);
            Route::get('/milestone', [ParamsController::class, 'get_milestone']);
        });

        Route::get('/service_category', [ServiceCategoryController::class, 'get_service_category']);
    
        Route::prefix('/helpdesk')->group(function () {
            Route::post('/create', CreateHelpdeskController::class);
            Route::post('/update', [UpdateHelpdeskController::class, 'update_data']);
            Route::patch('/update/status', [UpdateHelpdeskController::class, 'update_status']);
            Route::get('/', [GetHelpdeskController::class, 'get_helpdesk']);
            Route::delete('/', DeleteHelpdeskController::class);
            Route::post('/file/create', [FileHelpdeskController::class, 'create']);
            Route::post('/assigment/create', [HelpdeskAssigmentController::class, 'create']);
        });

        Route::prefix('/helpdesk_step')->group(function () {
            Route::get('/', [GetHelpdeskStepController::class, 'get']);
            Route::patch('/', UpdateHelpdeskStepController::class);
            Route::post('/file/create', [FileHelpdeskStepController::class, 'create']); 
        });

        Route::prefix('/file')->group(function () {
            Route::get('/', [FileController::class, 'get']);
            Route::delete('/', [FileController::class, 'destroy']);
        });

        Route::prefix('/comment')->group(function () {
            Route::get('/get', [CommentController::class, 'get']);
            Route::post('/create', [CommentController::class, 'create']);
            Route::delete('/delete', [CommentController::class, 'delete']);
        });

        Route::prefix('/history')->group(function () {
            Route::get('/', [HistoryController::class, 'get']);
        });

        Route::prefix('/client')->group(function () {
            Route::get('/', [ClientController::class, 'get']);
            Route::post('/create', [ClientController::class, 'create']);
            Route::patch('/update', [ClientController::class, 'update']);
            Route::delete('/delete', [ClientController::class, 'delete']);
        });

        Route::prefix('/budged_activity')->group(function () {
            Route::get('/', [GetBudgedActivityController::class, 'get']);
            Route::post('/create', [CreateBudgedActivityController::class, 'create']);
            Route::patch('/update', [UpdateBudgedActivityController::class, 'update']);
            Route::delete('/delete', [DeleteBudgedActivityController::class, 'delete']);
        });

        Route::prefix('/mak')->group(function () {
            Route::get('/', [MakController::class, 'get']);
            Route::post('/create', [MakController::class, 'create']);
            Route::patch('/update', [MakController::class, 'update']);
            Route::delete('/delete', [MakController::class, 'delete']);
        });

        Route::prefix('/monitoring')->group(function () {
            Route::get('/get', [GetMonitoringController::class, 'get']);
            Route::post('/create', [CreateMonitoringController::class, 'create']);
            Route::patch('/update', [UpdateMonitoringController::class, 'update']);
            Route::patch('/update_status', [UpdateMonitoringController::class, 'update_status']);
            Route::delete('/delete', [DeleteMonitoringController::class, 'delete']);
            Route::post('/upload_file', [CreateMonitoringController::class, 'upload_file']);
        });
    });
});

