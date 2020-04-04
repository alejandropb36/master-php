CREATE DATABASE tienda_master;
USE tienda_master;

CREATE TABLE usuarios (
id int(255) auto_increment not null,
nombre varchar(100) not null,
apellidos varchar(255),
email varchar(255) not null,
password varchar(255) not null,
rol varchar(20),
imagen varchar(255),
CONSTRAINT pk_usuarios primary key(id),
constraint uq_email UNIQUE(email)
)ENGINE=InnoDb;

inserti into usuarios values(null, 'Admin', 'Admin', 'admin@admin.com', 'constraseña', 'admin', null);

create table categorias(
id int(255) auto_increment not null,
nombre varchar(100) not null,
CONSTRAINT pk_categorias primary key(id)
)ENGINE=InnoDb;

inserti into categorias values(null, 'Manga corta');
inserti into categorias values(null, 'Manga larga');
inserti into categorias values(null, 'Tirantes');
inserti into categorias values(null, 'Sudadera');

create table productos(
id int(255) auto_increment not null,
categoria_id int(255) not null,
nombre varchar(100) not null,
descripcion text,
precio float(100, 2) not null,
stok int(255) not null,
fecha date not null,
imagen varchar(255),

CONSTRAINT pk_productos primary key(id),
constraint fk_producto_categoria foreign key(categoria_id) references categorias(id)
)ENGINE=InnoDb;


create table pedidos(
id int(255) auto_increment not null,
usuario_id int(255) not null,
provincia varchar(100) not null,
localidad varchar(255) not null,
direccion varchar(255) not null,
coste float(200, 2) not null,
estado varchar(30) not null,
fecha date,
hora time,


CONSTRAINT pk_pedidos primary key(id),
constraint fk_pedido_usuario foreign key(usuario_id) references usuarios(id)
)ENGINE=InnoDb;


create table lineas_pedidos(
id int(255) auto_increment not null,
pedido_id int(255) not null,
producto_id int(255) not null,
unidades int(255),


CONSTRAINT pk_lineas_pedidos primary key(id),
constraint fk_liena_pedido foreign key(pedido_id) references pedidos(id),
constraint fk_liena_producto foreign key(producto_id) references productos(id)
)ENGINE=InnoDb;