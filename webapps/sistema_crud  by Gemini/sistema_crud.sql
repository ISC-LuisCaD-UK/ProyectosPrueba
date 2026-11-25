-- // Aplicacion CRUD desarrollada con GeminiIA 2611.12
-- // sitio web: htdocs/sistema_crud

CREATE DATABASE sistema_crud CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE sistema_crud;

CREATE TABLE usuarios(
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Nombre VARCHAR(50) NOT NULL,
    Correo VARCHAR(50) NOT NULL UNIQUE
 ) ENGINE=innoDB DEFAULT CHARSET utf8mb4;
