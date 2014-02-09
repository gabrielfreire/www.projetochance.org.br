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
$aluno = $aluno->login();


if ( $aluno === false ) {
    
    echo "false";
}
else {
    Session::setAlunoLogado(true);
    Session::setIdAluno($aluno->id);
    Session::setUltimoAcessoAluno($aluno->ultimo_acesso);
    
    # Timezone para data
    date_default_timezone_set('America/Sao_Paulo');

    $aluno->ultimo_acesso = date("d/m/Y - H:i");
    $aluno->update();
    
    echo "true";
}