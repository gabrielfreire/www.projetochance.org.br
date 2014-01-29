<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

require_once '../_classes/DB.class.php';

$id_aluno = isset($_GET['id']) ? $_GET['id'] : null;


$mysqli = DB::conectar();
        
$sql = "DELETE FROM aluno_main WHERE id = {$id_aluno}";
$mysqli->query($sql) or die($mysqli->error);

header("Location:alunos.php");
?>