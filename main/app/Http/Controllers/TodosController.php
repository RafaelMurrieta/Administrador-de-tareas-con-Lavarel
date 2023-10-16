<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Todo;

class TodosController extends Controller
{
    /**
     * index para mostrar todos los todos
     * store para guardar un todo
     * update para actualizar un todo
     * destroy para eliminar un todo
     * edit para editar un formulario de edicion
     */
    public function store(Request $request){
        $request->validate([ 
            'title' =>'required|min:3'
        ]);
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->category_id = $request->category_id;
        $todo->save();

        return redirect()->route('todos')->with('success','Tarea creada correctamente');
    } 

    public function index(){
        $todos = Todo::all();
        $categories = Category::all();

        return view('Tareas.index',['todos' => $todos, 'categories'=>$categories]);
    }

    public function show($id){
        $todo = Todo::find($id);
        return view('Tareas.show',['todo' => $todo]);
    }
    public function update(Request  $request, $id){
        $todo = Todo::find($id);
        $todo->title =  $request->title;
        $todo->save();
        //DD ES COMO UN CONSOLE.LOG
        //dd($request);
        return redirect()->route('todos')->with('success','Tarea actualizada');
    }
    public function destroy($id){
        $todo = Todo::find($id);
        $todo->delete();
        return redirect()->route('todos')->with('success','La tarea ha sido eliminada');
    }
}
