-- Eliminar duplicados de la tabla productoColor--
/*DELETE t1 FROM producto_color t1
INNER JOIN producto_color t2
WHERE t1.idProductoColor > t2.idProductoColor AND t1.producto_id = t2.producto_id AND t1.color_id = t2.color_id;*/

-- Eliminar duplicados de la tabla productoVoltaje--
/*DELETE t1 FROM producto_voltaje t1
INNER JOIN producto_voltaje t2
WHERE t1.idProductoVoltaje > t2.idProductoVoltaje AND t1.producto_id = t2.producto_id AND t1.voltaje_id = t2.voltaje_id;*/


CREATE DATABASE lorenzetti;

USE lorenzetti;

CREATE TABLE producto (
	idProducto INT(12) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(100) NOT NULL,
	descripcion MEDIUMTEXT NULL,
	precio DOUBLE NOT NULL,
	imagen VARCHAR(45) NOT NULL,
	ubicacion VARCHAR(100) NOT NULL,
	imgxcien VARCHAR(100) NOT NULL,
	categoria_id INT(12) NULL,
	estado VARCHAR(45) NOT NULL,
	voltaje VARCHAR(10) NULL,
	color VARCHAR(10) NULL
);

ALTER TABLE producto ADD FULLTEXT(nombre);

CREATE TABLE categoria (
	idCategoria INT(12) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nombre VARCHAR(40) NOT NULL,
	imagen VARCHAR(45) NOT NULL,
	ubicacion VARCHAR(100) NOT NULL
);

CREATE TABLE voltaje (
	idVoltaje INT(12) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nombre VARCHAR(10) NOT NULL
);

CREATE TABLE color (
	idColor INT(12) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nombre VARCHAR(10) NOT NULL,
	imgColor VARCHAR(45) NULL
);

CREATE TABLE cliente (
	idCliente INT(12) PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombre VARCHAR(45) NOT NULL,
    correo VARCHAR(90) NOT NULL,
    telefono VARCHAR(12) NOT NULL
);

CREATE TABLE departamento (
	idDepartamento INT(12) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nombre VARCHAR(45) NOT NULL
);

CREATE TABLE municipio (
	idMunicipio INT(12) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	departamento_id BIGINT(20) NOT NULL,
	codigo INT(11) NOT NULL,
	nombre VARCHAR(255) NOT NULL,
	flete DOUBLE NULL
);

CREATE TABLE factura (
	idFactura INT(12) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	fecha DATETIME NOT NULL,
	cliente_id INT(12) NOT NULL,
	modPago_id INT(12) NOT NULL,
	refac VARCHAR(30) NOT NULL,
	transaccion VARCHAR(30) NULL,
	departamento_id BIGINT(20) NULL,
	municipio_id BIGINT(20) NULL,
	direccion VARCHAR(100) NOT NULL,
	vEnvio DOUBLE NOT NULL
);

CREATE TABLE detalle_factura (
	idDetalle INT(12) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	cantidad INT(12) NOT NULL,
	precio DOUBLE NOT NULL,
	producto_id INT(12) NOT NULL,
	factura_id INT(12) NOT NULL
);

CREATE TABLE fichasTec (
	idFichas INT(12) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nombre VARCHAR(50) NOT NULL,
	imagen VARCHAR(45) NOT NULL,
	Ubicacion VARCHAR(100) NOT NULL
);

CREATE TABLE mod_Pago (
	idModPago INT(12) PRIMARY KEY AUTO_INCREMENT NOT NULL,
	nombre VARCHAR(50) NOT NULL
);

CREATE TABLE producto_voltaje (
  producto_id INT(12) NOT NULL,
  voltaje_id INT(12) NOT NULL
);

CREATE TABLE producto_color (
	producto_id INT(12) NOT NULL,
	color_id INT(12) NOT NULL,
	imagen VARCHAR(45) NOT NULL,
	ubicacion VARCHAR(100) NOT NULL
);

CREATE TABLE productosistema (
	idProducto INT(12) NOT NULL,
	codigo VARCHAR(20) NOT NULL,
	nombre VARCHAR(100) NOT NULL,
	voltaje_id INT(12) NULL,
	color_id INT(12) NULL,
	producto_id INT(12) NOT NULL
);

