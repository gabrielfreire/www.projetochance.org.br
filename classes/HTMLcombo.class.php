<?php

/**
 *
 */
/*
 * <code>
 * # Implemetação
 * $arrCombo = array(); # popular a combo antes
 * $combo = new HTMLcombo();
 * $combo->valor_selecionado = 3;
 *
 * # tag select
 * echo $combo->getOptions($arrCombo);
 * # tag /select
 * </code>
 */
class HTMLcombo {

    public $valor_selecionado;

    /*
     * Método principal.
     * Retornar opções HTML da tag select.
     */
    function getOptions($arrCombo = array()) {

        $options = "";

        foreach ($arrCombo as $value) {
            $selected = "";

            if ($this->valor_selecionado == $value)
                $selected = "selected=\"selected\"";

            $options .= "\n\t<option value=\"$value\" $selected>$value</option>";
        }

        return $options;
    }

    static function estados() {
        $arrEstado = array();
        
        $arrEstado[] = "";
        $arrEstado[] = "AC - Acre";
        $arrEstado[] = "AL - Alagoas";
        $arrEstado[] = "AP - Amapá";
        $arrEstado[] = "AM - Amazonas";
        $arrEstado[] = "BA - Bahia";
        $arrEstado[] = "CE - Ceará";
        $arrEstado[] = "DF - Distrito Federal";
        $arrEstado[] = "ES - Espírito Santo";
        $arrEstado[] = "GO - Goiás";
        $arrEstado[] = "MA - Maranhão";
        $arrEstado[] = "MT - Mato Grosso";
        $arrEstado[] = "MS - Mato Grosso do Sul";
        $arrEstado[] = "MG - Minas Gerais";
        $arrEstado[] = "PA - Pará";
        $arrEstado[] = "PB - Paraíba";
        $arrEstado[] = "PR - Paraná";
        $arrEstado[] = "PE - Pernambuco";
        $arrEstado[] = "PI - Piauí";
        $arrEstado[] = "RJ - Rio de Janeiro";
        $arrEstado[] = "RN - Rio Grande do Norte";
        $arrEstado[] = "RS - Rio Grande do Sul";
        $arrEstado[] = "RO - Rondônia";
        $arrEstado[] = "RR - Roraima";
        $arrEstado[] = "SC - Santa Catarina";
        $arrEstado[] = "SP - São Paulo";
        $arrEstado[] = "SE - Sergipe";
        $arrEstado[] = "TO - Tocantins";

        return $arrEstado;
    }

    static function estados_civis() {
        $arrEstadoCivil = array();
                
        $arrEstadoCivil[] = "";
        $arrEstadoCivil[] = "Casado(a)";
        $arrEstadoCivil[] = "Solteiro(a)";
        $arrEstadoCivil[] = "Divorciado(a)";
        $arrEstadoCivil[] = "Viúvo(a)";

        return $arrEstadoCivil;
    }

    static function anos_prova_enem() {
        $arrAno = array();
        
        date_default_timezone_set('America/Sao_Paulo');

        $n = ((int) date("Y")) - 1990;
        $arrAno[] = "";

        while ($n >= 0) {
            $arrAno[] = date("Y") - $n;
            $n--;
        }

        return $arrAno;
    }

    static function anos_ensino_medio() {
        $arrAno = array();
        
        date_default_timezone_set('America/Sao_Paulo');

        # Iniciando ano em 1998 e terminando 3 anos após o atual.
        $n = ((int) date("Y")) - 1995;
        $arrAno[] = "";

        while ($n >= 0) {
            $arrAno[] = (date("Y") + 3) - $n;
            $n--;
        }

        return $arrAno;
    }

}
