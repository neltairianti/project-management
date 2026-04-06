@extends('layouts.app')

@section('title', 'Dashboard Developer')

@section('content')

<h4>Dashboard Developer</h4>

<div class="row">

    <div class="col-md-4">
        <div class="card p-3 shadow">
            <h6>Task Project</h6>
            <h3 class="text-primary">{{ $taskProject }}</h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 shadow">
            <h6>Task Progress</h6>
            <h3 class="text-warning">{{ $taskProgress }}</h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 shadow">
            <h6>Task Done</h6>
            <h3 class="text-success">{{ $taskDone }}</h3>
        </div>
    </div>

</div>

@endsection
