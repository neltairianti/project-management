@extends('layouts.app')

@section('content')

<h4>Tambah Project</h4>

<form action="{{ route('projects.store') }}" method="POST">
    @csrf

    <input type="text" name="name" class="form-control mb-2" placeholder="Nama Project">

    <input type="date" name="deadline" class="form-control mb-2">

    <select name="status" class="form-control mb-2">
        <option value="pending">Pending</option>
        <option value="progress">Progress</option>
        <option value="done">Done</option>
    </select>

    <button class="btn btn-dark">Simpan</button>
</form>

@endsection
