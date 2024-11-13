-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 13-Nov-2024 às 20:24
-- Versão do servidor: 8.0.21
-- versão do PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbavesso`
--
CREATE DATABASE IF NOT EXISTS `dbavesso` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dbavesso`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbfotos_usuarios`
--

DROP TABLE IF EXISTS `tbfotos_usuarios`;
CREATE TABLE IF NOT EXISTS `tbfotos_usuarios` (
  `idUsuario` int NOT NULL,
  `nomeArquivoFoto` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbhashtags`
--

DROP TABLE IF EXISTS `tbhashtags`;
CREATE TABLE IF NOT EXISTS `tbhashtags` (
  `idHashtag` int NOT NULL AUTO_INCREMENT,
  `idUsuario` int NOT NULL,
  `tituloHashtag` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idHashtag`),
  KEY `usuario_id_fk` (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbhashtags`
--

INSERT INTO `tbhashtags` (`idHashtag`, `idUsuario`, `tituloHashtag`) VALUES
(46, 13, 'Viagem'),
(47, 13, 'Leitura'),
(48, 13, 'Comidas'),
(49, 13, 'Estudar'),
(50, 13, 'Esportes'),
(51, 13, 'Filmes'),
(52, 13, 'Desenhar'),
(53, 13, 'Desenhar'),
(54, 13, 'Transporte'),
(55, 13, 'Transporte'),
(56, 13, 'Transporte'),
(57, 13, 'Transporte');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbhashtags_app`
--

DROP TABLE IF EXISTS `tbhashtags_app`;
CREATE TABLE IF NOT EXISTS `tbhashtags_app` (
  `idHashtag` int NOT NULL AUTO_INCREMENT,
  `tituloHashtag` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idHashtag`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbhashtags_app`
--

INSERT INTO `tbhashtags_app` (`idHashtag`, `tituloHashtag`) VALUES
(4, 'Transporte'),
(5, 'Viagem'),
(6, 'Leitura'),
(7, 'Bebidas'),
(8, 'Comidas'),
(9, 'Estudar'),
(10, 'Esportes'),
(11, 'Filmes'),
(12, 'Desenhar'),
(13, 'Músicas'),
(14, 'Dançar');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tblikes`
--

DROP TABLE IF EXISTS `tblikes`;
CREATE TABLE IF NOT EXISTS `tblikes` (
  `idUsuario` int NOT NULL,
  `idUsuarioLike` int NOT NULL,
  `dataLike` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `usuarioLike_id_fk` (`idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmatches`
--

DROP TABLE IF EXISTS `tbmatches`;
CREATE TABLE IF NOT EXISTS `tbmatches` (
  `idUsuario` int NOT NULL,
  `idUsuarioMatch` int NOT NULL,
  `dataMatche` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`idUsuario`,`idUsuarioMatch`),
  KEY `usuario_id4_fk` (`idUsuario`),
  KEY `usuario_id5_fk` (`idUsuarioMatch`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbmatches`
--

INSERT INTO `tbmatches` (`idUsuario`, `idUsuarioMatch`) VALUES
(1, 2),
(2, 1),
(2, 7),
(3, 5),
(4, 5),
(5, 3),
(5, 4),
(7, 1),
(7, 2),
(7, 3),
(7, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbmensagens`
--

DROP TABLE IF EXISTS `tbmensagens`;
CREATE TABLE IF NOT EXISTS `tbmensagens` (
  `idMensagem` int NOT NULL AUTO_INCREMENT,
  `idRemetente` int NOT NULL,
  `idDestinatario` int NOT NULL,
  `conteudoMsg` text COLLATE utf8mb4_general_ci NOT NULL,
  `msgVisualizada` tinyint NOT NULL DEFAULT '0',
  `dataMsg` timestamp NOT NULL,
  PRIMARY KEY (`idMensagem`),
  KEY `remetente_id_fk` (`idRemetente`),
  KEY `destinatario_id_fk` (`idDestinatario`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbmensagens`
--

INSERT INTO `tbmensagens` (`idMensagem`, `idRemetente`, `idDestinatario`, `conteudoMsg`, `msgVisualizada`, `dataMsg`) VALUES
(3, 2, 1, 'teste de msg', 1, '2024-11-07 03:00:00'),
(4, 1, 3, 'teste de msg', 1, '2024-11-07 03:00:00'),
(5, 1, 3, 'teste de msg', 1, '2024-11-07 03:00:00'),
(6, 1, 3, 'teste de msg', 1, '0000-00-00 00:00:00'),
(7, 1, 3, 'teste de msg', 1, '2024-11-07 13:45:24'),
(8, 1, 3, 'teste de msg', 1, '2024-11-07 13:45:24'),
(9, 1, 3, 'teste de msg', 1, '2024-11-07 03:00:00'),
(11, 2, 1, 'teste da juliana', 1, '2024-11-07 14:23:54'),
(14, 2, 1, 'teste da juliana', 1, '2024-11-07 14:27:39'),
(16, 2, 1, 'Oi Marcos', 1, '2024-11-07 14:28:06'),
(17, 2, 1, 'll', 1, '2024-11-07 14:30:26'),
(20, 2, 1, 'teste', 1, '2024-11-07 14:49:46'),
(22, 2, 1, 'fdgfdg', 1, '2024-11-07 14:57:08'),
(27, 2, 1, 'sdfdsf', 1, '2024-11-07 14:59:57'),
(28, 3, 2, 'teste de msg', 1, '2024-11-07 14:43:00'),
(29, 3, 2, 'teste de msg', 1, '2024-11-07 14:43:00'),
(30, 3, 2, 'teste de msg', 1, '2024-11-07 14:43:00'),
(31, 3, 2, 'teste de msg', 1, '2024-11-07 14:43:00'),
(32, 3, 2, 'teste de msg', 1, '2024-11-07 14:43:00'),
(33, 2, 1, 'sdfdsf', 1, '2024-11-07 15:12:37'),
(54, 2, 1, 'hhhhh', 1, '2024-11-07 19:37:51'),
(55, 2, 1, 'dfsdf', 1, '2024-11-07 19:39:45'),
(57, 4, 5, 'Oi Lara', 1, '2024-11-07 21:10:42'),
(58, 4, 5, 'Oi HenrY', 1, '2024-11-07 21:11:03'),
(59, 5, 4, 'Oi Lara', 1, '2024-11-07 21:11:09'),
(60, 4, 5, 'ggg', 1, '2024-11-07 21:12:07'),
(61, 5, 4, 'fff', 1, '2024-11-07 21:15:03'),
(62, 4, 5, 'cxzczx', 1, '2024-11-07 21:15:29'),
(63, 4, 5, 'sdfdsf', 1, '2024-11-07 21:15:37'),
(64, 4, 5, 'sdad', 1, '2024-11-07 21:22:45'),
(65, 4, 5, 'teste', 1, '2024-11-07 21:23:55'),
(66, 4, 5, 'asdfasd', 1, '2024-11-07 21:33:25'),
(67, 4, 5, 'asdfas', 1, '2024-11-07 21:36:57'),
(68, 5, 4, 'dsfdsf', 1, '2024-11-07 21:37:13'),
(69, 4, 5, 'zxC  vcdsafs fasdf asd fasd fasdfasd fasd fadsfasd asdf asdfasd f.', 1, '2024-11-07 22:06:12'),
(70, 4, 5, 'asdfasd ads fasdf asdf asd fasdfsd asdfds ds fdsf adsfda ads fasdf asdf asdf adsfdsa fds fasdf asd fasdf aasd fasdfasdf asdfasd asd fasd fadsf adsfadsf asdfasdfasdfasdf asdfasf sdafsa', 1, '2024-11-07 22:06:34'),
(71, 4, 5, 'sda', 1, '2024-11-07 22:07:04'),
(72, 4, 5, 'fsdfds', 1, '2024-11-07 22:09:09'),
(73, 3, 5, 'tstes', 0, '2024-11-07 22:10:30'),
(74, 2, 1, 'Oi Marcos', 1, '2024-11-08 19:54:14'),
(75, 2, 1, 'Quando estiver on-line fale comigo.', 1, '2024-11-08 19:55:10'),
(76, 2, 1, '😍', 1, '2024-11-08 19:55:33'),
(77, 2, 1, 'sdfasds', 1, '2024-11-08 19:56:26'),
(78, 2, 1, 'Oi você veio', 1, '2024-11-08 19:57:30'),
(79, 1, 2, 'Sim vim', 1, '2024-11-08 19:57:42'),
(80, 4, 5, 'asdsad', 1, '2024-11-08 20:00:54'),
(81, 2, 7, 'teste', 1, '2024-11-08 20:00:54'),
(82, 7, 2, 'teste gu', 1, '2024-11-08 20:00:54'),
(107, 7, 1, 'sada', 0, '2024-11-12 02:15:29'),
(108, 2, 7, 'ggg', 1, '2024-11-12 02:27:29'),
(109, 7, 2, 'Oi Ju seu marido esta em casa', 1, '2024-11-12 02:53:14'),
(110, 7, 1, 'Bora', 0, '2024-11-12 03:14:35'),
(111, 7, 2, 'slkjglkf', 1, '2024-11-12 03:16:27'),
(112, 7, 2, 'sdfgsdf', 1, '2024-11-12 03:16:31'),
(113, 7, 2, 'sdfg', 1, '2024-11-12 03:16:34'),
(114, 7, 2, 'sdfgsdf', 1, '2024-11-12 03:16:41'),
(115, 7, 2, 'sdfg', 1, '2024-11-12 03:16:43'),
(116, 7, 2, 'sdfgsd', 1, '2024-11-12 03:16:48'),
(117, 7, 2, 'sdfg', 1, '2024-11-12 03:16:51'),
(118, 7, 2, 'sdfgsdfg', 1, '2024-11-12 03:16:54'),
(119, 7, 2, 'sdfgsdf', 1, '2024-11-12 03:16:55'),
(120, 7, 2, 'xvcvx', 1, '2024-11-12 03:17:07'),
(121, 7, 2, 'dsfdsfs', 1, '2024-11-12 03:17:26'),
(122, 7, 2, 'dfjskjgfd', 1, '2024-11-12 03:18:24'),
(123, 7, 1, 'trhghgfghfhgf', 0, '2024-11-12 03:41:27'),
(124, 2, 1, 'alfçkdsf', 0, '2024-11-12 04:41:28'),
(125, 2, 1, 'dslkfjlksdjaflksd', 0, '2024-11-12 04:41:34'),
(126, 2, 1, 'dkjfklsjkfl', 0, '2024-11-12 04:41:37'),
(127, 2, 1, 'kdskfl', 0, '2024-11-12 04:41:39'),
(128, 2, 1, 'lkdlsfklçsdk', 0, '2024-11-12 04:41:42'),
(129, 2, 1, 'ksdjkfjsdkjfksdj', 0, '2024-11-12 04:41:46'),
(130, 2, 1, 'jkdsja jadflk djskfjal sdkjflkasjdlkfjalkds flkajsdlkfj lkadsjlfkafd alkjdsflk asldkfjlkasd jfklajsdflkjasdklfj lkadsjf klaj sdkljflkasdj flkajsdklf jaslkdjfkl', 0, '2024-11-12 04:42:04'),
(131, 2, 1, 'dfsfsdfdsfs fdsfsdfsdfsdfsddfkgldflgfdçlkglçkdflkgdfçlkgçlfdklçgkdçflkgçldkfglçkdfçlkgkgçlfdkgçlkfdçlgkçldfklçgkfl gklfj gjdflkjgkldfjglkjdflkjg lkdfj glkjdflkg jdlfjglkfdjglkjdfklgjklsjkljlfkjgslkd jfglksdjf lkgjsdlkfj glksdfj gkljsdfkljgslkdfjglk sdfj klgjsdfkl gjklsdfj gklsjklgj sfdkljg klsdjf glksjfdklg jsdklf jglksdfj glkjsdflkgj lsdfj glksdjfglk jsdflkgjdsfkg', 0, '2024-11-12 04:42:37'),
(132, 2, 7, 'dfgfdgdfg', 1, '2024-11-12 04:43:10'),
(133, 7, 2, 'asçldkfçlaksd', 0, '2024-11-13 02:02:16'),
(134, 7, 2, 'dfssd', 0, '2024-11-13 02:04:48'),
(135, 7, 2, 'dfdsfds', 0, '2024-11-13 02:04:50'),
(136, 7, 2, 'gdfgdf', 0, '2024-11-13 03:00:19'),
(137, 7, 1, 'oi', 0, '2024-11-13 03:03:04');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbpaises`
--

DROP TABLE IF EXISTS `tbpaises`;
CREATE TABLE IF NOT EXISTS `tbpaises` (
  `idPais` int NOT NULL AUTO_INCREMENT,
  `nomePais` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idPais`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbpaises`
--

INSERT INTO `tbpaises` (`idPais`, `nomePais`) VALUES
(1, 'Brasil'),
(2, 'USA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbperguntas`
--

DROP TABLE IF EXISTS `tbperguntas`;
CREATE TABLE IF NOT EXISTS `tbperguntas` (
  `idPergunta` int NOT NULL AUTO_INCREMENT,
  `tituloPergunta` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`idPergunta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuarios`
--

DROP TABLE IF EXISTS `tbusuarios`;
CREATE TABLE IF NOT EXISTS `tbusuarios` (
  `idUsuario` int NOT NULL AUTO_INCREMENT,
  `emailUsuario` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `telefoneUsuario` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `senhaUsuario` varchar(64) COLLATE utf8mb4_general_ci NOT NULL,
  `nomeUsuario` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `dataNascUsuario` date DEFAULT NULL,
  `cidadeUsuario` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `idPais` int DEFAULT NULL,
  `bioUsuario` text COLLATE utf8mb4_general_ci,
  `sexualidadeUsuario` enum('Hétero','Homossexual','Bissexual','Outro','Prefiro não informar') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `generoUsuario` enum('Masculino','Feminino','Outro','Prefiro não informar') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `preferenciaUsuario` enum('Homem','Mulher','Todos') COLLATE utf8mb4_general_ci DEFAULT NULL,
  `fotoPerfilUsuario` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `pais_id_fk` (`idPais`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `tbusuarios`
--

INSERT INTO `tbusuarios` (`idUsuario`, `emailUsuario`, `telefoneUsuario`, `senhaUsuario`, `nomeUsuario`, `dataNascUsuario`, `cidadeUsuario`, `idPais`, `bioUsuario`, `sexualidadeUsuario`, `generoUsuario`, `preferenciaUsuario`, `fotoPerfilUsuario`) VALUES
(1, 'marcdmelo@gmail.com', '(19) 9999-9999', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Marcos', '1976-10-25', '', 1, NULL, 'Hétero', 'Masculino', 'Mulher', 'http://github.com/marcos-de-melo.png'),
(2, 'juliana@gmail.com', '(78) 88888-8888', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Juliana', '1987-08-20', '', 1, NULL, 'Hétero', 'Feminino', 'Homem', '2.png'),
(3, 'nic@gmail.com', '(88) 88888-8888', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'nicoly', '1987-08-20', '', 2, NULL, 'Hétero', 'Feminino', 'Homem', 'http://github.com/nerdschooltech.png'),
(4, 'lara@gmail.com', '(88) 84588-7858', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Lara', '2015-08-15', '', 1, NULL, 'Hétero', 'Feminino', 'Homem', 'http://github.com/nerdschooltech.png'),
(5, 'henry@dog.com', '(88) 84588-7854', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Henry', '2015-08-15', '', 2, NULL, 'Hétero', 'Masculino', 'Mulher', 'http://github.com/nerdschooltech.png'),
(6, 'nathaly@gmail.com', NULL, '7c4a8d09ca3762af61e59520943dc26494f8941b', 'nathaly gomes', '2000-09-20', 'Campinas', NULL, NULL, 'Hétero', 'Masculino', 'Homem', NULL),
(7, 'gustavo@balada.com', NULL, '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Gustavo Lima', '1980-02-15', 'Campinas', NULL, 'aSas', 'Hétero', 'Masculino', 'Homem', '7.png'),
(8, 'peter@einerd.com', NULL, '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Peter Jordan', '1975-03-03', 'Nova Venesa', NULL, NULL, 'Hétero', 'Masculino', 'Homem', NULL),
(10, 'fernando@gmail.com', NULL, '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Fernando', '1976-10-10', 'Sumare', NULL, NULL, 'Hétero', 'Masculino', 'Homem', '10.jpg'),
(11, 'andre@gmail.com', NULL, '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Andre Alves', '1979-11-11', 'Campinas', NULL, NULL, 'Hétero', 'Masculino', 'Homem', '11.png'),
(12, 'joao@gmail.com', NULL, '7c4a8d09ca3762af61e59520943dc26494f8941b', 'João Victor', '2006-11-11', 'Sumaré', NULL, NULL, 'Hétero', 'Masculino', 'Homem', '12.png'),
(13, 'juracir@gmail.com', NULL, '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Juracir Silva', '1985-12-12', 'Sumare', NULL, 'jjjjj', NULL, NULL, NULL, '13.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tbusuario_responde_pergunta`
--

DROP TABLE IF EXISTS `tbusuario_responde_pergunta`;
CREATE TABLE IF NOT EXISTS `tbusuario_responde_pergunta` (
  `idUsuario` int NOT NULL,
  `idPergunta` int NOT NULL,
  `respostaUsuario` text COLLATE utf8mb4_general_ci NOT NULL,
  KEY `usuario2_id_fk` (`idUsuario`),
  KEY `pergunta_id_fk` (`idPergunta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tbhashtags`
--
ALTER TABLE `tbhashtags`
  ADD CONSTRAINT `usuario_id_fk` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuarios` (`idUsuario`);

--
-- Limitadores para a tabela `tblikes`
--
ALTER TABLE `tblikes`
  ADD CONSTRAINT `usuario_id3_fk` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuarios` (`idUsuario`),
  ADD CONSTRAINT `usuarioLike_id_fk` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuarios` (`idUsuario`);

--
-- Limitadores para a tabela `tbmatches`
--
ALTER TABLE `tbmatches`
  ADD CONSTRAINT `usuario_id4_fk` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuarios` (`idUsuario`),
  ADD CONSTRAINT `usuario_id5_fk` FOREIGN KEY (`idUsuarioMatch`) REFERENCES `tbusuarios` (`idUsuario`);

--
-- Limitadores para a tabela `tbmensagens`
--
ALTER TABLE `tbmensagens`
  ADD CONSTRAINT `destinatario_id_fk` FOREIGN KEY (`idDestinatario`) REFERENCES `tbusuarios` (`idUsuario`),
  ADD CONSTRAINT `remetente_id_fk` FOREIGN KEY (`idRemetente`) REFERENCES `tbusuarios` (`idUsuario`);

--
-- Limitadores para a tabela `tbusuarios`
--
ALTER TABLE `tbusuarios`
  ADD CONSTRAINT `pais_id_fk` FOREIGN KEY (`idPais`) REFERENCES `tbpaises` (`idPais`);

--
-- Limitadores para a tabela `tbusuario_responde_pergunta`
--
ALTER TABLE `tbusuario_responde_pergunta`
  ADD CONSTRAINT `pergunta_id_fk` FOREIGN KEY (`idPergunta`) REFERENCES `tbperguntas` (`idPergunta`),
  ADD CONSTRAINT `usuario2_id_fk` FOREIGN KEY (`idUsuario`) REFERENCES `tbusuarios` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
