@extends('admin.layouts.base')

@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-5">

            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (session()->has('failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('failed') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            <main class="form-signin">
                <h1 class="mb-3 fw-bold">Admin Login</h1>
                <form action="{{ 'login' }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" aria-describedby="email" placeholder="Enter your email address" required
                            value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password"
                            class="form-control @error('password') is-invalid @enderror" id="password"
                            placeholder="Enter your password" required>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    {{-- <div class=" mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="remember-me">
                        <label class="form-check-label" for="remember-me">Remember me</label>
                    </div> --}}
                    <button type="submit" class="w-100 btn btn-lg btn-primary fw-bold">Login</button>
                    <small class="d-block text-end mt-3">Don't have an account? <a href="/admin/register"
                            class="text-decoration-none">Sign up</a></small>
                </form>
            </main>
        </div>
    </div>
</div>
@endsection