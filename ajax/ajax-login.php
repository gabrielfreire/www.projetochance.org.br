<?php
/*
 * Fazer login
 */

session_start();
require_once "../classes/Session.class.php";
require_once "../classes/Aluno.class.php";


$aluno = new Aluno();
$aluno->email = $_POST["email"];
$aluno->senha = $_POST["senha"];
$logado = $aluno->login();


if ( $logado === false ) {
    
    echo "false";
}
else {
    Session::setIdAluno($logado->id);
    Session::setNomeAluno($logado->nome);
    Session::setEmailAluno($logado->email);
    
    echo "true";
}