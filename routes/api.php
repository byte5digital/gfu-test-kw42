<?php

use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\ToDoApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::prefix('todo')->group(function () {
        Route::get('/', [ToDoApiController::class, 'getAllToDos'])->name('api.todo.index');
        Route::get('/{toDo}', [ToDoApiController::class, 'getToDoById'])->name('api.todo.index');
        Route::post('/', [ToDoApiController::class, 'createTodo'])->name('api.todo.store');
        Route::delete('/{toDo}', [ToDoApiController::class, 'deleteTodo'])->name('api.todo.delete');
        Route::patch('/{toDo}', [ToDoApiController::class, 'updateTodo'])->name('api.todo.patch');
    });

    Route::prefix('team-member')->group(function () {
        Route::post('/', [TeamMemberController::class, 'store'])->name('api.team-member.store');
    });
});
