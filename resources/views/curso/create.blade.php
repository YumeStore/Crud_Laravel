<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cadastrar um novo Curso</title>
    <link rel="stylesheet" href="../../css/app.css">
  </head>
  <body>
    <div class="content p-1">
      <div class="list-group-item">
        <div class=" d-flex">
            <div class="mr-auto p2">
              <h2 class="display-4 titulo">Cadastrar Curso</h2>
            </div>    
        </div>
        <form class="" action="{{ route('registrar_curso') }}" method="POST">
        @csrf
        <div class="form-row">
          <div class="form-group  col-md-7">
            <label for="">Nome</label>
            <input type="text" name="nome" class="form-control">
          </div>
          <div class="form-group  col-md-5">  
            <label for="">imagem</label>
            <input type="text" name="imagem" class="form-control"> 
          </div>
          <div class="form-group  col-md-5">  
            <label for="">Conteúdo Programático</label>
            <input type="text" name="conteudo" class="form-control">
          </div>   
           
        </div>
        <input type="submit" class=" btn btn-primary">
      </div>
      
    </div>


  </body>
</html>
