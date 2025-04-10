@extends('layout.app')

@section('title', 'Ticket Details')

@section('content')
    <div class="max-w-4xl mx-auto bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-semibold mb-2">Ticket Details for {{ $flight->flight_code }}</h2>
        <p class="mb-4 text-gray-600">{{ $flight->origin }} → {{ $flight->destination }} | Departure: <strong>{{ $flight->departure_time }}</strong> | Arrival: <strong>{{ $flight->arrival_time }}</strong></p>

        <div class="mb-4">
            <span class="font-semibold">{{ count($tickets) }} passengers</span> • 
            <span class="font-semibold">{{ $tickets->where('is_boarding', true)->count() }} boardings</span>
        </div>

        <table class="w-full border border-gray-300 text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">No.</th>
                    <th class="border p-2">Passanger Name</th>
                    <th class="border p-2">Passanger Phone</th>
                    <th class="border p-2">Seat Number</th>
                    <th class="border p-2">Boarding</th>
                    <th class="border p-2">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tickets as $index => $ticket)
                    <tr class="text-center">
                        <td class="border p-2">{{ $index + 1 }}</td>
                        <td class="border p-2">{{ $ticket->passanger_name }}</td>
                        <td class="border p-2">{{ $ticket->passanger_phone }}</td>
                        <td class="border p-2">{{ $ticket->seat_number }}</td>
                        <td class="border p-2">
                            @if ($ticket->is_boarding)
                                <span class="text-green-700 font-medium">{{ $ticket->boarding_time }}</span>
                            @else
                                <form action="{{ route('tickets.boarding', $ticket->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded">
                                        Confirm
                                    </button>
                                </form>
                            @endif
                        </td>
                        <td class="border p-2">
                            <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" onsubmit="return confirm('Hapus tiket ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-6">
            <a href="{{ route('flights.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                Back
            </a>
        </div>
    </div>
@endsection
