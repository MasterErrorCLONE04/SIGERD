<?php

namespace App\Http\Controllers\Worker;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::where('assigned_to', Auth::id())->with(['assignedTo', 'createdBy'])->get();

        return view('worker.tasks.index', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // No se permite al trabajador crear tareas, solo al administrador.
        abort(403, 'Unauthorized action.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // No se permite al trabajador crear tareas, solo al administrador.
        abort(403, 'Unauthorized action.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::where('assigned_to', Auth::id())->with(['assignedTo', 'createdBy'])->findOrFail($id);
        $statuses = ['pendiente', 'en progreso', 'finalizada', 'cancelada'];

        return view('worker.tasks.show', compact('task', 'statuses'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // No se requiere un método edit separado ya que show manejará la vista de detalle/edición.
        abort(403, 'Unauthorized action.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Task::where('assigned_to', Auth::id())->findOrFail($id);

        $request->validate([
            'status' => ['required', 'string', 'in:pendiente,en progreso,finalizada,cancelada'],
        ]);

        $task->update([
            'status' => $request->status,
        ]);

        return redirect()->route('worker.tasks.index')->with('success', 'Estado de la tarea actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // No se permite al trabajador eliminar tareas, solo al administrador.
        abort(403, 'Unauthorized action.');
    }
}
