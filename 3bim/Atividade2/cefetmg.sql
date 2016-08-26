-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 19-Ago-2016 às 10:49
-- Versão do servidor: 5.5.47-0ubuntu0.14.04.1
-- versão do PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `cefetmg`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Cliente`
--

CREATE TABLE IF NOT EXISTS `Cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Extraindo dados da tabela `Cliente`
--

INSERT INTO `Cliente` (`idCliente`, `nome`, `dataCadastro`, `email`) VALUES
(35, 'Izabela', '2016-08-18 00:00:00', 'izabela@hotmail.com'),
(36, 'Larissa', '2016-08-18 00:00:00', 'larissa@hotmail.com');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Fornecedor`
--

CREATE TABLE IF NOT EXISTS `Fornecedor` (
  `idFornecedor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `dataCadastro` datetime NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idFornecedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `Fornecedor`
--

INSERT INTO `Fornecedor` (`idFornecedor`, `nome`, `dataCadastro`, `email`) VALUES
(2, 'izabela', '2016-08-18 00:00:00', 'izabela@hotmail.com'),
(3, 'Larissa', '2016-08-18 00:00:00', 'larissa@hotmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
