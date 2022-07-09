@extends('admin.layouts.base')
@extends('admin.layouts.sidebar')

@section('content')

@if(session('success'))
<div class="alert alert-success alert-dismissible show fade">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if($votingTime == null)
<div class="alert alert-warning" role="alert">
    Waktu pemilihan belum diatur.
</div>
@else
<div class="d-flex">
    <p>{{ date('l, d F Y, H:i', strtotime($votingTime->start_time)) }} WIB s/d {{ date('l, d F Y, H:i',
        strtotime($votingTime->end_time)) }} WIB</p>
</div>
@endif

<form action="{{ route('voting-time.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-12 col-sm-6 col-md-5">
            <div class="mb-3">
                <label for="start-time" class="form-label fw-semibold text-success">Waktu Mulai</label>
                <input type="datetime-local" class="form-control @error('start_time') is-invalid @enderror"
                    id="start-time" name="start_time" value="{{ old('start_time') }}">
                @error('start_time')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-5">
            <div class="mb-3">
                <label for="end-time" class="form-label fw-semibold text-success">Waktu Selesai</label>
                <input type="datetime-local" class="form-control @error('end_time') is-invalid @enderror" id="end-time"
                    name="end_time" value="{{ old('end_time') }}">
                @error('end_time')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-2 d-flex align-items-end">
            <div class="mb-3">
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </div>
    </div>
</form>

@endsection