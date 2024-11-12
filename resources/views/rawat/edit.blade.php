@extends('layouts.app')

@section('content')
<div class="col-lg-8 mb-10 mx-auto">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h4 class="m-15 font-weight-bold">Edit Status Pengajuan Rawat Inap</h4>
        </div>
        <div class="card-body">
            <!-- Menampilkan pesan kesuksesan jika ada -->
            @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Menampilkan pesan kesalahan jika ada -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulir Edit Status -->
            <form action="{{ route('rawat.update', $rawatInap->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Menandakan request ini adalah update -->

                <div class="form-group">
                    <label for="status">Status Pengajuan</label>
                    <select class="form-control @error('status') is-invalid @enderror" id="status" name="status" required>
                        <option value="belum diverifikasi" {{ old('status', $rawatInap->status) == 'belum diverifikasi' ? 'selected' : '' }}>Belum Diverifikasi</option>

                        <option value="disetujui" {{ old('status', $rawatInap->status) == 'disetujui' ? 'selected' : '' }}>Disetujui</option>


                        <option value="ditolak" {{ old('status', $rawatInap->status) == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                        
                        <option value="selesai" {{ old('status', $rawatInap->status) == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    </select>
                    @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Tombol Submit -->
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-primary">Update Status</button>
                    <a href="{{ route('rawat.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
