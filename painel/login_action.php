<?php

/*
 * Açoes do login.
 */
session_start();

require_once './classes/Session.class.php';
require_once './classes/DBpdo.class.php';

$login = isset($_POST['login']) ? $_POST['login'] : null;
$senha = isset($_POST['senha'])  ? $_POST['senha'] : null;

$pdo = DBpdo::connection();

$stmte = $pdo->prepare("SELECT * FROM usuario WHERE email = ? && senha = ? LIMIT 1");
$stmte->bindParam(1,  $login, PDO::PARAM_STR);
$stmte->bindParam(2,  $senha, PDO::PARAM_STR);
$stmte->execute();

# salvar objeto
$usuario = $stmte->fetch(PDO::FETCH_OBJ);

if ( $usuario ) {    
    Session::setIdUsuario($usuario->id);
    Session::setNomeUsuario($usuario->nome);

    header("Location:default.php");
}
else{
    
    header("Location:login.php?erro=1");
}
