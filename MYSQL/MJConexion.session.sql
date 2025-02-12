OW TABLES;

/* 01. Consulta por campos */
/* Usamos cláusula LIMIT -> Nº Registros */
SELECT Name, CountryCode 
FROM city 
LIMIT 10;

-- 02. Consulta SIN registros repetidos 
-- Usamos cláusula DISTINCT
SELECT DISTINCT Continent 
FROM country;

-- 03. Consulta de tabla completa (*)
SELECT * FROM countrylanguage;

-- 04. Filtrado de registros
-- Uso de WHERE 
SELECT * FROM countrylanguage
WHERE CountryCode = "USA";

-- 04b. Filtrado con Operadores
-- Uso de WHERE + AND
SELECT * FROM city
WHERE CountryCode = "ESP"
AND Population > 500000;

-- 04c. Filtrado con Operadores
-- Uso de WHERE + OR
SELECT * FROM city
WHERE District = "Madrid"
OR District = "Andalusia";

-- 05. Ordenaciones
-- Uso de ORDER BY ... ASC / DESC
SELECT * FROM city
WHERE District = "Andalusia"
ORDER BY Population ASC;

-- 06. Ordenaciones con Operadores
SELECT * FROM city
WHERE District = "Andalusia"
AND Population > 200000
ORDER BY Population ASC;

-- 07. Conjuntos
-- Uso de la cláusula IN
SELECT Name, District
FROM city
WHERE Name IN ("Sevilla", "Bilbao", "Vigo");

-- 08. Funciones de Agregación:
-- COUNT (contar)
SELECT COUNT(Name)
FROM city
WHERE CountryCode = "ESP"
AND Population > 100000;

-- Ejercicio: Nº Ciudades de Francia, España y Portugal
SELECT COUNT(Name)
FROM city
WHERE CountryCode IN ("ESP", "FRA", "PRT");

-- 08b. Funciones de Agregación adicionales:
-- AVG (Media), SUM (suma), MAX, MIN
SELECT AVG(Population)
FROM city
WHERE District = "Andalusia";

-- 09. Agrupación
-- Cláusula GROUP BY -> Asociado a Funciones de agregación
-- Población de las ciudades mas grandes de ESP, FRA y PRT
USE world;
SELECT CountryCode, MAX(Population) AS MaxPopulation
FROM city
WHERE CountryCode IN ('FRA', 'ESP', 'PRT')
GROUP BY CountryCode;

-- 10. Agrupación y filtrado (WHERE para los GROUP BY)
-- WHERE ahora se llama -> Having
--Ejemplo:
SELECT ContryCode, Count(Name) AS NumCiudades --CAMBIA NOMBRE
FROM City
GROUP BY ContryCode;


--11. JOINS!-> UNIR TABLAS
SELECT city.Name, contry.Name, Language
FROM city,country,countrylanguage
WHERE
city.ContryCode = country.code
AND country.Code = countrylanguage.CountryCode
AND city.Name = "Seville";
AND countrylanguage.Language = "Spanish";


- 11. JOINS! Unir 2 tablas
SELECT * FROM city WHERE Name = "Paris";
SELECT Name, Code, Continent, Population FROM country WHERE Code = "FRA";

-- Y ahora el JOIN
SELECT city.Name, CountryCode, District, Continent, country.Population 
FROM city, country 
WHERE city.CountryCode = country.Code 
AND city.Name = "Paris";

-- 12. JOINS! Unir 3 tablas
SELECT city.Name, country.Name, Language
FROM city, country, countrylanguage
WHERE
city.CountryCode = country.Code 
AND country.Code = countrylanguage.CountryCode
AND city.Name = "Sevilla"
AND countrylanguage.Language = "Spanish";

-- Ejercicio:
-- Sácame Distrito, Población (de la ciudad), Continente,
-- nombre del pais, idioma y porcentaje para ciudades llamadas Córdoba
-- y donde se habla el español (Spanish)
-- mysql -u root -p # root
-- USE world;

SELECT city.District, city.Population,
country.Continent, country.Name,
countrylanguage.Language, countrylanguage.Percentange
FROM city, country, countrylanguage
WHERE city.Name= "Córdoba"
AND countrylanguage.Language = "Spanish"
AND country.Code = contry.Code
AND country.Code = countrylanguage.CountryCode;








