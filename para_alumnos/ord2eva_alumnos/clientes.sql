CREATE DATABASE ordinaria;
use ordinaria;
DROP TABLE IF EXISTS auditoria;
DROP TABLE IF EXISTS usuarios;
DROP TABLE IF EXISTS clientes;



 CREATE TABLE `ordinaria`.`usuarios` 
 (
 `login` VARCHAR(50) NOT NULL ,
 `clave` VARCHAR(200) NOT NULL ,
 nombre_completo VARCHAR(100) NOT NULL,
 PRIMARY KEY (`login`)
 );
 
 INSERT INTO usuarios 
 VALUES 
 ( 'laura', '$2y$10$zc66sBPQjBSvDBTvKfJ78ev6P/yuzI.AMobcEmkj2Or/uRCgNAGoi', 'Laura Pérez'),
 ( 'pepe', '$2y$10$zc66sBPQjBSvDBTvKfJ78ev6P/yuzI.AMobcEmkj2Or/uRCgNAGoi', 'Pépe Lis'),
 ( 'ana', '$2y$10$9VD4VZsFzc4HO/SbG3Brz.Z7KhqpeplQ4HO10TGoYTUJGEo2Mclv6', 'Alicia Calvo')
 ;
# laura 1234
# pepe 1234
# ana Nohay2sin3

CREATE TABLE `ordinaria`.`clientes` 
( 
`idcliente` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
`nombre` VARCHAR(100) NOT NULL , 
`direccion` VARCHAR(100) NOT NULL , 
`fecha_alta` DATE NOT NULL, 
`fecha_baja` DATE 
 
) ;

INSERT INTO clientes (nombre, direccion, fecha_alta, fecha_baja)
VALUES
('Pepe Pérez', 'c/los alamos, 95 MADRID', 20200505, 20210101 ),
('Amancio Moreno', 'c/Moderna, 24 GETAFE - MADRID', 20210211, null ),
('María Garrido', 'c/Margarita, 2 GETAFE - MADRID', 20210101, null ),
('Amancio Moreno', 'c/Pez, 35 MADRID', 20200315, null ),
('Rosa Moreno', 'c/Palmera, 1 GETAFE - MADRID', 20210217, 20210310 ),
('Lidia Eras', 'c/Castillo del monte alto 44',20200104, null ),
('Pilar Fol', 'c/Castillo del monte alto 44', 20191107, null )
;
 
 CREATE TABLE `ordinaria`.`auditoria` 
 (
`idregistro` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
 `login` VARCHAR(50) NOT NULL , 
 `fecha` DATE NOT NULL ,
 `hora` TIME NOT NULL ,
 `operacion` VARCHAR(100) NOT NULL,
 `datos` VARCHAR(200) NOT NULL,
 FOREIGN KEY (login) REFERENCES usuarios(login)
 
 );
 
select * from  usuarios;
select * from  clientes;
select * from  auditoria;


