<?php
/**
 * 
 */
abstract class Auth{
    
    /**
     * 
     */
    static function nao_esta_logado(){
        
        if ( !isset($_SESSION) )	
            header("Location:index");
    }
}
?>