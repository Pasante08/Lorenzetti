CREATE DATABASE lorenzetti;

USE lorenzetti;

CREATE TABLE producto (
	idProducto INT(12) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    cocodigo VARCHAR(20) NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    imagen VARCHAR(45) NOT NULL,
    ubicacion VARCHAR(100) NOT NULL,
	categoria_id INT(12) NULL,
	estado VARCHAR(45) NOT NULL,
	voltaje VARCHAR(10) NULL,
	color VARCHAR(10) NULL
);

CREATE TABLE categories (
	idCategoria INT(12) PRIMARY KEY NOT NULL,
	nombre VARCHAR(40) NOT NULL,
	imagen VARCHAR(45) NOT NULL,
	ubicacion VARCHAR(100) NOT NULL
);

CREATE TABLE factura (
	idFactura INT(12) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	fecha DATETIME NOT NULL,

	cliente_id INT(12) NOT NULL
);

CREATE TABLE detalle_factura (
	idDetalle INT(12) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	cantidad INT(12) NOT NULL,
	producto_id INT(12) NOT NULL,
	cotizacion_id INT(12) NOT NULL
);

CREATE TABLE fichasTec (
	idFichas INT(!2) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nombre VARCHAR(50) NOT NULL,
	imagen VARCHAR(45) NOT NULL,
	Ubicacion VARCHAR(100) NOT NULL
);

