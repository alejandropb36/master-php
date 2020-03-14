-- Mostrar todos los registros de una tabla
select email, nombre, apellidos from usuarios;

-- Todo
select * from usuarios;

-- Operadores aritmeticos

select email, (7 + 7) as 'Operacion' from usuarios;
select id, email, (id + 7) as 'Operacion' from usuarios;

-- Funciones matematicas
select abs(10 - 30) as  'Operaciones' from usuarios;
select ceil(9.56) as  'Operaciones' from usuarios;
select floor(9.56) as  'Operaciones' from usuarios;