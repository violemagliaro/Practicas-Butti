CREATE DATABASE IF NOT EXISTS prueba
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;


USE prueba;


CREATE TABLE IF NOT EXISTS buscador (
    canciones VARCHAR(150) NOT NULL
);


INSERT INTO buscador (canciones)
VALUES
('De Música Ligera'),
('Persiana Americana'),
('Cuando Pase el Temblor'),
('La Flaca'),
('Rayando el Sol'),
('Color Esperanza'),
('Mariposa Tecknicolor'),
('Lamento Boliviano'),
('Crimen'),
('Me Gustas Tú');
