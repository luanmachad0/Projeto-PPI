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
      <li class="nav-item active">
        <a class="nav-link" href="curso.php">Cursos <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="disciplina.php">Disciplina</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="diario.php">Diário</a>
      </li>
    </ul>
  </div>
  </nav>
  <div class="container mt-4"> 
      <div class="row">
          <div class="col-sm">
            <form action ="disciplina.php" method="post">
                <div class="form-group">
                  <label for="exampleInputEmail1">Cadastrar Disciplina</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Insira a Disciplina" name="disciplina" id="disciplina">
                  
                </div>
                <div class="form-group form-check">
                  <input type="checkbox" class="form-check-input" id="exampleCheck1">
                  <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <button type="submit" class="btn btn-primary" id="cadastrar" name="cadastrar">Cadastrar</button>
                <button type="submit" class="btn btn-primary" id="listar" name="listar">Listar Disciplina</button>
              </form>
              
          </div>
      </div>
  </div>
  <?php



if(isset($_POST['cadastrar'])){
  $tags = file_get_contents('disciplina.txt');
  $tagsArray = explode(',', $tags);
  $termo = $_POST['disciplina'];
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
    echo '<script>alert("Disciplina já cadastrada ou Campo Nulo!");</script>';
  }  else {
    $arq   = fopen("disciplina.txt", "a+");
    $curso = $_POST['disciplina'];
    fputs($arq,$curso . ",");
    echo '<script>alert("Disciplina cadastrada com sucesso!");</script>';
    fclose($arq);
  }
}

if (isset($_POST['listar']))
  {
    $arq = fopen("disciplina.txt", "r");
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