<?php

namespace App\Http\Controllers;

use App\Http\Resources\ToDoResource;
use App\Models\TeamMember;
use App\Models\ToDo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\JsonResponse;
use Validator;

class ToDoApiController extends Controller
{
    public function getAllToDos(Request $request): AnonymousResourceCollection
    {
        $allTodos = ToDo::with('user')->get();
        return ToDoResource::collection($allTodos);
    }

    public function getToDoById(Request $request, ToDo $toDo): ToDoResource
    {
        return new ToDoResource($toDo);
    }

    public function createTodo(Request $request): JsonResponse|ToDoResource
    {
        $validation = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:150'],
            'user_id' => 'exists:App\Models\User,id'
        ]);

        if ($validation->fails()) {
            return new JsonResponse($validation->messages(), 422);
        }

        $shouldITakeUserOrTeamMember = rand(0, 1) == 1;

        if ($shouldITakeUserOrTeamMember) {
            $assignee = TeamMember::first();
        } else {
            $assignee = User::first();
        }


        $createdTodo = new ToDo([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);

        $createdTodo->assignable()->associate($assignee);

        $createdTodo->save();

        return new ToDoResource($createdTodo);
    }

    public function deleteTodo(Request $request, ToDo $toDo): JsonResponse
    {
        $toDo->delete();
        return new JsonResponse(status: 204);
    }

    public function updateTodo(Request $request, ToDo $toDo): JsonResponse|ToDoResource
    {
        $validation = Validator::make($request->all(), [
            'title' => ['required', 'string', 'max:150'],
            'user_id' => 'exists:App\Models\User,id'
        ]);

        if ($validation->fails()) {
            return new JsonResponse($validation->messages(), 422);
        }

        $toDo->update([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);

        $toDo->refresh();

        return new ToDoResource($toDo);
    }
}
