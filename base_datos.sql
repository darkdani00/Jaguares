DROP DATABASE IF EXISTS jaguares;
CREATE DATABASE jaguares;
USE jaguares;

CREATE TABLE escuela(
    id_escuela INT PRIMARY KEY AUTO_INCREMENT,
    nombre_escuela VARCHAR(80) NOT NULL,
    direccion_escuela TEXT,
    telefono_escuela INT,
    created_escuela timestamp default current_timestamp,
    update_escuela timestamp default current_timestamp on update current_timestamp
);

CREATE TABLE maestro(
    id_maestro INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    nombre_maestro VARCHAR(80) NOT NULL,
    apellido_paterno_maestro VARCHAR(80) NOT NULL,
    apellido_materno_maestro VARCHAR(80),
    genero_maestro enum("Masculino","Femenino") NOT NULL,
    edad_maestro INT NOT NULL,
    telefono_maestro INT, 
    grado_cinta_maestro enum("Cinta Blanca","Cinta Amarilla","Cinta Naranja","Cinta Naranja Avanzado","Cinta Verde","Cinta Verde Avanzado","Cinta Azul","Cinta Azul Avanzado","Cinta Rojo","Cinta Rojo Avanzado", "Cinta Negra"),
    password_maestro VARCHAR(80) NOT NULL DEFAULT "password",
    email_maestro VARCHAR(80) NOT NULL UNIQUE,
    escuelaFk INT NOT NULL,
    FOREIGN KEY(escuelaFk) REFERENCES escuela(id_escuela),
    user_type enum('Admin','Normal') DEFAULT 'Normal',
    created_maestro timestamp default current_timestamp,
    update_maestro timestamp default current_timestamp on update current_timestamp
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
    grado_cinta_alumno enum("Cinta Blanca","Cinta Amarilla","Cinta Naranja","Cinta Naranja Avanzado","Cinta Verde","Cinta Verde Avanzado","Cinta Azul","Cinta Azul Avanzado","Cinta Rojo","Cinta Rojo Avanzado", "Cinta Negra"),
    escuelaFk INT NOT NULL,
    FOREIGN KEY(escuelaFk) REFERENCES escuela(id_escuela),
    profeFk INT NOT NULL,
    FOREIGN KEY(profeFk) REFERENCES maestro(id_maestro),
    discapacidad_alumno enum('si','no'),
    years_entrenamiento INT,
    tutor_alumno VARCHAR(80),
    hora_entrenamiento_alumno DATETIME,
    pago_realizado enum('si','no'),
    created_alumno timestamp default current_timestamp,
    update_alumno timestamp default current_timestamp on update current_timestamp
);

<<<<<<< Updated upstream
INSERT INTO escuela(nombre_escuela,direccion_escuela, telefono_escuela) VALUES ('jaguares','centro',137861);

INSERT INTO alumno(nombre_alumno,apellido_paterno_alumno,apellido_materno_alumno,genero_alumno,edad_alumno,telefono_alumno,email_alumno,grado_cinta_alumno,password_alumno,escuelaFk) VALUES("Juan","Hernandez","Ramirez","Masculino",13,21231231,"juan_hdez@gmail.com","Roja","1234"),
("Mario","Hernandez","Dorantes","Masculino",13,21231231,"mario_hdez@gmail.com","Roja","1234",1);
INSERT INTO maestro(nombre_maestro,apellido_paterno_maestro,apellido_materno_maestro,genero_maestro,edad_maestro,telefono_maestro,grado_cinta_alumno,password_maestro,email_maestro,escuelaFk) VALUES("Ricardo","Milos","Milos","Masculino",28,1241233123,"Negra","1234","ricardo@milos.com",1);


CREATE OR REPLACE VIEW alumno_view AS SELECT a.*,e.*,m.id_maestro,m.nombre_maestro,m.apellido_paterno_maestro,m.apellido_materno_maestro FROM alumno AS a JOIN escuela AS e ON a.escuelaFk = e.id_escuela JOIN maestro AS m ON a.profeFk = m.id_maestro;

