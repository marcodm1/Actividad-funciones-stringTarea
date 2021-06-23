/*
administrador(clave) // clave es 1234
Colegiado(codigo, nombre, apellidos, activo) // colegiados son medicos, con un numero unico y si esta enactivo o no true o false
Paciente(dni, nombre, apellidos) // clave es dni
sala(codigo, ubicacion) // codigo es el pk
Operaciones (identificador, codigo_colegiado, dni_paciente, fecha_operacion, codigo_sala, turno) // turno es mañana o tarde, m y t

*/
DROP DATABASE dwes_extra;
CREATE DATABASE dwes_extra;
use dwes_extra;
DROP TABLE IF EXISTS administrador;
DROP TABLE IF EXISTS colegiado;
DROP TABLE IF EXISTS paciente;
DROP TABLE IF EXISTS sala;
DROP TABLE IF EXISTS operacion;

CREATE USER usuario@localhost IDENTIFIED BY '123'; 
GRANT SELECT, INSERT ON dwes_extra TO pedro@localhost; 

CREATE TABLE administrador(
`clave` VARCHAR(200) NOT NULL PRIMARY KEY
 
);
INSERT INTO administrador (clave) 
values 
( "$2y$10$hw2.oEhmhQHLl0S.n.UcXOWJuDelj9BijeNloXEKmNsEodHulF8MS");

CREATE TABLE colegiado
( 
`codigo` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
`nombre` VARCHAR(50) NOT NULL , 
`apellidos` VARCHAR(50) NOT NULL , 
`activo` TINYINT DEFAULT 1
) ;

INSERT INTO colegiado ( nombre, apellidos, activo) 
values 
( "Jose Francisco", "Fernández Gutierrez", 0),
( "Miguel", "Fernández Sánchez", 1),
( "Carmen", "Alonso Martínez", 1),
( "Victoria", "Ridruejo Santabaya", 1),
( "Ricardo", "Canalejas Escribano", 1),
( "Ana María", "Cardona Rosales", 0),
( "Luisa", "Blanco Borrego", 1);

SELECT * FROM colegiado;


CREATE TABLE paciente
( 
`dni` VARCHAR(10) NOT NULL PRIMARY KEY, 
`nombre` VARCHAR(50) NOT NULL , 
`apellidos` VARCHAR(50) NOT NULL 
) ;

INSERT INTO paciente VALUES
("45454575A", "Manuel", "Meroño"),
("85584125B", "María", "Zambrano"),
("62618575C", "Claudia", "Pascual"),
("15417575D", "Irene", "Pellicer"),
("84527575X", "Raquel", "Mansilla"),
("18857575D", "Alicia", "Peregrin"),
("16549841F", "Margarita", "Manresa"),
("49855541F", "Alberto", "Risueño")
;

SELECT * FROM paciente;

CREATE TABLE sala
( 
`codigo` INT NOT NULL PRIMARY KEY, 
`ubicacion` VARCHAR(200) NOT NULL
) ;

INSERT INTO sala VALUES
(10, "Edificio principal, primera planta, puerta 10"),
(11, "Edificio principal, primera planta, puerta 11"),
(12, "Edificio principal, primera planta, puerta 12"),
(20, "Edificio principal, segunda planta, puerta 20"),
(21, "Edificio principal, segunda planta, puerta 21"),
(1, "Edificio de Urgencias, planta baja, puerta 1"),
(2, "Edificio de Urgencias, planta baja, puerta 2"),
(3, "Edificio de Urgencias, planta baja, puerta 3")
;

SELECT * FROM sala;



CREATE TABLE operacion
( 
`identificador` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
`codigo_colegiado` INT NOT NULL, 
`dni_paciente`  VARCHAR(10) NOT NULL, 
`fecha_operacion` DATE NOT NULL , 
`codigo_sala` INT NOT NULL, 
`turno` VARCHAR(10) DEFAULT "M", 
FOREIGN KEY (codigo_colegiado) REFERENCES colegiado(codigo),
FOREIGN KEY (dni_paciente) REFERENCES paciente(dni),
FOREIGN KEY (codigo_sala) REFERENCES sala(codigo)
) ;

INSERT INTO 
operacion (codigo_colegiado, dni_paciente, fecha_operacion, codigo_sala, turno) 
VALUES
( 2, "45454575A", "2021-06-15", 10, "M"),
( 3, "85584125B", "2021-06-15", 10, "T"),
( 2, "62618575C", "2021-06-16", 11, "M"),
( 4, "15417575D", "2021-06-16", 11, "T"),
( 5, "84527575X", "2021-06-20", 21, "M"),
( 4, "18857575D", "2021-06-22", 21, "M"),
( 4, "16549841F", "2021-06-23", 2, "M"),
( 4, "49855541F", "2021-06-24", 2, "M"),
( 7, "49855541F", "2021-07-24", 2, "M"),
( 7, "49855541F", "2021-08-24", 10, "M"),
( 4, "49855541F", "2021-09-24", 2, "T");

SELECT * FROM operacion;






