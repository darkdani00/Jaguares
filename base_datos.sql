DROP DATABASE IF EXISTS jaguares;
CREATE DATABASE jaguares;
USE jaguares;

CREATE TABLE escuela(
    id_escuela INT PRIMARY KEY AUTO_INCREMENT,
    nombre_escuela VARCHAR(80),
    direccion_escuela TEXT,
    telefono_escuela INT
);

CREATE TABLE maestro(
    id_maestro INT PRIMARY KEY AUTO_INCREMENT,
    nombre_maestro VARCHAR(80) NOT NULL,
    apellido_paterno_maestro VARCHAR(80) NOT NULL,
    apellido_materno_maestro VARCHAR(80),
    genero_maestro enum("Masculino","Femenino") NOT NULL,
    edad_maestro INT NOT NULL,
    telefono_maestro INT, 
    grado_cinta_alumno VARCHAR(80),
    password_maestro VARCHAR(80) NOT NULL DEFAULT "password",
    email_maestro VARCHAR(80) NOT NULL UNIQUE
);

CREATE TABLE alumno(
    id_alumno INT PRIMARY KEY AUTO_INCREMENT,
    nombre_alumno VARCHAR(80) NOT NULL,
    apellido_paterno_alumno VARCHAR(80) NOT NULL,
    apellido_materno_alumno VARCHAR(80),
    genero_alumno enum("Masculino","Femenino") NOT NULL,
    edad_alumno INT NOT NULL,
    telefono_alumno INT, 
    email_alumno VARCHAR(80) NOT NULL UNIQUE,
    password_alumno VARCHAR(80) NOT NULL DEFAULT "password",
    grado_cinta_alumno VARCHAR(80)
);

INSERT INTO alumno(nombre_alumno,apellido_paterno_alumno,apellido_materno_alumno,genero_alumno,edad_alumno,telefono_alumno,email_alumno,grado_cinta_alumno,password_alumno) VALUES("Juan","Hernandez","Ramirez","Masculino",13,21231231,"juan_hdez@gmail.com","Roja","1234"),
("Mario","Hernandez","Dorantes","Masculino",13,21231231,"mario_hdez@gmail.com","Roja","1234");
INSERT INTO maestro(nombre_maestro,apellido_paterno_maestro,apellido_materno_maestro,genero_maestro,edad_maestro,telefono_maestro,grado_cinta_alumno,password_maestro,email_maestro) VALUES("Ricardo","Milos","Milos","Masculino",28,1241233123,"Negra","1234","ricardo@milos.com");