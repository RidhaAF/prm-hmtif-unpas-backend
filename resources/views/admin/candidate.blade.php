@extends('admin.layouts.base')
@extends('admin.layouts.sidebar')

@section('content')

<a class="btn btn-success" href="#" role="button">
    <i class="bi bi-plus-lg"></i>
    <span>Tambah Kandidat</span>
</a>

<div class="row mt-4">
    @for ($i = 0; $i < 4; $i++) <div class="col-xl-3 col-md-6 col-sm-12">
        <a href="#" class="link-success" data-bs-toggle="modal" data-bs-target="#candidateModal">
            <div class="card">
                <div class="card-content">
                    <img src="https://media.gq.com/photos/5da0bf5eea4a24000984aa88/1:1/w_2105,h_2105,c_limit/Timothee-Chalamet-Grooming-Gods-10-13.jpg"
                        class="img-fluid" alt="Kandidat" width="100%" style="border-radius: 12px 12px 0 0;">
                    <div class="card-body">
                        <p class="card-title fw-bold">Bambang Prakoso</p>
                        <p class="card-text">183040083</p>
                    </div>
                </div>
            </div>
        </a>
</div>
@endfor
</div>

{{-- Modal --}}
<div class="modal fade text-left" id="candidateModal" tabindex="-1" aria-labelledby="candidateModalLabel"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h5 class="modal-title white" id="candidateModalLabel">
                    Success Modal
                </h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                Tart lemon drops macaroon oat cake chocolate toffee
                chocolate
                bar icing. Pudding jelly beans
                carrot cake pastry gummies cheesecake lollipop. I
                love cookie
                lollipop cake I love sweet
                gummi
                bears cupcake dessert.
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

@endsection