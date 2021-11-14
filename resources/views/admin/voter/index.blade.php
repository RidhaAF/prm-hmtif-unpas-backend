@extends('admin.layouts.base')
@extends('admin.layouts.sidebar')

@section('content')

@if(session()->has('success'))
<div class="alert alert-success alert-dismissible show fade">
    {{ session()->get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<a class="btn btn-success" href="{{ route('voter.create') }}">
    <i class="bi bi-plus-lg"></i>
    <span>Tambah Pemilih</span>
</a>

<div class="page-heading mt-3">
    <section class="section">
        <div class="card">
            <div class="card-body">
                @if ($voters->count() == 0)
                <h3 class="text-success text-center">Belum ada data pemilih</h3>
                @else
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr class="text-success">
                            <th>No.</th>
                            <th>NRP</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Angkatan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($voters as $voter)
                        @if ($voter->roles == 0)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $voter->nrp }}</td>
                            <td>{{ $voter->name }}</td>
                            <td>{{ $voter->email }}</td>
                            <td>{{ $voter->class_year }}</td>
                            <td>
                                @if ($voter->vote_status == 1)
                                <span class="badge bg-success">Sudah</span>
                                @else
                                <span class="badge bg-danger">Belum</span>
                                @endif
                            </td>
                            <td>
                                <div class="d-flex">
                                    <form action="{{ route('voter.destroy', $voter->id) }}" method="POST" class="m-0">
                                        @csrf
                                        @method('DELETE')
                                        <a class="btn btn-primary btn-sm" href="{{ route('voter.edit', $voter->id) }}"
                                            role="button"><i class="bi bi-pencil-fill"></i>
                                        </a>
                                        <button class="btn btn-danger btn-sm" type="submit"
                                            onclick="return confirm('Yakin ingin menghapus data ini?');">
                                            <i class="bi bi-trash-fill"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>

    </section>
</div>

@endsection