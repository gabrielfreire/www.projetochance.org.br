<?php
/**
 * @version 3.00
 *
 * @package oop
 * @subpackage Banco de Dados
 *
 */

/**
 * Classe respons�vel pela conexão com o banco de dados
 *
 * <code>
 * $mysqli = DB::conectar();
 * var_dump($mysqli); die();
 * unset($mysqli);
 * </code>
 *
 * @package oop
 * @subpackage Conexao
 *
 */
abstract class DB {

    private static $mysqli;

    /**
     * M�todo que retorna a conexão com o SGDB
     * e caso ela não exista ele troca de base(main <-> cliente).
     *
     * Isso significa que se quiser um conexão basta chamar  DB::conectar("nome_da_base_de_dados")
     * E se quiser trocar de base basta chamar  DB::conectar("outra_base_de_dados")
     *
     * @param ConexaoConfig $db
     * @return type
     */
    static function conectar() {
        
        ini_set('default_charset','UTF-8'); // Para o charset das páginas
        
//        mysqli_query("SET NAMES 'utf8'");
//        mysqli_query('SET character_set_connection=utf8');
//        mysqli_query('SET character_set_client=utf8');
//        mysqli_query('SET character_set_results=utf8');

        //LOCALMENTE
        $usuario = "root";
		
        $local   = "localhost";
        //$usuario = "projeorg_root";
        $senha   = "mysql";
	$base 	 = "projeorg_dbase";

        # if n�o h� conex�o...
        if (empty(self::$mysqli)) {
            self::$mysqli = new mysqli($local, $usuario, $senha, $base); # conecta            
            self::$mysqli->set_charset('utf8'); // para a conexão com o MySQL
            
            /* check connection */
            if (mysqli_connect_errno()) {
                printf("Connect failed: %s\n", mysqli_connect_error());
                exit();
            }
            
            //self::$mysqli->set_charset("utf8");
            //var_dump(self::$mysqli->character_set_name());
        } 
     	# Retorna conex�o   

        return self::$mysqli;
	}

   

}# end class



/***********************************************************************************************************************
**                                             Implementa��o                                                          **
***********************************************************************************************************************/

//$mysqli = DB::conectar();
//var_dump($mysqli);die();
//unset($mysqli);
?>
