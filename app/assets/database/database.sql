CREATE DATABASE nombre_de_la_base_de_datos;

USE nombre_de_la_base_de_datos;

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

SET NAMES 'utf8mb4';

INSERT INTO categorias (nombre)
VALUES ('Aventuras'), ('Estrategia'), ('Acción');

/* Ejecutar cuando se tenga dos o más usuarios registrados */

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
        'En esta emocionante aventura, acompañaremos a nuestro intrépido protagonista en la búsqueda de tesoros escondidos en mundos exóticos y peligrosos. A medida que se sumerge en lo desconocido, se enfrentará a desafíos increíbles y descubrirá secretos olvidados. Acompáñanos en este emocionante viaje lleno de sorpresas.',
        '2023-09-17'
    ), (
        2,
        2,
        'Planificación táctica en el juego de estrategia Z',
        'En el mundo competitivo de los juegos de estrategia, la planificación táctica es esencial para alcanzar la victoria. Esta entrada te guiará a través de los intrincados detalles de cómo crear una estrategia ganadora en el juego de estrategia Z. Desde la gestión de recursos hasta las tácticas en el campo de batalla, aprenderás todo lo que necesitas para destacar en este emocionante género.',
        '2023-09-16'
    ), (
        1,
        3,
        'Batalla épica contra monstruos',
        'Prepárate para adentrarte en una crónica de una batalla feroz contra monstruos aterradores en un juego de acción cargado de adrenalina. Nuestro héroe se enfrentará a criaturas colosales y desafíos mortales en su búsqueda de la victoria. Esta entrada te sumergirá en un mundo de emociones intensas y te mostrará cómo sobrevivir a las situaciones más extremas.',
        '2023-09-15'
    ), (
        2,
        4,
        'En busca del tesoro perdido',
        'Únete a nuestra emocionante búsqueda en busca de un tesoro legendario en tierras desconocidas. Aventúrate en un viaje repleto de misterio y peligro mientras descubres pistas y resuelves acertijos en tu camino hacia la gloria. ¿Tendrás lo que se necesita para encontrar el tesoro perdido?',
        '2023-09-14'
    ), (
        1,
        2,
        'Construyendo un imperio',
        'Las estrategias para construir y expandir un imperio en el juego de estrategia A son fundamentales para alcanzar el éxito. Esta entrada te proporcionará consejos, tácticas y estrategias probadas para convertirte en un gobernante poderoso y respetado. Desde la gestión de recursos hasta las alianzas políticas, descubre cómo crear tu propio imperio.',
        '2023-09-13'
    ), (
        2,
        1,
        'Combates intensos en el campo de batalla',
        'Experimenta la emoción de los combates intensos en el campo de batalla mientras te adentras en un juego de acción de alto octanaje. En esta entrada, te sumergirás en experiencias de combate emocionantes, enfrentándote a enemigos formidables y desatando poderosas habilidades. Prepárate para la acción sin límites y demuestra tu valentía en el campo de batalla.',
        '2023-09-12'
    );