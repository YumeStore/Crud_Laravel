<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursosController extends Controller
{
    public function create()
    {
      return view('curso.create');
    }
    public function store(Request $request)
    {
      Produto::create([
        'nome' => $request->nome,
        'email' =>$request->email,
        'cpf' =>$request->cpf,
        'cursos' =>$request->cursos
      ]);
      
      return "Aluno cadastrado com sucesso!";
    }
}
