<?php

namespace App\Http\Controllers;

use App\Http\Resources\ToDoResource;
use App\Models\ToDo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class ToDoApiController extends Controller
{
    public function getAllToDos(Request $request): AnonymousResourceCollection
    {
        $allTodos = ToDo::with('user')->get();
        return ToDoResource::collection($allTodos);
    }
}
