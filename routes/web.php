<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'dashboard'], function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/agent-dashboard', 'index')->name('agent.dashboard');
    });
    Route::controller(TicketController::class)->group(function () {
        Route::get('/agent-tickets', 'index')->name('agent.tickets');
        Route::get('/agent-ticket-details', 'show')->name('agent.ticket-details');
    });
});
