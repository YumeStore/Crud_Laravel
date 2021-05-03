<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cadastrar Bolsa</title>
    <link rel="stylesheet" href="../../css/app.css">
  </head>
  <body>
    <form action="{{ route('registrar_bolsa') }}" method="POST">
        @csrf
        <label for="">Nome</label>
        <input type="text" name="nome"> <br>
        <label for="">Porcentagem</label>
        <input type="text" name="porcentagem"> <br>
        <label for="">validade</label>
        <input type="date" name="validade"> <br>
        <label for="">duracaoMes</label>
        <input type="text" name="duracaoMes"> <br>
        <label for="">observacoes</label>
        <input type="text" name="observacoes"> <br>
        <button> Salvar</button>
    </form>
  </body>
</html>
