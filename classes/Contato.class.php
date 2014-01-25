<?php

/*
 * Classe Aluno
 */

# Conexão
require_once "../classes/DBpdo.class.php";

/**
 * 
 *
 * @author gabriel
 */
class Contato {
    
    public $id;          # int(11)
    public $nome;        # int(9)
    public $telefone;    # varchar(200)
    public $email;       # varchar(20)
    public $assunto;     # varchar(9)
    public $mensagem;    # varchar(200)
    
    
    public function insert() {
        
        $pdo = DBpdo::connection();
        $stmte = $pdo->prepare("INSERT INTO aluno "
                . "(nome, estado_civil, cep, endereco, numero, bairro, cidade, estado, "
                . "data_nasc, rg, cpf, telefone, email, senha, ano_conclusao_em, "
                . "ano_prova_enem, nome_inst, nome_cursinho) "
                . "VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmte->bindParam(1,  $this->nome, PDO::PARAM_STR);
        $stmte->bindParam(2,  $this->estado_civil, PDO::PARAM_STR);
        $stmte->bindParam(3,  $this->cep, PDO::PARAM_STR);
        $stmte->bindParam(4,  $this->endereco, PDO::PARAM_STR);
        $stmte->bindParam(5,  $this->numero, PDO::PARAM_STR);
        $stmte->bindParam(6,  $this->bairro, PDO::PARAM_STR);
        $stmte->bindParam(7,  $this->cidade, PDO::PARAM_STR);
        $stmte->bindParam(8,  $this->estado, PDO::PARAM_STR);
        $stmte->bindParam(9,  $this->data_nasc, PDO::PARAM_STR);
        $stmte->bindParam(10, $this->rg, PDO::PARAM_STR);
        $stmte->bindParam(11, $this->cpf, PDO::PARAM_STR);
        $stmte->bindParam(12, $this->telefone, PDO::PARAM_STR);
        $stmte->bindParam(13, $this->email, PDO::PARAM_STR);
        $stmte->bindParam(14, $this->senha, PDO::PARAM_STR);
        $stmte->bindParam(15, $this->ano_conclusao_em, PDO::PARAM_STR);
        $stmte->bindParam(16, $this->ano_prova_enem, PDO::PARAM_STR);
        $stmte->bindParam(17, $this->nome_inst, PDO::PARAM_STR);
        $stmte->bindParam(18, $this->nome_cursinho, PDO::PARAM_STR);        
        $stmte->execute();
    }
    
    public function update() {
        
    }
    
    public function delete() {
        
    }
    
}
