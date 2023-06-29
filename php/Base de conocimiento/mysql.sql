CREATE DATABASE automuelles;

USE automuelles;

CREATE TABLE inventario (
  id INT PRIMARY KEY AUTO_INCREMENT,
  referencia VARCHAR(255) NOT NULL,
  descripcion VARCHAR(255) NOT NULL,
  observaciones varchar(255) not null,
  imagen_nombre VARCHAR(255),
  imagen_tipo VARCHAR(255),
  imagen_contenido LONGBLOB
);

DROP TABLE registro_viaje;

