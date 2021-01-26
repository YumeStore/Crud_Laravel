<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cadastrar um novo produto</title>
  </head>
  <body>
    <form action="{{ route('registrar_produto') }}" method="POST">
        @csrf
        <label for="">Nome</label>
        <input type="text" name="nome"> <br>
        <label for="">Custo</label>
        <input type="text" name="custo"> <br>
        <label for="">Preco</label>
        <input type="text" name="preco"> <br>
        <label for="">Quantidade</label>
        <input type="text" name="quantidade"> <br>
        <button> Salvar</button>
    </form>
  </body>
</html>
