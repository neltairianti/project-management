@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')

<h4>Dashboard Admin</h4>

<div class="row">
    <div class="col-md-4">
        <div class="card p-3 shadow">
            <h6>Total User</h6>
            <h3>{{ $totalUser }}</h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 shadow">
            <h6>Total Project</h6>
            <h3>{{ $totalProject }}</h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 shadow">
            <h6>Total Task</h6>
            <h3>{{ $totalTask }}</h3>
        </div>
    </div>
</div>

@endsection
