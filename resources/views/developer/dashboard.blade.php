@extends('layouts.app')

@section('content')

<h3 class="mb-4">Dashboard Developer</h3>

<div class="row g-4 mb-4">

    <div class="col-md-4">
        <div class="card shadow border-0 h-100">
            <div class="card-body">
                <h6 class="text-muted">Task Project</h6>
                <h2 class="text-primary">0</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow border-0 h-100">
            <div class="card-body">
                <h6 class="text-muted">Task Progress</h6>
                <h2 class="text-warning">0</h2>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow border-0 h-100">
            <div class="card-body">
                <h6 class="text-muted">Task Done</h6>
                <h2 class="text-success">0</h2>
            </div>
        </div>
    </div>

</div>

<div class="row g-4">

    <div class="col-md-8">
        <div class="card shadow border-0">
            <div class="card-body">
                <h5>Task Performance</h5>
                <canvas id="barChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card shadow border-0">
            <div class="card-body">
                <h5>Task Overview</h5>
                <canvas id="donutChart"></canvas>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
new Chart(document.getElementById('barChart'), {
    type: 'bar',
    data: {
        labels: ['Week 1', 'Week 2', 'Week 3'],
        datasets: [{
            label: 'Task',
            data: [5,10,7],
            backgroundColor: '#0d6efd'
        }]
    }
});

new Chart(document.getElementById('donutChart'), {
    type: 'doughnut',
    data: {
        labels: ['To Do', 'Progress', 'Done'],
        datasets: [{
            data: [2,3,5],
            backgroundColor: ['#dc3545', '#ffc107', '#198754']
        }]
    }
});
</script>

@endsection
