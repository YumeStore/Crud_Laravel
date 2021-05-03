
<!DOCTYPE html> 
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Cadastrar Aluno em Curso</title>
        <link rel="stylesheet" href="../../css/app.css">
    </head>

    <body>
    @php use Illuminate\Support\Facades\DB;

$usuarios = DB::table('alunos') -> get();

$nome_aluno = filter_input(INPUT_GET, 'idAluno', FILTER_SANITIZE_STRING);

if (!empty($nome_aluno)) {
    $enconder_tabela = true;

    // realiza a consulta
    $buscas = DB::table('alunos')->where('nome', $nome_aluno)->get();

    foreach($buscas as $busca){
     echo $busca->nome;
    }
}


@endphp 
        <div class="container">

            <nav aria-label="breadcrumb" id="alunoEscolha">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Escolha do Aluno</a>
                    </li>
                </ol>
            </nav>
            <nav aria-label="breadcrumb" id="cursoEscolha">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Escolha do Aluno</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Escolha o Curso</a>
                    </li>
                </ol>
            </nav>
            <nav aria-label="breadcrumb" id="bolsaEscolha">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Escolha do Aluno</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Escolha o Curso</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Escolha se possui Bolsa</li>
                </ol>
            </nav>

            <div class="progress">
                <div class="progress-bar bg-success" id="progress" role="progressbar" style="width: 0%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
            </div>

            <div class="content p-1">
                <form action="" method="GET">
                    @csrf
                    <div id="aluno">
                        <div class="row">
                            <div class="form-group">
                                <label for="">Aluno:</label>
                                <input class="form-control" type="text" name="idAluno" id="idAlunoFiltro">
                                <button type="button" id="filtrarAluno" onclick="filtrarAluno()" class="btn btn-info">Filtrar</button>
                            </div>
                        </div>   

                        <!-- Tabela de resultados  -->
                        @php
                        $nome_aluno = filter_input(INPUT_GET, 'idAluno', FILTER_SANITIZE_STRING);
                        if (!empty($nome_aluno)) { 
                        $enconder_tabela = true;
                        $buscas = DB::table('alunos')->where('nome', $nome_aluno)->get();
                        if(!empty($buscas))
                        
                        {
                        @endphp
                        <div class="form-row">
                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Id do Aluno</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Email</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody id="tabelaAlunos">
                                      @php
                                        foreach($buscas as $busca) {
                                      @endphp 
                                        <tr> 
                                          <td scope="row">@php echo $busca->id @endphp</td>
                                          <td scope="row">@php echo $busca->nome @endphp<td>
                                          <td scope="row">@php echo $busca->email @endphp</td>
                                          <td scope="row">Selecionar</td>
                                        </tr>
                                      @php
                                }
                                @endphp
                            </tbody>
                        </table>
                        @php
                        }
                        }
                        @endphp

                        <!-- Tabela de aluno cadastrados -->
                        @php
                        if(empty($buscas))
                        {
                        @endphp

                        <div class="form-row">
                            <table class="table table-dark table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Id do Aluno</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Email</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody id="tabelaAlunos">
                                      @php
                                        foreach($usuarios as $usuario) {
                                      @endphp 
                                        <tr> 
                                          <td scope="row">@php echo $usuario->id @endphp</td>
                                          <td scope="row">@php echo $usuario->nome @endphp</td>
                                          <td scope="row">@php echo $usuario->email @endphp</td>
                                          <td scope="row">Selecionar</td>
                                        </tr>
                                @php
                                      }
                          }           
                                @endphp
                            </tbody>
                        </table>
                    </div>
                    </div>
                    <div class="form-row">
                        <button id="avancarCurso()" class="btn btn-sucess">Avançar</button>
                    </div>
                </div>
                <div id="curso">
                    <div class="row">
                        <div class="form-group">
                            <label for="">Curso</label>
                            <input class="form-control" type="text" name="idCurso">
                            <br>
                        </div>
                        <button id="avancarBolsa()" class="btn btn-sucess">Avançar</button>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="">turno</label>
                            <input class="form-control" type="text" name="turno">
                            <br>
                        </div>
                    </div>
                </div>
                <div id="bolsa">
                    <div class="row">
                        <div class="form-group">
                            <label for="">id da Bolsa</label>
                            <input class="form-control" type="text" name="idBolsa">
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <label for="">dataTermino</label>
                            <input class="form-control" type="text" name="observacoes">
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">
                                Salvar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <script>
              var aluno = document.getElementById('aluno');
              var curso = document.getElementById('curso');
              var bolsa = document.getElementById('bolsa');
              var progressbar = document.getElementById('progress');
              var idAlunoFiltro = document.getElementById('idAlunoFiltro');
              var tabelaAlunos = document.getElementById('tabelaAlunos');
              var filtrarAlunoId = document.getElementById('filtrarAluno');

              curso.style.display = 'none';
              bolsa.style.display = 'none';     

              function filtrarAlunoById() {
                var alunoList = @php echo json_encode($usuarios); @endphp;

                alunoList.map(entrada => {
                  if(entrada.id == idAlunoFiltro.value){
                    tabelaAlunos.innerHTML = `<tr> 
                                                <td scope="row">${entrada.id}</td>
                                                <td scope="row">${entrada.nome}<td>
                                                <td scope="row">${entrada.email}</td>
                                                <td scope="row">Selecionar</td>
                                              </tr>`
                  }
                });
              }

              function esconderTabela() {
                  return tabelaAlunos.style.display = 'none';
              }

              var avancarCurso = () => {
                  progressbar.style.width = '33%';
              }

              var avancarBolsa = () => {}

              /*
              (3) [{…}, {…}, {…}]
              0: {id: 1, nome: "pedro", email: "pedro@email", cpf: "344343", created_at: "2021-05-03 16:29:44", …}
              1: {id: 2, nome: "Paulo", email: "paulo@email.com", cpf: "589488545", created_at: "2021-05-03 19:24:03", …}
              2: {id: 3, nome: "Murillo", email: "murillo@email.com", cpf: "43287432", created_at: "2021-05-03 19:24:18", …}
              length: 3
              */
      </script>
    </body>
</html>
