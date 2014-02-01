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
class Aluno {
    
    public $id;                 # int(11)
    public $registro;           # int(9)
    public $nome;               # varchar(200)
    public $estado_civil;       # varchar(20)
    public $cep;                # varchar(9)
    public $endereco;           # varchar(200)
    public $numero;             # varchar(20)
    public $bairro;             # varchar(200)
    public $cidade;             # varchar(200)
    public $estado;             # varchar(50)
    public $data_nasc;          # varchar(10)
    public $rg;                 # varchar(12)
    public $cpf;                # varchar(14)
    public $telefone;           # varchar(15)
    public $email;              # varchar(200)
    public $senha;              # varchar(50)
    public $ano_conclusao_em;   # varchar(4)
    public $ano_prova_enem;     # varchar(4)
    public $nome_inst;          # varchar(200)
    public $nome_cursinho;      # varchar(200)
    
    
    static function gerarRA($quant=1, $min=10000, $max=90000){        
        date_default_timezone_set('America/Sao_Paulo');
        $numero = range($min,$max);

        shuffle($numero);
        $arr = array_slice($numero, 0, $quant);

        return (integer)( date("Y").$arr[0] );
    }
        
    public function login() {
        $pdo = DBpdo::connection();
        $sql = $pdo->prepare("SELECT * FROM aluno WHERE email = ? && senha = ?");
        $sql->bindParam(1, $this->email);
        $sql->bindParam(2, $this->senha);
        $sql->execute();

        return $sql->fetch(PDO::FETCH_OBJ);
    }
    
    public function insert() {        
        $pdo = DBpdo::connection();
        $stmte = $pdo->prepare("INSERT INTO aluno "
                . "(data, registro, nome, estado_civil, cep, endereco, numero, bairro, cidade, estado, "
                . "data_nasc, rg, cpf, telefone, email, senha, ano_conclusao_em, "
                . "ano_prova_enem, nome_inst, nome_cursinho) "
                . "VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmte->bindParam(1,  $this->data, PDO::PARAM_STR);
        $stmte->bindParam(2,  $this->registro, PDO::PARAM_INT);
        $stmte->bindParam(3,  $this->nome, PDO::PARAM_STR);
        $stmte->bindParam(4,  $this->estado_civil, PDO::PARAM_STR);
        $stmte->bindParam(5,  $this->cep, PDO::PARAM_STR);
        $stmte->bindParam(6,  $this->endereco, PDO::PARAM_STR);
        $stmte->bindParam(7,  $this->numero, PDO::PARAM_STR);
        $stmte->bindParam(8,  $this->bairro, PDO::PARAM_STR);
        $stmte->bindParam(9,  $this->cidade, PDO::PARAM_STR);
        $stmte->bindParam(10, $this->estado, PDO::PARAM_STR);
        $stmte->bindParam(11, $this->data_nasc, PDO::PARAM_STR);
        $stmte->bindParam(12, $this->rg, PDO::PARAM_STR);
        $stmte->bindParam(13, $this->cpf, PDO::PARAM_STR);
        $stmte->bindParam(14, $this->telefone, PDO::PARAM_STR);
        $stmte->bindParam(15, $this->email, PDO::PARAM_STR);
        $stmte->bindParam(16, $this->senha, PDO::PARAM_STR);
        $stmte->bindParam(17, $this->ano_conclusao_em, PDO::PARAM_STR);
        $stmte->bindParam(18, $this->ano_prova_enem, PDO::PARAM_STR);
        $stmte->bindParam(19, $this->nome_inst, PDO::PARAM_STR);
        $stmte->bindParam(20, $this->nome_cursinho, PDO::PARAM_STR);        
        $stmte->execute();
    }
    
    public function update() {
        $pdo = DBpdo::connection();
        $stmte = $pdo->prepare("UPDATE aluno SET "
                . "nome=?, estado_civil=?, cep=?, endereco=?, numero=?, "
                . "bairro=?, cidade=?, estado=?, data_nasc=?, rg=?, cpf=?, "
                . "telefone=?, email=?, senha=?, ano_conclusao_em=?, "
                . "ano_prova_enem=?, nome_inst=?, nome_cursinho=? "
                . "WHERE id = ?");

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
        $stmte->bindParam(19, $this->id, PDO::PARAM_INT);        
        $stmte->execute();
    }
    
    public function delete() {
        $pdo = DBpdo::connection();
        $stmte = $pdo->prepare("DELETE FROM aluno WHERE id = ? LIMIT 1");
        
        $stmte->bindParam(1, $this->id, PDO::PARAM_INT);        
        $stmte->execute();
    }
    
}
