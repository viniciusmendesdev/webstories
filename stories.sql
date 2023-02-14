-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 14, 2023 at 12:51 PM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stories`
--

-- --------------------------------------------------------

--
-- Table structure for table `contatos`
--

CREATE TABLE `contatos` (
  `id` int(11) NOT NULL,
  `id_quiz` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cotas`
--

CREATE TABLE `cotas` (
  `id` int(11) NOT NULL,
  `numero` varchar(255) DEFAULT NULL,
  `id_rifa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cotas`
--

INSERT INTO `cotas` (`id`, `numero`, `id_rifa`) VALUES
(1, '145', NULL),
(2, '234', NULL),
(3, '345', NULL),
(4, '478', NULL),
(5, '545', NULL),
(6, '160', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pergunta`
--

CREATE TABLE `pergunta` (
  `id` int(11) NOT NULL,
  `id_quiz` int(11) NOT NULL,
  `pergunta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pergunta`
--

INSERT INTO `pergunta` (`id`, `id_quiz`, `pergunta`) VALUES
(1, 1, 'Qual o seu benefício preferido?'),
(2, 1, 'Em qual grupo você se encaixa?'),
(3, 1, 'Qual é a sua faixa salarial?'),
(4, 1, 'E para finalizar, você está negativado?');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `urlDestino` varchar(255) NOT NULL,
  `pagina` varchar(100) NOT NULL,
  `frasefinal` varchar(255) NOT NULL,
  `destino` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `id_usuario`, `nome`, `urlDestino`, `pagina`, `frasefinal`, `destino`) VALUES
(1, 1, 'Análise de Cartão de Crédito', 'cartao-para-negativados', 'cartao-para-negativados-1673614438', 'Encontramos um cartão para o seu perfil', 'https://cartaoaprovado.rds.land/cartao-aprovado');

-- --------------------------------------------------------

--
-- Table structure for table `resposta`
--

CREATE TABLE `resposta` (
  `id` int(11) NOT NULL,
  `id_pergunta` int(11) NOT NULL,
  `resposta` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resposta`
--

INSERT INTO `resposta` (`id`, `id_pergunta`, `resposta`) VALUES
(1, 1, 'Limite Alto'),
(2, 1, 'Aprovação Imediata'),
(3, 1, 'Milhas e Pontos'),
(4, 1, 'Anuidade Zero'),
(5, 2, 'Desempregado'),
(6, 2, 'Autônomo'),
(7, 2, 'Estudante'),
(8, 2, 'Servidor Público'),
(9, 2, 'Aposentado ou Pensionista'),
(10, 2, 'Empresário'),
(11, 3, 'Até R$ 2.500,00'),
(12, 3, 'De R$ 2.501,00 a R$ 5.000,00'),
(13, 3, 'De R$ 5.001,00 a R$ 10.000,00'),
(14, 3, 'Acima de R$ 10.000,00'),
(15, 4, 'Sim'),
(16, 4, 'Não'),
(17, 4, 'Não sei ainda');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `url` varchar(255) NOT NULL,
  `capa` varchar(255) NOT NULL,
  `dataCadastro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`id`, `titulo`, `descricao`, `url`, `capa`, `dataCadastro`) VALUES
(30, 'Torta de Maça com Calda Deliciosa Para Impressionar a Família', 'Veja como você pode impressionar a família com uma deliciosa torta de maçã com calda. A forma mais fácil de fazer em até 30 minutos', 'torta-de-maca-com-calda-deliciosa-para-impressionar-a-familia-1675803569', 'https://flordel.nyc/d/apple_pie.jpg', '2023-02-07 20:02:29'),
(31, 'Os melhores Aviões para viajar no Brasil', 'Veja quais os melhores aviões para viajar no Brasil e fazer ótimas economias nas passagens', 'os-melhores-avioes-para-viajar-no-brasil-1675813082', 'https://seda.college/blog/wp-content/uploads/2018/12/aviao-decolando.jpg', '2023-02-07 23:02:02'),
(32, 'Meu teste de Web Stories', 'Este é meu primeiro teste de XML do Google Web Stories', 'meu-teste-de-web-stories-1675859944', 'https://img.olhardigital.com.br/wp-content/uploads/2020/10/20201007113859.jpg', '2023-02-08 12:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `stories_pages`
--

CREATE TABLE `stories_pages` (
  `id` int(11) NOT NULL,
  `id_stories` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `texto` varchar(255) NOT NULL,
  `imagem_bg` varchar(255) DEFAULT NULL,
  `botao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stories_pages`
--

INSERT INTO `stories_pages` (`id`, `id_stories`, `titulo`, `texto`, `imagem_bg`, `botao`) VALUES
(14, 30, 'A melhor torta de maçã com calda', 'Chegou domingo e você quer impressionar a família com uma deliciosa torta de maçã para as visitas. Aprenda agora todos os ingredientes e como preparar', 'https://cdn.shopify.com/s/files/1/0515/2030/7385/articles/shutterstock_252733429_1_1600x.jpg', ''),
(15, 30, '', 'Ingredientes:\n2 xícaras (250g) de farinha de trigo\n1 xícaras (225g) de açúcar\n1 ovo\n200g de manteiga sem sal\n1 colher de chá de fermento em pó\n6 maçãs médias descascadas e cortadas em cubinhos', 'https://snapp.market/blog/wp-content/uploads/2021/09/apple-cake-02-1024x640.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `zap` varchar(100) NOT NULL,
  `data_cadastro` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('inativo','ativo') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `login`, `senha`, `nome`, `cpf`, `email`, `zap`, `data_cadastro`, `status`) VALUES
(1, 'admin@admin.com', '$2y$10$X3DOds.OggYYTW3d4HLKG.SFfpcs8INom8bTw1KQMsT9RSQv/4RGG', 'Vinicius Mendes', '10677596707', 'admin@admin.com', '(21) 98106-0115', '2022-10-24 13:38:37', 'ativo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contatos`
--
ALTER TABLE `contatos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cotas`
--
ALTER TABLE `cotas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pergunta`
--
ALTER TABLE `pergunta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resposta`
--
ALTER TABLE `resposta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stories_pages`
--
ALTER TABLE `stories_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contatos`
--
ALTER TABLE `contatos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cotas`
--
ALTER TABLE `cotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pergunta`
--
ALTER TABLE `pergunta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `resposta`
--
ALTER TABLE `resposta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `stories_pages`
--
ALTER TABLE `stories_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
