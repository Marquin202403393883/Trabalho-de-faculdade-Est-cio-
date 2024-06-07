create database projeto_faculdade;

use projeto_faculdade;

create table usuarios(
    id_usuario int AUTO_INCREMENT PRIMARY KEY,
    nome varchar(100),
    telefone varchar(30),
    email varchar(40),
    senha varchar(32)
);