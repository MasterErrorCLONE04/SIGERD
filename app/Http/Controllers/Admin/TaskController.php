<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with(['assignedTo', 'createdBy'])->get();

        return view('admin.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $workers = User::where('role', 'trabajador')->get();
        $priorities = ['baja', 'media', 'alta'];

        return view('admin.tasks.create', compact('workers', 'priorities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'priority' => ['required', 'string', 'in:baja,media,alta'],
            'assigned_to' => ['nullable', 'exists:users,id'],
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'status' => 'pendiente',
            'assigned_to' => $request->assigned_to,
            'created_by' => auth()->id(),
        ]);

        return redirect()->route('admin.tasks.index')->with('success', 'Tarea creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        $workers = User::where('role', 'trabajador')->get();
        $priorities = ['baja', 'media', 'alta'];
        $statuses = ['pendiente', 'en progreso', 'finalizada', 'cancelada'];

        return view('admin.tasks.edit', compact('task', 'workers', 'priorities', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::findOrFail($id);

        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'priority' => ['required', 'string', 'in:baja,media,alta'],
            'status' => ['required', 'string', 'in:pendiente,en progreso,finalizada,cancelada'],
            'assigned_to' => ['nullable', 'exists:users,id'],
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'status' => $request->status,
            'assigned_to' => $request->assigned_to,
        ]);

        return redirect()->route('admin.tasks.index')->with('success', 'Tarea actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('admin.tasks.index')->with('success', 'Tarea eliminada exitosamente.');
    }
}
