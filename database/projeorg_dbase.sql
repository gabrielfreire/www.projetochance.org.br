
CREATE DATABASE IF NOT EXISTS projeorg_dbase DEFAULT CHARSET=utf8;

USE projeorg_dbase;

CREATE TABLE IF NOT EXISTS aluno (
    id int primary key auto_increment not null,
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
    ano_conclusao_em varchar(4) not null,
    ano_prova_enem varchar(4) not null,
    nome_inst varchar(200) not null,
    nome_cursinho varchar(200) not null
) DEFAULT CHARSET=utf8;