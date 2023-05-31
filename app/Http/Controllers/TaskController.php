<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $statusFilter = $request->query('status');
        $sortBy = $request->query('sort');

        $tasks = Task::when($statusFilter !== null, function ($query) use ($statusFilter) {
            return $query->where('status', $statusFilter);
        })
            ->when($sortBy !== null, function ($query) use ($sortBy) {
                if ($sortBy === 'asc') {
                    return $query->orderBy('due_date', 'asc');
                } elseif ($sortBy === 'desc') {
                    return $query->orderBy('due_date', 'desc');
                }
            })
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required|date',
        ], [
            'title.required' => 'Please enter a title.',
            'description.required' => 'Please enter a description.',
            'due_date.required' => 'Please enter a due date.',
            'due_date.date' => 'Please enter a valid date.',
        ]);

        Task::create($validatedData);

        return redirect()->route('tasks.index')->with('success', "Task '$request->title' created successfully!");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id);

        return view('tasks.show', compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::find($id);

        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'due_date' => 'required|date',
            'status' => 'required'
        ], [
            'title.required' => 'Please enter a title.',
            'description.required' => 'Please enter a description.',
            'due_date.required' => 'Please enter a due date.',
            'due_date.date' => 'Please enter a valid date.',
            'status.required' => 'Please choose a status.'
        ]);

        $task->update($validatedData);

        return redirect()->route('tasks.index')->with('success', "Task '$task->title' updated successfully.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);

        $task->delete();

        return redirect()->route('tasks.index')->with('success', "Task '$task->title' deleted successfully!");
    }
}
