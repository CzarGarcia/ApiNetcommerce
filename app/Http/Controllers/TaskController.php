<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $pendingTasks = Task::where('user_id', $request->user_id)->where('is_completed', false)->count();
        if ($pendingTasks >= 5) {
            return response()->json(['error' => 'El usuario tiene el máximo de tareas pendientes.'], 400);
        }

        $task = Task::create($validated);

        return response()->json($task, 201);
    }
}
