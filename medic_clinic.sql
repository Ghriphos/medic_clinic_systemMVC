-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Nov-2022 às 18:03
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `medic_clinic`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clinic`
--

CREATE TABLE `clinic` (
  `cod_clinic` int(11) NOT NULL,
  `nome` varchar(128) NOT NULL,
  `cnpj` int(11) NOT NULL,
  `email` varchar(128) DEFAULT NULL,
  `street` varchar(50) NOT NULL,
  `street_number` int(11) NOT NULL,
  `street_complement` varchar(50) NOT NULL,
  `district` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `open_hour` datetime NOT NULL,
  `close_hour` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clinic`
--

INSERT INTO `clinic` (`cod_clinic`, `nome`, `cnpj`, `email`, `street`, `street_number`, `street_complement`, `district`, `phone`, `open_hour`, `close_hour`) VALUES
(4, '123', 123, '123', '123', 123, '123', '123', '123', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `person`
--

CREATE TABLE `person` (
  `cod_person` int(11) NOT NULL,
  `nome` varchar(128) NOT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `street` varchar(128) DEFAULT NULL,
  `cpf` varchar(22) NOT NULL,
  `birthDate` date DEFAULT NULL,
  `cttemerg` varchar(16) DEFAULT NULL,
  `estadocivil` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `person`
--

INSERT INTO `person` (`cod_person`, `nome`, `phone`, `street`, `cpf`, `birthDate`, `cttemerg`, `estadocivil`) VALUES
(1, '111', '11', '11', '11', '0000-00-00', '11', '111');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prontuario`
--

CREATE TABLE `prontuario` (
  `vacina` varchar(20) DEFAULT NULL,
  `examepedido` varchar(40) DEFAULT NULL,
  `examevisto` varchar(40) DEFAULT NULL,
  `cirurgia` varchar(40) DEFAULT NULL,
  `receita` varchar(100) DEFAULT NULL,
  `codProntuario` int(11) NOT NULL,
  `cod_person` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`cod_clinic`);

--
-- Índices para tabela `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`cod_person`);

--
-- Índices para tabela `prontuario`
--
ALTER TABLE `prontuario`
  ADD PRIMARY KEY (`codProntuario`),
  ADD KEY `cod_person` (`cod_person`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clinic`
--
ALTER TABLE `clinic`
  MODIFY `cod_clinic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `person`
--
ALTER TABLE `person`
  MODIFY `cod_person` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `prontuario`
--
ALTER TABLE `prontuario`
  MODIFY `codProntuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `prontuario`
--
ALTER TABLE `prontuario`
  ADD CONSTRAINT `prontuario_ibfk_1` FOREIGN KEY (`cod_person`) REFERENCES `person` (`cod_person`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
