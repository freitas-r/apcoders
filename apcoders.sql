-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Jan-2022 às 20:47
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `apcoders`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_despesas`
--

CREATE TABLE `tb_despesas` (
  `id_despesa` int(11) NOT NULL,
  `id_unidade` int(11) NOT NULL,
  `descricao` varchar(150) NOT NULL,
  `tipo_despesa` varchar(150) NOT NULL,
  `valor` decimal(6,2) NOT NULL,
  `vencimento_fatura` date NOT NULL,
  `status_pagamento` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_inquilinos`
--

CREATE TABLE `tb_inquilinos` (
  `id_inquilino` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `idade` int(3) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `telefone` varchar(14) NOT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_unidades`
--

CREATE TABLE `tb_unidades` (
  `id_unidade` int(11) NOT NULL,
  `id_inquilino` int(11) NOT NULL,
  `identificacao` varchar(20) NOT NULL,
  `proprietario` varchar(150) NOT NULL,
  `condominio` varchar(150) NOT NULL,
  `endereco` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_despesas`
--
ALTER TABLE `tb_despesas`
  ADD PRIMARY KEY (`id_despesa`),
  ADD KEY `id_unidade` (`id_unidade`);

--
-- Índices para tabela `tb_inquilinos`
--
ALTER TABLE `tb_inquilinos`
  ADD PRIMARY KEY (`id_inquilino`);

--
-- Índices para tabela `tb_unidades`
--
ALTER TABLE `tb_unidades`
  ADD PRIMARY KEY (`id_unidade`),
  ADD KEY `id_inquilino` (`id_inquilino`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_despesas`
--
ALTER TABLE `tb_despesas`
  MODIFY `id_despesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_inquilinos`
--
ALTER TABLE `tb_inquilinos`
  MODIFY `id_inquilino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_unidades`
--
ALTER TABLE `tb_unidades`
  MODIFY `id_unidade` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_despesas`
--
ALTER TABLE `tb_despesas`
  ADD CONSTRAINT `tb_despesas_ibfk_1` FOREIGN KEY (`id_unidade`) REFERENCES `tb_unidades` (`id_unidade`);

--
-- Limitadores para a tabela `tb_unidades`
--
ALTER TABLE `tb_unidades`
  ADD CONSTRAINT `tb_unidades_ibfk_1` FOREIGN KEY (`id_inquilino`) REFERENCES `tb_inquilinos` (`id_inquilino`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
