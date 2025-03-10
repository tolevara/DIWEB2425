DROP DATABASE IF EXISTS simplificando;
-- Crear BBDD, Tablas y Relaciones
CREATE DATABASE IF NOT EXISTS simplificando
CHARACTER SET utf8mb4
COLLATE utf8mb4_spanish2_ci;
USE simplificando;

CREATE TABLE IF NOT EXISTS usuarios
(
    Correo VARCHAR(40) NOT NULL,
    Clave VARCHAR(40) NOT NULL,
    Nombre VARCHAR(40) NOT NULL,
    Autónomo BOOLEAN NOT NULL,
    Nif_Cif INT NOT NULL,
    Cif INT UNSIGNED NULL,
    PRIMARY KEY pk_productos (Referencia),  -- pk_productos: nombre PK
    INDEX idx_productos (Descripcion)
) ENGINE = innodb
COMMENT = "Tabla productos: ENGINE Motor BBDD";