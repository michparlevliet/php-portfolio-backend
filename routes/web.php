<?php

use App\Models\Project;

use App\Http\Controllers\ConsoleController;
use App\Http\Controllers\ProjectsController;
use App\Http\Controllers\TypesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EntriesController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes    
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        'projects' => Project::all(),
    ]);
});

Route::get('/project/{project:slug}', function (Project $project) {
    return view('project', [
        'project' => $project,
    ]);
})->where('project', '[A-z\-]+');

Route::get('/console/logout', [ConsoleController::class, 'logout'])->middleware('auth');
Route::get('/console/login', [ConsoleController::class, 'loginForm'])->middleware('guest');
Route::post('/console/login', [ConsoleController::class, 'login'])->middleware('guest');
Route::get('/console/dashboard', [ConsoleController::class, 'dashboard'])->middleware('auth');

Route::get('/console/projects/list', [ProjectsController::class, 'list'])->middleware('auth');
Route::get('/console/projects/add', [ProjectsController::class, 'addForm'])->middleware('auth');
Route::post('/console/projects/add', [ProjectsController::class, 'add'])->middleware('auth');
Route::get('/console/projects/edit/{project:id}', [ProjectsController::class, 'editForm'])->where('project', '[0-9]+')->middleware('auth');
Route::post('/console/projects/edit/{project:id}', [ProjectsController::class, 'edit'])->where('project', '[0-9]+')->middleware('auth');
Route::get('/console/projects/delete/{project:id}', [ProjectsController::class, 'delete'])->where('project', '[0-9]+')->middleware('auth');
Route::get('/console/projects/image/{project:id}', [ProjectsController::class, 'imageForm'])->where('project', '[0-9]+')->middleware('auth');
Route::post('/console/projects/image/{project:id}', [ProjectsController::class, 'image'])->where('project', '[0-9]+')->middleware('auth');

Route::get('/console/users/list', [UsersController::class, 'list'])->middleware('auth');
Route::get('/console/users/add', [UsersController::class, 'addForm'])->middleware('auth');
Route::post('/console/users/add', [UsersController::class, 'add'])->middleware('auth');
Route::get('/console/users/edit/{user:id}', [UsersController::class, 'editForm'])->where('user', '[0-9]+')->middleware('auth');
Route::post('/console/users/edit/{user:id}', [UsersController::class, 'edit'])->where('user', '[0-9]+')->middleware('auth');
Route::get('/console/users/delete/{user:id}', [UsersController::class, 'delete'])->where('user', '[0-9]+')->middleware('auth');

Route::get('/console/types/list', [TypesController::class, 'list'])->middleware('auth');
Route::get('/console/types/add', [TypesController::class, 'addForm'])->middleware('auth');
Route::post('/console/types/add', [TypesController::class, 'add'])->middleware('auth');
Route::get('/console/types/edit/{type:id}', [TypesController::class, 'editForm'])->where('type', '[0-9]+')->middleware('auth');
Route::post('/console/types/edit/{type:id}', [TypesController::class, 'edit'])->where('type', '[0-9]+')->middleware('auth');
Route::get('/console/types/delete/{type:id}', [TypesController::class, 'delete'])->where('type', '[0-9]+')->middleware('auth');

Route::get('/console/entries/list', [EntriesController::class, 'list'])->middleware('auth');
Route::get('/console/entries/add', [EntriesController::class, 'addForm'])->middleware('auth');
Route::post('/console/entries/add', [EntriesController::class, 'add'])->middleware('auth');
Route::get('/console/entries/edit/{entry:id}', [EntriesController::class, 'editForm'])->where('entry', '[0-9]+')->middleware('auth');
Route::post('/console/entries/edit/{entry:id}', [EntriesController::class, 'edit'])->where('entry', '[0-9]+')->middleware('auth');
Route::get('/console/entries/delete/{entry:id}', [EntriesController::class, 'delete'])->where('entry', '[0-9]+')->middleware('auth');
