
DROP DATABASE IF EXISTS dwes; /*Si hay una BBDD dews, se elimina*/

CREATE DATABASE dwes; /*Creamos la BBDD dews*/

USE dwes; /*Usamos la BBDD dews*/


CREATE TABLE usuarios( /*Creamos la tabla usuarios con unos valores en la  BBDD dews*/
	login VARCHAR(10), /*Varchar ocupa ese espacio en la memoria que tenga, si fuese char, ocuparia lo que le indiquemos */
	clave VARCHAR(10) NOT NULL,
	PRIMARY KEY (login)

);

INSERT INTO usuarios /*Insertamos en la tabla usuarios de la BBDD dews un nuevo valor*/
	VALUES ( 'Pedro', '12');
	
# COMENTARIOS: /*los # son para poner comentarios*/
# show tables;
# desc usuarios;


SELECT * FROM USUARIOS; /*Seleccionamos todo de la tabla usuarios de la BBDD dews*/