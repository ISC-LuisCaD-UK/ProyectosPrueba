CREATE DATABASE sistema_productos;
USE sistema_productos;

CREATE TABLE productos(
    id INT AUTO_INCREMENT PRIMARY KEY, 
    nombre VARCHAR(100) NOT NULL, 
    precio DECIMAL(10,2) NOT NULL
);

-- COMMENT insertamos un registro inicial de prueba
INSERT INTO productos (nombre, precio) VALUES ('Laptop Gamer', 12000.00);