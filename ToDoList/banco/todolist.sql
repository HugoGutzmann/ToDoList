-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 03-Jan-2019 às 21:43
-- Versão do servidor: 10.1.37-MariaDB
-- versão do PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `afazeres`
--

CREATE TABLE `afazeres` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `data` date NOT NULL,
  `descricao` varchar(800) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `afazeres`
--

INSERT INTO `afazeres` (`id`, `nome`, `data`, `descricao`) VALUES
(7, 'hugo', '2019-01-03', 'aaaa');

-- --------------------------------------------------------

--
-- Estrutura da tabela `finalizadas`
--

CREATE TABLE `finalizadas` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `data` date NOT NULL,
  `descricao` varchar(800) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Extraindo dados da tabela `finalizadas`
--

INSERT INTO `finalizadas` (`id`, `nome`, `data`, `descricao`) VALUES
(5, 'terminar hjoje', '2019-01-03', 'asdasd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `afazeres`
--
ALTER TABLE `afazeres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `finalizadas`
--
ALTER TABLE `finalizadas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `afazeres`
--
ALTER TABLE `afazeres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `finalizadas`
--
ALTER TABLE `finalizadas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
