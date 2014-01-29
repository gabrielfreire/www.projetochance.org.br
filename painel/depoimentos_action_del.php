<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

require_once '../_classes/DB.class.php';

$id_depoimento = isset($_GET['id']) ? $_GET['id'] : null;


$mysqli = DB::conectar();
        
$sql = "DELETE FROM depoimentos WHERE id = {$id_depoimento}";
$mysqli->query($sql) or die($mysqli->error);

header("Location:depoimentos.php");
?>