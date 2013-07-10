<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

require_once '../_classes/Session.class.php';
require_once '../_classes/DB.class.php';
require_once '../_classes/ReceberDados.class.php';
require_once '../_classes/HTMLcombo.class.php';
require_once '../_classes/FuncAux.class.php';
require_once '../_classes/View.class.php';


if (!Session::getIdUsuario()) {
    header("Location:default.php");
}



/**
 * Receber dados
 */
$recDados         = new ReceberDados();
$recDados->method = ReceberDados::GET;
$id_contato = $recDados->getVariavel("id");


$recDados->method = ReceberDados::POST;
$recebe_form      = $recDados->getVariavel("bt");

# View
$view = new View();


# Conexao
$mysqli = DB::conectar();


if ($id_contato && !$recebe_form) {
    $sql  = "SELECT * FROM contatos WHERE id = {$id_contato}";
    
    $view->contato = $mysqli->query($sql)->fetch_object();    
    
    # Verifica se ja foi visto, se nao foi(status 0) edita para visualizado(status 1)
    if ($view->contato->status == 0) {
        $sql  = "UPDATE contatos SET status = 1 WHERE id = ".$id_contato;
        $mysqli->query($sql);
    }
}

if ($recebe_form) {

    $nome     = $recDados->getVariavel('txt_nome', true);
    $email    = $recDados->getVariavel('txt_email', true);
    $assunto  = $recDados->getVariavel('txt_assunto', true);
    $mensagem = $recDados->getVariavel('txt_msg', true);
    
    
    $sql  = "UPDATE contatos SET nome = '$nome', email = '$email', assunto='$assunto', ";
    $sql .= "mensagem = '$mensagem' ";
    $sql .= "WHERE id = ".$id_contato;

    $mysqli->query($sql);

    header("Location:contatos.php");
}

$mysqli->close();


require_once 'views/contato_form.php';
?>