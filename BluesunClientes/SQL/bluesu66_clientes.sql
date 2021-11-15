-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25/05/2021 às 22:22
-- Versão do servidor: 10.4.18-MariaDB
-- Versão do PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bluesu66_clientes`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `bluesun_galeria`
--

CREATE TABLE `bluesun_galeria` (
  `imabs_id` int(11) NOT NULL,
  `image_path` varchar(200) CHARACTER SET latin1 NOT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Galeria de imagens de obras da empresa franqueada' ROW_FORMAT=DYNAMIC;

--
-- Despejando dados para a tabela `bluesun_galeria`
--

INSERT INTO `bluesun_galeria` (`imabs_id`, `image_path`, `titulo`, `date`) VALUES
(1, '../public/sobreablue/bluesun1.jpg', 'Fotos da Bluesun', '2021-04-23 18:28:43'),
(2, '../public/sobreablue/bluesun2.jpg', 'Fotos da Bluesun', '2021-04-23 18:28:43'),
(3, '../public/sobreablue/bluesun4.jpg', 'Fotos da Bluesun', '2021-04-23 18:28:43'),
(4, '../public/sobreablue/bluesun3.jpg', 'Fotos da Bluesun', '2021-04-23 18:28:43'),
(5, '../public/sobreablue/bluesun5.jpg', 'Fotos da Bluesun', '2021-04-23 18:28:43'),
(6, '../public/sobreablue/bluesun6.jpg', 'Fotos da Bluesun', '2021-04-23 18:28:43'),
(7, '../public/sobreablue/bluesun7.jpg', 'Fotos da Bluesun', '2021-04-23 18:28:43'),
(8, '../public/sobreablue/bluesun8.jpg', 'Fotos da Bluesun', '2021-04-23 18:28:43'),
(9, '../public/sobreablue/bluesun9.jpg', 'Fotos da Bluesun', '2021-04-23 18:28:43'),
(10, '../public/sobreablue/bluesun10.jpg', 'Fotos da Bluesun', '2021-04-23 18:28:43'),
(11, '../public/sobreablue/bluesun11.jpg', 'Fotos da Bluesun', '2021-04-23 18:28:43'),
(12, '../public/sobreablue/bluesun12.jpg', 'Fotos da Bluesun', '2021-04-23 18:28:43');

-- --------------------------------------------------------

--
-- Estrutura para tabela `compartilho`
--

CREATE TABLE `compartilho` (
  `compartilho_id` int(11) NOT NULL,
  `compartilho_id_usuario` int(11) DEFAULT NULL,
  `url` varchar(200) NOT NULL,
  `tipo` varchar(10) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `descricao` text NOT NULL,
  `userPic` varchar(45) NOT NULL,
  `datacad` timestamp NOT NULL DEFAULT current_timestamp(),
  `datamod` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela de compartilhamento do site nas redes sociais, Facebook e Instagram';

-- --------------------------------------------------------

--
-- Estrutura para tabela `contato_mapa`
--

CREATE TABLE `contato_mapa` (
  `contato_id` int(11) NOT NULL,
  `contato_id_user` int(11) DEFAULT NULL,
  `endereco` varchar(50) NOT NULL DEFAULT '',
  `bairro` varchar(50) NOT NULL DEFAULT '',
  `cidade` varchar(50) NOT NULL DEFAULT '',
  `uf` varchar(2) NOT NULL DEFAULT '',
  `telefone` varchar(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mapa` longtext NOT NULL,
  `datacad` timestamp NOT NULL DEFAULT current_timestamp(),
  `datamod` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela dos contatos de endereço, telefones e mapa da empresa';

--
-- Despejando dados para a tabela `contato_mapa`
--

INSERT INTO `contato_mapa` (`contato_id`, `contato_id_user`, `endereco`, `bairro`, `cidade`, `uf`, `telefone`, `email`, `mapa`, `datacad`, `datamod`) VALUES
(1, 3, 'Rua Franciso Orlando Stocco, 442', 'Jd. Ouro Verde', 'Limeira', 'SP', '(19) 98457-8361', 'claumirlopes@gmail.com', '<p><iframe height=\"450\" src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3683.8077267046942!2d-47.41956798504026!3d-22.586293485175737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c881ad2ba53c2b%3A0x480bf0a0ec520cdb!2sR.%20Francisco%20Orlando%20Stoco%2C%20442%20-%20Jardim%20Ouro%20Verde%2C%20Limeira%20-%20SP%2C%2013482-050!5e0!3m2!1spt-BR!2sbr!4v1618232378905!5m2!1spt-BR!2sbr\" style=\"border:0\" width=\"100%\"></iframe></p>\r\n', '2021-04-23 04:04:11', '2021-04-23 05:04:25'),
(2, 4, 'Rua da Felicidade, 354', 'Jd. da Esperança', 'Virtude', 'PI', '(27) 2547-45555', 'felicidade@gmail.com', '<p><iframe height=\"450\" src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3683.8077267046942!2d-47.41956798504026!3d-22.586293485175737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c881ad2ba53c2b%3A0x480bf0a0ec520cdb!2sR.%20Francisco%20Orlando%20Stoco%2C%20442%20-%20Jardim%20Ouro%20Verde%2C%20Limeira%20-%20SP%2C%2013482-050!5e0!3m2!1spt-BR!2sbr!4v1618232378905!5m2!1spt-BR!2sbr\" style=\"border:0\" width=\"100%\"></iframe></p>', '2021-04-23 06:04:43', '2021-04-23 06:04:43');

-- --------------------------------------------------------

--
-- Estrutura para tabela `depoimentos`
--

