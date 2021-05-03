<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

/**
 * Classe Modelo Produtos
 */
class ProdutosController extends Controller
{
    /**
     * Cria a view Produtos.
     * @return View retorna view create Produtos;
     */
    public function create()
    {
      return view('produtos.create');
    }
    public function store(Request $request)
    {
      Produto::create([
        'nome' => $request->nome,
        'custo' =>$request->custo,
        'preco' =>$request->preco,
        'quantidade' => $request->quantidade,
      ]);
      return "Produto cadastrado com sucesso!";
    }
}
