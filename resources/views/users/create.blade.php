@extends('layouts.app')

@section('content')

<h4>Tambah User</h4>

<form action="{{ url('/admin/users') }}" method="POST">
    @csrf

    <input type="text" name="name" class="form-control mb-2" placeholder="Nama">

    <input type="email" name="email" class="form-control mb-2" placeholder="Email">

    <input type="password" name="password" class="form-control mb-2" placeholder="Password">

    <select name="role" class="form-control mb-2">
        <option value="admin">Admin</option>
        <option value="manager">Manager</option>
        <option value="developer">Developer</option>
    </select>

    <button class="btn btn-dark">Simpan</button>
</form>

@endsection
