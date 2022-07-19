@extends('admin.layouts.base')
@extends('admin.layouts.sidebar')

@section('content')

<div class="shadow-sm card">
    <div class="card-body">
        <div class="row">
            <div class="col">
                <a class="btn btn-outline-success" href="{{ route('candidate.index') }}" role="button">
                    <i class="bi bi-arrow-left"></i> Kembali</a>
            </div>
            <div class="col-auto text-right d-flex">
                <form action="{{ route('candidate.destroy', $candidate->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-primary" href="{{ route('candidate.edit', $candidate->id) }}" role="button">
                        <i class="bi bi-pencil-fill"></i> Ubah
                    </a>
                    <button class="btn btn-danger" type="submit"
                        onclick="return confirm('Yakin ingin menghapus data ini?');"><i
                            class="bi bi-trash-fill"></i>Hapus
                    </button>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2">
                @if ($candidate->photo)
                <div class="ratio ratio-1x1">
                    <img src="{{ $candidate->photo }}" class="img-fluid img-candidate-fit-rounded"
                        alt="{{ $candidate->name }}">
                </div>
                <form action="{{ route('admin.candidate.delete.photo', $candidate->id) }}" method="POST">
                    @csrf
                    <button class="mt-2 btn btn-link btn-sm link-danger text-decoration-none" type="submit"
                        onclick="return confirm('Yakin ingin menghapus foto profil?');">
                        <i class=" bi bi-trash-fill"></i> Hapus Foto Profil
                    </button>
                </form>
                @else
                <img src="{{ asset('assets/images/profile-picture-default.png') }}"
                    class="img-fluid img-candidate-rounded" alt="{{ $candidate->name }}">
                @endif
            </div>
            <div class="col">
                <h6 class="text-success">NRP</h6>
                <p>{{ $candidate->nrp }}</p>
                <h6 class="text-success">Nama</h6>
                <p>{{ $candidate->name }}</p>
                <h6 class="text-success">Tahun Angkatan</h6>
                <p>{{ $candidate->class_year }}</p>
                <h6 class="text-success">Visi</h6>
                <p>{{ $candidate->vision }}</p>
                <h6 class="text-success">Misi</h6>
                <p>{{ $candidate->mission }}</p>
            </div>
        </div>
    </div>
</div>

@endsection