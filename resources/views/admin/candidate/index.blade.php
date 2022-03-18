@extends('admin.layouts.base')
@extends('admin.layouts.sidebar')

@section('content')

@if(session('success'))
<div class="alert alert-success alert-dismissible show fade">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<a class="btn btn-success" href="{{ route('candidate.create') }}">
    <i class="bi bi-plus-lg"></i>
    <span>Tambah Kandidat</span>
</a>

<div class="row mt-3">
    @if ($candidates->count() == 0)
    <h3 class="text-success text-center">Belum ada data kandidat</h3>
    @else
    @foreach ($candidates as $candidate)
    <div class="col-md-3 col-sm-6">
        <a href="{{ route('candidate.show', $candidate->id) }}" class="text-success">
            <div class="card shadow-sm hover-shadow">
                <div class="card-content">
                    @if ($candidate->photo)
                    <div class="ratio ratio-1x1">
                        <img src="{{ $candidate->photo }}" class="img-fluid img-candidate-fit"
                            alt="{{ $candidate->name }}">
                    </div>
                    @else
                    <img src="{{ asset('assets/images/profile-picture-default.png') }}"
                        class="img-fluid img-candidate-rounded-top" alt="{{ $candidate->name }}">
                    @endif
                    <div class="card-body">
                        <p class="fw-bold text-truncate mb-0">{{ $candidate->name }}</p>
                        <p class="text-muted fs-14px mb-0">{{ $candidate->nrp }}</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endforeach
    @endif
</div>

@endsection