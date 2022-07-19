@extends('admin.layouts.base')
@extends('admin.layouts.sidebar')

@section('content')

<div class="row">
    <div class="col">
        <div class="shadow-sm card">
            <div class="card-body">
                <form action="{{ route('candidate.update', $candidate->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 row">
                        <div class="col-md-2">
                            @if ($candidate->photo)
                            <div class="ratio ratio-1x1">
                                <img src="{{ $candidate->photo }}"
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
                            <div class="mt-3 mb-3 form-group mt-md-0">
                                <label for="photo" class="form-label text-success">Ubah Foto Profil</label>
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
                            class="form-control @error('nrp') is-invalid @enderror" value="{{ $candidate->nrp }}">
                        @error('nrp')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="name" class="form-label text-success">Nama Kandidat</label>
                        <input type="text" name="name" placeholder="Masukkan Nama Kandidat"
                            class="form-control @error('name') is-invalid @enderror" value="{{ $candidate->name }}">
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
                            value="{{ $candidate->class_year }}">
                        @error('class_year')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="vision" class="form-label text-success">Visi</label>
                        <textarea class="form-control @error('vision') is-invalid @enderror" id="vision" name="vision"
                            rows="3" placeholder="Masukkan Visi">{{ $candidate->vision }}</textarea>
                        @error('vision')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3 form-group">
                        <label for="mission" class="form-label text-success">Misi</label>
                        <textarea class="form-control @error('mission') is-invalid @enderror" id="mission"
                            name="mission" rows="3" placeholder="Masukkan Misi">{{ $candidate->mission }}</textarea>
                        @error('mission')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mt-3 float-end">
                        <a class="btn btn-outline-success" href="{{ route('candidate.index') }}" role="button">Batal</a>
                        <button type="submit" class="ml-1 btn btn-success">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection