<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cadastrar um novo Aluno</title>
  </head>
  <body>
    <form action="{{ route('registrar_aluno') }}" method="POST">
        @csrf
        <label for="">Nome</label>
        <input type="text" name="nome"> <br>
        <label for="">email</label>
        <input type="text" name="email"> <br>
        <label for="">cpf</label>
        <input type="text" name="cpf"> <br>
        <button> Salvar</button>
    </form>
  </body>
</html>
