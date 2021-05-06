
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
            <div class="progress my-2">
                <div class="progress-bar" id="progress" role="progressbar" style="width: 0%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            
            <!-- Bloco do Aluno -->
            <div id="escolhaAluno">
                <div id="aluno">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="">Aluno:</label>
                            <input class="form-control col-6" type="text" name="nomeAluno" id="filtrarNomeAluno">
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
                <div id="escolhaCurso" style="display: none;">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Curso:</label>
                            <input class="form-control col-6" type="text" name="nomeCurso" id="filtrarNomeCurso">
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
                        <button type="button" onclick="avançarCheckOut()" class="btn btn-info">Avançar para Checkout</button>
                    </div>
                </div>
            <form action="{{ route('registrar_alunos_cursos') }}" method="POST">
            @csrf
                <div id="checkOut" style="display: none;">
                    <div class="form-group my-2">
                        <h2>Aluno</h2>
                        <hr>
                        <div class="form-group">
                            <label>Id</label>
                            <input class="form-control col-6" type="text" name="idAluno" id="idAluno" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nome</label>
                            <input class="form-control col-6" type="text" id="nomeAluno" readonly>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input class="form-control col-6" type="text" id="email" readonly>
                        </div>
                        <div class="form-group">
                            <label>Cpf</label>
                            <input class="form-control col-6" type="text" id="cpf" readonly>
                        </div>
                    </div>
                    <div class="form-group my-2">
                        <h2>Curso</h2>
                        <hr>
                        <div class="form-group">
                            <label>Id</label>
                            <input class="form-control col-6" type="text" name="idCurso" id="idCurso" readonly>
                        </div>
                        <div class="form-group">
                            <label>Nome</label>
                            <input class="form-control col-6" type="text" id="nomeCurso" readonly>
                        </div>
                        <div class="form-group">
                            <label>Conteudo</label>
                            <input class="form-control col-6" type="text" id="conteudo" readonly>
                        </div>
                        <div class="form-group">
                            <label>Imagem</label>
                            <input class="form-control col-6" type="text" id="imagem" readonly>
                        </div>
                    </div>  
                    <button type="submit" class="btn btn-success">Submeter</button> 
                </div>
            </form>
        <script>
              var aluno = document.getElementById('aluno');
              var curso = document.getElementById('curso');
              var bolsa = document.getElementById('bolsa');
              
              var progressbar = document.getElementById('progress');
              var idAlunoFiltro = document.getElementById('filtrarNomeAluno');
              var idCursoFiltro = document.getElementById('filtrarNomeCurso');
              var tabelaAlunos = document.getElementById('tabelaAlunos');
              
              var filtrarAlunoId = document.getElementById('filtrarAluno');
              var filtrarCursoId = document.getElementById('filtrarCurso');

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

              idCursoFiltro.addEventListener('keyup', function(e){
                var key = e.which || e.keyCode;
                if (key == 13) {
                    e.preventDefault();
                    filtrarCursoId.click();
                }
              });

              function filtrarCursoByName() {
                var saida = listaCursos.filter(entrada => {
                   return entrada.nome.toLowerCase().indexOf(idCursoFiltro.value.toLowerCase()) > -1;
                });
                tabelaCursos.innerHTML = '';

                if(saida.length > 0){
                    for(let i = 0; i < saida.length; i++){
                        tabelaCursos.innerHTML += `<tr> 
                                                    <td scope="row">${saida[i].id}</td>
                                                    <td scope="row">${saida[i].nome}<td>
                                                    <td scope="row">${saida[i].imagem}</td>
                                                    <td scope="row">${saida[i].conteudo}</td>
                                                    <td scope="row"><button type="button" class="btn btn-success" onclick="selecionarCurso(${saida[i].id})">Selecionar</button></td>
                                                </tr>`
                    }
                } else {
                    alert('Nenhum Registro Encontrado!');
                    for(let i = 0; i < listaAlunos.length; i++){
                        tabelaCursos.innerHTML += `<tr> 
                                                    <td scope="row">${listaCursos[i].id}</td>
                                                    <td scope="row">${listaCursos[i].nome}<td>
                                                    <td scope="row">${listaCursos[i].imagem}</td>
                                                    <td scope="row">${listaCursos[i].conteudo}</td>
                                                    <td scope="row"><button type="button" class="btn btn-success" onclick="selecionarCurso(${listaCursos[i].id})">Selecionar</button></td>
                                                </tr>`
                    }
                };
            }

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

                var divCurso = document.getElementById("escolhaCurso");
                divCurso.style.display = 'block';
              }

              function avançarCheckOut(){
                  console.log("div checkout")
                var divCheckout = document.getElementById("checkOut");
                var divCurso = document.getElementById("escolhaCurso");

                divCheckout.style.display = 'block';
                divCurso.style.display = 'none';

                progressbar.style.width = '100%';

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
                                       
                        document.getElementById("idCurso").value = id;
                        document.getElementById("nomeCurso").value = listaCursos[i].nome;
                        document.getElementById("conteudo").value = listaCursos[i].conteudo;
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

                        document.getElementById("idAluno").value = id;
                        document.getElementById("nomeAluno").value = listaAlunos[i].nome;
                        document.getElementById("email").value = listaAlunos[i].email;       
                        document.getElementById("cpf").value = listaAlunos[i].cpf;
                        break;               
                    }
                }

              }

              function selecionadoReverter(){

              }              
      </script>
    </body>
</html>