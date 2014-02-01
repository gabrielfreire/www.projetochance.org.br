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
    
    static function setIdAluno($id){        
        $_SESSION['aluno']['id'] = $id;
    } 
    
    static function getIdAluno(){        
        if (isset($_SESSION['aluno']['id'])){
            return $_SESSION['aluno']['id'];
        }
    } 
    
    static function setAlunoLogado($login){        
        $_SESSION['aluno']['login'] = $login;
    } 
    
    static function getAlunoLogado(){        
        if (isset($_SESSION['aluno']['login'])){
            return $_SESSION['aluno']['login'];
        }
    } 
    
}
