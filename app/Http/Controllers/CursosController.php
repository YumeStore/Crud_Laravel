<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    public function create()
    {
      return view('curso.create');
    }
    public function store(Request $request)
    {
      Curso::create([
        'nome' => $request->nome,
        'imagem' =>$request->imagem,
        'conteudo' =>$request->conteudo
        
      ]);

      return "Curso cadastrado com sucesso!";
    }
}
