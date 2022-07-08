@extends('admin.layouts.base')
@extends('admin.layouts.sidebar')

@section('content')

<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="shadow-sm card">
                        <div class="px-3 card-body py-4-5">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="stats-icon bg-warning">
                                        <i class="bi bi-person-fill fs-6"></i>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <h6 class="font-semibold text-muted fs-14px">Total Kandidat</h6>
                                    <h6 class="mb-0 font-extrabold text-success">{{ $candidates->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="shadow-sm card">
                        <div class="px-3 card-body py-4-5">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="stats-icon bg-info">
                                        <i class="bi bi-people-fill fs-6"></i>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <h6 class="font-semibold text-muted fs-14px">Total Pemilih</h6>
                                    <h6 class="mb-0 font-extrabold text-success">{{ $voters->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="shadow-sm card">
                        <div class="px-3 card-body py-4-5">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="stats-icon bg-success">
                                        <i class="bi bi-person-check-fill fs-6"></i>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <h6 class="font-semibold text-muted fs-14px">Sudah Memilih</h6>
                                    <h6 class="mb-0 font-extrabold text-success">{{ $voted->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="shadow-sm card">
                        <div class="px-3 card-body py-4-5">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="stats-icon bg-danger">
                                        <i class="bi bi-person-x-fill fs-6"></i>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <h6 class="font-semibold text-muted fs-14px">Belum Memilih</h6>
                                    <h6 class="mb-0 font-extrabold text-success">{{ $not_voted->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="shadow-sm card">
                        <div class="card-header">
                            <h4 class="text-success">Grafik Hasil Perhitungan Suara</h4>
                        </div>
                        <div class="card-body">
                            @if ($votes->count() == 0)
                            <p>Belum ada hasil perhitungan.</p>
                            @else
                            {!! $chartResult->container() !!}

                            <script src="{{ $chartResult->cdn() }}"></script>

                            {{ $chartResult->script() }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection