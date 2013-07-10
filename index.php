<?php 
/**
 * Página principal
 */
session_start();

require "_classes/DB.class.php";
require "_classes/FuncAux.class.php";
require "_classes/Session.class.php";
require "_classes/View.class.php";

# View
require_once "views/index.php";
?>