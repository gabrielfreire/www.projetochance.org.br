<?php
/**
 * Redefinir a senha do aluno
 * Script de origem: r-senha.php
 */

session_start();
require "../classes/Aluno.class.php";

$id_aluno = $_POST["id"];
$senha_nova = $_POST["senha-nova"];


$aluno = new Aluno();
$aluno->id = $id_aluno;
$aluno = $aluno->getObject();

$aluno->senha = sha1($senha_nova);
$aluno->update();

header("Location: http://www.projetochance.org.br/portal.html");