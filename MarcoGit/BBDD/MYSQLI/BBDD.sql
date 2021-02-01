DROP DATABASE IF EXISTS dwes;

CREATE DATABASE dwes;

USE dwes;


CREATE TABLE usuarios(
	login VARCHAR(10),
	clave VARCHAR(10) NOT NULL,
	PRIMARY KEY (login)

);

INSERT INTO usuarios 
	VALUES ( 'p', '123');
	

SELECT * FROM USUARIOS;

insert into personas_trabajos
	values (752, 70, 900, 'media', 555);



-- que me muestre las personas con nombre Pablo que cobren mas de 1000
-- y que tenga un trabajo de informatico
SELECT p.nombre, t.trabajaComo , pt.salario from personas as p
	inner join personas_trabajos as pt 
	on pt.fk_personas = p.id
	inner join trabajos as t
	on pt.fk_trabajos = t.id
	where p.nombre = 'Pablo' and salario > 1000;


-- para renombrar una columna

ALTER TABLE nombreTabla CHANGE nombreActual nuevoNombre VARCHAR(20);

