<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap links CDN-->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Escola</title>
</head>
<body>
<style type="text/css">
  
    ul li ul.dropdown{
        min-width: 100%; /* Set width of the dropdown */
        background: #f2f2f2;
        display: none;
        position: absolute;
        z-index: 999;
        left: 0;
    }
    ul li:hover ul.dropdown{
        display: block; /* Display the dropdown */
    }
    ul li ul.dropdown li{
        display: block;
    }

    a.linkdois:link {
      text-decoration:none;
  color:blue;
}
a.linkdois:visited {
  text-decoration:none;

}
a.linkdois:hover {
  color:#4169E1;
  text-decoration:none;
}
a.linkdois:active {
 
  text-decoration:none;
 
}
</style>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <nav class="navbar navbar-dark bg-primary">
    <a class="navbar-brand" href="#">Menu</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="curso.php">Cursos <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="disciplina.php">Disciplina</a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="diario.php">Diário</a>
        <ul class="dropdown">
                <li><a class="linkdois" href="#">Cadastrar Diário</a></li>
                <li><a class="linkdois" href="#">Cadastrar Notas</a></li>
                <li><a class="linkdois" href="#">Cadastrar Conteúdo</a></li>
        </ul>
      </li>
    </ul>
  </div>
  </nav>
  <div class="container mt-4"> 
      <div class="row">
          <div class="col-sm">
            <form action ="curso.php" method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Cadastrar Curso</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Insira o Curso" name="curso" id="curso">
                  
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary" id="cadastrar" name="cadastrar">Cadastrar</button>
                <button type="submit" class="btn btn-primary" id="listar" name="listar">Listar Cursos</button>
              </form>
              
          </div>
      </div>
  </div>
  
<?php



if(isset($_POST['cadastrar'])){
  $tags = file_get_contents('teste.txt');
  $tagsArray = explode(',', $tags);
  $termo = $_POST['curso'];
  $countVazio = 0;
  $count = 0;
  foreach ($tagsArray as $tag) {
    if ($tag == $termo) {
      $count++;
    }
  }

  foreach ($tagsArray as $tag) {
    $tagsArray = trim( strip_tags( $tag ) );
    if ( empty ( $tag ) ) {
      $erro = 'Existem campos em branco.';
  }
  }
  
  if ($count > 0) {
    echo '<script>alert("Curso já cadastrado ou Campo Nulo!");</script>';
  }  else {
    $arq   = fopen("teste.txt", "a+");
    $curso = $_POST['curso'];
    fputs($arq,$curso . ",");
    echo '<script>alert("Curso cadastrado com sucesso!");</script>';
    fclose($arq);
  }
}

if (isset($_POST['listar']))
  {
    $arq = fopen("teste.txt", "r");
    while (!feof($arq))
      {
        $texto = fgets($arq);
        $textocerto = ($texto);
        //corta a informação do arquivo em cada ; que encontrar, ou seja, separa as informações
        //a variável dados se torna um array e em cada posição estará um valor do arquivo
        // no nosso exemplo vai separar o nome, a idade e o email
        $dados = explode(",",$textocerto);
        foreach ($dados as $chave => $valor)
          {
            
            echo "<br>".(trim($valor));
          }
        
      }
  }
?>
 
</body>
</html>
