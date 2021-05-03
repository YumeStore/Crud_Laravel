<?php

namespace App\Http\Controllers;

use App\Models\Alunos;
use Illuminate\Http\Request;

class AlunosController extends Controller
{
    public function create()
    {
      return view('aluno.create');
    }
    public function store(Request $request)
    {
      Alunos::create([
        'nome' => $request->nome,
        'email' =>$request->email,
        'cpf' =>$request->cpf
      ]);

      return "Aluno cadastrado com sucesso!";
    }
}
