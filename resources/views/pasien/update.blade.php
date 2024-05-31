@extends('layouts.app')

@section('content')
<div class="col-lg-10 mb-10 mx-auto">
    <!-- Project Card Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{ route('pasien.index') }}" class="btn btn-primary float-right">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h4 class="m-15 font-weight-bold">EDIT PASIEN</h4>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="nm_pasien">Nama Pasien:</label>
                    <input type="text" class="form-control" id="nm_pasien" name="nm_pasien" value="{{ $pasien->nm_pasien }}" required>
                </div>
                <div class="form-group">
                    <label for="umur">Umur:</label>
                    <input type="text" class="form-control" id="umur" name="umur" value="{{ $pasien->umur }}" required>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $pasien->alamat }}" required>
                </div>
                <div class="form-group">
                    <label for="tensi">Tensi:</label>
                    <input type="text" class="form-control" id="tensi" name="tensi" value="{{ $pasien->tensi }}" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
