<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- Required meta tags --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>404 Not Found - PRM HMTIF-UNPAS</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    {{-- Bootstrap CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    {{-- My CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="bg-white">
    <section class="404">
        <div class="container">
            <div class="d-flex flex-column min-vh-100 justify-content-center align-items-center">
                <img src="{{ asset('assets/images/404.svg') }}" alt="404 Not Found" class="mb-3 img-fluid" width="350">
                <h1 class="display-3 text-success fw-bold">404 Not Found</h1>
                <h5 class="mb-3 text-muted fw-normal">Oops! Halaman tidak ditemukan..</h4>
                    <a class="btn btn-outline-success rounded-pill" href="{{ route('admin.dashboard') }}">Kembali ke
                        Dashboard</a>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>