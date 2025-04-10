<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\TicketController;

Route::post('/ticket/submit', [TicketController::class, 'store'])->name('tickets.store');


Route::get('/flights', [FlightController::class, 'index'])->name('flights.index');

Route::get('/flights/book/{flight}', [FlightController::class, 'order'])->name('flights.order');

Route::get('/flights/ticket/{flight}', [FlightController::class, 'tickets'])->name('flights.tickets');

Route::get('/flights/ticket/{id}', [FlightController::class, 'tickets'])->name('flights.tickets');

Route::patch('/ticket/board/{ticket}', [TicketController::class, 'board'])->name('tickets.boarding');

Route::delete('/ticket/delete/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');

// Route::post('/ticket/submit', [TicketController::class, 'store'])->name('tickets.store');
// Route::put('/ticket/board/{ticket}', [TicketController::class, 'board']);
// Route::delete('/ticket/delete/{ticket}', [TicketController::class, 'destroy']);


Route::get('/', function () {
    return view('welcome');
});
