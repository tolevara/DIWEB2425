-- Tema 09 y 10 del Manual
-- Borrar BBDD
DROP DATABASE IF EXISTS fp_pro;
-- Crear BBDD, Tablas y Relaciones
CREATE DATABASE IF NOT EXISTS fp_pro
CHARACTER SET utf8mb4
COLLATE utf8mb4_spanish2_ci;
USE fp_pro;

-- Crear Tablas: En primer lugar las PRINCIPALES!!!!!!
-- Tabla docentes
CREATE TABLE IF NOT EXISTS docentes
(
    nif CHAR(9)  NOT NULL,   -- Not null = No vacio
    nombre VARCHAR(50) NOT NULL,
    edad TINYINT NOT NULL,
    PRIMARY KEY pk_docentes (nif),  -- pk_productos: nombre PK
    INDEX idx_docentes (nombre)
) ENGINE = innodb
COMMENT = "Tabla docentes: ENGINE Motor BBDD";


-- Tabla ventas
CREATE TABLE IF NOT EXISTS alumnos 
(
	nif CHAR(9) NOT NULL, 
    nombre VARCHAR(50) NOT NULL,
    fechanac DATE NOT NULL,
    pagado BOOLEAN NOT NULL,
    importe DECIMAL(5,2) NOT NULL,
    docentes_nif CHAR(9) NOT NULL ,
    INDEX idx_alumnos  (nombre) ,
    PRIMARY KEY pk_alumnos (nif),
    FOREIGN KEY fk_alumnos (docentes_nif) REFERENCES docentes (nif)
) ENGINE = innodb
COMMENT = "Tabla Relacionada alumnos";

-- Saco estructura tablas
DESCRIBE docentes;
DESCRIBE alumnos;

USE fp_pro;

INSERT INTO docentes (nif, nombre, edad)
VALUES ("11111111A", "Iván Rodriguez", 48),
 ("22222222A", "Isabel Alvarez", 38),
 ("33333333A", "Adela", 39);


 SELECT * FROM docentes;

INSERT INTO alumnos (nif, nombre, fechanac, pagado, importe, docentes_nif)
VALUES 
("44444444D", "Alfonso Casillas", "1998-03-20", 1, 125.55, "11111111A" ),
("55555555D", "Maria Jose", "1989-08-24", 1, 125.55, "11111111A" ),
("66666666D", "Ana Pozo", "1994-03-21", 1, 125.55, "11111111A" );

 SELECT * FROM alumnos;



