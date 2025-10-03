<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Task::with(['assignedTo', 'createdBy']);

        if ($request->has('search') && !empty($request->search)) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        if ($request->has('priority') && !empty($request->priority)) {
            $query->where('priority', $request->priority);
        }

        $tasks = $query->get();

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
            'deadline_at' => ['required', 'date', 'after_or_equal:today'],
            'location' => ['required', 'string', 'max:255'],
            'priority' => ['required', 'string', 'in:baja,media,alta'],
            'assigned_to' => ['nullable', 'exists:users,id'],
        ]);

        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'deadline_at' => $request->deadline_at,
            'location' => $request->location,
            'priority' => $request->priority,
            'status' => 'pendiente',
            'assigned_to' => $request->assigned_to,
            'created_by' => auth()->id(),
        ]);

        // Lógica para cambiar el estado a "incompleta" si la fecha límite ha pasado al momento de la creación
        if ($task->deadline_at < now()) {
            $task->status = 'incompleta';
            $task->save();
        }

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
            'deadline_at' => ['required', 'date', 'after_or_equal:today'],
            'location' => ['required', 'string', 'max:255'],
            'priority' => ['required', 'string', 'in:baja,media,alta'],
            'status' => ['required', 'string', 'in:pendiente,en progreso,finalizada,cancelada,incompleta'],
            'assigned_to' => ['nullable', 'exists:users,id'],
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'priority' => $request->priority,
            'status' => $request->status,
            'assigned_to' => $request->assigned_to,
            'deadline_at' => $request->deadline_at,
            'location' => $request->location,
        ]);

        // Lógica para cambiar el estado a "incompleta" si la fecha límite ha pasado
        if ($task->deadline_at && $task->deadline_at < now() && $task->status !== 'finalizada' && $task->status !== 'cancelada') {
            $task->status = 'incompleta';
            $task->save();
        }

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
