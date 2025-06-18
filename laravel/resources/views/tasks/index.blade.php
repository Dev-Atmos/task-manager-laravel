@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">My Tasks</h1>

        <a href="{{ route('tasks.create') }}" class="bg-blue-500 text-white px-3 py-2 rounded mb-4 inline-block">+ Add Task</a>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 px-3 py-2 rounded mb-3">{{ session('success') }}</div>
        @endif

        @if($tasks->count())
            <table class="w-full border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="border p-2">Title</th>
                        <th class="border p-2">Status</th>
                        <th class="border p-2">Due Date</th>
                        <th class="border p-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tasks as $task)
                        <tr>
                            <td class="border p-2">{{ $task->title }}</td>
                            <td class="border p-2">{{ $task->status }}</td>
                            <td class="border p-2">{{ $task->due_date }}</td>
                            <td class="border p-2">
                                <a href="{{ route('tasks.edit', $task) }}" class="text-blue-600">Edit</a>

                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 ml-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>No tasks yet. <a href="{{ route('tasks.create') }}" class="text-blue-600 underline">Create one</a>.</p>
        @endif
    </div>
@endsection
