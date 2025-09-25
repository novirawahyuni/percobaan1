<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->foreignId('produk_id')->constrained('produks');
            $table->foreignId('kendaraan_id')->constrained('kendaraans');
            $table->foreignId('layanan_id')->constrained('layanans');
            $table->string('no_telepon');
            $table->string('tanggal_booking');
            $table->time('jam_booking');
            $table->string('total_harga');
            $table->text('catatan');
            $table->enum('status', ['sedang di proses', 'diterima']);
            $table->enum('status_pengerjaan', ['sedang di proses', 'Telah Selesai']);
            $table->date('tanggal_selesai')->nullabel();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
