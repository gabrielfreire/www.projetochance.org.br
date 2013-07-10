<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

require_once '../_classes/Session.class.php';
require_once '../_classes/View.class.php';


if (!Session::getIdUsuario()) {
    header("Location:index.php");
}



$view = new View();
$view->pagina = isset($_GET['pg']) ? $_GET['pg'] : null;

require_once 'views/default.php';
?>