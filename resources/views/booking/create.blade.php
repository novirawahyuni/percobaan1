@extends('layouts.app')

@section('title', 'Booking Bengkel')
@section('content')

<div class="container mt-5 max-w-3xl mx-auto">
    <div class="card shadow-xl rounded-2xl">
        <div class="card-header bg-primary text-white text-center py-4 rounded-t-2xl">
            <h1 class="text-xl font-bold">Booking Layanan Bengkel</h1>
            <p class="mb-0 text-sm">Isi form berikut untuk melakukan booking</p>
        </div>

        <form action="{{ route('booking.store') }}" method="POST" class="p-4 space-y-4">
            @csrf

            {{-- Data Pelanggan --}}
            <div>
                <h5 class="font-semibold text-lg mb-3">Data Pelanggan</h5>
                <div class="mb-3">
                    <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="no_telepon" class="form-label">No Telepon</label>
                    <input type="text" id="no_telepon" name="no_telepon" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="3" class="form-control" required></textarea>
                </div>
            </div>

            {{-- Data Kendaraan --}}
            <div>
                <h5 class="font-semibold text-lg mb-3">Data Kendaraan</h5>
                <div class="mb-3">
                    <label for="kendaraan_id" class="form-label">Pilih Kendaraan*</label>
                    <select id="kendaraan_id" name="kendaraan_id" class="form-select" required>
                        <option value="">Pilih Kendaraan</option>
                        @foreach($kendaraans as $kendaraan)
                            <option value="{{ $kendaraan->id }}">{{ $kendaraan->nama_kendaraan }} ({{ $kendaraan->tahun_kendaraan }})</option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="mb-3 col-md-6">
                        <label for="layanan_id" class="form-label">Jenis Layanan*</label>
                        <select id="layanan_id" name="layanan_id" class="form-select" required>
                            <option value="">Pilih Layanan</option>
                            @foreach($layanans as $layanan)
                                <option
                                    value="{{ $layanan->id }}"
                                    data-estimasi="{{ $layanan->estimasi_layanan }}"
                                    data-deskripsi="{{ $layanan->deskripsi_layanan }}"
                                    data-harga="{{ $layanan->harga_layanan }}">
                                    {{ $layanan->nama_layanan }} (Rp {{ number_format($layanan->harga_layanan, 0, ',', '.') }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="estimasi_layanan" class="form-label">Estimasi Layanan</label>
                        <input type="text" id="estimasi_layanan" name="estimasi_layanan" class="form-control" disabled>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="deskripsi_layanan" class="form-label">Deskripsi Layanan</label>
                    <textarea name="deskripsi_layanan" id="deskripsi_layanan" rows="4" class="form-control" disabled></textarea>
                </div>

                <div class="mb-3">
                    <label for="produk_id" class="form-label">Produk yang Digunakan</label>
                    <select id="produk_id" name="produk_id" class="form-select">
                        <option value="">Pilih Produk</option>
                        @foreach($produks as $produk)
                            <option value="{{ $produk->id }}">{{ $produk->nama_produk }} (Rp {{ number_format($produk->harga_produk, 0, ',', '.') }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="catatan" class="form-label">Catatan</label>
                    <textarea name="catatan" id="catatan" rows="4" class="form-control"></textarea>
                </div>
            </div>

            {{-- Waktu Booking --}}
            <div>
                <h5 class="font-semibold text-lg mb-3">Waktu Booking</h5>
                <div class="mb-3">
                    <label for="tanggal_booking" class="form-label">Tanggal*</label>
                    <input type="date" id="tanggal_booking" name="tanggal_booking" min="{{ date('Y-m-d') }}" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="jam_booking" class="form-label">Jam*</label>
                    <input type="time" id="jam_booking" name="jam_booking" class="form-control" required>
                </div>
            </div>

            {{-- Total Harga --}}
            <div>
                <h5 class="font-semibold text-lg mb-3">Total Harga</h5>
                <input type="text" id="total_harga" name="total_harga" class="form-control" required readonly>
            </div>

            {{-- Syarat dan Ketentuan --}}
            <div class="form-check mb-3">
                <input type="checkbox" id="agree_terms" name="agree_terms" required class="form-check-input">
                <label for="agree_terms" class="form-check-label">Saya menyetujui syarat dan ketentuan yang berlaku</label>
            </div>

            {{-- Tombol Submit --}}
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary px-4 py-2">
                    Booking Sekarang
                </button>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    // Disable past dates in date picker
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('tanggal_booking').setAttribute('min', today);

    // Auto-fill estimasi dan deskripsi layanan
    document.getElementById('layanan_id').addEventListener('change', function () {
        const selected = this.options[this.selectedIndex];
        const estimasi = selected.getAttribute('data-estimasi') || '';
        const deskripsi = selected.getAttribute('data-deskripsi') || '';
        const harga = selected.getAttribute('data-harga') || '';

        document.getElementById('estimasi_layanan').value = estimasi;
        document.getElementById('deskripsi_layanan').value = deskripsi;
        document.getElementById('total_harga').value = harga ? `Rp ${Number(harga).toLocaleString('id-ID')}` : '';
    });
</script>
@endpush

@endsection
