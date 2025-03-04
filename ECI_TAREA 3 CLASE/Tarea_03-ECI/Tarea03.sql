

DROP DATABASE IF EXISTS tarea03_ECI; -- Crear BBDD, Tablas y Relaciones--

CREATE DATABASE IF NOT EXISTS tarea03_ECI
CHARACTER SET utf8mb4
COLLATE utf8mb4_spanish2_ci;
USE tarea03_ECI;

CREATE TABLE IF NOT EXISTS usuarios   -- Crear Tablas: En primer lugar las PRINCIPALES!!!--
(   correo VARCHAR(40) NOT NULL,   
    clave VARCHAR(40) NOT NULL,
    nombre VARCHAR(40) NOT NULL,
    autonomo BOOLEAN NOT NULL,
    nif_cif INT NOT NULL,
    PRIMARY KEY pk_usuarios (correo)  
) ENGINE = innodb
COMMENT = "Tabla usuarios: ENGINE Motor BBDD";



USE tarea03_ECI;   -- Sirve para insertar registros
INSERT INTO usuarios 
VALUES ("tolevara@gmail.com", "1234", "Maria José", 1, 11111111);

