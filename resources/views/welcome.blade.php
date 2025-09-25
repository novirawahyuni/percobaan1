<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Bengkel Berkat Yakin - Home</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
  <style>
    :root{
      --accent:#0b6e4f;
      --muted:#666;
      --card:#f8f9fa;
      --maxw:1100px;
      font-family: "Inter", system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
    }
    *{box-sizing:border-box}
    body{margin:0;color:#111;background:#fff;line-height:1.5}
    .container{max-width:var(--maxw);margin:0 auto;padding:24px}
    header{display:flex;align-items:center;justify-content:space-between;padding:12px 0}
    .logo{font-weight:700;color:var(--accent);font-size:20px}
    nav a{margin-left:18px;text-decoration:none;color:#222;font-weight:500}
    .cta{background:var(--accent);color:#fff;padding:8px 14px;border-radius:8px;text-decoration:none}
    /* Hero */
    .hero{display:flex;gap:32px;align-items:center;padding:28px 0;border-top:1px solid #eee;border-bottom:1px solid #eee;}
    .hero-left{flex:1; position: absolute; z-index: 10; padding: 50px 20px; text-align: center; }
    .hero h1{margin:0;font-size:28px}
    .hero p{margin:10px 0 16px; font-size: 20px;}
    .hero .btn-row{display:flex;gap:12px}
    .btn{padding:10px 16px;border-radius:8px;text-decoration:none;font-weight:600}
    .btn-primary{background:var(--accent);color:#fff}
    .btn-outline{border:1px solid var(--accent);color:var(--accent);background:transparent}
    .hero-right{width: 100%; position: relative;}
    .hero-img img{
      border-radius: 8px;
      width: 100%;
      height: 500px;
      object-fit: cover;
    }
    /* Services */
    .services{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;padding:24px 0}
    .card{background:var(--card);padding:16px;border-radius:10px;min-height:150px; box-shadow: 0 1px 8px #111; transition: transform 0.3s ease, box-shadow 0.3s ease;}
    .card:hover{
      transform: translateY(-10px);
      box-shadow: 0 1px 15px #111;
    }
    .card h3{margin:0 0 8px;font-size:16px}
    .card ul{margin:0;padding-left:18px;color:var(--muted)}
    /* About & Contact */
    .two-col{display:grid;grid-template-columns:1fr 320px;gap:24px;padding:22px 0}
    .about p{margin:8px 0;color:var(--muted)}
    .contact{background:var(--card);padding:16px;border-radius:10px; box-shadow: -1px 0 3px #111;}
    .contact .item{display:flex;gap:10px;align-items:flex-start;margin-bottom:12px;color:#222}
    .contact .muted{color:var(--muted);font-size:14px}


    /* Footer */
    footer{border-top:1px solid #eee;padding:18px 0;color:var(--muted);font-size:14px;text-align:center}
    /* Responsive */
    @media(max-width:900px){
      .hero{flex-direction:column}
      .hero-right{width:100%;max-width:none}
      .services{grid-template-columns:1fr}
      .two-col{grid-template-columns:1fr}
      nav a{display:none}
    }
  </style>
</head>
<body>
  <div class="container">
    <header>
      <div class="logo">Bengkel Berkat Yakin</div>
      <nav>
        <a href="#">Beranda</a>
        <a href="{{ route('pelayanan.index')}}">Pelayanan</a>
        <a href="{{ route('tentangkami.index')}}">Tentang Kami</a>
        <a href="{{route('booking.create')}}" class="cta">Booking Now</a>
      </nav>
    </header>

    <!-- Hero -->
    <section class="hero" aria-labelledby="hero-heading">
      <div class="hero-left">
        <h1 id="hero-heading">Perawatan dan Perbaikan Spesialis Servis Oli & Komponen Mobil</h1>
        <p>Solusi cepat dan terpercaya di Bengkel Berkat Yakin — layanan berkualitas oleh mekanik berpengalaman.</p>
        <div class="btn-row">
          <!-- <a href="#booking" class="btn btn-primary">Booking Sekarang</a>
          <a href="#pelayanan" class="btn btn-outline">Lihat Pelayanan</a> -->
        </div>
      </div>
      <div class="hero-right">
        <div class="hero-img">
          <img src="{{ asset('assets/1756260059161.jpg')}}" alt="Gambar_Bengkel" >
        </div>
      </div>
    </section>
    <!-- Services -->
    <section id="pelayanan" aria-label="Pelayanan Kami" style="padding-top:18px;" >
      <h2  style="margin:0 0 12px; text-align: center;">Pelayanan Kami</h2>
      <div class="services">
        <div class="card">
          <h3>Servis Oli Mobil</h3>
          <ul>
            <li>Ganti Oli Mesin</li>
            <li>Ganti Oli Gardan</li>
            <li>Ganti Oli Persneling</li>
          </ul>
          <div class="muted" style="margin-top:10px;font-size:13px">Estimasi waktu & biaya berbeda sesuai tipe kendaraan.</div>
        </div>

        <div class="card">
          <h3>Servis Filter Mobil</h3>
          <ul>
            <li>Filter Oli</li>
            <li>Filter Udara</li>
            <li>Filter Solar</li>
          </ul>
          <div class="muted" style="margin-top:10px;font-size:13px">Pengecekan berkala & rekomendasi penggantian.</div>
        </div>

        <div class="card">
          <h3>Perawatan Komponen</h3>
          <ul>
            <li>Air Radiator</li>
            <li>Air Aki / Pengisian</li>
            <li>Grease / Pelumasan</li>
          </ul>
          <div class="muted" style="margin-top:10px;font-size:13px">Perbaikan & penggantian komponen ringkas.</div>
        </div>
      </div>
    </section>


    <!-- About & Contact -->
    <section class="two-col" id="tentang" aria-label="Tentang dan Kontak">
      <div class="about">
        <h3>Tentang Kami</h3>
        <p>Selamat datang di Bengkel Berkat Yakin. Solusi terpercaya untuk perawatan dan perbaikan mobil Anda. Kami berkomitmen memberikan layanan berkualitas dengan tenaga mekanik berpengalaman.</p>
        <p>Kami siap membantu perbaikan mesin, servis rutin, dan penggantian oli. Kepuasan pelanggan adalah prioritas kami — kendaraan yang dirawat dengan baik akan memberikan kenyamanan dan keamanan bagi penggunanya.</p>
      </div>

      <aside class="contact" aria-label="Hubungi Kami">
        <h3>Hubungi Kami</h3>
        <div class="item">
          <div style="width:28px;height:28px;display:flex;align-items:center;justify-content:center;border-radius:6px;background:#fff;border:1px solid #e6e6e6">📍</div>
          <div>
            <div style="font-weight:600">Jl. Professor Moh. Yamin AH</div>
            <div class="muted">Bangkinang - Riau</div>
          </div>
        </div>

        <div class="item">
          <div style="width:28px;height:28px;display:flex;align-items:center;justify-content:center;border-radius:6px;background:#fff;border:1px solid #e6e6e6">📞</div>
          <div>
            <div style="font-weight:600">0821 - 7259 - 1419</div>
          </div>
        </div>

        <div class="item">
          <div style="width:28px;height:28px;display:flex;align-items:center;justify-content:center;border-radius:6px;background:#fff;border:1px solid #e6e6e6">⏰</div>
          <div>
            <div style="font-weight:600">Jam Operasional</div>
            <div class="muted">Senin - Rabu: 08.30 - 17.00<br>Kamis - Jumat: Tutup<br>Sabtu - Minggu: 08.30 - 17.00</div>
          </div>
        </div>

        <a href="#booking" class="btn btn-primary" style="display:inline-block;margin-top:8px">Buat Booking</a>
      </aside>
    </section>

    <footer>
      © <span id="year"></span> Bengkel Berkat Yakin — Semua hak cipta.
    </footer>
  </div>

  <script>
    document.getElementById('year').textContent = new Date().getFullYear();
  </script>
</body>
</html>
