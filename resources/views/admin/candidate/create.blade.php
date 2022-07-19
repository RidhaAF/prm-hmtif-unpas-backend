@extends('admin.layouts.base')
@extends('admin.layouts.sidebar')

@section('content')

<div class="row">
    <div class="col">
        <div class="shadow-sm card">
            <div class="card-body">
                <form action="{{ route('candidate.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 row">
                        <div class="col-md-2">
                            <div class="ratio ratio-1x1">
                                <img src="{{ asset('assets/images/profile-picture-default.png') }}"
                                    class="img-fluid profile-picture-preview img-candidate-fit-rounded" alt="Kandidat">
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3 form-group">
                                <label for="photo" class="mt-3 form-label text-success mt-md-0">Unggah Foto
                                    Profil</label>
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
                        <label for="name" class="form-label text-success">Nama Kandidat</label>
                        <input type="text" name="name" placeholder="Masukkan Nama Kandidat"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="class_year" class="form-label text-success">Tahun Angkatan</label>
                        <input type="text" name="class_year" placeholder="Masukkan Tahun Angkatan"
                            class="form-control @error('class_year') is-invalid @enderror"
                            value="{{ old('class_year') }}">
                        @error('class_year')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="vision" class="form-label text-success">Visi</label>
                        <textarea class="form-control  @error('vision') is-invalid @enderror" id="vision" name="vision"
                            rows="3" placeholder="Masukkan Visi">{{ old('vision') }}</textarea>
                        @error('vision')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="mission" class="form-label text-success">Misi</label>
                        <textarea class="form-control @error('mission') is-invalid @enderror" id="mission"
                            name="mission" rows="3" placeholder="Masukkan Misi">{{ old('mission') }}</textarea>
                        @error('mission')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mt-3 float-end">
                        <a class="btn btn-outline-success" href="{{ route('candidate.index') }}" role="button">Batal</a>
                        <button type="submit" class="ml-1 btn btn-success">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection