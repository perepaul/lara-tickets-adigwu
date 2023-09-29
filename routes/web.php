<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AgentTicketController;

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

Route::group(['middleware' => ['auth']], function () {

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });
    Route::controller(UserController::class)->group(function () {
        Route::get('/profile', 'show')->name('profile');
        Route::put('/profile', 'update')->name('edit-profile');
    });
    Route::controller(TicketController::class)->group(function () {
        Route::get('/tickets', 'index')->name('tickets');
        Route::get('/ticket-details/{ticketId}', 'show')->name('ticket-details');
    });
    Route::controller(AgentTicketController::class)->group(function () {
        Route::get('/agent/tickets', 'index')->name('agent.tickets');
        Route::get('/agent/ticket-details/{ticketId}', 'show')->name('agent.ticket-details');
    });
});
