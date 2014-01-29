<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

require_once '../_classes/Session.class.php';
require_once '../_classes/View.class.php';


if (!Session::getIdUsuario()) {
    header("Location:index.php");
}



$view = new View();
$view->pagina = isset($_GET['pg']) ? $_GET['pg'] : null;

require_once 'views/default.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>..: Projeto Chance :..</title>
<link href="_css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="_scripts/java_script.js"></script>
</head>
	
    <body>
        
        <?php 
        
        $css = '
            style="height: 32px; 
            margin-top:-2px; 
            background: #aaa7a7;"
            '; 
        
        switch ($view->pagina): 
            case "alunos.php":      $style1 = $css; break;            
            case "contatos.php":    $style2 = $css; break;            
            case "depoimentos.php": $style3 = $css; break;             
        endswitch; 
        
        ?>
        
        <div id="tudo">
            <ul>
                <li <?php echo $style1 ?>><a href="default.php?pg=alunos.php">Alunos</a></li>
                <li <?php echo $style2 ?>><a href="default.php?pg=contatos.php">Contatos</a></li>
                <li <?php echo $style3 ?>><a href="default.php?pg=depoimentos.php">Depoimentos</a></li>
<!--                <li><a href="default.php?pg=config.php">Configuraçoes</a></li>-->
            </ul>

            <a href="logout.php" id="logout">Logout</a>
        
            <iframe id="caixa" src="<?php echo $view->pagina ?>" scrolling="auto"></iframe>
        </div>
        
    </body>
</html>
