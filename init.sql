-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 28-Maio-2025 às 23:46
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `correio`
--
CREATE DATABASE IF NOT EXISTS `CORREIO` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `CORREIO`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--


CREATE TABLE IF NOT EXISTS `MENSAGEM` (
  `ID_MENSAGEM` int(11) NOT NULL AUTO_INCREMENT,
  `REMETENTE` varchar(50) DEFAULT NULL,
  `DESTINATARIO` varchar(50) NOT NULL,
  `MENSAGEM` varchar(80) NOT NULL,
  `COR` varchar(20) NOT NULL DEFAULT '#000000',
  `FUNDO` varchar(20) NOT NULL DEFAULT '#ffffff',
  `DATA_HORA` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_MENSAGEM`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `USUARIO` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `USUARIO` varchar(100) NOT NULL,
  `SENHA` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
