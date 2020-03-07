-- Insertar nuevos registros
insert into usuarios values (null, 'Alejandro', 'Ponce', 'alexponce36@hotmail.com', 'password', '2020-03-03');
insert into usuarios values (null, 'Antonio', 'Martinez', 'antonio@mail.com', 'password', '2020-03-03');
insert into usuarios values (null, 'Paco', 'Lopez', 'paco@mail.com', 'password', '2020-03-03');

-- Insertar filas solo con ciertas columnas
insert into usuarios (email, password) values ('admin@admin.com', 'admin');