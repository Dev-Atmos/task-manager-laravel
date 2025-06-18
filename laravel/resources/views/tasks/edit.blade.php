@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Edit Task</h1>

        <form action="{{ route('tasks.update', $task) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block">Title:</label>
                <input type="text" name="title" class="w-full border p-2 rounded" value="{{ old('title', $task->title) }}" required>
                @error('title') <div class="text-red-600">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="block">Description:</label>
                <textarea name="description" class="w-full border p-2 rounded">{{ old('description', $task->description) }}</textarea>
            </div>

            <div>
                <label class="block">Status:</label>
                <select name="status" class="w-full border p-2 rounded">
                    @foreach(['Pending', 'In Progress', 'Completed'] as $status)
                        <option value="{{ $status }}" @if($task->status === $status) selected @endif>{{ $status }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block">Due Date:</label>
                <input type="date" name="due_date" class="w-full border p-2 rounded" value="{{ old('due_date', $task->due_date) }}">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Task</button>
        </form>
    </div>
@endsection
