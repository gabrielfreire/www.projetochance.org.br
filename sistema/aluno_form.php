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
require_once '../_classes/View.class.php';
require_once '../_classes/FuncAux.class.php';


if (!Session::getIdUsuario()) {
    header("Location:default.php");
}



/**
 * Receber dados
 */
$recDados         = new ReceberDados();
$recDados->method = ReceberDados::GET;
$id_aluno = $recDados->getVariavel("id");


$recDados->method = ReceberDados::POST;
$recebe_form      = $recDados->getVariavel("bt");

# View
$view = new View();


# Conexao
$mysqli = DB::conectar();


if ($id_aluno && !$recebe_form) {
    $sql  = "SELECT * FROM view_aluno WHERE id = {$id_aluno}";
    
    $view->aluno = $mysqli->query($sql)->fetch_object();  
    
    # Verifica se ja foi visto, se nao foi(status 0) edita para visualizado(status 1)
    if ($view->aluno->status == 0) {
        $sql  = "UPDATE aluno_main SET status = 1 WHERE id = ".$id_aluno;
        $mysqli->query($sql);
    }
}

if ($recebe_form) {
    
    $nome             = $recDados->getVariavel('txt_nome', true);
    $endereco         = $recDados->getVariavel('txt_endereco', true);
    $numero           = $recDados->getVariavel('txt_numero', true);
    $complemento      = $recDados->getVariavel('txt_complemento', true);
    $cep              = $recDados->getVariavel('txt_cep', true);
    $bairro           = $recDados->getVariavel('txt_bairro', true);
    $cidade           = $recDados->getVariavel('txt_cidade', true);
    $estado           = $recDados->getVariavel('txt_estado');
    $data_nascimento  = $recDados->getVariavel('txt_data_nasc', true);
    $rg               = $recDados->getVariavel('txt_rg', true);
    $cpf              = $recDados->getVariavel('txt_cpf', true);
    $estado_civil     = $recDados->getVariavel('txt_estado_civil');
    $telefone         = $recDados->getVariavel('txt_telefone', true);
    $email            = $recDados->getVariavel('txt_email', true);
    $senha            = $recDados->getVariavel('txt_senha', true);

    $ano_conclusao_em = $recDados->getVariavel('txt_ano_conclusao_em');
    $nome_inst        = $recDados->getVariavel('txt_nome_inst', true);
    $nome_cursinho    = $recDados->getVariavel('txt_nome_cursinho', true);
    $ano_prova_enem   = $recDados->getVariavel('txt_ano_prova_enem');
    
    
    $sql  = "UPDATE aluno_comple SET nome = '$nome', endereco = '$endereco', numero='$numero', ";
    $sql .= "complemento='$complemento', cep = '$cep', bairro = '$bairro', cidade='$cidade', ";
    $sql .= "estado='$estado', data_nascimento = '$data_nascimento', rg = '$rg', cpf = '$cpf', ";
    $sql .= "estado_civil = '$estado_civil', telefone = '$telefone', email='$email', senha='$senha' ";
    $sql .= "WHERE id_aluno = ".$id_aluno;

    $mysqli->query($sql);

    $sql  = "UPDATE aluno_pesq SET ano_conclusao_em = '$ano_conclusao_em', nome_inst = '$nome_inst', ";
    $sql .= "nome_cursinho='$nome_cursinho', ano_prova_enem='$ano_prova_enem' ";
    $sql .= "WHERE id_aluno = ".$id_aluno;

    $mysqli->query($sql);
    
    header("Location:alunos.php");
}

$mysqli->close();


require_once 'views/aluno_form.php';
?>