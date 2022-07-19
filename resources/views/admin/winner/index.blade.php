@extends('admin.layouts.base')
@extends('admin.layouts.sidebar')

@section('content')

@if ($endTime > now())
<h3 class="text-center text-success">Belum ada pemenang</h3>
@else
<div class="row">
    <div class="mx-auto col-md-8">
        <h4 class="text-center text-success fw-normal">Selamat kepada <b>{{ $candidate->name }}</b> atas terpilihnya
            sebagai
            Ketua
            Umum HMTIF-UNPAS periode 2022/2023.
        </h4>
    </div>
</div>
<div class="mt-1 row">
    <div class="mx-auto col-md-4 col-sm-12">
        <div class="shadow-sm card hover-shadow">
            <div class="card-content">
                @if ($candidate->photo)
                <div class="ratio ratio-1x1">
                    <img src="{{ $candidate->photo }}" class="img-fluid img-candidate-fit" alt="{{ $candidate->name }}">
                </div>
                @else
                <img src="{{ asset('assets/images/profile-picture-default.png') }}"
                    class="img-fluid img-candidate-rounded-top" alt="{{ $candidate->name }}">
                @endif
                <div class="card-body">
                    <p class="mb-0 fw-bold text-success text-truncate">{{ $candidate->name }}</p>
                    <p class="mb-0 text-muted fs-14px">{{ $candidate->nrp }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection