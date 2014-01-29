<?php

/*
 * Açoes do login.
 */
session_start();

require_once '../_classes/Session.class.php';
require_once '../_classes/DB.class.php';

$login = isset($_POST['txt_login']) ? $_POST['txt_login'] : null;
$senha = isset($_POST['txt_senha']) ? $_POST['txt_senha'] : null;

$mysqli = DB::conectar();

$sql = "SELECT * FROM usuarios WHERE login = '{$login}' && senha = '{$senha}' LIMIT 1";
$user = $mysqli->query($sql);

if ( $user->num_rows ) {
    
    $user = $user->fetch_object();

    Session::setIdUsuario($user->id);
    Session::setNomeUsuario($user->nome);

    header("Location:default.php");
}
else{
    
    if ($mysqli->errno) {
        echo $mysqli->errno." - ".$mysqli->error;
    }
    else{
        header("Location:login.php?erro=1");
    }
}

$mysqli->close();
?>
