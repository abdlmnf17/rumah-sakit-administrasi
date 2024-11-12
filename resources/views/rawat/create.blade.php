@extends('layouts.app')

@section('content')
    <div class="col-lg-8 mb-10 mx-auto">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h4 class="m-15 font-weight-bold">TAMBAH DATA RAWAT INAP</h4>
            </div>
            <div class="card-body">
                <!-- Menampilkan pesan kesuksesan -->
                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Menampilkan pesan kesalahan -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Formulir Tambah Rawat Inap -->
                <form action="{{ route('rawat.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="pengajuan">Pengajuan</label>
                        <select class="form-control @error('pengajuan') is-invalid @enderror" id="pengajuan"
                            name="pengajuan" required>
                            <option value="Rawat Inap" {{ old('pengajuan') == 'Rawat Inap' ? 'selected' : '' }}>Rawat Inap
                            </option>
                            <option value="Rawat Jalan" {{ old('pengajuan') == 'Rawat Jalan' ? 'selected' : '' }}>Rawat
                                Jalan</option>
                            <option value="IGD" {{ old('pengajuan') == 'IGD' ? 'selected' : '' }}>IGD</option>
                        </select>
                        @error('pengajuan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama_pasien">Nama Pasien</label>
                        <input type="text" class="form-control @error('nama_pasien') is-invalid @enderror"
                            id="nama_pasien" name="nama_pasien" value="{{ old('nama_pasien') }}" required>
                        @error('nama_pasien')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="no_hp">No HP</label>
                        <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                            name="no_hp" value="{{ old('no_hp') }}" required>
                        @error('no_hp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3"
                            required>{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="keluhan">Keluhan</label>
                        <textarea class="form-control @error('keluhan') is-invalid @enderror" id="keluhan" name="keluhan" rows="3"
                            required>{{ old('keluhan') }}</textarea>
                        @error('keluhan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="alasan">Alasan</label>
                        <textarea class="form-control @error('alasan') is-invalid @enderror" id="alasan" name="alasan" rows="3"
                            required>{{ old('alasan') }}</textarea>
                        @error('alasan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tanggal_masuk">Tanggal Masuk</label>
                        <input type="date" class="form-control @error('tanggal_masuk') is-invalid @enderror"
                            id="tanggal_masuk" name="tanggal_masuk" value="{{ old('tanggal_masuk') }}" required>
                        @error('tanggal_masuk')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="tanggal_keluar">Tanggal Keluar (Opsional)</label>
                        <input type="date" class="form-control @error('tanggal_keluar') is-invalid @enderror"
                            id="tanggal_keluar" name="tanggal_keluar" value="{{ old('tanggal_keluar') }}">
                        @error('tanggal_keluar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    {{-- <div class="form-group">
                    <label for="status">Status</label>
                    <input type="text" class="form-control @error('status') is-invalid @enderror" id="status" name="status" value="{{ old('status') }}">
                    @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div> --}}

                    <!-- User ID yang akan disertakan saat menyimpan data -->
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                        <a href="{{ route('rawat.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
