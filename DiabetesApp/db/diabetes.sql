CREATE DATABASE IF NOT EXISTS diabetesdb;
USE diabetesdb;

CREATE TABLE IF NOT EXISTS USUARIOS (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(25) NOT NULL,
    apellidos VARCHAR(50) NOT NULL,
    fecha_nacimiento DATE NOT NULL,
    login VARCHAR(25) NOT NULL,
    pass VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS CONTROL_GLUCOSA (
    id_usuario INT NOT NULL,
    fecha_control DATE NOT NULL,
    glucosa_lenta INT NOT NULL,
    indice_actividad INT NOT NULL,
    PRIMARY KEY (id_usuario, fecha_control),
    FOREIGN KEY (id_usuario) REFERENCES USUARIOS(id_usuario) 
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS COMIDA (
    id_usuario INT NOT NULL,
    fecha_control DATE NOT NULL,
    tipo_comida ENUM ('Desayuno','Aperitivo','Comida','Merienda','Cena') NOT NULL,
    raciones INT NOT NULL,
    glucosa_preingesta INT NOT NULL,
    insulina INT NOT NULL,
    glucosa_postingesta INT NOT NULL,
    PRIMARY KEY (id_usuario, fecha_control, tipo_comida),
    FOREIGN KEY (id_usuario, fecha_control)
        REFERENCES CONTROL_GLUCOSA(id_usuario, fecha_control) 
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS HIPERGLUCEMIA (
    id_usuario INT NOT NULL,
    fecha_control DATE NOT NULL,
    tipo_comida ENUM ('Desayuno','Aperitivo','Comida','Merienda','Cena') NOT NULL,
    glucosa_hiper INT NOT NULL,
    hora_hiper TIME NOT NULL,
    unidades_correccion INT NOT NULL,
    PRIMARY KEY (id_usuario, fecha_control, tipo_comida),
    CONSTRAINT fk_hiperglucemia FOREIGN KEY (id_usuario, fecha_control, tipo_comida)
        REFERENCES COMIDA(id_usuario, fecha_control, tipo_comida) 
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS HIPOGLUCEMIA (
    id_usuario INT NOT NULL,
    fecha_control DATE NOT NULL,
    tipo_comida ENUM ('Desayuno','Aperitivo','Comida','Merienda','Cena') NOT NULL,
    glucosa_hipo INT NOT NULL,
    hora_hipo TIME NOT NULL,
    PRIMARY KEY (id_usuario, fecha_control, tipo_comida),
    CONSTRAINT fk_hipoglucemia FOREIGN KEY (id_usuario, fecha_control, tipo_comida)
        REFERENCES COMIDA(id_usuario, fecha_control, tipo_comida) 
        ON DELETE CASCADE ON UPDATE CASCADE
);
