CREATE DATABASE dbs_blog;

USE dbs_blog;

DROP TABLE IF EXISTS usuarios;

DROP TABLE IF EXISTS categorias;

DROP TABLE IF EXISTS entradas;

CREATE TABLE
    usuarios(
        id INT(255) NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(100) NOT NULL,
        apellidos VARCHAR(100) NOT NULL,
        email VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL,
        fecha_registro DATE NOT NULL,
        CONSTRAINT pk_usuarios PRIMARY KEY(id),
        CONSTRAINT uq_email UNIQUE(email)
    ) ENGINE = InnoDb;

CREATE TABLE
    categorias(
        id INT(255) NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(100),
        CONSTRAINT pk_categorias PRIMARY KEY(id)
    ) ENGINE = InnoDb;

CREATE TABLE
    entradas(
        id INT(255) NOT NULL AUTO_INCREMENT,
        usuario_id INT(255) NOT NULL,
        categoria_id INT(255) NOT NULL,
        titulo VARCHAR(255) NOT NULL,
        descripcion TEXT,
        fecha DATE NOT NULL,
        CONSTRAINT pk_entradas PRIMARY KEY(id),
        CONSTRAINT fk_entrada_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id),
        CONSTRAINT fk_entrada_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id) ON DELETE NO ACTION
    ) ENGINE = InnoDb;

SET NAMES 'utf8mb4';