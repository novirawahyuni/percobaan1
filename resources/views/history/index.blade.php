<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>History Layanan - Bengkel Berkat Yakin</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 20px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: #fff;
      box-shadow: 0px 2px 8px rgba(0,0,0,0.1);
      border-radius: 10px;
      overflow: hidden;
    }

    th, td {
      padding: 12px 15px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #007bff;
      color: white;
    }

    tr:hover {
      background-color: #f1f1f1;
    }

    .status-selesai {
      color: green;
      font-weight: bold;
    }

    .status-menunggu {
      color: orange;
      font-weight: bold;
    }

    .status-batal {
      color: red;
      font-weight: bold;
    }

    .aksi button {
      padding: 6px 12px;
      margin: 2px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 14px;
    }

    .detail-btn {
      background-color: #17a2b8;
      color: white;
    }

    .cetak-btn {
      background-color: #28a745;
      color: white;
    }

    .aksi button:hover {
      opacity: 0.8;
    }
  </style>
</head>
<body>

  <h2>📋 History Hasil Layanan</h2>

  <table>
    <thead>
      <tr>
        <th>No. Antrian</th>
        <th>Nama Pelanggan</th>
        <th>Kendaraan</th>
        <th>Layanan</th>
        <th>Produk</th>
        <th>Estimasi Waktu</th>
        <th>Total Biaya</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>A001</td>
        <td>Andi Pratama</td>
        <td>Toyota Avanza</td>
        <td>Ganti Oli Mesin</td>
        <td>Oli Pertamina Fastron 4L</td>
        <td>30 Menit</td>
        <td>Rp 350.000</td>
        <td class="status-selesai">✅ Selesai</td>
        <td class="aksi">
          <button class="detail-btn">Detail</button>
          <button class="cetak-btn">Cetak</button>
        </td>
      </tr>
      <tr>
        <td>A002</td>
        <td>Siti Lestari</td>
        <td>Honda Jazz</td>
        <td>Servis Radiator</td>
        <td>Air Radiator Prestone</td>
        <td>45 Menit</td>
        <td>Rp 250.000</td>
        <td class="status-selesai">✅ Selesai</td>
        <td class="aksi">
          <button class="detail-btn">Detail</button>
          <button class="cetak-btn">Cetak</button>
        </td>
      </tr>
      <tr>
        <td>A003</td>
        <td>Budi Santoso</td>
        <td>Mitsubishi Pajero</td>
        <td>Filter Solar</td>
        <td>Filter Solar Toyota Ori</td>
        <td>60 Menit</td>
        <td>Rp 400.000</td>
        <td class="status-menunggu">⏳ Menunggu</td>
        <td class="aksi">
          <button class="detail-btn">Detail</button>
          <button class="cetak-btn">Cetak</button>
        </td>
      </tr>
      <tr>
        <td>A004</td>
        <td>Rahmat Hidayat</td>
        <td>Daihatsu Xenia</td>
        <td>Servis Aki</td>
        <td>Aki GS Astra</td>
        <td>20 Menit</td>
        <td>Rp 750.000</td>
        <td class="status-batal">❌ Batal</td>
        <td class="aksi">
          <button class="detail-btn">Detail</button>
          <button class="cetak-btn">Cetak</button>
        </td>
      </tr>
    </tbody>
  </table>

</body>
</html>
