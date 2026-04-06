@extends('layouts.app')

@section('title', 'User Management')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>User Management</h4>

    <a href="{{ url('/admin/users/create') }}" class="btn btn-dark">
        + Tambah User
    </a>
</div>

<div class="card shadow-sm p-3">

    <!-- SEARCH -->
    <form method="GET" class="mb-3">
        <input type="text" name="search" class="form-control" placeholder="Search user...">
    </form>

    <!-- TABLE -->
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th width="120">Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <span class="badge bg-info text-dark">
                        {{ ucfirst($user->role) }}
                    </span>
                </td>
                <td>
                    <a href="{{ url('/admin/users/'.$user->id.'/edit') }}" class="btn btn-sm btn-secondary">
                        <i class="bi bi-pencil"></i>
                    </a>

                    <form action="{{ url('/admin/users/'.$user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">Belum ada user</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- PAGINATION -->
    <div class="d-flex justify-content-between">
        <small>
            Showing {{ $users->firstItem() }} to {{ $users->lastItem() }}
        </small>

        {{ $users->links() }}
    </div>

</div>

@endsection
