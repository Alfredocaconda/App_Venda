-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 09/06/2024 às 03:09
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `venda`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `carrinho`
--

CREATE TABLE `carrinho` (
  `id_carrinho` bigint(20) NOT NULL,
  `idproduto` bigint(20) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `preco` double NOT NULL,
  `codigo_barra` varchar(100) DEFAULT NULL,
  `dataCarrinho` datetime NOT NULL,
  `idstock` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `carrinho`
--

INSERT INTO `carrinho` (`id_carrinho`, `idproduto`, `quantidade`, `preco`, `codigo_barra`, `dataCarrinho`, `idstock`) VALUES
(15, 3, 2, 20000, '12345', '2024-06-09 03:06:55', 5),
(16, 4, 1, 14000, '123456', '2024-06-09 03:06:59', 5),
(17, 5, 1, 2500, '12345678', '2024-06-09 03:07:14', 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `idf` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`idcategoria`, `nome`, `idf`) VALUES
(2, 'ELECTRONICO', 4),
(3, 'DOMESTICO', 4),
(4, 'FERRO', 4),
(5, 'PLASTICO', 4),
(6, 'MADEIRA', 1),
(7, 'VIDRO', 1),
(8, 'METALICO', 1),
(9, 'LIQUIDO', 1),
(10, 'TECIDO', 1),
(11, 'PAPEL', 1),
(12, 'SOLIDO', 1),
(13, 'OURO', 1),
(14, 'PRATA', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `idf` bigint(20) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `genero` enum('MASCULINO','FEMENINO') DEFAULT NULL,
  `bilhete` varchar(100) DEFAULT NULL,
  `estado` enum('activo','não activo') NOT NULL,
  `cargo` enum('Balconista','Limpeza','Gestor','Segurança') DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `senha` varchar(200) DEFAULT NULL,
  `telefone_email` varchar(100) NOT NULL,
  `endereco` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`idf`, `nome`, `genero`, `bilhete`, `estado`, `cargo`, `data_nascimento`, `senha`, `telefone_email`, `endereco`) VALUES
(1, 'PROGRAMADOR', 'MASCULINO', 'PROGRAMADOR', 'activo', 'Gestor', '2024-05-16', '01b7e5d8616764d4ad06f613995884a3ed4dd376', 'PROGRAMADOR', 'PROGRAMADOR'),
(3, 'ALFREDO CACONDA', 'MASCULINO', '7012541221BA040', 'activo', 'Balconista', '2024-05-29', '935460590', '935460590', 'CUANZA SUL'),
(4, 'PAULINO CACONDA', 'MASCULINO', '2541221BA040', 'activo', 'Gestor', '2024-05-29', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'alfredocaconda3@gmail.com', 'BOCOIO'),
(5, 'ALFREDO BINJI ARMINDO CACONDA', 'MASCULINO', '00000000000BA040', 'activo', 'Gestor', '1997-04-21', '3e893aadd021d930a8b30a4f2dd3355f345bc819', 'CACONDA', 'BOCOIO');

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `idp` bigint(20) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `idcategoria` int(11) DEFAULT NULL,
  `valor_compra` double NOT NULL,
  `codigo_barra` varchar(50) NOT NULL,
  `caducidade` date NOT NULL,
  `idf` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`idp`, `nome`, `descricao`, `idcategoria`, `valor_compra`, `codigo_barra`, `caducidade`, `idf`) VALUES
