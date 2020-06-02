create database if not exists symfony_master;
use symfony_master;

create table if not exists users(
    id  int(255) auto_increment not null,
    role    varchar(20),
    name    varchar(100),
    surname varchar(200),
    email   varchar(255) not null,
    password    varchar(255) not null,
    created_at  datetime,
    constraint pk_users primary key (id)
)ENGINE=InnoDb;

insert into users values(null, 'ROLE_USER', 'Alejandro', 'Ponce', 'alejandro@mail.com', 'password', CURTIME());
insert into users values(null, 'ROLE_USER', 'Karla', 'Rodriguez', 'karla@mail.com', 'password', CURTIME());
insert into users values(null, 'ROLE_USER', 'Rosco', 'Pichichi', 'rosco@mail.com', 'password', CURTIME());
insert into users values(null, 'ROLE_USER', 'Kirry', 'Morregasa', 'kirry@mail.com', 'password', CURTIME());

create table if not exists tasks(
    id int(255) auto_increment not null,
    user_id int(255) not null,
    title varchar(255),
    content text,
    priority varchar(20), 
    hours int(100), 
    created_at datetime,
    constraint pk_tasks primary key(id),
    constraint fk_task_user foreign key(user_id) references users(id)
)ENGINE=InnoDb;

insert into tasks values(null, 1, 'Tarea1', 'Hacer la tarea 1', 'high', 40, CURTIME());
insert into tasks values(null, 1, 'Tarea2', 'Hacer la tarea 2', 'high', 40, CURTIME());
insert into tasks values(null, 2, 'Tarea3', 'Hacer la tarea 3', 'high', 40, CURTIME());
insert into tasks values(null, 3, 'Tarea4', 'Hacer la tarea 4', 'high', 40, CURTIME());
insert into tasks values(null, 4, 'Tarea5', 'Hacer la tarea 5', 'high', 40, CURTIME());
