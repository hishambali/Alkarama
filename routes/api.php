<?php

use App\Http\Controllers\API\AssociationController;
use App\Http\Controllers\API\BossController;
use App\Http\Controllers\API\ClothesController;
use App\Http\Controllers\API\ClubController;
use App\Http\Controllers\API\EmployeeController;
use App\Http\Controllers\API\InformationController;
use App\Http\Controllers\API\MatchesController;
use App\Http\Controllers\API\PlanController;
use App\Http\Controllers\API\PlayerController;
use App\Http\Controllers\API\PrimeController;
use App\Http\Controllers\API\ReplacmentController;
use App\Http\Controllers\API\SeasoneController;
use App\Http\Controllers\API\SportController;
use App\Http\Controllers\API\StandingsController;
use App\Http\Controllers\API\StatisticController;
use App\Http\Controllers\API\TopFanController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\VideoController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('association')->group(function(){
    Route::get("/index",[AssociationController::class,'index']);
    Route::get("/show/{uuid}",[AssociationController::class,'show']);
    Route::post("/store",[AssociationController::class,'store']);
    Route::post("/edit/{uuid}",[AssociationController::class,'store']);
});
Route::prefix('boss')->group(function(){
    Route::get("/index",[BossController::class,'index']);
    Route::get("/show/{uuid}",[BossController::class,'show']);
    Route::post("/store",[BossController::class,'store']);
    Route::post("/edit/{uuid}",[BossController::class,'store']);

});
Route::prefix('club')->group(function(){
    Route::get("/index",[ClubController::class,'index']);
    Route::get("/show/{uuid}",[ClubController::class,'show']);
    Route::post("/store",[ClubController::class,'store']);
    Route::post("/edit/{uuid}",[ClubController::class,'store']);

});
Route::prefix('employee')->group(function(){
    Route::get("/index",[EmployeeController::class,'index']);
    Route::get("/show/{uuid}",[EmployeeController::class,'show']);
    Route::post("/store",[EmployeeController::class,'store']);
    Route::post("/edit/{uuid}",[EmployeeController::class,'store']);

});
Route::prefix('information')->group(function(){
    Route::get("/index",[InformationController::class,'index']);
    Route::get("/show/{uuid}",[InformationController::class,'show']);
    Route::post("/store",[InformationController::class,'store']);
    Route::post("/edit/{uuid}",[InformationController::class,'store']);

});
Route::prefix('plan')->group(function(){
    Route::get("/index",[PlanController::class,'index']);
    Route::get("/show/{uuid}",[PlanController::class,'show']);
    Route::post("/store",[PlanController::class,'store']);
    Route::post("/edit/{uuid}",[PlanController::class,'store']);

});
Route::prefix('prime')->group(function(){
    Route::get("/index",[PrimeController::class,'index']);
    Route::get("/show/{uuid}",[PrimeController::class,'show']);
    Route::post("/store",[PrimeController::class,'store']);
    Route::post("/edit/{uuid}",[PrimeController::class,'store']);

});
Route::prefix('player')->group(function(){
    Route::get("/index",[PlayerController::class,'index']);
    Route::get("/show/{uuid}",[PlayerController::class,'show']);
    Route::post("/store",[PlayerController::class,'store']);
    Route::post("/edit/{uuid}",[PlayerController::class,'store']);

});
Route::prefix('replacment')->group(function(){
    Route::get("/index",[ReplacmentController::class,'index']);
    Route::get("/show/{uuid}",[ReplacmentController::class,'show']);
    Route::post("/store",[ReplacmentController::class,'store']);
    Route::post("/edit/{uuid}",[ReplacmentController::class,'store']);

});
Route::prefix('seasone')->group(function(){
    Route::get("/index",[SeasoneController::class,'index']);
    Route::get("/show/{uuid}",[SeasoneController::class,'show']);
    Route::post("/store",[SeasoneController::class,'store']);
    Route::post("/edit/{uuid}",[SeasoneController::class,'store']);

});
Route::prefix('standings')->group(function(){
    Route::get("/index",[StandingsController::class,'index']);
    Route::get("/pe",[StandingsController::class,'PlayersEmployees']);
    Route::get("/show/{uuid}",[StandingsController::class,'show']);
    Route::post("/store",[StandingsController::class,'store']);
    Route::post("/edit/{uuid}",[StandingsController::class,'store']);

});
Route::prefix('sport')->group(function(){
    Route::get("/index",[SportController::class,'index']);
    Route::get("/show",[SportController::class,'show']);
    Route::post("/store",[SportController::class,'store']);
    Route::post("/edit/{uuid}",[SportController::class,'store']);

});
Route::prefix('statistic')->group(function(){
    Route::get("/index",[StatisticController::class,'index']);
    Route::get("/show/{uuid}",[StatisticController::class,'show']);
    Route::post("/store",[StatisticController::class,'store']);
    Route::post("/edit/{uuid}",[StatisticController::class,'store']);

});
Route::prefix('matches')->group(function(){
    Route::get("/index",[MatchesController::class,'index']);
    Route::get("/show/{uuid}",[MatchesController::class,'show']);
    Route::post("/store",[MatchesController::class,'store']);
    Route::post("/edit/{uuid}",[MatchesController::class,'store']);

});
Route::prefix('topfan')->group(function(){
    Route::get("/index",[TopFanController::class,'index']);
    Route::get("/show/{uuid}",[TopFanController::class,'show']);
    Route::post("/store",[TopFanController::class,'store']);
    Route::post("/edit/{uuid}",[TopFanController::class,'store']);

});
Route::prefix('video')->group(function(){
    Route::get("/index",[VideoController::class,'index']);
    Route::get("/show/{uuid}",[VideoController::class,'show']);
    Route::post("/store",[VideoController::class,'store']);
    Route::post("/edit/{uuid}",[VideoController::class,'store']);

});
Route::prefix('user')->group(function(){
    Route::get("/index",[UserController::class,'index']);
    Route::get("/show/{uuid}",[UserController::class,'show']);
    Route::post("/store",[UserController::class,'store']);
    Route::post("/edit/{uuid}",[UserController::class,'store']);

});