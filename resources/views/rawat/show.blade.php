@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card border-0 shadow-lg rounded-lg">
                <!-- Header dengan gradient -->
                <div class="card-header bg-gradient-primary-to-secondary text-white rounded-top p-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-hospital-user fa-2x me-3"></i>
                        <h4 class="mb-0 fw-bold">Detail Pengajuan Rawat Inap</h4>
                    </div>
                </div>

                <div class="card-body p-4">
                    <!-- Alert Messages -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <!-- Patient Details -->
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="detail-item">
                                <label class="text-muted small mb-1">Nama Pasien</label>
                                <h5 class="fw-bold mb-0">{{ $rawatInap->nama_pasien }}</h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-item">
                                <label class="text-muted small mb-1">No HP</label>
                                <h5 class="mb-0">{{ $rawatInap->no_hp }}</h5>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="detail-item">
                                <label class="text-muted small mb-1">Alamat</label>
                                <p class="mb-0">{{ $rawatInap->alamat }}</p>
                            </div>
                        </div>

                        <!-- Medical Information -->
                        <div class="col-12">
                            <div class="card bg-light border-0 rounded-3 p-3 mb-3">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label class="text-muted small mb-1">Pengajuan</label>
                                        <p class="mb-0 fw-medium">{{ $rawatInap->pengajuan }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="text-muted small mb-1">Status</label>
                                        @if($rawatInap->status == 'belum diverifikasi')
                                            <span class="badge bg-warning text-dark">
                                                <i class="fas fa-clock me-1"></i>
                                                {{ $rawatInap->status }}
                                            </span>
                                        @else
                                            <span class="badge bg-success">
                                                <i class="fas fa-check me-1"></i>
                                                {{ $rawatInap->status }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Medical Details -->
                        <div class="col-12">
                            <div class="detail-item">
                                <label class="text-muted small mb-1">Keluhan</label>
                                <p class="mb-3">{{ $rawatInap->keluhan }}</p>

                                <label class="text-muted small mb-1">Alasan</label>
                                <p class="mb-0">{{ $rawatInap->alasan }}</p>
                            </div>
                        </div>

                        <!-- Dates -->
                        <div class="col-md-6">
                            <div class="card border-start border-4 border-primary p-3">
                                <label class="text-muted small mb-1">Tanggal Masuk</label>
                                <p class="mb-0 fw-bold">
                                    <i class="fas fa-calendar-check text-primary me-2"></i>
                                    {{ \Carbon\Carbon::parse($rawatInap->tanggal_masuk)->format('d M Y') }}
                                </p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border-start border-4 border-secondary p-3">
                                <label class="text-muted small mb-1">Tanggal Keluar</label>
                                <p class="mb-0 fw-bold">
                                    <i class="fas fa-calendar-alt text-secondary me-2"></i>
                                    @if($rawatInap->tanggal_keluar)
                                        {{ \Carbon\Carbon::parse($rawatInap->tanggal_keluar)->format('d M Y') }}
                                    @else
                                        <span class="text-muted">Belum keluar</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Back Button -->
                    <div class="text-center mt-4">
                        <a href="{{ route('rawat.index') }}" class="btn btn-lg btn-secondary">
                            <i class="fas fa-arrow-left me-2"></i>
                            Kembali ke Daftar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS -->
<style>
    .bg-gradient-primary-to-secondary {
        background: linear-gradient(45deg, #4e73df, #36b9cc);
    }

    .detail-item {
        padding: 1rem;
        border-radius: 0.5rem;
        background-color: #fff;
    }

    .card {
        transition: all 0.3s ease;
    }

    .card:hover {
        transform: translateY(-2px);
    }
</style>
@endsection
