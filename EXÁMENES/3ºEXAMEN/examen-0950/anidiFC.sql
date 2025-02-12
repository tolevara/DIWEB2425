-- anidiFC.sql --

DROP DATABASE IF EXISTS anidiFC;
-- Crear BBDD, Tablas y Relaciones
CREATE DATABASE IF NOT EXISTS anidiFC
CHARACTER SET utf8mb4
COLLATE utf8mb4_spanish2_ci;
USE anidiFC;

-- Crear Tablas: En primer lugar las PRINCIPALES!!!!!!

CREATE TABLE IF NOT EXISTS clubes
(
    idclub TINYINT NOT NULL,
    club VARCHAR(45),
    internacional BOOLEAN NOT NULL,
    PRIMARY KEY clubes (idclub),  
    INDEX idx_clubes (club)
) ENGINE = innodb
COMMENT = "Tabla clubes: ENGINE Motor BBDD";


CREATE TABLE IF NOT EXISTS jugadores 
(
	nif CHAR(9) NOT NULL, 
    nombre VARCHAR(45) NOT NULL,
    edad TINYINT NOT NULL,
    fincontrato DATE NOT NULL,
    posiciones VARCHAR(45),
    club TINYINT NOT NULL,
    INDEX idx_jugadores  (nombre) ,
    PRIMARY KEY pk_jugadores (nif),
    FOREIGN KEY fk_jugadores (idclub) REFERENCES clubes (idclub)
) ENGINE = innodb
COMMENT = "Tabla Relacionada jugadores";

-- Saco estructura tablas
DESCRIBE clubes;
DESCRIBE jugadores;

USE anidiFC;

INSERT INTO clubes (idclub, club, internacional)
VALUES (1, "Morado", 1),
 (2, "Morado", 0),
 (3, "Morado", 1);


 SELECT * FROM clubes;

INSERT INTO jugadores (nif, nombre, edad, fincontrato, posiciones, club)
VALUES 
("44444444D", "Alfonso", 28, "2025-08-31", "delantero",1 ),
("55555555D", "Ronaldo", 28, "2025-08-31", "portero", 3),
("66666666D", "Mesi", 28,"1994-03-21", "lateral", 2 );

 SELECT * FROM jugadores;



