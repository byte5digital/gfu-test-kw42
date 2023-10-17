<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ToDoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('todo')->group(function () {
        Route::get('/', [ToDoController::class, 'index'])->name('todo.index');
        Route::get('/create', [ToDoController::class, 'create'])->name('todo.create');
        Route::post('/store', [ToDoController::class, 'store'])->name('todo.store');
        Route::get('/{toDo}/edit', [ToDoController::class, 'edit'])->name('todo.edit');
        Route::patch('/{toDo}/edit', [ToDoController::class, 'update'])->name('todo.update');
        Route::delete('/{toDo}', [ToDoController::class, 'destroy'])->name('todo.delete');
    });

    // Implizite Erstellung von CRUD Routes im Controller
    // Route::resource('todo-test', ToDoController::class);
});

require __DIR__ . '/auth.php';
