CREATE DATABASE nombre_de_la_base_de_datos;

USE nombre_de_la_base_de_datos;

SET NAMES 'utf8mb4';

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
    entradas (
        id INT(255) NOT NULL AUTO_INCREMENT,
        usuario_id INT(255) NOT NULL,
        categoria_id INT(255) NOT NULL,
        titulo VARCHAR(255) NOT NULL,
        descripcion TEXT,
        fecha DATE NOT NULL,
        PRIMARY KEY (id),
        INDEX idx_usuario_id (usuario_id),
        INDEX idx_categoria_id (categoria_id),
        CONSTRAINT `fk_entradas_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES usuarios (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
        CONSTRAINT `fk_entradas_categorias` FOREIGN KEY (`categoria_id`) REFERENCES categorias (`id`) ON DELETE CASCADE ON UPDATE CASCADE
    ) ENGINE = InnoDB;

INSERT INTO categorias (nombre)
VALUES ('Aventuras'), ('Estrategia'), ('Accion');

INSERT INTO
    usuarios (
        nombre,
        apellidos,
        email,
        password,
        fecha_registro
    )
VALUES (
        'Nombre1',
        'Apellidos1',
        'email1@falso.com',
        'password',
        '2023-09-17'
    ), (
        'Nombre2',
        'Apellidos2',
        'email2@falso.com',
        'password',
        '2023-09-16'
    );

INSERT INTO
    entradas (
        usuario_id,
        categoria_id,
        titulo,
        descripcion,
        fecha
    )
VALUES (
        1,
        1,
        'Explorando mundos misteriosos',
        'En esta emocionante aventura, acompañaremos a nuestro intrepido protagonista en la busqueda de tesoros escondidos en mundos exoticos y peligrosos. A medida que se sumerge en lo desconocido, se enfrentara a desafios increibles y descubrira secretos olvidados. Acompañanos en este emocionante viaje lleno de sorpresas.',
        '2023-09-17'
    ), (
        2,
        2,
        'Planificacion tactica en el juego de estrategia Z',
        'En el mundo competitivo de los juegos de estrategia, la planificacion tactica es esencial para alcanzar la victoria. Esta entrada te guiara a traves de los intrincados detalles de como crear una estrategia ganadora en el juego de estrategia Z. Desde la gestion de recursos hasta las tacticas en el campo de batalla, aprenderas todo lo que necesitas para destacar en este emocionante genero.',
        '2023-09-16'
    ), (
        1,
        3,
        'Batalla epica contra monstruos',
        'Preparate para adentrarte en una cronica de una batalla feroz contra monstruos aterradores en un juego de accion cargado de adrenalina. Nuestro heroe se enfrentara a criaturas colosales y desafios mortales en su busqueda de la victoria. Esta entrada te sumergira en un mundo de emociones intensas y te mostrara como sobrevivir a las situaciones mas extremas.',
        '2023-09-15'
    ), (
        2,
        3,
        'En busca del tesoro perdido',
        'unete a nuestra emocionante busqueda en busca de un tesoro legendario en tierras desconocidas. Aventurate en un viaje repleto de misterio y peligro mientras descubres pistas y resuelves acertijos en tu camino hacia la gloria. ¿Tendras lo que se necesita para encontrar el tesoro perdido?',
        '2023-09-14'
    ), (
        1,
        2,
        'Construyendo un imperio',
        'Las estrategias para construir y expandir un imperio en el juego de estrategia A son fundamentales para alcanzar el exito. Esta entrada te proporcionara consejos, tacticas y estrategias probadas para convertirte en un gobernante poderoso y respetado. Desde la gestion de recursos hasta las alianzas politicas, descubre como crear tu propio imperio.',
        '2023-09-13'
    ), (
        2,
        1,
        'Combates intensos en el campo de batalla',
        'Experimenta la emocion de los combates intensos en el campo de batalla mientras te adentras en un juego de accion de alto octanaje. En esta entrada, te sumergiras en experiencias de combate emocionantes, enfrentandote a enemigos formidables y desatando poderosas habilidades. Preparate para la accion sin limites y demuestra tu valentia en el campo de batalla.',
        '2023-09-12'
    );