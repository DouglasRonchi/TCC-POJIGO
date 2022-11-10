-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Ago-2019 às 04:34
-- Versão do servidor: 10.3.15-MariaDB
-- versão do PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `controlerotas`
--
CREATE DATABASE IF NOT EXISTS `controlerotas` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `controlerotas`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `chat_mensagens`
--

DROP TABLE IF EXISTS `chat_mensagens`;
CREATE TABLE `chat_mensagens` (
  `id` int(11) NOT NULL,
  `fk_usuario_chat` int(11) DEFAULT NULL,
  `mensagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

DROP TABLE IF EXISTS `cidades`;
CREATE TABLE `cidades` (
  `id` int(11) NOT NULL,
  `nome_cidade` varchar(255) NOT NULL,
  `latitude_cidade` varchar(255) NOT NULL,
  `longitude_cidade` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`id`, `nome_cidade`, `latitude_cidade`, `longitude_cidade`) VALUES
(1, 'Blumenau', '', ''),
(2, 'Indaial', '', ''),
(3, 'Rio do Sul', '', ''),
(4, 'Gaspar', '', ''),
(5, 'Timbó', '', ''),
(6, 'Apiúna', '', ''),
(7, 'Rodeio', '', ''),
(8, 'Pomerode', '', ''),
(9, 'Navegantes', '', ''),
(10, 'Londrina', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `diarias`
--

DROP TABLE IF EXISTS `diarias`;
CREATE TABLE `diarias` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `valor` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `diarias`
--

INSERT INTO `diarias` (`id`, `nome`, `valor`) VALUES
(1, 'Café', 18.5),
(2, 'Almoço', 18.5),
(3, 'Janta', 18.5),
(4, 'Diária Completa', 18.5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `log_rotas`
--

DROP TABLE IF EXISTS `log_rotas`;
CREATE TABLE `log_rotas` (
  `id` int(11) NOT NULL,
  `fk_cod_viagem` int(11) DEFAULT NULL,
  `latitude` varchar(255) NOT NULL,
  `longitude` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `marca_veiculo`
--

DROP TABLE IF EXISTS `marca_veiculo`;
CREATE TABLE `marca_veiculo` (
  `id` int(11) NOT NULL,
  `marca` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `marca_veiculo`
--

INSERT INTO `marca_veiculo` (`id`, `marca`) VALUES
(1, 'Ford'),
(2, 'Mercedes');

-- --------------------------------------------------------

--
-- Estrutura da tabela `modelo_veiculo`
--

DROP TABLE IF EXISTS `modelo_veiculo`;
CREATE TABLE `modelo_veiculo` (
  `id` int(11) NOT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `fk_marca` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Extraindo dados da tabela `modelo_veiculo`
--

INSERT INTO `modelo_veiculo` (`id`, `modelo`, `fk_marca`) VALUES
(1, 'Cargo 2429', 1),
(2, 'Cargo 815', 1),
(3, 'Atego', 2),
(4, 'Accello', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `motivos_atrasos`
--

DROP TABLE IF EXISTS `motivos_atrasos`;
CREATE TABLE `motivos_atrasos` (
  `id` int(11) NOT NULL,
  `nome_motivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `motivos_atrasos`
--

INSERT INTO `motivos_atrasos` (`id`, `nome_motivo`) VALUES
(1, 'Acidente'),
(2, 'Trânsito Parado'),
(3, 'Obras na Pista');

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro_ponto`
--

DROP TABLE IF EXISTS `registro_ponto`;
CREATE TABLE `registro_ponto` (
  `id` int(11) NOT NULL,
  `fk_usuario` int(11) DEFAULT NULL,
  `fk_rota` int(11) DEFAULT NULL,
  `hora_inicio` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `hora_inicio_intervalo` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hora_fim_intervalo` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `inicio_parada_um` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fim_parada_um` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `inicio_parada_dois` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `fim_parada_dois` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `hora_fim` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `cod_viagem` int(11) NOT NULL,
  `fk_veiculo` int(11) DEFAULT NULL,
  `fk_diaria` int(11) DEFAULT NULL,
  `fk_motivo_parada_um` int(11) DEFAULT NULL,
  `fk_motivo_parada_dois` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rotas`
--

DROP TABLE IF EXISTS `rotas`;
CREATE TABLE `rotas` (
  `id` int(11) NOT NULL,
  `nome_rota` varchar(255) NOT NULL,
  `fk_cidade_origem` int(11) DEFAULT NULL,
  `fk_cidade_destino` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `rotas`
--

INSERT INTO `rotas` (`id`, `nome_rota`, `fk_cidade_origem`, `fk_cidade_destino`) VALUES
(1, 'Blumenau x Indaial', 1, 2),
(2, 'Rio do Sul x Gaspar', 3, 4),
(3, 'Indaial x Blumenau', 2, 1),
(4, 'Gaspar x Rio do Sul', 4, 3),
(5, 'Blumenau x Navegantes', 1, 9),
(6, 'Blumenau x Rodeio', 1, 7),
(7, 'Blumenau x Pomerode', 1, 8);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `cadastro` int(11) NOT NULL,
  `nome` varchar(32) NOT NULL,
  `rg` bigint(20) NOT NULL,
  `cpf` bigint(20) NOT NULL,
  `endereco` varchar(32) NOT NULL,
  `numero_casa` int(11) DEFAULT NULL,
  `estado` varchar(2) NOT NULL,
  `cidade` varchar(32) NOT NULL,
  `bairro` varchar(32) NOT NULL,
  `telefone` bigint(20) NOT NULL,
  `data_admissao` date NOT NULL,
  `data_nascimento` date NOT NULL,
  `cnh` int(11) NOT NULL,
  `venc_cnh` date NOT NULL,
  `mopp` int(11) DEFAULT NULL,
  `venc_mopp` date DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tipo_usuario` varchar(32) NOT NULL,
  `previlegio` int(11) NOT NULL,
  `online` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario`, `senha`, `cadastro`, `nome`, `rg`, `cpf`, `endereco`, `numero_casa`, `estado`, `cidade`, `bairro`, `telefone`, `data_admissao`, `data_nascimento`, `cnh`, `venc_cnh`, `mopp`, `venc_mopp`, `data_cadastro`, `tipo_usuario`, `previlegio`, `online`) VALUES
(14, 'douglas', '123', 17681, 'Douglas Ronchi', 1235875, 8705860800, 'Rua tal', 123, 'SC', 'Timbó', 'Capitais', 479999585, '2019-08-14', '2019-08-14', 123, '2019-08-14', 123, '2019-08-14', '2019-08-15 01:04:50', 'Administrador', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `veiculos`
--

DROP TABLE IF EXISTS `veiculos`;
CREATE TABLE `veiculos` (
  `id` int(11) NOT NULL,
  `frota` int(11) NOT NULL,
  `fk_modelo` int(11) DEFAULT NULL,
  `placa` varchar(255) NOT NULL,
  `chassi` varchar(255) DEFAULT NULL,
  `renavam` int(255) DEFAULT NULL,
  `capacidade_tanque` int(255) DEFAULT NULL,
  `ano_fab` year(4) NOT NULL,
  `ano_mod` year(4) DEFAULT NULL,
  `capacidade_carga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `veiculos`
--

INSERT INTO `veiculos` (`id`, `frota`, `fk_modelo`, `placa`, `chassi`, `renavam`, `capacidade_tanque`, `ano_fab`, `ano_mod`, `capacidade_carga`) VALUES
(1, 251, 1, 'QHJ-2589', NULL, NULL, NULL, 2010, NULL, NULL),
(2, 277, NULL, 'GUA-5865', NULL, NULL, NULL, 2019, NULL, NULL),
(3, 256, NULL, 'JUA-2546', NULL, NULL, NULL, 2005, NULL, NULL),
(4, 257, NULL, 'MIA-8653', NULL, NULL, NULL, 2015, NULL, NULL),
(5, 50, NULL, 'MKL-5588', NULL, NULL, NULL, 2008, NULL, NULL),
(6, 89, NULL, 'KSL-4685', NULL, NULL, NULL, 2012, NULL, NULL),
(12, 2, 1, 'koi-5252', '5', 5, 5, 2019, 2019, 2);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `chat_mensagens`
--
ALTER TABLE `chat_mensagens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chat_mensagens_fk0` (`fk_usuario_chat`);

--
-- Índices para tabela `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `diarias`
--
ALTER TABLE `diarias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `log_rotas`
--
ALTER TABLE `log_rotas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `log_rotas_fk0` (`fk_cod_viagem`);

--
-- Índices para tabela `marca_veiculo`
--
ALTER TABLE `marca_veiculo`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `modelo_veiculo`
--
ALTER TABLE `modelo_veiculo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_fk_marca` (`fk_marca`);

--
-- Índices para tabela `motivos_atrasos`
--
ALTER TABLE `motivos_atrasos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `registro_ponto`
--
ALTER TABLE `registro_ponto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registro_ponto_fk0` (`fk_usuario`),
  ADD KEY `registro_ponto_fk1` (`fk_rota`),
  ADD KEY `registro_ponto_fk2` (`fk_veiculo`),
  ADD KEY `registro_ponto_fk3` (`fk_diaria`),
  ADD KEY `registro_ponto_fk4` (`fk_motivo_parada_um`),
  ADD KEY `registro_ponto_fk5` (`fk_motivo_parada_dois`);

--
-- Índices para tabela `rotas`
--
ALTER TABLE `rotas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rotas_fk0` (`fk_cidade_origem`),
  ADD KEY `rotas_fk1` (`fk_cidade_destino`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`);

--
-- Índices para tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `veiculos_ibfk_1` (`fk_modelo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `chat_mensagens`
--
ALTER TABLE `chat_mensagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `diarias`
--
ALTER TABLE `diarias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `log_rotas`
--
ALTER TABLE `log_rotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `marca_veiculo`
--
ALTER TABLE `marca_veiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `modelo_veiculo`
--
ALTER TABLE `modelo_veiculo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `motivos_atrasos`
--
ALTER TABLE `motivos_atrasos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `registro_ponto`
--
ALTER TABLE `registro_ponto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `rotas`
--
ALTER TABLE `rotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `veiculos`
--
ALTER TABLE `veiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `chat_mensagens`
--
ALTER TABLE `chat_mensagens`
  ADD CONSTRAINT `chat_mensagens_fk0` FOREIGN KEY (`fk_usuario_chat`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `log_rotas`
--
ALTER TABLE `log_rotas`
  ADD CONSTRAINT `log_rotas_fk0` FOREIGN KEY (`fk_cod_viagem`) REFERENCES `registro_ponto` (`id`);

--
-- Limitadores para a tabela `modelo_veiculo`
--
ALTER TABLE `modelo_veiculo`
  ADD CONSTRAINT `id_fk_marca` FOREIGN KEY (`fk_marca`) REFERENCES `marca_veiculo` (`id`);

--
-- Limitadores para a tabela `registro_ponto`
--
ALTER TABLE `registro_ponto`
  ADD CONSTRAINT `registro_ponto_fk0` FOREIGN KEY (`fk_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `registro_ponto_fk1` FOREIGN KEY (`fk_rota`) REFERENCES `rotas` (`id`),
  ADD CONSTRAINT `registro_ponto_fk2` FOREIGN KEY (`fk_veiculo`) REFERENCES `veiculos` (`id`),
  ADD CONSTRAINT `registro_ponto_fk3` FOREIGN KEY (`fk_diaria`) REFERENCES `diarias` (`id`),
  ADD CONSTRAINT `registro_ponto_fk4` FOREIGN KEY (`fk_motivo_parada_um`) REFERENCES `motivos_atrasos` (`id`),
  ADD CONSTRAINT `registro_ponto_fk5` FOREIGN KEY (`fk_motivo_parada_dois`) REFERENCES `motivos_atrasos` (`id`);

--
-- Limitadores para a tabela `rotas`
--
ALTER TABLE `rotas`
  ADD CONSTRAINT `rotas_fk0` FOREIGN KEY (`fk_cidade_origem`) REFERENCES `cidades` (`id`),
  ADD CONSTRAINT `rotas_fk1` FOREIGN KEY (`fk_cidade_destino`) REFERENCES `cidades` (`id`);

--
-- Limitadores para a tabela `veiculos`
--
ALTER TABLE `veiculos`
  ADD CONSTRAINT `veiculos_ibfk_1` FOREIGN KEY (`fk_modelo`) REFERENCES `modelo_veiculo` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
