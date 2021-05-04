<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cadastrar um novo Aluno</title>
    <link rel="stylesheet" href="../../css/app.css">
  </head>
  <body>
    <div class="content p-1">
      <div class="list-group-item">
        <div class=" d-flex">
            <div class="mr-auto p2">
              <h2 class="display-4 titulo">Cadastrar Aluno</h2>
            </div>    
        </div>
        <form class="" action="{{ route('registrar_aluno') }}" method="POST">
        @csrf
        <div class="form-row">
          <div class="form-group  col-md-7">
            <label for="">Nome</label>
            <input type="text" name="nome" class="form-control">
          </div>
          <div class="form-group  col-md-5">  
            <label for="">email</label>
            <input type="text" name="email" class="form-control"> 
          </div>
          <div class="form-group  col-md-5">  
            <label for="">cpf</label>
            <input type="text" name="cpf" class="form-control">
          </div>   
           
        </div>
        <input type="submit" class=" btn btn-primary">
      </div>
      
    </div>    

  </body>
</html>
