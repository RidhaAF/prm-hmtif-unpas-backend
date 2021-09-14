@extends('admin.layouts.base')

@section('content')
<h1>Welcome, {{ $name }}</h1>

<form action="/admin/logout" method="post">
    @csrf
    <button type="submit" class="btn btn-danger fw-bold">Logout</button>
</form>
@endsection