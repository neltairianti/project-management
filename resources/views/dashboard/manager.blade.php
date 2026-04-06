@extends('layouts.app')

@section('title', 'Dashboard Manager')

@section('content')

<h4>Dashboard Manager</h4>

<div class="row">
    <div class="col-md-6">
        <div class="card p-3 shadow">
            <h6>Total Project</h6>
            <h3>{{ $totalProject }}</h3>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card p-3 shadow">
            <h6>Total Task</h6>
            <h3>{{ $totalTask }}</h3>
        </div>
    </div>
</div>

@endsection
