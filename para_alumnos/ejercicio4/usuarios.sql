DROP DATABASE IF EXISTS dwes;
CREATE DATABASE dwes;

CREATE USER alumno@localhost IDENTIFIED BY '1234'; -- creo usuario y contraseña para un usuario tipo "admin"
GRANT SELECT, UPDATE, INSERT ON dwes TO alumno@localhost;