(1, 'BRINCO', 'ARCOLA', 14, 2000, '123', '0000-00-00', 1),
(2, 'MASCOTE', 'MASCULINO/ADULTO', 14, 6000, '1234', '0000-00-00', 1),
(3, 'FIO', 'FINO/ADULTO', 14, 6500, '12345', '0000-00-00', 1),
(4, 'FIO', 'GROSSO/MASCULINO', 14, 9000, '123456', '0000-00-00', 1),
(5, 'BRINCO', 'ARGOLA/CRIANÇA', 14, 1500, '12345678', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `stock`
--

CREATE TABLE `stock` (
  `idstock` bigint(20) NOT NULL,
  `qtd` int(11) DEFAULT NULL,
  `dataentrada` datetime DEFAULT NULL,
  `idp` bigint(20) DEFAULT NULL,
  `idf` bigint(20) DEFAULT NULL,
  `preco_venda` double NOT NULL,
  `lucro` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Despejando dados para a tabela `stock`
--

INSERT INTO `stock` (`idstock`, `qtd`, `dataentrada`, `idp`, `idf`, `preco_venda`, `lucro`) VALUES
(1, 20, '2024-06-06 21:58:05', 5, 1, 2500, 20000),
(2, 20, '2024-06-06 21:58:26', 4, 1, 14000, 100000),
(3, 20, '2024-06-06 21:58:52', 3, 1, 10000, 70000),
(4, 20, '2024-06-06 21:59:23', 2, 1, 8000, 40000),
(5, 20, '2024-06-06 21:59:56', 1, 1, 3500, 30000);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `vcarrinho`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `vcarrinho` (
`id_carrinho` bigint(20)
,`idstock` bigint(20)
,`idp` bigint(20)
,`nome` varchar(200)
,`descricao` varchar(255)
,`nomec` varchar(20)
,`qtd` int(11)
,`preco_venda` double
,`quantidade` int(11)
,`preco` double
,`codigo_barra` varchar(50)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `vcategoria`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `vcategoria` (
`idcategoria` int(11)
,`nome` varchar(20)
,`nomef` varchar(100)
);

-- --------------------------------------------------------

--
-- Estrutura para tabela `venda`
--

CREATE TABLE `venda` (
  `idv` bigint(20) NOT NULL,
  `qtdrequerida` int(11) DEFAULT NULL,
  `totalCompra` double DEFAULT NULL,
  `datavenda` date DEFAULT NULL,
  `fatura` varchar(20) DEFAULT NULL,
  `idf` bigint(20) DEFAULT NULL,
  `idproduto` bigint(20) DEFAULT NULL,
  `codigo_barra` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `vproduto`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `vproduto` (
`idp` bigint(20)
,`nome` varchar(200)
,`descricao` varchar(255)
,`nomec` varchar(20)
,`valor_compra` double
,`codigo_barra` varchar(50)
,`caducidade` date
,`nomef` varchar(100)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `vstock`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `vstock` (
`idstock` bigint(20)
,`idp` bigint(20)
,`idf` bigint(20)
,`nome` varchar(200)
,`descricao` varchar(255)
,`nomec` varchar(20)
,`valor_compra` double
,`codigo_barra` varchar(50)
,`caducidade` date
,`qtd` int(11)
,`dataentrada` datetime
,`preco_venda` double
,`lucro` double
,`nomef` varchar(100)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para view `vvenda`
-- (Veja abaixo para a visão atual)
--
CREATE TABLE `vvenda` (
`idp` bigint(20)
,`idv` bigint(20)
,`nome` varchar(200)
,`descricao` varchar(255)
,`nomec` varchar(20)
,`qtdrequerida` int(11)
,`totalCompra` double
,`codigo_barra` varchar(50)
,`datavenda` date
,`fatura` varchar(20)
,`nomef` varchar(100)
);

-- --------------------------------------------------------

--
-- Estrutura para view `vcarrinho`
--
DROP TABLE IF EXISTS `vcarrinho`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vcarrinho`  AS SELECT `c`.`id_carrinho` AS `id_carrinho`, `s`.`idstock` AS `idstock`, `p`.`idp` AS `idp`, `p`.`nome` AS `nome`, `p`.`descricao` AS `descricao`, `d`.`nome` AS `nomec`, `s`.`qtd` AS `qtd`, `s`.`preco_venda` AS `preco_venda`, `c`.`quantidade` AS `quantidade`, `c`.`preco` AS `preco`, `p`.`codigo_barra` AS `codigo_barra` FROM (((`carrinho` `c` join `produto` `p` on(`p`.`idp` = `c`.`idproduto`)) join `stock` `s` on(`s`.`idp` = `p`.`idp`)) join `categoria` `d` on(`d`.`idcategoria` = `p`.`idcategoria`)) ;

-- --------------------------------------------------------

--
-- Estrutura para view `vcategoria`
--
DROP TABLE IF EXISTS `vcategoria`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vcategoria`  AS SELECT `c`.`idcategoria` AS `idcategoria`, `c`.`nome` AS `nome`, `f`.`nome` AS `nomef` FROM (`categoria` `c` join `funcionario` `f` on(`f`.`idf` = `c`.`idf`)) ;

-- --------------------------------------------------------

--
-- Estrutura para view `vproduto`
--
DROP TABLE IF EXISTS `vproduto`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vproduto`  AS SELECT `p`.`idp` AS `idp`, `p`.`nome` AS `nome`, `p`.`descricao` AS `descricao`, `c`.`nome` AS `nomec`, `p`.`valor_compra` AS `valor_compra`, `p`.`codigo_barra` AS `codigo_barra`, `p`.`caducidade` AS `caducidade`, `f`.`nome` AS `nomef` FROM ((`produto` `p` join `categoria` `c` on(`c`.`idcategoria` = `p`.`idcategoria`)) join `funcionario` `f` on(`f`.`idf` = `p`.`idf`)) ;

-- --------------------------------------------------------

--
-- Estrutura para view `vstock`
--
DROP TABLE IF EXISTS `vstock`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vstock`  AS SELECT `s`.`idstock` AS `idstock`, `p`.`idp` AS `idp`, `f`.`idf` AS `idf`, `p`.`nome` AS `nome`, `p`.`descricao` AS `descricao`, `c`.`nome` AS `nomec`, `p`.`valor_compra` AS `valor_compra`, `p`.`codigo_barra` AS `codigo_barra`, `p`.`caducidade` AS `caducidade`, `s`.`qtd` AS `qtd`, `s`.`dataentrada` AS `dataentrada`, `s`.`preco_venda` AS `preco_venda`, `s`.`lucro` AS `lucro`, `f`.`nome` AS `nomef` FROM (((`stock` `s` join `produto` `p` on(`p`.`idp` = `s`.`idp`)) join `funcionario` `f` on(`f`.`idf` = `s`.`idf`)) join `categoria` `c` on(`c`.`idcategoria` = `p`.`idcategoria`)) ;

-- --------------------------------------------------------

--
-- Estrutura para view `vvenda`
--
DROP TABLE IF EXISTS `vvenda`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vvenda`  AS SELECT `p`.`idp` AS `idp`, `v`.`idv` AS `idv`, `p`.`nome` AS `nome`, `p`.`descricao` AS `descricao`, `c`.`nome` AS `nomec`, `v`.`qtdrequerida` AS `qtdrequerida`, `v`.`totalCompra` AS `totalCompra`, `p`.`codigo_barra` AS `codigo_barra`, `v`.`datavenda` AS `datavenda`, `v`.`fatura` AS `fatura`, `f`.`nome` AS `nomef` FROM (((`venda` `v` join `funcionario` `f` on(`f`.`idf` = `v`.`idf`)) join `produto` `p` on(`p`.`idp` = `v`.`idproduto`)) join `categoria` `c` on(`c`.`idcategoria` = `p`.`idcategoria`)) ;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `carrinho`
--
ALTER TABLE `carrinho`
  ADD PRIMARY KEY (`id_carrinho`),
  ADD KEY `idproduto` (`idproduto`),
  ADD KEY `idstock` (`idstock`);

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idcategoria`),
  ADD KEY `idf` (`idf`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idf`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`idp`),
  ADD KEY `idf` (`idf`),
  ADD KEY `idcategoria` (`idcategoria`);

--
-- Índices de tabela `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idstock`),
  ADD UNIQUE KEY `idp_2` (`idp`),
  ADD KEY `idp` (`idp`),
  ADD KEY `idf` (`idf`);

--
-- Índices de tabela `venda`
--
ALTER TABLE `venda`
  ADD PRIMARY KEY (`idv`),
  ADD KEY `idproduto` (`idproduto`),
  ADD KEY `idf` (`idf`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `carrinho`
--
ALTER TABLE `carrinho`
  MODIFY `id_carrinho` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idf` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `idp` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `stock`
--
ALTER TABLE `stock`
  MODIFY `idstock` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `venda`
--
ALTER TABLE `venda`
  MODIFY `idv` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `carrinho`
--
ALTER TABLE `carrinho`
  ADD CONSTRAINT `carrinho_ibfk_1` FOREIGN KEY (`idproduto`) REFERENCES `produto` (`idp`),
  ADD CONSTRAINT `carrinho_ibfk_2` FOREIGN KEY (`idstock`) REFERENCES `stock` (`idstock`) ON DELETE CASCADE;

--
-- Restrições para tabelas `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`idf`) REFERENCES `funcionario` (`idf`) ON DELETE CASCADE;

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`idf`) REFERENCES `funcionario` (`idf`),
  ADD CONSTRAINT `produto_ibfk_2` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`),
  ADD CONSTRAINT `produto_ibfk_3` FOREIGN KEY (`idcategoria`) REFERENCES `categoria` (`idcategoria`);

--
-- Restrições para tabelas `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`idp`) REFERENCES `produto` (`idp`),
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`idf`) REFERENCES `funcionario` (`idf`);

--
-- Restrições para tabelas `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `venda_ibfk_1` FOREIGN KEY (`idproduto`) REFERENCES `produto` (`idp`) ON DELETE CASCADE,
  ADD CONSTRAINT `venda_ibfk_2` FOREIGN KEY (`idf`) REFERENCES `funcionario` (`idf`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
