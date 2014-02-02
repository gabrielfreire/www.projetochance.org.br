<?php

/*
 * Sessions
 * Getters e setters
 */

/**
 *
 * @author Gabriel
 */
abstract class Session {
    
    static function setIdUsuario($id){        
        $_SESSION['user']['id'] = $id;
    } 
    
    static function getIdUsuario(){        
        if (isset($_SESSION['user']['id'])){
            return $_SESSION['user']['id'];
        }
    } 
    
    static function setNomeUsuario($nome){        
        $_SESSION['user']['nome'] = $nome;
    } 

    static function getNomeUsuario(){        
        if (isset($_SESSION['user']['nome'])){
            return $_SESSION['user']['nome'];
        }
    } 
}
