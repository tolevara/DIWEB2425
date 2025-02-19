-- Tema 09 y 10 del Manual
-- Borrar BBDD
DROP DATABASE IF EXISTS tarea03_ECI;
-- Crear BBDD, Tablas y Relaciones
CREATE DATABASE IF NOT EXISTS tarea03_ECI
CHARACTER SET utf8mb4
COLLATE utf8mb4_spanish2_ci;
USE tarea03_ECI;

-- Crear Tablas: En primer lugar las PRINCIPALES!!!!!!
-- Tabla productos
CREATE TABLE IF NOT EXISTS usuarios
(
    (
    correo VARCHAR(255) NOT NULL,
    clave VARCHAR(255) NOT NULL,
    nombre VARCHAR(255) NOT NULL,
    autonomo BOOLEAN NOT NULL,
    nif_cif INT NOT NULL
    PRIMARY KEY pk_usuarios (correo)  -- pk_productos: nombre PK
) ENGINE = innodb
COMMENT = "Tabla usuarios: ENGINE Motor BBDD";

-- Sirve para insertar registros

USE tarea03_ECI;;

-- Si se van a meter datos en TODOS los campos, no hace falta ponerlos
INSERT INTO usuarios 
VALUES ("tolevara@gmail.com", "1234", "Maria José", "Toledano", "Vara", 1, 12345678);


