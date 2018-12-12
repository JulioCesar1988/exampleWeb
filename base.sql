SET FOREIGN_KEY_CHECKS=0;

SET NAMES utf8;

DROP TABLE IF EXISTS  publicacion, usuario, usuario_sigue_a_usuario;


  CREATE TABLE `usuario` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `usuario` varchar(50) NOT NULL,
    `clave` varchar(255) NOT NULL,
    `nombre` varchar(100) NOT NULL,
    `apellido` varchar(100) NOT NULL,
    `mail` varchar(45) NOT NULL,
    PRIMARY KEY (id)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

  INSERT INTO usuario (id, usuario, clave, nombre, apellido, mail) VALUES (1, 'john.doe', '123', 'John', 'Doe', 'johndoe@gmail.com');
  INSERT INTO usuario (id, usuario, clave, nombre, apellido, mail) VALUES (2, 'juan.perez', '123', 'Juan', 'Perez', 'juanperez@gmail.com');
  INSERT INTO usuario (id, usuario, clave, nombre, apellido, mail) VALUES (3, 'john.carlos', '123', 'Juan', 'Carlos', 'juancarlos@gmail.com');

  CREATE TABLE `usuario_sigue_a_usuario` (
    `usuario_id` int(10) NOT NULL, -- Usuario Autor - Referencia al ID de la tabla usuario
    `usuario_seguidor_id` int(10) NOT NULL, -- Usuario Seguidor - Referencia al ID de la tabla usuario
    PRIMARY KEY (usuario_id, usuario_seguidor_id),
    CONSTRAINT FK_usuario_autor_id FOREIGN KEY (usuario_id) REFERENCES usuario(id),
    CONSTRAINT FK_usuario_seguidor_id FOREIGN KEY (usuario_seguidor_id) REFERENCES usuario(id)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

  INSERT INTO usuario_sigue_a_usuario (usuario_id, usuario_seguidor_id) VALUES (1, 2); #Juan Perez sigue a John Doe
  INSERT INTO usuario_sigue_a_usuario (usuario_id, usuario_seguidor_id) VALUES (1, 3); #Juan Carlos sigue a John Doe
  INSERT INTO usuario_sigue_a_usuario (usuario_id, usuario_seguidor_id) VALUES (3, 2); #Juan Perez sigue a Juan Carlos


  CREATE TABLE `publicacion` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `mensaje` varchar(150) NOT NULL,
    `fecha_publicacion` date NOT NULL,
    `publico` boolean NOT NULL DEFAULT 0,
    `usuario_id` int(10) NOT NULL, -- Autor - Referencia al ID de la tabla usuario
    PRIMARY KEY (id),
    CONSTRAINT FK_usuario_id FOREIGN KEY (usuario_id) REFERENCES usuario(id)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

  INSERT INTO publicacion (mensaje, fecha_publicacion, publico, usuario_id) VALUES ('¿Cuando es el parcial de Proyecto?', '2018-12-12', 1, 2);
  INSERT INTO publicacion (mensaje, fecha_publicacion, publico, usuario_id) VALUES ('¿Hoy es viernes?', '2018-12-12', 0, 1);
  INSERT INTO publicacion (mensaje, fecha_publicacion, publico, usuario_id) VALUES ('¿Cuando termina el año?', '2018-12-09', 0, 2);
  INSERT INTO publicacion (mensaje, fecha_publicacion, publico, usuario_id) VALUES ('Lindo día para hacer un asado!!!!', '2018-12-07', 1, 2);


SET FOREIGN_KEY_CHECKS=1;