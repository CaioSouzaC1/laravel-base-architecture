<?php

use App\Builder\ReturnApi;
use App\Events\PlaygroundEvent;
use App\Http\Controllers\Auth\AuthController;
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


Route::get("/playground", function () {

    event(new PlaygroundEvent());
    return ReturnApi::success(message: "Playground");
});
//     Route::post("/login", [AuthController::class, "login"]);




// Route::middleware('auth.api')->group(function () {
//     Route::get("/me", [AuthController::class, "me"]);
// });
