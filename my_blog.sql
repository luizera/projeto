-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Nov-2018 às 14:49
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_blog`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `descricao`) VALUES
(1, 'ACAO', 'CU'),
(2, 'AVENTURA', 'CU'),
(3, 'SUSPENSE', 'CU'),
(4, 'TERROR', 'CU');

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `texto` text NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `autor` varchar(150) NOT NULL,
  `dt_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`id`, `titulo`, `texto`, `id_categoria`, `autor`, `dt_criacao`) VALUES
(1, 'MUITO BOM', 'TESTE', 1, 'AAAAA', '2018-10-10 13:37:05'),
(2, 'NAO GOSTEI MUITO', 'AJHDNASDASD', 2, 'AAAA', '2018-10-10 13:37:05'),
(3, 'ATE QUE E BOM', 'ALDKJHSANDA', 3, 'AAAA', '2018-10-10 13:52:28'),
(4, 'CURTI', 'ALJHKDLAJSDAS', 4, 'AAAAA', '2018-10-10 13:52:28'),
(5, 'MUITO RUIM', 'AAAAA', 1, 'AAAAAAAA', '2018-10-24 14:17:18'),
(6, 'ME SATISFEZ', 'AAAA', 2, '', '2018-10-24 14:17:18'),
(7, 'MUITO RUIM', 'AAAAA', 3, 'AAAAAAAA', '2018-10-24 14:18:07'),
(8, 'ME SATISFEZ', 'AAAA', 4, '', '2018-10-24 14:18:07'),
(9, 'ME SATISFEZ', 'AAAA', 1, '', '2018-10-24 14:18:07'),
(10, 'ME SATISFEZ', 'AAAA', 2, '', '2018-10-24 14:18:07'),
(11, 'ME SATISFEZ', 'AAAA', 3, '', '2018-10-24 14:18:07'),
(12, 'ME SATISFEZ', 'AAAA', 4, '', '2018-10-24 14:18:07');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `login` varchar(10) NOT NULL,
  `senha` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id_user`, `login`, `senha`) VALUES
(1, '1', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ind_categoria` (`id_categoria`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `fk_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
