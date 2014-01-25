<?php

/* 
 * Consultar CEP
 */

# Valor digitado
$cep = isset($_POST["cep"]) ? $_POST["cep"] : null;

# Buscar endereço
$json = file_get_contents("http://republicavirtual.com.br/web_cep.php?cep={$cep}&formato=json");  


/**
 * Resposta ajax
 */
echo $json;
