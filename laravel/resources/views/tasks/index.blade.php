@extends('layouts.app')

@section('content')
    <h1 class="text-xl font-bold mb-4">My Tasks</h1>

    <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-2">Add Task</a>

    <ul>
        @foreach($tasks as $task)
            <li>{{ $task->title }} - {{ $task->status }}</li>
        @endforeach
    </ul>
@endsection
