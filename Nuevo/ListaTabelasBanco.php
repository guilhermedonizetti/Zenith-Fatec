<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/css.css">
   
    <title>Bem-Vindo</title>
  </head>

<style type="text/css">
    #erro {
        color: #FF0000;
    }
</style>

  <body id="fundo">
    <div class="card" id="telaConexao">
        <?php
            try
            {
                $database=$_POST["database"];
                $root=$_POST["user"];
                $password=$_POST["password"];
                $tempo = $_POST["time"];
            }
            catch(Exception $e)
            {
                exit();
            }

            try
            {
                $conn = new PDO('mysql:host=localhost;dbname='.$database.';',$root,$password);


                $dados=$conn->query("SHOW TABLES");
                $botao="<input type='button' id='botao' class='btn btn-xs btn-primary' value='Analisar'>";

                foreach($dados as $linha)
                {
                    $url = base64_encode("$database|$password|$root|$linha[0]|$tempo");
                    //echo "&nbsp;<center>" . $linha[0]. "</center><center><a href='../ProjetoAcelera/View/view.php?view=$url'>". $botao, "</a></center><br><hr>";
                    echo "&nbsp;<center>" . $linha[0]. "</center><center><a href='camposTabela.php?view=$url'>". $botao, "</a></center><br><hr>"; 
                }
            }
            catch(Exception $e)
            {
                echo "<center>
                <p><b><span id='erro'>Erro!</span></b><br>
                Revise os dados informados para server, user, password e database. Um ou alguns deles está incorreto.<br>
                <b>Resultado: </b>base de dados ou tabela não encontrada.</p>
                </center>";
            }
        ?>
          

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


</body>
</html>