CREATE DATABASE IF NOT EXISTS sistema_login
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE sistema_login;

CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL,
    senha VARCHAR(100) NOT NULL,
    UNIQUE KEY email_unico (email)
);

INSERT INTO usuarios (email, senha)
VALUES ('teste@email.com', '123')
ON DUPLICATE KEY UPDATE senha = VALUES(senha);
