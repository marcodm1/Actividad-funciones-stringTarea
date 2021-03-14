CREATE USER pedro@localhost IDENTIFIED BY '123'; -- creo usuario y contraseña para un usuario tipo "admin"
GRANT DROP, SELECT, UPDATE, DELETE, INSERT ON dwes TO pedro@localhost; -- doy permisos de x, x, x, "los que quiera"
-- no se que mas permisos hay