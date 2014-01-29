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

    static function estado($sigla = array()) {
        $sigla[] = "";
        $sigla[] = "Acre";
        $sigla[] = "Alagoas";
        $sigla[] = "Amapá";
        $sigla[] = "Amazonas";
        $sigla[] = "Bahia";
        $sigla[] = "Ceará";
        $sigla[] = "Distrito Federal";
        $sigla[] = "Espírito Santo";
        $sigla[] = "Goiás";
        $sigla[] = "Maranhão";
        $sigla[] = "Mato Grosso";
        $sigla[] = "Mato Grosso do Sul";
        $sigla[] = "Minas Gerais";
        $sigla[] = "Pará";
        $sigla[] = "Paraíba";
        $sigla[] = "Paraná";
        $sigla[] = "Pernambuco";
        $sigla[] = "Piauí";
        $sigla[] = "Rio de Janeiro";
        $sigla[] = "Rio Grande do Norte";
        $sigla[] = "Rio Grande do Sul";
        $sigla[] = "Rondônia";
        $sigla[] = "Roraima";
        $sigla[] = "Santa Catarina";
        $sigla[] = "São Paulo";
        $sigla[] = "Sergipe";
        $sigla[] = "Tocantins";

        return $sigla;
    }

    static function estado_civil($situacao = array()) {
        $situacao[] = "";
        $situacao[] = "Casado(a)";
        $situacao[] = "Solteiro(a)";
        $situacao[] = "Divorciado(a)";
        $situacao[] = "Viúvo(a)";

        return $situacao;
    }

    static function ano($ano = array()) {
        date_default_timezone_set('America/Sao_Paulo');

        $n = ((int) date("Y")) - 1990;
        $ano[] = "";

        while ($n >= 0) {
            $ano[] = date("Y") - $n;
            $n--;
        }

        return $ano;
    }

    static function ano_enem($ano = array()) {
        date_default_timezone_set('America/Sao_Paulo');

        # Iniciando ano em 1998 e terminando 3 anos após o atual.
        $n = ((int) date("Y")) - 1995;
        $ano[] = "";

        while ($n >= 0) {
            $ano[] = (date("Y") + 3) - $n;
            $n--;
        }

        return $ano;
    }

    static function afirmacao($afirmacao = array()) {
        $afirmacao[] = "";
        $afirmacao[] = "Sim";
        $afirmacao[] = "Não";

        return $afirmacao;
    }

}
