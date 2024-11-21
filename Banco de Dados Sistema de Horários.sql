create database sistemaHorarios;
use sistemaHorarios;

create table Aulas(
id int primary key auto_increment,
matricula varchar(20) not null unique,
curso varchar(100) not null,
aula varchar(200) not null,
ensino enum('Presencial','Semipresencial','EAD') not null,
professor varchar(100) not null,
diaSemana enum('Segunda-Feira','Terça-Feira','Quarta-Feira','Quinta-Feira','Sexta-Feira','Sábado') not null,
periodo enum('Matutino','Vespertino','Noturno') not null,
horario varchar(20) not null,
bloco varchar(20) not null,
andar varchar(20) not null,
sala varchar(20) not null
);


