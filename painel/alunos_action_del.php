<?php

/*
 * 
 */
session_start();

require_once './classes/DBpdo.class.php';

$id_aluno = isset($_GET['id']) ? $_GET['id'] : null;


$pdo = DBpdo::connection();
        
$stmte = $pdo->prepare("DELETE FROM aluno WHERE id = ?");
$stmte->bindParam(1, $id_aluno,  PDO::PARAM_INT);
$stmte->execute();

header("Location:alunos.php");
