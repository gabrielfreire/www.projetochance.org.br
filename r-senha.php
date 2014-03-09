<?php

session_start();
require "./classes/DBpdo.class.php";
require "./classes/Aluno.class.php";

$token = isset($_GET["t"]) ? $_GET["t"] : null;

$aluno = new Aluno();
$acesso_permitido = $aluno->checkHash_redefinirSenha($token);

if ($acesso_permitido === false) {
    die("<code>Acesso inválido</code>");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>.:: Projeto Chance ::.</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        
        <link rel="stylesheet" type="text/css" href="css/style.css" /> 
    </head>
    
    <body>        
        <a href="http://www.projetochance.org.br">
            <img src="./images/logo-original.png" alt="Logotipo" title="Projeto Chance" id="logo" />
        </a>

        <div id="box-r-senha">
            <form action="action/redefinir-senha.php" method="post">
                <input type="hidden" name="id" value="<?php echo $aluno->id ?>" />
                <input type="password" name="senha-nova" class="text text-xlarge" />
                <input type="submit" value="Redefinir senha" class="btn" />
            </form>
        </div>
    </body>
</html>



