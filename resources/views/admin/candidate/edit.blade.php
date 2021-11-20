@extends('admin.layouts.base')
@extends('admin.layouts.sidebar')

@section('content')

<div class="row">
    <div class="col-md-10">
        <form action="{{ route('candidate.update', $candidate->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row mb-3">
                <div class="col-md-2">
                    @if ($candidate->photo)
                    <div class="ratio ratio-1x1">
                        <img src="{{ asset('storage/' . $candidate->photo) }}"
                            class="img-fluid profile-picture-preview img-candidate-fit-rounded"
                            alt="{{ $candidate->name }}">
                    </div>
                    @else
                    <div class="ratio ratio-1x1">
                        <img src="{{ asset('assets/images/profile-picture-default.png') }}"
                            class="img-fluid profile-picture-preview img-candidate-fit-rounded"
                            alt="{{ $candidate->name }}">
                    </div>
                    @endif
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
                    class="form-control @error('nrp') is-invalid @enderror" value="{{ $candidate->nrp }}">
                @error('nrp')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="name" class="form-label text-success">Nama Kandidat</label>
                <input type="text" name="name" placeholder="Masukkan Nama Kandidat"
                    class="form-control @error('name') is-invalid @enderror" value="{{ $candidate->name }}">
                @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="vision" class="form-label text-success">Visi</label>
                <textarea class="form-control @error('vision') is-invalid @enderror" id="vision" name="vision" rows="3"
                    placeholder="Masukkan Visi">{{ $candidate->vision }}</textarea>
                @error('vision')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="mission" class="form-label text-success">Misi</label>
                <textarea class="form-control @error('mission') is-invalid @enderror" id="mission" name="mission"
                    rows="3" placeholder="Masukkan Misi">{{ $candidate->mission }}</textarea>
                @error('mission')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="float-end my-3">
                <a class="btn btn-outline-success" href="{{ route('candidate.index') }}" role="button">Batal</a>
                <button type="submit" class="btn btn-success ml-1">Ubah</button>
            </div>
        </form>
    </div>
</div>


@endsection