<?php

class ReceberDados {

    public $method;

    const GET = "GET";
    const POST = "POST";
    const REQUEST = "REQUEST";
    const COOKIE = "COOKIE";
    const SESSION = "SESSION";

    function valor($valor) {
        $dado = isset($valor) ? $valor : "";
        return $dado;
    }

    function tratar($valor = NULL) {
        if ($valor) {
            $valor = trim(addslashes(htmlentities($valor)));
        }
        return $valor;
    }

    public function getVariavel($param_form, $tratar = false, $opcional = null) {

        switch ($this->method) {
            case self::GET :
                $valor = isset($_GET[$param_form]) ? $_GET[$param_form] : $opcional;
                break;
            case self::POST :
                $valor = isset($_POST[$param_form]) ? $_POST[$param_form] : $opcional;
                break;
            case self::REQUEST :
                $valor = isset($_REQUEST[$param_form]) ? $_REQUEST[$param_form] : $opcional;
                break;
            case self::COOKIE:
                $valor = isset($_COOKIE[$param_form]) ? $_COOKIE[$param_form] : $opcional;
                break;
            case self::SESSION:
                $valor = isset($_SESSION[$param_form]) ? $_SESSION[$param_form] : $opcional;
                break;
        }

        # Tratar os dados
        if ($valor && $tratar)
            $valor = trim($valor);

        return $valor;
    }

}

?>