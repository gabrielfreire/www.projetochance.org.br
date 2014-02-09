<?php
/*
 * Fazer logout
 */

session_start();
require_once "../classes/Session.class.php";

session_destroy();