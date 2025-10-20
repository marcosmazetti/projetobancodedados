-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14/10/2025 às 21:33
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `petshop`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `animal`
--

CREATE TABLE `animal` (
  `cod_animal` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `ano_nasc` int(11) DEFAULT NULL,
  `raca` varchar(50) DEFAULT NULL,
  `cpf` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `animal`
--

INSERT INTO `animal` (`cod_animal`, `nome`, `ano_nasc`, `raca`, `cpf`) VALUES
(1, 'Rex', 2019, 'Pastor Alemão', '12345678901'),
(2, 'Mimi', 2021, 'Persa', '98765432100'),
(3, 'Bolt', 2020, 'Vira-lata', '55566677788');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `cpf` char(11) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `telefone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`cpf`, `nome`, `telefone`) VALUES
('12345678901', 'Maria Silva', '41987654321'),
('15632456987', 'Paulo Goulart Francesco', '145623987452'),
('55566677788', 'Ana Souza', '21987654321'),
('98765432100', 'João Pereira', '11991234567');

-- --------------------------------------------------------

--
-- Estrutura para tabela `consulta`
--

CREATE TABLE `consulta` (
  `cod_consulta` int(11) NOT NULL,
  `dia` date NOT NULL,
  `hora` time NOT NULL,
  `motivo` varchar(100) DEFAULT NULL,
  `cod_animal` int(11) NOT NULL,
  `CRMV` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `consulta`
--

INSERT INTO `consulta` (`cod_consulta`, `dia`, `hora`, `motivo`, `cod_animal`, `CRMV`) VALUES
(1, '2025-10-10', '09:30:00', 'Vacinação anual', 1, 'SP12345'),
(2, '2025-10-11', '14:00:00', 'Consulta de rotina', 2, 'SP67890'),
(3, '2025-10-12', '11:15:00', 'Tratamento de alergia', 3, 'SP12345');

-- --------------------------------------------------------

--
-- Estrutura para tabela `veterinario`
--

CREATE TABLE `veterinario` (
  `CRMV` char(10) NOT NULL,
  `nome` varchar(80) NOT NULL,
  `dt_admissao` date NOT NULL,
  `salario` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `veterinario`
--

INSERT INTO `veterinario` (`CRMV`, `nome`, `dt_admissao`, `salario`) VALUES
('SP12345', 'Dr. Carlos Lima', '2020-02-10', 8500.00),
('SP67890', 'Dra. Fernanda Torres', '2021-05-15', 9200.00);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`cod_animal`),
  ADD KEY `cpf` (`cpf`);

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices de tabela `consulta`
--
ALTER TABLE `consulta`
  ADD PRIMARY KEY (`cod_consulta`),
  ADD KEY `cod_animal` (`cod_animal`),
  ADD KEY `CRMV` (`CRMV`);

--
-- Índices de tabela `veterinario`
--
ALTER TABLE `veterinario`
  ADD PRIMARY KEY (`CRMV`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `animal`
--
ALTER TABLE `animal`
  MODIFY `cod_animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `consulta`
--
ALTER TABLE `consulta`
  MODIFY `cod_consulta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`cpf`) REFERENCES `cliente` (`cpf`);

--
-- Restrições para tabelas `consulta`
--
ALTER TABLE `consulta`
  ADD CONSTRAINT `consulta_ibfk_1` FOREIGN KEY (`cod_animal`) REFERENCES `animal` (`cod_animal`),
  ADD CONSTRAINT `consulta_ibfk_2` FOREIGN KEY (`CRMV`) REFERENCES `veterinario` (`CRMV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
