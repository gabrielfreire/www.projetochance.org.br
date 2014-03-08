<?php
/*
 * Fazer login
 */

session_start();
require_once "../classes/Session.class.php";
require_once "../classes/Email.class.php";
require_once "../classes/Aluno.class.php";


$to = $_POST["email"];

$aluno = new Aluno();
$aluno->email = $to;
$email_existe = $aluno->checkEmail();

# 1 = email enviado
# 2 = falha ao enviar
# 3 = email não cadastrado
$status = 0;


if ( $email_existe ) {
    
    $subject = "Redefinir senha do portal";
    $message = "";

    if ( Email::send($to, $message, $subject) ) 
        $status = 1;
    else 
        $status = 2;
    
}
else {
    $status = 3;
}


/**
 * Resposta ajax
 */
echo $status;





