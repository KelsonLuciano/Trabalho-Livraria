
CREATE TABLE autor (
cod_autor INTEGER PRIMARY KEY AUTO_INCREMENT,
nome_autor VARCHAR(400)
);

CREATE TABLE editora (
cod_editora INTEGER PRIMARY KEY AUTO_INCREMENT,
nome_editora VARCHAR(100)
);

CREATE TABLE genero (
cod_genero INTEGER PRIMARY KEY AUTO_INCREMENT,
descricao VARCHAR(50)
);

CREATE TABLE livro (
cod_livro INTEGER PRIMARY KEY AUTO_INCREMENT,
qtd_estoque INTEGER,
nome VARCHAR(400),
preco DECIMAL(10,2),
cod_editora INTEGER,
capa VARCHAR(100),
FOREIGN KEY(cod_editora) REFERENCES editora (cod_editora)
);

CREATE TABLE forma_pagamento (
cod_pagamento INTEGER PRIMARY KEY AUTO_INCREMENT,
descricao VARCHAR(50)
);

CREATE TABLE usuario (
cod_cliente INTEGER PRIMARY KEY AUTO_INCREMENT,
nome VARCHAR(100),
cpf VARCHAR(20),
email VARCHAR(100),
senha VARCHAR(25)
);

CREATE TABLE compra (
cod_compra INTEGER PRIMARY KEY AUTO_INCREMENT,
valor_total DECIMAL(10, 2),
data_compra DATE,
cod_pagamento INTEGER,
cod_cliente INTEGER,
FOREIGN KEY(cod_pagamento) REFERENCES forma_pagamento (cod_pagamento),
FOREIGN KEY(cod_cliente) REFERENCES usuario (cod_cliente)
);

CREATE TABLE admin (
cod_admin INTEGER PRIMARY KEY AUTO_INCREMENT,
descricao VARCHAR(50),
cod_cliente INTEGER,
FOREIGN KEY(cod_cliente) REFERENCES usuario (cod_cliente)
);

CREATE TABLE autor_livro (
cod_autor INTEGER,
cod_livro INTEGER,
FOREIGN KEY(cod_autor) REFERENCES autor (cod_autor),
FOREIGN KEY(cod_livro) REFERENCES livro (cod_livro)
);

CREATE TABLE genero_livro (
cod_livro INTEGER,
cod_genero INTEGER,
FOREIGN KEY(cod_livro) REFERENCES livro (cod_livro),
FOREIGN KEY(cod_genero) REFERENCES genero (cod_genero)
);

CREATE TABLE livro_compra (
cod_livro INTEGER,
cod_compra INTEGER,
FOREIGN KEY(cod_livro) REFERENCES livro (cod_livro),
FOREIGN KEY(cod_compra) REFERENCES compra (cod_compra)
);

ALTER TABLE compra ADD FOREIGN KEY(cod_pagamento) REFERENCES forma_pagamento (cod_pagamento);
ALTER TABLE compra ADD FOREIGN KEY(cod_cliente) REFERENCES usuario (cod_cliente);

INSERT INTO autor(cod_autor, nome_autor) VALUES (1, 'Paula Pimenta'), (2, 'J. K. Rowling'), 
(3, 'Stephenie Meyer'), (4, 'Anne Frank'), (5, 'Machado de Assis'), (6, 'William Shakespeare'), (7, 'Clarisse Lispector'),
(8, 'Carlos Drummond de Andrade'), (9, 'Paulo Coelho'), (10, 'Ceciia Meireles');

INSERT INTO editora(cod_editora, nome_editora) VALUES (1, 'Darkside Books'), (2, 'Rocco'), 
(3, 'Nancy Richardson'), (4, 'Record'), (5, 'Sextante'), (6, 'Intrinseca'), (7, 'Ediouro'), (8, 'FTD'),
(9, 'Ubo'), (10, 'Aleph');

INSERT INTO genero(cod_genero, descricao) VALUES (1, 'Terror'), (2, 'Fantasia'), (3, 'Romance'), 
(4, 'Autobiografia'), (5, 'Poesia'), (6, 'Novela'), (7, 'Ação'), (8, 'Ficção'), (9, 'Drama'), (10, 'Conto');

