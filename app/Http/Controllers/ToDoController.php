<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Alle Todos paginiert
        // $allToDos = ToDo::paginate(5);

        // meine Todos Paginiert (basierend auf HasMany Relation)

        $user = Auth::user();

        $allTodos = ToDo::with('user')->paginate(5);

        //$todos = $user->todos()->paginate(5);

        return view('todo.index', ['todos' => $allTodos]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validateWithBag('createTodo', [
            'title' => ['required', 'string', 'max:150'],
            'description' => []
        ]);

        ToDo::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::user()->id
        ]);

        return redirect(route('todo.index'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('todo.create');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ToDo $toDo)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:150'],
            'description' => []
        ]);

        $toDo->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => Auth::user()->id
        ]);

        return redirect(route('todo.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(ToDo $toDo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ToDo $toDo)
    {
        return view('todo.edit', ['todo' => $toDo]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ToDo $toDo)
    {
        $toDo->delete();
        return redirect()->back();

    }
}
