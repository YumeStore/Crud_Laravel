<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/app.css">
    <title>Document</title>
</head>
<body>
@php use Illuminate\Support\Facades\DB;
    $alunos = DB::table('alunos') -> get();
@endphp 
<div class="container">
<div id="listagemAlunos">
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
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody id="tabelaAlunos">
                        <!-- Conteudo da tabela que sera apresentado pelo JavaScript -->
                        </tbody>
                    </table>
                </div>
                <div class="form-row">
                    <button type="button" onclick="novoAluno()" class="btn btn-info">Novo Aluno</button>
                </div>
            </div>
    </div>
    <script>
        var aluno = document.getElementById('aluno');
        var idAlunoFiltro = document.getElementById('filtrarNomeAluno');
        var tabelaAlunos = document.getElementById('tabelaAlunos');
              
        var filtrarAlunoId = document.getElementById('filtrarAluno');            
        var listaAlunos = @php echo json_encode($alunos); @endphp;
             
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
                preencherTabela(saida)
            } else {
                alert('Nenhum Registro Encontrado!');
                preencherTabela(listaAlunos)
            };
        }
        function editarAluno(id){
            
        }

        function excluirAluno(id){

        }

        function novoAluno(){
            window.location.href=  '/aluno';
        }

        function preencherTabela(listagem){
            tabelaAlunos.innerHTML = '';
                for(let i = 0; i < listagem.length; i++){
                    tabelaAlunos.innerHTML += `<tr> 
                                                <td scope="row">${listagem[i].id}</td>
                                                <td scope="row">${listagem[i].nome}<td>
                                                <td scope="row">${listagem[i].email}</td>
                                                <td scope="row"><button type="button" class="btn btn-success" onclick="editarAluno(${listagem[i].id})">Editar</button></td>
                                                <td scope="row"><button type="button" class="btn btn-danger" onclick="excluirAluno(${listagem[i].id})">Excluir</button></td>
                                            </tr>`;
                }
        }

        filtrarAlunoByName();
    </script>
</body>
</html>