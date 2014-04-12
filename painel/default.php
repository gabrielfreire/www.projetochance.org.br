<?php
/*
 *
 */

session_start();
require_once './classes/Session.class.php';

if (!Session::getIdUsuario()) {
    header("Location:index.php");
}

$pagina = isset($_GET['pg']) ? $_GET['pg'] : null;
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>..: Projeto Chance :..</title>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </head>

    <body>

        <?php
        $class1 = ( $pagina == "alunos.php" ) ? "active" : null;
        $class2 = ( $pagina == "contatos.php" ) ? "active" : null;
        ?>

        <div id="tudo">
            <ul>
                <li class="<?php echo $class1 ?>"><a href="default.php?pg=alunos.php">Alunos</a></li>
                <li class="<?php echo $class2 ?>"><a href="default.php?pg=contatos.php">Contatos</a></li>
            </ul>

            <a href="logout.php" id="logout">Logout</a>

            <iframe id="frame" src="<?php echo $pagina ?>" scrolling="auto"></iframe>
        </div>

    </body>
</html>
