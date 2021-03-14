use examen;
drop table if exists ingresos;
drop table if exists credencial;

CREATE TABLE `credencial` (
  `login` varchar(50) NOT NULL,
  `clave` varchar(120),
  `nombre` varchar(50),
  `apellidos` varchar(100) ,
  `email` varchar(100) ,
  
 
  PRIMARY KEY (`login` )
) ;



CREATE TABLE `ingresos` (
  `idIngreso` int NOT NULL AUTO_INCREMENT,
  `login` varchar(50) ,
  `cantidad` DECIMAL NOT NULL,
  `fechaIngreso` date ,
  `horaIngreso` time ,
  `sala` varchar(50),
	
  PRIMARY KEY (`idIngreso` ), 
  FOREIGN KEY (login) REFERENCES credencial(login)
) ;

insert into credencial
(nombre, apellidos, email, login, clave) 
values
 ('pepe', 'pérez', 'pepepere@gmail.com', 'pepe', '$2y$10$HffBbZL1LFuhJ.s8FwTZQ.tpTLRevFqa2BtQ0TjkEuprJnYhW2pX.'),
 ('ana', 'cruz', 'ana.cruz@gmail.com', 'ana', '$2y$10$HffBbZL1LFuhJ.s8FwTZQ.tpTLRevFqa2BtQ0TjkEuprJnYhW2pX.'),
('lola','sánchez', 'lolachez@hotmail.com', 'lola' ,'$2y$10$HffBbZL1LFuhJ.s8FwTZQ.tpTLRevFqa2BtQ0TjkEuprJnYhW2pX.'); 


insert into ingresos (login, cantidad, fechaIngreso, horaIngreso, sala) 
values ('pepe', 120, '2020/05/20', '22:45:05', 'Bingo Las Vegas'), 
  ('pepe', 220, '2020/05/20', '23:08:10', 'Bingo Las Vegas'), 
  ('pepe', 230, '2020/05/20', '23:20:03', 'Bingo Las Vegas'), 
  ('pepe', 180, '2020/05/20', '23:30:25', 'Bingo Las Vegas'), 
  ('pepe', 420, '2020/05/21', '23:30:22', 'Bingo Las Vegas'), 
  ('lola', 120, '2020/05/19', '22:45:30', 'Bingo Las Vegas'), 
  ('lola', 210, '2020/05/19', '23:08:55', 'Bingo Zafiro'), 
  ('lola', 130, '2020/05/19', '23:20:02', 'Bingo Zafiro'), 
  ('lola', 280, '2020/05/19', '23:30:01', 'Bingo Zafiro'), 
  ('lola', 320, '2020/05/19', '23:40:20', 'Bingo Zafiro'), 
  ('ana', 310, '2020/05/19', '23:10:56', 'Bingo Zafiro'), 
  ('ana', 130, '2020/05/19', '23:15:12', 'Bingo Zafiro'), 
  ('ana', 280, '2020/05/19', '23:23:38', 'Bingo Zafiro'), 
  ('ana', 320, '2020/05/19', '23:33:50', 'Bingo Zafiro'), 
  ('lola', 295, '2020/05/19', '23:55:03', 'Bingo Las Vegas'),
  ('pepe', 220, '2020/06/22', '23:18:10', 'Bingo Las Vegas'), 
  ('pepe', 230, '2020/06/23', '23:38:13', 'Bingo Las Vegas'), 
  ('pepe', 180, '2020/06/23', '23:45:20', 'Bingo Las Vegas'), 
  ('pepe', 420, '2020/06/23', '23:50:52', 'Bingo Las Vegas'), 
  ('lola', 120, '2020/06/19', '22:55:40', 'Bingo Cristal'), 
  ('lola', 210, '2020/06/19', '23:00:55', 'Bingo Cristal'), 
  ('lola', 130, '2020/06/19', '23:10:15', 'Bingo Cristal'), 
  ('lola', 280, '2020/06/19', '23:20:08', 'Bingo Cristal'), 
  ('lola', 320, '2020/06/19', '23:45:21', 'Bingo Cristal'), 
  ('lola', 295, '2020/06/19', '23:55:09', 'Bingo Cristal'),
  ('ana', 220, '2020/06/21', '23:18:10', 'Bingo Las Vegas'), 
  ('ana', 180, '2020/06/21', '23:38:13', 'Bingo Las Vegas'), 
  ('pepe', 185, '2020/06/21', '23:45:20', 'Bingo Las Vegas'), 
  ('pepe', 225, '2020/06/21', '23:50:52', 'Bingo Las Vegas'), 
  ('lola', 150, '2020/06/21', '22:55:40', 'Bingo Cristal'), 
  ('lola', 110, '2020/06/21', '23:00:55', 'Bingo Cristal'), 
  ('lola', 135, '2020/06/21', '23:10:15', 'Bingo Cristal'), 
  ('lola', 285, '2020/06/21', '23:20:08', 'Bingo Cristal'), 
  ('lola', 325, '2020/06/21', '23:45:21', 'Bingo Cristal'), 
  ('lola', 295, '2020/06/19', '23:55:09', 'Bingo Cristal')

;