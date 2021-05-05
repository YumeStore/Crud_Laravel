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
        'idAluno' => $request->idAluno,
        'idCurso' =>$request->idCurso,
        'turno' =>$request->turno,
        'idBolsa' =>$request->idBolsa,
      ]);

      return "Bolsa cadastrada com sucesso!";
    }
}
