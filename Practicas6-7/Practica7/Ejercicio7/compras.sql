
CREATE DATABASE IF NOT EXISTS Compras
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE Compras;

CREATE TABLE IF NOT EXISTS catalogo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    producto VARCHAR(100) NOT NULL,
    precio DECIMAL(11,2) NOT NULL
);

INSERT INTO catalogo (producto, precio)
VALUES
('Cuaderno', 3500.00),
('Lapicera', 1200.00),
('Mochila', 25000.00),
('Carpeta', 2800.00),
('Resaltador', 1500.00);
