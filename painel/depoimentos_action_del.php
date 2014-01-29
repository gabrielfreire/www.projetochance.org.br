<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

require_once './classes/DB.class.php';

$id_depoimento = isset($_GET['id']) ? $_GET['id'] : null;


$pdo = DBpdo::connection();
        
$sql = "DELETE FROM depoimentos WHERE id = {$id_depoimento}";
$pdo->query($sql) or die($pdo->error);

header("Location:depoimentos.php");
?>