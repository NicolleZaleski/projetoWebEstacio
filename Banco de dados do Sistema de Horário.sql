create database sistemaHorarios;
use sistemaHorarios;

create table Aulas(
id_aula int auto_increment primary key,
curso varchar(100) not null,
nomeAula varchar(200) not null,
ensino enum('presencial','semipresencial') not null,
professor varchar(100) not null,
diaSemana enum('segunda','terça','quarta','quinta','sexta','sábado') not null,
periodo enum('matutino','vespertino','noturno') not null,
horario time not null,
bloco varchar(20) not null,
andar varchar(20) not null,
sala varchar(20) not null
);

