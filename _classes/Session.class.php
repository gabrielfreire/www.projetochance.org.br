<?php
/*
 * Retorna e seta sessions.
 */

/**
 * Description of Session
 *
 * @author Gabriel
 */
abstract class Session {
    
    static function setIdUsuario($id){        
        $_SESSION['user']['id'] = $id;
    } 
    static function setNomeUsuario($nome){        
        $_SESSION['user']['nome'] = $nome;
    } 
    
    
    static function getIdUsuario(){        
        if (isset($_SESSION['user']['id'])){
            return $_SESSION['user']['id'];
        }
    } 
    static function getNomeUsuario(){        
        if (isset($_SESSION['user']['nome'])){
            return $_SESSION['user']['nome'];
        }
    } 
    
    
    
    
    static function setIdAluno($id){        
        $_SESSION['aluno']['id'] = $id;
    } 
    static function setNomeAluno($nome){        
        $_SESSION['aluno']['nome'] = $nome;
    } 
    static function setEmailAluno($email){        
        $_SESSION['aluno']['email'] = $email;
    } 
    static function setUltimoAcessoAluno($ult_acesso){        
        $_SESSION['aluno']['ultimo_acesso'] = $ult_acesso;
    } 
    
    static function getIdAluno(){        
        if (isset($_SESSION['aluno']['id'])){
            return $_SESSION['aluno']['id'];
        }
    } 
    static function getNomeAluno(){        
        if (isset($_SESSION['aluno']['nome'])){
            return $_SESSION['aluno']['nome'];
        }
    } 
    static function getEmailAluno(){        
        if (isset($_SESSION['aluno']['email'])){
            return $_SESSION['aluno']['email'];
        }
    } 
    static function getUltimoAcessoAluno(){        
        if (isset($_SESSION['aluno']['ultimo_acesso'])){
            return $_SESSION['aluno']['ultimo_acesso'];
        }
    } 
}
?>
