<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts CSS -->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet">

    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Figtree', sans-serif;

        }
    </style>

</head>



<body id="page-top">
<br/>
<br/>
<br>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <form method="POST" action="{{ route('store.pasien') }}">
                    @csrf

                    <div class="row mb-3">
                        <label for="role" class="col-md-4 col-form-label text-md-end">Role</label>

                        <div class="col-md-6">
                            <select id="role" name="role" class="form-control" required>
                                <option value="">--Pilih Roles--</option>
                                <option value="pasien">Pasien</option>
                                {{-- <option value="pemilik">Pemilik</option> --}}
                                </select>

                            @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="name" class="col-md-4 col-form-label text-md-end">Nama</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">Alamat Email</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Konfirmasi Password</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Daftar
                            </button>
                        </div>
                    </div>
                </form>

                <br/>

            </div>
        </div>
    </div>
</div>
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


