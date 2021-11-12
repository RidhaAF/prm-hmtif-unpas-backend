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
            <button class="btn btn-danger" type="submit"><i class="bi bi-trash-fill"></i> Hapus</button>
        </form>
    </div>
</div>

<div class="row">
    <div class="col-md-2">
        <img src="https://media.gq.com/photos/5da0bf5eea4a24000984aa88/1:1/w_2105,h_2105,c_limit/Timothee-Chalamet-Grooming-Gods-10-13.jpg"
            class="img-fluid" alt="Kandidat" style="border-radius: 12px;">
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