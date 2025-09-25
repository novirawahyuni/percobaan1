@extends('layouts.app')

@section('title', 'Booking Berhasil')
@section('content')

<div class="max-w-md mx-auto text-center py-12">
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-green-500 text-white px-6 py-4">
            <i class="fas fa-check-circle text-4xl mb-2"></i>
            <h1 class="text-2xl font-bold">Booking Berhasil!</h1>
        </div>

        <div class="p-6">
            <p class="mb-6">Terima kasih telah melakukan booking di Bengkel Online kami. Berikut detail booking Anda:</p>

            <div class="bg-gray-100 rounded-lg p-4 mb-6">
                <h2 class="font-semibold text-lg mb-3">Detail Booking</h2>
                <p class="text-left mb-2"><strong>Kode Booking:</strong> {{ $booking->id }}</p>
                <p class="text-left mb-2"><strong>Produk:</strong> {{ $booking->produk->name }}</p>
                <p class="text-left mb-2"><strong>Kendaraan:</strong> {{ $booking->kendaraan->name }} ({{ $booking->kendaraan->plat_nomor }})</p>
                <p class="text-left mb-2"><strong>Layanan:</strong> {{ $booking->layanan->name }}</p>
                <p class="text-left mb-2"><strong>Tanggal Booking:</strong> {{ $booking->tanggal_booking }}</p>
                <p class="text-left mb-2"><strong>Jam Booking:</strong> {{ $booking->jam_booking }}</p>
                <p class="text-left mb-2"><strong>Total Harga:</strong> Rp {{ number_format($booking->total_harga, 0, ',', '.') }}</p>
                <p class="text-left mb-2"><strong>Status:</strong> {{ $booking->status }}</p>
            </div>

            <a href="{{ route('booking.create') }}" class="btn-primary">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Booking
            </a>
        </div>
    </div>
</div>

@endsection