CREATE TABLE `depoimentos` (
  `depoimento_id` int(11) NOT NULL,
  `depoimento_id_user` int(11) DEFAULT NULL,
  `nome` varchar(45) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `texto` tinytext NOT NULL,
  `userPic` varchar(45) NOT NULL,
  `datacad` timestamp NOT NULL DEFAULT current_timestamp(),
  `datamod` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela que mostra os depoimentos de clientes';

--
-- Despejando dados para a tabela `depoimentos`
--

INSERT INTO `depoimentos` (`depoimento_id`, `depoimento_id_user`, `nome`, `cargo`, `texto`, `userPic`, `datacad`, `datamod`) VALUES
(1, 3, 'Pessoa da Silva', 'Auxiliar Administrativo', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a', '258146.jpg', '2021-04-23 05:04:11', '2021-04-23 05:04:11'),
(2, 3, 'Teste Ribeiro', 'Analista de TI', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus sed luctus tortor, sed eleifend felis. Mauris ultrices, ante ut porta consectetur, lacus augue finibus lorem, et ullamcorper nisi mauris vel dui. Nullam viverra tristique accumsan. Vivamu', '337128.jpg', '2021-04-23 05:04:31', '2021-04-23 05:04:31'),
(3, 3, 'Maria de Oliveira', 'Diretora', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur molestie malesuada dapibus. Aliquam eget nisl justo. Integer blandit, lorem non posuere cursus, velit nisl volutpat libero, non pellentesque leo sem ac eros. Aliquam lobortis lacinia ur', '780641.jpg', '2021-04-23 05:04:23', '2021-04-23 05:04:23');

-- --------------------------------------------------------

--
-- Estrutura para tabela `energia_solar`
--

CREATE TABLE `energia_solar` (
  `energia_id` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `subtitulo` varchar(45) NOT NULL,
  `opcoes1` varchar(150) NOT NULL,
  `opcoes2` varchar(150) NOT NULL,
  `opcoes3` varchar(150) NOT NULL,
  `opcoes4` varchar(150) NOT NULL,
  `userPic` varchar(45) NOT NULL,
  `datacad` timestamp NOT NULL DEFAULT current_timestamp(),
  `datamod` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela que mostra a equipe da empresa franqueada';

--
-- Despejando dados para a tabela `energia_solar`
--

INSERT INTO `energia_solar` (`energia_id`, `titulo`, `subtitulo`, `opcoes1`, `opcoes2`, `opcoes3`, `opcoes4`, `userPic`, `datacad`, `datamod`) VALUES
(1, 'Energia Solar', 'Em todos os lugares', 'Residência', 'Comércio', 'Indústria', 'Área Rural', '17197.jpg', '2021-04-23 06:04:05', '2021-04-23 06:04:26');

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipe`
--

CREATE TABLE `equipe` (
  `equipe_id` int(11) NOT NULL,
  `equipe_id_user` int(11) DEFAULT NULL,
  `nome` varchar(45) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `userPic` varchar(45) NOT NULL,
  `datacad` timestamp NOT NULL DEFAULT current_timestamp(),
  `datamod` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela que mostra as informações da seção de energia solar';

--
-- Despejando dados para a tabela `equipe`
--

INSERT INTO `equipe` (`equipe_id`, `equipe_id_user`, `nome`, `cargo`, `userPic`, `datacad`, `datamod`) VALUES
(1, 3, 'Fulana de Tal 1', 'Cargo 1', '772224.jpg', '2021-04-23 06:04:03', '2021-04-23 06:04:03'),
(2, 3, 'Fulano de Tal 2', 'Cargo 2', '289472.jpg', '2021-04-23 06:04:58', '2021-04-23 06:04:58'),
(3, 3, 'Beltrano de Tal', 'Cargo 3', '23700.jpg', '2021-04-23 06:04:13', '2021-04-23 06:04:13'),
(4, 3, 'Ciclano de Tal', 'Cargo 4', '840631.jpg', '2021-04-23 06:04:31', '2021-04-23 06:04:31');

-- --------------------------------------------------------

--
-- Estrutura para tabela `itens`
--

CREATE TABLE `itens` (
  `item_id` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `texto` text NOT NULL,
  `icone` varchar(50) NOT NULL,
  `cor` varchar(30) DEFAULT NULL,
  `datacad` timestamp NOT NULL DEFAULT current_timestamp(),
  `datamod` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela que mostra algumas características da empresa no mercado';

--
-- Despejando dados para a tabela `itens`
--

INSERT INTO `itens` (`item_id`, `titulo`, `texto`, `icone`, `cor`, `datacad`, `datamod`) VALUES
(1, 'Economia', 'Até 95% de Economia na sua conta de energia', 'usd', NULL, '2021-04-23 06:04:49', '2021-04-23 06:04:49'),
(2, 'Durabilidade', 'Até 25 anos de vida útil', 'refresh', NULL, '2021-04-23 06:04:27', '2021-04-23 06:04:27'),
(3, 'Retorno Financeiro', 'Payback entre 3 a 5 anos', 'undo', NULL, '2021-04-23 06:04:48', '2021-04-23 06:04:48'),
(4, 'Valorização', 'Valorização do seu imóvel de 8 a 11% ao ano', 'line-chart', NULL, '2021-04-23 06:04:14', '2021-04-23 06:04:14'),
(5, 'Sustentável', 'Sem impacto ambiental, renovável e ecologicamente correto', 'leaf', NULL, '2021-04-23 06:04:38', '2021-04-23 06:04:38'),
(6, 'Baixa Manutenção', 'Pouco desgaste mecânico', 'level-down', NULL, '2021-04-23 06:04:02', '2021-04-23 06:04:02'),
(7, 'Sistema Silencioso', 'Geração de energia 100% silenciosa', 'bell-slash-o', NULL, '2021-04-23 06:04:25', '2021-04-23 06:04:25'),
(8, 'Investimento Inteligente', 'Energia mais barata do mundo, além de gratuita, limpa, inesgotável, sustentável e renovável', 'bar-chart', NULL, '2021-04-23 06:04:03', '2021-04-23 06:04:03');

-- --------------------------------------------------------

--
-- Estrutura para tabela `marcas`
--

CREATE TABLE `marcas` (
  `marca_id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `texto` varchar(50) NOT NULL,
  `userPic` varchar(60) NOT NULL,
  `datacad` timestamp NOT NULL DEFAULT current_timestamp(),
  `datamod` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela das marcas que a Bluesun trabalha';

--
-- Despejando dados para a tabela `marcas`
--

INSERT INTO `marcas` (`marca_id`, `titulo`, `texto`, `userPic`, `datacad`, `datamod`) VALUES
(1, 'Ulica Solar', '', '162475.png', '2021-04-23 06:04:42', '2021-04-23 06:04:42'),
(2, 'Canadian', '', '816320.png', '2021-04-23 06:04:01', '2021-04-23 06:04:01'),
(3, 'Pro Auto', '', '34363.png', '2021-04-23 18:35:31', '2021-04-23 06:04:24'),
(4, 'BYD', '', '165736.png', '2021-04-23 06:04:35', '2021-04-23 06:04:35'),
(5, 'Fotofix', '', '349026.png', '2021-04-23 06:04:51', '2021-04-23 06:04:51'),
(6, 'Fronius', '', '926593.png', '2021-04-23 18:36:18', '2021-04-23 06:04:14'),
(7, 'SAJ', '', '700460.png', '2021-04-23 06:04:20', '2021-04-23 06:04:20');

-- --------------------------------------------------------

--
-- Estrutura para tabela `niveis_acessos`
--

CREATE TABLE `niveis_acessos` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `ordem` int(1) NOT NULL,
  `datacad` timestamp NOT NULL DEFAULT current_timestamp(),
  `datamod` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela que verifica o nível de acesso do usuário';

--
-- Despejando dados para a tabela `niveis_acessos`
--

INSERT INTO `niveis_acessos` (`id`, `nome`, `ordem`, `datacad`, `datamod`) VALUES
(1, 'Administrador', 1, '2019-04-06 21:44:55', NULL),
(2, 'Franquiado', 2, '2019-04-06 21:44:55', NULL),
(3, 'Integrador', 3, '2019-04-18 21:22:19', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `obras_imagens`
--

CREATE TABLE `obras_imagens` (
  `image_id` int(11) NOT NULL,
  `image_path` varchar(200) CHARACTER SET latin1 NOT NULL,
  `id_image_user` int(11) DEFAULT NULL,
  `titulo` varchar(50) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Galeria de imagens de obras da empresa franqueada';

--
-- Despejando dados para a tabela `obras_imagens`
--

INSERT INTO `obras_imagens` (`image_id`, `image_path`, `id_image_user`, `titulo`, `date`) VALUES
(1, '../public/franquia/1.jpg', 3, 'Obras da empresa', '2021-04-23 18:19:45'),
(2, '../public/franquia/2.jpg', 3, 'Obras da empresa', '2021-04-23 18:19:45'),
(3, '../public/franquia/3.jpg', 3, 'Obras da empresa', '2021-04-23 18:19:45'),
(4, '../public/franquia/4.jpg', 3, 'Obras da empresa', '2021-04-23 18:19:45'),
(5, '../public/franquia/5.jpg', 3, 'Obras da empresa', '2021-04-23 18:19:45'),
(6, '../public/franquia/6.jpg', 3, 'Obras da empresa', '2021-04-23 18:19:45'),
(7, '../public/franquia/7.jpg', 3, 'Obras da empresa', '2021-04-23 18:19:45'),
(8, '../public/franquia/8.jpg', 3, 'Obras da empresa', '2021-04-23 18:19:45'),
(9, '../public/franquia/1.jpg', 4, 'Fotos do Integrador', '2021-04-23 18:57:28'),
(10, '../public/franquia/2.jpg', 4, 'Fotos do Integrador', '2021-04-23 18:57:28'),
(11, '../public/franquia/3.jpg', 4, 'Fotos do Integrador', '2021-04-23 18:57:28'),
(12, '../public/franquia/4.jpg', 4, 'Fotos do Integrador', '2021-04-23 18:57:28'),
(13, '../public/franquia/5.jpg', 4, 'Fotos do Integrador', '2021-04-23 18:57:28'),
(14, '../public/franquia/6.jpg', 4, 'Fotos do Integrador', '2021-04-23 18:57:28'),
(15, '../public/franquia/8.jpg', 4, 'Fotos do Integrador', '2021-04-23 18:57:28'),
(16, '../public/franquia/7.jpg', 4, 'Fotos do Integrador', '2021-04-23 18:57:29');

-- --------------------------------------------------------

--
-- Estrutura para tabela `situacoes_usuarios`
--

CREATE TABLE `situacoes_usuarios` (
  `id` int(11) NOT NULL,
  `cod` int(11) DEFAULT NULL,
  `nome_situacao` varchar(50) NOT NULL,
  `cor_situacao` varchar(20) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela que verifica se o usuário está ou não ativo no sistema';

--
-- Despejando dados para a tabela `situacoes_usuarios`
--

INSERT INTO `situacoes_usuarios` (`id`, `cod`, `nome_situacao`, `cor_situacao`, `created`, `modified`) VALUES
(1, 1, 'Ativo', 'success', '2017-04-21 00:00:00', NULL),
(2, 0, 'Inativo', 'danger', '2017-05-24 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `slides`
--

CREATE TABLE `slides` (
  `imasl_id` int(11) NOT NULL,
  `image_path` varchar(200) CHARACTER SET latin1 NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Slides de fotos do site' ROW_FORMAT=DYNAMIC;

--
-- Despejando dados para a tabela `slides`
--

INSERT INTO `slides` (`imasl_id`, `image_path`, `date`) VALUES
(1, '../public/slides/1.png', '2021-04-23 18:47:48'),
(2, '../public/slides/3.png', '2021-04-23 18:47:49'),
(3, '../public/slides/2.png', '2021-04-23 18:47:49'),
(4, '../public/slides/4.png', '2021-04-23 18:47:49'),
(5, '../public/slides/5.png', '2021-04-23 18:47:49');

-- --------------------------------------------------------

--
-- Estrutura para tabela `slide_texto`
--

CREATE TABLE `slide_texto` (
  `slide_texto_id` int(11) NOT NULL,
  `texto` tinytext DEFAULT NULL,
  `btn_texto` varchar(50) DEFAULT NULL,
  `btn_url` varchar(254) DEFAULT NULL,
  `datacad` timestamp NOT NULL DEFAULT current_timestamp(),
  `datamod` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Despejando dados para a tabela `slide_texto`
--

INSERT INTO `slide_texto` (`slide_texto_id`, `texto`, `btn_texto`, `btn_url`, `datacad`, `datamod`) VALUES
(1, '<h2><span style=\"color:#424242\">Economize at&eacute;&nbsp;</span><span style=\"color:#ff5f00\">95%</span><br />\r\n<span style=\"color:#424242\">na sua conta de energia!</span></h2>\r\n', 'Nossas Obras', '#portfolio', '2021-04-16 19:08:21', '2021-04-23 06:04:13');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sobreblue`
--

CREATE TABLE `sobreblue` (
  `sobreb_id` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `texto` longtext DEFAULT NULL,
  `url_video` varchar(45) NOT NULL,
  `userPic` varchar(60) NOT NULL,
  `datacad` timestamp NOT NULL DEFAULT current_timestamp(),
  `datamod` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela sobre a Bluesun e sua logomarca';

--
-- Despejando dados para a tabela `sobreblue`
--

INSERT INTO `sobreblue` (`sobreb_id`, `titulo`, `texto`, `url_video`, `userPic`, `datacad`, `datamod`) VALUES
(1, 'CONHEÇA A BLUESUN', '<p>A Bluesun Solar do Brasil &eacute; uma das maiores Importadoras e Distribuidoras de Equipamentos Fotovoltaicos do Brasil, expedindo mais de 1000 kits por m&ecirc;s.</p>\r\n\r\n<p>Al&eacute;m da Distribui&ccedil;&atilde;o de Equipamentos, seu escopo de fornecimento &eacute; composto pela Bluesun Solar Franquias, com Franqueados em todas as regi&otilde;es do Brasil, al&eacute;m de mais de 20 mil Integradores e Revendedores cadastrados em sua Plataforma de Or&ccedil;amentos.</p>\r\n\r\n<p>Possuem tamb&eacute;m a Bluesun Treinamentos, uma divis&atilde;o da Bluesun dedicada a treinar e aperfei&ccedil;oar os conhecimentos t&eacute;cnicos dos seus Franqueados, Revendedores e Integradores.</p>\r\n\r\n<p>Os diferenciais da Bluesun s&atilde;o a qualidade dos equipamentos que comercializam&nbsp;aliados a pre&ccedil;os competitivos, dado os grandes contratos com fornecedores internacionais e nacionais.</p>\r\n', 'https://www.youtube.com/embed/O0ZZZlAjTEU', '441052.png', '2021-04-23 04:04:36', '2021-04-27 11:04:07'),
(2, 'CONHEÇA A BLUESUN', '<p>A Bluesun Solar do Brasil &eacute; uma das maiores Importadoras e Distribuidoras de Equipamentos Fotovoltaicos do Brasil, expedindo mais de 1000 kits por m&ecirc;s.</p>\r\n\r\n<p>Al&eacute;m da Distribui&ccedil;&atilde;o de Equipamentos, seu escopo de fornecimento &eacute; composto pela Bluesun Solar Franquias, com Franqueados em todas as regi&otilde;es do Brasil, al&eacute;m de mais de 20 mil Integradores e Revendedores cadastrados em sua Plataforma de Or&ccedil;amentos.</p>\r\n\r\n<p>Possuem tamb&eacute;m a Bluesun Treinamentos, uma divis&atilde;o da Bluesun dedicada a treinar e aperfei&ccedil;oar os conhecimentos t&eacute;cnicos dos seus Franqueados, Revendedores e Integradores.</p>\r\n\r\n<p>Os diferenciais da Bluesun s&atilde;o a qualidade dos equipamentos que comercializam&nbsp;aliados a pre&ccedil;os competitivos, dado os grandes contratos com fornecedores internacionais e nacionais.</p>\r\n', 'https://www.youtube.com/embed/O0ZZZlAjTEU', '791740.png', '2021-04-23 04:04:36', '2021-04-27 11:04:50');

-- --------------------------------------------------------

--
-- Estrutura para tabela `sobrefran`
--

CREATE TABLE `sobrefran` (
  `sobref_id` int(11) NOT NULL,
  `sobref_id_user` int(11) DEFAULT NULL,
  `titulo` varchar(45) NOT NULL,
  `texto` longtext DEFAULT NULL,
  `userPic` varchar(60) DEFAULT NULL,
  `datacad` timestamp NOT NULL DEFAULT current_timestamp(),
  `datamod` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela sobre a empresa franqueada e sua logo';

--
-- Despejando dados para a tabela `sobrefran`
--

INSERT INTO `sobrefran` (`sobref_id`, `sobref_id_user`, `titulo`, `texto`, `userPic`, `datacad`, `datamod`) VALUES
(1, 3, 'Sobre a Franquia', '<p>Somos uma empresa que presta servi&ccedil;os de revenda da Bluesun Solar do Brasil j&aacute; h&aacute; 5 anos e estamos consolidados no mercado em que atuamos, somos conhecidos na regi&atilde;o de Limeira e exportamos para todo o territ&oacute;rio nacional pain&eacute;is solares, inversores e stringbox, enfim, pode contar sempre conosco.</p>\r\n', '344815.png', '2021-04-23 05:04:07', '2021-04-23 07:04:53'),
(2, 4, 'Sobre a Empresa', '<p>Somos uma empresa que presta servi&ccedil;os de revenda da Bluesun Solar do Brasil j&aacute; h&aacute; 5 anos e estamos consolidados no mercado em que atuamos, somos conhecidos na regi&atilde;o de Limeira e exportamos para todo o territ&oacute;rio nacional pain&eacute;is solares, inversores e stringbox, enfim, pode contar sempre conosco.</p>', '910446.png', '2021-04-23 06:04:58', '2021-04-23 06:04:58');

-- --------------------------------------------------------

--
-- Estrutura para tabela `social`
--

CREATE TABLE `social` (
  `social_id` int(11) NOT NULL,
  `social_id_user` int(11) DEFAULT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `icone` varchar(50) DEFAULT NULL,
  `url` varchar(254) DEFAULT NULL,
  `datacad` timestamp NOT NULL DEFAULT current_timestamp(),
  `datamod` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `social`
--

INSERT INTO `social` (`social_id`, `social_id_user`, `nome`, `icone`, `url`, `datacad`, `datamod`) VALUES
(1, 3, 'Facebook', 'facebook', '#', '2021-04-23 05:04:12', '2021-04-23 05:04:12'),
(2, 3, 'Twitter', 'twitter', '#', '2021-04-23 05:04:34', '2021-04-23 05:04:50'),
(3, 3, 'Instagram', 'instagram', '#', '2021-04-23 05:04:55', '2021-04-23 05:04:55'),
(4, 3, 'Linkedin', 'linkedin', '#', '2021-04-23 05:04:07', '2021-04-23 05:04:07'),
(5, 4, 'Facebook', 'facebook', '#', '2021-04-23 06:04:48', '2021-04-23 06:04:48'),
(6, 4, 'Instagram', 'instagram', '#', '2021-04-23 06:04:00', '2021-04-23 06:04:00'),
(7, 4, 'Linkedin', 'linkedin', '#', '2021-04-23 06:04:11', '2021-04-23 06:04:11'),
(8, 4, 'Twitter', 'twitter', '#', '2021-04-23 06:04:23', '2021-04-23 06:04:23');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `recuperar_senha` varchar(45) DEFAULT NULL,
  `chave_descadastro` varchar(45) DEFAULT NULL,
  `id_nivacesso` int(11) DEFAULT NULL,
  `id_situacoes` int(11) DEFAULT NULL,
  `userPic` varchar(100) DEFAULT NULL,
  `datacad` timestamp NOT NULL DEFAULT current_timestamp(),
  `datamod` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `recuperar_senha`, `chave_descadastro`, `id_nivacesso`, `id_situacoes`, `userPic`, `datacad`, `datamod`) VALUES
(1, 'Claudemir da Silva Lopes', 'claumirlopes@gmail.com', 'ace51cece9b49cb60d910b9f231cc88f', NULL, NULL, 1, 1, '15804.jpg', '2021-04-14 12:56:59', '2021-04-14 12:04:45'),
(2, 'Daiane', 'daiane@admin.com', 'e4a6abe148889382f90ccfdbba315721', NULL, NULL, 1, 1, '899244.jpg', '2021-04-22 15:13:23', '2021-04-22 15:04:13'),
(3, 'Franquiado', 'admin@franquia.com', 'd551a2e26cd7c6da4731acc259251443', NULL, NULL, 2, 1, '613126.png', '2021-05-25 11:53:30', '2021-05-25 11:05:20'),
(4, 'Integrador', 'admin@integrador.com', '03fc54b25b544f1d1a2cfbeeb4d037f2', NULL, NULL, 3, 1, '189744.png', '2021-04-14 11:41:08', '2021-04-14 11:04:54'),
(6, 'A N dos Santos Promoção de Vendas ', 'adrianonunes@bluesundobrasil.com.br', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 2, 1, '141143.png', '2021-04-22 13:02:22', '2021-04-22 13:04:17'),
(7, 'Adriano R. dos Reis ', 'milsolar@bluesundobrasil.com.br', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 2, 1, '685120.png', '2021-04-22 13:02:30', '2021-04-22 13:04:26'),
(8, 'Agro Sol LTDA', 'agrosol@bluesundobrasil.com.br', 'd41d8cd98f00b204e9800998ecf8427e', NULL, NULL, 2, 1, '231087.png', '2021-04-22 13:02:36', '2021-04-22 13:04:33'),
(9, 'Agrosun Solar LTDA', 'agrosun@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '786758.png', '2021-04-22 13:04:26', NULL),
(10, 'Alba Cavalcante Albuquerque Soares', 'prolseg@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '289334.png', '2021-04-22 13:04:12', NULL),
(11, 'Alex Gondim Paiva ', 'alesol.udi@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '435984.png', '2021-04-22 13:04:58', NULL),
(12, 'Alexandre da Silva Assunção ', 'liberdadesolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '132471.png', '2021-04-22 13:04:07', NULL),
(13, 'Alexandre Magri', 'alexandremagri@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '442827.png', '2021-04-22 13:04:41', NULL),
(14, 'Ana Carla Fontes de Faria ', 'anafaria@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '511257.png', '2021-04-22 13:04:11', NULL),
(15, 'Anderson Gervasoni Garcia', 'andersongervasoni@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '221636.png', '2021-04-22 13:04:55', NULL),
(16, 'André Bruno da Silva ', 'andre@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '896455.png', '2021-04-22 13:04:15', NULL),
(17, 'André Luiz de Paula', 'megasol@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '94535.png', '2021-04-22 13:04:44', NULL),
(18, 'Angelo Aparecido Carvalhatti', 'kvaelectric@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '916093.png', '2021-04-22 13:04:14', NULL),
(19, 'Antoniel Santos Ribeiro', 'antonielribeiro@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '895399.png', '2021-04-22 13:04:48', NULL),
(20, 'Antonio Cassio de Oliveira Santos ', 'antoniosantos@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '187260.png', '2021-04-22 13:04:23', NULL),
(21, 'Arcel Empreendimentos Ltda ', 'arcel@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '322661.png', '2021-04-22 13:04:11', NULL),
(22, 'ARV Automação e Sistemas de Segurança LTDA', 'arcenenergiasolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '747070.png', '2021-04-22 13:04:22', NULL),
(23, 'Bom Clima Instalações Elétricas', 'bomclima@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '627794.png', '2021-04-22 13:04:52', NULL),
(24, 'Brasilina de Oliveira Braz ', 'hwssolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '515305.png', '2021-04-22 13:04:27', NULL),
(25, 'Brasilink Serviços EIRELI', 'thiagoaquino@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '680987.png', '2021-04-22 13:04:57', NULL),
(26, 'Bruno Aderbal Santos de Oliveira   ', 'brunooliveira@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '433961.png', '2021-04-22 13:04:36', NULL),
(27, 'C K Kuno Consultoria e Engenharia de Telecomunicações ', 'cloviskuno@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '540513.png', '2021-04-22 13:19:31', '2021-04-22 13:04:18'),
(28, 'C. S. C. Dos Santos Instalação Eletrica LTDA', 'caiosaturnino@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '834675.png', '2021-04-22 13:04:40', NULL),
(29, 'C. S. F Serviços Elétricos LTDA', 'energytec@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '737366.png', '2021-04-22 13:04:23', NULL),
(30, 'C.R.D. Pena Construção e Climatização ME', 'clovisduailibi@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '770269.png', '2021-04-22 13:04:51', NULL),
(31, 'Caio Felipe Lobato Ribeiro ', 'solebioenergia@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '19730.png', '2021-04-22 13:04:18', NULL),
(32, 'Carvalho Construtora ', 'ecosol@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '883197.png', '2021-04-22 13:04:03', NULL),
(33, 'César Aguiar Dias de Souza', 'cesarsouza@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '290808.png', '2021-04-22 13:04:35', NULL),
(34, 'Cesar Leal Rinque Kumaki', 'cesarleal@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '458311.png', '2021-04-22 13:04:02', NULL),
(35, 'Christopher Andrio da Silva ', 'christopher@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '33514.png', '2021-04-22 13:04:30', NULL),
(36, 'Claudio Cabral Vilela - EPP', 'claudiovilela@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '422995.png', '2021-04-22 13:04:18', NULL),
(37, 'Claudio de Souza Crespo ', 'claudiocrespo@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '781153.png', '2021-04-22 13:04:56', NULL),
(38, 'Cleane Lopes Castro ME ', 'cleanelopes@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '122074.png', '2021-04-22 13:04:27', NULL),
(39, 'Clovis do Nascimento Junior', 'jbioesolutions@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '869489.png', '2021-04-22 13:04:58', NULL),
(40, 'Cristiany de Oliveira ', 'unidadeijui@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '52735.png', '2021-04-22 13:04:27', NULL),
(41, 'D M B de Souza Leal ', 'dmbsolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '63389.png', '2021-04-22 13:04:02', NULL),
(42, 'Daniel Maia Angeli - ME', 'danielangeli@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '181928.png', '2021-04-22 13:04:22', NULL),
(43, 'Daniele Azevedo Monteiro de Melo', 'danielemonteiro@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '933346.png', '2021-04-22 13:04:06', NULL),
(44, 'Darlan Trindade Cidade', 'trindade@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '747280.png', '2021-04-22 13:04:31', NULL),
(45, 'Diego Milcio Gonçalves de Sousa', 'diegomilcio@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '974056.png', '2021-04-22 13:04:32', NULL),
(46, 'Diego Santos de Oliveira ', 'losolenergia@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '268956.png', '2021-04-22 13:04:59', NULL),
(47, 'Edivaldo Nunes Cordeiro Filho', 'spgenergia@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '649086.png', '2021-04-22 13:04:32', NULL),
(48, 'Elias Freiria Pereira ', 'eliaspereira@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '911907.png', '2021-04-22 13:04:01', NULL),
(49, 'Elinton Ferreira Ribas', 'elinton@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '717145.png', '2021-04-22 13:04:25', NULL),
(50, 'Elkerjaer Luiz de Moura Galindo', 'egempreendimentos@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '754218.png', '2021-04-22 13:04:04', NULL),
(51, 'Eva Soares de Oliveira ', 'somarr@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '285703.png', '2021-04-22 13:04:33', NULL),
(52, 'Evaldo Damo', 'evaldodamo@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '471719.png', '2021-04-22 13:04:59', NULL),
(53, 'F & M Indústria Comércio E Serviços LTDA', 'solucaoglass@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '804996.png', '2021-04-22 13:04:28', NULL),
(54, 'F R C Noronha - Sol & Energia EIRELI', 'fredericonoronha@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '425719.png', '2021-04-22 13:04:02', NULL),
(55, 'Fabiano Marcelo Diaz de La Cuadra', 'itaicyiluminacao@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '752079.png', '2021-04-22 13:04:27', NULL),
(56, 'Fabio Bonilha Soares ', 'fabiosoares@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '561813.png', '2021-04-22 13:04:59', NULL),
(57, 'Felício Sato', 'feliciosato@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '591391.png', '2021-04-22 13:04:29', NULL),
(58, 'Fernando Teixeira Cardoso Alves', 'fernandocardoso@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '423346.png', '2021-04-22 13:04:01', NULL),
(59, 'Fibra - Seg - Segurança, Redes Logicas, Apoio Administrativo e Comercio Ltda - Me   ', 'fibraseg@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '914264.png', '2021-04-22 13:04:53', NULL),
(60, 'Flávio de Oliveira Leal', 'flavioleal@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '663122.png', '2021-04-22 13:04:26', NULL),
(61, 'Florisvaldo Alves Vidal - ME', 'florisvaldovidal@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '18813.png', '2021-04-22 13:04:04', NULL),
(62, 'GD Geração de Energia', 'gdenergia@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '519320.png', '2021-04-22 13:04:38', NULL),
(63, 'Gerson Vieira Lessa', 'gersonlessa@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '840432.png', '2021-04-22 13:04:09', NULL),
(64, 'Gilmar Martins dos Santos ', 'gmssolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '493450.png', '2021-04-22 13:04:23', NULL),
(65, 'Gilmara da Rocha Luz Leite ', 'oesteenergiasolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '229607.png', '2021-04-22 13:04:58', NULL),
(66, 'Giovani Dalzoto Solar', 'giovanidalzoto@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '781774.png', '2021-04-22 14:04:52', NULL),
(67, 'Giselle Gomes Santos Gomes Távora ', 'giselletavora@bluesundobrasil.com.bra', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '772829.png', '2021-04-22 14:04:29', NULL),
(68, 'Globo Energia Comercio Atacadista de Equipamento Para Energia Eletrica Eireli', 'globoenergia@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '130113.png', '2021-04-22 14:04:07', NULL),
(69, 'Green Mode Engenharia Sustentável LTDA', 'greenmode@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '808338.png', '2021-04-22 14:04:44', NULL),
(70, 'Guilherme Araujo Vasconcelos ', 'solarfactory@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '817158.png', '2021-04-22 14:04:35', NULL),
(71, 'Guilherme Dos Santos Mariano', 'guilhermemariano@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '37602.png', '2021-04-22 14:04:52', NULL),
(72, 'Hamilton Souza Gouveia ', 'hamiltongouveia@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '277329.png', '2021-04-22 14:04:54', NULL),
(73, 'Hemeson Soares Pinheiro', 'hemersonpinheiro@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '375555.png', '2021-04-22 14:04:30', NULL),
(74, 'Henrique De Araujo Souza', 'hassolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '550708.png', '2021-04-22 14:04:56', NULL),
(75, 'HGL Sistemas Fotovoltaicos Ltda ', 'hgl@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '617221.png', '2021-04-22 14:04:32', NULL),
(76, 'Hugo Braga Santana', 'o2br@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '36553.png', '2021-04-22 14:04:58', NULL),
(77, 'Hugo Nascimento ', 'hugonascimento@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '251371.png', '2021-04-22 14:04:55', NULL),
(78, 'Hyago Marçal Freitas ', 'freitas@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '79879.png', '2021-04-22 14:04:23', NULL),
(79, 'Igor Henrique Barbosa Trigueiro ', 'paraibasolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '412449.png', '2021-04-22 14:04:47', NULL),
(80, 'Ilumimax Energia Solar Ltda', 'ilumimax@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '849685.png', '2021-04-22 14:04:50', NULL),
(81, 'Imperplan Ipermebialização e Engenharia LTDA', 'imperplan@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '891338.png', '2021-04-22 14:04:39', NULL),
(82, 'Isadora de Freitas Dyna ', 'alumisa@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '126206.png', '2021-04-22 14:04:21', NULL),
(83, 'Ítalo Augusto Nunes da Silva', 'delthasolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '808061.png', '2021-04-22 14:04:47', NULL),
(84, 'J&J .Energia Solar LTDA', 'jejenergiasolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '473691.png', '2021-04-22 14:04:17', NULL),
(85, 'J. P. Faria Engenharia & Empreendimentos Ltda', 'jpfaria@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '66367.png', '2021-04-22 14:04:43', NULL),
(86, 'Jairo Dias de Oliveira Junior ', 'jairodias@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '585032.png', '2021-04-22 14:04:12', NULL),
(87, 'Jardenice Candida Machado', 'solarpernambuco@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '111383.png', '2021-04-22 14:04:44', NULL),
(88, 'Joaquim José dias Neto', 'joaquimdias@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '697814.png', '2021-04-22 14:04:12', NULL),
(89, 'Joel José Santos', 'sunlumen@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '691595.png', '2021-04-22 14:04:41', NULL),
(90, 'José Aparecido Gouveia da Silva ', 'josegouveia@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '815126.png', '2021-04-22 14:04:21', NULL),
(91, 'Jose Cosme Oliveira ', 'joseoliveira@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '554074.png', '2021-04-22 14:04:17', NULL),
(92, 'José Nilton Rodrigues de Souza ', 'jnengenheira@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '241496.png', '2021-04-22 14:04:48', NULL),
(93, 'Jose Ricardo de Camargo Vaz Dourado', 'greensolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '65305.png', '2021-04-22 14:04:09', NULL),
(94, 'Josias do Nascimento Viana ', 'josiasviana@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '705040.png', '2021-04-22 14:04:10', NULL),
(95, 'Josiel de Melo Rodrigues ', 'quatroirmaossun@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '187573.png', '2021-04-22 14:04:45', NULL),
(96, 'Juliana Tietbohl da Silva', 'tecsunsolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '446326.png', '2021-04-22 14:04:16', NULL),
(97, 'Kleos Johnny Cardoso Teles ', 'kleosteles@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '294740.png', '2021-04-22 14:04:54', NULL),
(98, 'Klivily Kleber da Silva Cunha ', 'klivilycunha@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '158477.png', '2021-04-22 14:04:19', NULL),
(99, 'L. F. P. Chiaparini - ME', 'jairchiaparini@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '89501.png', '2021-04-22 14:04:52', NULL),
(100, 'Laerte Edson Braga', 'laertebraga@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '254724.png', '2021-04-22 14:04:23', NULL),
(101, 'Lans Serviços de Estética Automotiva Ltda ', 'lansenergia@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '885377.png', '2021-04-22 14:04:53', NULL),
(102, 'Leste Solar LTDA', 'lestesolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '30011.png', '2021-04-22 14:04:47', NULL),
(103, 'Liberty Energia Solar Instalações Elétricas LTDA', 'liberty@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '787993.png', '2021-04-22 14:04:22', NULL),
(104, 'Lorena da Silva Correa Lima', 'lorenalima@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '428089.png', '2021-04-22 14:04:46', NULL),
(105, 'Luciano Lima Rhenns', 'lucianorhenns@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '95364.png', '2021-04-22 14:04:07', NULL),
(106, 'Ludmila Latorre Reina ', 'reinasolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '21613.png', '2021-04-22 14:04:39', NULL),
(107, 'Luiz Guilherme Silva Frangilo ', 'guilhermefrangilo@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '646300.png', '2021-04-22 14:04:59', NULL),
(108, 'Lumiere Energia Solar LTDA', 'lumieresolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '606027.png', '2021-04-22 14:04:30', NULL),
(109, 'Luzia Ozorio Gonçalves ', 'luziaozorio@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '910817.png', '2021-04-22 14:04:59', NULL),
(110, 'M.R. de Carvalho Energia Solar ', 'mrenergiasolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '227066.png', '2021-04-22 14:04:57', NULL),
(111, 'Maicon Deibert Marques Ribeiro ', 'jdmrsolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '39709.png', '2021-04-22 14:04:39', NULL),
(112, 'Maicon Lima dos Santos ', 'amvsolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '595185.png', '2021-04-22 14:04:10', NULL),
(113, 'Mais Energia Solar', 'maisenergia@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '698897.png', '2021-04-22 14:04:31', NULL),
(114, 'Manoel Cordeiro da Silva Comercio ', 'mmenergia@bluesundobrasi.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '298506.png', '2021-04-22 14:04:54', NULL),
(115, 'Marcelo Cruz Rodrigues', 'marcelorodrigues@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '74405.png', '2021-04-22 14:04:53', NULL),
(116, 'Marcelo Luiz de Carvalho', 'marcelocarvalho@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '205329.png', '2021-04-22 14:04:23', NULL),
(117, 'Marcelo Luz da Silva ME', 'marcelosilva@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '958373.png', '2021-04-22 14:04:46', NULL),
(118, 'Marcos Antonio Maciel Junior ', 'mmsolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '209122.png', '2021-04-22 15:04:32', NULL),
(119, 'Marcos José Miam ', 'abcdosol@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '235464.png', '2021-04-22 15:04:59', NULL),
(120, 'Maria Marcina Rojas', 'ojeda@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '108559.png', '2021-04-22 15:04:24', NULL),
(121, 'Martins Meneses Sistema de Irrigação Ltda ', 'luizmeneses@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '96190.png', '2021-04-22 15:04:49', NULL),
(122, 'Master Telecom Ltda ', 'master@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '109385.png', '2021-04-22 15:04:17', NULL),
(123, 'Mayra Bruna de Farias Santos', 'mayrasantos@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '782433.png', '2021-04-22 15:04:43', NULL),
(124, 'Mega Eco Economia Inteligente e Eficiente ', 'lorivalsilvaneto@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '431524.png', '2021-04-22 15:04:08', NULL),
(125, 'MEL - Consultoria de Negocios, Engenharia e Arquitetura ', 'paulopinho@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '622969.png', '2021-04-22 15:04:33', NULL),
(126, 'Micheline Araujo Cruz', 'contato.feiradesantana@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '716590.png', '2021-04-22 15:04:10', NULL),
(127, 'Minas Agrosolar Ltda', 'minasagrosolar@bluesolarbrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '670002.png', '2021-04-22 15:04:40', NULL),
(128, 'Mister Solutions Sales Corporation LTDA ', 'felipesantos@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '930890.png', '2021-04-22 15:04:06', NULL),
(129, 'Natu Energia Solar LTDA', 'natuenergia@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '425743.png', '2021-04-22 15:04:31', NULL),
(130, 'Nítidus Comercio e Serviços de Limpeza EIRELI', 'nitidus@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '191693.png', '2021-04-22 15:04:59', NULL),
(131, 'NR Energia Solar Brasil', 'nrenergiasolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '630629.png', '2021-04-22 15:04:32', NULL),
(132, 'Oazi Engenharia e Informática LTDA', 'oazi@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '298878.png', '2021-04-22 15:04:00', NULL),
(133, 'Ontech Serviços Tecnicos  de Eletricidade Ltda', 'ontech@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '851050.png', '2021-04-22 15:04:29', NULL),
(134, 'Osmar marcelino da Silva', 'osmarsilva@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '419518.png', '2021-04-22 15:04:59', NULL),
(135, 'P.S Corretora de Seguro Eireli', 'pscorrea@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '371765.png', '2021-04-22 15:04:27', NULL),
(136, 'Pablo Sanches de Andrade', 'pablosanches@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '38301.png', '2021-04-22 15:04:56', NULL),
(137, 'Pamela Araujo Basso ', 'pamelabasso@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '375502.png', '2021-04-22 15:04:25', NULL),
(138, 'Pamella Cristina Teodoro ', 'josimarviana@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '803100.png', '2021-04-22 15:04:37', NULL),
(139, 'Patrícia Albefaro Sandonato', 'universosolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '329789.png', '2021-04-22 15:04:32', NULL),
(140, 'Patrícia Flores Fernandes Serviços e Comércio Elétricos', 'grandsolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '775255.png', '2021-04-22 15:04:22', NULL),
(141, 'Paulo Alves Junior', 'alves.eng@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '571535.png', '2021-04-22 15:04:49', NULL),
(142, 'Petra Engenharia e Construção', 'petraengenharia@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '995685.png', '2021-04-22 15:04:13', NULL),
(143, 'Photon’s Energia Fotovoltaico ', 'herbert.petri@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '400658.png', '2021-04-22 15:04:37', NULL),
(144, 'Pinho e Strasser Ltda', 'vitalsolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '969389.png', '2021-04-22 15:04:09', NULL),
(145, 'Produtiva Agrícola Comércio, Industria e Serviços Eireli', 'produtiva@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '476062.png', '2021-04-22 15:04:30', NULL),
(146, 'Pronorte Projetos Inteligentes Ltda ', 'pronorte@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '445578.png', '2021-04-22 15:04:56', NULL),
(147, 'R G S Comercial EIRELI ', 'raimundosouza@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '224767.png', '2021-04-22 15:04:23', NULL),
(148, 'R Leão da Silva - ME', 'romulosilva@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '840985.png', '2021-04-22 15:04:52', NULL),
(149, 'R S Carnieto Revestimento LTDA', 'rscarnieto@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '703053.png', '2021-04-22 15:04:19', NULL),
(150, 'Ramilos  Construções EIRELI', 'ramilos@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '178908.png', '2021-04-22 15:04:57', NULL),
(151, 'Reginaldo Gomes Martins ', 'reginaldomartins@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '171696.png', '2021-04-22 15:04:22', NULL),
(152, 'Renato Almeida Ribeiro', 'renatoribeiro@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '336801.png', '2021-04-22 15:04:46', NULL),
(153, 'Renato dos Santos ', 'renatosantos@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '238640.png', '2021-04-22 15:04:12', NULL),
(154, 'Roger Wellington Luiz ', 'rogerluiz@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '651789.png', '2021-04-22 15:04:39', NULL),
(155, 'Ronni Cristiano Carlos ', 'ronnicarlos@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '554492.png', '2021-04-22 15:04:04', NULL),
(156, 'Rony Fernando de Lima', 'ronyazl@bluesunsobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '36694.png', '2021-04-22 15:04:28', NULL),
(157, 'Roraima Comunicações LTDA - ME', 'rrsolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '208814.png', '2021-04-22 15:04:01', NULL),
(158, 'Rosangela Cristina dos Santos Barros ', 'prosegsolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '886175.png', '2021-04-22 15:04:21', NULL),
(159, 'Ruan Dias Tavares', 'ruantavares@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '931978.png', '2021-04-22 04:04:03', NULL),
(160, 'Saionara Muniz Ribeiro ', 'smenergy@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '145486.png', '2021-04-22 04:04:45', NULL),
(161, 'Samara Guimarães Welter', 'samarawelter@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '994427.png', '2021-04-22 04:04:10', NULL),
(162, 'San Vidal Cómercio e Serviços de Materiais Eletricos Ltda ', 'intaltec@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '493831.png', '2021-04-22 04:04:00', NULL),
(163, 'Sergio Antônio Angel Perines', 'sergioperines@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '346085.png', '2021-04-22 04:04:23', NULL),
(164, 'Sergio Eduardo Ferreira Lira  ', 'sergiolira@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '266712.png', '2021-04-22 04:04:47', NULL),
(165, 'Sergio Murilo Nery ', 'sergionery@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '684342.png', '2021-04-22 04:04:14', NULL),
(166, 'Sidnei Lopes de Oliveira ', 'sidneioliveira@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '808609.png', '2021-04-22 04:04:08', NULL),
(167, 'Sidney Jaime Zanetti', 'sidneyjzanetti@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '919746.png', '2021-04-22 04:04:37', NULL),
(168, 'Silas Felix de Souza ', 'silassouza@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '585634.png', '2021-04-22 04:04:02', NULL),
(169, 'Sol do Norte Instalção E Manutenção de Energia Solar Ltda', 'alvanomutz@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '986556.png', '2021-04-22 04:04:28', NULL),
(170, 'Spirity Engenharia Ltda ', 'silvioseroa@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '459067.png', '2021-04-22 04:04:58', NULL),
(171, 'Sunow Negocios e Energia Ltda', 'sunow@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '655159.png', '2021-04-22 04:04:25', NULL),
(172, 'Suns Energy Comercio e Manutenção de Placas Solares  ', 'marceloferrero@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '620580.png', '2021-04-22 04:04:51', NULL),
(173, 'Super 4 Comer. Serviços Ltda ', 'josederly@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '483653.png', '2021-04-22 04:04:17', NULL),
(174, 'Takeo Fugiwara Santos ', 'takeosantos@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '762807.png', '2021-04-22 04:04:46', NULL),
(175, 'Tatiane Alves Fernandes', 'jtsolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '588307.png', '2021-04-22 04:04:45', NULL),
(176, 'Tec Geração de Energia Solar Eirelli', 'tecgeracao@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '378908.png', '2021-04-22 04:04:07', NULL),
(177, 'Tecno-Air Comércio e Engenharia LTDA', 'plfilho1@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '213604.png', '2021-04-22 04:04:31', NULL),
(178, 'Telcar - Audio System Eletronica LTDA', 'carlosaraujo@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '527694.png', '2021-04-22 04:04:14', NULL),
(179, 'Telemétrica Serviços - ME', 'telemetrica@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '518707.png', '2021-04-22 04:04:52', NULL),
(180, 'Terblin Energia Solar Serralheria e Vidraçaria LTDA', 'antoniosouza@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '157564.png', '2021-04-22 04:04:22', NULL),
(181, 'Thiago Vieira Gomes', 'thiagogomes@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '484808.png', '2021-04-22 04:04:48', NULL),
(182, 'Tijupah Engenharia Naval Ltda ', 'tijupah@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '178543.png', '2021-04-22 04:04:17', NULL),
(183, 'Trenaer Comércio e Serviço LTDA', 'trenaer@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '916325.png', '2021-04-22 04:04:46', NULL),
(184, 'V. H. Gomes Silva', 'solareasy@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '268117.png', '2021-04-22 04:04:16', NULL),
(185, 'Valéria Ribeiro Lima', 'valeria.lima@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '134613.png', '2021-04-22 04:04:44', NULL),
(186, 'VCL Locação de Maquinas e Consultoria Empresarial EIREli', 'vclsolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '530891.png', '2021-04-22 04:04:11', NULL),
(187, 'Voltech Instalação e Manutenção Predial Ltda', 'voltechsolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '830470.png', '2021-04-22 04:04:40', NULL),
(188, 'Wagner da Silva ', 'wagnerdasilva@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '100061.png', '2021-04-22 05:04:03', NULL),
(189, 'Wagner Souza Coelho ', 'wksolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '356615.png', '2021-04-22 05:04:29', NULL),
(190, 'Wellington das  Neves de Assis', 'wellingtonassis@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '428747.png', '2021-04-22 05:04:52', NULL),
(191, 'Wendel Barcelos Silva Eireli ', 'rennovsolar@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '231481.png', '2021-04-22 05:04:17', NULL),
(192, 'Werles Nogueira da Silva Souza ', 'mwd@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '384254.png', '2021-04-22 05:04:41', NULL),
(193, 'Willian Carlos da Silva ', 'williansilva@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '46817.png', '2021-04-22 05:04:08', NULL),
(194, 'Wilson Loham Figueiredo Reis ', 'lohamreis@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '182752.png', '2021-04-22 05:04:40', NULL),
(195, 'WP Silva Automação Industria E Comercio', 'wpautomacao@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '144051.png', '2021-04-22 05:04:04', NULL),
(196, 'XP Importação e Tecnologia em Energia Renováveis EIRELLI', 'xpenergia@bluesundobrasil.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 2, 1, '14275.png', '2021-04-22 05:04:32', NULL),
(197, 'Carlos Matheus', 'cmateus033@gmail.com', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 3, 1, '242798.png', '2021-04-23 12:04:47', NULL),
(198, 'Eduardo Schinaider ', 'eduardo@schinaider.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 3, 1, '92138.png', '2021-04-23 13:04:19', NULL),
(199, 'Martins', 'sunclearenergy@gmail.com', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 3, 1, '291656.png', '2021-04-23 13:04:12', NULL),
(200, 'Rodolfo Servato / Elber ', 'elberthiaggoo@gmail.com', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 3, 1, '512595.png', '2021-04-23 13:04:49', NULL),
(201, 'Expedito Wagner', 'wagner2879@hotmail.com', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 3, 1, '347705.png', '2021-04-23 13:04:29', NULL),
(202, 'Wanderson Donadia / Selma ', 'wandersondonadia@yahoo.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 3, 1, '595054.png', '2021-04-23 13:04:10', NULL),
(203, 'Mayone  ', 'solminasmc@gmail.com', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 3, 1, '544964.png', '2021-04-23 13:04:52', NULL),
(204, 'Rodrigo Siqueira / Nicolly ', 'nicollyaraujo92@gmail.com', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 3, 1, '604079.png', '2021-04-23 13:04:23', NULL),
(205, 'Eduardo Queiroz ', 'queirozoliver@gmail.com', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 3, 1, '355576.png', '2021-04-23 13:04:59', NULL),
(206, 'Benilton Gomes ', 'dinamicaeletricidade@gmail.com', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 3, 1, '333702.png', '2021-04-23 13:04:41', NULL),
(207, 'Sandro Neto ', 'comercial@epsoleletrica.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 3, 1, '348480.png', '2021-04-23 13:04:07', NULL),
(208, 'Victor Verzoto - Jales ', 'topsolar.jales@gmail.com', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 3, 1, '302384.png', '2021-04-23 13:04:54', NULL),
(209, 'Rodrigo/Ailton - Belem ', 'rodrigo@stibrasilsolar.com.br', '6be3f61d99a97c60e9f9d29f11c938f8', NULL, NULL, 3, 1, '585314.png', '2021-04-23 13:04:19', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `bluesun_galeria`
--
ALTER TABLE `bluesun_galeria`
  ADD PRIMARY KEY (`imabs_id`) USING BTREE;

--
-- Índices de tabela `compartilho`
--
ALTER TABLE `compartilho`
  ADD PRIMARY KEY (`compartilho_id`) USING BTREE,
  ADD KEY `FK1_usuarios_compartilho` (`compartilho_id_usuario`);

--
-- Índices de tabela `contato_mapa`
--
ALTER TABLE `contato_mapa`
  ADD PRIMARY KEY (`contato_id`) USING BTREE,
  ADD KEY `FK1_contato_mapa_usuario` (`contato_id_user`);

--
-- Índices de tabela `depoimentos`
--
ALTER TABLE `depoimentos`
  ADD PRIMARY KEY (`depoimento_id`) USING BTREE,
  ADD KEY `FK1_depoimento_usuario` (`depoimento_id_user`);

--
-- Índices de tabela `energia_solar`
--
ALTER TABLE `energia_solar`
  ADD PRIMARY KEY (`energia_id`) USING BTREE;

--
-- Índices de tabela `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`equipe_id`) USING BTREE,
  ADD KEY `FK1_user_equipe` (`equipe_id_user`);

--
-- Índices de tabela `itens`
--
ALTER TABLE `itens`
  ADD PRIMARY KEY (`item_id`) USING BTREE;

--
-- Índices de tabela `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`marca_id`) USING BTREE;

--
-- Índices de tabela `niveis_acessos`
--
ALTER TABLE `niveis_acessos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `obras_imagens`
--
ALTER TABLE `obras_imagens`
  ADD PRIMARY KEY (`image_id`) USING BTREE,
  ADD KEY `FK1_img` (`id_image_user`);

--
-- Índices de tabela `situacoes_usuarios`
--
ALTER TABLE `situacoes_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`imasl_id`) USING BTREE;

--
-- Índices de tabela `slide_texto`
--
ALTER TABLE `slide_texto`
  ADD PRIMARY KEY (`slide_texto_id`) USING BTREE;

--
-- Índices de tabela `sobreblue`
--
ALTER TABLE `sobreblue`
  ADD PRIMARY KEY (`sobreb_id`) USING BTREE;

--
-- Índices de tabela `sobrefran`
--
ALTER TABLE `sobrefran`
  ADD PRIMARY KEY (`sobref_id`) USING BTREE,
  ADD KEY `FK1_sobrefran_user` (`sobref_id_user`);

--
-- Índices de tabela `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`social_id`) USING BTREE,
  ADD KEY `FK1_social_usuario` (`social_id_user`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_usuarios_id` (`id_nivacesso`),
  ADD KEY `fk_usuarios2_id` (`id_situacoes`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `bluesun_galeria`
--
ALTER TABLE `bluesun_galeria`
  MODIFY `imabs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `compartilho`
--
ALTER TABLE `compartilho`
  MODIFY `compartilho_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `contato_mapa`
--
ALTER TABLE `contato_mapa`
  MODIFY `contato_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `depoimentos`
--
ALTER TABLE `depoimentos`
  MODIFY `depoimento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `energia_solar`
--
ALTER TABLE `energia_solar`
  MODIFY `energia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `equipe`
--
ALTER TABLE `equipe`
  MODIFY `equipe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `itens`
--
ALTER TABLE `itens`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `marcas`
--
ALTER TABLE `marcas`
  MODIFY `marca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `niveis_acessos`
--
ALTER TABLE `niveis_acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `obras_imagens`
--
ALTER TABLE `obras_imagens`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `situacoes_usuarios`
--
ALTER TABLE `situacoes_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `slides`
--
ALTER TABLE `slides`
  MODIFY `imasl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `slide_texto`
--
ALTER TABLE `slide_texto`
  MODIFY `slide_texto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `sobreblue`
--
ALTER TABLE `sobreblue`
  MODIFY `sobreb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `sobrefran`
--
ALTER TABLE `sobrefran`
  MODIFY `sobref_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `social`
--
ALTER TABLE `social`
  MODIFY `social_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `compartilho`
--
ALTER TABLE `compartilho`
  ADD CONSTRAINT `FK1_usuarios_compartilho` FOREIGN KEY (`compartilho_id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `contato_mapa`
--
ALTER TABLE `contato_mapa`
  ADD CONSTRAINT `FK1_contato_mapa_usuario` FOREIGN KEY (`contato_id_user`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `depoimentos`
--
ALTER TABLE `depoimentos`
  ADD CONSTRAINT `FK1_depoimento_usuario` FOREIGN KEY (`depoimento_id_user`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `FK1_user_equipe` FOREIGN KEY (`equipe_id_user`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `obras_imagens`
--
ALTER TABLE `obras_imagens`
  ADD CONSTRAINT `FK1_img_user` FOREIGN KEY (`id_image_user`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `sobrefran`
--
ALTER TABLE `sobrefran`
  ADD CONSTRAINT `FK1_sobrefran_user` FOREIGN KEY (`sobref_id_user`) REFERENCES `usuarios` (`id`);

--
-- Restrições para tabelas `social`
--
ALTER TABLE `social`
  ADD CONSTRAINT `FK1_social_usuario` FOREIGN KEY (`social_id_user`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
