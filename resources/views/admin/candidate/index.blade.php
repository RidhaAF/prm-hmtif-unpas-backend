@extends('admin.layouts.base')
@extends('admin.layouts.sidebar')

@section('content')

<a class="btn btn-success" href="{{ route('candidate.create') }}">
    <i class="bi bi-plus-lg"></i>
    <span>Tambah Kandidat</span>
</a>

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible show fade mt-4">
    {{ session()->get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="row mt-3">
    @if ($candidates->count() == 0)
    <h3 class="text-success text-center">Belum ada data kandidat</h3>
    @else
    @foreach ($candidates as $candidate)
    <div class="col-xl-3 col-md-6 col-sm-12">
        <a href="{{ route('candidate.show', $candidate->id) }}" class="link-success">
            <div class="card">
                <div class="card-content">
                    <img src="https://media.gq.com/photos/5da0bf5eea4a24000984aa88/1:1/w_2105,h_2105,c_limit/Timothee-Chalamet-Grooming-Gods-10-13.jpg"
                        class="img-fluid" alt="Kandidat" style="border-radius: 12px 12px 0 0;">
                    <div class="card-body">
                        <p class="card-title fw-bold">{{ Str::limit($candidate->name, 15) }}</p>
                        <p class="card-text">{{ $candidate->nrp }}</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
    @endforeach
    @endif
</div>

{{-- Detail Candidate Modal --}}
<div class="modal fade text-left" id="detailCandidateModal" tabindex="-1" aria-labelledby="detailCandidateModalLabel"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title white" id="detailCandidateModalLabel">
                    Detail Kandidat
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <h5 class="text-success">NRP</h5>
                <p>{{ $candidate->nrp }}</p>
                <h5 class="text-success">Nama</h5>
                <p>{{ $candidate->name }}</p>
                <h5 class="text-success">Program Studi</h5>
                <p>{{ $candidate->major }}</p>
                <h5 class="text-success">Visi</h5>
                <p>{{ $candidate->vision }}</p>
                <h5 class="text-success">Misi</h5>
                <p>{{ $candidate->mission }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>

                <button type="button" class="btn btn-success ml-1" data-bs-dismiss="modal">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Accept</span>
                </button>
            </div>
        </div>
    </div>
</div>
{{-- Detail Candidate End Modal --}}

@endsection