<?php
/*
 * Fazer logout
 * Script de origem: portal.php
 */

session_start();
require_once "../classes/Session.class.php";

session_destroy();

header("Location: ../portal.html");