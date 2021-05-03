<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cadastrar um novo produto</title>
  </head>
  <body>
    <form action="{{ route('registrar_curso') }}" method="POST">
        @csrf
        <label for="">Nome</label>
        <input type="text" name="nome"> <br>
        <label for="">Imagem</label>
        <input type="text" name="imagem"> <br>
        <label for="">Conteúdo Programático</label>
        <input type="text" name="conteudo"> <br>
        <button> Salvar</button>
    </form>
  </body>
</html>
