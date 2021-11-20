@extends('layouts.auth')

@section('content')

{{-- Log in --}}
<div id="auth">
    <div class="row h-100">
        <div class="col-lg-5 col-12">
            <div id="auth-left">
                <h4 class="text-success mb-3">PRM HMTIF-UNPAS</h4>
                <h1 class="text-success">Masuk</h1>
                <p class="text-gray-600 mb-5">Silakan masuk untuk melanjutkan.</p>
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="email" class="form-label text-success"><i class="bi bi-envelope"></i> Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                            value="{{ old('email') }}" autofocus>
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
                            name="password">
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