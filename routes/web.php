<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
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
    return view('welcome');
});

//Route::get('/produtos/novo', 'ProdutosController@create');
//Route::post('/produtos/novo', 'ProdutosController@store')->name('registrar_produto');
Route::get('curso/', 'CursosController@create');
Route::post('curso/', 'CursosController@store') ->name('registrar_curso');
Route::get('aluno/', 'AlunosController@create');
Route::post('aluno/', 'AlunosController@store') ->name('registrar_aluno');
Route::get('bolsa/', 'BolsasController@create');
Route::post('bolsa/', 'BolsasController@store') ->name('registrar_bolsa');
Route::get('alunocurso/', 'AlunosCursos@create');
Route::post('alunocurso/', 'AlunosCursos@store') ->name('registrar_alunos_cursos');
Route::get('listarcurso/', 'listarCursos@create');



