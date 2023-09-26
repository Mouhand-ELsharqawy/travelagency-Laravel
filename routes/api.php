<?php

use App\Http\Controllers\AirLineController;
use App\Http\Controllers\AirPortController;
use App\Http\Controllers\BaggageCheckController;
use App\Http\Controllers\BaggageController;
use App\Http\Controllers\BoardingPassController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\FlightManifestController;
use App\Http\Controllers\NoFlyListController;
use App\Http\Controllers\Passenger1Controller;
use App\Http\Controllers\Passenger2Controller;
use App\Http\Controllers\SecurityCheckController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AirLineController::class)->group(function(){
    Route::get('/airline','index');
    Route::get('/airline/{id}','show');
    Route::post('/airline','store');
    Route::post('/airline/{id}','update');
    Route::delete('/airline/{id}','destroy');
});

Route::controller(AirPortController::class)->group(function(){
    Route::get('/airport','index');
    Route::get('/airport/{id}','show');
    Route::post('/airport','store');
    Route::post('/airport/{id}','update');
    Route::delete('/airport/{id}','destroy');
});

Route::controller(BaggageController::class)->group(function(){
    Route::get('/baggage','index');
    Route::get('/baggage/{id}','show');
    Route::post('/baggage','store');
    Route::post('/baggage/{id}','update');
    Route::delete('/baggage/{id}','destroy');
});
Route::controller(BaggageCheckController::class)->group(function(){
    Route::get('/baggagecheck','index');
    Route::get('/baggagecheck/{id}','show');
    Route::post('/baggagecheck','store');
    Route::post('/baggagecheck/{id}','update');
    Route::delete('/baggagecheck/{id}','destroy');
});
Route::controller(BoardingPassController::class)->group(function(){
    Route::get('/board','index');
    Route::get('/board/{id}','show');
    Route::post('/board','store');
    Route::post('/board/{id}','update');
    Route::delete('/board/{id}','destroy');
});
Route::controller(BookingController::class)->group(function(){
    Route::get('/booking','index');
    Route::get('/booking/{id}','show');
    Route::post('/booking','store');
    Route::post('/booking/{id}','update');
    Route::delete('/booking/{id}','destroy');
});

Route::controller(FlightController::class)->group(function(){
    Route::get('/flight','index');
    Route::get('/flight/{id}','show');
    Route::post('/flight','store');
    Route::post('/flight/{id}','update');
    Route::delete('/flight/{id}','destroy');
});
Route::controller(FlightManifestController::class)->group(function(){
    Route::get('/flightmanifest','index');
    Route::get('/flightmanifest/{id}','show');
    Route::post('/flightmanifest','store');
    Route::post('/flightmanifest/{id}','update');
    Route::delete('/flightmanifest/{id}','destroy');
});

Route::controller(NoFlyListController::class)->group(function(){
    Route::get('/noflylist','index');
    Route::get('/noflylist/{id}','show');
    Route::post('/noflylist','store');
    Route::post('/noflylist/{id}','update');
    Route::delete('/noflylist/{id}','destroy');
});

Route::controller(Passenger1Controller::class)->group(function(){
    Route::get('/passengerone','index');
    Route::get('/passengerone/{id}','show');
    Route::post('/passengerone','store');
    Route::post('/passengerone/{id}','update');
    Route::delete('/passengerone/{id}','destroy');
});

Route::controller(Passenger2Controller::class)->group(function(){
    Route::get('/passengertwo','index');
    Route::get('/passengertwo/{id}','show');
    Route::post('/passengertwo','store');
    Route::post('/passengertwo/{id}','update');
    Route::delete('/passengertwo/{id}','destroy');
});

Route::controller(SecurityCheckController::class)->group(function(){
    Route::get('/security','index');
    Route::get('/security/{id}','show');
    Route::post('/security','store');
    Route::post('/security/{id}','update');
    Route::delete('/security/{id}','destroy');
});
