-- Renombrar una tabla
alter table usuarios rename to usuarios_renom;

-- Cambiar el nombre de una columna
alter table usuarios_renom change apellidos apellido varchar(100) null;

-- Modificar columna sin cambiar nombre
alter table usuarios_renom modify apellido char(50) not null;

-- Añadir columna
alter table usuarios_renom add website varchar(100) null;

-- Añadir restriccion a columna
alter table usuarios_renom add constraint uq_email unique(email);

-- Borrar una columna
alter table usuarios_renom drop website;
