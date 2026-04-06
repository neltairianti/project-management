@extends('layouts.app')

@section('content')

<h1 class="text-2xl font-bold mb-6">Task Management</h1>

<div class="grid grid-cols-3 gap-6">

<div class="bg-white p-4 shadow rounded">
<h3 class="font-bold mb-4">To Do</h3>

<div class="bg-gray-100 p-3 rounded mb-2">
Example Task 1
</div>

</div>


<div class="bg-white p-4 shadow rounded">
<h3 class="font-bold mb-4">In Progress</h3>

<div class="bg-gray-100 p-3 rounded mb-2">
Example Task 2
</div>

</div>


<div class="bg-white p-4 shadow rounded">
<h3 class="font-bold mb-4">Done</h3>

<div class="bg-gray-100 p-3 rounded mb-2">
Example Task 3
</div>

</div>

</div>

@endsection
