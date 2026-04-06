@extends('layouts.app')

@section('content')

<h4>Edit User</h4>

<form action="{{ url('/admin/users/'.$user->id) }}" method="POST">
    @csrf
    @method('PUT')

    <input type="text" name="name" value="{{ $user->name }}" class="form-control mb-2">

    <input type="email" name="email" value="{{ $user->email }}" class="form-control mb-2">

    <select name="role" class="form-control mb-2">
        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>Manager</option>
        <option value="developer" {{ $user->role == 'developer' ? 'selected' : '' }}>Developer</option>
    </select>

    <button class="btn btn-primary">Update</button>
</form>

@endsection
