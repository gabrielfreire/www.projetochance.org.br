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
class Depoimento {
    
    public $id;             # int(11)
    public $id_aluno;       # int(11)
    public $data;           # varchar(20)
    public $mensagem;       # text
    
    
    public function getObjects() {
        $pdo = DBpdo::connection();
        $sql = $pdo->query("SELECT * FROM depoimento a JOIN aluno b ON a.id_aluno = b.id");
        
        return $sql->fetchAll(PDO::FETCH_OBJ);
    }
    
    public function getTotalRegistros() {
        $pdo = DBpdo::connection();
        $sql = $pdo->query("SELECT COUNT(*) as total FROM depoimento");
        
        return $sql->fetch(PDO::FETCH_OBJ)->total;
    }
    
    public function insert() {        
        $pdo = DBpdo::connection();
        $stmte = $pdo->prepare("INSERT INTO depoimento "
                . "(id_aluno, data, mensagem) VALUES(?, ?, ?)");

        $stmte->bindParam(1,  $this->id_aluno, PDO::PARAM_INT);
        $stmte->bindParam(2,  $this->data, PDO::PARAM_STR);
        $stmte->bindParam(3,  $this->mensagem, PDO::PARAM_STR);      
        $stmte->execute();
    }
    
    public function update() {
        $pdo = DBpdo::connection();
        $stmte = $pdo->prepare("UPDATE depoimento SET "
                . "id_aluno=?, mensagem=? WHERE id = ?");

        $stmte->bindParam(1,  $this->id_aluno, PDO::PARAM_INT);
        $stmte->bindParam(2,  $this->mensagem, PDO::PARAM_STR);      
        $stmte->bindParam(3,  $this->id, PDO::PARAM_INT);      
        $stmte->execute();
    }
    
    public function delete() {
        $pdo = DBpdo::connection();
        $stmte = $pdo->prepare("DELETE FROM depoimento WHERE id = ? LIMIT 1");
        
        $stmte->bindParam(1, $this->id, PDO::PARAM_INT);        
        $stmte->execute();
    }
    
}
