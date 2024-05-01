<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        return Task::with('subtasks')->paginate($request->input('per_page') ?? 10);
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'title' => 'required|string|min:3|max:40,title',
            'status' => 'string',
            'description' => 'string',
            'due_date' => 'required|date'
        ]);
        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }
        $task = Task::create([
            'title' => $request->input('title'),
            'status' => $request->input('status'),
            'description' => $request->input('description'),
            'due_date' => $request->input('due_date')
        ]);
        return response()->json([
            'message' => 'task created!',
            'task' => $task
        ], 201);

        // Tarefa::create($request->all());
    }

    public function show( $task)
    {
        //
    }

    public function update(Request $request, Task $task)
    {
        $task->fill($request->all())->update();
    }

    public function destroy(Task $task)
    {
        $task->delete();
    }
}
