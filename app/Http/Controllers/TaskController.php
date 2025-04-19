<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TaskController extends Controller
{

    //get tasks
    public function get()
    {

        $task = task::paginate(5);

        if ($task->isEmpty()) {
            $data = ['message' => 'No hay tareas'];
            return response()->json($data);
        };

        return view('pages.tasks', compact('task'));
    }

    //get task for id
    public function getId($id)
    {

        $task = task::findOrFail($id);

        return view('pages.updateTask', compact('task'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
        ]);

        $lastOrder = task::max('order') ?? 0;
        task::create([
            'title' => $request->title,
            'order' => $lastOrder + 1,
            'status' => 'pending'
        ]);

        return redirect('/tasks')->with('message', 'Tarea agregada con exito');
    }

    public function update(Request $request, $id)
    {


        $request->validate([
            'title' => 'required | string',
            'order' => 'required | string',
            'status' => 'required | string'
        ]);

        $tasks = request()->only(['title', 'status', 'order']);
        task::where('id', '=', $id)->update($tasks);
       
        return redirect('/tasks')->with('message', 'Tarea actualizada con exito');
    }


    public function destroy($id)
    {

        task::destroy($id);

        $tasks = task::orderBy('order')->get();
        
        foreach ($tasks as $index => $task) {
            $task->order = $index + 1;
            $task->save();
        }

        return redirect('/tasks')->with('message', 'Tarea eliminada con exito');
    }
}
