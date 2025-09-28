<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUsers = User::count();
        $activeTasks = Task::whereIn('status', ['pendiente', 'en progreso'])->count();
        $completedTasks = Task::where('status', 'finalizada')->count();

        return view('admin.dashboard', compact('totalUsers', 'activeTasks', 'completedTasks'));
    }
}
