<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use App\Models\Ticket;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index()
    {
        $flights = Flight::all();
        return view('flights.index', compact('flights'));
    }

    public function showBookForm(Flight $flight)
    {
        return view('flights.book', compact('flight'));
    }

    public function showTickets(Flight $flight)
    {
        $tickets = $flight->tickets;
        return view('flights.tickets', compact('flight', 'tickets'));
    }
    public function order(Flight $flight)
    {
        return view('flights.order', compact('flight'));
    }

    public function tickets($id)
    {
        $flight = Flight::findOrFail($id);
        $tickets = Ticket::where('flight_id', $id)->get();

        return view('flights.tickets', compact('flight', 'tickets'));
    }

}
