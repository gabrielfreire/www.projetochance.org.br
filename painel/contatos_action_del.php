<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

require_once './classes/DB.class.php';

$id_contato = isset($_GET['id']) ? $_GET['id'] : null;


$pdo = DBpdo::connection();

$sql = "DELETE FROM contatos WHERE id = {$id_contato}";
$pdo->query($sql) or die($pdo->error);

header("Location:contatos.php");
?>