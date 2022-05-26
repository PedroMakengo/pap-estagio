-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Maio-2022 às 22:47
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `moestagio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nome_admin` varchar(50) DEFAULT NULL,
  `email_admin` varchar(50) DEFAULT NULL,
  `senha_admin` varchar(50) DEFAULT NULL,
  `foto_admin` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nome_admin`, `email_admin`, `senha_admin`, `foto_admin`) VALUES
(1, 'Mauro Bengue', 'maurobengue@gmail.com', 'ec6a6536ca304edf844d1d248a4f08dc', 'positive-black-adult-man-makes-yes-gesture-clenches-fists-feels-like-champion-or-winner-wears-casual-black-t-shirt-isolated-over-vivid-orange-wall.jpg'),
(2, 'Eduardo Jamba', 'jamba123@gmail.com', 'ec6a6536ca304edf844d1d248a4f08dc', 'mauro.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_aluno`
--

CREATE TABLE `tb_aluno` (
  `id_aluno` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `numero_processo` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `foto` varchar(220) DEFAULT NULL,
  `sexo` varchar(50) DEFAULT NULL,
  `contacto` int(9) DEFAULT NULL,
  `estado_aluno` int(2) DEFAULT NULL,
  `escola_frequenta` varchar(50) NOT NULL,
  `data_registro_aluno` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_aluno`
--

INSERT INTO `tb_aluno` (`id_aluno`, `nome`, `numero_processo`, `email`, `senha`, `foto`, `sexo`, `contacto`, `estado_aluno`, `escola_frequenta`, `data_registro_aluno`) VALUES
(2, 'Eduardo Jamba', '1902', 'jamba@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'create-2.jpg', 'M', 921502912, 0, '', '2022-01-16 15:58:47'),
(20, 'Mario Domingos António', '12416', 'mariodomingos@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'blithesome-student-green-t-shirt-posing-with-laptop-indoor-photo-amazed-male-freelancer-isolated.jpg', 'M', 9210000, NULL, 'ITEL - Instituto Nacional de Telecomunicações', NULL),
(21, 'Amadeu Augusto', '443', 'amadeuaugusto@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', '4.jpg', 'M', 9210000, NULL, '', NULL),
(22, 'Rogerio Martins', '10042', 'rogeriomartins@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'estudante-africano.webp', 'M', 92150222, NULL, '', NULL),
(23, 'Márcio Mateus', '9301', 'marcio@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', '', 'M', 9210000, NULL, '', NULL),
(24, 'Ana Maria ', '018363', 'ana@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'positive-black-adult-man-makes-yes-gesture-clenches-fists-feels-like-champion-or-winner-wears-casual-black-t-shirt-isolated-over-vivid-orange-wall.jpg', 'F', 921000038, NULL, '', NULL),
(25, 'Vitor Miguel', '5200', 'vitormiguel@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'african-student-in-red-attire-posing-with-interested-smile-good-humoured-black-man-in-glasses-holding-books-and-expressing-happiness.jpg', 'M', 9210000, NULL, '', NULL),
(26, 'Manuel dos Santos', '0', 'manuelsantos@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', NULL, NULL, NULL, NULL, '', NULL),
(29, 'Jonas', '0', 'jonas@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', NULL, NULL, 0, 0, 'Nenhuma', '2022-05-25 17:45:58'),
(30, 'Antónia Eduardo', '0', 'antoniaeduardo@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', NULL, NULL, 0, 0, '', '2022-05-25 17:46:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_atribuir_tarefa`
--

CREATE TABLE `tb_atribuir_tarefa` (
  `id_atribuir_tarefa` int(11) NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `id_aluno` int(11) DEFAULT NULL,
  `data_entrega` date DEFAULT NULL,
  `data_entregada` date DEFAULT NULL,
  `arquivo_tarefa_enviado` varchar(500) DEFAULT NULL,
  `arquivo_tarefa_recibo` varchar(500) DEFAULT '0',
  `tema` varchar(50) NOT NULL,
  `descricao_tarefa` text DEFAULT NULL,
  `estado_tarefa` int(1) NOT NULL,
  `data_registro_tarefa` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_atribuir_tarefa`
--

INSERT INTO `tb_atribuir_tarefa` (`id_atribuir_tarefa`, `id_empresa`, `id_aluno`, `data_entrega`, `data_entregada`, `arquivo_tarefa_enviado`, `arquivo_tarefa_recibo`, `tema`, `descricao_tarefa`, `estado_tarefa`, `data_registro_tarefa`) VALUES
(8, 3, 20, '2023-06-20', '2040-02-20', 'cv ndonge.pdf', 'cv ndonge.pdf', 'Criar uma caderneta Online', 'Testando', 1, '2022-05-21 17:05:11'),
(10, 3, 24, '2022-04-02', '2022-04-20', 'cv ndonge.pdf', 'cv ndonge.pdf', 'Teste', 'gfafa', 1, '2022-05-25 16:59:17'),
(11, 3, 24, '2022-02-20', NULL, 'cv ndonge.pdf', '0', 'Entregar', 'Terminando tudo', 0, '2022-05-25 17:07:30'),
(12, 3, 25, '2022-06-29', '2022-06-30', 'cv ndonge.pdf', 'cv ndonge.pdf', 'Trabalhar no relatório de venda semanal', 'Tens que ser sério ao trabalhar nesta atividade', 1, '2022-05-25 17:22:32');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_candidatura_vaga`
--

CREATE TABLE `tb_candidatura_vaga` (
  `id_candidatura` int(11) NOT NULL,
  `id_aluno` int(11) DEFAULT NULL,
  `id_vaga_estagio` int(11) DEFAULT NULL,
  `data_registro_candidatura` datetime DEFAULT NULL,
  `estado_candidatura` int(2) DEFAULT NULL,
  `motivacao_candidatura` text NOT NULL,
  `curriculo` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_candidatura_vaga`
--

INSERT INTO `tb_candidatura_vaga` (`id_candidatura`, `id_aluno`, `id_vaga_estagio`, `data_registro_candidatura`, `estado_candidatura`, `motivacao_candidatura`, `curriculo`) VALUES
(20, 23, 7, '2022-05-25 16:49:13', 1, 'asdhf', 'cv ndonge.pdf'),
(21, 24, 7, '2022-05-25 16:51:19', 1, 'FDFA', ''),
(22, 25, 28, '2022-05-25 17:19:52', 1, 'Estou muito interessado nesta vaga', 'cv ndonge.pdf');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_emissao_declaracao`
--

CREATE TABLE `tb_emissao_declaracao` (
  `id_declaracao` int(11) NOT NULL,
  `id_aluno` int(11) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `data_emissao` datetime DEFAULT NULL,
  `estado_emissao` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_emissao_declaracao`
--

INSERT INTO `tb_emissao_declaracao` (`id_declaracao`, `id_aluno`, `id_empresa`, `data_emissao`, `estado_emissao`) VALUES
(2, 20, 3, '2022-05-21 17:29:24', 0),
(3, 24, 3, '2022-05-25 16:55:31', 0),
(4, 25, 3, '2022-05-25 17:21:06', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_empresa`
--

CREATE TABLE `tb_empresa` (
  `id_empresa` int(11) NOT NULL,
  `nome_empresa` varchar(50) DEFAULT NULL,
  `email_empresa` varchar(50) DEFAULT NULL,
  `senha_empresa` varchar(50) DEFAULT NULL,
  `nif` varchar(50) DEFAULT NULL,
  `localizacao` varchar(50) DEFAULT NULL,
  `contacto` varchar(50) DEFAULT NULL,
  `data_registro_empresa` datetime DEFAULT NULL,
  `responsavel_empresa` varchar(50) DEFAULT NULL,
  `foto` varchar(250) NOT NULL,
  `area_atuacao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_empresa`
--

INSERT INTO `tb_empresa` (`id_empresa`, `nome_empresa`, `email_empresa`, `senha_empresa`, `nif`, `localizacao`, `contacto`, `data_registro_empresa`, `responsavel_empresa`, `foto`, `area_atuacao`) VALUES
(3, 'Sistec', 'sistec@gmail.com', 'ec6a6536ca304edf844d1d248a4f08dc', '3000', 'Mutamba', '9210000', '2022-01-22 07:10:48', 'Freelancer', 'positive-black-adult-man-makes-yes-gesture-clenches-fists-feels-like-champion-or-winner-wears-casual-black-t-shirt-isolated-over-vivid-orange-wall.jpg', 'Testando'),
(8, 'Marketing Host', 'marketinghost@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', '10420028232', 'Luanda, Viana', '932001110', '2022-05-24 08:12:00', 'António Vicente', '8.png', 'Marketing Digital'),
(9, 'KiamySoft', 'kiamysoft@gmail.com', 'ec6a6536ca304edf844d1d248a4f08dc', '1143430', 'Mutamba', '921502171', '2022-05-25 16:08:10', 'Eduardo Jamba', 'testando-foto.png', 'Testando');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_relatorio_estagio`
--

CREATE TABLE `tb_relatorio_estagio` (
  `id_relatorio` int(11) NOT NULL,
  `id_aluno` int(11) DEFAULT NULL,
  `arquivo_entrega` varchar(220) DEFAULT NULL,
  `estado_relatorio` int(2) DEFAULT NULL,
  `valor_relatorio` int(2) DEFAULT NULL,
  `data_registro_relatorio` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_relatorio_estagio`
--

INSERT INTO `tb_relatorio_estagio` (`id_relatorio`, `id_aluno`, `arquivo_entrega`, `estado_relatorio`, `valor_relatorio`, `data_registro_relatorio`) VALUES
(1, 20, NULL, 0, 0, '2022-05-21 19:55:50'),
(2, 24, NULL, 0, 0, '2022-05-25 16:54:49'),
(3, 25, NULL, 0, 0, '2022-05-25 17:24:15');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_vaga_estagio`
--

CREATE TABLE `tb_vaga_estagio` (
  `id_vaga_estagio` int(11) NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `area_atuacao_vaga` char(50) DEFAULT NULL,
  `numero_candidatura` int(5) DEFAULT NULL,
  `data_registro_vaga` datetime DEFAULT NULL,
  `estado_vaga` int(2) DEFAULT NULL,
  `numero_restante_candidatura` int(20) NOT NULL,
  `atividades_por_realizar` text NOT NULL,
  `competencias` text NOT NULL,
  `linguas` text NOT NULL,
  `ensino` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_vaga_estagio`
--

INSERT INTO `tb_vaga_estagio` (`id_vaga_estagio`, `id_empresa`, `area_atuacao_vaga`, `numero_candidatura`, `data_registro_vaga`, `estado_vaga`, `numero_restante_candidatura`, `atividades_por_realizar`, `competencias`, `linguas`, `ensino`) VALUES
(6, 3, 'Atendimento', 2, '2022-02-22 07:14:02', 0, 2, '', '', '', ''),
(7, 3, 'Vendendor de Imóveis', 2, '2022-04-18 14:33:23', 0, 0, 'Testa', 'Teste', 'Inglês, Português e Francês', 'Teste'),
(19, 8, 'Atendimento', 2, '2022-05-24 08:21:57', 0, 2, 'Atender diferentes usuários \r\nMelhorar o fluxo de atendimento\r\n', 'Comunicativo\r\nHumilde \r\nDedicado', 'Inglês', 'Médio da Concluído'),
(20, 8, 'Novo Departamento', 1, '2022-05-24 08:22:41', 0, 1, 'Trabalhando ', 'Ora', 'Português', 'Médio da Concluído'),
(28, 3, 'Vendas de Equipamentos Electrónicos', 2, '2022-05-25 17:15:15', 0, 1, 'TFAFAFA', 'FAFAFA', 'Português', 'Médio Concluído');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Índices para tabela `tb_aluno`
--
ALTER TABLE `tb_aluno`
  ADD PRIMARY KEY (`id_aluno`);

--
-- Índices para tabela `tb_atribuir_tarefa`
--
ALTER TABLE `tb_atribuir_tarefa`
  ADD PRIMARY KEY (`id_atribuir_tarefa`),
  ADD KEY `tb_atribuir_tarefa_ibfk_1` (`id_empresa`),
  ADD KEY `tb_atribuir_tarefa_ibfk_2` (`id_aluno`);

--
-- Índices para tabela `tb_candidatura_vaga`
--
ALTER TABLE `tb_candidatura_vaga`
  ADD PRIMARY KEY (`id_candidatura`),
  ADD KEY `id_aluno` (`id_aluno`),
  ADD KEY `id_vaga_estagio` (`id_vaga_estagio`);

--
-- Índices para tabela `tb_emissao_declaracao`
--
ALTER TABLE `tb_emissao_declaracao`
  ADD PRIMARY KEY (`id_declaracao`),
  ADD KEY `id_aluno` (`id_aluno`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Índices para tabela `tb_empresa`
--
ALTER TABLE `tb_empresa`
  ADD PRIMARY KEY (`id_empresa`);

--
-- Índices para tabela `tb_relatorio_estagio`
--
ALTER TABLE `tb_relatorio_estagio`
  ADD PRIMARY KEY (`id_relatorio`),
  ADD KEY `id_aluno` (`id_aluno`);

--
-- Índices para tabela `tb_vaga_estagio`
--
ALTER TABLE `tb_vaga_estagio`
  ADD PRIMARY KEY (`id_vaga_estagio`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_aluno`
--
ALTER TABLE `tb_aluno`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de tabela `tb_atribuir_tarefa`
--
ALTER TABLE `tb_atribuir_tarefa`
  MODIFY `id_atribuir_tarefa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tb_candidatura_vaga`
--
ALTER TABLE `tb_candidatura_vaga`
  MODIFY `id_candidatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `tb_emissao_declaracao`
--
ALTER TABLE `tb_emissao_declaracao`
  MODIFY `id_declaracao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_empresa`
--
ALTER TABLE `tb_empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `tb_relatorio_estagio`
--
ALTER TABLE `tb_relatorio_estagio`
  MODIFY `id_relatorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `tb_vaga_estagio`
--
ALTER TABLE `tb_vaga_estagio`
  MODIFY `id_vaga_estagio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_atribuir_tarefa`
--
ALTER TABLE `tb_atribuir_tarefa`
  ADD CONSTRAINT `tb_atribuir_tarefa_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `tb_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_atribuir_tarefa_ibfk_2` FOREIGN KEY (`id_aluno`) REFERENCES `tb_aluno` (`id_aluno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_candidatura_vaga`
--
ALTER TABLE `tb_candidatura_vaga`
  ADD CONSTRAINT `tb_candidatura_vaga_ibfk_1` FOREIGN KEY (`id_aluno`) REFERENCES `tb_aluno` (`id_aluno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_candidatura_vaga_ibfk_2` FOREIGN KEY (`id_vaga_estagio`) REFERENCES `tb_vaga_estagio` (`id_vaga_estagio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_emissao_declaracao`
--
ALTER TABLE `tb_emissao_declaracao`
  ADD CONSTRAINT `tb_emissao_declaracao_ibfk_1` FOREIGN KEY (`id_aluno`) REFERENCES `tb_aluno` (`id_aluno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_emissao_declaracao_ibfk_2` FOREIGN KEY (`id_empresa`) REFERENCES `tb_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_relatorio_estagio`
--
ALTER TABLE `tb_relatorio_estagio`
  ADD CONSTRAINT `tb_relatorio_estagio_ibfk_1` FOREIGN KEY (`id_aluno`) REFERENCES `tb_aluno` (`id_aluno`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `tb_vaga_estagio`
--
ALTER TABLE `tb_vaga_estagio`
  ADD CONSTRAINT `tb_vaga_estagio_ibfk_1` FOREIGN KEY (`id_empresa`) REFERENCES `tb_empresa` (`id_empresa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
