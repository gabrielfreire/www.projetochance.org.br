<?php
/*
 * Salvar formulário de contato
 */

require_once "../classes/Contato.class.php";

# Timezone para data
date_default_timezone_set('America/Sao_Paulo');

$aluno = new Contato();
$aluno->data     = date("d/m/Y - H:i");
$aluno->nome     = $_POST["nome"];
$aluno->telefone = $_POST["telefone"];
$aluno->email    = $_POST["email"];
$aluno->assunto  = $_POST["assunto"];
$aluno->mensagem = $_POST["mensagem"];
$aluno->insert();
?>

<blockquote class="box-msg">
    <p>Agradecemos o seu contato. Em breve retornaremos!</p>
    <img src="images/logo-original.png" alt="" />
    <p>11 2866-3441<br/>
        <a href="mailto:cursinho@projetochance.org.br">cursinho@projetochance.org.br</a></p>
</blockquote>
