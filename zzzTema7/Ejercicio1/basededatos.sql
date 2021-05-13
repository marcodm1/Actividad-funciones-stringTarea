/* Creación de la base de datos */
create database dwes2;
use dwes2;

/* Creación del usuario con permisos sobre la base de datos.*/
create user 'alumno'@'localhost' identified by '1234';
-- grant all privileges on dwes2.* to 'alumno'@'localhost';
grant select on dwes2.* to 'alumno'@'localhost';

/* Creación y alta de datos en las tablas: 
- alumnos, asignaturas y notas
- Productos
-  */

drop table if exists notas;
drop table if exists alumnos;
drop table if exists asignaturas;
CREATE TABLE `alumnos` (
  `idAlumno` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50)  DEFAULT NULL,
  `apellidos` varchar(150)  DEFAULT NULL,
  `fnacimiento` date DEFAULT NULL,
  PRIMARY KEY (`idAlumno`)
) ;

CREATE TABLE `asignaturas` (
  `idAsignatura` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250)  NOT NULL,
  `curso` int  NOT NULL,
  `ciclo` varchar(50)  NOT NULL,
  PRIMARY KEY (`idAsignatura`)
);

CREATE TABLE `notas` (
  `idAlumno` int(11) NOT NULL,
  `idAsignatura` int(11) NOT NULL,
  `nota` double NOT NULL,
  PRIMARY KEY (`idAlumno`,`idAsignatura`),
  KEY `NOTAS_ASIGNATURAS_idx` (`idAsignatura`),
  CONSTRAINT `NOTAS_ALUMNOS` FOREIGN KEY (`idAlumno`) REFERENCES `alumnos` (`idAlumno`),
  CONSTRAINT `NOTAS_ASIGNATURAS` FOREIGN KEY (`idAsignatura`) REFERENCES `asignaturas` (`idAsignatura`)
) ;
INSERT INTO `alumnos` VALUES (1,'PEPE', 'PÉREZ', '1999-08-09'),(2,'ANA', 'GONZÁLEZ', '2000-12-20'), 
(3,'RAMÓN', 'GARCÍA', '1999-09-25');
INSERT INTO `asignaturas` VALUES (1, 'DWES', 2, 'DAW'),
	(2, 'DESPLIEGUE', 2, 'DAW');
INSERT INTO `notas` VALUES (1, 1, 5), (1,2, 8), (2,1,4), (2,2,7), (3,1,8), (3,2,7);

	
drop table if exists productos;

CREATE TABLE `productos` (
  `idFabricante` char(3) NOT NULL ,
  `idProducto` varchar(5) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `precio` double NOT NULL,
  `existencias` int NOT NULL,
  PRIMARY KEY (`idFabricante`,`idProducto` )
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

insert into productos (idFabricante, idProducto, descripcion, precio, existencias)
values ('ACI','4100Y','Extractor', 2.750 ,25),
('QSA','XK47','Reductor',355, 38),
('BIC','41672','Plate',180, 0),
('IMM','779C','Riostra 2-Tm',1.875, 9),
('ACI','41003','Artículo Tipo 3',107, 207),
('ACI','41004','Artículo Tipo 4',117 ,139),
('BIC','41003','Manivela',652, 3),
('IMM','887P','Perno Riostra',250, 24),
('QSA','XK48','Reductor',134 ,203),
('REI','2A44L','Bisagra Izqda.',4.500 ,12),
('FEA','112','Cubierta', 148, 115),
('IMM','887H','Soporte Riostra', 54, 223),
('BIC','41089','Reten', 225 ,78),
('ACI','41001','Artículo Tipo 1', 55, 277),
('IMM','775C','Riostra 1-Tm', 1.425, 5),
('ACI','4100Z','Montador', 2.500, 28),
('QSA','XK48A','Reductor',117, 37),
('ACI','41002','Artículo Tipo 2', 76, 167),
('REI','2A44R','Bisagra Dcha.', 4.500, 12),
('IMM','773C','Riostra 1/2-Tm', 975, 28),
('ACI','4100X','Ajustador', 25, 37),
('FEA','114','Bancada Motor', 243, 15),
('IMM','887X','Retenedor Riostra', 475, 32),
('REI','2A44G','Pasador Bisagra', 350, 14);

drop table if exists `usuarios`;
CREATE TABLE `usuarios` (
  `login` varchar(20) NOT NULL,
  `clave` varchar(20) NOT NULL,
  PRIMARY KEY (`login`)
) ;
INSERT INTO usuarios VALUES ('enrique', '1234') , ('rosa', '12345'), ('isabel', 'abcd'), ('jimena','1234abc');
SELECT * FROM usuarios;