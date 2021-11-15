-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 26/05/2021 às 22:19
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
-- Banco de dados: `bluesu66_sitenew`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `bs_album`
--

CREATE TABLE `bs_album` (
  `album_id` int(11) NOT NULL,
  `album_descricao` varchar(50) NOT NULL,
  `album_texto` tinytext NOT NULL,
  `album_img` varchar(50) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela com Fotos da Bluesun' ROW_FORMAT=DYNAMIC;

--
-- Despejando dados para a tabela `bs_album`
--

INSERT INTO `bs_album` (`album_id`, `album_descricao`, `album_texto`, `album_img`, `date`) VALUES
(1, 'Bluesun do Brasil', 'Fotos interna da empresa Bluesun do Brasil\r\n', '965689.jpg', '2021-05-19 18:30:42'),
(2, 'Treinamento Presencial', 'Treinamento presencial realizado na Bluesun do Brasil\r\n', '476195.jpg', '2021-05-19 19:40:31');

-- --------------------------------------------------------

--
-- Estrutura para tabela `bs_contato`
--

CREATE TABLE `bs_contato` (
  `contato_id` int(11) NOT NULL,
  `contato_endereco` varchar(50) DEFAULT NULL,
  `contato_bairro` varchar(50) DEFAULT NULL,
  `contato_cidade` varchar(50) DEFAULT NULL,
  `contato_estado` varchar(50) DEFAULT NULL,
  `contato_telefone` varchar(50) DEFAULT NULL,
  `contato_celular` varchar(50) DEFAULT NULL,
  `contato_email` varchar(50) DEFAULT NULL,
  `contato_data` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela com Endereço, telefone e e-mail';

--
-- Despejando dados para a tabela `bs_contato`
--

INSERT INTO `bs_contato` (`contato_id`, `contato_endereco`, `contato_bairro`, `contato_cidade`, `contato_estado`, `contato_telefone`, `contato_celular`, `contato_email`, `contato_data`) VALUES
(1, 'Av. Vitorino Arigone, 450', 'Jardim Santa Bárbara', 'Limeira', 'SP', '(19) 3443-8228', '(19) 98364-2927', 'contato@bluesundobrasil.com.br', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `bs_datasheet`
--

CREATE TABLE `bs_datasheet` (
  `datasheet_id` int(11) NOT NULL,
  `datasheet_marca_id` int(11) NOT NULL DEFAULT 0,
  `datasheet_titulo` varchar(200) DEFAULT NULL,
  `datasheet_arquivo` varchar(50) DEFAULT NULL,
  `datasheet_data` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela com os datasheets dos fornecedores';

--
-- Despejando dados para a tabela `bs_datasheet`
--

INSERT INTO `bs_datasheet` (`datasheet_id`, `datasheet_marca_id`, `datasheet_titulo`, `datasheet_arquivo`, `datasheet_data`) VALUES
(8, 13, 'Painel Fotovoltaico 340W/ 345W/ 350W Poly', '445607.pdf', NULL),
(10, 13, 'Painel Fotovoltaico 410W/ 415W Mono', '275925.pdf', NULL),
(11, 13, 'Painel Fotovoltaico 440W/ 445W Mono', '289943.pdf', NULL),
(12, 13, 'Painel Fotovoltaico 450W/ 455W/ 460W Mono', '116451.pdf', NULL),
(14, 15, 'Painel Fotovoltaico 395W/ 400W/ 405W/ 410W/ 415W/ 420W Poly', '332917.pdf', NULL),
(16, 15, 'Painel Fotovoltaico 430W/ 435W/ 440W/ 445W/ 450W/ 455W Mono', '515135.pdf', NULL),
(18, 16, 'Catálogo Completo FotoFIX', '758215.pdf', NULL),
(19, 16, 'Manual FotoFIX - Telhado Cerâmico', '312743.pdf', NULL),
(20, 16, 'Manual FotoFIX - Telhado Fibrocimento', '945690.pdf', NULL),
(21, 16, 'Manual FotoFIX - Laje e Solo', '692567.pdf', NULL),
(22, 16, 'Manual FotoFIX - Telhado Metálico', '966848.pdf', NULL),
(23, 18, 'Fronius Agilo', '455052.pdf', NULL),
(24, 18, 'Fronius Galvo Eco', '453165.pdf', NULL),
(25, 18, 'Fronius Primo', '727047.pdf', NULL),
(26, 18, 'Fronius Symo', '767041.pdf', NULL),
(27, 18, 'Fronius Symo Brasil', '269446.pdf', NULL),
(28, 17, 'Inversor SAJ 2K (R5)', '867316.rar', NULL),
(29, 17, 'Inversor SAJ 3K (R5)', '499612.rar', NULL),
(30, 17, 'Inversor SAJ 5K (R5)', '995785.rar', NULL),
(31, 17, 'Inversor SAJ 8K (R5)', '666967.rar', NULL),
(32, 17, 'Inversor SAJ 20K (R5)', '860638.rar', NULL),
(33, 17, 'Inversor SAJ Suntrio Plus 12K/ 15K/ 17K/ 20K', '259337.rar', NULL),
(34, 17, 'Inversor SAJ Suntrio Plus 33K', '194836.rar', NULL),
(35, 17, 'Inversor SAJ Suntrio Plus 40K', '630132.rar', NULL),
(36, 17, 'Inversor SAJ Suntrio Plus 60K', '524752.rar', NULL),
(37, 17, 'Inversor SAJ Sununo Plus 1K/ 1.5K/ 2K/ 2.5K/ 3K/ 3.6K', '861410.rar', NULL),
(38, 17, 'Inversor SAJ Sununo Plus 3K-M/ 4K-M/ 5K-M/ 6K-M', '911916.rar', NULL),
(39, 19, 'Inversor Growatt 8000MTL-S (2 MPPT)', '496953.rar', NULL),
(40, 19, 'Inversor Growatt MIC 2500 TL-X (1 MPPT)', '767257.rar', NULL),
(41, 19, 'Inversor Growatt MIC 3000TL-X (1 MPPT)', '750465.rar', NULL),
(42, 19, 'Inversor Growatt MIN-3000TL-X (2 MPPT)', '507658.rar', NULL),
(43, 19, 'Inversor Growatt MIN-5000TL-X (2 MPPT)', '897707.rar', NULL),
(44, 19, 'Inversor Growatt MIN-6000TL-X (2 MPPT)', '443498.rar', NULL),
(45, 19, 'Inversor Growatt-MAC-60000-KTL3-LV', '72325.rar', NULL),
(46, 19, 'Inversor Growatt-MAX-75000TL3-LV(7MPPT)', '413455.rar', NULL),
(48, 19, 'Inversor Growatt-MIC-3000TL-X(1MPPT)', '550938.rar', NULL),
(49, 19, 'Inversor Growatt-MID-25000-TL3-X', '121747.rar', NULL),
(63, 20, 'String Box - SB-1E_2E-1S-600DC', '976203.pdf', NULL),
(64, 20, 'String Box - SB-1E-1S-600DC', '535682.pdf', NULL),
(65, 20, 'String Box - SB-2E_4E-2S-600DC', '116259.pdf', NULL),
(66, 20, 'String Box - SB-2E-2S-600DC', '991796.pdf', NULL),
(67, 20, 'String Box - SB-3E-1S-600DC', '566387.pdf', NULL),
(68, 20, 'String Box - SB-3E-3S-600DC', '974077.pdf', NULL),
(69, 20, 'String Box - SB-1E_2E-1S_2S-1010DC', '56506.pdf', NULL),
(70, 20, 'String Box - SB-2E_4E-2S_4S-1010DC', '344169.pdf', NULL),
(71, 20, 'String Box - SB-2E-2S-1010DC', '340676.pdf', NULL),
(72, 20, 'String Box - SB-3E_6E-3S_6S-1010DC', '735159.pdf', NULL),
(73, 20, 'String Box - SB-4E-1S-1010DC', '514048.pdf', NULL),
(74, 20, 'String Box - SB-4E-4S-1010DC', '698868.pdf', NULL),
(75, 20, 'String Box - SB-5E-1S-1010DC', '882038.pdf', NULL),
(76, 20, 'String Box - SB-5E-5S-1010DC', '32996.pdf', NULL),
(77, 20, 'String Box - SB-6E-1S-1010DC', '986688.pdf', NULL),
(78, 20, 'String Box - SB-6E-6S-1010DC', '562825.pdf', NULL),
(79, 20, 'String Box - SB-8E-4S-1010DC', '829687.pdf', NULL),
(80, 20, 'String Box - SB-9E-3S-1010DC', '149003.pdf', NULL),
(81, 20, 'String Box - SB-10E-1S-1010DC', '118063.pdf', NULL),
(82, 20, 'String Box -SB-XXE-1S-1500DC C_ OU S_ MONIT PAINEL FOTOVOLTAICO', '507001.pdf', NULL),
(83, 20, 'LIGAÇÃO Y EM DPS FOTOVOLTAICOS E SUA IMPORTÂNCIA', '308576.pdf', NULL),
(84, 20, 'INFORMAÇÕES DPS DEHN UTILIZADOS NAS CAIXAS PROAUTO', '649539.pdf', NULL),
(89, 25, 'Painel Fotovoltaico 395W/ 400W/ 405W/ 410W/ 415W/ 420W/ 425W Mono', '408525.pdf', NULL),
(90, 26, 'Painel fotovoltaico 520W~550W Mono', '352930.pdf', NULL),
(91, 27, 'CERTIFICADO DE GARANTIA GRUPO NTC SOMAR', '765006.pdf', NULL),
(92, 27, 'INSTRUÇÃO DE MONTAGEM MESA 1X4 - 10 a 25', '261960.pdf', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `bs_divisoes`
--

CREATE TABLE `bs_divisoes` (
  `divisoes_id` int(11) NOT NULL,
  `divisoes_titulo` varchar(50) DEFAULT NULL,
  `divisoes_subtitulo` varchar(50) DEFAULT NULL,
  `divisoes_url` varchar(50) DEFAULT NULL,
  `divisoes_img` varchar(50) DEFAULT NULL,
  `divisoes_linkbotao` varchar(50) DEFAULT NULL,
  `divisoes_data` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela com Descrição das Divisões da Bluesun: Importadora e Distribuidora, Franqueadora e Treinamentos Gratuitos';

--
-- Despejando dados para a tabela `bs_divisoes`
--

INSERT INTO `bs_divisoes` (`divisoes_id`, `divisoes_titulo`, `divisoes_subtitulo`, `divisoes_url`, `divisoes_img`, `divisoes_linkbotao`, `divisoes_data`) VALUES
(1, 'Importadora e Distribuidora', 'Para você que deseja ser um Integrador/Revendedor', 'https://www.youtube.com/embed/O0ZZZlAjTEU', '158773.png', 'http://integrador.bluesunsolardobrasil.com.br/', NULL),
(2, 'Franqueadora', 'Para você que deseja ser um Franqueado Bluesun!', 'https://www.youtube.com/embed/QOBqqumghZU', '98937.png', 'encontrefranqueado', NULL),
(3, 'Treinamentos Gratuitos', 'Para você que deseja ser um Aluno Bluesun!', 'https://www.youtube.com/embed/UTWjyQo_J6k', '85892.png', 'https://cursos.bluesundobrasil.com.br/', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `bs_franqueados`
--

CREATE TABLE `bs_franqueados` (
  `id_franqueado` int(11) NOT NULL,
  `empresa` varchar(57) CHARACTER SET latin1 NOT NULL,
  `contato` varchar(22) CHARACTER SET latin1 NOT NULL,
  `telefone` varchar(28) CHARACTER SET latin1 NOT NULL,
  `cidade` varchar(27) CHARACTER SET latin1 NOT NULL,
  `uf` varchar(2) CHARACTER SET latin1 NOT NULL,
  `modalidade` varchar(11) CHARACTER SET latin1 NOT NULL,
  `email` varchar(40) CHARACTER SET latin1 NOT NULL,
  `data_alteracao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `bs_franqueados`
--

INSERT INTO `bs_franqueados` (`id_franqueado`, `empresa`, `contato`, `telefone`, `cidade`, `uf`, `modalidade`, `email`, `data_alteracao`) VALUES
(1, 'Giovani Dalzoto Solar', 'Giovani', '(42)99857-5155', 'Ponta Grossa', 'PR', 'Loja', 'giovanidalzoto@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(2, 'Suns Energy Comercio e Manutenção de Placas Solares', 'Marcelo / João', '(19) 99930-8685', 'Araras', 'SP', 'Loja', 'marceloferrero@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(3, 'Martins Meneses Sistema de Irrigação Ltda', 'Luiz André', '(38) 98811-1666', 'Unai', 'MG', 'Home Office', 'luizmeneses@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(4, 'Spirity Engenharia Ltda', 'Silvio', '(21)96624-3333', 'Niteroi', 'RJ', 'Home Office', 'silvioseroa@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(5, 'Sol do Norte Instalação E Manutenção de Energia Solar ', 'Alvano Mutz', '(92) 99128-7260', 'Manaus', 'AM', 'Home Office', 'alvanomutz@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(6, 'C.R.D. Pena Construção e Climatização ME', 'Clovis', '(21) 99525-2215', 'Itaboraí', 'RJ', 'Loja', 'clovisduailibi@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(7, 'F R C Noronha - Sol & Energia EIRELI', 'Frederico', '(22) 99912-3884', 'Macaé', 'RJ', 'Loja', 'fredericonoronha@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(8, 'Petra Engenharia e Construção', 'Marcos/ Marlon', '(19) 99135-6360', 'Cuiabá', 'MT', 'Home Office', 'petraengenharia@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(9, 'Petra Engenharia e Construção', 'Marcos/ Marlon', '(19) 99135-6360', 'Sinop', 'MT', 'Home Office', 'petraengenharia@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(10, 'Petra Engenharia e Construção', 'Marcos/ Marlon', '(19) 99135-6360', 'Matupá', 'MT', 'Home Office', 'petraengenharia@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(11, 'Petra Engenharia e Construção', 'Marcos/ Marlon', '(19) 99135-6360', 'Vinhedo', 'SP', 'Home Office', 'petraengenharia@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(12, 'Petra Engenharia e Construção', 'Marcos/ Marlon', '(19) 99135-6360', 'Luiz Eduardo Magalhães', 'BA', 'Home Office', 'petraengenharia@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(13, 'Cleane Lopes Castro ME', 'Gleyson', '(19) 99750-1811', 'Rio Claro', 'SP', 'Home Office', 'cleanelopes@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(14, 'Telcar - Audio System Eletronica LTDA', 'Carlos Roberto', '(61) 99982-1650', 'BrasÃ­lia', 'DF', 'Loja', 'carlosaraujo@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(15, 'Marcelo Luz da Silva ME', 'Marcelo', '(51)99836-1763', 'Cachoeira do Sul', 'RS', 'Loja', 'marcelosilva@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(16, 'Mister Solutions Sales Corporation LTDA', 'Felipe Proença', '(21)98030-4154', 'Saquarema', 'RJ', 'Loja', 'felipesantos@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(19, 'Terblin Energia Solar Serralheria e Vidraçaria LTDA', 'Fabia / Antonio Carlos', '(22) 99964-9025', 'Saquarema', 'RJ', 'Home Office', 'antoniosouza@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(20, 'L. F. P. Chiaparini - ME', 'Jair', '(17)99624-3536', 'Jales', 'SP', 'Loja', 'jairchiaparini@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(21, 'Mega Eco Economia Inteligente e Eficiente', 'Lorival', '(11)940323131', 'Osasco', 'SP', 'Home Office', 'lorivalsilvaneto@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(22, 'Pamella Cristina Teodoro', 'Josimar', '(31) 97543-0842', 'Ribeirão das Neves', 'MG', 'Home Office', 'josimarviana@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(24, 'R G S Comercial EIRELI', 'Raimundo', '(96) 98115-3411', 'Vitória', 'ES', 'Home Office', 'raimundosouza@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(25, 'R G S Comercial EIRELI', 'Raimundo', '(96)98115-3411', 'Fortaleza', 'CE', 'Home Office', 'raimundosouza@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(26, 'R G S Comercial EIRELI', 'Raimundo', '(96)98115-3411', 'Salvador', 'BA', 'Home Office', 'raimundosouza@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(27, 'R G S Comercial EIRELI', 'Raimundo', '(96) 98115-3411', 'Belém', 'PA', 'Home Office', 'raimundosouza@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(28, 'EB & TS (Brasilink Serviços EIRELI)', 'Thiago Aquino', '(88) 99922-0037', 'Tianguá', 'CE', 'Home Office', 'thiagoaquino@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(29, 'Hemeson Soares Pinheiro', 'Hemerson', '(12)99195-6797', 'Ilha Bela', 'SP', 'Home Office', 'hemersonpinheiro@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(30, 'Tecno-Air Comércio e Engenharia LTDA', 'Paulo Roberto', '(12) 99109-1677', 'São José dos Campos', 'SP', 'Home Office', 'plfilho1@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(31, 'Tecno-Air Comércio e Engenharia LTDA', 'Paulo Roberto', '(12) 99109-1677', 'Campinas', 'SP', 'Home Office', 'plfilho2@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(32, 'Green Mode Engenharia Sustentável LTDA', 'Mario Sergio', '(62) 99682-3662', 'Goiânia', 'GO', 'Loja', 'greenmode@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(33, 'Sergio Antonio Angel Perines', 'SÃ©rgio Perines', '(14) 99824-0536', 'Pederneiras', 'SP', 'Home Office', 'sergioperines@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(34, 'César Aguiar Dias de Souza', 'Cesar Aguiar', '(11) 99556-8166', 'Guarulhos', 'SP', 'Home Office', 'cesarsouza@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(35, 'Agro Sol LTDA', 'Carlos Andre', '(99) 99202-2611', 'Imperatriz', 'MA', 'Home Office', 'agrosol@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(36, 'Fernando Teixeira Cardoso Alves', 'Fernando Teixeira', '(67) 98120-8868', 'Campo Grande', 'MS', 'Home Office', 'fernandocardoso@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(37, 'Anderson Gervasoni Garcia', 'Anderson', '(19) 98267-9282', 'Campinas', 'SP', 'Home Office', 'andersongervasoni@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(38, 'Claudio de Souza Crespo', 'Claudio', '(33) 98875-0577', 'Governador Valadares', 'MG', 'Home Office', 'claudiocrespo@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(39, 'Pablo Sanches de Andrade', 'Pablo', '(21) 97019-5437', 'Nova Iguaçu', 'RJ', 'Home Office', 'pablosanches@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(40, 'Natuenergia Solar LTDA', 'Alcio Pessoa', '( 21) 98161-4418', 'Tijuca', 'RJ', 'Home Office', 'natuenergia@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(41, 'R Leão da Silva - ME', 'Rômulo', '(87) 99623-0091', 'Serra Talhada', 'PE', 'Home Office', 'romulosilva@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(42, 'XP Importação e Tecnologia em Energia Renováveis EIREL', 'Carlos Frederico', '(84) 99179-8192', 'Natal', 'RN', 'Loja', 'xpenergia@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(43, 'XP Importação e Tecnologia em Energia Renováveis EIREL', 'Carlos Frederico', '(84) 99179-8192', 'Mossoró', 'RN', 'Home Office', 'xpenergia@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(44, 'Florisvaldo Alves Vidal - ME', 'Florisvaldo', '(75) 98866-0624', 'Santo Antonio de Jesus ', 'BA', 'Home Office', 'florisvaldovidal@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(45, 'R S Carnieto Revestimento LTDA', 'RogÃ©rio', '(19) 99286-0911', 'HortolÃ¢ndia', 'SP', 'Home Office', 'rscarnieto@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(46, 'J&J .Energia Solar LTDA', 'José Eduardo', '(16) 99184-5101', 'Serrana', 'SP', 'Home Office', 'jejenergiasolar@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(47, 'Felí­cio Sato', 'FelÃ­cio', '(11) 98536-4853', 'Ibiúna', 'SP', 'Home Office', 'feliciosato@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(48, 'Imperplan Ipermebialização e Engenharia LTDA', 'José Pedro Camargo', '(67) 99221-8282', 'Campo Grande', 'MS', 'Loja', 'imperplan@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(49, 'Claudio Cabral Vilela - EPP', 'Claudio Vilela', '(83) 98795-5214', 'João Pessoa', 'PB', 'Home Office', 'claudiovilela@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(50, 'F & M Indústria Comércio E Serviços LTDA', 'Bruna', '(11) 94719-2942', 'São Paulo', 'SP', 'Home Office', 'solucaoglass@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(51, 'C. S. C. Dos Santos Instalação Elétrica LTDA', 'Caio Saturnino', '(11) 95944-3830', 'São Paulo', 'SP', 'Home Office', 'caiosaturnino@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(52, 'Telemétrica Serviços - ME', 'Carlos Valente Neto', '(11) 95423-4333', 'São Paulo', 'SP', 'Home Office', 'telemetrica@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(53, 'Telemétrica Serviços - ME', 'Carlos Valente Neto', '(11) 95423-4333', 'Barueri', 'SP', 'Home Office', 'telemetrica@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(54, 'Telemétrica Serviços - ME', 'Carlos Valente Neto', '(11) 95423-4333', 'Rio de Janeiro', 'RJ', 'Home Office', 'telemetrica@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(56, 'Samara Guimarães Welter', 'Leandro', '(55) 99148-6757', 'São Leopoldo', 'SP', 'Home Office', 'samarawelter@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(57, 'Wellington das  Neves de Assis', 'Wellington', '(64) 99954-0296', 'Jataí', 'GO', 'Home Office', 'wellingtonassis@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(58, 'Marcelo Cruz Rodrigues', 'Marcelo', '(19) 98362-1588', 'Paulínia', 'SP', 'Home Office', 'marcelorodrigues@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(59, 'Trenaer Comércio e Serviço LTDA', 'Sebastião', '(16) 99607-0743', 'Matão', 'SP', 'Loja', 'trenaer@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(60, 'Produtiva Agrícola Comércio, Industria e Serviços Eire', 'Edmar/Luiz', '(66) 99612-5252', 'Rondonópolis', 'MT', 'Home Office', 'produtiva@bluesundobrasil.com.br', '2021-05-17 11:20:24'),
(62, 'A N dos Santos Promoção de Vendas ', 'Adriano 1', '(11) 97402-8097', 'Jundiaí', 'SP', 'Home Office', 'adrianonunes@bluesundobrasil.com.br', '2021-05-17 14:11:05'),
(63, 'Admiel Gomes Neto ', 'Admiel ', '(99) 99209-7655', 'Grajau', 'MA', 'Home Office', 'admielneto@bluesundobrasil.com.br', '2021-05-17 14:13:56'),
(64, 'Adriano R. dos Reis ', 'Adriano ', '(34) 99911-0060', 'Prata ', 'MG', 'Loja', 'milsolar@bluesundobrasil.com.br', '2021-05-17 14:15:25'),
(65, 'Agrosun Solar LTDA', 'Jean', '(44) 99727-2094', 'Maringá', 'PR', 'Home Office', 'agrosun@bluesundobrasil.com.br', '2021-05-17 14:20:53'),
(66, 'Alba Cavalcante Albuquerque Soares', 'Bruno', '(82) 99995-9509', 'Maceió', 'AL', 'Home Office', 'prolseg@bluesundobrasil.com.br', '2021-05-17 14:22:24'),
(67, 'Alessandro Araujo Marques ', 'Alessandro', '(11) 95886-9846', 'Guarulhos', 'SP', 'Home Office', 'alessandro@bluesundobrasil.com.br', '2021-05-17 14:23:32'),
(68, 'Alex Gondim Paiva ', 'Alex ', '(34) 99679-8494', 'Uberlândia', 'MG', 'Home Office', 'alesol.udi@bluesundobrasil.com.br', '2021-05-17 14:24:17'),
(69, 'Alexandre da Silva Assunção ', 'Alexandre ', '(31) 99155-8604', 'Belo Horizonte', 'MG', 'Home Office', 'liberdadesolar@bluesundobrasil.com.br', '2021-05-17 14:25:23'),
(70, 'Alexandre Magri', 'João Carlos/ Alexandre', '(51) 99524-6856', 'Arvorezinha', 'RS', 'Home Office', 'alexandremagri@bluesundobrasil.com.br', '2021-05-17 14:26:15'),
(71, 'Ana Carla Fontes de Faria ', 'Ana Carla', '(73) 98108-5244', 'Itabuna', 'BA', 'Home Office', 'anafaria@bluesundobrasil.com.br', '2021-05-17 14:27:56'),
(72, 'André Bruno da Silva ', 'André Bruno', '(11) 99401-1953', 'Piedade', 'SP', 'Home Office', 'andre@bluesundobrasil.com.br', '2021-05-17 14:29:27'),
(73, 'André Luiz de Paula', 'André', '(35) 99959-1554', 'Campo Belo', 'MG', 'Home Office', 'megasol@bluesundobrasil.com.br', '2021-05-17 14:30:12'),
(74, 'Angelo Aparecido Carvalhatti', 'Angelo', '(43) 99987-1119', 'Andirá', 'PR', 'Home Office', 'kvaelectric@bluesundobrasil.com.br', '2021-05-17 14:32:15'),
(75, 'Antoniel Santos Ribeiro', 'Antoniel', '(71) 98867-0046', 'Salvador', 'BA', 'Home Office', 'antonielribeiro@bluesundobrasil.com.br', '2021-05-17 14:33:17'),
(76, 'Antonio Cassio de Oliveira Santos ', 'Antonio ', '(27) 98826-4387', 'Vila Velha ', 'ES', 'Home Office', 'antoniosantos@bluesundobrasil.com.br', '2021-05-17 14:34:03'),
(77, 'Arcel Empreendimentos Ltda ', 'José Pedro', '(27) 99702-3940', 'São Mateus', 'ES', 'Home Office', 'arcel@bluesundobrasil.com.br', '2021-05-17 14:34:54'),
(78, 'ARV Automação e Sistemas de Segurança LTDA', 'Vanessa', '(16) 99353-0366', 'Araraquara', 'SP', 'Home Office', 'arcenenergiasolar@bluesundobrasil.com.br', '2021-05-17 14:35:42'),
(79, 'Bom Clima Instalações Elétricas', 'Michel', '(61) 99682-9590', 'Luziânia', 'GO', 'Home Office', 'bomclima@bluesundobrasil.com.br', '2021-05-17 14:36:46'),
(80, 'Bona Equipamentos Eletricos ireli', 'Zenilton', '(19) 99926-9242', 'Pirassununga', 'SP', 'Home Office', 'bonasolar@bluesundobrasil.com.br', '2021-05-17 14:37:46'),
(81, 'Brasilina de Oliveira Braz ', 'Brasilina / Wilson ', '(19) 98124-0486', 'Americana', 'SP', 'Home Office', 'hwssolar@gmail.com', '2021-05-17 14:38:34'),
(82, 'Bruna Maximiano Fayer', 'Bruna', '(32) 99175-0478', 'Juiz de Fora ', 'MG', 'Home Office', 'solarisjf@bluesundobrasil.com.br', '2021-05-17 14:39:40'),
(83, 'Bruno Aderbal Santos de Oliveira   ', 'Bruno - Alexsandro', '(81) 98149-5216', 'Santa Cruz do Capibaribe', 'PE', 'Home Office', 'brunooliveira@bluesundobrasil.com.br', '2021-05-17 14:47:37'),
(84, 'C K Kuno Consultoria e Engenharia de Telecomunicações ', 'Clovis Koji', '(41) 99113-8931', 'Curitiba', 'PR', 'Home Office', 'cloviskuno@bluesundobrasil.com.br', '2021-05-17 14:54:48'),
(85, 'C. S. F Serviços Elétricos LTDA', 'Cleyner', '(63) 98437-3939', 'Palmas', 'TO', 'Home Office', 'energytec@bluesundobrasil.com.br', '2021-05-17 14:55:45'),
(86, 'Caio Felipe Lobato Ribeiro ', 'Caio Felipe', '(31) 99439-4441', 'Contagem', 'MG', 'Home Office', 'solebioenergia@bluesundobrasil.com.br', '2021-05-17 14:56:47'),
(87, 'Carvalho Construtora ', 'Daniel ', '(62) 98604-7225', 'Aparecida de Goiania', 'GO', 'Home Office', 'ecosol@bluesundobrasil.com.br', '2021-05-17 14:57:36'),
(88, 'Cesar Leal Rinque Kumaki', 'Cesar ', '(44) 98447-3428', 'Santa Cruz de Monte Castelo', 'PR', 'Home Office', 'cesarleal@bluesundobrasil.com.br', '2021-05-17 14:58:26'),
(89, 'Clovis do Nascimento Junior', 'Clovis Nascimento', '(11) 95433-2670', 'Ribeirão Preto', 'SP', 'Home Office', 'jbioesolutions@bluesundobrasil.com.br', '2021-05-17 14:59:24'),
(90, 'Cristiany de Oliveira ', 'Cristiany / Douglas ', '(55) 99656-8333', 'Ijuá', 'RS', 'Home Office', 'unidadeijui@bluesundobrasil.com.br', '2021-05-17 15:00:09'),
(91, 'D M B de Souza Leal ', 'Roberto Leal ', '(91) 98163-8568', 'Belém', 'PA', 'Home Office', 'dmbsolar@bluesundobrasil.com.br', '2021-05-17 15:00:45'),
(92, 'Daniel Maia Angeli - ME', 'Daniel', '(11) 98515-5967', 'Belo Horizonte', 'MG', 'Home Office', 'danielangeli@bluesundobrasil.com.br', '2021-05-17 15:01:38'),
(93, 'Daniele Azevedo Monteiro de Melo', 'Daniele ', '(92) 98439-0014', 'Manaus', 'AM', 'Home Office', 'danielemonteiro@bluesundobrasil.com.br', '2021-05-17 15:02:20'),
(94, 'Darlan Trindade Cidade', 'Darlan', '(92) 98424-4812', 'Manaus', 'AM', 'Home Office', 'trindade@bluesundobrasil.com.br', '2021-05-17 15:03:14'),
(95, 'Diego Marques Teles Lobo ', 'Diego ', '(21) 99931-8839', 'Rio de Janeiro ', 'RJ', 'Home Office', '', '2021-05-17 15:04:03'),
(96, 'Diego Milcio Gonçalves de Sousa', 'Diego ', '(66) 98447-9468', 'Rondonópolis', 'MT', 'Home Office', 'diegomilcio@bluesundobrasil.com.br', '2021-05-17 15:05:00'),
(97, 'Diego Paulino da Silva ', 'Diego ', '(54) 99151-6176', 'Caxias do Sul ', 'RS', 'Home Office', '', '2021-05-17 15:05:38'),
(99, 'Edinaldo da Silva ', 'Edinaldo', '(77) 99999-5817', 'Santana ', 'BA', 'Home Office', 'megasolsolar@bluesundobrasil.com.br', '2021-05-17 15:07:45'),
(100, 'Edivaldo Nunes Cordeiro Filho', 'Cordeiro', '(15) 99136-5588', 'Boituva', 'SP', 'Home Office', 'spgenergia@bluesundobrasil.com.br', '2021-05-17 15:08:29'),
(101, 'Elias Freiria Pereira ', 'Elias / Sergio', '(41) 99672-3473', 'Curitiba', 'PR', 'Home Office', 'eliaspereira@bluesundobrasil.com.br', '2021-05-17 15:09:48'),
(102, 'Elinton Ferreira Ribas', 'Elinton', '(42) 99870-0641', 'Carambei', 'PR', 'Home Office', 'elinton@bluesundobrasil.com.br', '2021-05-17 15:10:35'),
(103, 'Elkerjaer Luiz de Moura Galindo', 'Elkerjaer', '(81) 98616-3743', 'Jaboatão dos Guararapes', 'PE', 'Home Office', 'egempreendimentos@bluesundobrasil.com.br', '2021-05-17 15:11:35'),
(104, 'Eva Soares de Oliveira ', 'Eva / Romario ', '(32) 3541-2504', 'Ubá', 'MG', 'Home Office', 'somarr@bluesundobrasil.com.br', '2021-05-17 15:12:51'),
(105, 'Evaldo Damo', 'Evaldo', '(11) 99650-4242', 'Maua', 'SP', 'Home Office', 'evaldodamo@bluesundobrasil.com.br', '2021-05-17 15:13:45'),
(106, 'Fabiano Marcelo Diaz de La Cuadra', 'Fabiano ', '(67) 98472-7835', 'Dourados ', 'MS', 'Home Office', 'itaicyiluminacao@bluesundobrasil.com.br', '2021-05-17 15:14:49'),
(107, 'Fabio Bonilha Soares ', 'Fabio ', '(19) 98431-9990', 'Sertãozinho', 'SP', 'Home Office', 'fabiosoares@bluesundobrasil.com.br', '2021-05-17 15:15:47'),
(108, 'Fibra - Seg - Segurança, Redes Logicas, Apoio Administra', 'Francisco ', '(11) 94909-0409', 'Itu', 'SP', 'Home Office', 'fibraseg@bluesundobrasil.com.br', '2021-05-17 15:17:17'),
(109, 'Flávio de Oliveira Leal', 'Flávio', '(18) 99732-1507', 'Araçatuba', 'SP', 'Home Office', 'flavioleal@bluesundobrasil.com.br', '2021-05-17 15:18:12'),
(110, 'GD Geração de Energia', 'Gabriel', '(18) 99974-7661', 'Presidente Prudente', 'SP', 'Home Office', 'gdenergia@bluesundobrasil.com.br', '2021-05-17 15:19:23'),
(111, 'Gerson Vieira Lessa', 'Gerson', '(69) 99233-0353', 'Porto Velho', 'RO', 'Home Office', 'gersonlessa@bluesundobrasil.com.br', '2021-05-17 15:20:10'),
(112, 'Gilmar Martins dos Santos ', 'Gilmar', '(11) 99712-3416', 'São Paulo', 'SP', 'Home Office', 'gmssolar@bluesundobrasil.com.br', '2021-05-17 15:20:55'),
(113, 'Gilmara da Rocha Luz Leite ', 'Tharcis - Gilmara', '(18) 99618-5353', 'Estrela do Norte', 'SP', 'Home Office', 'oesteenergiasolar@bluesundobrasil.com.br', '2021-05-17 15:21:37'),
(114, 'Giovani Pedroso da Silva ', 'Giovani ', '(51) 99510-0169', 'Lindolfo Collor ', 'RS', 'Home Office', 'collorsun@bluesundobrasil.com.br', '2021-05-17 15:22:10'),
(115, 'Giselle Gomes Santos Gomes Távora ', 'Leonardo / Giselle', '(21) 98635-4733', 'Maricá', 'RJ', 'Home Office', 'giselletavora@bluesundobrasil.com.bra', '2021-05-17 15:22:48'),
(116, 'Globo Energia Comercio Atacadista de Equipamento Para Ene', 'Joelson ', '(14) 99662-3000', 'Lins', 'SP', 'Home Office', 'globoenergia@bluesundobrasil.com.br', '2021-05-17 15:23:37'),
(117, 'Guilherme Araujo Vasconcelos ', 'Guilherme', '(31) 97164-7105', 'Belo Horizonte', 'MG', 'Home Office', 'solarfactory@bluesundobrasil.com.br', '2021-05-17 15:24:26'),
(118, 'Guilherme Dos Santos Mariano', 'Guilherme', '(18) 98118-5798', 'Marí­lia', 'SP', 'Home Office', 'guilhermemariano@bluesundobrasil.com.br', '2021-05-17 15:25:19'),
(119, 'Hamilton Souza Gouveia ', 'Hamilton ', '(81) 98884-1161', 'Recife ', 'PE', 'Home Office', 'hamiltongouveia@bluesundobrasil.com.br', '2021-05-17 15:26:11'),
(120, 'Henrique De Araujo Souza', 'Henrique', '(11) 99896-5457', 'São Paulo', 'SP', 'Home Office', 'hassolar@bluesundobrasil.com.br', '2021-05-17 15:27:19'),
(121, 'HGL Sistemas Fotovoltaicos Ltda ', 'Heriston', '(41) 99257-9921', 'Curitiba', 'PR', 'Home Office', 'hgl@bluesundobrasil.com.br', '2021-05-17 15:28:22'),
(122, 'Hugo Nascimento ', 'Hugo / Lucas ', '(31) 99199-3337', 'Conselheiro Lafaiete', 'MG', 'Home Office', 'hugonascimento@bluesundobrasil.com.br', '2021-05-17 15:31:19'),
(123, 'Hyago Marçal Freitas ', 'Wellington ', '(22) 99826-0208', 'Campos de Goytacazes', 'RJ', 'Home Office', 'freitas@bluesundobrasil.com.br', '2021-05-17 15:32:59'),
(124, 'Igor Henrique Barbosa Trigueiro ', 'Josimir / Igor ', '(83) 99859-6546', 'João Pessoa', 'PB', 'Home Office', 'paraibasolar@bluesundobrasil.com.br', '2021-05-17 15:33:44'),
(125, 'Ilumimax Energia Solar Ltda', 'Maxwell', '(99) 98105-5921', 'Imperatriz ', 'MA', 'Home Office', 'ilumimax@bluesundobrasil.com.br', '2021-05-17 15:38:43'),
(126, 'Isadora de Freitas Dyna ', 'Junior / Isadora', '(17) 99743-3024', 'Santa Fé do Sul', 'SP', 'Home Office', 'alumisa@bluesundobrasil.com.br', '2021-05-17 15:39:54'),
(127, 'Ítalo Augusto Nunes da Silva', 'Ítalo', '(43) 99613-2389', 'Londrina', 'PR', 'Home Office', 'delthasolar@bluesundobrasil.com.br', '2021-05-17 15:40:52'),
(128, 'J. P. Faria Engenharia & Empreendimentos Ltda', 'Heverton', '(34) 98876-8703', 'Uberlândia', 'MG', 'Home Office', 'jpfaria@bluesundobrasil.com.br', '2021-05-17 15:42:01'),
(129, 'Jairo Dias de Oliveira Junior ', 'Jairo ', '(19) 99163-8146', 'Mogi-Guaçu', 'SP', 'Home Office', 'jairodias@bluesundobrasil.com.br', '2021-05-17 15:43:06'),
(130, 'Jardenice Candida Machado', 'Gladyson', '(81) 98543-2716', 'Olinda', 'PE', 'Home Office', 'solarpernambuco@bluesundobrasil.com.br', '2021-05-17 15:43:47'),
(131, 'Joaquim José dias Neto', 'Joaquim', '(21) 98582-2224', 'Rio de Janeiro', 'RJ', 'Home Office', 'joaquimdias@bluesundobrasil.com.br', '2021-05-17 17:07:45'),
(132, 'José Aparecido Gouveia da Silva ', 'JosÃ© Aparecido ', '(11) 94737-5003', 'São Paulo', 'SP', 'Home Office', 'josegouveia@bluesundobrasil.com.br', '2021-05-17 17:08:31'),
(133, 'Jose Cosme Oliveira ', 'Jose Cosme', '(31) 99306-2287', 'Betim ', 'MG', 'Home Office', 'joseoliveira@bluesundobrasil.com.br', '2021-05-17 17:09:21'),
(135, 'José Nilton Rodrigues de Souza ', 'José Nilton', '(74) 98853-4649', 'Petrolina ', 'PE', 'Home Office', 'jnengenheira@bluesundobrasil.com.br', '2021-05-17 17:10:47'),
(136, 'José Ricardo de Camargo Vaz Dourado', 'Roberto Gil', '(13) 99777-9014', 'Registro', 'SP', 'Home Office', 'greensolar@bluesundobrasil.com.br', '2021-05-17 17:12:02'),
(137, 'Josias do Nascimento Viana ', 'Josias ', '(77) 99169-3727', 'Caetité', 'BA', 'Home Office', 'josiasviana@bluesundobrasil.com.br', '2021-05-17 17:12:50'),
(138, 'Josiel de Melo Rodrigues ', 'Josiel ', '(21) 96415-3955', 'Rio de Janeiro ', 'RJ', 'Home Office', 'quatroirmaossun@bluesundobrasil.com.br', '2021-05-17 17:13:36'),
(139, 'Juliana da Silva Santos ', 'Juliana / Rafael', '(27) 99847-2778', 'Serra ', 'ES', 'Home Office', 'jr@bluesundobrasil.com.br', '2021-05-17 17:14:16'),
(140, 'Juliana Tietbohl da Silva', 'Gizandro', '(51) 99784-3764', 'Tramandaí', 'RS', 'Home Office', 'tecsunsolar@bluesundobrasil.com.br', '2021-05-17 17:15:00'),
(141, 'Kleos Johnny Cardoso Teles ', 'Kleos ', '(62) 98158-1151', 'Goiânia', 'GO', 'Home Office', 'kleosteles@bluesundobrasil.com.br', '2021-05-17 17:15:58'),
(142, 'Klivily Kleber da Silva Cunha ', 'Klivily', '(81) 98328-7356', 'São Lourenço da Mata ', 'PE', 'Home Office', 'klivilycunha@bluesundobrasil.com.br', '2021-05-17 17:16:45'),
(143, 'Laerte Edson Braga', 'Laerte', '(11) 99859-0980', 'Guarulhos', 'SP', 'Home Office', 'sungolden@bluesundobrasil.com.br', '2021-05-17 17:17:22'),
(144, 'Lans Serviços de Estática Automotiva Ltda ', 'Ludgero', '(21) 99597-9498', 'Rio de Janeiro ', 'RJ', 'Home Office', 'lansenergia@bluesundobrasil.com.br', '2021-05-17 17:18:27'),
(145, 'Leste Solar LTDA', 'Rodolfo ', '(11) 99626-5323', 'São Paulo', 'SP', 'Home Office', 'lestesolar@bluesundobrasil.com.br', '2021-05-17 17:19:18'),
(146, 'Liberty Energia Solar Instalações Elétricas LTDA', 'Antonio ', '(11) 96822-6162', 'Sorocaba', 'SP', 'Home Office', 'liberty@bluesundobrasil.com.br', '2021-05-17 17:21:10'),
(147, 'Lorena da Silva Correa Lima', 'Lorena', '(67) 99305-1404', 'Campo Grande', 'MS', 'Home Office', 'lorenalima@bluesundobrasil.com.br', '2021-05-17 17:21:53'),
(149, 'Luciano Lima Rhenns', 'Luciano', '(47) 99254-3319', 'Itajaí', 'SC', 'Home Office', 'lucianorhenns@bluesundobrasil.com.br', '2021-05-17 17:23:15'),
(150, 'Ludmila Latorre Reina ', 'Ludmila / Eduardo ', '(11) 99943-6457', 'Santo André', 'SP', 'Home Office', 'reinasolar@bluesundobrasil.com.br', '2021-05-17 17:23:59'),
(151, 'Luiz Guilherme Silva Frangilo ', 'Luiz Guilherme ', '(21) 97368-3538', 'Rio de Janeiro', 'RJ', 'Home Office', 'guilhermefrangilo@bluesundobrasil.com.br', '2021-05-17 17:24:40'),
(152, 'Lumiere Energia Solar LTDA', 'Ewerthon', '(82) 99630-2946', 'Arapiraca', 'AL', 'Home Office', 'lumieresolar@bluesundobrasil.com.br', '2021-05-17 17:25:40'),
(153, 'Luzia Ozorio Gonçalves ', 'Luzia', '(19) 99626-1343', 'Araras', 'SP', 'Home Office', '', '2021-05-17 17:26:32'),
(154, 'M.R. de Carvalho Energia Solar ', 'Maicon ', '(19) 98853-8631', 'Florianópolis', 'SC', 'Home Office', 'mrenergiasolar@bluesundobrasil.com.br', '2021-05-17 17:27:12'),
(155, 'Maicon Deibert Marques Ribeiro ', 'Maicon Deibert', '(21) 98632-6300', 'Maricá', 'RJ', 'Home Office', 'jdmrsolar@bluesundobrasil.com.br', '2021-05-17 17:27:59'),
(156, 'Maicon Lima dos Santos ', 'Maicon Lima', '(54) 99108-0884', 'Alto Feliz', 'RS', 'Home Office', 'amvsolar@bluesundobrasil.com.br', '2021-05-17 17:29:05'),
(157, 'Mais Energia Solar', 'Lucas ', '(45) 99950-4033', 'Marechal Candido Rondon', 'PR', 'Home Office', 'maisenergia@bluesundobrasil.com.br', '2021-05-17 17:29:52'),
(158, 'Manoel Cordeiro da Silva Comercio ', 'Manoel / Josmar ', '(65) 99607-4103', 'Pontes e Lacerda', 'MT', 'Home Office', 'mmenergia@bluesundobrasi.com.br', '2021-05-17 17:30:36'),
(159, 'Marcelo Luiz de Carvalho', 'Marcelo', '(24) 98831-5922', 'Petrópolis', 'RJ', 'Home Office', 'marcelocarvalho@bluesundobrasil.com.br', '2021-05-17 17:31:39'),
(160, 'Marcos Antonio Maciel Junior ', 'Marcos', '(34) 99685-0084', 'Uberlândia', 'MG', 'Home Office', 'mmsolar@bluesundobrasil.com.br', '2021-05-17 17:32:38'),
(161, 'Marcos José Miam ', 'Marcos / Rogerio ', '(11) 99114-7614', 'Santo André', 'SP', 'Home Office', 'abcdosol@bluesundobrasil.com.br', '2021-05-17 17:33:58'),
(162, 'Maria Marcina Rojas', 'Astrogildo', '(67) 99897-7315', 'Jaraguá do Sul', 'SC', 'Home Office', 'ojeda@bluesundobrasil.com.br', '2021-05-17 17:34:53'),
(163, 'Master Telecom Ltda ', 'Wilson ', '(81) 98130-1308', 'Jaboatão dos Guararapes', 'PE', 'Home Office', 'master@bluesundobrasil.com.br', '2021-05-17 17:35:48'),
(164, 'Max Energy Ltda', 'Mario', '(11) 94121-2090', 'Varzea Paulista ', 'SP', 'Home Office', 'maxenergy@bluesundobrasil.com.br', '2021-05-17 17:37:14'),
(165, 'Mayra Bruna de Farias Santos', 'Felipe', '(82) 99810-0976', 'Palmeira dos Índios', 'AL', 'Home Office', 'mayrasantos@bluesundobrasil.com.br', '2021-05-17 17:38:06'),
(166, 'MEL - Consultoria de Negocios, Engenharia e Arquitetura ', 'Paulo Roberto', '(21) 98138-4990', 'Rio de Janeiro', 'RJ', 'Home Office', 'paulopinho@bluesundobrasil.com.br', '2021-05-17 17:39:08'),
(167, 'Minas Agrosolar Ltda', 'Emilianny', '(34) 99669-4701', 'Patos de Minas', 'MG', 'Home Office', 'minasagrosolar@bluesundobrasil.com.br', '2021-05-17 17:42:16'),
(168, 'NR Energia Solar Brasil', 'Nelson', '(15) 99627-7970', 'Sorocaba', 'SP', 'Home Office', 'nrenergiasolar@bluesundobrasil.com.br', '2021-05-17 17:44:06'),
(169, 'Oazi Engenharia e Informática LTDA', 'Artur', '(19) 99167-1919', 'Leme', 'SP', 'Home Office', 'oazi@bluesundobrasil.com.br', '2021-05-17 17:45:30'),
(170, 'Ontech Serviços Tecnicos  de Eletricidade Ltda', 'Luis/ Gustavo', '(16) 99998-4989', 'São Joaquim da Barra', 'SP', 'Home Office', 'ontech@bluesundobrasil.com.br', '2021-05-17 17:46:17'),
(171, 'Osmar marcelino da Silva', 'Osmar', '(21) 97138-8875', 'Maricá', 'RJ', 'Home Office', 'osmarsilva@bluesundobrasil.com.br', '2021-05-17 17:47:18'),
(172, 'P.S Corretora de Seguro Eireli', 'Patrícia Millena ', '(91) 98804-9432', 'Belém', 'PA', 'Home Office', 'pscorrea@bluesundobrasil.com.br', '2021-05-17 17:48:00'),
(173, 'P.S Corretora de Seguro Eireli', 'Patrícia Millena ', '(91) 98804-9432', 'Fortaleza', 'CE', 'Home Office', 'pscorrea@bluesundobrasil.com.br', '2021-05-17 17:48:38'),
(174, 'Pamela Araujo Basso ', 'Pamela ', '(51) 99145-9450', 'Novo Hamburgo', 'RS', 'Home Office', 'pamelabasso@bluesundobrasil.com.br', '2021-05-17 17:49:48'),
(175, 'Patrí­cia Albefaro Sandonato', 'PatrÃ­cia ', '(11) 96255-5468', 'Atibaia', 'SP', 'Home Office', 'universosolar@bluesundobrasil.com.br', '2021-05-17 17:50:44'),
(176, 'Patrí­cia Flores Fernandes Serviços e Comércio Elétricos', 'Patrícia', '(67) 99654-3143', 'Aquidauana', 'MS', 'Home Office', 'grandsolar@bluesundobrasil.com.br', '2021-05-17 17:51:31'),
(177, 'Paulo Alves Junior', 'Paulo', '(47) 99144-0915', 'Barra Velha', 'SC', 'Home Office', 'alves.eng@bluesundobrasil.com.br', '2021-05-17 17:52:15'),
(178, 'Petra Engenharia e Construção', 'Marcos/ Marlon ', '(19) 99135-6360', 'Maringá', 'PR', 'Home Office', 'petraengenharia@bluesundobrasil.com.br', '2021-05-17 17:54:15'),
(179, 'Petra Engenharia e Construção', 'Marcos/ Marlon ', '(19) 99135-6360', 'Uberlândia', 'MG', 'Home Office', 'petraengenharia@bluesundobrasil.com.br', '2021-05-17 17:57:40'),
(180, 'Petra Engenharia e Construção', 'Marcos/ Marlon ', '(19) 99135-6360', 'Juazeiro', 'BA', 'Home Office', 'petraengenharia@bluesundobrasil.com.br', '2021-05-17 17:58:18'),
(181, 'Pinho e Strasser Ltda', 'Leonardo', '(67) 99904-8570', 'Rio Brilhante', 'MS', 'Home Office', 'vitalsolar@bluesundobrasil.com.br', '2021-05-17 17:59:12'),
(182, 'Pronorte Projetos Inteligentes Ltda ', 'Watson ', '(67) 98476-5763', 'Campo Grande', 'MS', 'Home Office', 'watsonamorim@bluesundobrasil.com.br', '2021-05-17 18:00:08'),
(183, 'R Leão da Silva - ME', 'Rômulo', '(87) 99623-0091', 'Campina Grande', 'PB', 'Home Office', 'romulosilva@bluesundobrasil.com.br', '2021-05-17 18:01:51'),
(184, 'R Leão da Silva - ME', 'Rômulo', '(87) 99623-0091', 'Arco Verde', 'PE', 'Home Office', 'romulosilva@bluesundobrasil.com.br', '2021-05-17 18:02:36'),
(185, 'R Leão da Silva - ME', 'Rômulo', '(87) 99623-0091', 'Itabuna', 'BA', 'Home Office', 'romulosilva@bluesundobrasil.com.br', '2021-05-17 18:03:25'),
(186, 'R Leão da Silva - ME', 'Rômulo', '(87) 99623-0091', 'Floriano', 'PI', 'Home Office', 'romulosilva@bluesundobrasil.com.br', '2021-05-17 18:04:15'),
(187, 'R Leão da Silva - ME', 'Rômulo', '(87) 99623-0091', 'Teresina', 'PI', 'Home Office', 'romulosilva@bluesundobrasil.com.br', '2021-05-17 18:04:57'),
(188, 'R Leão da Silva - ME', 'Rômulo', '(87) 99623-0091', 'Recife', 'PE', 'Home Office', 'romulosilva@bluesundobrasil.com.br', '2021-05-17 18:05:42'),
(189, 'Reginaldo Gomes Martins ', 'Reginaldo', '(66) 98405-6975', 'Nova Monte Verde', 'MT', 'Home Office', 'reginaldomartins@bluesundobrasil.com.br', '2021-05-17 18:06:38'),
(190, 'Renato Almeida Ribeiro', 'Renato', '(19) 98132-5509', 'Jundiaí', 'SP', 'Home Office', 'renatoribeiro@bluesundobrasil.com.br', '2021-05-17 18:07:28'),
(191, 'Renato dos Santos ', 'Renato', '(33) 99934-1865', 'Governador Valadares', 'MG', 'Home Office', 'renatosantos@bluesundobrasil.com.br', '2021-05-17 18:08:19'),
(192, 'Roger Wellington Luiz ', 'Roger Wellington', '(19) 98133-0871', 'Campinas', 'SP', 'Home Office', 'rogerluiz@bluesundobrasil.com.br', '2021-05-17 18:09:03'),
(193, 'Romulo Mendes dos Santos ', 'Romulo / Carlos', '(21) 97209-1365', 'Duque de Caxias', 'RJ', 'Home Office', 'sunshine@bluesundobrasil.com.br', '2021-05-17 18:09:56'),
(194, 'Ronni Cristiano Carlos ', 'Ronni Cristiano', '(18) 98138-2878', 'Presidente Prudente', 'SP', 'Home Office', 'ronnicarlos@bluesundobrasil.com.br', '2021-05-17 18:10:35'),
(195, 'Rony Fernando de Lima', 'Rony', '(65) 99921-4731', 'Aricozal', 'MT', 'Home Office', 'ronyazl@bluesunsobrasil.com.br', '2021-05-17 18:12:40'),
(196, 'Roraima Comunicações LTDA - ME', 'Ronny / Jair', '(95) 3628-4776', 'Boa Vista', 'RR', 'Home Office', 'rrsolar@bluesundobrasil.com.br', '2021-05-17 18:14:52'),
(197, 'Rosangela Cristina dos Santos Barros ', 'Claudenir / Rosangela ', '(67) 99907-1262', 'Mundo Novo ', 'MS', 'Home Office', 'prosegsolar@bluesundobrasil.com.br', '2021-05-17 18:15:41'),
(198, 'Ruan Dias Tavares', 'Ruan', '(32) 99936-1624', 'Juiz de Fora', 'MG', 'Home Office', 'ruantavares@bluesundobrasil.com.br', '2021-05-17 18:16:27'),
(199, 'Ruan Dias Tavares', 'Ruan', '(32) 99936-1624', 'Macaé', 'RJ', 'Home Office', 'ruantavares@bluesundobrasil.com.br', '2021-05-17 18:17:18'),
(200, 'Saionara Muniz Ribeiro ', 'Ociel', '(54) 99965-3566', 'Esteio', 'RS', 'Home Office', 'smenergy@bluesundobrasil.com.br', '2021-05-17 18:18:11'),
(201, 'San Vidal Comercio e Serviços de Materiais Elétricos Ltd', 'Lucas ', '(75) 99920-1134', 'Santo Antonio de Jesus', 'BA', 'Home Office', 'intaltec@bluesundobrasil.com.br', '2021-05-17 18:20:33'),
(203, 'Sergio Eduardo Ferreira Lira  ', 'Sergio Eduardo', '(81) 98802-9061', 'Recife ', 'PE', 'Home Office', 'sergiolira@bluesundobrasil.com.br', '2021-05-17 18:22:32'),
(204, 'Sergio Murilo Nery ', 'Sergio Murilo ', '(13) 99785-8455', 'São Vicente', 'SP', 'Home Office', 'sergionery@bluesundobrasil.com.br', '2021-05-17 18:23:29'),
(205, 'Sidnei Lopes de Oliveira ', 'Sidnei', '(42) 99949-2769', 'Chopinzinho ', 'PR', 'Home Office', 'sidneioliveira@bluesundobrasil.com.br', '2021-05-17 18:24:29'),
(206, 'Sidney Jaime Zanetti', 'Sidney', '(19) 3792-1441', 'Americana', 'SP', 'Home Office', 'sidneyjzanetti@bluesundobrasil.com.br', '2021-05-17 18:34:30'),
(207, 'Silas Felix de Souza ', 'Silas ', '(11) 96750-6582', 'São Paulo', 'SP', 'Home Office', 'silassouza@bluesundobrasil.com.br', '2021-05-17 18:36:05'),
(208, 'Tatiane Alves Fernandes', 'Juliano', '(64) 98453-9069', 'Goiatuba', 'GO', 'Home Office', 'jtsolar@bluesundobrasil.com.br', '2021-05-17 18:37:07'),
(209, 'Thiago Vieira Gomes', 'Thiago Vieira Gomes', '(38) 99877-4979', 'Montes Claros', 'MG', 'Home Office', 'thiagogomes@bluesundobrasil.com.br', '2021-05-17 18:43:36'),
(210, 'Tijupah Engenharia Naval Ltda ', 'Edir ', '(91) 98148-9993', 'Belem', 'PA', 'Home Office', 'tijupah@bluesundobrasil.com.br', '2021-05-17 18:44:30'),
(212, 'V. H. Gomes Silva', 'Romildo', '(67) 99205-0763', 'Campo Grande', 'MS', 'Home Office', 'vhsolar@bluesundobrasil.com.br', '2021-05-17 18:46:04'),
(213, 'Valéria Ribeiro Lima', 'Valéria', '(11) 96342-8957', 'Pardinho', 'SP', 'Home Office', 'valeria.lima@bluesundobrasil.com.br', '2021-05-17 18:46:57'),
(214, 'VCL Locação de Maquinas e Consultoria Empresarial EIREl', 'Paulo César ', '(71) 98744-7620', 'Camaçari', 'BA', 'Home Office', 'lestesolar@bluesundobrasil.com.br', '2021-05-17 18:47:50'),
(215, 'Voltech Instalação e Manutenção Predial Ltda', 'Marcos', '(16) 99204-3617', 'Ribeirão Preto ', 'SP', 'Home Office', 'voltechsolar@bluesundobrasil.com.br', '2021-05-17 18:48:50'),
(216, 'Wagner da Silva ', 'Wagner da Silva ', '(24) 98805-7842', 'Angra dos Reis', 'RJ', 'Home Office', 'wagnerdasilva@bluesundobrasil.com.br', '2021-05-17 18:49:41'),
(217, 'Wagner Souza Coelho ', 'Wagner Coelho', '(11) 95893-9759', 'São Paulo ', 'SP', 'Home Office', 'wksolar@bluesundobrasil.com.br', '2021-05-17 18:50:47'),
(218, 'Wendel Barcelos Silva Eireli ', 'Wendel ', '(62) 98494-1436', 'Goianésia', 'GO', 'Home Office', 'rennovsolar@bluesundobrasil.com.br', '2021-05-17 18:51:48'),
(219, 'Werles Nogueira da Silva Souza ', 'Werles ', '(21) 97033-9481', 'Itaboraí', 'RJ', 'Home Office', 'mwd@bluesundobrasil.com.br', '2021-05-17 18:52:45'),
(220, 'Willian Carlos da Silva ', 'Willian', '(61) 98533-3395', 'Brasí­lia', 'DF', 'Home Office', 'williansilva@bluesundobrasil.com.br', '2021-05-17 18:53:44'),
(221, 'Wilson Loham Figueiredo Reis', 'Wilson Loham', '(21) 99987-9499', 'Niteroi', 'RJ', 'Home Office', 'wilsonreis@bluesundobrasil.com.br', '2021-05-17 18:54:37'),
(222, 'WP Silva Automação Industria E Comercio', 'WP Silva Automação I', '(21) 96011-4588', 'Nova Iguaçu', 'RJ', 'Home Office', 'wpautomacao@bluesundobrasil.com.br', '2021-05-17 18:55:41'),
(223, 'Christopher Andrio da Silva ', 'Christopher', '(11) 97389-6770', 'Indaiatuba', 'SP', 'Loja', 'christopher@bluesundobrasil.com.br', '2021-05-17 18:57:30'),
(224, 'Photon\'s Energia Fotovoltaico', 'Hebert', '(17) 99755-8990', 'Leme', 'SP', 'Loja', 'herbert.petri@bluesundobrasil.com.br', '2021-05-17 18:59:08'),
(225, 'R G S Comercial EIRELI ', 'Raimundo ', '(96) 98115-3411', 'MacapÃ¡', 'AP', 'Loja', 'raimundosouza@bluesundobrasil.com.br', '2021-05-17 19:00:02'),
(226, 'Sunow Negocios e Energia Ltda', 'Wagner', '(84) 99986-4378', 'Natal', 'RN', 'Loja', 'sunow@bluesundobrasil.com.br', '2021-05-17 19:00:40'),
(228, 'Super 4 Comer. Serviços Ltda ', 'José Derly', '(91) 99994-9699', 'Paragominas', 'PA', 'Loja', 'josederly@bluesundobrasil.com.br', '2021-05-17 19:02:21'),
(229, 'TSA - Comércio e Instalação de Equipamentos Elétricos', 'Marcelo ', '(51) 99836-1763', 'Camboriú', 'SC', 'Home Office', 'tsa@bluesundobrasil.com.br', '2021-05-17 19:03:20'),
(230, 'Ramilos  Construções EIRELI', 'Tiago Ismar', '(88) 99241-0722', 'Tianguá', 'CE', 'Home Office', 'ramilos@bluesundobrasil.com.br', '2021-05-17 19:04:50'),
(231, 'Tec Geração de Energia Solar Eirelli', 'Edja', '(81) 99427-4412', 'Bonito', 'PE', 'Home Office', 'tecgeracao@bluesundobrasil.com.br', '2021-05-17 19:06:52'),
(233, 'Ná­tidus Comercio e Serviços de Limpeza EIRELI', 'José Eugênio', '(11) 99658-3015', 'São Paulo', 'SP', 'Home Office', 'nitidus@bluesundobrasil.com.br', '2021-05-19 12:10:34'),
(234, 'Diego Santos de Oliveira ', 'Diego ', '(11) 96570-5071', 'Cotia', 'SP', 'Home Office', 'losolenergia@bluesundobrasil.com.br', '2021-05-19 12:23:07'),
(235, 'Takeo Fugiwara Santos ', 'Takeo', '(27) 99646-4621', 'Vila Velha', 'ES', 'Home Office', 'takeosantos@bluesundobrasil.com.br', '2021-05-19 12:34:19'),
(236, 'Joel José Santos', 'Joel', '(84) 98772-2712', 'João Pessoa', 'PB', 'Home Office', 'sunlumen@bluesundobrasil.com.br', '2021-05-19 12:38:53'),
(237, 'Micheline Araujo Cruz', 'Micheline', '(75) 99125-0794', 'Feira de Santana', 'BA', 'Home Office', 'contato.feiradesantana@bluesundobrasil.c', '2021-05-19 12:42:17'),
(238, 'Hugo Braga Santana', 'Hugo', '(61) 99988-1444', 'BrasÃ­lia', 'DF', 'Home Office', 'o2br@bluesundobrasil.com.br', '2021-05-19 12:44:30'),
(239, 'Fabiana Consoni Alves - Comercio Eletronico ', 'Fabiana', '(11) 93005-5595', 'Sorocaba', 'SP', 'Home Office', 'f.consoni@bluesundobrasil.com.br', '2021-05-19 13:01:07'),
(240, 'K & S Queiroz Energia Renovavel ', 'Kevyson ', '(68) 99232-6721', 'Ji-Parana', 'RO', 'Loja', 'kqueiroz@bluesundobrasil.com.br', '2021-05-19 13:02:17'),
(241, 'Ronaldo Reis de Carvalho ', 'Ronaldo / Inah ', '(21) 98063-7777', 'Rio de Janeiro', 'RJ', 'Home Office', 'captasol@bluesundobrasil.com.br', '2021-05-19 13:03:20'),
(242, 'Gabriela Costa ', 'Saulo / Gabriela', '(51) 99269-1425', 'Fundão', 'ES', 'Loja', 'snoenergiasolar@bluesundobrasil.com.br', '2021-05-19 13:04:46'),
(243, 'J R Dias Montagens Eletricas  ', 'JosÃ© Maria ', '(14) 99705-8035', 'Anhembi', 'SP', 'Home Office', 'jrdias@bluesundobrasil.com.br', '2021-05-19 13:05:45'),
(244, 'Gabriel Natel Bongolo Paulucio ', 'Gabriel', '(43) 98401-3526', 'Apucarana', 'PR', 'Home Office', 'gnenterpreses@bluesundobrasil.com.br', '2021-05-19 13:06:44'),
(245, 'KKS Energia Renovavel ', 'Kevyson ', '(68) 99232-6721', 'Rio Branco', 'AC', 'Loja', 'kksenergia@bluesundobrasil.com.br', '2021-05-19 13:07:25'),
(246, 'Instaladora Solaris ', 'Wagner ', '(51) 99269-1425', 'Porto Alegre', 'RS', 'Home Office', 'solaris@bluesundobrasil.com.br', '2021-05-19 13:08:13');

-- --------------------------------------------------------

--
-- Estrutura para tabela `bs_fundadores`
--

CREATE TABLE `bs_fundadores` (
  `fundadores_id` int(11) NOT NULL,
  `fundadores_titulo` varchar(50) DEFAULT NULL,
  `fundadores_subtitulo` varchar(50) DEFAULT NULL,
  `fundadores_img` varchar(50) DEFAULT NULL,
  `fundadores_texto` longtext DEFAULT NULL,
  `fundadores_data` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela com biografia dos Fundadores da Bluesun';

--
-- Despejando dados para a tabela `bs_fundadores`
--

INSERT INTO `bs_fundadores` (`fundadores_id`, `fundadores_titulo`, `fundadores_subtitulo`, `fundadores_img`, `fundadores_texto`, `fundadores_data`) VALUES
(1, 'Eng. Roberto Caurim', 'Diretor Comercial', '1.jpg', '<p>Roberto Marcel Caurim, nasceu na cidade de S&atilde;o Paulo/SP. Formou-se em Engenharia Mec&acirc;nica, com especializa&ccedil;&atilde;o em Energ&eacute;tica (Pequenas Centrais Hidrel&eacute;tricas e Termoel&eacute;tricas).&nbsp;</p>\r\n\r\n<p>Iniciou sua carreira na &aacute;rea de Refrigera&ccedil;&atilde;o Industrial, fundando o Grupo Engecomp junto ao seu s&oacute;cio, tamb&eacute;m engenheiro, Ricardo Mansour. Sempre foi um entusiasta de Energia Renov&aacute;veis, da&iacute; sua ingress&atilde;o no mercado de Energia Solar iniciada na ministra&ccedil;&atilde;o de Cursos voltados a instala&ccedil;&otilde;es.</p>\r\n\r\n<p>Hoje, Diretor Comercial da Bluesun Solar, uma das maiores Distribuidoras e Importadoras do Brasil, que traz em seu escopo a Bluesun Solar Franquias e a Bluesun Solar Distribuidora (dedicada a Integradores/Revendedores), se orgulha de seu legado de mais de quinze anos no mercado de energia, refrigera&ccedil;&atilde;o industrial e projetos.</p>\r\n', NULL),
(2, 'Eng. Ricardo Mansour', 'Diretor Técnico', '2.jpg', '<p>Ricardo Mansour, nasceu na cidade de S&atilde;o Paulo/SP. Formou-se em Engenharia Mecatr&ocirc;nica, atuando por quase 30 anos em solu&ccedil;&otilde;es t&eacute;cnicas para ind&uacute;strias, como projetos de automa&ccedil;&atilde;o e sistemas para controle de equipamentos, opera&ccedil;&atilde;o e manuten&ccedil;&atilde;o em diversos tipos de m&aacute;quinas. Com especificidade na &aacute;rea de refrigera&ccedil;&atilde;o, fundou o Grupo Engecomp junto ao seu s&oacute;cio, tamb&eacute;m engenheiro, Roberto Caurim.&nbsp;</p>\r\n\r\n<p>Com empresa constitu&iacute;da a 22 anos, em 2012 ingressou no setor de energia solar, buscando cont&iacute;nua capacita&ccedil;&atilde;o no setor, agregando todo Know-How adquirido em anos de experi&ecirc;ncia.</p>\r\n\r\n<p>Hoje, Diretor T&eacute;cnico da Bluesun Solar, uma das maiores Distribuidoras e Importadoras do Brasil, que traz em seu escopo a Bluesun Solar Franquias e a Bluesun Solar Distribuidora (dedicada a Integradores/Revendedores), se orgulha de seu legado de anos no mercado de energia, refrigera&ccedil;&atilde;o industrial e projetos.</p>\r\n', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `bs_galeria`
--

CREATE TABLE `bs_galeria` (
  `galeria_id` int(11) NOT NULL,
  `galeria_album_id` int(11) NOT NULL,
  `galeria_img` varchar(50) DEFAULT NULL,
  `date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela com Fotos da Bluesun';

--
-- Despejando dados para a tabela `bs_galeria`
--

INSERT INTO `bs_galeria` (`galeria_id`, `galeria_album_id`, `galeria_img`, `date`) VALUES
(103, 2, 'img/galeria/20210506_140452.jpg', '2021-05-21 19:01:03'),
(104, 2, 'img/galeria/20210506_140438.jpg', '2021-05-21 19:01:04'),
(105, 2, 'img/galeria/20210506_140512.jpg', '2021-05-21 19:01:05'),
(106, 2, 'img/galeria/20210506_140521.jpg', '2021-05-21 19:01:06'),
(107, 2, 'img/galeria/20210506_155429.jpg', '2021-05-21 19:01:07'),
(108, 2, 'img/galeria/20210506_155424.jpg', '2021-05-21 19:01:07'),
(109, 2, 'img/galeria/20210506_155551.jpg', '2021-05-21 19:01:08'),
(110, 2, 'img/galeria/20210506_155559.jpg', '2021-05-21 19:01:09'),
(111, 2, 'img/galeria/20210506_155605.jpg', '2021-05-21 19:01:10'),
(112, 2, 'img/galeria/20210506_155620.jpg', '2021-05-21 19:01:11'),
(113, 2, 'img/galeria/20210506_155638.jpg', '2021-05-21 19:01:12'),
(114, 2, 'img/galeria/20210506_165246.jpg', '2021-05-21 19:01:13'),
(115, 2, 'img/galeria/20210506_165301.jpg', '2021-05-21 19:01:14'),
(116, 2, 'img/galeria/20210506_165319.jpg', '2021-05-21 19:01:16'),
(117, 2, 'img/galeria/20210506_165331.jpg', '2021-05-21 19:01:16'),
(118, 2, 'img/galeria/20210506_165339.jpg', '2021-05-21 19:01:18'),
(119, 2, 'img/galeria/20210506_165343.jpg', '2021-05-21 19:01:19'),
(120, 2, 'img/galeria/20210506_165759.jpg', '2021-05-21 19:01:21'),
(121, 2, 'img/galeria/20210506_165803.jpg', '2021-05-21 19:01:22'),
(122, 2, 'img/galeria/20210506_165901.jpg', '2021-05-21 19:01:24'),
(123, 2, 'img/galeria/20210506_165911.jpg', '2021-05-21 19:01:27'),
(124, 2, 'img/galeria/20210507_161616.jpg', '2021-05-21 19:01:33'),
(125, 2, 'img/galeria/20210507_161804.jpg', '2021-05-21 19:01:40'),
(126, 2, 'img/galeria/20210507_161914.jpg', '2021-05-21 19:01:43'),
(127, 2, 'img/galeria/20210507_162009.jpg', '2021-05-21 19:01:43'),
(128, 2, 'img/galeria/20210507_162018.jpg', '2021-05-21 19:01:45'),
(129, 2, 'img/galeria/20210507_171445.jpg', '2021-05-21 19:01:45'),
(130, 2, 'img/galeria/20210510_150050.jpg', '2021-05-21 19:01:47'),
(131, 2, 'img/galeria/20210510_150056.jpg', '2021-05-21 19:01:47'),
(132, 2, 'img/galeria/20210511_164242.jpg', '2021-05-21 19:01:48'),
(133, 2, 'img/galeria/20210511_164254.jpg', '2021-05-21 19:01:49'),
(134, 2, 'img/galeria/20210511_172539.jpg', '2021-05-21 19:01:50'),
(135, 2, 'img/galeria/20210511_175053.jpg', '2021-05-21 19:01:50'),
(136, 2, 'img/galeria/20210511_175058.jpg', '2021-05-21 19:01:51'),
(137, 2, 'img/galeria/20210511_175056.jpg', '2021-05-21 19:01:51'),
(138, 2, 'img/galeria/20210517_152446.jpg', '2021-05-21 19:01:52'),
(139, 2, 'img/galeria/20210517_152520.jpg', '2021-05-21 19:01:53'),
(140, 2, 'img/galeria/20210518_112351.jpg', '2021-05-21 19:01:53'),
(141, 2, 'img/galeria/20210518_112328.jpg', '2021-05-21 19:01:54'),
(142, 2, 'img/galeria/20210518_112814.jpg', '2021-05-21 19:01:54'),
(143, 2, 'img/galeria/20210518_112404.jpg', '2021-05-21 19:01:55'),
(144, 2, 'img/galeria/20210518_112822.jpg', '2021-05-21 19:01:55'),
(145, 2, 'img/galeria/20210519_100756.jpg', '2021-05-21 19:01:56'),
(146, 2, 'img/galeria/20210519_100810.jpg', '2021-05-21 19:01:56'),
(147, 2, 'img/galeria/20210519_100813.jpg', '2021-05-21 19:01:57'),
(148, 2, 'img/galeria/20210519_100847.jpg', '2021-05-21 19:01:58'),
(149, 2, 'img/galeria/20210519_100849.jpg', '2021-05-21 19:01:58'),
(150, 2, 'img/galeria/20210519_100855.jpg', '2021-05-21 19:01:58'),
(151, 2, 'img/galeria/20210519_100856.jpg', '2021-05-21 19:01:59'),
(152, 2, 'img/galeria/20210519_101026.jpg', '2021-05-21 19:02:00'),
(153, 2, 'img/galeria/20210519_101041.jpg', '2021-05-21 19:02:00'),
(154, 2, 'img/galeria/20210519_101051.jpg', '2021-05-21 19:02:01'),
(155, 2, 'img/galeria/20210519_101058.jpg', '2021-05-21 19:02:01'),
(156, 2, 'img/galeria/20210519_142756.jpg', '2021-05-21 19:02:02'),
(157, 2, 'img/galeria/20210519_142743.jpg', '2021-05-21 19:02:02'),
(158, 2, 'img/galeria/20210519_142808.jpg', '2021-05-21 19:02:03'),
(159, 2, 'img/galeria/20210519_160608.jpg', '2021-05-21 19:02:03'),
(160, 2, 'img/galeria/20210519_164851.jpg', '2021-05-21 19:02:03'),
(161, 2, 'img/galeria/20210519_165022.jpg', '2021-05-21 19:02:04'),
(162, 2, 'img/galeria/20210519_165918.jpg', '2021-05-21 19:02:04'),
(163, 2, 'img/galeria/20210519_165933.jpg', '2021-05-21 19:02:04'),
(164, 2, 'img/galeria/20210519_165944.jpg', '2021-05-21 19:02:05'),
(165, 2, 'img/galeria/20210519_170002.jpg', '2021-05-21 19:02:05'),
(166, 2, 'img/galeria/20210519_170018.jpg', '2021-05-21 19:02:05'),
(167, 2, 'img/galeria/20210519_170030.jpg', '2021-05-21 19:02:05'),
(168, 2, 'img/galeria/20210519_170038.jpg', '2021-05-21 19:02:06'),
(169, 2, 'img/galeria/20210519_170050.jpg', '2021-05-21 19:02:06'),
(170, 2, 'img/galeria/20210519_170114.jpg', '2021-05-21 19:02:07'),
(171, 2, 'img/galeria/20210519_170128.jpg', '2021-05-21 19:02:07'),
(172, 2, 'img/galeria/20210519_170138.jpg', '2021-05-21 19:02:07'),
(173, 2, 'img/galeria/20210519_170150.jpg', '2021-05-21 19:02:08'),
(174, 2, 'img/galeria/20210519_170201.jpg', '2021-05-21 19:02:08'),
(175, 2, 'img/galeria/20210519_170236.jpg', '2021-05-21 19:02:09'),
(176, 2, 'img/galeria/20210519_170256.jpg', '2021-05-21 19:02:09'),
(177, 2, 'img/galeria/20210519_170311.jpg', '2021-05-21 19:02:10'),
(178, 2, 'img/galeria/20210519_170332.jpg', '2021-05-21 19:02:10'),
(179, 2, 'img/galeria/20210519_170359.jpg', '2021-05-21 19:02:11'),
(180, 2, 'img/galeria/20210519_170448.jpg', '2021-05-21 19:02:11'),
(181, 2, 'img/galeria/20210519_170450.jpg', '2021-05-21 19:02:11'),
(182, 2, 'img/galeria/20210520_083105.jpg', '2021-05-21 19:02:13'),
(183, 2, 'img/galeria/20210520_083114.jpg', '2021-05-21 19:02:13'),
(184, 2, 'img/galeria/20210520_083128.jpg', '2021-05-21 19:02:14'),
(185, 2, 'img/galeria/20210520_083144.jpg', '2021-05-21 19:02:15'),
(186, 2, 'img/galeria/20210520_083152.jpg', '2021-05-21 19:02:16'),
(187, 2, 'img/galeria/20210520_083644.jpg', '2021-05-21 19:02:17'),
(188, 2, 'img/galeria/20210520_084956.jpg', '2021-05-21 19:02:17'),
(189, 2, 'img/galeria/20210520_084958.jpg', '2021-05-21 19:02:18'),
(190, 2, 'img/galeria/20210520_084957.jpg', '2021-05-21 19:02:18'),
(191, 1, 'img/galeria/20210222_114137.jpg', '2021-05-21 20:26:49'),
(192, 1, 'img/galeria/20210222_114041.jpg', '2021-05-21 20:26:49'),
(193, 1, 'img/galeria/20210224_094817.jpg', '2021-05-21 20:26:50'),
(194, 1, 'img/galeria/20210224_094652.jpg', '2021-05-21 20:26:50'),
(195, 1, 'img/galeria/20210316_142144.jpg', '2021-05-21 20:26:51'),
(196, 1, 'img/galeria/20210316_141925.jpg', '2021-05-21 20:26:51'),
(197, 1, 'img/galeria/20210319_154716.jpg', '2021-05-21 20:26:52'),
(198, 1, 'img/galeria/20210319_154548.jpg', '2021-05-21 20:26:52'),
(199, 1, 'img/galeria/20210319_154723.jpg', '2021-05-21 20:26:53'),
(200, 1, 'img/galeria/20210319_154852.jpg', '2021-05-21 20:26:53'),
(201, 1, 'img/galeria/20210319_155151.jpg', '2021-05-21 20:26:54'),
(202, 1, 'img/galeria/20210319_155253.jpg', '2021-05-21 20:26:54'),
(203, 1, 'img/galeria/20210319_155327.jpg', '2021-05-21 20:26:55'),
(204, 1, 'img/galeria/20210406_090747.jpg', '2021-05-21 20:26:55'),
(205, 1, 'img/galeria/20210415_102055.jpg', '2021-05-21 20:26:56'),
(206, 1, 'img/galeria/20210415_102130.jpg', '2021-05-21 20:26:56'),
(207, 1, 'img/galeria/20210428_110712.jpg', '2021-05-21 20:26:57'),
(208, 1, 'img/galeria/20210428_110740.jpg', '2021-05-21 20:26:58'),
(209, 1, 'img/galeria/20210510_131359.jpg', '2021-05-21 20:26:58'),
(210, 1, 'img/galeria/20210510_131320.jpg', '2021-05-21 20:26:59'),
(211, 1, 'img/galeria/20210510_131501.jpg', '2021-05-21 20:26:59'),
(212, 1, 'img/galeria/20210520_112255.jpg', '2021-05-21 20:27:00'),
(213, 1, 'img/galeria/20210520_112300.jpg', '2021-05-21 20:27:00'),
(214, 1, 'img/galeria/20210520_112314.jpg', '2021-05-21 20:27:01'),
(215, 1, 'img/galeria/20210520_112315.jpg', '2021-05-21 20:27:01'),
(216, 1, 'img/galeria/20210520_112419.jpg', '2021-05-21 20:27:02'),
(217, 1, 'img/galeria/20210520_112420.jpg', '2021-05-21 20:27:02'),
(218, 1, 'img/galeria/20210520_112453.jpg', '2021-05-21 20:27:03'),
(219, 1, 'img/galeria/20210520_112807.jpg', '2021-05-21 20:27:04'),
(220, 1, 'img/galeria/20210520_112855.jpg', '2021-05-21 20:27:04'),
(221, 1, 'img/galeria/20210520_113225.jpg', '2021-05-21 20:27:04'),
(222, 1, 'img/galeria/20210520_113249.jpg', '2021-05-21 20:27:05'),
(223, 1, 'img/galeria/20210520_113250.jpg', '2021-05-21 20:27:06'),
(224, 1, 'img/galeria/1.png', '2021-05-26 11:00:33');

-- --------------------------------------------------------

--
-- Estrutura para tabela `bs_historia`
--

CREATE TABLE `bs_historia` (
  `historia_id` int(11) NOT NULL,
  `historia_texto` longtext DEFAULT NULL,
  `historia_data` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela com descrição da História da Bluesun';

--
-- Despejando dados para a tabela `bs_historia`
--

INSERT INTO `bs_historia` (`historia_id`, `historia_texto`, `historia_data`) VALUES
(1, '<p>A Bluesun Solar do Brasil teve seu in&iacute;cio em 2008, quando s&oacute;&nbsp;existiam sistemas Off Grid. Nossa sede, Centro de Distribui&ccedil;&atilde;o Sudeste, est&aacute;&nbsp;localizada em Limeira no interior de S&atilde;o Paulo. Fazemos parte do Grupo Engecomp, que foi fundado em 1998 pelos Engenheiros Roberto Caurim e Ricardo Mansour e atuamos no mercado oferecendo solu&ccedil;&otilde;es de engenharia e energia.</p>\r\n\r\n<p>A Bluesun &eacute;&nbsp;uma das maiores Importadoras e Distribuidoras de Equipamentos Fotovoltaicos do Brasil, com mais de 4.500 projetos instalados em todo o pa&iacute;s, desde sistemas fotovoltaicos residenciais a grandes usinas.</p>\r\n\r\n<p>Al&eacute;m da Distribui&ccedil;&atilde;o de Equipamentos, nosso escopo de fornecimento &eacute;&nbsp;composto pela Bluesun Solar Franquias, com Franqueados em todas as regi&otilde;es do Brasil, al&eacute;m de mais de 20 mil Integradores e Revendedores cadastrados em nossa Plataforma de Or&ccedil;amentos.</p>\r\n\r\n<p>Possu&iacute;mos tamb&eacute;m a Bluesun Treinamentos, uma divis&atilde;o da Bluesun dedicada a treinar e aperfei&ccedil;oar os conhecimentos t&eacute;cnicos de nossos Revendedores, Integradores e Franqueados com um curso totalmente gratuito no maior Centro de Treinamentos do Brasil, com profissionais qualificados e equipamentos de ponta.</p>\r\n', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `bs_marcas`
--

CREATE TABLE `bs_marcas` (
  `marcas_id` int(11) NOT NULL,
  `marcas_titulo` varchar(50) DEFAULT NULL,
  `marcas_subtitulo` varchar(50) DEFAULT NULL,
  `marcas_img` varchar(50) DEFAULT NULL,
  `marcas_url` varchar(50) DEFAULT NULL,
  `marcas_urlbotao` varchar(50) DEFAULT NULL,
  `marcas_urldatasheets` varchar(50) DEFAULT NULL,
  `marcas_datasheetsbotao` varchar(50) DEFAULT NULL,
  `marcas_data` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela com logo dos fornecedores';

--
-- Despejando dados para a tabela `bs_marcas`
--

INSERT INTO `bs_marcas` (`marcas_id`, `marcas_titulo`, `marcas_subtitulo`, `marcas_img`, `marcas_url`, `marcas_urlbotao`, `marcas_urldatasheets`, `marcas_datasheetsbotao`, `marcas_data`) VALUES
(13, 'Ulica Solar', NULL, '924652.png', 'http://www.ulicasolar.com/', NULL, NULL, NULL, NULL),
(15, 'Canadian Solar', NULL, '805908.png', 'https://www.canadiansolar.com/br/', NULL, NULL, NULL, NULL),
(16, 'FotoFIX', NULL, '130597.png', 'http://fotofix.com.br/', NULL, NULL, NULL, NULL),
(17, 'SAJ', NULL, '882259.png', 'http://www.saj-electric.com/', NULL, NULL, NULL, NULL),
(18, 'Fronius', NULL, '359298.png', 'https://www.fronius.com/pt-br/brasil', NULL, NULL, NULL, NULL),
(19, 'Growatt', NULL, '512862.png', 'https://www.growatt-america.com/', NULL, NULL, NULL, NULL),
(20, 'Proauto', NULL, '193113.png', 'http://www.proauto-electric.com/solar/', NULL, NULL, NULL, NULL),
(25, 'ZHShine Solar', NULL, '316946.png', 'https://pt.znshinesolar.com/', NULL, NULL, NULL, NULL),
(26, 'DAH Solar', NULL, '975524.png', 'https://pt.dahsolarpv.com/', NULL, NULL, NULL, NULL),
(27, 'NTCSomar ', NULL, '760851.png', 'https://www.ntcsomar.com.br/', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `bs_redessociais`
--

CREATE TABLE `bs_redessociais` (
  `redes_id` int(11) NOT NULL,
  `redes_icone` varchar(50) DEFAULT NULL,
  `redes_nome` varchar(50) DEFAULT NULL,
  `redes_url` varchar(50) DEFAULT NULL,
  `redes_data` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela de Redes Sociais';

--
-- Despejando dados para a tabela `bs_redessociais`
--

INSERT INTO `bs_redessociais` (`redes_id`, `redes_icone`, `redes_nome`, `redes_url`, `redes_data`) VALUES
(1, 'facebook', 'Facebook', 'https://www.facebook.com/bluesunsolardobrasil', '2021-05-04 17:46:18'),
(2, 'instagram', 'Instagram', 'https://www.instagram.com/bluesunsolar/', '2021-05-04 17:46:43'),
(3, 'twitter', 'Twitter', 'https://twitter.com/bluesunsolarbr', '2021-05-04 17:47:20'),
(4, 'linkedin', 'LinkedIn', 'https://www.linkedin.com/in/bluesundobrasil/', '2021-05-04 17:47:45'),
(5, 'youtube', 'Youtube', 'https://www.youtube.com/channel/UCw89FtaMAwIyCgMLN', '2021-05-04 17:48:09');

-- --------------------------------------------------------

--
-- Estrutura para tabela `bs_slide`
--

CREATE TABLE `bs_slide` (
  `slide_id` int(11) NOT NULL,
  `slide_titulo` varchar(255) DEFAULT NULL,
  `slide_subtitulo` varchar(50) DEFAULT NULL,
  `slide_texto` tinytext DEFAULT NULL,
  `slide_url` varchar(50) DEFAULT NULL,
  `slide_img` varchar(50) DEFAULT NULL,
  `slide_data` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela das informações dos Slides';

--
-- Despejando dados para a tabela `bs_slide`
--

INSERT INTO `bs_slide` (`slide_id`, `slide_titulo`, `slide_subtitulo`, `slide_texto`, `slide_url`, `slide_img`, `slide_data`) VALUES
(1, 'Uma das maiores<br><span>Importadoras e Distribuidoras</span><br>de Sistemas Fotovoltaicos do Brasil', 'Conheça a Bluesun Solar', 'Além de um enorme estoque à  pronta entrega, você ainda conta com o menor preço do Brasil em sistemas fotovoltaicos!', 'https://www.youtube.com/watch?v=O0ZZZlAjTEU', NULL, NULL);

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
(1, 'Administrador', 1, '2019-04-06 21:44:55', NULL);

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
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `recuperar_senha` varchar(45) DEFAULT NULL,
  `chave_descadastro` varchar(45) DEFAULT NULL,
  `id_nivacesso` int(11) DEFAULT 1,
  `id_situacoes` int(11) DEFAULT 1,
  `userPic` varchar(100) DEFAULT NULL,
  `datacad` timestamp NOT NULL DEFAULT current_timestamp(),
  `datamod` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `recuperar_senha`, `chave_descadastro`, `id_nivacesso`, `id_situacoes`, `userPic`, `datacad`, `datamod`) VALUES
(1, 'Claudemir da Silva Lopes', 'claumirlopes@gmail.com', 'ace51cece9b49cb60d910b9f231cc88f', NULL, NULL, 1, 1, 'claudemir.jpg', '2021-05-12 12:22:39', '2021-04-14 12:04:45'),
(2, 'Daiane Vidal', 'daiane@admin.com', 'e4a6abe148889382f90ccfdbba315721', NULL, NULL, 1, 1, '682896.png', '2021-05-07 20:18:23', '2021-04-22 15:04:13'),
(7, 'Patricia Pereira', 'franquias@bluesundobrasil.com.br', 'c9bbb7056c41468e59c1cd055312a478', NULL, NULL, 2, 1, '968291.png', '2021-05-21 11:40:24', NULL),
(8, 'Thaisy Pereira', 'franquias5@bluesundobrasil.com.br', '2b98ea5d135cf2a3ccbe8e5360fdad47', NULL, NULL, 2, 1, '640709.png', '2021-05-21 11:41:53', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `videos`
--

CREATE TABLE `videos` (
  `id_video` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `autor` varchar(100) DEFAULT NULL,
  `url` varchar(200) DEFAULT NULL,
  `imagem` varchar(200) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabela da página de vídeos do site da Bluesun Solar do Brasil';

--
-- Despejando dados para a tabela `videos`
--

INSERT INTO `videos` (`id_video`, `titulo`, `autor`, `url`, `imagem`, `created`) VALUES
(3, 'Estoque cheio para atender o Brasil', 'Daniel Chermont', 'NKCST5Tjfww', '933209.png', '2021-05-21 19:14:56'),
(4, 'Menores preços, melhores marcas', 'Daniel Chermont', 'KwWwi5PzimE', '437372.png', '2021-05-21 19:16:47');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `bs_album`
--
ALTER TABLE `bs_album`
  ADD PRIMARY KEY (`album_id`) USING BTREE;

--
-- Índices de tabela `bs_contato`
--
ALTER TABLE `bs_contato`
  ADD PRIMARY KEY (`contato_id`);

--
-- Índices de tabela `bs_datasheet`
--
ALTER TABLE `bs_datasheet`
  ADD PRIMARY KEY (`datasheet_id`),
  ADD KEY `FK1_datasheet_marca` (`datasheet_marca_id`);

--
-- Índices de tabela `bs_divisoes`
--
ALTER TABLE `bs_divisoes`
  ADD PRIMARY KEY (`divisoes_id`);

--
-- Índices de tabela `bs_franqueados`
--
ALTER TABLE `bs_franqueados`
  ADD PRIMARY KEY (`id_franqueado`);

--
-- Índices de tabela `bs_fundadores`
--
ALTER TABLE `bs_fundadores`
  ADD PRIMARY KEY (`fundadores_id`);

--
-- Índices de tabela `bs_galeria`
--
ALTER TABLE `bs_galeria`
  ADD PRIMARY KEY (`galeria_id`),
  ADD KEY `FK1_album_galeria` (`galeria_album_id`);

--
-- Índices de tabela `bs_historia`
--
ALTER TABLE `bs_historia`
  ADD PRIMARY KEY (`historia_id`);

--
-- Índices de tabela `bs_marcas`
--
ALTER TABLE `bs_marcas`
  ADD PRIMARY KEY (`marcas_id`);

--
-- Índices de tabela `bs_redessociais`
--
ALTER TABLE `bs_redessociais`
  ADD PRIMARY KEY (`redes_id`);

--
-- Índices de tabela `bs_slide`
--
ALTER TABLE `bs_slide`
  ADD PRIMARY KEY (`slide_id`);

--
-- Índices de tabela `niveis_acessos`
--
ALTER TABLE `niveis_acessos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `situacoes_usuarios`
--
ALTER TABLE `situacoes_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_usuarios_id` (`id_nivacesso`),
  ADD KEY `fk_usuarios2_id` (`id_situacoes`);

--
-- Índices de tabela `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id_video`) USING BTREE;

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `bs_album`
--
ALTER TABLE `bs_album`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `bs_contato`
--
ALTER TABLE `bs_contato`
  MODIFY `contato_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `bs_datasheet`
--
ALTER TABLE `bs_datasheet`
  MODIFY `datasheet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT de tabela `bs_divisoes`
--
ALTER TABLE `bs_divisoes`
  MODIFY `divisoes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `bs_franqueados`
--
ALTER TABLE `bs_franqueados`
  MODIFY `id_franqueado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT de tabela `bs_fundadores`
--
ALTER TABLE `bs_fundadores`
  MODIFY `fundadores_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `bs_galeria`
--
ALTER TABLE `bs_galeria`
  MODIFY `galeria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT de tabela `bs_historia`
--
ALTER TABLE `bs_historia`
  MODIFY `historia_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `bs_marcas`
--
ALTER TABLE `bs_marcas`
  MODIFY `marcas_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de tabela `bs_redessociais`
--
ALTER TABLE `bs_redessociais`
  MODIFY `redes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `bs_slide`
--
ALTER TABLE `bs_slide`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `niveis_acessos`
--
ALTER TABLE `niveis_acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `situacoes_usuarios`
--
ALTER TABLE `situacoes_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `videos`
--
ALTER TABLE `videos`
  MODIFY `id_video` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `bs_datasheet`
--
ALTER TABLE `bs_datasheet`
  ADD CONSTRAINT `FK1_datasheet_marca` FOREIGN KEY (`datasheet_marca_id`) REFERENCES `bs_marcas` (`marcas_id`);

--
-- Restrições para tabelas `bs_galeria`
--
ALTER TABLE `bs_galeria`
  ADD CONSTRAINT `FK1_album_galeria` FOREIGN KEY (`galeria_album_id`) REFERENCES `bs_album` (`album_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
