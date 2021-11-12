@extends('admin.layouts.base')
@extends('admin.layouts.sidebar')

@section('content')

<div class="row">
    <div class="col-md-10">
        <form action="{{ route('candidate.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-md-2">
                    <img src="https://media.gq.com/photos/5da0bf5eea4a24000984aa88/1:1/w_2105,h_2105,c_limit/Timothee-Chalamet-Grooming-Gods-10-13.jpg"
                        class="img-fluid" alt="Kandidat" style="border-radius: 12px;">
                </div>
                <div class="col">
                    <div class="form-group mb-3">
                        <label for="profile_photo_path" class="form-label text-success">Unggah Foto Profil</label>
                        <input class="form-control" type="file" id="profile_photo_path">
                    </div>
                </div>
            </div>
            <div class="form-group mb-3">
                <label for="nrp" class="form-label text-success">NRP</label>
                <input type="text" name="nrp" placeholder="Masukkan NRP" class="form-control" value="{{ old('nrp') }}">
                @error('nrp')
                <div class="alert alert-danger alert-dismissible show fade mt-2">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="name" class="form-label text-success">Nama Kandidat</label>
                <input type="text" name="name" placeholder="Masukkan Nama Kandidat" class="form-control"
                    value="{{ old('name') }}">
                @error('name')
                <div class="alert alert-danger alert-dismissible show fade mt-2">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="vision" class="form-label text-success">Visi</label>
                <textarea class="form-control" id="vision" name="vision" rows="3"
                    placeholder="Masukkan Visi">{{ old('vision') }}</textarea>
                @error('vision')
                <div class="alert alert-danger alert-dismissible show fade mt-2">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="mission" class="form-label text-success">Misi</label>
                <textarea class="form-control" id="mission" name="mission" rows="3"
                    placeholder="Masukkan Misi">{{ old('mission') }}</textarea>
                @error('mission')
                <div class="alert alert-danger alert-dismissible show fade mt-2">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @enderror
            </div>
            <div class="float-end my-3">
                <a class="btn btn-outline-success" href="{{ route('candidate.index') }}" role="button">Batal</a>
                <button type="submit" class="btn btn-success ml-1">Tambah</button>
            </div>
        </form>
    </div>
</div>


@endsection