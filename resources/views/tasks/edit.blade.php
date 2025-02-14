@extends('layouts.app')

@section('content')
    <h2>Edit Task</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.update', $tasks->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Task Title</label>
            <input type="text" name="title" class="form-control" value="{{ $tasks->title }}" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" class="form-control">
                <option value="pending" {{ $tasks->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="in_progress" {{ $tasks->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ $tasks->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="due_date" class="form-label">Due Date</label>
            <input type="date" name="due_date" class="form-control" value="{{ $tasks->due_date }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update Task</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection