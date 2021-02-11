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
+----+--------+----------+-----------+--------------------------------------------------------------+
| id | nombre | apellido | pais      | contrasenia                                                   |
+----+--------+----------+-----------+--------------------------------------------------------------+
|  1 | Ruben  | Lopez    | Italia    | $2y$10$3y0pJ98K6TCIwwyqN2qCsu4hIaCKiCyhEx4WHjYOzPuQBjF6fYEMa |
|  2 | Fran   | Aldo     | Francia   | $2y$10$IhKCNQIb8h9CXYeMq1RwBuM2K9yIcTbQbkPWK/hLW9fMTMb16BDSi |
|  3 | Pablo  | Mat      | España    | $2y$10$o1UYUgDUn29YG1uMoD1nbuXc04Dokl8ROuGpgP9JKKlQJFQHQDaum |
|  4 | Sara   | Jimenez  | EEUU      | $2y$10$CG/RBPMF7i1Swjb7eqdHhernO4y/f03o0Y3dXh.0BO9THpklCODQC |
|  5 | Alex   | Mateos   | España    | $2y$10$k8dKj2IeJoF6Kdtm6.OsI.NqiJ5EvwAW1BacleHjXUV.2eV1zrN3K |
|  6 | Ralf   | Naumer   | Alemania  | $2y$10$3iJXkkWpPg/TcNP5nigSh.ejMMXohq9kO5jT45BFkl16QTc3KexWS |
|  7 | Pedro  | Lopez    | España    | $2y$10$0ft1p81nnjinfOfVCye9WOm0BSog/ruSC2YK/QP6WJw.uBCXKIdBO |
|  8 | Sofia  | Olmedo   | Paraguay  | $2y$10$e6r94XTzV6p4z8cycz5P5uG6n1ueG2CXghCSWw.go0k/36HdvnJHy |
|  9 | Julian | Sabina   | Argentina | $2y$10$mhBqj4uDpT.rW3W/px58a.vrD7hFwoBv4/nEH7IBRzcHbLWVtMIqu |
| 10 | Liz    | Olmedo   | Paraguay  | $2y$10$589s1KGpK8.OdznJ4vtG3eSVVvv2RvZg8hLUWqr0lfScxzWMT9jIG |
+----+--------+----------+-----------+--------------------------------------------------------------+


-- tabla trabajos:
+-------------+-------------+------+-----+---------+----------------+
| Field       | Type        | Null | Key | Default | Extra          |
+-------------+-------------+------+-----+---------+----------------+
| id          | int(20)     | NO   | PRI | NULL    | auto_increment |
| trabajaComo | varchar(20) | NO   |     | NULL    |                |
+-------------+-------------+------+-----+---------+----------------+
+----+-------------+
| id | trabajaComo |
+----+-------------+
| 55 | Informatico |
| 70 | Carpintero  |
+----+-------------+


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
+-------------+-------------+---------+----------+-----+
| fk_personas | fk_trabajos | salario | jornada  | id  |
+-------------+-------------+---------+----------+-----+
|          52 |          55 |    1300 | comlpeta | 444 |
|         752 |          70 |     900 | media    | 555 |
+-------------+-------------+---------+----------+-----+


SELECT p.nombre, t.trabajaComo , pt.salario 
	from personas as p
	join personas_trabajos as pt 
	on pt.fk_personas = p.id
	join trabajos as t
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

-- eliminar fila
DELETE FROM usuarios
WHERE nombre = "hh";