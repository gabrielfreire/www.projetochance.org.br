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
$aluno_existente = $aluno->checkEmail();

# 1 = email enviado
# 2 = falha ao enviar
# 3 = email não cadastrado
$status = 0;


if ( $aluno_existente ) {
    
    $id = $aluno_existente->id;  
    $email_hash = sha1($to);
    $id_aluno_hash = $id+11;
    
    $token = $email_hash . "$." . $id_aluno_hash;    
    $link = "http://www.projetochance.org.br/r-senha.html?t=".$token;
    
    $subject = "Redefinir senha do portal";
    $message = "<p>Olá $aluno_existente->nome</p>"
             . "<p>Clique no link para redefinir sua senha: <a href='$link' target='_blank'>$link</a></p>"
             . "<p>Atenciosamente,<br/>Equipe Projeto Chance</p>";

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





