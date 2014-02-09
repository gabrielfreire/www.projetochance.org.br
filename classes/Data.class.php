<?php

/*
 * Classe Data
 */

/**
 *
 * @author gabriel
 */
class Data {

    static function getDia() {
        date_default_timezone_set('America/Sao_Paulo');

        return date("d");
    }

    static function getMes() {
        date_default_timezone_set('America/Sao_Paulo');

        $mes["01"] = "janeiro";
        $mes["02"] = "fevereiro";
        $mes["03"] = "março";
        $mes["04"] = "abril";
        $mes["05"] = "maio";
        $mes["06"] = "junho";
        $mes["07"] = "julho";
        $mes["08"] = "agosto";
        $mes["09"] = "setembro";
        $mes["10"] = "outubro";
        $mes["11"] = "novembro";
        $mes["12"] = "dezembro";

        return $mes[date("m")];
    }

    static function getAno() {
        date_default_timezone_set('America/Sao_Paulo');

        return date("Y");
    }

    static function getDiaSemana() {
        date_default_timezone_set('America/Sao_Paulo');

        $semana["0"] = "domingo";
        $semana["1"] = "segunda-feira";
        $semana["2"] = "terça-feira";
        $semana["3"] = "quarta-feira";
        $semana["4"] = "quinta-feira";
        $semana["5"] = "sexta-feira";
        $semana["6"] = "sábado";

        return $semana[date("w")];
    }

    static function getSaudacao() {
        date_default_timezone_set('America/Sao_Paulo');

        $hora = (integer) date("H");

        switch ($hora) {
            case $hora >= 04 && $hora < 12:
                $saudacao = "Boa dia";
                break;
            case $hora >= 12 && $hora <= 18:
                $saudacao = "Boa tarde";
                break;
            case $hora > 18 && $hora <= 23:
                $saudacao = "Boa noite";
                break;
            case $hora >= 00 && $hora < 04:
                $saudacao = "Boa noite";
                break;
        }
        return $saudacao;
    }

}
