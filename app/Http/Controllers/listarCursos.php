<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class listarCursos extends Controller
{
    public function create()
    {
      return view('alunoscurso.list');
    }
    public function store(Request $request)
    {
      
    }
}
