<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Subtask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubtaskController extends Controller
{
    public function index()
    {

    }
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'titleSubtask' => 'required|string|min:3|max:40,title',
            'statusSubtask' => 'string',
            'id_task'=> 'required|integer|exists:tasks,id'
        ]);
        if ($validation->fails()) {
            return response()->json($validation->errors(), 422);
        }
        $subtask = Subtask::create([
            'titleSubtask' => $request->input('titleSubtask'),
            'statusSubtask' => $request->input('statusSubtask'),
            'id_task' => $request->input('id_task')
        ]);
        return response()->json([
            'message' => 'subtask created!',
            'subtask' => $subtask
        ], 201);
    }

    public function show(Subtask $subtask)
    {
        
    }

    public function update(Request $request, Subtask $subtask)
    {
        $subtask->fill($request->all())->update();
    }

    public function destroy(Subtask $subtask)
    {
        $subtask->delete();
    }
}
