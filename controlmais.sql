-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 28/08/2016 às 23:10
-- Versão do servidor: 10.1.13-MariaDB
-- Versão do PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `controlmais`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `ctrl_movement`
--

CREATE TABLE `ctrl_movement` (
  `movement_id` int(11) NOT NULL,
  `movement_description` varchar(256) NOT NULL,
  `movement_value` float NOT NULL,
  `movement_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `movement_type` int(11) NOT NULL,
  `movement_categoryId` int(11) NOT NULL,
  `movement_expenseType` int(11) NOT NULL,
  `movement_expected` int(11) NOT NULL,
  `movement_typePayment` int(11) NOT NULL,
  `movement_billed` int(11) NOT NULL,
  `movement_walletId` int(11) NOT NULL,
  `movement_userId` int(11) NOT NULL,
  `movement_dateRegistration` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ctrl_users`
--

CREATE TABLE `ctrl_users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_login` varchar(128) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_photo` varchar(256) DEFAULT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_registration` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_lastupdate` timestamp NULL DEFAULT NULL,
  `user_level` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `ctrl_users`
--

INSERT INTO `ctrl_users` (`user_id`, `user_name`, `user_login`, `user_email`, `user_photo`, `user_password`, `user_registration`, `user_lastupdate`, `user_level`) VALUES
(1, 'Isaac José Silvério', 'isaac', 'isaac.acz@gmail.com', NULL, 'cm9zZTE5ODQ=', '2016-08-20 19:58:36', NULL, 10),
(2, 'Michael Lima Alves', 'michael', 'michaelalves@outlook.com', NULL, 'MTIz', '2016-08-28 21:10:06', NULL, 10);

-- --------------------------------------------------------

--
-- Estrutura para tabela `ctrl_wallet`
--

CREATE TABLE `ctrl_wallet` (
  `wallet_id` int(11) NOT NULL,
  `wallet_description` varchar(256) NOT NULL,
  `wallet_balance` decimal(10,0) NOT NULL,
  `wallet_bankAccount` int(11) NOT NULL,
  `wallet_type` int(11) NOT NULL,
  `wallet_valueTarget` decimal(10,0) NOT NULL,
  `wallet_startDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `wallet_finalDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `wallet_lastUpdateDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `wallet_user` int(11) NOT NULL,
  `wallet_sharedUsers` int(11) NOT NULL,
  `wallet_dateRegistration` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `ctrl_walletShared`
--

CREATE TABLE `ctrl_walletShared` (
  `shared_id` int(11) NOT NULL,
  `shared_userId` int(11) NOT NULL,
  `shared_userIdShared` int(11) NOT NULL,
  `shared_status` int(11) NOT NULL,
  `shared_dateInvitation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `shared_dateDecision` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `shared_dateFinish` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `ctrl_movement`
--
ALTER TABLE `ctrl_movement`
  ADD PRIMARY KEY (`movement_id`);

--
-- Índices de tabela `ctrl_users`
--
ALTER TABLE `ctrl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Índices de tabela `ctrl_wallet`
--
ALTER TABLE `ctrl_wallet`
  ADD PRIMARY KEY (`wallet_id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `ctrl_movement`
--
ALTER TABLE `ctrl_movement`
  MODIFY `movement_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `ctrl_users`
--
ALTER TABLE `ctrl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de tabela `ctrl_wallet`
--
ALTER TABLE `ctrl_wallet`
  MODIFY `wallet_id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
