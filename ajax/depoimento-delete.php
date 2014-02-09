<?php
/*
 * Excluir mensagem de depoimento
 */
session_start();
require_once "../classes/Depoimento.class.php";

$idDepo = isset( $_POST["id"] ) ? $_POST["id"] : null;

$depoimento = new Depoimento();
$depoimento->id = $idDepo;
$depoimento->delete();
