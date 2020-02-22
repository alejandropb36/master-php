/*
Crear un tabla
*/

create table usuarios (
    id          int(11) auto_increment not null,
    nombre      varchar(255) not null,
    apellidos   varchar(255) default 'hola que tal',
    email       varchar(100) not null,
    password    varchar(255),
    constraint pk_usuarios primary key (id)
);