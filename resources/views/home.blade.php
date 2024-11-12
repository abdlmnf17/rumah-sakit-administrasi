@extends('layouts.app')

@section('content')
@php
$role = auth()->user()->role;
@endphp
    <div class="container mt-5">
        <!-- Header -->
        <div class="d-flex justify-content-between mb-4">
            <div class="col-md-12">
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="row justify-content-center">
                    <!-- Card dengan informasi selamat datang -->
                    <div class="col-md-12 col-lg-8 mb-4">
                        <div class="card shadow-lg border-left-primary py-3">
                            <div class="card-body d-flex align-items-center">
                                <!-- Kolom untuk teks selamat datang -->
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Selamat Datang,
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                                        {{ Auth::user()->username }}
                                        <small class="text-muted">({{ Auth::user()->role }})</small>
                                    </div>
                                </div>
                                <!-- Kolom untuk ikon -->
                                <div class="col-auto">
                                    <i class="fas fa-user-circle fa-3x text-primary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($role === 'admin')

        <!-- Analytics Cards -->
        <div class="row g-3">
            <!-- Kas Analytics -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card shadow-sm border-left-primary py-2">
                    <div class="card-body d-flex align-items-center">
                        <div class="col mr-2">
                            <h5 class="card-title text-primary mb-2">Akun Kas</h5>
                            <p class="h5 font-weight-bold">{{ number_format($akunKas, 2) }}</p>
                            <p class="text-muted">Total Kas</p>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-wallet fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pendapatan Analytics -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card shadow-sm border-left-success py-2">
                    <div class="card-body d-flex align-items-center">
                        <div class="col mr-2">
                            <h5 class="card-title text-success mb-2">Pendapatan</h5>
                            <p class="h5 font-weight-bold">{{ number_format($akunPen, 2) }}</p>
                            <p class="text-muted">Total Pendapatan</p>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-bill-wave fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Persediaan Analytics -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card shadow-sm border-left-warning py-2">
                    <div class="card-body d-flex align-items-center">
                        <div class="col mr-2">
                            <h5 class="card-title text-warning mb-2">Persediaan</h5>
                            <p class="h5 font-weight-bold">{{ number_format($akunPeng, 2) }}</p>
                            <p class="text-muted">Total Persediaan</p>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Obat Analytics -->
            <div class="col-12 col-md-6 col-lg-3">
                <div class="card shadow-sm border-left-danger py-2">
                    <div class="card-body d-flex align-items-center">
                        <div class="col mr-2">
                            <h5 class="card-title text-danger mb-2">Obat</h5>
                            <p class="h5 font-weight-bold">{{ $obat }}</p>
                            <p class="text-muted">Jumlah Obat</p>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-pills fa-2x text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!-- Menu Cards -->
        <div class="row g-3 mt-4">
            <!-- Akun Kas Menu -->
            <div class="col-12 col-md-4">
                <div class="card shadow-sm border-left-primary py-2">
                    <div class="card-body d-flex align-items-center">
                        <div class="col mr-2">
                            <h5 class="card-title text-primary mb-2">Akun Kas</h5>
                            <p class="text-muted">Kelola akun kas untuk transaksi keuangan</p>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-wallet fa-2x text-primary"></i>
                        </div>
                    </div>
                    <!-- Tombol dengan link -->
                    <div class="card-footer">
                        <a href="/akun" class="btn btn-primary w-100 text-decoration-none">Akses Menu</a>
                    </div>
                </div>
            </div>

            <!-- Barang Menu -->
            <div class="col-12 col-md-4">
                <div class="card shadow-sm border-left-info py-2">
                    <div class="card-body d-flex align-items-center">
                        <div class="col mr-2">
                            <h5 class="card-title text-info mb-2">Barang</h5>
                            <p class="text-muted">Kelola barang dan stok barang</p>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-cogs fa-2x text-info"></i>
                        </div>
                    </div>
                    <!-- Tombol dengan link -->
                    <div class="card-footer">
                        <a href="/barang" class="btn btn-info w-100 text-decoration-none">Akses Menu</a>
                    </div>
                </div>
            </div>

            <!-- Pasien Menu -->
            <div class="col-12 col-md-4">
                <div class="card shadow-sm border-left-secondary py-2">
                    <div class="card-body d-flex align-items-center">
                        <div class="col mr-2">
                            <h5 class="card-title text-secondary mb-2">Pasien</h5>
                            <p class="text-muted">Kelola data pasien dan rekam medis</p>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-injured fa-2x text-secondary"></i>
                        </div>
                    </div>
                    <!-- Tombol dengan link -->
                    <div class="card-footer">
                        <a href="/pasien" class="btn btn-secondary w-100 text-decoration-none">Akses Menu</a>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection
