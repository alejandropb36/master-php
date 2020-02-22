-- Renombrar una tabla
alter table usuarios rename to usuarios_renom;

-- Cambiar el nombre de una columna
alter table usuarios_renom change apellidos apellido varchar(100) null;

-- Modificar columna sin cambiar nombre
alter table usuarios_renom modify apellido char(50) not null;
