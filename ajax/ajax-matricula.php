<?php
/*
 * Salvar formulário de matrícula
 */

# Aluno
require_once "../classes/Aluno.class.php";


$aluno = new Aluno();
$aluno->nome             = $_POST["nome"];
$aluno->estado_civil     = $_POST["estado-civil"];
$aluno->cep              = $_POST["cep"];
$aluno->endereco         = $_POST["endereco"];
$aluno->numero           = $_POST["numero"];
$aluno->bairro           = $_POST["bairro"];
$aluno->cidade           = $_POST["cidade"];
$aluno->estado           = $_POST["estado"];
$aluno->data_nasc        = $_POST["data-nasc"];
$aluno->rg               = $_POST["rg"];
$aluno->cpf              = $_POST["cpf"];
$aluno->telefone         = $_POST["telefone"];
$aluno->email            = $_POST["email"];
$aluno->senha            = $_POST["senha"];
$aluno->ano_conclusao_em = $_POST["ano-conclusao-em"];
$aluno->ano_prova_enem   = $_POST["ano-prova-enem"];
$aluno->nome_inst        = $_POST["nome-inst"];
$aluno->nome_cursinho    = $_POST["nome-cursinho"];

$aluno->insert();
?>

<blockquote class="box-msg">
    <p>Obrigado por se matricular no Projeto Chance. Aguarde, entraremos em contato!</p>
    <img src="images/logo-original.png" alt="" />
    <p>11 2866-3441<br/>
        <a href="mailto:cursinho@projetochance.org.br">cursinho@projetochance.org.br</a></p>
</blockquote>
