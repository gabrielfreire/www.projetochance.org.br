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
    
    static function setNomeAluno($nome){        
        $_SESSION['aluno']['nome'] = $nome;
    } 
    
    static function getNomeAluno(){        
        if (isset($_SESSION['aluno']['nome'])){
            return $_SESSION['aluno']['nome'];
        }
    } 
    
    static function setEmailAluno($email){        
        $_SESSION['aluno']['email'] = $email;
    } 
    
    static function getEmailAluno(){        
        if (isset($_SESSION['aluno']['email'])){
            return $_SESSION['aluno']['email'];
        }
    } 
}
