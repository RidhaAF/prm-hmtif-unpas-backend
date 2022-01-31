@extends('layouts.auth')

@section('content')

{{-- Log in --}}
<div id="auth">
    <div class="row min-vh-100">
        <div class="col-12 col-lg-5">
            <div class="px-3 py-5 p-sm-5" id="auth-left">
                <div class="d-flex justify-content-center gap-2 mb-3">
                    <img src="{{ asset('assets/images/logo/prm-hmtif-unpas.png') }}" alt="PRM HMTIF-UNPAS" width="25"
                        height="25">
                    <h4 class="text-success">PRM HMTIF-UNPAS</h4>
                </div>
                <h1 class="text-success">Masuk</h1>
                <p class="text-muted mb-5">Silakan masuk untuk melanjutkan.</p>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="email" class="form-label text-success"><i class="bi bi-envelope"></i> Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                            placeholder="Masukkan email" value="{{ old('email') }}" autofocus>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label text-success"><i class="bi bi-lock"></i> Kata
                            Sandi</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" placeholder="Masukkan kata sandi">
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button class="btn btn-success btn-block shadow mt-3" type="submit">Masuk</button>
                </form>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">
            </div>
        </div>
    </div>
</div>
{{-- End Log in --}}

@endsection