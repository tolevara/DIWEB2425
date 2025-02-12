--TEMA 09 Y 10 DEL MANUAL
--CREAR BASE DE DATOS(BBDD), TABLAS Y RELACIONES
CREATE DATABASE IF NOT EXISTS simplificando
CHARACTER SET utf8mb4
COLLATE utf8mb4_spanish2_ci;
USE simplificando;


--BORRAR BBDD
DROP DATABASE simplificado;

--CREAR TABLA
--EN PRIMER LUGAR LAS PRINCIPALES!!!!
CREATE TABLE IF NOT EXISTS productos
(
    Referencia TINYINT UNSIGNED NOT NULL, -- IGUAL A NO VACIO--
    Descripcion VARCHAR(40) NOT NULL,
    Precio DECIMAL(5,2) NOT NULL,
    Stock INT UNSIGNED NULL, -- PUEDE NO ESTAR VACIO, COGE LAS DOS VARIABLE--
    PRIMARY KEY pk_productos (Referencia), -- LOS PARENTESIS INDICAN EL VALOR--pk_productos=NOMBRE DE LA TABLA COMMENT
    INDEX idx_productos (Descripcion) -- EL ULTIMO NO LLEVA COMA--
)ENGINE = innodb
COMMENT = "Tabla Principal productos: ENGINE Motor BBDD";

CREATE TABLE IF NOT EXISTS clientes
(
    Nif CHAR(9) NOT NULL,
    Nombre VARCHAR(40) NOT NULL,
    Genero BOOLEAN NULL, -- BOOLEAN VERDADERO O FALSO--
    CodigoPostal INT(10) NOT NULL,
    PRIMARY KEY pk_clientes (NIF), 
    INDEX idx_clientes (Nombre),
    INDEX idx2_clientes (CodigoPostal)
)ENGINE = innodb
COMMENT = "Tabla Principal clientes";

CREATE TABLE IF NOT EXISTS ventas
(
    Fecha DATE  NOT NULL,
    Referencia TINYINT UNSIGNED NOT NULL,
    Nif CHAR(9) NOT NULL,
    PRIMARY KEY pk_ventas (Fecha, Referencia, Nif),
    FOREIGN KEY fk_productos (Referencia) REFERENCES productos (Referencia),
    FOREIGN KEY fk_clientes (Nif) REFERENCES clientes(Nif)
)ENGINE = innodb
COMMENT = "Tabla Relacionadas ventas";


--BORRAR TABLAS--
--PRIMERO BORRAR TABLAS RELACIONADAS Y AL FINAL LAS PRINCIPALES--
--Ejemplo:
--DROP TABLE ventas;
--DROP TABLE clientes;
--DROP TABLE producto;
--DROP TABLE simplificado


--COMPROBAMOS DATOS CON:--
SELECT * FROM productos;
SELECT * FROM clientes;
SELECT * FROM ventas;



--INSERT:
--Sirve para insertar registros
--1º Se inserta registros en tablas principales

--SI SE VAN A METER DATOS EN TODOS LOS CAMPOS, (NO HACE FALTA PONERLOS)
USE simplificando;
INSERT INTO productos 
VALUES (234,"Rotulador Rojo",0.85,2);
INSERT INTO productos (Referencia, Descripcion, Precio)
VALUES (112,"Rotulador Negro",0.85);

INSERT INTO clientes (Nif, Nombre, Genero, CodigoPostal)
VALUES ("11111111A", "Ana", 1, 41702),("22222222B","Maria Jose", 1, 41013),("33333333C","Alfonso", 0,41292)

INSERT INTO ventas (Fecha, Referencia, Nif)
VALUES ("2024-01-10", 234,"11111111A"),("2024-01-10",112,"33333333C"),("2024-01-10",***,"22222222B");


--UPDATE: (MODIFICA LOS DATOS)
--ACTUALIZA DATOS DE LAS TABLAS
--Ejemplo
UPDATE clientes
SET Nombre = "ANA POZO"
WHERE Nif = "11111111A";


UPDATE ventas
SET Fecha = "2024-01-09",
Referencia = 112
WHERE NumTicket = 3,














--TABLA VENTAS:--

DROP TABLE ventas;
CREATE TABLE IF NOT EXISTS ventas 
(
    NumTicket INT AUTO_INCREMENT, 
    Fecha DATE NOT NULL,
    Referencia TINYINT UNSIGNED NOT NULL,
    Nif CHAR(9) NOT NULL,
    INDEX idx_ventas (NumTicket),
    PRIMARY KEY pk_ventas (Fecha, Referencia, Nif),
    FOREIGN KEY fk_productos (Referencia) REFERENCES productos(Referencia),
    FOREIGN KEY fk_clientes (Nif) REFERENCES clientes(Nif)
) ENGINE = innodb
COMMENT = "Tabla Relacionada ventas"


















