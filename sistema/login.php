<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

require_once '../_classes/View.class.php';


$view = new View();
$view->erro = isset($_GET['erro']) ? $_GET['erro'] : null;

require_once 'views/login.php';
?>
