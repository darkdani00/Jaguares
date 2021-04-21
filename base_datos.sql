DROP DATABASE IF EXISTS jaguares;
CREATE DATABASE jaguares;
USE jaguares;

CREATE TABLE escuela(
    id_escuela INT PRIMARY KEY AUTO_INCREMENT,
    nombre_escuela VARCHAR(80) NOT NULL,
    direccion_escuela TEXT,
    telefono_escuela INT,
    escuela_status enum('Active','Inactive') DEFAULT 'Active',
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
    grado_cinta_maestro enum("Cinta Negra 1er Dan","Cinta Negra 2do Dan","Cinta Negra 3er Dan","Cinta Negra 4to Dan","Cinta Negra 5to Dan","Cinta Negra 6to Dan","Cinta Negra 7mo Dan","Cinta Negra 8vo Dan","Cinta Negra 9no Dan"),
    password_maestro VARCHAR(80) NOT NULL,
    email_maestro VARCHAR(80) NOT NULL UNIQUE,
    pic_maestro VARCHAR(180) NOT NULL,
    escuelaFk INT,
    FOREIGN KEY(escuelaFk) REFERENCES escuela(id_escuela),
    user_type enum('Admin','Maestro') DEFAULT 'Maestro' NOT NULL,
    maestro_status enum('Active','Inactive') DEFAULT 'Active',
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
    password_alumno VARCHAR(80) NOT NULL,
    grado_cinta_alumno enum("Cinta Blanca","Cinta Amarilla","Cinta Naranja","Cinta Naranja Avanzado","Cinta Verde","Cinta Verde Avanzado","Cinta Azul","Cinta Azul Avanzado","Cinta Rojo","Cinta Rojo Avanzado", "Cinta Negra"),
    escuelaFk INT NOT NULL,
    FOREIGN KEY(escuelaFk) REFERENCES escuela(id_escuela),
    profeFk INT NOT NULL,
    FOREIGN KEY(profeFk) REFERENCES maestro(id_maestro),
    discapacidad_alumno enum('si','no'),
    years_entrenamiento INT,
    tutor_alumno VARCHAR(80),
    user_type enum('Alumno') DEFAULT 'Alumno' NOT NULL,
    alumno_status enum('Active','Inactive') DEFAULT 'Active',
    created_alumno timestamp default current_timestamp,
    update_alumno timestamp default current_timestamp on update current_timestamp
);

CREATE TABLE pago_alumno(
    id_pago_alumno INT PRIMARY KEY AUTO_INCREMENT,
    alumnoFk INT NOT NULL,
    FOREIGN KEY(alumnoFk) REFERENCES alumno(id_alumno),
    created_pago timestamp default current_timestamp
);

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
    FOREIGN KEY(claseFk) REFERENCES clase(id_clase) ON DELETE CASCADE
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

CREATE OR REPLACE VIEW alumnos_clase_view AS SELECT ac.*,c.hora_inicia,c.hora_termina,c.dia_semana,a.*  FROM alumnos_clase AS ac JOIN alumno AS a ON ac.alumnoFk = a.id_alumno JOIN clase AS c ON ac.claseFk = c.id_clase;

CREATE OR REPLACE VIEW asistencia_alumno_view AS SELECT aa.*, ac.*,a.*,c.hora_inicia,c.hora_termina,c.dia_semana FROM asistencia_alumno AS aa JOIN alumnos_clase AS ac ON aa.alumnos_clase_fk = ac.id_alumnos_clase JOIN alumno AS a ON ac.alumnoFk = a.id_alumno JOIN clase AS c ON ac.claseFk = c.id_clase;

--INSERTS--
INSERT INTO escuela (nombre_escuela,direccion_escuela,telefono_escuela) VALUES ('Central','Santa Monica',43234);

INSERT INTO maestro (nombre_maestro,apellido_paterno_maestro,apellido_materno_maestro,genero_maestro,edad_maestro,telefono_maestro,grado_cinta_maestro,password_maestro,email_maestro,escuelaFk,user_type, pic_maestro)
VALUES ('prueba','admin','profe','Masculino',23,44234123,'Cinta Negra 2do Dan','qwerty','admin@admin.com',1,'Admin', 'prueba');
