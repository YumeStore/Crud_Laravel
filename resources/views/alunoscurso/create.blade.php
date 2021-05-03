<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Cadastrar Aluno em Curso</title>
  <link rel="stylesheet" href="../../css/app.css">
</head>

<body>
  <div class="container">

    <nav aria-label="breadcrumb" id="alunoEscolha">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Escolha do Aluno</a></li>
      </ol>
    </nav>
    <nav aria-label="breadcrumb" id="cursoEscolha">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Escolha do Aluno</a></li>
        <li class="breadcrumb-item"><a href="#">Escolha o Curso</a></li>
      </ol>
    </nav>
    <nav aria-label="breadcrumb" id="bolsaEscolha">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Escolha do Aluno</a></li>
        <li class="breadcrumb-item"><a href="#">Escolha o Curso</a></li>
        <li class="breadcrumb-item active" aria-current="page">Escolha se possui Bolsa</li>
      </ol>
    </nav>

    <div class="progress">
      <div class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
    </div>

    <div class="content p-1">
      <form action="" method="POST">
        @csrf
        <div id="aluno">
          <div class="row" id="aluno">
            <div class="form-group">
              <label for="">Aluno:</label>
              <input class="form-control" type="text" class="form" name="idAluno">
            </div>
            <button id="avancarCurso()" class="btn btn-sucess">Avançar</button>
          </div>
        </div>
        <div id="curso">
          <div class="row">
            <div class="form-group">
              <label for="">Curso</label>
              <input class="form-control" type="text" name="idCurso"> <br>
            </div>
            <button id="avancarBolsa()" class="btn btn-sucess">Avançar</button>
          </div>
          <div class="row">
            <div class="form-group">
              <label for="">turno</label>
              <input class="form-control" type="text" name="turno"> <br>
            </div>
          </div>
        </div>
        <div id="bolsa">
          <div class="row">
            <div class="form-group">
              <label for="">id da Bolsa</label>
              <input class="form-control" type="text" name="idBolsa"> <br>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <label for="">dataTermino</label>
              <input class="form-control" type="text" name="observacoes"> <br>
            </div>
          </div>
          <div class="row">
            <div class="form-group">
              <button class="btn btn-primary" type="submit"> Salvar</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  @php
  use Illuminate\Support\Facades\DB;

  $users = DB::table('alunos')->get();

  foreach ($users as $user) 
  {
    echo $user->nome;
  }


  @endphp
  <script>
    var aluno = document.getElementById('aluno');
    var curso = document.getElementById('curso');
    var bolsa = document.getElementById('bolsa');

    curso.style.display = 'none';
    bolsa.style.display = 'none';

    var avancarCurso = () => {

    }

    var avancarBolsa = () => {

    }
  </script>
</body>


</html>