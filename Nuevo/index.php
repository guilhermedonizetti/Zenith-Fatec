<?php
  //CONFERIR A CONEXÃO DO USUÁRIO COM A INTERNET
  if(@(!$sock = fsockopen('www.google.com.br',80,$num,$error,5))) //se não estiver conectado
  {
    echo "
          <meta charset='UTF-8'>
            <script type=\"text/javascript\">
            alert(\"Você está offline. Algumas funções podem falhar, ex.: layout e visualização pelo celular.\");
          </script>
        ";
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="icon" href="img/icon-na.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/css.css">
    <link rel="stylesheet" href="css/nav.css">
   
    <title>ZENITH | Bem-Vindo</title>

    <link rel="icon" 
    type="image/jpg" 
    href="/img/icon-na.png" />
  </head>
  <body id="fundo">
    <nav class="menu">
      <ul class="menu-list">
        <li><a href="#"><img width="120px" height="50px" src="img/logo.png" alt="Zenith"></a></li>
        <li>
          <a href="dashboard.php?pagina=pagina">Dashboard</a>
        </li>
        <li>
          <a href="dev.html">Desenvolvedores</a>
        </li>
      </ul>
    </nav>

    <div class="card" id="telaConexao">
        <div class="card-body">
            <form  method="POST" action="ListaTabelasBanco.php">
                <div class="form-group">
                    <center>   <label >Conecte ao seu Banco de Dados</label></center>
                  <input type="text" class="form-control" name="server" value="localhost" placeholder="Server">
                </div>

                <div class="form-group"> 
                    <input type="text" class="form-control" name="user" placeholder="User" required="">
                  </div>

                <div class="form-group">        
                  <input type="password" class="form-control" name="password" placeholder="Password">
                </div>

                <div class="form-group"> 
                    <input type="text" class="form-control" name="database" placeholder="DataBase" required="">
                </div>

                <div class="form-group"> 
                    <input type="number" class="form-control" name="time" placeholder="Refresh time: 10">
                </div>
                
                <button type="submit" class="btn btn-primary btn-block">Conecte</button>
              </form>
        </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>