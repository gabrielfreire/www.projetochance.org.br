<?php
/*
 * Realizar consultar de CEP
 * 
 * Referência para busca de cep:
 * http://republicavirtual.com.br/cep/
 * 
 * Exemplo de webservice com retorno xml:
 * http://republicavirtual.com.br/web_cep.php?cep=MEUCEP&formato=xml
 */


# Valor digitado
$cep = isset($_POST["cep"]) ? $_POST["cep"] : null;

# Buscar endereço
$json = file_get_contents("http://republicavirtual.com.br/web_cep.php?cep={$cep}&formato=json");  


/**
 * Resposta ajax
 */
echo $json;
