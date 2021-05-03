<?php

namespace App\Http\Controllers;

use App\Models\AlunosCurso;
use Illuminate\Http\Request;

class AlunosCursos extends Controller
{
    public function create()
    {
      return view('alunoscurso.create');
    }
    public function store(Request $request)
    {
      AlunosCurso::create([
        'nome' => $request->nome,
        'porcentagem' =>$request->porcentagem,
        'validade' =>$request->validade,
        'duracaoMes' =>$request->duracaoMes,
        'observacoes' =>$request->observacoes
      ]);

      return "Bolsa cadastrada com sucesso!";
    }
}
