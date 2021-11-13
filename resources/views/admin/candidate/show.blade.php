@extends('admin.layouts.base')
@extends('admin.layouts.sidebar')

@section('content')

<div class="row">
    <div class="col">
        <a class="btn btn-outline-success" href="{{ route('candidate.index') }}" role="button">
            <i class="bi bi-arrow-left"></i> Kembali</a>
    </div>
    <div class="col-auto d-flex text-right">
        <form action="{{ route('candidate.destroy', $candidate->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <a class="btn btn-primary" href="/admin/candidate/{{ $candidate->id }}/edit" role="button">
                <i class="bi bi-pencil-fill"></i> Ubah</a>
            <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data ini?');"><i
                    class="bi bi-trash-fill"></i>
                Hapus</button>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        @if ($candidate->profile_photo_path)
        <div class="ratio ratio-1x1">
            <img src="{{ asset('storage/' . $candidate->profile_photo_path) }}"
                class="img-fluid img-candidate-fit-rounded" alt="{{ $candidate->name }}">
        </div>
        @else
        <img src="{{ asset('assets/images/profile-picture-default.png') }}" class="img-fluid img-candidate-rounded"
            alt="{{ $candidate->name }}">
        @endif
    </div>
    <div class="col">
        <h6 class="text-success">NRP</h6>
        <p>{{ $candidate->nrp }}</p>
        <h6 class="text-success">Nama</h6>
        <p>{{ $candidate->name }}</p>
        <h6 class="text-success">Visi</h6>
        <p>{{ $candidate->vision }}</p>
        <h6 class="text-success">Misi</h6>
        <p>{{ $candidate->mission }}</p>
    </div>
</div>

@endsection