<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;
use App\Http\Controllers\CategoriesController;

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
//SE PUEDE REGRESAR TEXTO
/*
Route::get('/saludos',function(){
    return "hOLA MUNDO";
});

*/
Route::get('/saludos',function(){
    return view('app');
});


Route::get('/Tareas',[TodosController::class,'index'])->name('todos');
Route::post('/Tareas',[TodosController::class,'store'])->name('todosNew');

Route::get('/Tareas/{id}',[TodosController::class,'show'])->name('todos-edit');
Route::patch('/Tareas{id}',[TodosController::class,'update'])->name('todos-update');
Route::delete('/Tareas{id}',[TodosController::class, 'destroy'])->name('todos-destroy');

Route::resource('categories', CategoriesController::class);