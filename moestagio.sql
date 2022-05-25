-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Maio-2022 às 13:26
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
(1, 'Mauro Bengue', 'maurobengue@gmail.com', 'ec6a6536ca304edf844d1d248a4f08dc', 'mauro.png'),
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
(1, 'Mauro Bongue', '0', 'maurob@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'jamba.png', 'M', 930128232, 0, '', '2022-01-16 15:56:37'),
(2, 'Eduardo Jamba', '1902', 'jamba@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'create-2.jpg', 'M', 921502912, 0, '', '2022-01-16 15:58:47'),
(20, 'Mario Domingos António', '12416', 'mariodomingos@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'blithesome-student-green-t-shirt-posing-with-laptop-indoor-photo-amazed-male-freelancer-isolated.jpg', 'M', 9210000, NULL, 'ITEL - Instituto Nacional de Telecomunicações', NULL),
(21, 'Amadeu Augusto', '0', 'amadeuaugusto@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', NULL, NULL, NULL, NULL, '', NULL);

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
  `arquivo_tarefa_recibo` varchar(500) DEFAULT NULL,
  `tema` varchar(50) NOT NULL,
  `descricao_tarefa` text DEFAULT NULL,
  `estado_tarefa` int(1) NOT NULL,
  `data_registro_tarefa` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `tb_atribuir_tarefa`
--

INSERT INTO `tb_atribuir_tarefa` (`id_atribuir_tarefa`, `id_empresa`, `id_aluno`, `data_entrega`, `data_entregada`, `arquivo_tarefa_enviado`, `arquivo_tarefa_recibo`, `tema`, `descricao_tarefa`, `estado_tarefa`, `data_registro_tarefa`) VALUES
(8, 3, 20, '2023-06-20', '2040-02-20', 'cv ndonge.pdf', 'cv ndonge.pdf', 'Criar uma caderneta Online', 'Testando', 1, '2022-05-21 17:05:11');

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
(14, 20, 6, '2022-05-21 17:01:51', 1, 'Testando', 'cv ndonge.pdf');

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
(2, 20, 3, '2022-05-21 17:29:24', 0);

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
(2, 'Ellonet Company', 'ellonet@gmail.com', 'ec6a6536ca304edf844d1d248a4f08dc', '11124284222', 'Mutamba', '000000000', '2022-01-22 07:09:28', 'Eloyme Samuel', 'company.png', 'TI'),
(3, 'Sistec', 'sistec@gmail.com', 'ec6a6536ca304edf844d1d248a4f08dc', '3000', 'Mutamba', '9210000', '2022-01-22 07:10:48', 'Freelancer', 'positive-black-adult-man-makes-yes-gesture-clenches-fists-feels-like-champion-or-winner-wears-casual-black-t-shirt-isolated-over-vivid-orange-wall.jpg', 'Freelancer'),
(8, 'Marketing Host', 'marketinghost@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', '10420028232', 'Luanda, Viana', '932001110', '2022-05-24 08:12:00', 'António Vicente', '8.png', 'Marketing Digital');

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
(1, 20, NULL, 0, 0, '2022-05-21 19:55:50');

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
(3, 2, 'Técnico de Redes', 5, '2022-02-21 02:19:24', 0, 5, '', '', '', ''),
(6, 3, 'Atendimento', 2, '2022-02-22 07:14:02', 0, 0, '', '', '', ''),
(7, 3, 'Vendendor de Imóveis', 2, '2022-04-18 14:33:23', 0, 2, 'Testa', 'Teste', 'Inglês, Português e Francês', 'Teste'),
(19, 8, 'Atendimento', 2, '2022-05-24 08:21:57', 0, 2, 'Atender diferentes usuários \r\nMelhorar o fluxo de atendimento\r\n', 'Comunicativo\r\nHumilde \r\nDedicado', 'Inglês', 'Médio da Concluído'),
(20, 8, 'Novo Departamento', 1, '2022-05-24 08:22:41', 0, 1, 'Trabalhando ', 'Ora', 'Português', 'Médio da Concluído');

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
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tb_atribuir_tarefa`
--
ALTER TABLE `tb_atribuir_tarefa`
  MODIFY `id_atribuir_tarefa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tb_candidatura_vaga`
--
ALTER TABLE `tb_candidatura_vaga`
  MODIFY `id_candidatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `tb_emissao_declaracao`
--
ALTER TABLE `tb_emissao_declaracao`
  MODIFY `id_declaracao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_empresa`
--
ALTER TABLE `tb_empresa`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `tb_relatorio_estagio`
--
ALTER TABLE `tb_relatorio_estagio`
  MODIFY `id_relatorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_vaga_estagio`
--
ALTER TABLE `tb_vaga_estagio`
  MODIFY `id_vaga_estagio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
