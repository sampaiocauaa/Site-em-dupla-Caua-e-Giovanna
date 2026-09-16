-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13/09/2026 às 19:34
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
-- Banco de dados: `site_caua_e_giovanna`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `artista` varchar(150) NOT NULL,
  `genero` varchar(80) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `imagem` varchar(200) NOT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produtos`
--

INSERT INTO `produtos` (`id`, `titulo`, `artista`, `genero`, `valor`, `imagem`, `criado_em`) VALUES
(1, 'Bad', 'Michael Jackson', 'Pop', 120.00, 'img/42.png', '2026-09-13 17:00:14'),
(2, 'Xscape', 'Michael Jackson', 'Pop', 110.00, 'img/43.png', '2026-09-13 17:00:14'),
(3, 'Number Ones', 'Michael Jackson', 'Pop', 130.00, 'img/44.png', '2026-09-13 17:00:14'),
(4, 'Mania de Você', 'Rita Lee', 'MPB', 100.00, 'img/45.png', '2026-09-13 17:00:14'),
(5, 'Rita Lee', 'Rita Lee', 'MPB', 90.00, 'img/46.png', '2026-09-13 17:00:14'),
(6, 'Reza', 'Rita Lee', 'MPB', 110.00, 'img/47.png', '2026-09-13 17:00:14'),
(7, 'Acústico MTV', 'Rita Lee', 'MPB', 90.00, 'img/48.png', '2026-09-13 17:00:14'),
(8, 'Tutti Frutti', 'Rita Lee', 'MPB', 90.00, 'img/49.png', '2026-09-13 17:00:14'),
(9, 'A Marca da Zorra', 'Rita Lee', 'MPB', 90.00, 'img/50.png', '2026-09-13 17:00:14'),
(10, 'With The Beatles', 'The Beatles', 'Rock', 120.00, 'img/52.png', '2026-09-13 17:00:14'),
(11, '4ever', 'The Beatles', 'Rock', 110.00, 'img/53.png', '2026-09-13 17:00:14'),
(12, 'White Album', 'The Beatles', 'Rock', 130.00, 'img/54.png', '2026-09-13 17:00:14'),
(13, 'Tribalistas | 2002', 'Tribalistas', 'MPB', 120.00, 'img/62.png', '2026-09-13 17:00:14'),
(14, 'Tribalistas | 2017', 'Tribalistas', 'MPB', 110.00, 'img/63.png', '2026-09-13 17:00:14'),
(15, '100% Charlie Brown Jr. - Abalando a Sua Fábrica', 'Charlie Brown Jr.', 'Rock', 120.00, 'img/64.png', '2026-09-13 17:00:14'),
(16, 'Transpiração Contínua Prolongada', 'Charlie Brown Jr.', 'Rock', 110.00, 'img/65.png', '2026-09-13 17:00:14'),
(17, 'Gita', 'Raul Seixas', 'Rock', 120.00, 'img/66.png', '2026-09-13 17:00:14'),
(18, 'Comemorativo 80 anos Raul Seixas', 'Raul Seixas', 'Rock', 500.00, 'img/67.png', '2026-09-13 17:00:14'),
(19, 'Raul Vivo', 'Raul Seixas', 'Rock', 130.00, 'img/68.png', '2026-09-13 17:00:14'),
(20, 'Vida', 'Chico Buarque', 'MPB', 100.00, 'img/69.png', '2026-09-13 17:00:14'),
(21, 'Construção', 'Chico Buarque', 'MPB', 90.00, 'img/71.png', '2026-09-13 17:00:14'),
(22, 'Chico Buarque | 1978', 'Chico Buarque', 'MPB', 110.00, 'img/72.png', '2026-09-13 17:00:14'),
(23, 'Chico Buarque | 1984', 'Chico Buarque', 'MPB', 90.00, 'img/73.png', '2026-09-13 17:00:14'),
(24, 'Chico Buarque | 1966', 'Chico Buarque', 'MPB', 90.00, 'img/74.png', '2026-09-13 17:00:14'),
(25, 'História da Música Popular Brasileira', 'Chico Buarque', 'MPB', 90.00, 'img/75.png', '2026-09-13 17:00:14');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `cpf` varchar(14) NOT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `criado_em` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `cpf`, `endereco`, `bairro`, `cidade`, `estado`, `cep`, `login`, `senha`, `criado_em`) VALUES
(1, 'Cauã dos Santos Sampaio', 'cauadossantossampaio@gmail.com', '069.538.775-88', 'R. Pinheiro, 110', 'Lot Pqe Colonial', 'Eunápolis', 'BA', '45821-391', 'caua', '81dc9bdb52d04dc20036dbd8313ed055', '2026-09-12 20:14:14'),
(2, 'Heitor dos Santos Sampaio', 'heitordossantossampaio@gmail.com', '000.000.000-00', 'R. Pinheiro, 110', 'Lot Pqe Colonial', 'Eunápolis', 'BA', '45821-391', 'heitor', '81dc9bdb52d04dc20036dbd8313ed055', '2026-09-13 17:11:32');

-- --------------------------------------------------------

--
-- Estrutura para tabela `vendas`
--

CREATE TABLE `vendas` (
  `id` int(11) NOT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `usuario` varchar(50) DEFAULT NULL,
  `pagamento` varchar(30) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `data_venda` datetime DEFAULT NULL,
  `itens` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `vendas`
--

INSERT INTO `vendas` (`id`, `numero`, `usuario`, `pagamento`, `total`, `data_venda`, `itens`) VALUES
(1, '9222', 'caua', 'PIX', 120.00, '2026-09-12 17:14:48', 'Disco Bad x1 (R$ 120)\n'),
(2, '1924', 'caua', 'PIX', 90.00, '2026-09-13 14:06:16', 'Acústico MTV (R$ 90.00)'),
(3, '9142', 'caua', 'PIX', 530.00, '2026-09-13 14:08:10', 'White Album x1 (R$ 130.00)\nTribalistas | 2017 x2 (R$ 110.00)\nChico Buarque | 1966 x1 (R$ 90.00)\nConstrução x1 (R$ 90.00)\n');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Índices de tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
