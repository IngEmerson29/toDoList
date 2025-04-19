<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Support\Facades\Validator;

use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;





class ApiController extends Controller
{
    public function get()
    {

        $task = task::all();

        if ($task->isEmpty()) {
            $data = ['message' => 'No hay tareas'];
            return response()->json($data);
        };

        $data = [
            'tasks' => $task
        ];
        return response()->json($data);
    }

    //get task for id
    public function getId($id)
    {

        $task = task::find($id);

        if (!$task) {
            $data = [
                'message' => 'No hay tarea con ese id'
            ];
            return response()->json($data);
        }

        return response()->json($task);
    }

    //create task
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'title' => 'required',
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en validacion de datos',
                'errors' => $validator->errors()
            ];
            return response()->json($data);
        }

        $lastOrder = task::max('order') ?? 0;
        $task = task::create([
            'title' => $request->title,
            'order' => $lastOrder + 1,
            'status' => 'pending'
        ]);

        $data = [
            'message' => 'Tarea creada con exito',
            'task' => $task
        ];
        return response()->json($data);
    }

    //update task
    public function update(Request $request, $id)
    {

        $task = task::find($id);

        if (!$task) {
            $data = [
                'message' => 'No hay tarea con ese id'
            ];
            return response()->json($data);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'status' => 'in:pending,completed,in progress'
        ]);

        if ($validator->fails()) {
            $data = [
                'message' => 'Error en validacion de datos',
                'errors' => $validator->errors()
            ];
            return response()->json($data);
        }

        $task->title = $request->title;
        $task->status = $request->status;

        $task->save();

        $data = [
            'message' => 'Tarea actualizada',
            'task' => $task
        ];
        return response()->json($data);
    }

    //delete task
    public function delete($id)
    {

        $task = task::find($id);

        if (!$task) {
            $data = [
                'message' => 'No hay tarea con ese id'
            ];
            return response()->json($data);
        }

        $task->delete();

        $tasks = task::orderBy('order')->get();

        foreach ($tasks as $index => $task) {
            $task->order = $index + 1;
            $task->save();
        }

        return response()->json(['message' => 'Tarea eliminada con exito']);
    }
}
