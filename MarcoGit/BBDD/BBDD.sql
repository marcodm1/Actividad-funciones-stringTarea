-- tabla personas:
+------------+--------------+------+-----+---------+----------------+
| Field      | Type         | Null | Key | Default | Extra          |
+------------+--------------+------+-----+---------+----------------+
| id         | int(10)      | NO   | PRI | NULL    | auto_increment |
| nombre     | varchar(20)  | NO   |     | NULL    |                |
| apellido   | varchar(20)  | NO   |     | NULL    |                |
| pais       | varchar(20)  | NO   |     | NULL    |                |
| contraseña | varchar(200) | NO   |     | NULL    |                |
+------------+--------------+------+-----+---------+----------------+

-- tabla trabajos:
+-------------+-------------+------+-----+---------+----------------+
| Field       | Type        | Null | Key | Default | Extra          |
+-------------+-------------+------+-----+---------+----------------+
| id          | int(20)     | NO   | PRI | NULL    | auto_increment |
| trabajaComo | varchar(20) | NO   |     | NULL    |                |
+-------------+-------------+------+-----+---------+----------------+

-- tabla personas_trabajos

+-------------+-------------+------+-----+---------+----------------+
| Field       | Type        | Null | Key | Default | Extra          |
+-------------+-------------+------+-----+---------+----------------+
| fk_personas | int(20)     | NO   |     | NULL    |                |
| fk_trabajos | int(20)     | NO   |     | NULL    |                |
| salario     | int(20)     | NO   |     | NULL    |                |
| jornada     | varchar(20) | NO   |     | NULL    |                |
| id          | int(20)     | NO   | PRI | NULL    | auto_increment |
+-------------+-------------+------+-----+---------+----------------+


-- un select triple es necesario el inner?
SELECT p.nombre, t.trabajaComo , pt.salario 
	from personas as p
	inner join personas_trabajos as pt 
	on pt.fk_personas = p.id
	inner join trabajos as t
	on pt.fk_trabajos = t.id
	where p.nombre = 'Pablo' and salario > 1000;
-- con esta consulta devuelve
+--------+-------------+---------+
| nombre | trabajaComo | salario |
+--------+-------------+---------+
| Pablo  | Informatico |    1300 |
+--------+-------------+---------+



-- eliminar columna
alter TABLE personas drop column nombreColumna;

-- añadir columna
alter TABLE personas add contraseña VARCHAR(200);

-- cambiar el nombre de una columna
ALTER TABLE personas CHANGE nombreActual nuevoNombre VARCHAR(20);

-- cambiar algo de una tabla hay dos formas
ALTER TABLE personas modify contraseña VARCHAR(200) not null;
ALTER TABLE personas ALTER COLUMN contraseña VARCHAR(200) NOT NULL;

-- ver el contenido de una tabla
describe personas

-- hacer un insert en trabajos
insert into trabajos 
	values (70, 'Carpintero');
