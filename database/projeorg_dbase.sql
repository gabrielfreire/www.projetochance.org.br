
CREATE DATABASE IF NOT EXISTS projeorg_dbase DEFAULT CHARSET=utf8;

USE projeorg_dbase;

CREATE TABLE IF NOT EXISTS aluno (
    id int primary key auto_increment not null,
    data varchar(20) not null,
    registro int(9) not null,
    nome varchar(200) not null,
    estado_civil varchar(20) not null,
    cep varchar(9) not null,
    endereco varchar(200) not null,
    numero varchar(20) not null,
    bairro varchar(200) not null,
    cidade varchar(200) not null,
    estado varchar(50) not null,
    data_nasc varchar(10) not null,
    rg varchar(12) not null,
    cpf varchar(14) not null,
    telefone varchar(15) not null,
    email varchar(200) not null,
    senha varchar(50) not null,
    ano_conclusao_em varchar(4) default null,
    ano_prova_enem varchar(4) default null,
    nome_inst varchar(200) default null,
    nome_cursinho varchar(200) default null    
) DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS depoimento (
    id int primary key auto_increment not null,
    id_aluno int not null,
    data varchar(20) not null,
    mensagem text not null
) DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS contato (
    id int primary key auto_increment not null,
    data varchar(20) not null,
    nome varchar(200) not null,
    telefone varchar(15) default null,
    email varchar(200) not null,
    assunto varchar(200) not null,
    mensagem text not null
) DEFAULT CHARSET=utf8;


CREATE TABLE IF NOT EXISTS usuario (
    id int primary key auto_increment not null,
    nome varchar(200) not null,
    cpf varchar(14) default null,
    email varchar(200) not null,
    senha varchar(50) not null
) DEFAULT CHARSET=utf8;


ALTER TABLE depoimento
    ADD CONSTRAINT FOREIGN KEY(id_aluno) REFERENCES aluno(id) ON DELETE CASCADE ON UPDATE CASCADE;

INSERT INTO usuario(nome, email, senha) VALUES ("Misael", "misah@ig.com.br", "Pr0jet0_Ch@nce");