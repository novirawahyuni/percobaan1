<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Bengkel Berkat Yakin - Pelayanan Interaktif</title>
  <style>
    :root{--accent:#0b6e4f;--muted:#666;font-family:Inter, system-ui, Arial, sans-serif}
    body{margin:0;padding:24px;color:#111;background:#fff}
    .container{max-width:1000px;margin:0 auto}
    h2{margin:0 0 12px}
    .services-wrap{display:flex;gap:20px;align-items:flex-start}
    .left{width:320px}
    .service-box{background:#f8f9fa;padding:12px;border-radius:8px;border:1px solid #eee}
    .service-title{font-weight:700;margin-bottom:8px}
    .service-list{list-style:none;padding:0;margin:0}
    .service-list li{padding:8px 10px;border-radius:6px;cursor:pointer;margin-bottom:6px}
    .service-list li:hover{background:#eef7f1}
    .service-list li.active{background:var(--accent);color:#fff}
    /* sub-options */
    .subopts{margin-top:10px;padding:10px;background:#fff;border-radius:6px;border:1px dashed #e0e0e0;display:none}
    .subopts strong{display:block;margin-bottom:6px}
    .subopts button{display:block;width:100%;text-align:left;padding:8px;border:0;background:transparent;border-radius:6px;cursor:pointer}
    .subopts button:hover{background:#f2f2f2}
    .subopts button.active{background:#e8f8ee}
    /* right detail */
    .detail{flex:1;background:#fff;padding:16px;border-radius:8px;border:1px solid #eee;display:flex;gap:16px;align-items:flex-start}
    .detail .img{width:220px;height:160px;border-radius:8px;display:flex;align-items:center;justify-content:center;border:1px solid #f0f0f0;background:linear-gradient(180deg,#fff,#f7fdf8)}
    .detail h3{margin:0 0 8px}
    .detail p{margin:0;color:var(--muted)}
    /* responsive */
    @media(max-width:820px){
      .services-wrap{flex-direction:column}
      .left{width:100%}
      .detail{flex-direction:column;align-items:center;text-align:center}
      .detail .img{width:60%;height:160px}
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Pelayanan Kami</h2>
    <div class="services-wrap">
      <!-- kiri: layanan -->
      <div class="left">
        <div class="service-box" role="region" aria-label="Layanan utama">
          <div class="service-title">Layanan Utama</div>
          <ul class="service-list" id="serviceList">
            <li data-service="servis-oli" class="active">Servis Oli Mobil</li>
            <li data-service="servis-filter">Servis Filter Mobil</li>
            <li data-service="perawatan-komponen">Perawatan Komponen</li>
          </ul>

          <!-- sub-options -->
          <div class="subopts" id="subopts" aria-live="polite"></div>
        </div>
      </div>

      <!-- kanan: detail gambar + deskripsi -->
      <div class="detail" id="detailArea" role="region" aria-label="Detail produk">
        <div class="img" id="detailImage"></div>
        <div class="info">
          <h3 id="detailTitle"></h3>
          <p id="detailDesc"></p>
          <p id="detailExtra" style="margin-top:10px;color:var(--muted)"></p>
        </div>
      </div>
    </div>
  </div>

  <script>
    // Data detail tiap sub-item
    const data = {
      // Servis Oli
      "oli-mesin": {
        group: "servis-oli",
        title: "Oli Mesin - Full Synthetic 10W-40",
        desc: "Oli mesin berkualitas untuk menjaga pelumasan optimal, mengurangi gesekan, dan memperpanjang usia mesin.",
        extra: "Estimasi waktu: 30 - 45 menit | Estimasi biaya: Rp 150.000 - Rp 300.000",
        imgHTML: `<div style="color:#0b6e4f;font-size:12px">[Gambar Oli Mesin]</div>`
      },
      "oli-gardan": {
        group: "servis-oli",
        title: "Oli Gardan - Heavy Duty 80W-90",
        desc: "Oli gardan untuk girbox & gardan, menahan tekanan dan beban putaran.",
        extra: "Estimasi waktu: 40 - 60 menit | Estimasi biaya: Rp 200.000 - Rp 350.000",
        imgHTML: `<div style="color:#0b6e4f;font-size:12px">[Gambar Oli Gardan]</div>`
      },
      "oli-persneling": {
        group: "servis-oli",
        title: "Oli Persneling - Transmisi Manual",
        desc: "Oli untuk transmisi manual yang membantu perpindahan gigi halus.",
        extra: "Estimasi waktu: 45 - 70 menit | Estimasi biaya: Rp 220.000 - Rp 380.000",
        imgHTML: `<div style="color:#0b6e4f;font-size:12px">[Gambar Oli Persneling]</div>`
      },

      // Servis Filter
      "filter-oli": {
        group: "servis-filter",
        title: "Filter Oli",
        desc: "Penggantian filter oli untuk menjaga kebersihan oli mesin.",
        extra: "Estimasi waktu: 20 - 35 menit | Estimasi biaya: Rp 100.000 - Rp 200.000",
        imgHTML: `<div style="color:#0b6e4f;font-size:12px">[Gambar Filter Oli]</div>`
      },
      "filter-udara": {
        group: "servis-filter",
        title: "Filter Udara",
        desc: "Perawatan dan penggantian filter udara agar pembakaran tetap efisien.",
        extra: "Estimasi waktu: 20 - 30 menit | Estimasi biaya: Rp 120.000 - Rp 250.000",
        imgHTML: `<div style="color:#0b6e4f;font-size:12px">[Gambar Filter Udara]</div>`
      },
      "filter-solar": {
        group: "servis-filter",
        title: "Filter Solar",
        desc: "Penggantian filter solar untuk memastikan aliran bahan bakar bersih.",
        extra: "Estimasi waktu: 25 - 40 menit | Estimasi biaya: Rp 150.000 - Rp 280.000",
        imgHTML: `<div style="color:#0b6e4f;font-size:12px">[Gambar Filter Solar]</div>`
      },

      // Perawatan Komponen
      "komp-radiator": {
        group: "perawatan-komponen",
        title: "Air Radiator",
        desc: "Pengecekan dan penggantian air radiator untuk menjaga suhu mesin stabil.",
        extra: "Estimasi waktu: 20 - 40 menit | Estimasi biaya: Rp 80.000 - Rp 150.000",
        imgHTML: `<div style="color:#0b6e4f;font-size:12px">[Gambar Radiator]</div>`
      },
      "komp-aki": {
        group: "perawatan-komponen",
        title: "Air Aki",
        desc: "Perawatan air aki agar kelistrikan kendaraan tetap optimal.",
        extra: "Estimasi waktu: 15 - 25 menit | Estimasi biaya: Rp 50.000 - Rp 120.000",
        imgHTML: `<div style="color:#0b6e4f;font-size:12px">[Gambar Aki]</div>`
      },
      "komp-grease": {
        group: "perawatan-komponen",
        title: "Grease / Gomok",
        desc: "Pelumasan komponen bergerak agar tidak cepat aus.",
        extra: "Estimasi waktu: 30 - 50 menit | Estimasi biaya: Rp 100.000 - Rp 200.000",
        imgHTML: `<div style="color:#0b6e4f;font-size:12px">[Gambar Grease]</div>`
      }
    };

    const serviceList = document.getElementById('serviceList');
    const subopts = document.getElementById('subopts');
    const detailTitle = document.getElementById('detailTitle');
    const detailDesc = document.getElementById('detailDesc');
    const detailExtra = document.getElementById('detailExtra');
    const detailImage = document.getElementById('detailImage');

    // Map sub-options tiap layanan
    const serviceOptions = {
      "servis-oli": [
        { key: "oli-mesin", label: "Oli Mesin" },
        { key: "oli-gardan", label: "Oli Gardan" },
        { key: "oli-persneling", label: "Oli Persneling" }
      ],
      "servis-filter": [
        { key: "filter-oli", label: "Filter Oli" },
        { key: "filter-udara", label: "Filter Udara" },
        { key: "filter-solar", label: "Filter Solar" }
      ],
      "perawatan-komponen": [
        { key: "komp-radiator", label: "Air Radiator" },
        { key: "komp-aki", label: "Air Aki" },
        { key: "komp-grease", label: "Grease / Gomok" }
      ]
    };

    // fungsi render sub-options
    function renderSubopts(service){
      subopts.innerHTML = "";
      if(!serviceOptions[service]){subopts.style.display="none";return;}
      subopts.style.display = "block";
      const title = document.createElement("strong");
      title.textContent = "Pilih bagian:";
      subopts.appendChild(title);
      serviceOptions[service].forEach((opt, idx) => {
        const btn = document.createElement("button");
        btn.textContent = opt.label;
        btn.dataset.item = opt.key;
        if(idx===0) btn.classList.add("active");
        btn.addEventListener("click", () => {
          showDetail(opt.key);
          subopts.querySelectorAll("button").forEach(b => b.classList.remove("active"));
          btn.classList.add("active");
        });
        subopts.appendChild(btn);
      });
      // tampilkan detail default pertama
      showDetail(serviceOptions[service][0].key);
    }

    // fungsi update detail
    function showDetail(key){
      const info = data[key];
      if(!info) return;
      detailTitle.textContent = info.title;
      detailDesc.textContent = info.desc;
      detailExtra.textContent = info.extra;
      detailImage.innerHTML = info.imgHTML || '';
    }

    // event klik layanan utama
    serviceList.addEventListener('click', (ev) => {
      const li = ev.target.closest('li');
      if(!li) return;
      const service = li.dataset.service;
      serviceList.querySelectorAll('li').forEach(x => x.classList.toggle('active', x === li));
      renderSubopts(service);
    });

    // inisialisasi default
    renderSubopts("servis-oli");
  </script>
</body>
</html>
