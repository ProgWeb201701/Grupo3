-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.24-log
-- Versão do PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `pratocheio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `dt_nasc` date DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `email`, `nome`, `telefone`, `dt_nasc`, `senha`) VALUES
(1, 'teste@gmail.com', 'Paulo', '1234', '1979-12-13', '698dc19d489c4e4db73e28a713eab07b');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

DROP TABLE IF EXISTS `endereco`;
CREATE TABLE IF NOT EXISTS `endereco` (
  `id_endereco` int(11) NOT NULL AUTO_INCREMENT,
  `referencia` varchar(100) DEFAULT NULL,
  `complemento` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) NOT NULL,
  `numero` varchar(5) NOT NULL,
  `bairro` varchar(100) NOT NULL,
  `rua` varchar(100) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `cep` varchar(20) NOT NULL,
  PRIMARY KEY (`id_endereco`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `referencia`, `complemento`, `cidade`, `numero`, `bairro`, `rua`, `id_cliente`, `cep`) VALUES
(1, 'Unipampa', '', 'Alegrete', '3000', 'Ibirapuitã', 'Rua de Teste', 1, '97546550');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE IF NOT EXISTS `funcionario` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `senha` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `funcionario`
--

INSERT INTO `funcionario` (`id_login`, `senha`, `usuario`, `nome`) VALUES
(1, '698dc19d489c4e4db73e28a713eab07b', 'adm', 'Admin Teste');

-- --------------------------------------------------------

--
-- Estrutura da tabela `itempedido`
--

DROP TABLE IF EXISTS `itempedido`;
CREATE TABLE IF NOT EXISTS `itempedido` (
  `id_item` int(11) NOT NULL AUTO_INCREMENT,
  `valor` float NOT NULL,
  `quantidade` int(11) NOT NULL,
  `observacoes` varchar(255) DEFAULT NULL,
  `id_pedido` int(11) NOT NULL,
  `id_produto` int(11) NOT NULL,
  PRIMARY KEY (`id_item`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Extraindo dados da tabela `itempedido`
--

INSERT INTO `itempedido` (`id_item`, `valor`, `quantidade`, `observacoes`, `id_pedido`, `id_produto`) VALUES
(1, 5, 1, '', 2, 7),
(2, 4, 1, '', 2, 6),
(3, 5, 1, '', 3, 7),
(4, 4, 1, '', 3, 6),
(5, 18.1, 1, 'Sem carne', 3, 2),
(6, 10, 2, '', 4, 7),
(7, 12, 1, '', 4, 5),
(8, 8, 2, '', 4, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE IF NOT EXISTS `pedido` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `valor_total` float NOT NULL,
  `tipo_pagamento` char(1) NOT NULL,
  `dataHora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `troco` float DEFAULT NULL,
  `previsaoEntrega` varchar(20) NOT NULL,
  `statusAndamento` char(1) NOT NULL,
  `tipoEntrega` char(1) NOT NULL,
  `id_cliente` int(255) NOT NULL,
  PRIMARY KEY (`id_pedido`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id_pedido`, `valor_total`, `tipo_pagamento`, `dataHora`, `troco`, `previsaoEntrega`, `statusAndamento`, `tipoEntrega`, `id_cliente`) VALUES
(2, 9, 'D', '2017-07-01 03:00:00', 10, '1 hora', 'A', 'E', 1),
(3, 27.1, 'D', '2017-07-01 03:00:00', 0, '1 hora', 'A', 'E', 1),
(4, 30, 'D', '2017-07-01 03:00:00', 0, '1 hora', 'E', 'E', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE IF NOT EXISTS `produto` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome_produto` varchar(100) NOT NULL,
  `preco` float NOT NULL,
  `descri` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id_produto`, `nome_produto`, `preco`, `descri`, `foto`) VALUES
(1, 'Feijoada', 20.01, 'Feijoada completa', './assets/fotos/10b3532c8e545cd4a28258b4ba0c2167.jpg'),
(2, 'Hamburguer', 18.1, 'Hamburguer americano simples', './assets/fotos/b5339d2d4392206b822b656f59cee966.jpg'),
(3, 'Espetinho', 3.2, 'Espetinho', './assets/fotos/5a7ed80529f22eb9586551543ecd5f11.jpg'),
(4, 'Coca-cola 2l', 8, 'Coca-cola 2l', './assets/fotos/78aad5dba39f4e91660ca59ce4688484.jpg'),
(5, 'Chopp', 12, 'Chopp Premium', './assets/fotos/0b95e0b325f57a40bcc6cf688e3c912f.jpg'),
(6, 'Taco Mexicano', 4, 'Taco mexicano tradicional', './assets/fotos/5dc7c9681db017e7d8f1c33ac6d47269.jpg'),
(7, 'Suco Natural', 5, 'Suco natural de laranja', './assets/fotos/6b728bd5919ea71aca05cfe95cdd12bc.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
