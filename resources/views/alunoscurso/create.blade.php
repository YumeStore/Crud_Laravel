
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
    $cursos = DB::table('cursos') -> get();
    @endphp 
        <div class="container">
            <div class="row py-4">
                <div class="progress">
                    <div class="progress-bar bg-success" id="progress" role="progressbar" style="width: 0%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>  
            <form>
                <!-- Bloco do Aluno -->
                <div id="escolhaAluno">
                    <div id="aluno">
                        <div class="form-group">
                            <div class="form-group">
                                <label for="">Aluno:</label>
                                <input class="form-control col-6" type="text" name="nomeAluno" id="idAlunoFiltro">
                            </div>
                            <button type="button" id="filtrarAluno" onclick="filtrarAlunoByName()" class="btn btn-info">Filtrar</button>
                        </div>   
                    </div>
                    <!-- Tabela de aluno cadastrados -->
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
                                <!-- Conteudo da tabela que sera apresentado pelo JavaScript -->
                            </tbody>
                        </table>
                    </div>
                    <div class="form-row">
                        <button type="button" onclick="avancarCurso()" class="btn btn-info">Avançar para Curso</button>
                    </div>
                </div>
                <!-- Bloco do Curso -->
                <div id="escolhaCurso">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Curso:</label>
                            <input class="form-control col-6" type="text" name="nomeCurso" id="idCursoFiltro">
                        </div>
                        <button type="button" id="filtrarCurso" onclick="filtrarCursoByName()" class="btn btn-info">Filtrar</button>
                    </div>   

                    <!-- Tabela de Cursos cadastrados -->
                    <div class="form-row">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Id do Curso</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Imagem</th>
                                    <th scope="col">Conteudo</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody id="tabelaCursos">
                                        <!-- Conteudo da tabela que sera apresentado pelo JavaScript -->
                            </tbody>
                        </table>
                    </div>
                    <div class="form-row">
                        <button type="button" id="avançarCheckOut()" class="btn btn-info">Avançar</button>
                    </div>
                </div>
                <div id="checkOut">
                    <div class="form-group">
                        <label for="">Aluno</label>
                        <div class="form-group">
                            <label for="">Id</label>
                            <input class="form-control col-6" type="text" name="idAluno">
                        </div>
                        <div class="form-group">
                            <label for="">Nome</label>
                            <input class="form-control col-6" type="text" id="nomeAluno">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input class="form-control col-6" type="text" id="email">
                        </div>
                        <div class="form-group">
                            <label for="">Cpf</label>
                            <input class="form-control col-6" type="text" id="cpf">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Curso</label>
                        <div class="form-group">
                            <label for="">Id</label>
                            <input class="form-control col-6" type="text" name="idCurso" id="idCurso">
                        </div>
                        <div class="form-group">
                            <label for="">Nome</label>
                            <input class="form-control col-6" type="text" id="nomeCurso">
                        </div>
                        <div class="form-group">
                            <label for="">Imagem</label>
                            <input class="form-control col-6" type="text" id="conteudo">
                        </div>
                        <div class="form-group">
                            <label for="">Conteudo</label>
                            <input class="form-control col-6" type="text" id="imagem">
                        </div>
                    </div>  
                    <button type="submit">Submeter</button> 
                </div>

            </form>
        <script>
              var aluno = document.getElementById('aluno');
              var curso = document.getElementById('curso');
              var bolsa = document.getElementById('bolsa');
              var progressbar = document.getElementById('progress');
              var idAlunoFiltro = document.getElementById('idAlunoFiltro');
              var tabelaAlunos = document.getElementById('tabelaAlunos');
              var filtrarAlunoId = document.getElementById('filtrarAluno');

              var alunosCursos = new Object();
              var listaCursos = @php echo json_encode($cursos); @endphp;
              var listaAlunos = @php echo json_encode($usuarios); @endphp;
              
           
              function iniciarTabelaAlunos(){
                for(let i = 0; i < listaAlunos.length; i++){
                        tabelaAlunos.innerHTML += `<tr> 
                                                    <td scope="row">${listaAlunos[i].id}</td>
                                                    <td scope="row">${listaAlunos[i].nome}<td>
                                                    <td scope="row">${listaAlunos[i].email}</td>
                                                    <td scope="row"><button type="button" class="btn btn-success" onclick="selecionarAluno(${listaAlunos[i].id})">Selecionar</button></td>
                                                    </tr>`                
                }
              }

              iniciarTabelaAlunos();

              idAlunoFiltro.addEventListener('keyup', function(e){
                var key = e.which || e.keyCode;
                if (key == 13) {
                    e.preventDefault();
                    filtrarAlunoId.click();
                }
              });

              function filtrarAlunoByName() {
                var saida = listaAlunos.filter(entrada => {
                   return entrada.nome.toLowerCase().indexOf(idAlunoFiltro.value.toLowerCase()) > -1;
                });

                if(saida.length > 0){
                    tabelaAlunos.innerHTML = '';
                    for(let i = 0; i < saida.length; i++){
                        tabelaAlunos.innerHTML += `<tr> 
                                                    <td scope="row">${saida[i].id}</td>
                                                    <td scope="row">${saida[i].nome}<td>
                                                    <td scope="row">${saida[i].email}</td>
                                                    <td scope="row"><button type="button" class="btn btn-success" onclick="selecionarAluno(${listaAlunos[i].id})">Selecionar</button></td>
                                                </tr>`
                    }
                } else {
                    alert('Nenhum Registro Encontrado!');
                    tabelaAlunos.innerHTML = '';
                    for(let i = 0; i < listaAlunos.length; i++){
                        tabelaAlunos.innerHTML += `<tr> 
                                                    <td scope="row">${listaAlunos[i].id}</td>
                                                    <td scope="row">${listaAlunos[i].nome}<td>
                                                    <td scope="row">${listaAlunos[i].email}</td>
                                                    <td scope="row"><button type="button" class="btn btn-success" onclick="selecionarAluno(${listaAlunos[i].id})">Selecionar</button></td>
                                                </tr>`
                    }
                };
              }

              function esconderTabela() {
                  return tabelaAlunos.style.display = 'none';
              }

              function avancarCurso() {
                  var divAluno = document.getElementById("escolhaAluno");
                  divAluno.style.display = 'none';
                  progressbar.style.width = '33%';
                  
                  console.log("listadecursos:", listaCursos);

                  var tabelaCursos = document.getElementById("tabelaCursos");
                  //tabelaCursos.innerHTML = "";

                  for(let i = 0; i < listaCursos.length; i++){
                    tabelaCursos.innerHTML += `<tr> 
                                                    <td scope="row">${listaCursos[i].id}</td>
                                                    <td scope="row">${listaCursos[i].nome}</td>
                                                    <td scope="row">${listaCursos[i].imagem}<td>
                                                    <td scope="row">${listaCursos[i].conteudo}<td>
                                                    <td scope="row"><button type="button" class="btn btn-success" onclick="selecionarCurso(${listaCursos[i].id})">Selecionar</button></td>
                                                    </tr>` ;   
                    console.log(listaCursos);
                }
              }

              function avançarCheckOut(){
                var divCurso = document.getElementById("escolhaCurso");
                divCurso.style.display = 'none';
                progressbar.style.width = '100%';

                document.getElementById("idAluno").value = alunosCursos.idAluno;
                document.getElementById("nomeAluno").value = alunosCursos.aluno.nome;
                document.getElementById("email").value = alunosCursos.aluno.email;
                document.getElementById("cpf").value = alunosCursos.aluno.cpf;
                document.getElementById("idCurso").value = alunosCursos.idCurso;
                document.getElementById("nomeCurso").value = alunosCursos.nome;
                document.getElementById("conteudo").value = alunosCursos.conteudo;
              }

              function selecionarCurso(id){
                  console.log("funcao selecionar curso inciada");
                tabelaCursos.innerHTML = '';
                for(let i = 0; i < listaCursos.length; i++){
                    if(listaCursos[i].id == id){
                        tabelaCursos.innerHTML += `<tr> 
                                                    <td scope="row">${listaCursos[i].id}</td>
                                                    <td scope="row">${listaCursos[i].nome}<td>
                                                    <td scope="row">${listaCursos[i].conteudo}</td>
                                                    <td scope="row"><button type="button" onclick="selecionadoReverter()" class="btn btn-danger">Deselecionar</button></td>
                                                   </tr>` ;
                                                                                   
                        alunosCursos.idCurso = id;
                        alunosCursos.curso.nome = listaCursos[i].nome;
                        alunosCursos.curso.conteudo = listaCursos[i].conteudo;
                        console.log("Objeto Aluno", alunosCursos);
                        break;               
                    }
                }

              }
              function selecionarAluno(id){
                tabelaAlunos.innerHTML = '';
                for(let i = 0; i < listaAlunos.length; i++){
                    if(listaAlunos[i].id == id){
                        
                        tabelaAlunos.innerHTML += `<tr> 
                                                    <td scope="row">${listaAlunos[i].id}</td>
                                                    <td scope="row">${listaAlunos[i].nome}<td>
                                                    <td scope="row">${listaAlunos[i].email}</td>
                                                    <td scope="row"><button type="button" onclick="selecionadoReverter()" class="btn btn-danger">Deselecionar</button></td>
                                                   </tr>` ;
                                                                                   
                        alunosCursos.idAluno = id;
                        alunosCursos.aluno.nome = listaAlunos[i].nome;
                        alunosCursos.aluno.email = listaAlunos[i].email;
                        alunosCursos.aluno.cpf = listaAlunos[i].cpf;
                        console.log("Objeto Aluno", alunosCursos);
                        break;               
                    }
                }

              }

              function selecionadoReverter(){

              }              
      </script>
    </body>
</html>