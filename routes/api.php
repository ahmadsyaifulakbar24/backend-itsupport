<?php

use App\Http\Controllers\API\v1\Auth\LoginController;
use App\Http\Controllers\API\v1\Auth\LogoutController;
use App\Http\Controllers\API\v1\Auth\RegisterController;
use App\Http\Controllers\API\v1\Auth\UserController;
use App\Http\Controllers\API\v1\Helpdesk\CreateHelpdeskController;
use App\Http\Controllers\API\v1\Helpdesk\DeleteHelpdeskController;
use App\Http\Controllers\API\v1\Helpdesk\GetHelpdeskController;
use App\Http\Controllers\API\v1\Helpdesk\UpdateHelpdeskController;
use App\Http\Controllers\API\v1\Params\ParamsController;
use App\Http\Controllers\API\v1\ServiceCategory\ServiceCategoryController;
use Illuminate\Http\Request;
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
        
        Route::prefix('/param')->group(function() {
            Route::get('/email_type', [ParamsController::class, 'get_email_type']);
            Route::get('/signature', [ParamsController::class, 'get_signature']);
            Route::get('/class_type', [ParamsController::class, 'get_class_type']);
            Route::get('/update_type', [ParamsController::class, 'get_update_type']);
            Route::get('/complaint_type', [ParamsController::class, 'get_complaint_type']);
        });

        Route::get('/service_category', [ServiceCategoryController::class, 'get_service_category']);
    
        Route::prefix('/helpdesk')->group(function () {
            Route::post('/create', CreateHelpdeskController::class);
            Route::post('/update', UpdateHelpdeskController::class);
            Route::get('/', [GetHelpdeskController::class, 'get_helpdesk']);
            Route::delete('/', DeleteHelpdeskController::class);
        });
    });
});

