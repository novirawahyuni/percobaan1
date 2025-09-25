<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Produk;
use App\Models\Kendaraan;
use App\Models\Layanan;

use Illuminate\Http\Request;

class PublicBookingController extends Controller
{
    public function create()
    {
        $produks = Produk::all(); // Ambil semua produk
        $kendaraans = Kendaraan::all(); // Ambil semua kendaraan
        $layanans = Layanan::all(); // Ambil semua layanan
        return view('booking.create', compact('produks', 'kendaraans', 'layanans'));
    }

    public function store(Request $request)
    {
        // dd($request);
        $validated = $request->validate([
            'nama_lengkap' => 'required',
            'no_telepon'=> 'required',
            'produk_id' => 'required|exists:produks,id',
            'kendaraan_id' => 'required|exists:kendaraans,id',
            'layanan_id' => 'required|exists:layanans,id',
            'tanggal_booking' => 'required|date',
            'jam_booking' => 'required',
            'catatan' => 'nullable|string',
        ]);

        // Hitung total harga berdasarkan layanan yang dipilih
        $layanan = Layanan::find($validated['layanan_id']);
        $total_harga = $layanan->harga_layanan; // Ambil harga dari layanan

        try {
            //code...
            $booking = Booking::create([
            'nama_lengkap' => $validated['nama_lengkap'],
            'produk_id' => $validated['produk_id'],
            'kendaraan_id' => $validated['kendaraan_id'],
            'layanan_id' => $validated['layanan_id'],
            'no_telepon' => $validated['no_telepon'],
            'tanggal_booking' => $validated['tanggal_booking'],
            'jam_booking' => $validated['jam_booking'],
            'total_harga' => $total_harga,
            'catatan' => $validated['catatan'],
            'status' => 'sedang di proses',
            'status_pengerjaan' => 'sedang di proses',
            'tanggal_selesai' => $validated['tanggal_booking'],
        ]);

        return redirect()->back(); // Redirect ke halaman sukses
        } catch (\Throwable $th) {
            //throw $th;

            dd($th);
        }

    }
}

