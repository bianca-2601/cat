<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Flight;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'flight_id' => 'required|exists:flights,id',
            'passanger_name' => 'required|string|max:255',
            'passanger_phone' => 'required|string|max:14',
            'seat_number' => 'required|string|max:3'
        ]);

        Ticket::create([
            'flight_id' => $validated['flight_id'],
            'passanger_name' => $validated['passanger_name'],
            'passanger_phone' => $validated['passanger_phone'],
            'seat_number' => $validated['seat_number'],
            'is_boarding' => false,
            'boarding_time' => null
        ]);

        return redirect()->back()->with('success', 'Tiket berhasil dipesan!');
    }

    public function board($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->is_boarding = 1;
        $ticket->boarding_time = Carbon::now();
        $ticket->save();

        return redirect()->back()->with('success', 'Penumpang telah boarding.');
    }

    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);

        // Tiket hanya bisa dihapus jika belum boarding
        if ($ticket->is_boarding) {
            return back()->with('error', 'Tiket sudah boarding dan tidak bisa dihapus.');
        }

        $ticket->delete();

        return back()->with('success', 'Tiket berhasil dihapus.');
    }

}