CREATE TABLE helpfaq (
	idHelpfaq INT(12) NOT NULL PRIMARY KEY AUTO_INCREMENT NOT NULL,
	question VARCHAR(100) NOT NULL,
	answer VARCHAR(200) NOT NULL,
	/*categoria_id INT(12) NOT NULL*/
)

/*ALTER TABLE
	helpfaq
ADD CONSTRAINT
	fk_helpfaqCategoria
FOREIGN KEY
	(categoria_id)
REFERENCES
	categoria(idCategoria)
ON DELETE CASCADE
ON UPDATE CASCADE;*/

ALTER TABLE producto_voltaje
  ADD KEY fk_productoVoltaje (producto_id),
  ADD KEY fk_voltajeProducto (voltaje_id);

ALTER TABLE producto_color
  ADD KEY fk_productoColor (producto_id),
  ADD KEY fk_colorProducto (color_id);

ALTER TABLE
	factura
ADD CONSTRAINT
	fk_departamentoFactura
FOREIGN KEY
	(departamento_id)
REFERENCES
	departamentos(idDepartamento)
ON DELETE CASCADE
ON UPDATE CASCADE,
ADD CONSTRAINT
	fk_municipioFactura
FOREIGN KEY
	(municipio_id)
REFERENCES
	municipios(idMunicipio)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE 
	productosistema
ADD CONSTRAINT 
	fk_productosistemaVoltaje
FOREIGN KEY 
	(voltaje_id) 
REFERENCES 
	voltaje(idVoltaje) 
ON DELETE CASCADE
ON UPDATE CASCADE,
ADD CONSTRAINT 
	fk_productosistemaColor
FOREIGN KEY 
	(color_id) 
REFERENCES 
	color(idColor) 
ON DELETE CASCADE 
ON UPDATE CASCADE,
ADD CONSTRAINT 
	fk_productosistemaProducto
FOREIGN KEY 
	(producto_id) 
REFERENCES 
	producto(idProducto) 
ON DELETE CASCADE 
ON UPDATE CASCADE;

ALTER TABLE 
	producto_voltaje
ADD CONSTRAINT 
	fk_productoVoltaje 
FOREIGN KEY 
	(producto_id) 
REFERENCES 
	producto(idProducto) 
ON DELETE CASCADE
ON UPDATE CASCADE,
ADD CONSTRAINT 
	fk_voltajeProducto 
FOREIGN KEY 
	(voltaje_id) 
REFERENCES 
	voltaje(idVoltaje) 
ON DELETE CASCADE 
ON UPDATE CASCADE;

ALTER TABLE 
	producto_color
ADD CONSTRAINT 
	fk_productoColor 
FOREIGN KEY 
	(producto_id) 
REFERENCES 
	producto(idProducto) 
ON DELETE CASCADE
ON UPDATE CASCADE,
ADD CONSTRAINT 
	fk_colorProducto 
FOREIGN KEY 
	(color_id) 
REFERENCES 
	color(idColor) 
ON DELETE CASCADE 
ON UPDATE CASCADE;

ALTER TABLE 
	producto 
ADD CONSTRAINT
	fk_categoriaProducto
FOREIGN KEY
	(categoria_id)
REFERENCES
	categoria (idCategoria)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE
	factura
ADD CONSTRAINT
	fk_clienteFactura
FOREIGN KEY
	(cliente_id)
REFERENCES
	cliente (idCliente)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE
	factura
ADD CONSTRAINT
	fk_modPagoFactura
FOREIGN KEY
	(modPago_id)
REFERENCES
	mod_Pago(idModPago)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE 
	detalle_factura
ADD CONSTRAINT
	fk_productoDetalle
FOREIGN KEY
	(producto_id)
REFERENCES
	producto(idProducto)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE 
	detalle_factura
ADD CONSTRAINT
	fk_facturaDetalle
FOREIGN KEY
	(factura_id)
REFERENCES
	factura(idFactura)
ON DELETE CASCADE
ON UPDATE CASCADE;

ALTER TABLE
	municipio
ADD CONSTRAINT
	fk_departamentoMunicipio
FOREIGN KEY
	(departamento_id)
REFERENCES
	departamento(idDepartamento)
ON DELETE CASCADE
ON UPDATE CASCADE;


