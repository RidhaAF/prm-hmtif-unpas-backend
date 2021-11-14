@extends('admin.layouts.base')
@extends('admin.layouts.sidebar')

@section('content')

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible show fade">
    {{ session()->get('success') }}
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
    <div class="col-xl-3 col-md-6 col-sm-12">
        <a href="{{ route('candidate.show', $candidate->id) }}" class="link-success">
            <div class="card">
                <div class="card-content">
                    @if ($candidate->profile_photo_path)
                    <div class="ratio ratio-1x1">
                        <img src="{{ asset('storage/' . $candidate->profile_photo_path) }}"
                            class="img-fluid img-candidate-fit" alt="{{ $candidate->name }}">
                    </div>
                    @else
                    <img src="{{ asset('assets/images/profile-picture-default.png') }}"
                        class="img-fluid img-candidate-rounded-top" alt="{{ $candidate->name }}">
                    @endif
                    <div class="card-body">
                        <p class="card-title fw-bold">{{ Str::limit($candidate->name, 13) }}</p>
                        <p class="card-text">{{ $candidate->nrp }}</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endforeach
    @endif
</div>

@endsection