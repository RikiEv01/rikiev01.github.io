<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekolahku.id | Sistem Pemilihan Sekolah</title>
    <!-- AOS Animate On Scroll CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #121212;
            color: #f0f0f0;
        }

        .navbar {
            background-color: #000 !important;
        }
        .navbar-brand {
            font-weight: bold;
            color: #00f7ff !important;
        }
        .navbar .nav-link {
            color: #f0f0f0 !important;
            font-weight: 500;
        }
        .navbar .nav-link:hover {
            color: #00f7ff !important;
        }

        .hero {
            background: linear-gradient(120deg, #1f005c, #2a0845);
            color: white;
            padding: 100px 0;
            text-align: center;
        }

        .btn-light {
            background-color: #00f7ff;
            color: #121212;
            font-weight: 600;
            border: none;
        }
        .btn-light:hover {
            background-color: #0ff;
            transform: scale(1.05);
            transition: 0.3s ease;
        }

        .feature {
            padding: 60px 0;
        }
        .card {
            background-color: #1e1e1e;
            color: #f0f0f0;
            border: 1px solid #2a2a2a;
        }
        .card h4 {
            color: #00f7ff;
        }

        /* === Footer === */
        footer {
            background-color: #1e1e1e;
            color: #ffffff;
        }
        footer h5 {
            color: #00f7ff;
        }
        footer a {
            color: #00f7ff;
            text-decoration: none;
        }
        footer .bg-dark {
            background-color: #000 !important;
            color: #ccc;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="{{ url('/') }}">
                <img src="{{ asset('IMG/logo.png') }}" alt="Logo" width="30" height="30" class="me-2">
                Sekolahku.id
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" 
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary px-4 py-2 rounded-pill" href="{{ route('login') }}">🔐 Login Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero">
        <div class="container" data-aos="fade-up">
            <h1 class="display-3 fw-bold">Rekomendasi Sekolah Terbaik</h1>
            <p class="lead mt-3">Gunakan sistem kami untuk menemukan SMA swasta terbaik berdasarkan lokasi dan kebutuhan Anda.</p>
            <a class="btn btn-light btn-lg mt-4 px-5 py-3 rounded-pill fw-semibold" href="{{ route('user.index') }}">
                🎯 Mulai Perhitungan
            </a>
        </div>
    </div>

    <!-- Fitur Section -->
    <div class="container feature text-center" data-aos="zoom-in">
        <h2 class="mb-5 fw-bold">Kenapa Pilih Sekolahku.id?</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h4>📍 Berbasis Lokasi</h4>
                        <p>Gunakan GPS atau klik langsung di peta untuk menyesuaikan dengan tempat tinggal Anda.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h4>🧠 Metode SAW</h4>
                        <p>Dibekali dengan logika pemilihan Simple Additive Weighting untuk hasil yang objektif.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="card-body">
                        <h4>🏫 Data Sekolah Lengkap</h4>
                        <p>Akses informasi akreditasi, biaya, ekskul, fasilitas dan lainnya secara transparan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="py-5 bg-dark text-white">
        <div class="container text-center">
            <h2 class="mb-4 text-info fw-bold">Cara Menggunakan Sekolahku.id</h2>
            <div class="row">
                <div class="col-md-3 mb-4">
                    <div class="p-4 border rounded">
                        <h1>1️⃣</h1>
                        <p>Masukkan nama Anda dan tentukan lokasi tempat tinggal.</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="p-4 border rounded">
                        <h1>2️⃣</h1>
                        <p>Atur bobot kriteria sesuai prioritas Anda (misal: jarak atau biaya).</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="p-4 border rounded">
                        <h1>3️⃣</h1>
                        <p>Sistem akan menghitung dan menampilkan peringkat sekolah terbaik.</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4">
                    <div class="p-4 border rounded">
                        <h1>4️⃣</h1>
                        <p>Download hasilnya atau langsung hubungi sekolah pilihan Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 bg-secondary text-white">
        <div class="container text-center">
            <h2 class="mb-4 fw-bold">Apa Kata Mereka?</h2>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <blockquote class="blockquote">
                        <p>"Sangat membantu! Gak bingung lagi cari sekolah buat anak."</p>
                        <footer class="blockquote-footer text-white-50">Rina, Orang Tua Siswa</footer>
                    </blockquote>
                </div>
                <div class="col-md-4 mb-4">
                    <blockquote class="blockquote">
                        <p>"Desainnya keren, hasilnya akurat. Layak dipakai sekolah manapun."</p>
                        <footer class="blockquote-footer text-white-50">Dimas, Guru BK</footer>
                    </blockquote>
                </div>
                <div class="col-md-4 mb-4">
                    <blockquote class="blockquote">
                        <p>"Lebih efektif daripada browsing satu-satu website sekolah."</p>
                        <footer class="blockquote-footer text-white-50">Yoga, Siswa SMA</footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 bg-dark text-center text-white">
        <div class="container">
            <h2 class="mb-4 text-info">Angka Berbicara</h2>
            <div class="row">
                <div class="col-md-3">
                    <h1 class="display-4 text-info">150+</h1>
                    <p>Sekolah Terdaftar</p>
                </div>
                <div class="col-md-3">
                    <h1 class="display-4 text-info">1000+</h1>
                    <p>Telah dipakai</p>
                </div>
                <div class="col-md-3">
                    <h1 class="display-4 text-info">90%</h1>
                    <p>Tingkat Akurasi</p>
                </div>
                <div class="col-md-3">
                    <h1 class="display-4 text-info">100%</h1>
                    <p>Gratis Digunakan</p>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 bg-light text-dark">
        <div class="container">
            <h2 class="text-center mb-4">Pertanyaan yang Sering Diajukan</h2>
            <div class="accordion" id="faqAccordion">
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                            Apakah sistem ini gratis?
                        </button>
                    </h2>
                    <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Ya! Sistem ini 100% gratis untuk semua pengguna.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                            Apakah data sekolah terus diperbarui?
                        </button>
                    </h2>
                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                        <div class="accordion-body">
                            Ya, admin kami rutin memperbarui data sekolah dan informasi pendukung lainnya.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="py-5 bg-gradient text-white text-center" style="background: linear-gradient(120deg, #00f7ff, #6a11cb);">
        <div class="container">
            <h2 class="fw-bold mb-3">Ingin Berkontribusi?</h2>
            <p>Kami membuka kesempatan untuk kolaborasi dengan sekolah, komunitas pendidikan, dan relawan.</p>
            <a href="mailto:kerjasama@sekolahku.id" class="btn btn-light mt-3 px-4 py-2">Hubungi Kami</a>
        </div>
    </section>

    <section class="py-5 bg-dark text-white">
        <div class="container">
            <h2 class="mb-4 text-info text-center">Artikel Pilihan</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="p-4 bg-secondary rounded">
                        <h5>Cara Menentukan Sekolah yang Tepat</h5>
                        <p>Tips penting untuk orang tua dan siswa dalam memilih sekolah berkualitas.</p>
                        <a href="#" class="text-white-50">Baca Selengkapnya</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-secondary rounded">
                        <h5>Apa Itu Metode SAW?</h5>
                        <p>Penjelasan singkat tentang Simple Additive Weighting dalam pengambilan keputusan.</p>
                        <a href="#" class="text-white-50">Baca Selengkapnya</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 bg-secondary rounded">
                        <h5>Manfaat Ekstrakurikuler di Sekolah</h5>
                        <p>Kenapa ekskul itu penting? Cari tahu manfaatnya di sini.</p>
                        <a href="#" class="text-white-50">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 text-center bg-primary text-white">
        <div class="container">
            <h2 class="mb-3 fw-bold">Siap Temukan Sekolah Terbaik?</h2>
            <p class="mb-4">Ayo coba sistem SAW kami dan temukan sekolah yang paling cocok untuk Anda!</p>
            <a href="{{ route('user.index') }}" class="btn btn-light btn-lg px-4 py-2">🔍 Mulai Sekarang</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="text-center text-lg-start mt-auto" >
        <div class="container py-4">
            <div class="row" >
                <div class="col-md-6 mb-3">
                    <h5 class="text-uppercase fw-bold">Tentang Sistem</h5>
                    <p class="text-muted">Sistem ini membantu orang tua dan siswa memilih sekolah swasta terbaik berdasarkan preferensi dan lokasi.</p>
                </div>
                <div class="col-md-6 mb-3">
                    <h5 class="text-uppercase fw-bold">Kontak</h5>
                    <p class="text-muted">Info: email@sekolahku.id</p>
                </div>
            </div>
        </div>
        <div class="bg-dark text-white text-center py-3">
            &copy; {{ now()->year }} Sekolahku.id. All rights reserved.
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS Script -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
    AOS.init({
        duration: 800,
        once: true
    });
    </script>
</body>
</html>