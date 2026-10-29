
CREATE DATABASE IF NOT EXISTS base2
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE base2;

CREATE TABLE IF NOT EXISTS alumnos (
    codigo INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    codigocurso INT NOT NULL,
    mail VARCHAR(150) NOT NULL UNIQUE
);

INSERT INTO alumnos
(nombre, codigocurso, mail)
VALUES
('Sofia', 101, 'sofia@ejemplo.com'),
('Juan', 102, 'juan@ejemplo.com'),
('Maria', 101, 'maria@ejemplo.com'),
('Pedro', 103, 'pedro@ejemplo.com');
