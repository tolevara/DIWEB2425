-- Tema 09 y 10 del Manual
-- Borrar BBDD
DROP DATABASE IF EXISTS tarea03_ECI;
-- Crear BBDD, Tablas y Relaciones
CREATE DATABASE IF NOT EXISTS tarea03_ECI
CHARACTER SET utf8mb4
COLLATE utf8mb4_spanish2_ci;
USE tarea03_ECI;

-- Crear Tablas: En primer lugar las PRINCIPALES!!!!!!

CREATE TABLE IF NOT EXISTS usuarios
(
    correo VARCHAR(40) NOT NULL,   
    clave VARCHAR(40) NOT NULL,
    nombre VARCHAR(40) NOT NULL,
    apellido1 VARCHAR(40) NOT NULL,
    apellido2 VARCHAR(40) NOT NULL,
    autonomo BOOLEAN DEFAULT 0,
    nif_cif INT NOT NULL,
    PRIMARY KEY pk_usuarios (correo)  
) ENGINE = innodb
COMMENT = "Tabla usuarios: ENGINE Motor BBDD";  


USE tarea03_ECI;;

INSERT INTO usuarios 
VALUES ("tolevara@gmail.com", "1234", "María José", "Toledano", "Vara", 1, "11111111");

UPDATE usuarios
SET clave = '1234',
    nombre = 'María José', 
    apellido1 = Toledano,
    apellido2 = Vara,
    autonomo = 0,
    nif_cif = 11111111
WHERE clave = 1;  

DELETE FROM usuarios WHERE usuarios;  /*DELETE FROM usuarios WHERE id = 1;*/













