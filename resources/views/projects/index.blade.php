@extends('layouts.app')

@section('title', 'Project Management')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h4>Project Management</h4>

    <a href="{{ route('developer.projects.create') }}" class="btn btn-dark">
        + Tambah Project
    </a>
</div>

<div class="card shadow-sm p-3">

    <!-- SEARCH -->
    <form method="GET" class="mb-3">
        <input type="text" name="search" class="form-control" placeholder="Search project...">
    </form>

    <!-- TABLE -->
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Nama Project</th>
                <th>Deadline</th>
                <th>Status</th>
                <th width="120">Action</th>
            </tr>
        </thead>

        <tbody>
            @forelse($projects as $project)
            <tr>
                <td>{{ $project->name }}</td>
                <td>{{ $project->deadline }}</td>
                <td>
                    <span class="badge bg-warning text-dark">
                        {{ $project->status }}
                    </span>
                </td>
                <td>
                    <a href="{{ route('developer.projects.edit', $project->id) }}" class="btn btn-sm btn-secondary">
                        <i class="bi bi-pencil"></i>
                    </a>

                    <form action="{{ route('developer.projects.destroy', $project->id) }}" method="POST" style="display:inline;">
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
                <td colspan="4" class="text-center">Belum ada project</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <!-- PAGINATION -->
    <div class="d-flex justify-content-between align-items-center">
        <small>
            Showing {{ $projects->firstItem() }} to {{ $projects->lastItem() }} of {{ $projects->total() }}
        </small>

        {{ $projects->links() }}
    </div>

</div>

@endsection
