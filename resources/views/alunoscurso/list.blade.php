<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/app.css">
    <title>Lista de Cursos</title>
</head>

<body>
@php 
    use Illuminate\Support\Facades\DB;
    $cursos = DB::table('cursos') -> get();

    $alunos_cursos = DB::table('alunos_cursos')
                                ->join('cursos', 'alunos_cursos.idCurso', '=', 'cursos.id')
                                ->join('alunos', 'alunos_cursos.idAluno', '=', 'alunos.id')
                                ->select('cursos.*','alunos_cursos.*','alunos.id','alunos.nome as Aluno','alunos.email','alunos.cpf')
                                ->get();
                                
                                   
@endphp 
<div class="container">
    <div id="listaAlunosCursos">
        <div id="aluno">
            <div class="form-group">
                <div class="form-group">
                    <label for="">Pesquisar</label>
                    <input class="form-control col-6" type="text" name="filtro" id="filtrar">
                </div>
                <button type="button" id="filtrarAlunoCursos" onclick="filtrarAlunosCursos()" class="btn btn-info">Filtrar</button>
            </div>
        </div>
        <!-- Tabela de alunos cursos cadastrados -->
        <div class="form-row">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">Aluno</th>
                        <th scope="col">Curso</th>
                        <th scope="col">Início</th>
                        <th scope="col">Término</th>
                        <th scope="col">Bolsa</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody id="tabelaAlunosCursos">
                    <!-- Conteudo da tabela que sera apresentado pelo JavaScript -->
                </tbody>
            </table>
        </div>
        <div class="form-row">
            <button type="button" onclick="filtrarCursosComMaisDezAlunos()" class="btn btn-info">Filtrar</button>
        </div>
    </div>
</div>
<script>
    
    var listaAlunoCurso = @php echo json_encode($alunos_cursos); @endphp;
    var listaCurso = @php echo json_encode($cursos); @endphp;
    var listaFiltrados = [];

    function preencherListagem() {
        var saida = listaAlunoCurso.filter(registro => {
                   return registro.nome.toLowerCase().indexOf(filtrar.value.toLowerCase()) > -1;
                });

        if(saida.length > 0){
            PreencherLista(saida);
        } else {
            alert('Nenhum Registro Encontrado!');
            PreencherLista(listaAlunoCurso);
        };
    }

    function filtrarCursosComMaisDezAlunos(){
       
        console.log(listaCurso);
        for(let i = 0; i < listaCurso.length; i++) {   
          var cursos = listaAlunoCurso.filter(registro => {
            return registro.nome.toLowerCase().indexOf(listaCurso[i].nome.toLowerCase()) > -1;
          });  
          
          if(cursos >= 10){
            listaFiltrados.push(...cursos);
          }
        }

        if(listaFiltrados.length > 0){
            PreencherLista(listaFiltrados);
        } else {
            alert('Nenhum Registro Encontrado!');
            PreencherLista(listaAlunoCurso);
        }
    }

    /**
     * Preenche a tabela Lista Cursos.
     * @param {array} listagem lista de objetos lista_cursos.
     */
    function PreencherLista(listagem){
            var lista = document.getElementById("tabelaAlunosCursos");
            lista.innerHTML = '';
            for(let i = 0; i < listagem.length; i++){
                lista.innerHTML += `<tr> 
                                            <td scope="row">${listagem[i].Aluno}</td>
                                            <td scope="row">${listagem[i].nome}<td>
                                            <td scope="row">${listagem[i].dataInicio}</td>
                                            <td scope="row">${listagem[i].dataTermino}</td>
                                        </tr>`
            }
    }

    preencherListagem(); var listaAlunoCurso = @php echo json_encode($alunos_cursos); @endphp;
    var listaFiltrados = [];

    function preencherListagem() {
        var lista = document.getElementById("tabelaAlunosCursos");

        var saida = listaAlunoCurso.filter(registro => {
                   return registro.nome.toLowerCase().indexOf(filtrar.value.toLowerCase()) > -1;
                });

        if(saida.length > 0){
            PreencherLista(saida);
        } else {
            alert('Nenhum Registro Encontrado!');
            PreencherLista(listaAlunoCurso);
        };
    }

    function filtrarCursosComMaisDezAlunos(){
        var ultimo_curso = "";

        for(let i = 0; i < listaCurso.length; i++) {   
          var cursos = listaAlunoCurso.filter(registro => { 
              
            return registro.nome.toLowerCase().indexOf(listaCurso[i].nome.toLowerCase()) > -1;
            
          });  
          if(cursos.length >= 10){
            listaFiltrados.push(...cursos);
            console.log(cursos);
          }
        }

        if(listaFiltrados.length > 0){
            PreencherLista(listaFiltrados);
        } else {
            alert('Nenhum Registro Encontrado!');
            PreencherLista(listaAlunoCurso);
        }
    }

    /**
     * Preenche a tabela Lista Cursos.
     * @param {array} listagem lista de objetos lista_cursos.
     */
    function PreencherLista(listagem){
        var lista = document.getElementById("tabelaAlunosCursos");
            lista.innerHTML = '';
            for(let i = 0; i < listagem.length; i++){
                lista.innerHTML += `<tr> 
                                            <td scope="row">${listagem[i].Aluno}</td>
                                            <td scope="row">${listagem[i].nome}<td>
                                            <td scope="row">${listagem[i].dataInicio}</td>
                                            <td scope="row">${listagem[i].dataTermino}</td>
                                        </tr>`
            }
    }

    preencherListagem();
    
</script>
</body>
</html>