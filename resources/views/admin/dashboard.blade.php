@extends('admin.layouts.base')
@extends('admin.layouts.sidebar')

@section('content')

<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon bg-warning">
                                        <i class="bi bi-person-fill fs-6"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold fs-14px">Total Kandidat</h6>
                                    <h6 class="font-extrabold text-success mb-0">{{ $candidates->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon bg-info">
                                        <i class="bi bi-people-fill fs-6"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold fs-14px">Total Pemilih</h6>
                                    <h6 class="font-extrabold text-success mb-0">{{ $voters->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon bg-success">
                                        <i class="bi bi-person-check-fill fs-6"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold fs-14px">Sudah Memilih</h6>
                                    <h6 class="font-extrabold text-success mb-0">{{ $voted->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon bg-danger">
                                        <i class="bi bi-person-x-fill fs-6"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold fs-14px">Belum Memilih</h6>
                                    <h6 class="font-extrabold text-success mb-0">{{ $not_voted->count() }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-success">Grafik Hasil Perhitungan Suara</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-profile-visit"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @php
                $year = 2019;
                @endphp
                @for ($i = 1; $i < 5; $i++) <div class="col-12 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-success">Angkatan {{ $year }}</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-{{ $i }}"></div>
                        </div>
                    </div>
            </div>
            @php
            $year++;
            @endphp
            @endfor
        </div>
</div>
</section>
</div>

@section('script')
<script src="{{ asset('assets/vendors/apexcharts/apexcharts.js') }}"></script>
<script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
@endsection

@endsection