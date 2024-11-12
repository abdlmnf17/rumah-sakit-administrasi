@extends('layouts.app')

@section('content')
    @php
        $role = auth()->user()->role;
    @endphp
    <div class="container-fluid py-4">
        <div class="row justify-content-center">
            <div class="col-lg-15">
                <div class="card border-0 shadow-lg rounded-lg">
                    <!-- Card Header with Gradient -->
                    <div class="card-header bg-gradient-primary-to-secondary p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-hospital-users fa-2x text-white me-3"></i>
                                <h4 class="mb-0 text-white fw-bold">DAFTAR PENGAJUAN PASIEN</h4>
                            </div>
                            <a href="{{ route('rawat.create') }}" class="btn btn-light btn-lg">
                                <i class="fas fa-plus-circle me-2"></i>Tambah Data Rawat
                            </a>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <!-- Success Alert -->
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-check-circle fa-lg me-2"></i>
                                    <strong>{{ session('success') }}</strong>
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <!-- Table with modern styling -->
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover align-middle">
                                <thead class="bg-light">
                                    <tr>
                                        <th class="text-center" style="width: 5%">#</th>
                                        <th style="width: 15%">Nama Pasien</th>
                                        <th style="width: 10%">Pengajuan</th>
                                        <th style="width: 10%">No HP</th>
                                        <th style="width: 20%">Alamat</th>
                                        <th style="width: 10%">Tanggal Masuk</th>
                                        <th style="width: 10%">Status</th>
                                        <th style="width: 10%" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($rawatInap as $index => $item)
                                        <tr>
                                            <td class="text-center">{{ $index + 1 }}</td>
                                            <td class="fw-medium">{{ $item->nama_pasien }}</td>
                                            <td>
                                                <span class="badge bg-info text-white">{{ $item->pengajuan }}</span>
                                            </td>
                                            <td>
                                                <i class="fas fa-phone text-primary me-1"></i>
                                                {{ $item->no_hp }}
                                            </td>
                                            <td>
                                                <i class="fas fa-map-marker-alt text-danger me-1"></i>
                                                {{ $item->alamat }}
                                            </td>
                                            <td>
                                                <i class="fas fa-calendar text-info me-1"></i>
                                                {{ \Carbon\Carbon::parse($item->tanggal_masuk)->format('d M Y') }}
                                            </td>
                                            <td>
                                                @if ($item->status)
                                                    @if ($item->status === 'disetujui')
                                                        <span class="badge bg-success text-white">
                                                            <i class="fas fa-check-circle me-1"></i>
                                                            {{ $item->status }}
                                                        </span>
                                                    @elseif($item->status === 'ditolak')
                                                        <span class="badge bg-danger text-white">
                                                            <i class="fas fa-times-circle me-1"></i>
                                                            {{ $item->status }}
                                                        </span>
                                                    @elseif($item->status === 'selesai')
                                                        {{-- Menambahkan status Selesai --}}
                                                        <span class="badge bg-primary text-white">
                                                            <i class="fas fa-check me-1"></i> {{-- Ikon selesai dengan tanda cek --}}
                                                            {{ $item->status }}
                                                        </span>
                                                    @elseif($item->status === 'pending')
                                                        {{-- Menambahkan status Pending jika diperlukan --}}
                                                        <span class="badge bg-warning text-dark">
                                                            <i class="fas fa-clock me-1"></i>
                                                            {{ $item->status }}
                                                        </span>
                                                    @else
                                                        <span class="badge bg-info">
                                                            <i class="fas fa-info-circle me-1"></i>
                                                            {{ $item->status }}
                                                        </span>
                                                    @endif
                                                @else
                                                    <span class="badge bg-secondary">
                                                        <i class="fas fa-question-circle me-1"></i>
                                                        Belum ditentukan
                                                    </span>
                                                @endif


                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-2">
                                            <!-- Detail Button -->
                                            <a href="{{ route('rawat.show', $item->id) }}" class="btn btn-info btn-sm"
                                                data-bs-toggle="tooltip" title="Lihat Detail">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            @if ($role === 'admin')
                                                <!-- Edit Button -->
                                                <a href="{{ route('rawat.edit', $item->id) }}"
                                                    class="btn btn-warning btn-sm" data-bs-toggle="tooltip"
                                                    title="Update Data">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            @endif

                                            <!-- Delete Button -->
                                            <form action="{{ route('rawat.destroy', $item->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    data-bs-toggle="tooltip" title="Hapus Data"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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

        .table> :not(caption)>*>* {
            padding: 1rem 0.75rem;
        }

        .table tbody tr {
            transition: all 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: rgba(0, 0, 0, .03);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.5rem;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .badge {
            padding: 0.5rem 0.75rem;
        }
    </style>

    <!-- Initialize DataTable and Tooltips -->
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Cari Data..."
                },
                "pageLength": 10,
                "ordering": true,
            });

            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
        });
    </script>
@endsection
