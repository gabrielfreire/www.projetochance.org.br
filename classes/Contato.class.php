<?php

/*
 * Classe Aluno
 */

# Conexão
require_once __DIR__ . "/DBpdo.class.php";

/**
 * 
 *
 * @author gabriel
 */
class Contato {
    
    public $id;          # int(11)
    public $data;        # varchar(20)
    public $nome;        # varchar(200)
    public $telefone;    # varchar(15)
    public $email;       # varchar(200)
    public $assunto;     # varchar(200)
    public $mensagem;    # text
    
    
    public function insert() {
        
        $pdo = DBpdo::connection();
        $stmte = $pdo->prepare("INSERT INTO contato "
                . "(data, nome, telefone, email, assunto, mensagem) VALUES(?, ?, ?, ?, ?, ?)");

        $stmte->bindParam(1, $this->data, PDO::PARAM_STR);
        $stmte->bindParam(2, $this->nome, PDO::PARAM_STR);
        $stmte->bindParam(3, $this->telefone, PDO::PARAM_STR);
        $stmte->bindParam(4, $this->email, PDO::PARAM_STR);
        $stmte->bindParam(5, $this->assunto, PDO::PARAM_STR);
        $stmte->bindParam(6, $this->mensagem, PDO::PARAM_STR);        
        $stmte->execute();
    }
    
    public function update() {
        # Não há edição no contato!
    }
    
    public function delete() {
        $pdo = DBpdo::connection();
        $stmte = $pdo->prepare("DELETE FROM contato WHERE id = ? LIMIT 1");
        
        $stmte->bindParam(1, $this->id, PDO::PARAM_INT);        
        $stmte->execute();
    }
    
}