INSERT INTO livro(cod_livro, qtd_estoque, nome, preco, cod_editora, capa) VALUES (1, 100, 'Neymar: My Story', 
89.90, 1, 'ney.png'), (2, 75, 'Harry Potter e a Pedra Filosofal', 29.90, 2, 'hp.png'), (3, 50, 'Crepúsculo', 39.90, 3, 'tj.png'), 
(4, 100, 'Anne Frank', 59.90, 4, 'anne.png'), (5, 70, 'Hora da Estrela', 9.90, 8, 'hde.png'), (6, 20, 'Morte e Vida Severina', 19.90, 5, 'mtevs.png')
, (7, 150, 'Vidas Secas', 29.90, 6, 'vds.png'), (8, 100, 'Bíblia', 79.90, 9, 'bb.png'), (9, 10, 'Turma da Mônica', 49.90, 7, 'tdm.png')
, (10, 5, 'Diário de um banana', 79.90, 10, 'db.png');

INSERT INTO forma_pagamento(cod_pagamento, descricao) VALUES (1, 'Pix'), (2, 'Boleto'), (3, 'Crédito'), (4, 'Dinheiro'),
(5, 'Débito');

INSERT INTO usuario(cod_cliente, nome, cpf, email, senha) VALUES
(1, 'Carlos', '114.326.424-26', 'carlinhoff132@gmail.com', 'aincarlu123'), 
(2, 'Bebeto', '853.836.562-64', 'bebetofut9@gmail.com', 'matador243'), 
(3, 'Carem', '625.649.925-09','carenzinha<3@gmail.com', 'carenTE22'),
(4, 'Luisa', '836.866.091-16','luisamel@gmail.com', 'luisaInd08'), 
(5, 'Lucas', '615.789.521-46','feioso@gmail.com', 'laura1234'),
(6, 'João', '876.639.885-39','jatoba@gmail.com', 'amotai1205'), 
(7, 'Brenon', '625.349.995-49','brebrezinho@gmail.com', 'odeio3inf1'), 
(8, 'Kelson', '785.669.925-09','bibikeke@gmail.com', 'lobive666'),
(9, 'Johana', '485.449.085-09','amoKLJ@gmail.com', 'kelujoS2'),
(10, 'Luis', '625.456.845-09','amobozo@gmail.com', 'mito2022s2');

INSERT INTO compra(cod_compra, valor_total, data_compra, cod_pagamento, cod_cliente) VALUES (1, 89.90, 
'2022-08-24', 1, 1), (2, 29.90, '2022-08-25', 3, 2), (3, 39.90, '2022-08-25', 2, 3), 
(4, 59.90, '2022-08-22', 5, 4), (5, 69.90, '2022-08-28', 4, 5), (6, 99.90, '2022-09-25', 5, 6), 
(7, 89.90, '2022-08-20', 3, 7), (8, 50.90, '2022-08-13', 2, 8), (9, 19.90, '2022-08-22', 1, 9),
(10, 69.90, '2022-08-24', 4, 10);

INSERT INTO admin(cod_admin, descricao, cod_cliente) VALUES (1, 'Vendedor', 1), (2, 'Dono', 2), 
(3, 'Assinante', 3), (4, 'Assinante', 4), (5, 'Assinante', 5), (6, 'Cliente', 6), (7, 'Cliente', 7), (8, 'Assinante', 8), 
(9, 'Cliente', 9), (10, 'Vendedor', 10);

INSERT INTO autor_livro(cod_autor, cod_livro) VALUES (1, 1), (2, 2), (3, 3), (4, 4), (5, 5), (6, 6), (7, 7), (8, 8), (9, 9),
(10, 10);

INSERT INTO genero_livro(cod_livro, cod_genero) VALUES (1, 1), (2, 2), (3, 3), (4, 4), (5, 5), (6, 6), (7, 7), (8, 8), 
(9, 9), (10, 10);

INSERT INTO livro_compra(cod_livro, cod_compra) VALUES (1, 1), (2, 2), (3, 3), (4, 4), (5, 5), (6, 6), (7, 7), (8, 8), 
(9, 9), (10, 10);
