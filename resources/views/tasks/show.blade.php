@extends('layouts.app')

@section('content')
    <h2>Task Details</h2>

    <div class="card">
        <div class="card-body">
            <h4>{{ $task->title }}</h4>
            <p><strong>Status:</strong> {{ ucfirst($task->status) }}</p>
            <p><strong>Due Date:</strong> {{ $task->due_date }}</p>
            <p><strong>Description:</strong> {{ $task->description }}</p>

            <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Back to Tasks</a>
            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
            </form>
        </div>
    </div>
@endsection
