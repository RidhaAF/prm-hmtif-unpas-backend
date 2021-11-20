@extends('admin.layouts.base')
@extends('admin.layouts.sidebar')

@section('content')

<div class="row">
    <div class="col-md-10">
        <form action="{{ route('candidate.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <div class="col-md-2">
                    <div class="ratio ratio-1x1">
                        <img src="{{ asset('assets/images/profile-picture-default.png') }}"
                            class="img-fluid profile-picture-preview img-candidate-fit-rounded" alt="Kandidat">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group mb-3">
                        <label for="photo" class="form-label text-success">Unggah Foto Profil</label>
                        <input class="form-control @error('photo') is-invalid @enderror" type="file" id="photo"
                            name="photo">
                        @error('photo')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                </div>
            </div>
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
                <label for="name" class="form-label text-success">Nama Kandidat</label>
                <input type="text" name="name" placeholder="Masukkan Nama Kandidat"
                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="vision" class="form-label text-success">Visi</label>
                <textarea class="form-control  @error('vision') is-invalid @enderror" id="vision" name="vision" rows="3"
                    placeholder="Masukkan Visi">{{ old('vision') }}</textarea>
                @error('vision')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="mission" class="form-label text-success">Misi</label>
                <textarea class="form-control @error('mission') is-invalid @enderror" id="mission" name="mission"
                    rows="3" placeholder="Masukkan Misi">{{ old('mission') }}</textarea>
                @error('mission')
                <div class="invalid-feedback">
                    {{ $message }}
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