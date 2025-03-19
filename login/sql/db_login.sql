-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/03/2025 às 16:20
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_login`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_pessoa`
--

CREATE TABLE `tb_pessoa` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `ano_nascimento` year(4) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `telefone_1` varchar(11) DEFAULT NULL,
  `telefone_2` varchar(11) DEFAULT NULL,
  `logradouro` varchar(150) DEFAULT NULL,
  `n_casa` int(5) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_pessoa`
--

INSERT INTO `tb_pessoa` (`id`, `nome`, `ano_nascimento`, `cpf`, `telefone_1`, `telefone_2`, `logradouro`, `n_casa`, `bairro`, `cidade`) VALUES
(1, 'Tony Stark', '1970', '12345678900', '999887766', '998877665', 'Malibu Point, CA', 10880, 'Malibu', 'Los Angeles'),
(2, 'Peter Parker', '1995', '98765432100', '111222333', NULL, 'Rua Ingram, 20', 3, 'Forest Hills', 'Nova York'),
(3, 'Steve Rogers', '1918', '45678912300', '444555666', NULL, 'Rua Leaman, 569', 1, 'Brooklyn', 'Nova York'),
(4, 'Natasha Romanoff', '1984', '65432198700', '777888999', '770077007', 'Rua 48, 4A', 12, 'Brooklyn Heights', 'Nova York'),
(5, 'Thor Odinson', '1972', '11122233344', '555666777', NULL, 'Asgard Palace', 1, 'Asgard', 'Asgard'),
(6, 'Bruce Banner', '1972', '99988877766', '333444555', NULL, '123 Gamma Avenue', 7, 'Culver City', 'Los Angeles');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `id_pessoa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id`, `usuario`, `senha`, `id_pessoa`) VALUES
(1, 'homemDeFerro', 'jarvis123', 1),
(2, 'homemAranha', 'teia123', 2),
(3, 'capitaoAmerica', 'euvouLutar', 3),
(4, 'viuvaNegra', 'assassinaVermelha', 4),
(5, 'deusDoTrovao', 'mjolnir123', 5),
(6, 'hulk', 'smash123', 6);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_pessoa`
--
ALTER TABLE `tb_pessoa`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_pessoa`
--
ALTER TABLE `tb_pessoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
