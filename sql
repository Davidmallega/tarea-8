CREATE DATABASE maria_auxiliadora_bd;

USE maria_auxiliadora_bd;

CREATE TABLE docentes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    rut VARCHAR(20) NOT NULL UNIQUE
);

CREATE TABLE asistencia (
    id INT AUTO_INCREMENT PRIMARY KEY,
    Fecha DATE NOT NULL,
    hora_de_entrada TIME NOT NULL,
    hora_de_salida TIME NOT NULL,
    rut VARCHAR(20) NOT NULL,
    FOREIGN KEY (rut) REFERENCES docentes(rut)
);

ALTER TABLE docentes ADD COLUMN asignatura VARCHAR(100);

ALTER TABLE docentes ADD COLUMN foto VARCHAR(255);


USE maria_auxiliadora_bd;

docentes agregados rapidamente 
INSERT INTO docentes (nombre, apellido, rut) VALUES
('Juan Carlos', 'Pérez López', '18.123.456-1'),
('María José', 'González Díaz', '17.234.567-2'),
('Pedro Antonio', 'Ramírez Muñoz', '16.345.678-3'),
('Ana Isabel', 'Fernández García', '15.456.789-4'),
('Luis Alberto', 'Martínez Pérez', '14.567.890-5'),
('Laura Patricia', 'Hernández Sánchez', '13.678.901-6'),
('Carlos Enrique', 'López Martínez', '12.789.012-7'),
('Marta Elena', 'García Rodríguez', '11.890.123-8'),
('José Manuel', 'Rodríguez Fernández', '19.901.234-9'),
('Lucía María', 'Sánchez González', '20.012.345-0'),
('Miguel Ángel', 'Torres Díaz', '21.123.456-1'),
('Elena Isabel', 'Vargas Pérez', '22.234.567-2'),
('David Andrés', 'Ruiz Muñoz', '23.345.678-3'),
('Sara Sofía', 'Molina García', '24.456.789-4'),
('Javier Eduardo', 'Navarro Sánchez', '25.567.890-5'),
('Carmen Julia', 'Ortega Martínez', '26.678.901-6'),
('Raúl Antonio', 'Pascual Rodríguez', '27.789.012-7'),
('Paula Andrea', 'Romero Fernández', '28.890.123-8'),
('Adrián Luis', 'Jiménez González', '29.901.234-9'),
('Alba Carolina', 'Morales Pérez', '30.012.345-0');
