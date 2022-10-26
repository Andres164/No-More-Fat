
CREATE TABLE pasientes (
    nombre_usuario VARCHAR(30) PRIMARY KEY,
    password VARCHAR(30) NOT NULL,
    email VARCHAR(100),
    nombre VARCHAR(50),
    apellidos VARCHAR(100),
    direccion VARCHAR(100),
    estado VARCHAR(60),
    codigo_postal VARCHAR(30),
    UNIQUE (email)
);

CREATE TABLE citas (
    id_cita INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_nutriologo INTEGER NOT NULL,
    nombre_usuario VARCHAR(30) NOT NULL,
    fecha_vencimiento DATE NOT NULL,
    cita_fue_atendida BOOLEAN NOT NULL
);

CREATE TABLE recetas_medicas (
    folio INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_nutriologo INTEGER NOT NULL,
    nombre_usuario VARCHAR(30) NOT NULL,
    peso_inicial FLOAT(5, 2) NOT NULL,
    peso_final FLOAT(5, 2),
    fecha_inicio DATE NOT NULL,
    fecha_final DATE NOT NULL,
    descripcion VARCHAR(600)
);

CREATE TABLE alimentos_receta (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_alimento INTEGER,
    folio_receta INTEGER
);

CREATE TABLE alimentos (
    id_alimento INTEGER PRIMARY KEY AUTO_INCREMENT,
    ingredientes VARCHAR(350)  NOT NULL,
    preparacion TEXT
);

CREATE TABLE nutriologo (
    id_nutriologo INTEGER PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50),
    password VARCHAR(30) NOT NULL
);

CREATE TABLE medicamentos_receta (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_medicamento INTEGER,
    folio_receta INTEGER
);

CREATE TABLE medicamentos (
    id_medicamento INTEGER PRIMARY KEY AUTO_INCREMENT,
    meidcamento VARCHAR(60),
    docificacion_mg INTEGER
);
