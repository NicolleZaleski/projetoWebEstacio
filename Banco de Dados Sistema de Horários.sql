create database sistemaHorarios;
use sistemaHorarios;

create table aulas(
matricula varchar(20) primary key unique,
curso varchar(100) not null,
aula varchar(200) not null,
ensino enum('presencial','semipresencial') not null,
professor varchar(100) not null,
diaSemana enum('Segunda-Feira','Terça-Feira','Quarta-Feira','Quinta-Feira','Sexta-Feira','Sábado') not null,
periodo enum('Matutino','Vespertino','Noturno') not null,
horario time not null,
bloco varchar(20) not null,
andar varchar(20) not null,
sala varchar(20) not null
);


