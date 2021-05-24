create table usuarios2 ( login varchar(20) primary key, clave varchar(200));

insert into usuarios2 values ( 'marco', sha2('123', 256));
