DROP SCHEMA IF EXISTS sistemanoticias;
CREATE SCHEMA IF NOT EXISTS sistemanoticias DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE sistemanoticias;

CREATE TABLE IF NOT EXISTS usuario (
    idUsuario INT NOT NULL AUTO_INCREMENT COMMENT 'PK da tabela de usuario',
    username VARCHAR(45) NOT NULL COMMENT 'Nome do usuário ',
	password VARCHAR(250) NOT NULL COMMENT 'Senha do usuário',
	PRIMARY KEY (idUsuario));


CREATE TABLE IF NOT EXISTS categoria (
    idCategoria INT NOT NULL AUTO_INCREMENT COMMENT 'PK da tabela de categoria',
    nomeCategoria VARCHAR(250) NOT NULL COMMENT 'Nome da categoria',
	idUsuario INT NOT NULL,
	PRIMARY KEY (idCategoria),
	INDEX fk_categoria_usuario1_idx (idUsuario ASC),
	CONSTRAINT fk_categoria_usuario1
	FOREIGN KEY (idUsuario)
	REFERENCES usuario (idUsuario)
	ON DELETE NO ACTION
	ON UPDATE NO ACTION);


CREATE TABLE IF NOT EXISTS noticia (
    idNoticia BIGINT NOT NULL AUTO_INCREMENT COMMENT 'PK da tabela de noticia',
    idCategoria INT NOT NULL COMMENT 'FK da tabela de categoria',
    nome VARCHAR(45) NOT NULL COMMENT 'Nome da noticia',
	descricao TEXT NOT NULL COMMENT 'Descrição da noticia',
	PRIMARY KEY (idNoticia),
	INDEX fk_noticia_categoria_idx (idCategoria ASC),
	CONSTRAINT fk_noticia_categoria
	FOREIGN KEY (idCategoria)
	REFERENCES categoria (idCategoria)
	ON DELETE NO ACTION
	ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- usuario: admin
-- senha: admin
INSERT INTO usuario (username, password) VALUE ('admin', '6a4e012bd9583858a5a6fa15f58bd86a25af266d3a4344f1ec2018b778f29ba83be86eb45e6dc204e11276f4a99eff4e2144fbe15e756c2c88e999649aae7d94');

INSERT INTO categoria (nomeCategoria, idUsuario) VALUES ('Anime', 1),('Culinaria',1);
INSERT INTO noticia (idCategoria, nome, descricao) VALUES (1, 'Guia de Novos Animes de Janeiro 2022' ,'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
														  (2, 'Espetinho de frango com brócolis', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

