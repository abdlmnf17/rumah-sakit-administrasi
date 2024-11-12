<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts and Icons -->
     <!-- Scripts CSS -->
     <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
     <link rel="preconnect" href="https://fonts.bunny.net">
     <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">

     <link href="/css/sb-admin-2.min.css" rel="stylesheet">

     <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-bg: #2c3e50;
            --sidebar-width: 250px;
            --header-height: 70px;
            --transition-speed: 0.3s;
        }

        body {
            font-family: 'Figtree', sans-serif;
            background: #f8f9fa;
        }

        /* Modern Sidebar Styling */
        #accordionSidebar {
            background: var(--primary-bg);
            width: var(--sidebar-width);
            transition: all var(--transition-speed);
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }

        .sidebar-dark .nav-item .nav-link {
            padding: 15px 20px;
            color: rgba(255,255,255,0.8);
            border-radius: 8px;
            margin: 4px 10px;
            transition: all 0.2s;
        }

        .sidebar-dark .nav-item .nav-link:hover {
            background: rgba(255,255,255,0.1);
            color: #fff;
            transform: translateX(5px);
        }

        .sidebar-dark .nav-item.active .nav-link {
            background: #3498db;
            color: #fff;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.3);
        }

        .sidebar-brand {
            height: var(--header-height);
            background: rgba(0,0,0,0.1);
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        /* Modern Header Styling */
        .topbar {
            height: var(--header-height);
            background: #fff;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .topbar .nav-item .nav-link {
            padding: 0 15px;
            height: var(--header-height);
            display: flex;
            align-items: center;
        }

        /* Card Styling
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: translateY(-5px);
        } */

        /* Modern Dropdown Styling */
        .dropdown-menu {
            border: none;
            box-shadow: 0 5px 25px rgba(0,0,0,0.1);
            border-radius: 8px;
        }

        .dropdown-item {
            padding: 10px 20px;
            transition: all 0.2s;
        }

        .dropdown-item:hover {
            background: #f8f9fa;
            transform: translateX(5px);
        }

        /* Collapse Menu Animation */
        .collapse-inner {
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 4px;
        }

        /* Footer Styling */
        .sticky-footer {
            padding: 20px 0;
            background: #fff;
            box-shadow: 0 -2px 10px rgba(0,0,0,0.05);
        }

        /* Animation Classes */
        .fade-in {
            animation: fadeIn 0.3s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body id="page-top">
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/home">
                <div class="sidebar-brand-icon">
                    <img src="https://www.svgrepo.com/show/500071/hospital.svg" alt="Logo" style="width: 40px; filter: brightness(0) invert(1);">
                </div>
                <div class="sidebar-brand-text mx-3">{{ config('app.perusahaan', 'Laravel') }}</div>
            </a>

            <hr class="sidebar-divider">

            <!-- Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/home">
                    <i class="fas fa-chart-line"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Menu Section -->
            <div class="sidebar-heading text-uppercase opacity-50 px-3 mt-4 mb-1">
                Menu
            </div>

                @php
                    $role = auth()->user()->role;
                @endphp
            <!-- Data Master -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo">
                    <i class="fas fa-database"></i>
                    @if ($role === 'pasien')
                    <span>Data Pengajuan</span>
                    @endif
                    @if ($role === 'admin')
                    <span>Data Master</span>
                    @endif
                    @if ($role === 'dokter')
                    <span>Data Periksa</span>
                    @endif
                </a>
                <div id="collapseTwo" class="collapse" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        @if ($role === 'admin')
                        <h6 class="collapse-header">Data Master</h6>
                            <a class="collapse-item" href="/user">Hak Akses User</a>
                            <a class="collapse-item" href="/akun">Data Akun</a>
                        @endif
                        @if ($role === 'admin')
                            <a class="collapse-item" href="/pasien">Periksa Pasien</a>
                            <a class="collapse-item" href="/rawat">Data Pengajuan Rawat</a>
                            <a class="collapse-item" href="/pemasok">Data Pemasok</a>
                        @endif
                        @if ($role === 'dokter')
                            <a class="collapse-item" href="/periksa-pasien">Pasien</a>
                        @endif
                        <div class="bg-white py-2 collapse-inner rounded">
                            @if ($role === 'pasien')
                            <h6 class="collapse-header">Data Pengajuan</h6>
                                <a class="collapse-item" href="/rawat">Rawat Inap</a>
                                <a class="collapse-item" href="/rawat">Rawat Berjalan</a>
                                <a class="collapse-item" href="/rawat">IGD</a>
                            @endif

                        </div>
                    </div>
                </div>
            </li>

            <li class="nav-item">
                @if ($role === 'admin')
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsetri"
                        aria-expanded="true" aria-controls="collapsetri">
                        <i class="fas fa-archive"></i>

                        <span>Data Stok</span>


                    </a>
                @endif

                <div id="collapsetri" class="collapse" aria-labelledby="headingtri" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        @if ($role === 'admin')
                            <h6 class="collapse-header">Data Stok</h6>

                            <a class="collapse-item" href="/obat">Data Obat</a>

                            <a class="collapse-item" href="/barang">Barang</a>
                        @endif

                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                @if (in_array($role, ['admin', 'pemilik']))
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                        aria-expanded="true" aria-controls="collapseUtilities">


                        <i class="fas fa-file-invoice-dollar"></i>
                        <span>Data Transaksi</span>


                    </a>
                @endif
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Data Transaksi</h6>
                        @if ($role === 'admin')
                            <a class="collapse-item" href="/transaksi_masuk">Kas Masuk</a>
                        @endif
                        @if ($role === 'admin')
                            <a class="collapse-item" href="/transaksi_keluar">Kas Keluar</a>
                        @endif
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->


            <!-- Nav Item - Pages Collapse Menu -->
            {{-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Contoh Menu</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li> --}}

            <!-- Nav Item - Charts -->
            @if (in_array($role, ['admin', 'pemilik']))
                <div class="sidebar-heading">
                    Laporan
                </div>
                <li class="nav-item">
                    <a class="nav-link" href="/jurnal">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Jurnal Umum</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/laporan">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Laporan Keuangan</span></a>
                </li>
            @endif



            <!-- Nav Item - Tables -->
            {{-- <li class="nav-item">
                <a class="nav-link" href="/laporanjurnal">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Laporan Jurnal Umum</span></a>
            </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            {{-- <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> --}}

        </ul>

        </ul>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <div class="d-none d-sm-inline-block ml-md-3">
                        <h1 class="h3 mb-0 text-gray-800">{{ config('app.name', 'Laravel') }}</h1>
                    </div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600">
                                    {{ Auth::user()->username }}
                                </span>
                                <i class="fas fa-user-circle fa-lg"></i>
                            </a>
                            <!-- User Dropdown -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>

                <!-- Page Content -->
                <main class="py-4">
                    @yield('content')
                </main>
            </div>

            <!-- Footer -->
            <footer class="sticky-footer">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; {{ config('app.name', 'Web Kas') }}</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Scroll to Top Button -->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal -->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Pilih "Logout" untuk keluar dari akun ini.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Kembali</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
      <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/chart-area-demo.js"></script>
    <script src="/js/demo/chart-pie-demo.js"></script>
    <script src="/js/index.js"></script>
</body>
</html>
