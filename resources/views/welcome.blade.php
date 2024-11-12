<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Rumah Sakit Terbaik') }}</title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.bunny.net/css?family=nunito:400,600,700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #1E90FF;
            --secondary-color: #4dabf7;
            --accent-color: #e3f2fd;
            --text-color: #2d3436;
            --light-gray: #f8f9fa;
        }

        body {
            font-family: 'Nunito', sans-serif;
            color: var(--text-color);
            background-color: #f4f7f6;
        }

        /* Navbar Styling */
        .navbar {
            background-color: white;
            box-shadow: 0 2px 15px rgba(0,0,0,0.1);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color);
        }

        .nav-link {
            color: var(--text-color);
            font-weight: 600;
            margin: 0 1rem;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: var(--primary-color);
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, var(--accent-color) 0%, #ffffff 100%);
            padding: 6rem 0;
            position: relative;
            overflow: hidden;
        }

        .hero-text h1 {
            font-size: 3.5rem;
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 1.5rem;
        }

        .hero-text p {
            font-size: 1.2rem;
            color: #636e72;
            margin-bottom: 2rem;
        }

        /* Services Section */
        .services {
            padding: 5rem 0;
            background-color: var(--light-gray);
        }

        .service-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            transition: transform 0.3s;
            border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        .service-card:hover {
            transform: translateY(-10px);
        }

        .service-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
        }

        /* CTA Section */
        .cta {
            padding: 5rem 0;
            background: white;
        }

        /* Buttons */
        .btn-primary {
            background-color: var(--primary-color);
            border: none;
            padding: 0.8rem 2rem;
            font-weight: 600;
            border-radius: 50px;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(44, 123, 229, 0.3);
        }

        /* Footer */
        .footer {
            background-color: #2d3436;
            color: white;
            padding: 3rem 0;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="https://www.svgrepo.com/show/500071/hospital.svg" alt="Logo" height="40" class="me-2">
                {{ config('app.perusahaan', 'Rumah Sakit Terbaik') }}
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register-user">Daftar</a>
                    </li>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a href="{{ url('/home') }}" class="btn btn-primary ms-3">Dashboard</a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="btn btn-primary ms-3">Masuk</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-text fade-in">
                    <h1>Pelayanan Kesehatan Terbaik untuk Anda</h1>
                    <p>Kami menyediakan layanan IGD, Rawat Jalan, dan Rawat Inap dengan teknologi terkini.</p>
                    <a href="/register-user" class="btn btn-primary">Daftar Sekarang</a>
                </div>
                <div class="col-lg-6 fade-in">
                    <img src="https://cdn.pixabay.com/photo/2021/11/20/03/35/doctor-6810776_1280.png" alt="Hospital Image" class="img-fluid">
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section class="services" id="services">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Layanan Kami</h2>
                <p class="text-muted">Pelayanan terbaik di berbagai bidang untuk kesehatan Anda.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="service-card">
                        <i class="fas fa-hospital-symbol service-icon"></i>
                        <h4>IGD (Instalasi Gawat Darurat)</h4>
                        <p>Pelayanan darurat 24 jam dengan tim medis profesional dan peralatan lengkap.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card">
                        <i class="fas fa-stethoscope service-icon"></i>
                        <h4>Rawat Jalan</h4>
                        <p>Perawatan kesehatan untuk kondisi yang tidak memerlukan rawat inap.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card">
                        <i class="fas fa-bed service-icon"></i>
                        <h4>Rawat Inap</h4>
                        <p>Fasilitas rawat inap dengan kenyamanan terbaik untuk proses pemulihan Anda.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container text-center">
            <h2 class="mb-4">Siap Mendapatkan Pelayanan Terbaik?</h2>
            <p class="mb-4">Daftar sekarang untuk mendapatkan pelayanan terbaik dari rumah sakit kami.</p>
            <a href="/register-user" class="btn btn-primary">Daftar Sekarang</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h5>Rumah Sakit Terbaik</h5>
                    <p>Pelayanan Kesehatan Terpercaya untuk Keluarga Anda</p>
                </div>
                <div class="col-md-6 text-end">
                    <p>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
