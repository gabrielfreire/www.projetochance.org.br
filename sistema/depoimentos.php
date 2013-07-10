<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

require_once '../_classes/Session.class.php';
require_once '../_classes/DB.class.php';
require_once '../_classes/View.class.php';


if (!Session::getIdUsuario()) {
    header("Location:default.php");
}



$view = new View();

# Busca
$busca = isset($_POST['bt_busca']) ? $_POST['bt_busca'] : null;

# Conexao
$mysqli = DB::conectar();

/**
 * Paginacao
 */
$limite = 11;
$pagina = isset($_GET['pag']) ? $_GET['pag'] : 1;

$inicio = ($pagina * $limite) - $limite;


if ($busca) {    
    $nome  = $_POST['txt_nome'];
    $email = $_POST['txt_email'];
    $data  = $_POST['txt_data'];
    
    $sql = "SELECT * FROM depoimentos WHERE nome LIKE '%{$nome}%' AND email LIKE '%{$email}%' AND data LIKE '%{$data}%'";
    $view->depoimento = $mysqli->query($sql);
}
else{
    $sql = "SELECT * FROM depoimentos ORDER BY id DESC LIMIT {$inicio}, {$limite}";
    $view->depoimento = $mysqli->query($sql);
    
    $sql = "SELECT id FROM depoimentos";
    $total = $mysqli->query($sql)->num_rows;
    
    $view->total_paginas = ceil($total/$limite);
    $view->pagina = $pagina;
}


require_once 'views/depoimentos.php';
?>