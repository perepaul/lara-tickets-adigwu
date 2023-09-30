<?php

use App\Http\Controllers\AgentTicketController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
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
        Route::post('/tickets', 'store')->name('create-tickets');
        Route::get('/ticket-details/{ticketId}', 'show')->name('ticket-details');
    });
    Route::controller(CommentController::class)->group(function () {
        Route::get('/comments', 'index')->name('comments');
        Route::post('/comments/{ticketId}', 'store')->name('create-comments');
    });
    Route::controller(AgentTicketController::class)->group(function () {
        Route::get('/agent/tickets', 'index')->name('agent.tickets');
    });
});
