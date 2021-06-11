create table usuarios ( login varchar(20) primary key, clave varchar(200));

insert into usuarios values ( 'marco', sha2('123', 256));

-- primero eliminar con drop usuarios y luego añadir el nuevo usuarios