CREATE OR REPLACE VIEW maestro_view AS SELECT m.*,e.* FROM maestro AS m JOIN escuela AS e ON m.escuelaFk = e.id_escuela;
=======
CREATE TABLE clase(
    id_clase INT PRIMARY KEY AUTO_INCREMENT,
    hora_inicia TIME NOT NULL,
    hora_termina TIME NOT NULL,
    dia_semana INT,
    profeFk INT NOT NULL,
    FOREIGN KEY(profeFk) REFERENCES maestro(id_maestro)
);

CREATE TABLE alumnos_clase(
    id_alumnos_clase INT PRIMARY KEY AUTO_INCREMENT,
    alumnoFk INT NOT NULL,
    FOREIGN KEY(alumnoFk) REFERENCES alumno(id_alumno),
    claseFk INT NOT NULL,
    FOREIGN KEY(claseFk) REFERENCES clase(id_clase)
);

CREATE TABLE asistencia_alumno(
    id_asistencia_alumno INT PRIMARY KEY AUTO_INCREMENT,
    fecha DATE NOT NULL,
    alumnos_clase_fk INT NOT NULL,
    FOREIGN KEY(alumnos_clase_fk) REFERENCES alumnos_clase(id_alumnos_clase),
    asistencia enum("Presente","Ausente")
);

-- Vistas ---
CREATE OR REPLACE VIEW clase_view AS SELECT m.*, c.* FROM clase AS c JOIN maestro AS m ON c.profeFk = m.id_maestro;

CREATE OR REPLACE VIEW alumno_view AS SELECT a.*,e.*,m.id_maestro,m.nombre_maestro,m.apellido_paterno_maestro,m.apellido_materno_maestro FROM alumno AS a JOIN escuela AS e ON a.escuelaFk = e.id_escuela JOIN maestro AS m ON a.profeFk = m.id_maestro;

CREATE OR REPLACE VIEW maestro_view AS SELECT m.*,e.* FROM maestro AS m JOIN escuela AS e ON m.escuelaFk = e.id_escuela;

CREATE OR REPLACE VIEW clase_view AS SELECT c.*,m.*  FROM clase AS c JOIN maestro AS m ON c.profeFk = m.id_maestro;

CREATE OR REPLACE VIEW alumnos_clase_view AS SELECT ac.*,c.hora_inicia,c.hora_termina,c.dia_semana,a.*  FROM alumnos_clase AS ac JOIN alumno AS a ON ac.alumnoFk = a.id_alumno JOIN clase AS c ON ac.claseFk = c.id_clase;

-- Escuela --
INSERT INTO escuela(nombre_escuela,direccion_escuela,telefono_escuela) VALUES ('Central','Santa Monica',2456013);
INSERT INTO escuela(nombre_escuela,direccion_escuela,telefono_escuela) VALUES ('Pie de la cuesta','Pie de la cuesta',41543215);
INSERT INTO escuela(nombre_escuela,direccion_escuela,telefono_escuela) VALUES ('Reforma','por un lugar',245681);
-- Maestro --
INSERT INTO maestro(nombre_maestro,apellido_paterno_maestro,apellido_materno_maestro,genero_maestro,edad_maestro,telefono_maestro,grado_cinta_maestro,password_maestro,email_maestro,escuelaFk) VALUES ('maestro','prueba','perron','Masculino',30,442534586,'Cinta Negra','contraseña','maestro@maestro.com',3);
-- Alumno --
INSERT INTO alumno(nombre_alumno,apellido_paterno_alumno,apellido_materno_alumno,genero_alumno,edad_alumno,telefono_alumno,email_alumno,password_alumno,grado_cinta_alumno,escuelaFk,profeFk,discapacidad_alumno,years_entrenamiento,tutor_alumno,hora_entrenamiento_alumno,pago_realizado) VALUES ('Max','Smith','juarez','Femenino',15,445245624,'alumno@alumno.com','alumno','Cinta Verde',2,3,'no',0,'Maria juana','05','si');
>>>>>>> Stashed changes
