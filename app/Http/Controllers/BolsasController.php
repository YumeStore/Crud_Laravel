<?php

namespace App\Http\Controllers;

use App\Models\Bolsa;
use Illuminate\Http\Request;

class BolsasController extends Controller
{
    public function create()
    {
      return view('bolsa.create');
    }
    public function store(Request $request)
    {
      Bolsa::create([
        'nome' => $request->nome,
        'porcentagem' =>$request->porcentagem,
        'validade' =>$request->validade,
        'duracaoMes' =>$request->duracaoMes,
        'observacoes' =>$request->observacoes
      ]);

      return "Bolsa cadastrada com sucesso!";
    }
}
