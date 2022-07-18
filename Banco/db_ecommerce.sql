-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Jul-2022 às 02:04
-- Versão do servidor: 10.4.17-MariaDB
-- versão do PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_ecommerce`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acessos`
--

CREATE TABLE `acessos` (
  `id` int(11) NOT NULL,
  `nivel` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `acessos`
--

INSERT INTO `acessos` (`id`, `nivel`) VALUES
(1, 'admin'),
(2, 'Assitente '),
(3, 'Coordenador'),
(4, 'Auxiliar'),
(6, 'Gerente'),
(7, 'caixa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `cargos`
--

INSERT INTO `cargos` (`id`, `nome`) VALUES
(1, 'Asssistente de Logística '),
(2, 'Coordenadora de Logística'),
(3, 'Asssistente de Logística'),
(4, 'Supervisor de Operações Logísticas Interior'),
(5, 'Encarregada de Expedição'),
(6, 'Assistente da qualidade'),
(7, 'Auxiliar de Logística'),
(8, 'Diretora'),
(9, 'Assistente Financeiro'),
(10, 'Coordenadora de RH'),
(13, 'yvvvyvy');

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`id`, `nome`, `foto`) VALUES
(1, 'Maquiagem', './imgs/090.jpg'),
(2, 'Acessorios', './imgs/00.jpg'),
(3, 'bolsas', './imgs/4.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(10) NOT NULL,
  `data` date DEFAULT NULL,
  `barra` varchar(50) NOT NULL,
  `codigo` int(10) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `qtd` int(11) NOT NULL,
  `valor_compra` decimal(10,2) NOT NULL,
  `valor_venda` decimal(10,2) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `foto` varchar(255) NOT NULL,
  `categorias_id` int(11) NOT NULL,
  `descricao` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `data`, `barra`, `codigo`, `nome`, `qtd`, `valor_compra`, `valor_venda`, `status`, `foto`, `categorias_id`, `descricao`) VALUES
(223, '2022-04-18', '7891760365967', 644482, 'CLIO', 20, '50.00', '300.00', NULL, './imgs/001-15-1.jpg', 108, 'Novo222');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `cargos_id` int(11) NOT NULL,
  `acessos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `cargos_id`, `acessos_id`) VALUES
(4, 'Administrador', 'admin@eneylton.com', '$2y$10$MMUFdV2cl1mm3N./lWVhCOy/VsIZQa3DM.od6mh4rTlOEfPmdUltC', 8, 1),
(7, 'ene', 'eneylton@hotmail.com', '$2y$10$JZR7X2ZpplGhF4dtchAhJedF/Y0/4ynAOd8VBlR4ehJfLOKHX4mLG', 2, 2),
(13, 'enexs', 'enex@gmail.com.br', '202cb962ac59075b964b07152d234b70', 5, 3);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `acessos`
--
ALTER TABLE `acessos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produtos_categorias1_idx` (`categorias_id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_usuarios_cargos_idx` (`cargos_id`),
  ADD KEY `fk_usuarios_acessos1_idx` (`acessos_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `acessos`
--
ALTER TABLE `acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
