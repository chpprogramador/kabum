--
-- Estrutura para tabela `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(30) NOT NULL,
  `data_nascimento` datetime NOT NULL,
  `cpf` varchar(11) NOT NULL,
  `rg` varchar(20) NOT NULL,
  `telefone` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `clientes_endereco`
--

CREATE TABLE IF NOT EXISTS `clientes_endereco` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `endereco` varchar(60) NOT NULL,
  `numero` varchar(8) NOT NULL,
  `complemento` varchar(60) NOT NULL,
  `cidade` varchar(60) NOT NULL,
  `estado` varchar(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `clientes_endereco`
--

INSERT INTO `clientes_endereco` (`id`, `id_cliente`, `cep`, `endereco`, `numero`, `complemento`, `cidade`, `estado`) VALUES
(24, 22, '13480110', 'Rua HumaitÃ¡2', '532', 'casa', 'Limeira', 'SP');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` int(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`) VALUES
(5, 'CÃ©sar', 'chp.programador@gmail.com', 123);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `clientes_endereco`
--
ALTER TABLE `clientes_endereco`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de tabela `clientes_endereco`
--
ALTER TABLE `clientes_endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;