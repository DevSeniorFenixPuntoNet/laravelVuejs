<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class taskController extends Controller
{

    public function index()
    {
        $tasks = Task::orderBy('id', 'DESC')->get();
        return response()->json($tasks);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        Task::create($request->all());
    }

    public function show($id)
    {
        $task = Task::find($id);

        return response()->json($task);
    }


    public function edit($id)
    {
        $task = Task::find($id);

        return response()->json($task);
    }

    public function update(Request $request, $id)
    {
       $task = Task::find($id);
        $task->todo =$request['task'];
        $task->completed = $request['completed'];
        $task->update();
    }


    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
        

        
    }
}
