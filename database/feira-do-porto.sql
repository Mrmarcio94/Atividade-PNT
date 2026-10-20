CREATE DATABASE db_feira_do_porto;

USE db_feira_do_porto;

CREATE TABLE cliente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    senha VARCHAR(100) NOT NULL,
    telefone VARCHAR(20),
    endereco VARCHAR(255)
);

CREATE TABLE produto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    preco DECIMAL(10, 2) NOT NULL
);

CREATE TABLE pedido (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT NOT NULL,
    data_pedido DATETIME DEFAULT CURRENT_TIMESTAMP,
    status_pedido VARCHAR(50) DEFAULT 'Pendente',
    valor_total DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES cliente(id)
);

CREATE TABLE item_pedido (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pedido_id INT NOT NULL,
    produto_id INT NOT NULL,
    quantidade DECIMAL(10, 2) NOT NULL,
    preco_unitario DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (pedido_id) REFERENCES pedido(id),
    FOREIGN KEY (produto_id) REFERENCES produto(id)
);

INSERT INTO cliente (nome, email, senha, telefone, endereco)
VALUES ('Ana Souza', 'anasouza@gmail.com', 'anasouza123', '977778888', 'Rua da concha, 100'),
('Carlos André', 'carlosandre@gmail.com','carlosandre321','966665555', 'Rua da castanha, 392'),
('Maria Dolores', 'doloresmaria@gmail.com', 'doloresmaria000', '911119999', 'Rua do siri, 45');

INSERT INTO produto (nome, preco)
VALUES ('Maçã', 6.67),
('Abacaxi',3.00),
('Cebola',4.25),
('Milho',3.46),
('Camarão',25.00),
('Salmão',89.99);