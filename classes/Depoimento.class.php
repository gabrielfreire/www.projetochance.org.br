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

    public function getObject() {
        $pdo = DBpdo::connection();
        $sql = $pdo->prepare("SELECT *, a.data AS data_depo FROM depoimento a JOIN aluno b "
                . "ON a.id_aluno = b.id WHERE a.id = ?");
        
        $sql->bindParam(1, $this->id, PDO::PARAM_INT);
        $sql->execute();
        
        return $sql->fetch(PDO::FETCH_OBJ);
    }

    public function getObjects() {
        $pdo = DBpdo::connection();
        $sql = $pdo->query("SELECT *, a.data AS data_depo FROM depoimento a JOIN aluno b "
                . "ON a.id_aluno = b.id ORDER BY a.id DESC");

        return $sql->fetchAll(PDO::FETCH_OBJ);
    }

    public function getTotalRegistros() {
        $pdo = DBpdo::connection();
        $sql = $pdo->query("SELECT COUNT(*) as total FROM depoimento");

        return (integer) $sql->fetch(PDO::FETCH_OBJ)->total;
    }

    public function insert() {
        $pdo = DBpdo::connection();
        $sql = $pdo->prepare("INSERT INTO depoimento "
                . "(id_aluno, data, mensagem) VALUES(?, ?, ?)");

        $sql->bindParam(1, $this->id_aluno, PDO::PARAM_INT);
        $sql->bindParam(2, $this->data, PDO::PARAM_STR);
        $sql->bindParam(3, $this->mensagem, PDO::PARAM_STR);
        $sql->execute();
        
        $this->id = DBpdo::lastInsertId();
    }

    public function update() {
        $pdo = DBpdo::connection();
        $sql = $pdo->prepare("UPDATE depoimento SET "
                . "id_aluno=?, mensagem=? WHERE id = ?");

        $sql->bindParam(1, $this->id_aluno, PDO::PARAM_INT);
        $sql->bindParam(2, $this->mensagem, PDO::PARAM_STR);
        $sql->bindParam(3, $this->id, PDO::PARAM_INT);
        $sql->execute();
    }

    public function delete() {
        $pdo = DBpdo::connection();
        $sql = $pdo->prepare("DELETE FROM depoimento WHERE id = ? LIMIT 1");

        $sql->bindParam(1, $this->id, PDO::PARAM_INT);
        $sql->execute();
    }

}
