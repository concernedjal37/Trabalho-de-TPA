-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 05/07/2024 às 09:49
-- Versão do servidor: 8.2.0
-- Versão do PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

use primeirocrud;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `primeirocrud`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpf` char(14) NOT NULL,
  `birth` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(17) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS Usuario;
CREATE TABLE IF NOT EXISTS Usuario (
idusuario int not null primary key AUTO_INCREMENT,
name varchar(50) NOT NULL,
email varchar(50) not null,
senha varchar(100) not null,
cpf char(14) NOT NULL,
birth date NOT NULL,
address varchar(100) NOT NULL,
phone varchar(17) NOT NULL
)engine=innodb;
-- insert into Usuario values(default,'mateus@gmail.com','123');


CREATE TABLE IF NOT EXISTS `Equipamento` (
  `idEquipamento` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `Nome` VARCHAR(100) NOT NULL,
  `Quantidade` INT UNSIGNED NOT NULL,
  `Tipo` VARCHAR(70) NOT NULL,
  `PrecoTotal` DECIMAL(10,2) UNSIGNED NOT NULL,
  `idusuario` INT NOT NULL,
  PRIMARY KEY (`idEquipamento`),
    FOREIGN KEY (`idusuario`) REFERENCES `usuario`(`idusuario`)
    )
ENGINE = InnoDB;

create table IF NOT EXISTS Gerente(
idgerente int not null primary key AUTO_INCREMENT,
email varchar(50) not null,
senha varchar(100) not null
)ENGINE = InnoDB;

--
-- Despejando dados para a tabela `client`
--

INSERT INTO `client` (`id`, `name`, `email`, `cpf`, `birth`, `address`, `phone`) VALUES
(2, 'Caio Seleme', 'caio.seleme@gmail.com', '100.364.476-76', '2006-11-04', 'Rua Josué Azevedo', '+55 (31) 998250683' );
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
