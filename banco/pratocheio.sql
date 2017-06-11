

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE `cliente` (
`id_cliente` int(11) NOT NULL,
`email` varchar(255) NOT NULL,
`nome` varchar(100) NOT NULL,
`telefone` varchar(20) NOT NULL,
`dt_nasc` date ,
`senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `cliente`
--

ALTER TABLE `cliente`
ADD PRIMARY KEY (`id_cliente`);

--
-- AUTO_INCREMENT for table `cliente`
--

ALTER TABLE `cliente`
MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `endereco`
--

DROP TABLE IF EXISTS `endereco`;
CREATE TABLE `endereco` (
`id_endereco` int(11) NOT NULL,
`referencia` varchar(100) ,
`complemento` varchar(100) ,
`cidade` varchar(100) NOT NULL,
`numero` varchar(5) NOT NULL,
`bairro` varchar(100) NOT NULL,
`rua` varchar(100) NOT NULL,
`id_cliente` int(11) NOT NULL,
`cep` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `endereco`
--

ALTER TABLE `endereco`
ADD PRIMARY KEY (`id_endereco`);

--
-- AUTO_INCREMENT for table `endereco`
--

ALTER TABLE `endereco`
MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `funcionario`
--

DROP TABLE IF EXISTS `funcionario`;
CREATE TABLE `funcionario` (
`id_login` int(11) NOT NULL,
`senha` varchar(255) NOT NULL,
`usuario` varchar(255) NOT NULL,
`nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `funcionario`
--

ALTER TABLE `funcionario`
ADD PRIMARY KEY (`id_login`);

--
-- AUTO_INCREMENT for table `funcionario`
--

ALTER TABLE `funcionario`
MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `itempedido`
--

DROP TABLE IF EXISTS `itempedido`;
CREATE TABLE `itempedido` (
`id_item` int(11) NOT NULL,
`valor` float NOT NULL,
`quantidade` int(11) NOT NULL,
`observacoes` varchar(255) ,
`id_pedido` int(11) NOT NULL,
`id_produto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `itempedido`
--

ALTER TABLE `itempedido`
ADD PRIMARY KEY (`id_item`);

--
-- AUTO_INCREMENT for table `itempedido`
--

ALTER TABLE `itempedido`
MODIFY `id_item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `pedido`
--

DROP TABLE IF EXISTS `pedido`;
CREATE TABLE `pedido` (
`id_pedido` int(11) NOT NULL,
`valor_total` float NOT NULL,
`tipo_pagamento` char(1) NOT NULL,
`dataHora` date NOT NULL,
`troco` float ,
`previsaoEntrega` varchar(20) NOT NULL,
`statusAndamento` char(1) NOT NULL,
`tipoEntrega` char(1) NOT NULL,
`id_cliente` INT(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `pedido`
--

ALTER TABLE `pedido`
ADD PRIMARY KEY (`id_pedido`);

--
-- AUTO_INCREMENT for table `pedido`
--

ALTER TABLE `pedido`
MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- --------------------------------------------------------

--
-- Table structure for table `produto`
--

DROP TABLE IF EXISTS `produto`;
CREATE TABLE `produto` (
`id_produto` int(11) NOT NULL,
`nome_produto` varchar(100) NOT NULL,
`preco` float NOT NULL,
`descri` varchar(255) NOT NULL,
`foto` varchar(255) 
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table `produto`
--

ALTER TABLE `produto`
ADD PRIMARY KEY (`id_produto`);

--
-- AUTO_INCREMENT for table `produto`
--

ALTER TABLE `produto`
MODIFY `id_produto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

-- --------------------------------------------------------


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
