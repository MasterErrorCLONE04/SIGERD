<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Incident;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class IncidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incidents = Incident::with('reportedBy')->get();

        return view('admin.incidents.index', compact('incidents'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $incident = Incident::with('reportedBy')->findOrFail($id);
        $workers = User::where('role', 'trabajador')->get();
        $priorities = ['baja', 'media', 'alta'];

        return view('admin.incidents.show', compact('incident', 'workers', 'priorities'));
    }

    /**
     * Convert the incident to a task.
     */
    public function convertToTask(Request $request, Incident $incident)
    {
        $request->validate([
            'assigned_to' => ['required', 'exists:users,id'],
            'priority' => ['required', 'string', 'in:baja,media,alta'],
        ]);

        // Crear la tarea
        Task::create([
            'title' => 'Incidente: '.$incident->title,
            'description' => $incident->description,
            'priority' => $request->priority,
            'status' => 'pendiente',
            'assigned_to' => $request->assigned_to,
            'created_by' => Auth::id(), // El administrador que convierte el incidente
            'incident_id' => $incident->id,
        ]);

        // Actualizar el estado del incidente
        $incident->update([
            'status' => 'resuelto',
        ]);

        return redirect()->route('admin.incidents.index')->with('success', 'Incidente convertido a tarea exitosamente.');
    }
}
