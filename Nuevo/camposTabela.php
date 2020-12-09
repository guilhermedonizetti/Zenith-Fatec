<?php

$url = base64_decode($_GET["view"]); //obtem os dados de conexao cifrados no Base64 e decodifica
$dados = $_GET["view"]; //obtem os dados de conexao cifrados no Base64 e os mantem assim
$url = explode("|", $url); //Ordem: [0] NomeBD - [1] SenhaBD - [2] UsuarioBD - [3] Tabela - [4] TimeToRefresh
$database = $url[0]; //recebe o nome do banco
$password = $url[1]; //recebe a senha do banco
$user = $url[2]; //recebe o usuario do banco
$table = $url[3]; //recebe o nome da tabela
$x = 0; //contador de posicao do array
$botao="<input type='button' id='botao' class='btn btn-xs btn-primary' value='Analisar'>"; //criar botao

try {
    $pdo = new PDO("mysql:dbname=" . $database . "; host=localhost", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "DESCRIBE $table";
    $resultado = $pdo->query($sql);
    while($linha = $resultado->fetch(PDO::FETCH_ASSOC))
    {
      $colunas[$x] = $linha["Field"]; //alimenta a lista de chaves
      $tipos[$x] = $linha["Type"]; //alimenta a lista de valores
      $x = $x + 1; //incrementa a posição da lista
    }

} catch (PDOException $ex) {
    echo "ERRO! Detalhes: " . $ex->getMessage();
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/css.css">
   
    <title>Zenith</title>
  </head>

<style type="text/css">
  #texto {
    font-size: 15px;
  }
</style>

  <body id="fundo">
    <div class="card" id="telaConexao">
        <div class="card-body">
          <?php
          echo '
            <form  method="GET" action="../ProjetoAcelera/View/view.php">
                <div class="form-group">
                    <center>
                        Tabela <b>'.$table.'</b>
                    </center>

                    <p id="texto">Abaixo estão as colunas de sua tabela e os seus tipos. Digite qual deve estar no eixo X e qual no eixo Y.</p>
                    <p id="texto">
                    ';
                        for($i = 0; $i < count($colunas); $i++)
                        {
                          echo "<b>Coluna: $colunas[$i]</b> - $tipos[$i]<br>";
                        }
                        echo '
                    </p>

                  <input type="text" class="form-control" name="eixoX" placeholder="Eixo X" required="">
                </div>

                <div class="form-group"> 
                    <input type="text" class="form-control" name="eixoY" placeholder="Eixo Y">
                  </div>

                <div class="form-group">
                  <p id="texto"><input type="checkbox" name="acumular" value="S">&nbsp;Acumular dados</p>
                </div>

                  <input type="hidden" class="form-control" name="view" value="'.$dados.'">
                </div>
                
                <button type="submit" class="btn btn-primary btn-block">Conecte</button>
              </form>
              ';
              ?>
        </div>
      </div>

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  </body>
</html>