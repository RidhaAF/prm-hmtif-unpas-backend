@extends('admin.layouts.base')

@section('content')
<div class="container my-4">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <main class="form-signin">
                <h1 class="mb-3 fw-bold">Admin Register</h1>
                <form action="{{ 'register' }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="name" placeholder="Enter your name" required value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="username"
                            class="form-label @error('username') is-invalid @enderror">Username</label>
                        <input type="text" name="username" class="form-control" id="username"
                            placeholder="Enter your username" required value="{{ old('username') }}">
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label @error('email') is-invalid @enderror">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="email"
                            placeholder="Enter your email address" required value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password"
                            class="form-label @error('password') is-invalid @enderror">Password</label>
                        <input type="password" name="password" required class="form-control" id="password"
                            placeholder="Enter your password" required>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="w-100 btn btn-lg btn-primary fw-bold">Register</button>
                    <small class="d-block text-end mt-3">Already have an account? <a href="/admin/login"
                            class="text-decoration-none">Sign in</a></small>
                </form>
            </main>

        </div>
    </div>
</div>
@endsection