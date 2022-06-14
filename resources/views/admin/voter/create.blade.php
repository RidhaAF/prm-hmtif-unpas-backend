@extends('admin.layouts.base')
@extends('admin.layouts.sidebar')

@section('content')

<div class="row">
    <div class="col">
        <div class="shadow-sm card">
            <div class="card-body">
                <form action="{{ route('voter.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 form-group">
                        <label for="nrp" class="form-label text-success">NRP</label>
                        <input type="text" name="nrp" placeholder="Masukkan NRP"
                            class="form-control @error('nrp') is-invalid @enderror" value="{{ old('nrp') }}">
                        @error('nrp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="name" class="form-label text-success">Nama Pemilih</label>
                        <input type="text" name="name" placeholder="Masukkan Nama Pemilih"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="email" class="form-label text-success">Email</label>
                        <input type="text" name="email" placeholder="Masukkan Email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="class_year" class="form-label text-success">Tahun Angkatan</label>
                        <input type="number" min="2015" max="2021" step="1" name="class_year"
                            placeholder="Masukkan Tahun Angkatan"
                            class="form-control @error('class_year') is-invalid @enderror"
                            value="{{ old('class_year') }}">
                        @error('class_year')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mt-3 float-end">
                        <a class="btn btn-outline-success" href="{{ route('voter.index') }}" role="button">Batal</a>
                        <button type="submit" class="ml-1 btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection