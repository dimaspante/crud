-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 20/10/2017 às 11:47
-- Versão do servidor: 5.5.51-38.2
-- Versão do PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `hpetc978_agenda`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` bigint(20) NOT NULL,
  `nome_admin` char(60) COLLATE utf8_unicode_ci NOT NULL,
  `email_admin` char(60) COLLATE utf8_unicode_ci NOT NULL,
  `apelido_admin` char(60) COLLATE utf8_unicode_ci NOT NULL,
  `senha_admin` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ultimo_login` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `admin`
--

INSERT INTO `admin` (`id_admin`, `nome_admin`, `email_admin`, `apelido_admin`, `senha_admin`, `data_cadastro`, `ultimo_login`) VALUES
(1, 'admin', 'test@test.net', 'admin', '$2y$10$i.GP2ESoy1ZIxhGqTSPB0O1uUNH3xrVsntpW3I0T/gR55190z9YY6', '2019-01-21 11:16:38', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `contato`
--

CREATE TABLE IF NOT EXISTS `contato` (
  `id_contato` bigint(20) NOT NULL,
  `nome_contato` char(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nascimento_contato` date DEFAULT NULL,
  `apelido_contato` char(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `excluido` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `contato`
--

INSERT INTO `contato` (`id_contato`, `nome_contato`, `nascimento_contato`, `apelido_contato`, `data_cadastro`, `excluido`) VALUES
(1, 'Dimas Pante', '1987-08-07', 'Dimas', '2019-01-21 13:34:02', 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `email`
--

CREATE TABLE IF NOT EXISTS `email` (
  `id_email` bigint(20) NOT NULL,
  `id_contato` int(11) NOT NULL,
  `email` char(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `telefone`
--

CREATE TABLE IF NOT EXISTS `telefone` (
  `id_telefone` bigint(20) NOT NULL,
  `id_contato` int(11) NOT NULL,
  `telefone` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `telefone`
--

INSERT INTO `telefone` (`id_telefone`, `id_contato`, `telefone`, `data_cadastro`) VALUES
(1, 1, '51 99947-7831', '2019-01-21 13:36:10');

--
-- Índices de tabela `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Índices de tabela `contato`
--
ALTER TABLE `contato`
  ADD PRIMARY KEY (`id_contato`), ADD FULLTEXT KEY `nome_contato` (`nome_contato`), ADD FULLTEXT KEY `apelido_contato` (`apelido_contato`);

--
-- Índices de tabela `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id_email`), ADD KEY `id_contato` (`id_contato`), ADD KEY `id_contato_2` (`id_contato`), ADD FULLTEXT KEY `email` (`email`);

--
-- Índices de tabela `telefone`
--
ALTER TABLE `telefone`
  ADD PRIMARY KEY (`id_telefone`), ADD KEY `id_contato` (`id_contato`), ADD FULLTEXT KEY `telefone` (`telefone`);

--
-- AUTO_INCREMENT de tabela `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `contato`
--
ALTER TABLE `contato`
  MODIFY `id_contato` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `telefone`
--
ALTER TABLE `telefone`
  MODIFY `id_telefone` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
