<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('tasks.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStoreRequest $request)
    {
        $tasks = new Task();
        $tasks->title = $request->title;
        $tasks->status = $request->status;
        $tasks->due_date = $request->due_date;
        $tasks->save();
        return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tasks = Task::findOrFail($id);
        return view('tasks.show', compact('tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tasks = Task::findOrFail($id);
        return view('tasks.edit', compact('tasks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskUpdateRequest $request, string $id)
    {
        $tasks = Task::findOrFail($id);
        $tasks->title = $request->title;
        $tasks->status = $request->status;
        $tasks->due_date = $request->due_date;
        $tasks->update();
        return redirect()->route('tasks.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tasks = Task::findOrFail($id);
        $tasks->delete();
        return redirect()->route('tasks.index');
    }
}
