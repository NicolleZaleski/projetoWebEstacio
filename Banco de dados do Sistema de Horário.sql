create database sistemaHorarios;
use sistemaHorarios;

create table Aulas(
id_aula int auto_increment primary key,
curso varchar(100) not null,
nomeAula varchar(200) not null,
professor varchar(100) not null,
diaSemana varchar(30) not null,
periodo varchar(15) not null,
horario time not null,
bloco varchar(20) not null,
andar varchar(20) not null,
sala varchar(20) not null
);