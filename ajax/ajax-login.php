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
$login = $aluno->login();


if ( $login === false ) {
    
    echo "false";
}
else {
    Session::setAlunoLogado(true);
    Session::setIdAluno($login->id);
    
    echo "true";
}