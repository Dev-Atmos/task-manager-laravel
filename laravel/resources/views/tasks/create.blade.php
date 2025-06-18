@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Create Task</h1>

        <form action="{{ route('tasks.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block">Title:</label>
                <input type="text" name="title" class="w-full border p-2 rounded" value="{{ old('title') }}" required>
                @error('title') <div class="text-red-600">{{ $message }}</div> @enderror
            </div>

            <div>
                <label class="block">Description:</label>
                <textarea name="description" class="w-full border p-2 rounded">{{ old('description') }}</textarea>
            </div>

            <div>
                <label class="block">Due Date:</label>
                <input type="date" name="due_date" class="w-full border p-2 rounded" value="{{ old('due_date') }}">
            </div>

            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save Task</button>
        </form>
    </div>
@endsection
