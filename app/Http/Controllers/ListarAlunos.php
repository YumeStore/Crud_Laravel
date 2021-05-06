<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListarAlunos extends Controller
{
    public function create()
    {
      return view('alunos.list');
    }
    public function store(Request $request)
    {
}
