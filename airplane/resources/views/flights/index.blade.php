@extends('layout.app')

@section('title', 'Daftar Penerbangan')

@section('content')
<h2 class="text-2xl font-bold mb-6">Daftar Penerbangan</h2>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    @foreach($flights as $flight)
    <div class="bg-white shadow-md rounded-xl p-4 border border-gray-200 hover:shadow-lg transition-all">
        <div class="mb-2">
            <p class="text-sm text-gray-500">Kode Penerbangan</p>
            <p class="text-lg font-semibold text-blue-600">{{ $flight->flight_code }}</p>
        </div>
        <div class="mb-1">
            <p class="text-sm text-gray-500">Asal</p>
            <p class="font-medium">{{ $flight->origin }}</p>
        </div>
        <div class="mb-1">
            <p class="text-sm text-gray-500">Tujuan</p>
            <p class="font-medium">{{ $flight->destination }}</p>
        </div>
        <div class="mb-3">
            <p class="text-sm text-gray-500">Waktu Berangkat</p>
            <p class="font-medium">{{ \Carbon\Carbon::parse($flight->departure_time)->format('d M Y, H:i') }}</p>
        </div>
        <div class="flex justify-between gap-2 mt-3">
            <a href="{{ route('flights.order', $flight->id) }}"
               class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded text-sm">
               Pesan Tiket
            </a>
            <a href="{{ route('flights.tickets', $flight->id) }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">
               Lihat Tiket
            </a>
        </div>
    </div>
    @endforeach
</div>
@endsection
