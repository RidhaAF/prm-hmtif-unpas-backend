@extends('admin.layouts.base')
@extends('admin.layouts.sidebar')

@section('content')

<div class="row">
    <div class="col-md-10">
        <form action="{{ route('voter.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="nrp" class="form-label text-success">NRP</label>
                <input type="text" name="nrp" placeholder="Masukkan NRP"
                    class="form-control @error('nrp') is-invalid @enderror" value="{{ old('nrp') }}">
                @error('nrp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="name" class="form-label text-success">Nama Pemilih</label>
                <input type="text" name="name" placeholder="Masukkan Nama Pemilih"
                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="username" class="form-label text-success">Username</label>
                <input type="text" name="username" placeholder="Masukkan Username"
                    class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}">
                @error('username')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="email" class="form-label text-success">Email</label>
                <input type="text" name="email" placeholder="Masukkan Email"
                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="class_year" class="form-label text-success">Tahun Angkatan</label>
                <input type="number" min="2017" max="2022" step="1" name="class_year"
                    placeholder="Masukkan Tahun Angkatan" class="form-control @error('class_year') is-invalid @enderror"
                    value="{{ old('class_year') }}">
                @error('class_year')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="float-end my-3">
                <a class="btn btn-outline-success" href="{{ route('voter.index') }}" role="button">Batal</a>
                <button type="submit" class="btn btn-success ml-1">Tambah</button>
            </div>
        </form>
    </div>
</div>

@endsection