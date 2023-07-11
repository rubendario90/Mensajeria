CREATE DATABASE automuelles;


CREATE TABLE usuario (
    id int not null auto_increment,
   nombre varchar (50) not null,
    apellido varchar (50) not null, 
correo varchar (50) not null,
nombre_usuario varchar (50) not null,
rol enum ('vendedor', 'mensajero') not null,
 primary key (id));

CREATE TABLE viajes (
  id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
  Nombre_logueo VARCHAR(255) NOT NULL,
  Numero_Factura VARCHAR(255) NOT NULL,
  Nombre_Cliente VARCHAR(255) NOT NULL,
  Numero_Contacto VARCHAR(255) NOT NULL,
  Lugar_Entrega VARCHAR(255) NOT NULL,
  observaciones TEXT NOT NULL,
  Mensajero VARCHAR(255) NOT NULL DEFAULT 'pendiente',
  Estado VARCHAR(255) NOT NULL DEFAULT 'pendiente'
);

CREATE TABLE viajes_2 (
  Nombre_Usuario VARCHAR(255) NOT NULL PRIMARY KEY,
  Numero_Factura VARCHAR(255) NOT NULL,
  Nombre_Cliente VARCHAR(255) NOT NULL,
  Numero_Contacto VARCHAR(255) NOT NULL,
  Lugar_Entrega VARCHAR(255) NOT NULL,
  Observaciones VARCHAR(255),
  Mensajero VARCHAR(255) NOT NULL,
  Estado VARCHAR(255) NOT NULL
);