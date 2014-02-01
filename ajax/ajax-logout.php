<?php
/*
 * Fazer logout
 */

session_start();
require_once "../classes/Session.class.php";

$_SESSION['aluno'] = null;