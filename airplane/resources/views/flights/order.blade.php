@extends('layout.app')

@section('title', 'Booking Tiket')

@section('content')
<h2 class="text-2xl font-bold mb-6 text-center">Ticket Booking for {{ $flight->flight_code }}</h2>

<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <p class="text-sm text-gray-500 mb-4">{{ $flight->origin }} ➝ {{ $flight->destination }} | Departure: {{ $flight->departure_time }}</p>
    <form action="{{ route('tickets.store') }}" method="POST">
        @csrf
        <input type="hidden" name="flight_id" value="{{ $flight->id }}">

        <div class="mb-4">
            <label class="block mb-1 font-medium">Passenger Name</label>
            <input type="text" name="passanger_name" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium">Passenger Phone</label>
            <input type="text" name="passanger_phone" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium">Seat Number</label>
            <input type="text" name="seat_number" class="w-full border p-2 rounded" required>
        </div>
        <div class="flex justify-between">
            <a href="{{ route('flights.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Book Ticket</button>
        </div>
    </form>
</div>
@endsection
