-- TABLE: acessos
CREATE TABLE `acessos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `chave` varchar(35) NOT NULL,
  `grupo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('1', 'Home', 'home', '0');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('2', 'Notificações', 'notificacoes', '0');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('3', 'Backup Banco', 'backup', '0');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('4', 'Anexo Sede', 'anexos', '0');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('5', 'Membros', 'membros', '1');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('6', 'Pastores', 'pastores', '1');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('7', 'Tesoureiros', 'tesoureiros', '1');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('8', 'Secretários(as)', 'secretarios', '1');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('9', 'Fornecedores', 'fornecedores', '1');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('10', 'Usuários', 'usuarios', '1');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('11', 'Agenda / Tarefas', 'tarefas', '3');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('12', 'Contas á Pagar', 'pagar', '4');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('13', 'Contas à Receber', 'receber', '4');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('14', 'Dízimos', 'dizimos', '4');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('15', 'Ofertas', 'ofertas', '4');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('16', 'Doações', 'doacoes', '4');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('17', 'Vendas', 'vendas', '4');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('18', 'Movimentações', 'movimentacoes', '4');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('19', 'Documentos', 'documentos', '5');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('20', 'Patrimônio', 'patrimonio', '5');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('21', 'Células', 'celulas', '5');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('22', 'Grupos', 'grupos', '5');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('23', 'Relatório de Membros', 'RelMembros', '6');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('24', 'Relatório de Patrimônios', 'RelPatrimonio', '6');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('25', 'inicial', 'inicial', '0');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('26', 'Lições de Célula', 'licoes', '3');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('27', 'Eventos', 'eventos', '3');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('28', 'Dados da Igreja', 'igrejas', '3');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('29', 'Cultos', 'cultos', '3');
INSERT INTO `acessos` (`id`, `nome`, `chave`, `grupo`) VALUES ('30', 'Alertas', 'alertas', '3');

-- TABLE: alertas
CREATE TABLE `alertas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) NOT NULL,
  `descricao` text DEFAULT NULL,
  `link` varchar(150) DEFAULT NULL,
  `imagem` varchar(150) DEFAULT NULL,
  `data` date NOT NULL,
  `ativo` varchar(5) NOT NULL,
  `igreja` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `alertas` (`id`, `titulo`, `descricao`, `link`, `imagem`, `data`, `ativo`, `igreja`, `usuario`) VALUES ('1', 'Site em Manutenção', 'Nosso site estará em manutenção a partir desta tarde às 14h00. Acesse o Link para ir em nossa página do Facebook para mais informações.', 'https://google.com', '18-06-2024-10-55-28-logo-rel.jpg', '2024-06-19', 'Sim', '2', '16');
INSERT INTO `alertas` (`id`, `titulo`, `descricao`, `link`, `imagem`, `data`, `ativo`, `igreja`, `usuario`) VALUES ('2', 'Culto de Domingo cancelado', 'dsafdsfds', '', '18-06-2024-11-16-07-carteirinha.jpg', '2024-06-20', 'Não', '2', '16');
INSERT INTO `alertas` (`id`, `titulo`, `descricao`, `link`, `imagem`, `data`, `ativo`, `igreja`, `usuario`) VALUES ('3', 'Pandemia', 'Alerta de exemplo para teste', 'facebook.com', '18-09-2024-11-59-28-images-placeholder-licao.png', '2024-09-19', 'Sim', '1', '16');
INSERT INTO `alertas` (`id`, `titulo`, `descricao`, `link`, `imagem`, `data`, `ativo`, `igreja`, `usuario`) VALUES ('4', 'asfdadas', 'sadsadsa', 'dasdasd', 'sem-foto.jpg', '2024-09-18', 'Não', '1', '16');

-- TABLE: anexos
CREATE TABLE `anexos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `arquivo` varchar(150) NOT NULL,
  `data` date NOT NULL,
  `usuario` int(11) NOT NULL,
  `igreja` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `anexos` (`id`, `nome`, `descricao`, `arquivo`, `data`, `usuario`, `igreja`) VALUES ('1', 'Prestação de Contas', 'Dízimos, Ofertas, Vendas, etc...', '19-03-2024-11-23-33-Arquivos.zip', '2024-03-19', '16', '1');
INSERT INTO `anexos` (`id`, `nome`, `descricao`, `arquivo`, `data`, `usuario`, `igreja`) VALUES ('2', 'Relatório de Aniversariantes', 'Relatório de Aniversário de todos os membros', '19-03-2024-14-16-10-word-exemplo.docx', '2024-03-19', '41', '2');

-- TABLE: cargos
CREATE TABLE `cargos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `cargos` (`id`, `nome`) VALUES ('1', 'Membro');
INSERT INTO `cargos` (`id`, `nome`) VALUES ('3', 'Diácono');
INSERT INTO `cargos` (`id`, `nome`) VALUES ('4', 'Evangelista');

-- TABLE: categoria_licoes
CREATE TABLE `categoria_licoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `igreja` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `categoria_licoes` (`id`, `nome`, `igreja`) VALUES ('2', 'Sérei Fé', '1');
INSERT INTO `categoria_licoes` (`id`, `nome`, `igreja`) VALUES ('3', 'Série Sobrenatural', '1');
INSERT INTO `categoria_licoes` (`id`, `nome`, `igreja`) VALUES ('4', 'Série Voe alto', '1');
INSERT INTO `categoria_licoes` (`id`, `nome`, `igreja`) VALUES ('5', 'Série Valores', '1');
INSERT INTO `categoria_licoes` (`id`, `nome`, `igreja`) VALUES ('6', 'Série Amor', '1');
INSERT INTO `categoria_licoes` (`id`, `nome`, `igreja`) VALUES ('13', 'Série Friends', '2');
INSERT INTO `categoria_licoes` (`id`, `nome`, `igreja`) VALUES ('14', 'Série façam amigos', '2');
INSERT INTO `categoria_licoes` (`id`, `nome`, `igreja`) VALUES ('15', 'Série viva como filho de Deus', '2');
INSERT INTO `categoria_licoes` (`id`, `nome`, `igreja`) VALUES ('16', 'Dia do amigo', '2');
INSERT INTO `categoria_licoes` (`id`, `nome`, `igreja`) VALUES ('17', 'Série Ativação', '2');

-- TABLE: categoria_noticias
CREATE TABLE `categoria_noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `categoria_noticias` (`id`, `nome`) VALUES ('1', 'Fim de Ano');
INSERT INTO `categoria_noticias` (`id`, `nome`) VALUES ('2', 'Retiro');
INSERT INTO `categoria_noticias` (`id`, `nome`) VALUES ('3', 'Outros');
INSERT INTO `categoria_noticias` (`id`, `nome`) VALUES ('4', 'Culto');

-- TABLE: categoria_oracao
CREATE TABLE `categoria_oracao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `categoria_oracao` (`id`, `nome`) VALUES ('1', 'Família');
INSERT INTO `categoria_oracao` (`id`, `nome`) VALUES ('5', 'Saúde e Cura');
INSERT INTO `categoria_oracao` (`id`, `nome`) VALUES ('6', 'Trabalho e Finanças');
INSERT INTO `categoria_oracao` (`id`, `nome`) VALUES ('7', 'Crescimento Espiritual');
INSERT INTO `categoria_oracao` (`id`, `nome`) VALUES ('8', 'Relacionamentos Pessoais');
INSERT INTO `categoria_oracao` (`id`, `nome`) VALUES ('9', 'Sabedoria e Direção');

-- TABLE: celulas
CREATE TABLE `celulas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `dias` varchar(150) NOT NULL,
  `hora` varchar(100) NOT NULL,
  `local` varchar(100) DEFAULT NULL,
  `pastor` int(11) DEFAULT NULL,
  `coordenador` int(11) DEFAULT NULL,
  `supervisor` int(11) DEFAULT NULL,
  `lider1` int(11) DEFAULT NULL,
  `lider2` int(11) DEFAULT NULL,
  `lider3` int(11) DEFAULT NULL,
  `lider4` int(11) DEFAULT NULL,
  `obs` text DEFAULT NULL,
  `igreja` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `celulas` (`id`, `nome`, `dias`, `hora`, `local`, `pastor`, `coordenador`, `supervisor`, `lider1`, `lider2`, `lider3`, `lider4`, `obs`, `igreja`) VALUES ('6', 'Célula do Ryan', 'Sexta-Feira', 'Das 19h30 às 21h00', 'Rua Sargento Miguel Filho', '0', '0', '', '63', '47', '61', '0', '', '1');
INSERT INTO `celulas` (`id`, `nome`, `dias`, `hora`, `local`, `pastor`, `coordenador`, `supervisor`, `lider1`, `lider2`, `lider3`, `lider4`, `obs`, `igreja`) VALUES ('7', 'Célula do Pastor Marcos', 'Terça-Feira', 'Das 19h30 às 21h00', 'Rua Maria Estrela, 532, Apartamento 100', '0', '0', '10', '61', '46', '63', '0', 'Esta célula...', '1');
INSERT INTO `celulas` (`id`, `nome`, `dias`, `hora`, `local`, `pastor`, `coordenador`, `supervisor`, `lider1`, `lider2`, `lider3`, `lider4`, `obs`, `igreja`) VALUES ('10', 'Célula do Igor', 'oooo', 'Das 19h30 às 20h30', 'fdsfds', '56', '0', '', '65', '34', '46', '0', '', '1');
INSERT INTO `celulas` (`id`, `nome`, `dias`, `hora`, `local`, `pastor`, `coordenador`, `supervisor`, `lider1`, `lider2`, `lider3`, `lider4`, `obs`, `igreja`) VALUES ('11', 'Célula do Igor', 'Sexta-Feira', 'Das 19h30 às 21h00', 'Rua xxxxxxxx xxxxx xxxxx', '0', '0', '', '0', '0', '0', '0', '', '2');
INSERT INTO `celulas` (`id`, `nome`, `dias`, `hora`, `local`, `pastor`, `coordenador`, `supervisor`, `lider1`, `lider2`, `lider3`, `lider4`, `obs`, `igreja`) VALUES ('12', 'Célula da Camila', 'Segunda-Feira', 'Das 16h30 às 17h50', 'Rua yyyy yyyyyyyy yyyyyy', '52', '0', '', '24', '49', '54', '0', '', '2');
INSERT INTO `celulas` (`id`, `nome`, `dias`, `hora`, `local`, `pastor`, `coordenador`, `supervisor`, `lider1`, `lider2`, `lider3`, `lider4`, `obs`, `igreja`) VALUES ('13', 'Célula do Carlos', 'Segunda-Feira', 'Das 16h30 às 17h50', 'fdsfdsfsd', '0', '0', '', '25', '47', '0', '0', '', '1');

-- TABLE: celulas_membros
CREATE TABLE `celulas_membros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membro` int(11) NOT NULL,
  `celula` int(11) NOT NULL,
  `data` date NOT NULL,
  `igreja` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `celulas_membros` (`id`, `membro`, `celula`, `data`, `igreja`) VALUES ('24', '9', '7', '2024-04-02', '1');
INSERT INTO `celulas_membros` (`id`, `membro`, `celula`, `data`, `igreja`) VALUES ('25', '10', '7', '2024-04-03', '1');
INSERT INTO `celulas_membros` (`id`, `membro`, `celula`, `data`, `igreja`) VALUES ('26', '4', '7', '2024-04-03', '1');
INSERT INTO `celulas_membros` (`id`, `membro`, `celula`, `data`, `igreja`) VALUES ('27', '10', '6', '2024-04-03', '1');
INSERT INTO `celulas_membros` (`id`, `membro`, `celula`, `data`, `igreja`) VALUES ('28', '9', '6', '2024-04-03', '1');
INSERT INTO `celulas_membros` (`id`, `membro`, `celula`, `data`, `igreja`) VALUES ('31', '15', '10', '2024-06-20', '1');
INSERT INTO `celulas_membros` (`id`, `membro`, `celula`, `data`, `igreja`) VALUES ('33', '7', '11', '2024-07-25', '2');
INSERT INTO `celulas_membros` (`id`, `membro`, `celula`, `data`, `igreja`) VALUES ('34', '12', '11', '2024-07-25', '2');
INSERT INTO `celulas_membros` (`id`, `membro`, `celula`, `data`, `igreja`) VALUES ('35', '1', '11', '2024-07-25', '2');
INSERT INTO `celulas_membros` (`id`, `membro`, `celula`, `data`, `igreja`) VALUES ('36', '17', '12', '2024-07-26', '2');
INSERT INTO `celulas_membros` (`id`, `membro`, `celula`, `data`, `igreja`) VALUES ('37', '2', '12', '2024-07-26', '2');

-- TABLE: config
CREATE TABLE `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(150) NOT NULL,
  `qtd_tarefas` int(11) NOT NULL,
  `limitar_tesoureiro` varchar(5) NOT NULL,
  `relatorio_pdf` varchar(5) NOT NULL,
  `cabecalho_rel_img` varchar(5) NOT NULL,
  `escolher_usuario` varchar(5) DEFAULT NULL,
  `usuario_celula` int(11) DEFAULT NULL,
  `itens_por_pagina` int(11) NOT NULL,
  `itens_por_pagina_message` int(11) NOT NULL,
  `itens_pag` int(11) NOT NULL,
  `logs` varchar(5) NOT NULL,
  `token_whatsapp` varchar(70) NOT NULL,
  `api_whatsapp` varchar(25) NOT NULL,
  `dias_excluir_logs` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `config` (`id`, `nome`, `email`, `telefone`, `endereco`, `qtd_tarefas`, `limitar_tesoureiro`, `relatorio_pdf`, `cabecalho_rel_img`, `escolher_usuario`, `usuario_celula`, `itens_por_pagina`, `itens_por_pagina_message`, `itens_pag`, `logs`, `token_whatsapp`, `api_whatsapp`, `dias_excluir_logs`) VALUES ('1', 'Igreja Batista Missão Multiplicar', 'contato@ibmissaomultiplicar.com.br', '(00) 00000-0000', 'Avenida Brasil, 33.815 Bangu , Rio de Janeiro, RJ, Brazil', '20', 'Sim', 'Sim', 'Sim', 'Sim', '10', '6', '7', '0', 'Sim', '', '', '40');

-- TABLE: cultos
CREATE TABLE `cultos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `dia` varchar(20) NOT NULL,
  `hora` time NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `igreja` int(11) NOT NULL,
  `obs` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `cultos` (`id`, `nome`, `dia`, `hora`, `descricao`, `igreja`, `obs`) VALUES ('3', 'Culto de Celebração', 'Domingo', '19:00:00', '', '1', '');
INSERT INTO `cultos` (`id`, `nome`, `dia`, `hora`, `descricao`, `igreja`, `obs`) VALUES ('4', 'Culto de Consagração', 'Domingo', '10:00:00', 'Culto de Consagração pela manhã', '1', 'Este culto...');
INSERT INTO `cultos` (`id`, `nome`, `dia`, `hora`, `descricao`, `igreja`, `obs`) VALUES ('5', 'Culto de Restauração', 'Quinta Feira', '19:30:00', '', '2', '');
INSERT INTO `cultos` (`id`, `nome`, `dia`, `hora`, `descricao`, `igreja`, `obs`) VALUES ('6', 'Culto de Oração', 'Segunda Feira', '18:00:00', '', '2', '');
INSERT INTO `cultos` (`id`, `nome`, `dia`, `hora`, `descricao`, `igreja`, `obs`) VALUES ('7', 'Culto de Restauração', 'Quinta-Feira', '19:30:00', '', '1', '');
INSERT INTO `cultos` (`id`, `nome`, `dia`, `hora`, `descricao`, `igreja`, `obs`) VALUES ('8', 'Culto de Oração', 'Segunda-Feira', '18:00:00', '', '1', '');

-- TABLE: dizimos
CREATE TABLE `dizimos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membro` int(11) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `data` date NOT NULL,
  `usuario` int(11) NOT NULL,
  `igreja` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `dizimos` (`id`, `membro`, `valor`, `data`, `usuario`, `igreja`) VALUES ('10', '6', '252.00', '2024-01-30', '23', '2');
INSERT INTO `dizimos` (`id`, `membro`, `valor`, `data`, `usuario`, `igreja`) VALUES ('11', '0', '150.00', '2024-01-28', '23', '2');
INSERT INTO `dizimos` (`id`, `membro`, `valor`, `data`, `usuario`, `igreja`) VALUES ('12', '4', '380.00', '2024-01-30', '23', '2');
INSERT INTO `dizimos` (`id`, `membro`, `valor`, `data`, `usuario`, `igreja`) VALUES ('17', '1', '10.00', '2024-11-26', '16', '2');

-- TABLE: doacoes
CREATE TABLE `doacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membro` int(11) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `data` date NOT NULL,
  `usuario` int(11) NOT NULL,
  `igreja` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `doacoes` (`id`, `membro`, `valor`, `data`, `usuario`, `igreja`) VALUES ('1', '1', '1975.00', '2024-02-01', '16', '2');
INSERT INTO `doacoes` (`id`, `membro`, `valor`, `data`, `usuario`, `igreja`) VALUES ('2', '0', '2300.00', '2024-01-30', '16', '2');

-- TABLE: documentos
CREATE TABLE `documentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `arquivo` varchar(150) NOT NULL,
  `data` date NOT NULL,
  `usuario` int(11) NOT NULL,
  `igreja` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `documentos` (`id`, `nome`, `descricao`, `arquivo`, `data`, `usuario`, `igreja`) VALUES ('1', 'Documento de Aluguel', 'Documento de aluguel da Igreja IBMM - Brasil', '05-02-2024-15-25-14-Arquivos.zip', '2024-02-05', '16', '2');
INSERT INTO `documentos` (`id`, `nome`, `descricao`, `arquivo`, `data`, `usuario`, `igreja`) VALUES ('2', 'Documento do Sítio', 'Documento do Sítio da IBMM', '05-02-2024-15-39-27-ESCALA-(FEVEREIRO)---Atualizado.pdf', '2024-02-05', '16', '2');
INSERT INTO `documentos` (`id`, `nome`, `descricao`, `arquivo`, `data`, `usuario`, `igreja`) VALUES ('4', 'Documento Xjfikao', 'Descrição do Documento xyz...', '05-02-2024-16-05-17-logo-2.jpg', '2024-01-31', '16', '2');
INSERT INTO `documentos` (`id`, `nome`, `descricao`, `arquivo`, `data`, `usuario`, `igreja`) VALUES ('6', '', '', 'sem-foto.jpg', '0000-00-00', '16', '0');
INSERT INTO `documentos` (`id`, `nome`, `descricao`, `arquivo`, `data`, `usuario`, `igreja`) VALUES ('7', 'Contrato', 'Contrato de tal coisa da igreja', '05-02-2024-16-24-01-word-exemplo.docx', '2024-02-05', '16', '2');
INSERT INTO `documentos` (`id`, `nome`, `descricao`, `arquivo`, `data`, `usuario`, `igreja`) VALUES ('8', 'Documento de Cancelamento', 'Documento de Cancelamento dos Serviços da Internet', '19-03-2024-09-56-13-word-exemplo.docx', '2024-03-19', '16', '1');

-- TABLE: eventos
CREATE TABLE `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(100) NOT NULL,
  `subtitulo` text DEFAULT NULL,
  `descricao1` text DEFAULT NULL,
  `descricao2` text DEFAULT NULL,
  `descricao3` text DEFAULT NULL,
  `data_cad` date NOT NULL,
  `data_evento` varchar(50) NOT NULL,
  `hora_evento` time NOT NULL,
  `link_form` varchar(80) DEFAULT NULL,
  `usuario` int(11) NOT NULL,
  `imagem` varchar(150) DEFAULT NULL,
  `video` varchar(100) DEFAULT NULL,
  `ativo` varchar(5) NOT NULL,
  `igreja` int(11) NOT NULL,
  `obs` text DEFAULT NULL,
  `img_1` varchar(150) DEFAULT NULL,
  `img_2` varchar(150) DEFAULT NULL,
  `img_3` varchar(150) DEFAULT NULL,
  `img_4` varchar(150) DEFAULT NULL,
  `img_5` varchar(150) DEFAULT NULL,
  `img_6` varchar(150) DEFAULT NULL,
  `convidado1` varchar(130) DEFAULT NULL,
  `convidado2` varchar(130) DEFAULT NULL,
  `convidado3` varchar(130) DEFAULT NULL,
  `convidado4` varchar(130) DEFAULT NULL,
  `descr_conv1` varchar(80) DEFAULT NULL,
  `descr_conv2` varchar(80) DEFAULT NULL,
  `descr_conv3` varchar(80) DEFAULT NULL,
  `descr_conv4` varchar(80) DEFAULT NULL,
  `imagem1` varchar(150) DEFAULT NULL,
  `imagem2` varchar(150) DEFAULT NULL,
  `imagem3` varchar(150) DEFAULT NULL,
  `imagem4` varchar(150) DEFAULT NULL,
  `banner` varchar(120) DEFAULT NULL,
  `banner_mobile` varchar(150) DEFAULT NULL,
  `tipo` varchar(50) NOT NULL,
  `categoria` varchar(30) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `pregador` varchar(80) DEFAULT NULL,
  `id_inscricao` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `telefone` varchar(25) NOT NULL,
  `status` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=158 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('3', 'Culto de Consagração (Domingo - 01/09/2024)', '', '', '', '', '2024-09-10', '2024-06-21', '00:00:00', '', '16', '15-08-2024-14-51-01-topfundo03.jpg', 'https://www.youtube.com/embed/s8k2vJu5_xM?si=4PaDPXbn0uEwEYhk', 'Sim', '1', 'dcas/c', '', '', '', '', '', '', 'Pr. Osvaldo Queiroz', '', '', '', '', '', '', '', '16-08-2024-08-53-47-coed-araguaina-logo.png', '', '', '', '02-09-2024-10-06-57-evento-ibmm-3-anos.jpg', '', 'Mensagem', '', 'culto-de-consagracao-(domingo-01-09-2024)', '24', '0', 'Sim', 'Não', 'Sim', 'Aguardando');
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('4', 'Acampadentro de Jovens da IBMM', '', '', '', '', '2024-09-10', '2024-06-25', '00:00:00', '', '16', '20-06-2024-08-28-29-slide4.png', 'https://www.youtube.com/embed/zMgMKl-seK0?si=hmPyFIimqZyWOG5i', 'Sim', '1', 'dsafdsfdsfgdfgfdhgf', '15-08-2024-14-45-05-37coed.jpg', '15-08-2024-14-45-05-36coed-floripa.jpg', '15-08-2024-14-45-05-36coed-floripa2.jpg', '15-08-2024-14-45-05-topfundo03.jpg', '15-08-2024-14-45-05-topfundo03-.png', '15-08-2024-14-45-05-THUMBNAIL-FORUM-DE-TEOLOGIA-CGADB-MT.jpg', 'Pr. Osiel Gomes', 'Pr. Rodrigo Silva', 'Pr. Luciando Subirá', 'Pr. Jonathan Carlos', '', '', '', '', '15-08-2024-16-46-26-THUMBNAIL-FORUM-DE-TEOLOGIA-CGADB-MT.jpg', '15-08-2024-16-42-11-cpad10-magento.png', '15-08-2024-16-45-27-Encontro-Teológico-CPAD---Banner.jpg', '15-08-2024-16-47-46-38COED-Topo.jpg', '02-09-2024-13-52-50-topfundo03.jpg', '', 'Evento', '', 'acampadentro-de-jovens-da-ibmm', '', '0', 'Sim', 'Não', 'Sim', 'Aguardando');
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('84', 'Culto de 3 Anos da IBMM', '', '', '', '', '2024-09-10', '2024-09-08', '00:00:00', '', '16', '02-09-2024-09-40-42-celulas.png', 'https://www.youtube.com/embed/p6zWcv09YUg?si=OnMIzQGU6--s4Q55', 'Sim', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '02-09-2024-09-40-31-seja-membro.jpg', '', 'Evento', '', 'culto-de-3-anos-da-ibmm', '0', '0', 'Sim', 'Não', 'Sim', 'Aguardando');
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('85', 'Não aja por conta própria - Pr Joel Mesquita - Missão Multiplicar', '', '', '', '', '2024-09-10', '2024-09-02', '00:00:00', '', '16', '02-09-2024-09-51-44-evento.webp', 'https://www.youtube.com/embed/eh6NK9athcs?si=y08Bjpk6z9tP-Aqb', 'Sim', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '10-09-2024-08-53-23-Banner-1200x675-1.webp', '10-09-2024-08-49-54-banner_mobile.webp', 'Mensagem', '', 'nao-aja-por-conta-propria-pr-joel-mesquita-missao-multiplicar', '20', '0', 'Sim', 'Não', 'Sim', 'Aguardando');
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('90', 'Acampamento das Eleitas', '', '', '', '', '2024-09-19', '2024-09-20', '00:00:00', '', '16', 'sem-foto.jpg', '', 'Sim', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '11-09-2024-09-55-09-acampamento-das-mulheres.jpg', '', 'Evento com Inscrição', '', 'acampamento-das-eleitas', '0', '0', 'Sim', 'Não', 'Sim', 'Aguardando');
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('91', 'Encontro com Deus', '', '', '', '', '2024-09-13', '2024-11-01', '00:00:00', '', '16', 'sem-foto.jpg', '', 'Sim', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '11-09-2024-10-07-36-istockphoto-1400140718-2048x2048.webp', '', 'Evento', '', 'encontro-com-deus', '16', '0', 'Sim', 'Não', 'Sim', 'Aguardando');
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('92', 'Acampamento das Crianças', '', '', '', '', '2024-09-11', '2024-09-28', '00:00:00', '', '16', 'sem-foto.jpg', '', 'Sim', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '11-09-2024-10-16-46-audience-1853662_1280.jpg', '', 'Evento', '', 'acampamento-das-criancas', '', '0', 'Sim', 'Não', 'Sim', 'Aguardando');
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('93', 'Batismo', '', '', '', '', '2024-09-17', '2024-12-21', '00:00:00', '', '16', 'sem-foto.jpg', '', 'Sim', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '11-09-2024-10-20-22-religion-1976796_1280.webp', '', 'Evento com Inscrição', '', 'batismo', '0', '0', 'Sim', 'Sim', 'Sim', 'Aguardando');
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('94', 'Conferência 2024', '', '', '', '', '2024-09-23', '2024-11-16', '19:00:00', '', '16', 'sem-foto.jpg', 'https://www.youtube.com/embed/5MhN-Xk225A?si=dy-9-GQD-9beIjpP', 'Sim', '1', '', '12-09-2024-11-56-38-trees-6556336_1280.jpg', '12-09-2024-12-07-13-garden-3084017_1280.jpg', '12-09-2024-13-30-18-istockphoto-870200372-2048x2048.webp', '', '', '', 'Sarando a Terra Ferida', 'Pr. Jonathan Carlos', 'dsafd', '', 'Banda', 'Preletor', 'sfsfds', '', '12-09-2024-14-23-46-drum-set-1839383_1280.jpg', '12-09-2024-15-59-11-garden-3084017_1280.jpg', '', '', '11-09-2024-10-24-21-business-2626052_1280.jpg', '', 'Evento com Inscrição', '', 'conferencia-2024', '0', '0', 'Sim', 'Não', 'Sim', 'Aguardando');
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('97', 'Seja tu uma benção', '', '', '', '', '2024-09-11', '2024-09-11', '00:00:00', '', '16', '11-09-2024-14-54-34-rail-2096829_1280.jpg', '', 'Sim', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sem-foto.jpg', '', 'Mensagem', '', 'seja-tu-uma-bencao', '40', '0', 'Sim', 'Não', 'Sim', 'Aguardando');
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('98', 'Você está desistindo? - Pr Joel Mesquita - Missão Multiplicar', '', '', '', '', '2024-10-25', '2024-09-11', '00:00:00', '', '16', '11-09-2024-15-51-19-snow-1185469_1280.jpg', 'https://www.youtube.com/embed/V0eXYR65Z2w?si=JzO5oHuJm4-Dkj9P', 'Sim', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sem-foto.jpg', '', 'Mensagem', '0', 'voce-esta-desistindo?-pr-joel-mesquita-missao-multiplicar', '0', '0', 'Sim', 'Não', 'Sim', 'Aguardando');
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('99', 'Conquista por esforço - Pr. Marcos Angelo - Missão Multiplicar', '', '', '', '', '2024-09-11', '2024-09-11', '00:00:00', '', '16', '11-09-2024-15-54-28-filter-1990470_1280.webp', '', 'Sim', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sem-foto.jpg', '', 'Mensagem', '', 'conquista-por-esforco-pr.-marcos-angelo-missao-multiplicar', '40', '0', 'Sim', 'Não', 'Sim', 'Aguardando');
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('100', 'O poder da decisão de seguir a Cristo! - Pr Marcos Angelo - Missão Multiplicar', '', '', '', '', '2024-09-11', '2024-09-11', '00:00:00', '', '16', '11-09-2024-16-06-52-iran-5329930_1280.jpg', '', 'Sim', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sem-foto.jpg', '', 'Mensagem', '', 'o-poder-da-decisao-de-seguir-a-cristo!-pr-marcos-angelo-missao-multiplicar', '40', '0', 'Sim', 'Não', 'Sim', 'Aguardando');
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('101', 'O povo sobrenatural - Pr Marcos Angelo - Missão Multiplicar', '', '', '', '', '2024-09-11', '2024-09-11', '00:00:00', '', '16', '11-09-2024-16-38-47-landscape-4530208_1280.jpg', '', 'Sim', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sem-foto.jpg', '', 'Mensagem', '', 'o-povo-sobrenatural-pr-marcos-angelo-missao-multiplicar', '25', '0', 'Sim', 'Não', 'Sim', 'Aguardando');
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('104', 'Desistir não é uma opção! - Pr. Marcos Angelo | Missão Multiplicar', '', '', '', '', '2024-09-11', '2024-09-11', '00:00:00', '', '16', '11-09-2024-17-06-05-clouds-5521319_1280.jpg', '', 'Sim', '1', '', '', '', '', '', '', '', 'sadsa', '', '', '', 'sadsada', '', '', '', '', '', '', '', 'sem-foto.jpg', '', 'Mensagem', '', 'desistir-nao-e-uma-opcao!-pr.-marcos-angelo-missao-multiplicar', '24', '0', 'Sim', 'Não', 'Sim', 'Aguardando');
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('105', 'Esperança Para Sua Vida! - Pr. Marcos Angelo | Missão Multiplicar', '', '', '', '', '2024-09-11', '2024-09-11', '00:00:00', '', '16', '11-09-2024-17-09-18-sea-2071750_1280.jpg', '', 'Não', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '12-09-2024-17-23-52-garden-3084017_1280.jpg', '', '', 'sem-foto.jpg', '', 'Mensagem', '', 'esperanca-para-sua-vida!-pr.-marcos-angelo-missao-multiplicar', '20', '0', 'Sim', 'Não', 'Sim', 'Aguardando');
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('107', 'Multiplicar é a vontade de Deus - Pr. Marcos | Missão Multiplicar', '', '', '', '', '2024-10-25', '11 de Agosto de 2024', '00:00:00', '', '16', '16-09-2024-10-28-35-7-1200x600.jpg', 'https://www.youtube.com/embed/35ZseFUl2cM?si=agXApFuNRrAIUdIx', 'Sim', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '12-09-2024-16-22-59-garden-3084017_1280.jpg', '', '', '', 'sem-foto.jpg', '', 'Mensagem', '0', 'multiplicar-e-a-vontade-de-deus-pr.-marcos-missao-multiplicar', '16', '0', 'Sim', 'Não', 'Sim', 'Aguardando');
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('108', 'Uma vida que dá frutos - Pr Marcos Angelo | Missão Multiplicar', '', '', '', '', '2024-09-11', '2024-09-11', '00:00:00', '', '16', '11-09-2024-17-18-42-landscape-4530209_1280.jpg', '', 'Não', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '12-09-2024-16-00-33-Logo-Encontro-Teologico-512-x-512-1.png', '12-09-2024-15-59-52-mulher-cristã.png', '', '', 'sem-foto.jpg', '', 'Mensagem', '', 'uma-vida-que-da-frutos-pr-marcos-angelo-missao-multiplicar', '24', '0', 'Sim', 'Não', 'Sim', 'Aguardando');
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('109', 'b cvgcvbcvbcv', '', '', '', '', '2024-09-13', '2024-09-12', '14:15:00', '', '16', 'sem-foto.jpg', '', 'Sim', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '12-09-2024-16-01-04-coed-salvador-logo-1.png', '12-09-2024-16-00-52-garden-3084017_1280.jpg', '', '12-09-2024-16-15-30-istockphoto-870200372-2048x2048.webp', 'sem-foto.jpg', '', 'Evento com Inscrição', '', 'b-cvgcvbcvbcv', '0', '0', 'Sim', 'Não', 'Sim', 'Aguardando');
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('112', 'sadsad', '', '', '', '', '2024-09-23', '2024-09-12', '15:06:00', '', '16', 'sem-foto.jpg', '', 'Sim', '1', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sem-foto.jpg', '', 'Evento', '', 'sadsad', '0', '0', 'Sim', 'Não', 'Sim', 'Aguardando');
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('113', 'Evento Seatle', '', '', '', '', '2024-10-29', '2024-09-13', '08:20:00', '', '16', 'sem-foto.jpg', '', 'Sim', '1', '', '18-09-2024-13-45-13-images-placeholder-licao.png', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'Pr. Luciano Subirá', 'Gabriela Rocha', '', '', 'Preletor', 'Cantora', '', '', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', '', 'Evento com Inscrição', '0', 'evento-seatle', '0', '0', 'Sim', 'Não', 'Sim', 'Aguardando');
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('114', 'kkkkkkk', '', '', '', '', '2024-09-17', '2024-09-17', '19:00:00', '', '16', 'sem-foto.jpg', '', 'Sim', '2', '', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', '', '', '', '', '', '', '', '', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', '', 'Evento', '', 'kkkkkkk', '', '0', 'Sim', 'Não', 'Sim', 'Aguardando');
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('116', 'Fim de semana das Eleitas', '', '', '', '', '2024-10-25', '25 de Outubro de 2024', '15:06:00', '', '16', '23-09-2024-10-59-24-images-placeholder-licao.png', '', 'Sim', '1', '', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', '', '', '', '', '', '', '', '', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', '25-10-2024-09-42-26-media_mulheres.webp', '', 'Notícia', '2', 'fim-de-semana-das-eleitas', '0', '0', 'Sim', 'Não', 'Sim', 'Aguardando');
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('117', 'exemplo de outra notícia', '', '', '', '', '2024-09-24', '2024-09-23', '15:06:00', '', '16', '23-09-2024-11-35-33-images-placeholder-licao.png', '', 'Sim', '1', '', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', '', '', '', '', '', '', '', '', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', '23-09-2024-14-34-41-7-1200x600.jpg', '', 'Notícia', '1', 'exemplo-de-outra-noticia', '0', '0', 'Sim', 'Não', 'Sim', 'Aguardando');
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('118', 'Retiro das crianças', '', '', '', '', '2024-10-01', '2024-10-01', '09:19:00', '', '16', '01-10-2024-09-21-29-placeholder-350x350.png', '', 'Sim', '1', '', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', '', '', '', '', '', '', '', '', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', '01-10-2024-09-21-29-7-1200x600.jpg', '', 'Notícia', '2', 'retiro-das-criancas', '0', '0', 'Sim', 'Não', 'Sim', 'Aguardando');
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('119', 'Santa Ceia do Senhor', 'Um culto abençoado na Santa Ceia do Senhor!', '', '', '', '2024-10-09', '2024-10-09', '19:00:00', '', '16', '09-10-2024-15-30-49-placeholder-350x350.png', '', 'Sim', '1', '', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', '', '', '', '', '', '', '', '', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', '09-10-2024-15-30-49-7-1200x600.jpg', '', 'Notícia', '4', 'santa-ceia-do-senhor', '16', '0', 'Sim', 'Não', 'Sim', 'Aguardando');
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('120', 'Culto especial de Natal', 'Um culto maravilhoso e especial de Natal!', '', '', '', '2024-10-14', '2024-10-09', '14:28:00', '', '16', '09-10-2024-16-24-57-placeholder-350x350.png', '', 'Sim', '1', '', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', '', '', '', '', '', '', '', '', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', '', 'Notícia', '4', 'culto-especial-de-natal', '24', '0', 'Sim', 'Não', 'Sim', 'Aguardando');
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('156', 'sadsa', 'dasdasdas', '', '', '', '2024-10-25', '2024-10-14', '18:00:00', '', '16', '25-10-2024-11-00-21-topfundo03.jpg', '', 'Sim', '1', '', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', '', '', '', '', '', '', '', '', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', '', 'Notícia', '3', 'sadsa', '0', '0', 'Sim', 'Não', 'Sim', 'Aguardando');
INSERT INTO `eventos` (`id`, `titulo`, `subtitulo`, `descricao1`, `descricao2`, `descricao3`, `data_cad`, `data_evento`, `hora_evento`, `link_form`, `usuario`, `imagem`, `video`, `ativo`, `igreja`, `obs`, `img_1`, `img_2`, `img_3`, `img_4`, `img_5`, `img_6`, `convidado1`, `convidado2`, `convidado3`, `convidado4`, `descr_conv1`, `descr_conv2`, `descr_conv3`, `descr_conv4`, `imagem1`, `imagem2`, `imagem3`, `imagem4`, `banner`, `banner_mobile`, `tipo`, `categoria`, `url`, `pregador`, `id_inscricao`, `nome`, `email`, `telefone`, `status`) VALUES ('157', 'Evento de Teste', 'kfdso<div><br></div>', '<div style=\"text-align: center;\"><font size=\"5\"><b>Lorem Ipsum</b></font></div><div style=\"text-align: center;\"><font style=\"font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" justify;=\"\" vertical-align:=\"\" inherit;\"=\"\"><font style=\"vertical-align: inherit;\" color=\"#006699\">é simplesmente um texto modelo da indústria tipográfica e de impressão.&nbsp;</font></font></div><div style=\"text-align: center;\"><font style=\"font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" justify;=\"\" vertical-align:=\"\" inherit;\"=\"\"><font style=\"vertical-align: inherit;\" color=\"#006699\" size=\"2\"><br></font></font></div><div><font style=\"font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" justify;=\"\" vertical-align:=\"\" inherit;\"=\"\"><font style=\"vertical-align: inherit;\" size=\"2\">Lorem Ipsum tem sido o texto modelo padrão da indústria desde os anos 1500, quando um impressor desconhecido pegou uma galera de tipos e os embaralhou para fazer um livro de espécimes de tipos. Ele sobreviveu não apenas cinco séculos, mas também ao salto para a composição eletrônica, permanecendo essencialmente inalterado. Foi popularizado na década de 1960 com o lançamento das folhas Letraset contendo passagens do Lorem Ipsum e, mais recentemente, com softwares de editoração eletrônica como o Aldus PageMaker, incluindo versões do Lorem Ipsum.</font></font></div>', 'dsadsad', 'fdsfdsfds', '2024-11-27', '29 de Outubro de 2024', '19:00:00', '', '16', 'sem-foto.jpg', '', 'Sim', '1', 'obs', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', '', '', '', '', '', '', '', '', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', 'sem-foto.jpg', '', 'Notícia', '3', 'evento-de-teste', '0', '0', '', '', '', '');

-- TABLE: fornecedores
CREATE TABLE `fornecedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `produto` varchar(100) DEFAULT NULL,
  `igreja` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `fornecedores` (`id`, `nome`, `cpf`, `telefone`, `email`, `endereco`, `produto`, `igreja`) VALUES ('1', 'Rodrigo Rocha', '', '(45) 48648-5645', 'rodrigo_R@yahoo.com', 'Rua Buenos Aires 342', 'Obras do corrimão da entrada da igreja', '1');
INSERT INTO `fornecedores` (`id`, `nome`, `cpf`, `telefone`, `email`, `endereco`, `produto`, `igreja`) VALUES ('2', 'Jorge Nascimento', '', '(14) 52415-2465', 'jorge_nasc@gmail.com', 'Rua Pedro Pomar', 'Obra na igreja (Janela da salinha das crianças)', '1');
INSERT INTO `fornecedores` (`id`, `nome`, `cpf`, `telefone`, `email`, `endereco`, `produto`, `igreja`) VALUES ('3', 'Miguel Oliveira', '', '(42) 35423-5435', 'miguel_oliver@gmail.com', 'Rual X...', 'Telhados', '2');

-- TABLE: frequencias
CREATE TABLE `frequencias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `frequencia` varchar(35) NOT NULL,
  `dias` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `frequencias` (`id`, `frequencia`, `dias`) VALUES ('1', 'Uma vez', '0');
INSERT INTO `frequencias` (`id`, `frequencia`, `dias`) VALUES ('2', 'Diária', '1');
INSERT INTO `frequencias` (`id`, `frequencia`, `dias`) VALUES ('3', 'semanal', '7');
INSERT INTO `frequencias` (`id`, `frequencia`, `dias`) VALUES ('4', 'Mensal', '30');
INSERT INTO `frequencias` (`id`, `frequencia`, `dias`) VALUES ('5', 'Semestral', '180');
INSERT INTO `frequencias` (`id`, `frequencia`, `dias`) VALUES ('6', 'Anual', '365');

-- TABLE: grupo_acessos
CREATE TABLE `grupo_acessos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `grupo_acessos` (`id`, `nome`) VALUES ('1', 'Pessoas');
INSERT INTO `grupo_acessos` (`id`, `nome`) VALUES ('3', 'Cadastros');
INSERT INTO `grupo_acessos` (`id`, `nome`) VALUES ('4', 'Financeiro');
INSERT INTO `grupo_acessos` (`id`, `nome`) VALUES ('5', 'Secretária');
INSERT INTO `grupo_acessos` (`id`, `nome`) VALUES ('6', 'Relatórios');

-- TABLE: grupos
CREATE TABLE `grupos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `dias` varchar(75) NOT NULL,
  `hora` varchar(50) NOT NULL,
  `local` varchar(100) DEFAULT NULL,
  `pastor` int(11) NOT NULL,
  `tesoureiro` int(11) NOT NULL,
  `secretario` int(11) NOT NULL,
  `regente` int(11) NOT NULL,
  `lider1` int(11) NOT NULL,
  `lider2` int(11) NOT NULL,
  `obs` text NOT NULL,
  `igreja` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `grupos` (`id`, `nome`, `dias`, `hora`, `local`, `pastor`, `tesoureiro`, `secretario`, `regente`, `lider1`, `lider2`, `obs`, `igreja`) VALUES ('1', 'Grupo de Louvor', 'Domingo', 'Das 16h30 às 17h50', 'Na Igreja Batista Missão Multiplicar (Uhuuuuuu!)', '1', '3', '3', '10', '4', '8', 'fesfsdfdsfds', '1');
INSERT INTO `grupos` (`id`, `nome`, `dias`, `hora`, `local`, `pastor`, `tesoureiro`, `secretario`, `regente`, `lider1`, `lider2`, `obs`, `igreja`) VALUES ('2', 'Grupo de Multimídia', 'Terça-Feira', '19h30 às 21h00', 'Rua tal...', '0', '0', '0', '0', '11', '0', '', '1');

-- TABLE: grupos_membros
CREATE TABLE `grupos_membros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membro` int(11) NOT NULL,
  `grupo` int(11) NOT NULL,
  `data` date NOT NULL,
  `igreja` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `grupos_membros` (`id`, `membro`, `grupo`, `data`, `igreja`) VALUES ('1', '9', '1', '2024-04-03', '1');
INSERT INTO `grupos_membros` (`id`, `membro`, `grupo`, `data`, `igreja`) VALUES ('2', '10', '1', '2024-04-03', '1');
INSERT INTO `grupos_membros` (`id`, `membro`, `grupo`, `data`, `igreja`) VALUES ('3', '11', '1', '2024-04-03', '1');
INSERT INTO `grupos_membros` (`id`, `membro`, `grupo`, `data`, `igreja`) VALUES ('4', '4', '1', '2024-04-03', '1');
INSERT INTO `grupos_membros` (`id`, `membro`, `grupo`, `data`, `igreja`) VALUES ('5', '8', '1', '2024-04-03', '1');
INSERT INTO `grupos_membros` (`id`, `membro`, `grupo`, `data`, `igreja`) VALUES ('9', '10', '2', '2024-04-03', '1');
INSERT INTO `grupos_membros` (`id`, `membro`, `grupo`, `data`, `igreja`) VALUES ('11', '9', '2', '2024-04-03', '1');

-- TABLE: igrejas
CREATE TABLE `igrejas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(150) DEFAULT NULL,
  `obs` text DEFAULT NULL,
  `imagem` varchar(150) DEFAULT NULL,
  `matriz` varchar(5) NOT NULL,
  `data_cad` date NOT NULL,
  `pastor` int(11) NOT NULL,
  `logo_rel` varchar(120) DEFAULT NULL,
  `cab_rel` varchar(120) DEFAULT NULL,
  `carteirinha_rel` varchar(120) DEFAULT NULL,
  `video` varchar(150) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `url` varchar(50) NOT NULL,
  `youtube` varchar(120) DEFAULT NULL,
  `instagram` varchar(120) DEFAULT NULL,
  `facebook` varchar(120) DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `igrejas` (`id`, `nome`, `telefone`, `endereco`, `obs`, `imagem`, `matriz`, `data_cad`, `pastor`, `logo_rel`, `cab_rel`, `carteirinha_rel`, `video`, `email`, `url`, `youtube`, `instagram`, `facebook`, `descricao`) VALUES ('1', 'Igreja Batista Missão Multiplicar - Sede', '(21) 99886-7799', 'Avenida Brasil, 33.815 Bangu , Rio de Janeiro, RJ, Brazil, 21852-002', '', '30-08-2024-15-54-51-Logo-IBMM.png', 'Sim', '2024-01-22', '6', '17-06-2024-12-21-09-LOGO-IGREJA-PENTECOSTAL.jpg', '17-06-2024-11-19-00-CABEÇALHO.jpg', '17-06-2024-10-08-52-carteirinha.jpg', '', 'igrejabatistamissaomultiplicar_sede@gmail.com', 'home', 'https://www.youtube.com/@missaomultiplicar', 'https://www.instagram.com/missaomultiplicar/', 'https://www.facebook.com/missaomultiplicar', '<div style=\"text-align: center; \" center;\"=\"\"><strong \"open=\"\" \"\"\"\"=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" justify;\"=\"\" style=\"\" background-color:\"=\"\" var(--fonte-menu-dropdown);=\"\" color:=\"\" var(--bs-modal-color);\"=\"\"><font inherit;\"=\"\" \"\"\"\"=\"\" size=\"\" 5\"\"=\"\"><i>Lorem Ipsum</i></font></strong><font \"open=\"\" \"\"\"\"=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" justify;=\"\" vertical-align:=\"\" inherit;\"=\"\" style=\"\" background-color:\"=\"\" var(--fonte-menu-dropdown);=\"\" color:=\"\" var(--bs-modal-color);\"=\"\"><font inherit;\"=\"\" \"\"\"\"=\"\"><b>&nbsp;</b></font></font></div><div style=\"text-align: center; \" center;\"=\"\"><font \"open=\"\" \"\"\"\"=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" justify;=\"\" vertical-align:=\"\" inherit;\"=\"\" style=\"\" background-color:\"=\"\" var(--fonte-menu-dropdown);\"=\"\"><font inherit;\"=\"\" \"\"\"\"=\"\" style=\"\" \"\"=\"\" #003399\"\"=\"\" color=\"#003399\">É simplesmente um texto modelo da indústria tipográfica e de impressão. Lorem Ipsum tem sido o texto modelo padrão da indústria desde os anos 1500.</font></font></div><div style=\"\" text-align:\"=\"\" center;\"=\"\"><font \"open=\"\" \"\"\"\"=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" justify;=\"\" vertical-align:=\"\" inherit;\"=\"\" style=\"\" background-color:\"=\"\" var(--fonte-menu-dropdown);\"=\"\"><font inherit;\"=\"\" \"\"\"\"=\"\" style=\"\" \"\"=\"\" color=\"\" #003399\"\"=\"\"><br></font></font></div><div style=\"\" text-align:\"=\"\" left;\"=\"\"><font \"open=\"\" \"\"\"\"=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" justify;=\"\" vertical-align:=\"\" inherit;\"=\"\" style=\"\" background-color:\"=\"\" var(--fonte-menu-dropdown);=\"\" color:=\"\" var(--bs-modal-color);\"=\"\"><font inherit;\"=\"\" \"\"\"\"=\"\"><span style=\"color: red\">&lt;sapn style=\"color: #999\"&gt;Quando um impressor desconhecido pegou uma galera de tipos e os embaralhou para fazer um livro de espécimes de tipos. Ele sobreviveu não apenas cinco séculos, mas também ao salto para a composição eletrônica, permanecendo essencialmente inalterado. Foi popularizado na década de 1960 com o lançamento das folhas Letraset contendo passagens do Lorem Ipsum e, mais recentemente, com softwares de editoração eletrônica como o Aldus PageMaker, incluindo versões do Lorem Ipsum.&lt;/span&gt;</span></font></font></div>');
INSERT INTO `igrejas` (`id`, `nome`, `telefone`, `endereco`, `obs`, `imagem`, `matriz`, `data_cad`, `pastor`, `logo_rel`, `cab_rel`, `carteirinha_rel`, `video`, `email`, `url`, `youtube`, `instagram`, `facebook`, `descricao`) VALUES ('2', 'Igreja Batista Missão Multiplicar', '(21) 24052-5898', 'Avenida Brasil, 33.815, Bangu', '', '17-06-2024-11-46-10-logo-IBMM-preta.png', 'Não', '2024-01-22', '4', '17-06-2024-18-22-17-Logo-IBMM.jpg', '17-06-2024-10-04-17-cabecalho-rel.jpg', '17-06-2024-10-04-17-carteirinha-cab.jpg', 'https://www.youtube.com/embed/iq0_NMs6DIU?si=o2fBWMu5eCb06oA8', 'igrejabatistamissaomultiplicar@gmail.com', 'ibmmmissaomultiplicarbrasil', '', '', '', '<div><h2 style=\"text-align: center; margin-bottom: 10px; font-family: DauphinPlain; font-size: 24px; line-height: 24px;\"><font style=\"vertical-align: inherit;\"><i style=\"\"><u>Onde posso conseguir um pouco?</u></i></font></h2></div><span style=\"font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" justify;\"=\"\"><i><font style=\"background-color: rgb(255, 255, 255);\" color=\"#006600\">\"Há muitas variações de passagens do Lorem Ipsum disponíveis, mas a maioria sofreu alguma alteração, por humor injetado ou palavras aleatórias que não parecem nem um pouco críveis.\"</font></i></span><div><span style=\"font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" justify;\"=\"\"><font size=\"2\"> Se você for usar uma passagem do Lorem Ipsum, precisa ter certeza de que não há nada embaraçoso escondido no meio do texto. Todos os geradores de Lorem Ipsum na Internet tendem a repetir pedaços predefinidos conforme necessário, tornando este o primeiro gerador verdadeiro na Internet. Ele usa um dicionário de mais de 200 palavras latinas, combinado com um punhado de estruturas de frases modelo, para gerar Lorem Ipsum que parece razoável. O Lorem Ipsum gerado é, portanto, sempre livre de repetições, humor injetado ou palavras não características, etc.</font></span></div>');

-- TABLE: licoes
CREATE TABLE `licoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(70) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `imagem` varchar(150) DEFAULT NULL,
  `arquivo` varchar(150) NOT NULL,
  `data` date NOT NULL,
  `categoria_licao` int(11) DEFAULT NULL,
  `usuario` int(11) NOT NULL,
  `igreja` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `licoes` (`id`, `nome`, `descricao`, `imagem`, `arquivo`, `data`, `categoria_licao`, `usuario`, `igreja`) VALUES ('18', 'Qual é a sua Necessidade?', 'QQQ', '24-07-2024-11-33-56-Jovens-3T24.jpg', '24-07-2024-11-33-18-lição-15-a-29-julho.pdf', '2024-07-24', '2', '16', '1');
INSERT INTO `licoes` (`id`, `nome`, `descricao`, `imagem`, `arquivo`, `data`, `categoria_licao`, `usuario`, `igreja`) VALUES ('19', 'Voe Alto', 'VVV', '24-07-2024-11-35-42-Adultos-3T24.jpg', '24-07-2024-11-34-42-Eis-que-venho-sem-demora.pdf', '2024-07-24', '3', '16', '1');
INSERT INTO `licoes` (`id`, `nome`, `descricao`, `imagem`, `arquivo`, `data`, `categoria_licao`, `usuario`, `igreja`) VALUES ('20', 'Eis que venho sem demora', 'EEE', '28-08-2024-17-19-19-Inverno_viena.jpg', '28-08-2024-17-18-42-Série-de-Lições-Valores---5-Integridade.pdf', '2024-07-26', '5', '16', '1');
INSERT INTO `licoes` (`id`, `nome`, `descricao`, `imagem`, `arquivo`, `data`, `categoria_licao`, `usuario`, `igreja`) VALUES ('21', 'O Começo da Vida Cristã', 'OOO', '24-07-2024-11-49-29-trees-6556336_1280.jpg', '24-07-2024-11-40-16-Eis-que-venho-sem-demora.pdf', '2024-07-25', '2', '16', '1');
INSERT INTO `licoes` (`id`, `nome`, `descricao`, `imagem`, `arquivo`, `data`, `categoria_licao`, `usuario`, `igreja`) VALUES ('23', 'Salvação-convertido ', 'Salvação', '24-07-2024-17-17-58-Salavação.jpg', '24-07-2024-17-18-22-lição-15-a-29-julho.pdf', '2024-07-24', '17', '16', '2');
INSERT INTO `licoes` (`id`, `nome`, `descricao`, `imagem`, `arquivo`, `data`, `categoria_licao`, `usuario`, `igreja`) VALUES ('24', 'Obediência', 'Ob', '25-07-2024-14-26-27-obedicencia.jpg', '25-07-2024-14-26-27-Eis-que-venho-sem-demora.pdf', '2024-07-25', '15', '16', '2');
INSERT INTO `licoes` (`id`, `nome`, `descricao`, `imagem`, `arquivo`, `data`, `categoria_licao`, `usuario`, `igreja`) VALUES ('25', 'sadsad', 'sadsadsa', '12-09-2024-09-49-58-colombia-2339093_1280.jpg', '05-09-2024-11-31-18-DANFE.pdf', '2024-07-24', '2', '16', '1');
INSERT INTO `licoes` (`id`, `nome`, `descricao`, `imagem`, `arquivo`, `data`, `categoria_licao`, `usuario`, `igreja`) VALUES ('26', 'Valores', 'Nenhuma!', '29-08-2024-08-30-41-topfundo03.jpg', '29-08-2024-08-30-55-Série-de-Lições-Valores---5-Integridade.pdf', '2024-08-29', '16', '16', '2');
INSERT INTO `licoes` (`id`, `nome`, `descricao`, `imagem`, `arquivo`, `data`, `categoria_licao`, `usuario`, `igreja`) VALUES ('27', 'O Melhor de Deus', 'Nenhuma!', '12-09-2024-09-42-10-filter-1990470_1280.webp', '05-09-2024-11-34-47-Série-de-Lições-Valores---7-Prioridades.pdf', '2024-09-05', '2', '16', '1');
INSERT INTO `licoes` (`id`, `nome`, `descricao`, `imagem`, `arquivo`, `data`, `categoria_licao`, `usuario`, `igreja`) VALUES ('28', 'Seja tu uma benção', 'Nenhuma!', '09-09-2024-17-25-52-mulher-cristã.png', '09-09-2024-17-25-52-seju-tu-uma-benção.pdf', '2024-09-09', '2', '16', '1');
INSERT INTO `licoes` (`id`, `nome`, `descricao`, `imagem`, `arquivo`, `data`, `categoria_licao`, `usuario`, `igreja`) VALUES ('29', 'Oração', 'Nenhuma!', '17-09-2024-16-07-08-images-placeholder-licao.png', '17-09-2024-16-01-39-Série-de-Lições-Valores---6-Oração.pdf', '2024-09-17', '5', '16', '1');

-- TABLE: logs
CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `tabela` varchar(50) NOT NULL,
  `usuario` int(11) NOT NULL,
  `id_reg` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `painel` varchar(100) DEFAULT NULL,
  `igreja` int(11) NOT NULL,
  `acao` varchar(35) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('23', '2024-11-26', '08:57:54', 'pagar', '16', '29', '', 'Painel Igreja', '1', 'Exclusão');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('25', '2024-11-26', '08:59:26', 'pagar', '16', '30', 'wqdqwdw', 'Painel Igreja', '2', 'Exclusão');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('26', '2024-11-26', '09:01:45', 'receber', '16', '7', 'sadsada', 'Painel Igreja', '2', 'Exclusão');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('27', '2024-11-26', '09:05:42', 'dizimos', '16', '14', '1', 'Painel Igreja', '2', 'Exclusão');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('28', '2024-11-26', '09:08:14', 'dizimos', '16', '15', '', 'Painel Igreja', '2', 'Exclusão');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('29', '2024-11-26', '09:09:32', 'dizimos', '16', '16', '', 'Painel Igreja', '2', 'Exclusão');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('30', '2024-11-26', '09:19:24', 'dizimos', '16', '17', '0', 'Painel Administrativo', '0', 'Inserção');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('31', '2024-11-26', '09:19:39', 'dizimos', '16', '17', '1', 'Painel Administrativo', '0', 'Edição');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('32', '2024-11-26', '09:20:09', 'dizimos', '16', '17', 'Rogério dos Santos', 'Painel Administrativo', '0', 'Edição');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('33', '2024-11-26', '09:27:39', 'ofertas', '16', '7', 'Membro Não Informado!', 'Painel Administrativo', '0', 'Inserção');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('34', '2024-11-26', '09:27:49', 'ofertas', '16', '7', 'Vinicius Gabriel', 'Painel Administrativo', '0', 'Edição');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('35', '2024-11-26', '09:31:16', 'pagar', '16', '31', 'Conta de Água', 'Painel Igreja', '0', 'Inserção');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('36', '2024-11-26', '09:31:40', 'pagar', '16', '31', 'Conta de Luz', 'Painel Igreja', '0', 'Edição');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('37', '2024-11-26', '09:33:35', 'receber', '16', '8', 'Receber pagamento do Igor pela quentinha Fitness', 'Painel Igreja', '0', 'Inserção');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('38', '2024-11-26', '09:34:08', 'receber', '16', '8', 'Pagamento recebido do Igor pela quentinha Fitness', 'Painel Igreja', '0', 'Edição');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('39', '2024-11-26', '09:36:41', 'vendas', '16', '5', 'Vendas da feijoada', 'Painel Igreja', '0', 'Inserção');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('40', '2024-11-26', '09:40:37', 'pagar', '16', '31', 'Ativo = ', 'Painel Igreja', '0', 'Edição');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('42', '2024-11-26', '09:44:41', 'pagar', '16', '27', 'Aluguel', 'Painel Igreja', '0', 'Edição');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('43', '2024-11-26', '09:44:51', 'pagar', '16', '27', 'Aluguel', 'Painel Igreja', '0', 'Edição');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('44', '2024-11-26', '09:45:19', 'pagar', '16', '27', 'Aluguel', 'Painel Igreja', '0', 'Edição');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('45', '2024-11-26', '09:48:06', 'pagar', '16', '27', 'Aluguel', 'Painel Igreja', '0', 'Edição');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('46', '2024-11-26', '09:48:06', 'pagar', '16', '27', 'Aluguel', 'Painel Igreja', '0', 'Edição');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('51', '2024-11-26', '09:52:47', 'pagar', '16', '20', 'Compra de microfones da Igreja', 'Painel Igreja', '0', 'Edição');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('52', '2024-11-26', '09:54:51', 'pagar', '16', '20', 'Compra de microfones da Igreja', 'Painel Igreja', '2', 'Edição');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('53', '2024-11-26', '09:55:08', 'pagar', '16', '27', 'Aluguel', 'Painel Igreja', '2', 'Edição');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('54', '2024-11-26', '09:57:06', 'receber', '16', '2', 'Pago = ', 'Painel Igreja', '2', 'Edição');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('55', '2024-11-26', '10:00:10', 'receber', '16', '5', 'Pago = Sim', 'Painel Igreja', '2', 'Edição');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('56', '2024-11-26', '10:02:25', 'receber', '16', '8', 'Pago = Sim', 'Painel Igreja', '2', 'Edição');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('57', '2024-11-27', '11:17:02', 'igrejas', '16', '2', 'Igreja Batista Missão Multiplicar', 'Painel Administrativo', '0', 'Edição');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('58', '2024-11-27', '11:24:03', 'igrejas', '16', '10', 'fdsf', 'Painel Administrativo', '0', 'Inserção');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('59', '2024-11-27', '11:24:15', 'igrejas', '16', '10', 'fdsf', 'Painel Administrativo', '0', 'Exclusão');
INSERT INTO `logs` (`id`, `data`, `hora`, `tabela`, `usuario`, `id_reg`, `descricao`, `painel`, `igreja`, `acao`) VALUES ('60', '2024-11-28', '11:29:45', 'usuarios', '16', '0', 'Login', 'Painel Administrativo', '0', 'Login');

-- TABLE: membros
CREATE TABLE `membros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `foto` varchar(150) NOT NULL,
  `data_cad` date NOT NULL,
  `data_nasc` date NOT NULL,
  `igreja` int(11) NOT NULL,
  `obs` text DEFAULT NULL,
  `data_batismo` date DEFAULT NULL,
  `cargo` varchar(50) NOT NULL,
  `ativo` varchar(5) NOT NULL,
  `lideranca` varchar(50) DEFAULT NULL,
  `estado_civil` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `membros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `data_cad`, `data_nasc`, `igreja`, `obs`, `data_batismo`, `cargo`, `ativo`, `lideranca`, `estado_civil`) VALUES ('1', 'Rogério dos Santos', 'roger_guedes@hotmail.com', '010.151.545-64', '(14) 54524-5456', 'Rua Joaquim Pires Cerveira ', '23-01-2024-09-21-31-eu.jpg', '2024-01-23', '1987-10-23', '2', 'Membro visitante...', '0000-00-00', '1', 'Sim', '2', '');
INSERT INTO `membros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `data_cad`, `data_nasc`, `igreja`, `obs`, `data_batismo`, `cargo`, `ativo`, `lideranca`, `estado_civil`) VALUES ('2', 'Felipe Souza', 'felipe_s@yahoo.com', '205.156.151-56', '(42) 44545-6456', 'Rua Pedro Pomar', 'sem-foto.jpg', '2024-01-23', '2003-03-23', '2', '', '0000-00-00', '3', 'Sim', '1', '');
INSERT INTO `membros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `data_cad`, `data_nasc`, `igreja`, `obs`, `data_batismo`, `cargo`, `ativo`, `lideranca`, `estado_civil`) VALUES ('4', 'Pablo Santos', 'pablo_gt@gmail.com', '121.245.454-15', '(45) 45454-5646', 'Rua figueiredo neto', '25-01-2024-11-11-19-user.jpg', '2024-01-23', '1998-02-23', '1', 'Membro...', '0000-00-00', '3', 'Sim', '1', 'Solteiro');
INSERT INTO `membros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `data_cad`, `data_nasc`, `igreja`, `obs`, `data_batismo`, `cargo`, `ativo`, `lideranca`, `estado_civil`) VALUES ('5', 'Camila Cardoso', 'camila_c@hotmail.com', '211.615.156-15', '(14) 54544-4464', 'dfdsgfdgfdgfdgdfgdf', '18-04-2024-11-16-36-perfil_woman.png.jpg', '2024-01-23', '1993-12-06', '2', '', '0000-00-00', '1', 'Não', '4', '');
INSERT INTO `membros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `data_cad`, `data_nasc`, `igreja`, `obs`, `data_batismo`, `cargo`, `ativo`, `lideranca`, `estado_civil`) VALUES ('6', 'Vinicius Gabriel', 'vinivini_G@htomail.com.br', '121.515.145-45', '(15) 45456-4554', 'Rua narciso nogueira ramos lima', 'sem-foto.jpg', '2024-01-24', '1993-10-24', '2', '', '2021-07-25', '1', 'Não', '1', '');
INSERT INTO `membros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `data_cad`, `data_nasc`, `igreja`, `obs`, `data_batismo`, `cargo`, `ativo`, `lideranca`, `estado_civil`) VALUES ('7', 'João Victor', 'joao_vx@hotmail.com', '454.545.456-46', '(64) 54545-6454', 'RUA QUINZE DE NOVEMBRO - 394', 'sem-foto.jpg', '2024-01-24', '2005-02-24', '2', '', '0000-00-00', '4', 'Sim', '3', '');
INSERT INTO `membros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `data_cad`, `data_nasc`, `igreja`, `obs`, `data_batismo`, `cargo`, `ativo`, `lideranca`, `estado_civil`) VALUES ('8', 'Rhuan', 'rhuan_a@gmail.com', '102.115.145-44', '(62) 34546-5454', 'Rua tal...', 'sem-foto.jpg', '2024-04-02', '2024-04-02', '1', '', '0000-00-00', '1', 'Sim', '3', 'Casado');
INSERT INTO `membros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `data_cad`, `data_nasc`, `igreja`, `obs`, `data_batismo`, `cargo`, `ativo`, `lideranca`, `estado_civil`) VALUES ('9', 'Marília', 'marilia_ma@hotmail.com', '445.464.546-45', '(15) 41646-1456', 'Rua Sargento Miguel Filho', 'sem-foto.jpg', '2024-04-02', '2024-04-02', '1', '', '0000-00-00', '1', 'Sim', '4', 'Casado');
INSERT INTO `membros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `data_cad`, `data_nasc`, `igreja`, `obs`, `data_batismo`, `cargo`, `ativo`, `lideranca`, `estado_civil`) VALUES ('10', 'Edna', 'enda_32@yahoo.com.br', '415.456.464-64', '(45) 45645-6745', 'Rua pereira santos', 'sem-foto.jpg', '2024-04-02', '2024-11-05', '1', '', '0000-00-00', '1', 'Sim', '2', 'Casado');
INSERT INTO `membros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `data_cad`, `data_nasc`, `igreja`, `obs`, `data_batismo`, `cargo`, `ativo`, `lideranca`, `estado_civil`) VALUES ('11', 'Miguel', 'mig_mig@outlook.com.br', '464.654.545-64', '(56) 56645-5454', 'Rua paladino', 'sem-foto.jpg', '2024-04-02', '2024-11-05', '1', '', '0000-00-00', '4', 'Sim', '3', 'Solteiro');
INSERT INTO `membros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `data_cad`, `data_nasc`, `igreja`, `obs`, `data_batismo`, `cargo`, `ativo`, `lideranca`, `estado_civil`) VALUES ('12', 'Solange Galdino Ferreira Barbosa', 'solange_galdino@gmail.com', '154.487.878-78', '(54) 56456-7454', 'sdvdsvdsvdsvsd', '18-04-2024-11-18-55-perfil_woman_2.jpg', '2024-04-18', '2024-04-18', '2', '', '0000-00-00', '1', 'Sim', '2', '');
INSERT INTO `membros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `data_cad`, `data_nasc`, `igreja`, `obs`, `data_batismo`, `cargo`, `ativo`, `lideranca`, `estado_civil`) VALUES ('15', 'Gabriel Matos', 'hokage_mm@gmail.com.br', '445.445.654-54', '(11) 65456-4544', 'Rua tal X...', '15-06-2024-10-07-28-exmplo-jpg.jpg', '2024-05-28', '2024-11-05', '1', 'dafdsa', '0000-00-00', '1', 'Sim', '', 'Casado');
INSERT INTO `membros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `data_cad`, `data_nasc`, `igreja`, `obs`, `data_batismo`, `cargo`, `ativo`, `lideranca`, `estado_civil`) VALUES ('17', 'Caio Rodrigues Silva', 'caio_g@outlook.com.br', '423.542.356-46', '(21) 43654-3654', 'Rual Tal...', '12-06-2024-11-17-58-foto-3x4.jpg', '2024-06-12', '2024-06-12', '2', '', '0000-00-00', '3', 'Sim', '', '');
INSERT INTO `membros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `data_cad`, `data_nasc`, `igreja`, `obs`, `data_batismo`, `cargo`, `ativo`, `lideranca`, `estado_civil`) VALUES ('18', 'ertfgerg4rewfgre', 'bvfdbdtfbdfgb@gmail.com', '653.463.564-35', '(36) 54634-5654', 'gfdgredsfg', 'sem-foto.jpg', '2024-06-17', '2024-06-17', '5', '', '0000-00-00', '1', 'Sim', '', '');
INSERT INTO `membros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `data_cad`, `data_nasc`, `igreja`, `obs`, `data_batismo`, `cargo`, `ativo`, `lideranca`, `estado_civil`) VALUES ('20', 'Mariano Diniz andrade lima', 'mariano@gmail.com', '436.579.469-59', '(64) 35243-5435', '34543534534534543', '22-06-2024-11-28-55-arte-man.jpeg', '2024-06-20', '2024-11-05', '1', '', '0000-00-00', '1', 'Sim', '', 'Casado');
INSERT INTO `membros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `data_cad`, `data_nasc`, `igreja`, `obs`, `data_batismo`, `cargo`, `ativo`, `lideranca`, `estado_civil`) VALUES ('21', 'Bernardo Lima farias', 'bernardo_li_fa@gmail.com', '543.354.335-46', '(66) 54543-6543', 'gredfgfdgfd', 'sem-foto.jpg', '2024-06-20', '2024-11-05', '1', '', '0000-00-00', '1', 'Sim', '', '');
INSERT INTO `membros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `data_cad`, `data_nasc`, `igreja`, `obs`, `data_batismo`, `cargo`, `ativo`, `lideranca`, `estado_civil`) VALUES ('22', 'Samuel Goncalvez de andrade', 'samuel.gonc@yahoo.com', '623.794.623-79', '(74) 28304-7231', '', '22-06-2024-11-40-04-arte-man.jpeg', '2024-06-22', '2024-11-05', '1', '', '0000-00-00', '1', 'Sim', '', 'Solteiro');
INSERT INTO `membros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `data_cad`, `data_nasc`, `igreja`, `obs`, `data_batismo`, `cargo`, `ativo`, `lideranca`, `estado_civil`) VALUES ('24', 'Igor Matos Ferreira', 'igormattoos3@gmail.com', '180.495.427-69', '(21) 99138-9267', 'Rua Joaquim Pires Cerveira', '24-07-2024-16-13-05-minha-foto.jpg', '2024-07-24', '2024-07-24', '2', '', '2017-12-22', '1', 'Sim', '', '');
INSERT INTO `membros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `data_cad`, `data_nasc`, `igreja`, `obs`, `data_batismo`, `cargo`, `ativo`, `lideranca`, `estado_civil`) VALUES ('25', 'Flávio', 'falv_vv@gmail.com', '254.897.897-98', '(54) 85787-8597', 'fdsafsf', 'sem-foto.jpg', '2024-07-26', '2024-07-26', '2', '', '0000-00-00', '1', 'Sim', '', '');
INSERT INTO `membros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `data_cad`, `data_nasc`, `igreja`, `obs`, `data_batismo`, `cargo`, `ativo`, `lideranca`, `estado_civil`) VALUES ('35', 'Guilherme vieira', 'guilherme_agr@gmail.com', '265.544.946-56', '(14) 65456-4556', 'rua tal....', 'sem-foto.jpg', '2024-09-17', '2024-11-05', '1', '', '0000-00-00', '1', 'Sim', '', 'Solteiro');
INSERT INTO `membros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `data_cad`, `data_nasc`, `igreja`, `obs`, `data_batismo`, `cargo`, `ativo`, `lideranca`, `estado_civil`) VALUES ('48', 'asdsadsa', 'adsfdsf@gmail.com', '154.454.645-61', '(45) 64564-1641', '', 'sem-foto.jpg', '2024-09-17', '2024-11-04', '1', '', '2014-11-21', '1', 'Sim', '', 'Casado');
INSERT INTO `membros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `data_cad`, `data_nasc`, `igreja`, `obs`, `data_batismo`, `cargo`, `ativo`, `lideranca`, `estado_civil`) VALUES ('49', 'congo', 'CONGO@GMAIL.COM', '152.344.654-65', '(21) 99138-9267', 'FDSFDSF', 'sem-foto.jpg', '2024-09-17', '2024-11-14', '1', '', '0000-00-00', '1', 'Sim', '', 'Solteiro');
INSERT INTO `membros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `data_cad`, `data_nasc`, `igreja`, `obs`, `data_batismo`, `cargo`, `ativo`, `lideranca`, `estado_civil`) VALUES ('50', 'Igor Vanilla Queiroz', 'igor_vanilla746@gmail.com', '456.456.165-45', '(21) 99138-9267', '', '17-09-2024-15-49-06-drum-set-1839383_1280.jpg', '2024-09-17', '2024-11-21', '1', '', '0000-00-00', '1', 'Sim', '', 'Solteiro');
INSERT INTO `membros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `data_cad`, `data_nasc`, `igreja`, `obs`, `data_batismo`, `cargo`, `ativo`, `lideranca`, `estado_civil`) VALUES ('51', 'dsfdsfdsf', 'dsfshggdhgnff@gmail.com', '256.526.565-65', '(48) 78915-9498', '', '17-09-2024-15-51-18-image(1).jpg', '2024-09-17', '2024-11-04', '2', '', '0000-00-00', '1', 'Sim', '', '');

-- TABLE: ministerios
CREATE TABLE `ministerios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `dias` varchar(150) NOT NULL,
  `hora` varchar(100) NOT NULL,
  `local` varchar(100) DEFAULT NULL,
  `pastor` int(11) DEFAULT NULL,
  `lider1` int(11) DEFAULT NULL,
  `lider2` int(11) DEFAULT NULL,
  `obs` text DEFAULT NULL,
  `igreja` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `ministerios` (`id`, `nome`, `dias`, `hora`, `local`, `pastor`, `lider1`, `lider2`, `obs`, `igreja`) VALUES ('1', 'Ministério de Som', 'Segunda-Feira', 'Das 18:30 às 21:00', '', '0', '56', '0', 'dawsdas', '1');
INSERT INTO `ministerios` (`id`, `nome`, `dias`, `hora`, `local`, `pastor`, `lider1`, `lider2`, `obs`, `igreja`) VALUES ('2', 'Ministério de Louvor', 'Domingo', 'Das 16:00 às 18:00', '', '47', '61', '65', '', '1');

-- TABLE: ministerios_membros
CREATE TABLE `ministerios_membros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membro` int(11) NOT NULL,
  `ministerio` int(11) NOT NULL,
  `data` date NOT NULL,
  `igreja` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `ministerios_membros` (`id`, `membro`, `ministerio`, `data`, `igreja`) VALUES ('4', '49', '1', '2024-11-28', '1');
INSERT INTO `ministerios_membros` (`id`, `membro`, `ministerio`, `data`, `igreja`) VALUES ('5', '48', '1', '2024-11-28', '1');
INSERT INTO `ministerios_membros` (`id`, `membro`, `ministerio`, `data`, `igreja`) VALUES ('6', '21', '1', '2024-11-28', '1');
INSERT INTO `ministerios_membros` (`id`, `membro`, `ministerio`, `data`, `igreja`) VALUES ('7', '48', '2', '2024-11-28', '1');
INSERT INTO `ministerios_membros` (`id`, `membro`, `ministerio`, `data`, `igreja`) VALUES ('8', '21', '2', '2024-11-28', '1');

-- TABLE: movimentacoes
CREATE TABLE `movimentacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL,
  `movimento` varchar(25) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `data` date NOT NULL,
  `usuario` int(11) NOT NULL,
  `id_mov` int(11) NOT NULL,
  `igreja` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('4', 'Saída', 'Conta à Pagar', 'Conta de Luz', '252.98', '2024-01-30', '23', '1', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('5', 'Saída', 'Conta à Pagar', 'Conta Diária', '32.00', '2024-02-01', '23', '15', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('6', 'Saída', 'Conta à Pagar', 'Conta Teste 3', '356.00', '2024-02-01', '23', '17', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('13', 'Entrada', 'Dízimo', 'Vinicius Gabriel', '252.00', '2024-02-01', '23', '10', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('14', 'Entrada', 'Dízimo', 'Membro Não Informado!', '150.00', '2024-02-01', '23', '11', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('15', 'Entrada', 'Dízimo', 'Pablo Mari', '380.00', '2024-02-01', '23', '12', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('17', 'Entrada', 'Oferta', 'Rogério dos Santos', '1890.00', '2024-02-01', '23', '1', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('18', 'Entrada', 'Oferta', 'Membro Não Informado!', '260.00', '2024-02-01', '23', '2', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('19', 'Entrada', 'Oferta', 'João Victor', '460.00', '2024-02-01', '23', '3', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('21', 'Entrada', 'Oferta', 'Membro Não Informado!', '90.00', '2024-02-01', '49', '5', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('22', 'Entrada', 'Oferta', 'Rogério dos Santos', '320.00', '2024-01-30', '16', '6', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('23', 'Entrada', 'Doação', 'Rogério dos Santos', '1975.00', '2024-02-01', '16', '1', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('24', 'Entrada', 'Doação', 'Membro Não Informado!', '2300.00', '2024-01-30', '16', '2', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('26', 'Entrada', 'Venda', 'Vendas da Cantina', '258.00', '2024-01-30', '16', '1', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('27', 'Entrada', 'Venda', 'Vendas da Cantina', '400.00', '2024-02-01', '16', '2', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('28', 'Entrada', 'Venda', 'Cantina - Hambúrguer', '10.00', '2024-02-01', '16', '0', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('29', 'Saída', 'Conta à Pagar', 'Compra de Materiais para construção do Altar', '870.00', '2024-02-01', '16', '18', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('30', 'Entrada', 'Venda', 'Vendas do Domingo mais doce que o Mel (Crianças)', '210.00', '2024-02-01', '49', '3', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('31', 'Entrada', 'Venda', 'Vendas', '10.00', '2024-02-01', '49', '4', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('32', 'Saída', 'Conta à Pagar', 'Compras de equipamentos de Som', '142.63', '2024-02-01', '49', '3', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('33', 'Saída', 'Conta à Pagar', 'Aluguel', '3000.00', '2024-03-19', '16', '11', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('34', 'Saída', 'Conta à Pagar', 'Aluguel', '3000.00', '2024-04-12', '16', '21', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('35', 'Saída', 'Conta à Pagar', 'Aluguel', '3000.00', '2024-05-13', '16', '22', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('36', 'Saída', 'Conta à Pagar', 'Aluguel', '3000.00', '2024-05-23', '16', '23', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('37', 'Entrada', 'Venda', 'Compra de objetos das Eleitas (Copo)', '8.00', '2024-05-23', '16', '0', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('38', 'Saída', 'Conta à Pagar', 'Conta de Luz', '382.00', '2024-06-11', '16', '25', '1');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('39', 'Saída', 'Conta à Pagar', 'Aluguel', '3000.00', '2024-06-11', '16', '24', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('40', 'Saída', 'Conta à Pagar', 'Conta de Luz', '382.00', '2024-08-30', '16', '26', '1');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('44', 'Entrada', 'Dízimo', 'Rogério dos Santos', '10.00', '2024-11-26', '16', '17', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('45', 'Entrada', 'Oferta', 'Vinicius Gabriel', '12.00', '2024-11-26', '16', '7', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('46', 'Entrada', 'Venda', 'Vendas da feijoada', '299.00', '2024-11-26', '16', '5', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('47', 'Saída', 'Conta à Pagar', 'Conta de Luz', '203.25', '2024-11-26', '16', '31', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('48', 'Saída', 'Conta à Pagar', 'Conta de Luz', '203.25', '2024-11-26', '16', '31', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('49', 'Entrada', 'Venda', 'Evento da Igreja - 2 Anos IBMM (Camisa)', '23.00', '2024-11-26', '16', '0', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('50', 'Entrada', 'Venda', 'Venda de camisas da IBMM', '23.00', '2024-11-26', '16', '0', '2');
INSERT INTO `movimentacoes` (`id`, `tipo`, `movimento`, `descricao`, `valor`, `data`, `usuario`, `id_mov`, `igreja`) VALUES ('51', 'Entrada', 'Venda', 'Pagamento recebido do Igor pela quentinha Fitness', '23.00', '2024-11-26', '16', '0', '2');

-- TABLE: ofertas
CREATE TABLE `ofertas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `membro` varchar(50) DEFAULT NULL,
  `valor` decimal(8,2) NOT NULL,
  `data` date NOT NULL,
  `usuario` int(11) NOT NULL,
  `igreja` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `ofertas` (`id`, `membro`, `valor`, `data`, `usuario`, `igreja`) VALUES ('1', '1', '1890.00', '2024-01-30', '23', '2');
INSERT INTO `ofertas` (`id`, `membro`, `valor`, `data`, `usuario`, `igreja`) VALUES ('2', '0', '260.00', '2024-01-30', '23', '2');
INSERT INTO `ofertas` (`id`, `membro`, `valor`, `data`, `usuario`, `igreja`) VALUES ('3', '7', '460.00', '2024-01-30', '23', '2');
INSERT INTO `ofertas` (`id`, `membro`, `valor`, `data`, `usuario`, `igreja`) VALUES ('5', '0', '90.00', '2024-01-30', '49', '2');
INSERT INTO `ofertas` (`id`, `membro`, `valor`, `data`, `usuario`, `igreja`) VALUES ('6', '1', '320.00', '2024-01-30', '16', '2');
INSERT INTO `ofertas` (`id`, `membro`, `valor`, `data`, `usuario`, `igreja`) VALUES ('7', '6', '12.00', '2024-11-26', '16', '2');

-- TABLE: oracao
CREATE TABLE `oracao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) NOT NULL,
  `email` varchar(180) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `motivo_oracao` varchar(40) DEFAULT NULL,
  `descricao` text NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `status` varchar(20) NOT NULL,
  `igreja` int(11) NOT NULL,
  `usuario` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('27', 'Vicky Pereira', 'Vicky_pe43@gmail.com', 'sdfdsfsd', '8', '', '2024-08-20', '13:24:53', '', '1', '16');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('28', 'Igor Matos Ferreira', 'nonenames746@gmail.com', '219988667793', '5', 'Isso, isso, isso...', '2024-08-20', '13:25:41', '', '1', '16');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('29', 'Marília Souza', 'matheus_felipe@yahoo.com', '1456456456', '1', '', '2024-08-20', '15:22:28', '', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('30', 'Marília Souza', 'matheus_felipe@yahoo.com', '1456456456', '1', '', '2024-08-20', '15:22:28', 'Aguardando', '1', '16');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('31', 'Ofertas', 'asdsadas@gmail.com', '5645645645645', '1', '', '2024-08-20', '15:22:56', 'Aguardando', '1', '16');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('32', 'Jhennifer Mirin', 'jhenni_jhenni@outlook.com', '156456456456', '9', 'Gostaria de pedir oração pelo mover de Deus sobre a minha vida', '2024-08-20', '15:37:41', 'Aguardando', '1', '16');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('33', 'Naomi Nyori', 'naomi7&@hotmail.com', '15456156165', '7', '', '2024-08-20', '15:52:37', 'Aguardando', '1', '16');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('34', 'Mirella camarim', 'morella_@gmail.com', '12121225225', '6', '', '2024-08-20', '16:43:55', 'Aguardando', '1', '16');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('35', 'Milena Rodrigues', 'milena_rod@gmail.com', '(45) 77879-7878', '6', 'dsada', '2024-08-27', '09:26:01', 'Aguardando', '1', '16');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('36', 'Jackson Neves', 'jackson046@yahoo.com', '(21) 99758-6323', '8', 'dddd', '2024-08-27', '09:27:23', 'Aguardando', '1', '16');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('37', 'dsadsadsa', 'dsadsadsa@gmail.com', '(15) 45464-8494', '1', '', '2024-08-28', '15:26:05', 'Aguardando', '1', '16');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('38', 'Vicky Pereira', 'vicky_silva@gmail.com', '(21) 99637-1154', '9', '', '2024-08-28', '16:51:27', 'Aguardando', '1', '16');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('39', 'dsadasdas', 'asdass@gmail.com', '(78) 79848-7978', '8', '', '2024-08-29', '10:27:11', 'Aguardando', '2', '16');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('40', 'dsfdsfsdf', 'sdfdsfsd@gmail.com', '(48) 46478-7474', '1', '', '2024-08-29', '10:30:31', 'Aguardando', '2', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('41', 'Solange', 'fndsofdos@gmail.com', '(44) 56456-4641', '5', '', '2024-08-29', '10:31:05', 'Concluída', '2', '24');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('42', 'dadasd', 'asdsadsa@gmail.com', '(48) 97154-5945', '6', '', '2024-08-28', '14:24:44', 'Concluída', '1', '16');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('43', 'Nikolas Pedro', 'nik_45@gmail.com', '(55) 98878-7897', '8', '', '2024-09-02', '09:00:15', 'Concluída', '1', '16');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('44', 'dsad', 'sdfsdfsd@gmail.com', '(78) 74594-8784', '1', '', '2024-09-12', '10:01:42', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('45', 'dsafcxvcbvc', 'bgfhnfgn@yahoo.com', '(75) 14536-5445', '9', '', '2024-09-12', '10:03:12', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('46', 'gfdsvgfd', 'dffddiw0-q@yahoo.com', '(45) 87877-8978', '6', '', '2024-09-12', '10:06:34', 'Aguardando', '0', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('47', 'fgfdgd', 'fdgfdgfd@gmail.com', '(21) 22415-1456', '1', 'fdsfdsf', '2024-09-17', '11:26:22', 'Aguardando', '2', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('48', 'santana', 'santana@yahoo.com', '(65) 45645-6456', '6', 'sdfdsfs', '2024-09-17', '11:27:56', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('49', 'dsafds', 'fdsfds@gmail.com', '(23) 21556-5615', '1', 'dsfds', '2024-09-17', '11:31:10', 'Aguardando', '0', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('50', 'dsfdsf', 'dsfdsfs@gmail.com', '(15) 64984-9549', '5', 'dsfs', '2024-09-17', '11:35:26', 'Aguardando', '0', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('51', 'dsfdsf', 'dsfdsfs@gmail.com', '(15) 64984-9549', '5', 'dsfs', '2024-09-17', '11:35:49', 'Aguardando', '0', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('52', 'dsfdsf', 'dsfdsfs@gmail.com', '(15) 64984-9549', '5', 'dsfs', '2024-09-17', '11:35:49', 'Aguardando', '0', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('53', 'dsafdsfsd', 'fsdfsd@gmail.com', '(56) 46545-6456', '5', 'sadsadasd', '2024-09-17', '11:36:05', 'Aguardando', '2', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('54', 'dfs', 'fdsfds@hotmail.com', '(45) 45646-4156', '6', 'fdsfs', '2024-09-17', '11:36:54', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('55', 'asdasd', 'asdsad@yahoo.com', 'asdsa', '9', 'dsfds', '2024-09-17', '11:47:19', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('56', 'dsfds', 'fsdfdsf@gmail.com', 'dsfsdfds', '7', 'sdfs', '2024-09-30', '10:10:43', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('57', 'dfds', 'fdsfs@hotmail.com', '4154545646', '5', 'dsvsd', '2024-09-30', '10:11:36', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('58', 'fdsfsd', 'fsdfs@gmail.com', '45455456', '6', 'fds', '2024-09-30', '10:14:17', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('59', 'dsfsdfsd', 'fsdfdsbgdb@gmail.com', '53456456456', '9', 'dsfds', '2024-09-30', '10:23:18', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('60', 'dasfds', 'fbgfbf@yahoo.com', '53', '1', '', '2024-09-30', '10:31:24', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('61', 'dasfds', 'fbgfbf@yahoo.com', '5353.56.21', '7', 'dsa', '2024-09-30', '10:31:29', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('62', 'dasfds', 'fbgfbf@yahoo.com', '5353.56.21', '7', 'dsa', '2024-09-30', '10:31:30', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('63', 'dasfds', 'fbgfbf@yahoo.com', '5353.56.21', '7', 'dsa', '2024-09-30', '10:31:38', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('64', 'dsadas', 'asda@outlook.com', '5656.45.', '5', 'sadas', '2024-09-30', '10:35:36', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('65', 'sadsad', 'asdas@gmail.com', '456456', '5', 'dsfs', '2024-09-30', '10:39:25', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('66', 'dsadsa', 'dsad@gmail.com', 'fdcs45fsd', '6', 'dsfs', '2024-09-30', '10:40:05', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('67', 'dsadsa', 'dsad@gmail.com', 'fdcs45fsd', '6', 'dsfs', '2024-09-30', '10:41:50', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('68', 'dsadsa', 'dsad@gmail.com', 'fdcs45fsd', '6', 'dsfs', '2024-09-30', '10:41:53', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('69', 'dsadsa', 'dsad@gmail.com', 'fdcs45fsd', '6', 'dsfs', '2024-09-30', '10:41:53', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('70', 'dsadsa', 'dsad@gmail.com', 'fdcs45fsd', '6', 'dsfs', '2024-09-30', '10:41:54', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('71', 'dsadsa', 'dsad@gmail.com', 'fdcs45fsd', '6', 'dsfs', '2024-09-30', '10:41:54', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('72', 'dsadsa', 'dsada@gmail.com', '41456456456', '1', 'sad', '2024-09-30', '10:42:47', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('73', 'sadasdas', 'dsadsa@gmail.com', '4454545', '1', 'asdas', '2024-09-30', '10:43:14', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('74', 'sadsad', 'asdas@gmail.com', 'asdas', '1', 'dasda', '2024-09-30', '10:43:45', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('75', 'dasdsa', 'dsa@gmail.com', '142354154', '5', 'asdsa', '2024-09-30', '10:44:52', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('76', 'asdsad', 'sadsa@gmail.com', '023121261561', '1', 'dsad', '2024-09-30', '10:45:14', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('77', 'sadsa', 'dsad@gmail.com', '45645646', '5', 'sadas', '2024-09-30', '10:56:06', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('78', 'sadsad', 'fdcasf@gmai.com', '265564156', '6', 'dsfds', '2024-09-30', '11:01:01', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('79', 'dsadsad', 'sadsa@gmail.com', '12564165456', '6', 'dasd', '2024-09-30', '11:02:07', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('80', 'dsafdsa', 'fdsf@gmail.com', '454456456', '6', 'dsad', '2024-09-30', '11:04:32', 'Aguardando', '1', '0');
INSERT INTO `oracao` (`id`, `nome`, `email`, `telefone`, `motivo_oracao`, `descricao`, `data`, `hora`, `status`, `igreja`, `usuario`) VALUES ('81', 'asda', 'sdsa@gmail.com', '154156415646', '8', 'fdas', '2024-09-30', '11:07:15', 'Aguardando', '1', '0');

-- TABLE: pagar
CREATE TABLE `pagar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) DEFAULT NULL,
  `fornecedor` int(11) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `data` date NOT NULL,
  `vencimento` date NOT NULL,
  `usuario_cad` int(11) NOT NULL,
  `usuario_baixa` int(11) NOT NULL,
  `data_baixa` date DEFAULT NULL,
  `frequencia` int(11) NOT NULL,
  `pago` varchar(5) NOT NULL,
  `arquivo` varchar(150) DEFAULT NULL,
  `igreja` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `pagar` (`id`, `descricao`, `fornecedor`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `frequencia`, `pago`, `arquivo`, `igreja`) VALUES ('1', 'Conta de Luz', '0', '252.98', '2024-01-29', '2024-01-30', '16', '23', '2024-01-30', '0', 'Sim', '29-01-2024-16-56-26-historico_201910554_21122023193945.pdf', '2');
INSERT INTO `pagar` (`id`, `descricao`, `fornecedor`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `frequencia`, `pago`, `arquivo`, `igreja`) VALUES ('2', 'Conta de Água', '0', '185.35', '2024-01-29', '2024-01-31', '16', '0', '', '0', 'Não', '05-02-2024-16-06-45-logo.jpg', '2');
INSERT INTO `pagar` (`id`, `descricao`, `fornecedor`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `frequencia`, `pago`, `arquivo`, `igreja`) VALUES ('3', 'Compras de equipamentos de Som', '1', '142.63', '2024-01-29', '2024-01-29', '16', '49', '2024-02-01', '0', 'Sim', '29-01-2024-16-57-43-src-20230118T113429Z-001.zip', '2');
INSERT INTO `pagar` (`id`, `descricao`, `fornecedor`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `frequencia`, `pago`, `arquivo`, `igreja`) VALUES ('4', 'Compra de cadeiras ', '2', '296.00', '2024-01-29', '2024-01-29', '16', '0', '', '0', 'Não', '05-02-2024-16-07-12-logo-2.jpg', '2');
INSERT INTO `pagar` (`id`, `descricao`, `fornecedor`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `frequencia`, `pago`, `arquivo`, `igreja`) VALUES ('5', 'Compras dos materias da faixada da igreja', '0', '589.00', '2024-01-29', '2024-01-31', '16', '0', '', '7', 'Não', 'sem-foto.jpg', '2');
INSERT INTO `pagar` (`id`, `descricao`, `fornecedor`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `frequencia`, `pago`, `arquivo`, `igreja`) VALUES ('10', 'Aluguel', '2', '3000.00', '2024-01-29', '2024-01-26', '16', '23', '2024-01-29', '30', 'Sim', '29-01-2024-17-06-11-historico_201910554_21122023193945.pdf', '2');
INSERT INTO `pagar` (`id`, `descricao`, `fornecedor`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `frequencia`, `pago`, `arquivo`, `igreja`) VALUES ('11', 'Aluguel', '2', '3000.00', '2024-01-29', '2024-02-26', '23', '16', '2024-03-19', '30', 'Sim', '29-01-2024-17-06-11-historico_201910554_21122023193945.pdf', '2');
INSERT INTO `pagar` (`id`, `descricao`, `fornecedor`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `frequencia`, `pago`, `arquivo`, `igreja`) VALUES ('12', 'Limpeza da Igreja', '2', '220.00', '2024-01-29', '2024-01-29', '23', '23', '2024-01-29', '7', 'Sim', 'sem-foto.jpg', '2');
INSERT INTO `pagar` (`id`, `descricao`, `fornecedor`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `frequencia`, `pago`, `arquivo`, `igreja`) VALUES ('13', 'Limpeza da Igreja', '2', '220.00', '2024-01-29', '2024-02-05', '23', '0', '', '7', 'Não', 'sem-foto.jpg', '2');
INSERT INTO `pagar` (`id`, `descricao`, `fornecedor`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `frequencia`, `pago`, `arquivo`, `igreja`) VALUES ('14', 'Conta Diária', '0', '32.00', '2024-01-29', '2024-01-29', '23', '23', '2024-01-29', '1', 'Sim', 'sem-foto.jpg', '2');
INSERT INTO `pagar` (`id`, `descricao`, `fornecedor`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `frequencia`, `pago`, `arquivo`, `igreja`) VALUES ('15', 'Conta Diária', '0', '32.00', '2024-01-29', '2024-01-30', '23', '23', '2024-01-30', '1', 'Sim', 'sem-foto.jpg', '2');
INSERT INTO `pagar` (`id`, `descricao`, `fornecedor`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `frequencia`, `pago`, `arquivo`, `igreja`) VALUES ('16', 'Conta Diária', '0', '32.00', '2024-01-30', '2024-01-31', '23', '0', '', '1', 'Não', 'sem-foto.jpg', '2');
INSERT INTO `pagar` (`id`, `descricao`, `fornecedor`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `frequencia`, `pago`, `arquivo`, `igreja`) VALUES ('17', 'Conta Teste 3', '1', '356.00', '2024-01-30', '2024-01-30', '23', '23', '2024-01-30', '0', 'Sim', 'sem-foto.jpg', '2');
INSERT INTO `pagar` (`id`, `descricao`, `fornecedor`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `frequencia`, `pago`, `arquivo`, `igreja`) VALUES ('18', 'Compra de Materiais para construção do Altar', '1', '870.00', '2024-02-01', '2024-02-01', '16', '16', '2024-02-01', '0', 'Sim', 'sem-foto.jpg', '2');
INSERT INTO `pagar` (`id`, `descricao`, `fornecedor`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `frequencia`, `pago`, `arquivo`, `igreja`) VALUES ('19', 'Conta de Telefone', '0', '210.00', '2024-02-01', '2024-02-01', '49', '0', '', '0', 'Não', '01-02-2024-14-38-59-Como-Construir-uma-Intranet-que-Impulsione-a-Produtividade.pdf', '2');
INSERT INTO `pagar` (`id`, `descricao`, `fornecedor`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `frequencia`, `pago`, `arquivo`, `igreja`) VALUES ('20', 'Compra de microfones da Igreja', '0', '1500.00', '2024-02-01', '2024-02-01', '49', '0', '', '0', 'Não', 'sem-foto.jpg', '2');
INSERT INTO `pagar` (`id`, `descricao`, `fornecedor`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `frequencia`, `pago`, `arquivo`, `igreja`) VALUES ('21', 'Aluguel', '2', '3000.00', '2024-03-19', '2024-03-26', '16', '16', '2024-04-12', '30', 'Sim', '29-01-2024-17-06-11-historico_201910554_21122023193945.pdf', '2');
INSERT INTO `pagar` (`id`, `descricao`, `fornecedor`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `frequencia`, `pago`, `arquivo`, `igreja`) VALUES ('22', 'Aluguel', '2', '3000.00', '2024-04-12', '2024-04-26', '16', '16', '2024-05-13', '30', 'Sim', '29-01-2024-17-06-11-historico_201910554_21122023193945.pdf', '2');
INSERT INTO `pagar` (`id`, `descricao`, `fornecedor`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `frequencia`, `pago`, `arquivo`, `igreja`) VALUES ('23', 'Aluguel', '2', '3000.00', '2024-05-13', '2024-05-26', '16', '16', '2024-05-23', '30', 'Sim', '29-01-2024-17-06-11-historico_201910554_21122023193945.pdf', '2');
INSERT INTO `pagar` (`id`, `descricao`, `fornecedor`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `frequencia`, `pago`, `arquivo`, `igreja`) VALUES ('24', 'Aluguel', '2', '3000.00', '2024-05-23', '2024-06-26', '16', '16', '2024-06-11', '30', 'Sim', '29-01-2024-17-06-11-historico_201910554_21122023193945.pdf', '2');
INSERT INTO `pagar` (`id`, `descricao`, `fornecedor`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `frequencia`, `pago`, `arquivo`, `igreja`) VALUES ('25', 'Conta de Luz', '0', '382.00', '2024-06-11', '2024-06-04', '16', '16', '2024-06-11', '30', 'Sim', '11-06-2024-11-25-55-Arquivos.zip', '1');
INSERT INTO `pagar` (`id`, `descricao`, `fornecedor`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `frequencia`, `pago`, `arquivo`, `igreja`) VALUES ('26', 'Conta de Luz', '0', '382.00', '2024-06-11', '2024-07-04', '16', '16', '2024-08-30', '30', 'Sim', '11-06-2024-11-25-55-Arquivos.zip', '1');
INSERT INTO `pagar` (`id`, `descricao`, `fornecedor`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `frequencia`, `pago`, `arquivo`, `igreja`) VALUES ('27', 'Aluguel', '0', '3000.00', '2024-06-11', '2024-07-26', '16', '0', '', '30', 'Não', '29-01-2024-17-06-11-historico_201910554_21122023193945.pdf', '2');
INSERT INTO `pagar` (`id`, `descricao`, `fornecedor`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `frequencia`, `pago`, `arquivo`, `igreja`) VALUES ('28', 'Conta de Luz', '0', '382.00', '2024-08-30', '2024-08-04', '16', '0', '', '30', 'Não', '11-06-2024-11-25-55-Arquivos.zip', '1');
INSERT INTO `pagar` (`id`, `descricao`, `fornecedor`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `frequencia`, `pago`, `arquivo`, `igreja`) VALUES ('31', 'Conta de Luz', '0', '203.25', '2024-11-26', '2024-11-26', '16', '16', '2024-11-26', '0', 'Sim', 'sem-foto.jpg', '2');

-- TABLE: pastores
CREATE TABLE `pastores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `data_cad` date DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `igreja` int(11) NOT NULL,
  `obs` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `pastores` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `data_cad`, `data_nasc`, `igreja`, `obs`) VALUES ('1', 'Super Administrador', 'contato@ibmissaomultiplicar.com.br', '000.000.000-00', '(21)998867793', '', 'sem-foto.jpg', '0000-00-00', '2024-11-21', '1', '');
INSERT INTO `pastores` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `data_cad`, `data_nasc`, `igreja`, `obs`) VALUES ('4', 'Pastor Osiel Gomes', 'pastor_marcos@hotmail.com', '164.854.489-49', '(15) 49489-4894', 'dwdefsfd', '29-01-2024-16-17-48-Pr_Osiel_Gomes_.png', '2024-01-22', '0000-00-00', '2', '');
INSERT INTO `pastores` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `data_cad`, `data_nasc`, `igreja`, `obs`) VALUES ('5', 'Pastor Silva Tadesco', 'pastor_tadesco@hotmail.com', '156.415.454-54', '(14) 54548-9498', 'dsadsadasda', 'sem-foto.jpg', '2024-01-22', '0000-00-00', '2', '');
INSERT INTO `pastores` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `data_cad`, `data_nasc`, `igreja`, `obs`) VALUES ('6', 'Pastor Silva Rodrigues', 'pastor_silva_r@gmail.com', '236.262.652-65', '(14) 61545-6454', '', '25-01-2024-11-09-27-user.jpg', '2024-01-22', '2024-11-14', '1', 'sdadsadsadsa');

-- TABLE: pastores_presidentes
CREATE TABLE `pastores_presidentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `pastores_presidentes` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`) VALUES ('1', 'Pastor Presidente', 'pastor_presidente@gmail.com', '000.000.000-00', '(21)998867793', 'Rua tal, endereço tal', '15-10-2024-14-29-23-Logo-IBMM.png');
INSERT INTO `pastores_presidentes` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`) VALUES ('20', 'Igor Ferreira', 'igormattoos3@gmail.com', '180.495.427-69', '(85) 78974-9489', 'Rua Buenos Aires 342', 'sem-foto.jpg');

-- TABLE: patrimonios
CREATE TABLE `patrimonios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `valor` decimal(8,2) NOT NULL,
  `foto` varchar(150) NOT NULL,
  `usuario_cad` int(11) NOT NULL,
  `data_cad` date NOT NULL,
  `igreja_cad` int(11) NOT NULL,
  `igreja_item` int(11) NOT NULL,
  `usuario_emprestou` int(11) NOT NULL,
  `data_emprestimo` date DEFAULT NULL,
  `ativo` varchar(5) NOT NULL,
  `obs` text DEFAULT NULL,
  `entrada` varchar(15) NOT NULL,
  `doador` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `patrimonios` (`id`, `codigo`, `nome`, `descricao`, `valor`, `foto`, `usuario_cad`, `data_cad`, `igreja_cad`, `igreja_item`, `usuario_emprestou`, `data_emprestimo`, `ativo`, `obs`, `entrada`, `doador`) VALUES ('3', '0001', 'Ar Condicionado', 'Ar Condicionado - LG x700 35000 BTU', '4200.00', '18-04-2024-15-03-54-ar-condicionado.jpg', '16', '2024-03-20', '2', '2', '16', '2024-03-21', 'Não', 'Este Ar Condicionado está com defeito!\r\n', 'Compra', '');
INSERT INTO `patrimonios` (`id`, `codigo`, `nome`, `descricao`, `valor`, `foto`, `usuario_cad`, `data_cad`, `igreja_cad`, `igreja_item`, `usuario_emprestou`, `data_emprestimo`, `ativo`, `obs`, `entrada`, `doador`) VALUES ('5', '0002', 'Notebook', 'Notebook I7, 2º Geração, 16GB, Memória RAM e HD de 500GB', '0.00', '18-04-2024-15-03-19-notebook.jpg', '16', '2024-03-20', '1', '2', '16', '2024-03-21', 'Sim', 'Notebook em ótimo estado e estamos utilizando ele para transmitir as Lives da Igreja.', 'Doação', 'Ryan Marques (Membro)');
INSERT INTO `patrimonios` (`id`, `codigo`, `nome`, `descricao`, `valor`, `foto`, `usuario_cad`, `data_cad`, `igreja_cad`, `igreja_item`, `usuario_emprestou`, `data_emprestimo`, `ativo`, `obs`, `entrada`, `doador`) VALUES ('6', '0003', 'Caixa de Som', 'Caixa de Som (P.A)', '782.00', '21-03-2024-16-26-26-Ronaldo.jpg', '16', '2024-03-21', '1', '1', '23', '2024-03-21', 'Não', 'Esta caixa de som está em um ótimo estado e poderá ser utilizada em eventos de evangelismos.', 'Compra', '');
INSERT INTO `patrimonios` (`id`, `codigo`, `nome`, `descricao`, `valor`, `foto`, `usuario_cad`, `data_cad`, `igreja_cad`, `igreja_item`, `usuario_emprestou`, `data_emprestimo`, `ativo`, `obs`, `entrada`, `doador`) VALUES ('7', '0004', 'Microfone e Caixinha', 'Microfone e Caixinha do microfone', '520.00', '18-04-2024-15-02-23-microfone-e-caixinha.jpg', '23', '2024-04-19', '2', '1', '16', '2024-04-19', 'Sim', 'fdgfdgfdgfdgfdgfd', 'Compra', '');
INSERT INTO `patrimonios` (`id`, `codigo`, `nome`, `descricao`, `valor`, `foto`, `usuario_cad`, `data_cad`, `igreja_cad`, `igreja_item`, `usuario_emprestou`, `data_emprestimo`, `ativo`, `obs`, `entrada`, `doador`) VALUES ('8', '0005', 'Cadeira de Escritório', 'Cadeira de Escritório para o Som', '250.00', '18-04-2024-14-59-59-cadeira-de-escritório.jpg', '23', '2024-03-21', '2', '1', '16', '2024-03-21', 'Sim', '', 'Compra', '');
INSERT INTO `patrimonios` (`id`, `codigo`, `nome`, `descricao`, `valor`, `foto`, `usuario_cad`, `data_cad`, `igreja_cad`, `igreja_item`, `usuario_emprestou`, `data_emprestimo`, `ativo`, `obs`, `entrada`, `doador`) VALUES ('9', '0006', 'FNDGFDGFD', 'SDFSFSDFSD', '165.00', 'sem-foto.jpg', '25', '2024-03-21', '1', '2', '16', '2024-06-20', 'Sim', '', 'Compra', '');
INSERT INTO `patrimonios` (`id`, `codigo`, `nome`, `descricao`, `valor`, `foto`, `usuario_cad`, `data_cad`, `igreja_cad`, `igreja_item`, `usuario_emprestou`, `data_emprestimo`, `ativo`, `obs`, `entrada`, `doador`) VALUES ('10', '544699', 'dsadsa', 'dasdsa', '45.00', 'sem-foto.jpg', '16', '2024-04-19', '2', '2', '0', '', 'Sim', '', 'Compra', '');

-- TABLE: receber
CREATE TABLE `receber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) DEFAULT NULL,
  `membro` int(11) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `data` date NOT NULL,
  `vencimento` date NOT NULL,
  `usuario_cad` int(11) NOT NULL,
  `usuario_baixa` int(11) NOT NULL,
  `data_baixa` date DEFAULT NULL,
  `pago` varchar(5) NOT NULL,
  `igreja` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `receber` (`id`, `descricao`, `membro`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `pago`, `igreja`) VALUES ('1', 'Cantina - Hambúrguer', '1', '10.00', '2024-01-30', '2024-02-02', '16', '16', '2024-01-31', 'Sim', '2');
INSERT INTO `receber` (`id`, `descricao`, `membro`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `pago`, `igreja`) VALUES ('2', 'Evento da Igreja - 2 Anos IBMM (Camisa)', '7', '23.00', '2024-01-30', '2024-01-16', '16', '16', '2024-11-26', 'Sim', '2');
INSERT INTO `receber` (`id`, `descricao`, `membro`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `pago`, `igreja`) VALUES ('4', 'Venda de Bolinhos', '5', '25.00', '2024-01-31', '2024-01-31', '16', '0', '', 'Não', '2');
INSERT INTO `receber` (`id`, `descricao`, `membro`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `pago`, `igreja`) VALUES ('5', 'Venda de camisas da IBMM', '1', '23.00', '2024-01-31', '2024-01-31', '16', '16', '2024-11-26', 'Sim', '2');
INSERT INTO `receber` (`id`, `descricao`, `membro`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `pago`, `igreja`) VALUES ('6', 'Compra de objetos das Eleitas (Copo)', '5', '8.00', '2024-02-01', '2024-02-01', '49', '16', '2024-05-23', 'Sim', '2');
INSERT INTO `receber` (`id`, `descricao`, `membro`, `valor`, `data`, `vencimento`, `usuario_cad`, `usuario_baixa`, `data_baixa`, `pago`, `igreja`) VALUES ('8', 'Pagamento recebido do Igor pela quentinha Fitness', '1', '23.00', '2024-11-26', '2024-11-26', '16', '16', '2024-11-26', 'Sim', '2');

-- TABLE: redes
CREATE TABLE `redes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `coordenador` int(11) NOT NULL,
  `supervisor` int(11) DEFAULT NULL,
  `imagem` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- TABLE: secretarios
CREATE TABLE `secretarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `igreja` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `secretarios` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `igreja`) VALUES ('3', 'Secretário Teste', 'secretario_teste@yahoo.com', '526.230.141-65', '(56) 56565-6565', 'cvbvcbdfbdbdfbfd', '22-06-2024-11-20-43-logo-IBMM-preta.png', '1');
INSERT INTO `secretarios` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `igreja`) VALUES ('4', 'gfndgshdsf', 'sadsafafa@gmail.com', '156.454.954-98', '(12) 54984-8948', 'dsfdsfdsfsdfds', 'sem-foto.jpg', '1');
INSERT INTO `secretarios` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `igreja`) VALUES ('5', 'bbbbbb', 'bbbbbbbb@gmail.com', '154.848.948-48', '(14) 75448-4187', '', 'sem-foto.jpg', '1');
INSERT INTO `secretarios` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `igreja`) VALUES ('6', 'vbgfbnhgnghjnhgnf', 'asdgfgbfgbfgbfg@yahoo.com', '759.874.668-48', '(48) 97877-7879', 'asdsa', 'sem-foto.jpg', '1');
INSERT INTO `secretarios` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `igreja`) VALUES ('7', 'Secretário Silva', 'secretario_s@hotmail.com', '254.594.948-49', '(21) 54564-8449', 'Rua Pedro Pomar', '22-01-2024-15-57-27-eu.jpg', '2');
INSERT INTO `secretarios` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `igreja`) VALUES ('8', 'Matheus', 'matheus_felipe@yahoo.com', '231.156.145-14', '(45) 45645-4564', 'fdsfdsfds', 'sem-foto.jpg', '1');
INSERT INTO `secretarios` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `igreja`) VALUES ('10', 'Talita amorim ribeiro', 'tati_amorim@outlook.com', '256.456.566-86', '(15) 64564-6545', 'fdsfdsfds', 'sem-foto.jpg', '2');

-- TABLE: tarefas
CREATE TABLE `tarefas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(25) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `hora` time NOT NULL,
  `data` date NOT NULL,
  `igreja` int(11) NOT NULL,
  `status` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `tarefas` (`id`, `titulo`, `descricao`, `hora`, `data`, `igreja`, `status`) VALUES ('1', 'Visita ao membro ', 'Ryan', '19:30:00', '2024-01-23', '1', 'Agendada');
INSERT INTO `tarefas` (`id`, `titulo`, `descricao`, `hora`, `data`, `igreja`, `status`) VALUES ('2', 'Reunião Emergencial', 'Conflito entre membros', '18:30:00', '2024-01-23', '1', 'Agendada');
INSERT INTO `tarefas` (`id`, `titulo`, `descricao`, `hora`, `data`, `igreja`, `status`) VALUES ('4', 'Visita ao membro', 'Victor', '10:45:00', '2024-01-24', '1', 'Agendada');
INSERT INTO `tarefas` (`id`, `titulo`, `descricao`, `hora`, `data`, `igreja`, `status`) VALUES ('5', 'Reunião', 'Reunião da Assembleia da Igreja', '10:45:00', '2024-01-22', '1', 'Concluída');
INSERT INTO `tarefas` (`id`, `titulo`, `descricao`, `hora`, `data`, `igreja`, `status`) VALUES ('6', 'Reunião', 'Com o ministério diaconal', '19:20:00', '2024-01-26', '1', 'Agendada');
INSERT INTO `tarefas` (`id`, `titulo`, `descricao`, `hora`, `data`, `igreja`, `status`) VALUES ('7', 'Visita membro', 'Vicky fdsaf fkdsfdsf gfsgfg gfd gfdgfd gd fdfdsf', '18:05:00', '2024-01-23', '1', 'Agendada');
INSERT INTO `tarefas` (`id`, `titulo`, `descricao`, `hora`, `data`, `igreja`, `status`) VALUES ('8', 'Gabinete com membro', 'Pedro', '14:00:00', '2024-01-25', '2', 'Agendada');
INSERT INTO `tarefas` (`id`, `titulo`, `descricao`, `hora`, `data`, `igreja`, `status`) VALUES ('9', 'Reunião', 'Rede Infinity', '09:30:00', '2024-01-25', '1', 'Agendada');
INSERT INTO `tarefas` (`id`, `titulo`, `descricao`, `hora`, `data`, `igreja`, `status`) VALUES ('10', 'fdkogfdkg´fd', 'gdfgdfgdf', '14:00:00', '2024-03-20', '1', 'Agendada');
INSERT INTO `tarefas` (`id`, `titulo`, `descricao`, `hora`, `data`, `igreja`, `status`) VALUES ('11', 'dafd', 'fdsfds', '10:17:00', '2024-11-29', '1', 'Agendada');

-- TABLE: tesoureiros
CREATE TABLE `tesoureiros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `igreja` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `tesoureiros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `igreja`) VALUES ('3', 'Tesoureiro Teste', 'tesoureiro_teste@hotmail.com', '032.320.303-23', '(02) 30231-2162', 'dsadsadasdsa', '17-01-2024-10-39-14-eu.jpg', '1');
INSERT INTO `tesoureiros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `igreja`) VALUES ('4', 'Jonathan Silva', 'jonathan_s@hotmail.com', '151.212.114-65', '(23) 23456-4546', '', '22-01-2024-15-49-08-eu.jpg', '2');
INSERT INTO `tesoureiros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `igreja`) VALUES ('5', 'Santos', 'santos@hotmail.com', '154.541.310-00', '(15) 46454-5645', 'Rual Joaquim Pires Cerveira', '22-01-2024-15-52-52-logo-IBMM-preta.png', '1');
INSERT INTO `tesoureiros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `igreja`) VALUES ('6', 'Pedro Moraes', 'pedromoraes@hotmail.com.br', '015.154.545-45', '(15) 41451-2010', 'Rua Figueiredo Rodolfo Filho', '22-01-2024-16-12-27-logo-IBMM-preta.png', '2');
INSERT INTO `tesoureiros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `igreja`) VALUES ('7', 'Suellen da Conceição', 'suellen_con@hotmail.com', '154.154.545-44', '(15) 44848-4848', 'Rua Sargente Miguel Filho', 'sem-foto.jpg', '2');
INSERT INTO `tesoureiros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `igreja`) VALUES ('8', 'Igor Souza', 'igor_souza033@gmail.com', '041.454.564-54', '(15) 64156-4545', 'Rua Pascoal Ninho', 'sem-foto.jpg', '2');
INSERT INTO `tesoureiros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `igreja`) VALUES ('9', 'Rodolfo Peixoto', 'rodolfo_P@hotmail.com.br', '015.445.156-15', '(44) 56456-4564', 'Rua Aguinaldo Silva', '22-01-2024-16-16-56-eu.jpg', '1');
INSERT INTO `tesoureiros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `igreja`) VALUES ('10', 'Adriano Marino', 'AdrianoM00@yahoo.com.br', '545.454.545-64', '(15) 64564-4564', 'Rua Nando Oliveira', 'sem-foto.jpg', '1');
INSERT INTO `tesoureiros` (`id`, `nome`, `email`, `cpf`, `telefone`, `endereco`, `foto`, `igreja`) VALUES ('11', 'Ninho Abrantes', 'ninho_br@hotmail.com', '512.845.456-45', '(15) 44544-5645', 'Rua amaral Andrino', 'sem-foto.jpg', '1');

-- TABLE: usuarios
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `nivel` varchar(50) NOT NULL,
  `id_pessoa` int(11) NOT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `igreja` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('16', 'Pastor Presidente', '000.000.000-00', 'pastor_presidente@gmail.com', '123', 'Pastor Presidente', '1', '15-10-2024-14-29-23-Logo-IBMM.png', '0');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('20', 'Super Administrador', '000.000.000-00', 'contato@ibmissaomultiplicar.com.br', '123', 'pastor', '1', 'sem-foto.jpg', '1');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('23', 'Pastor Osiel Gomes', '164.854.489-49', 'pastor_marcos@hotmail.com', '123', 'pastor', '4', '29-01-2024-16-17-48-Pr_Osiel_Gomes_.png', '2');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('24', 'Prª. Elineuza', '456.415.145-45', 'elineuza@yahoo.com.br', '123', 'pastor', '5', 'sem-foto.jpg', '2');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('25', 'Pastor Silva Rodrigues', '236.262.652-65', 'pastor_silva_r@gmail.com', '123', 'pastor', '6', '25-01-2024-11-09-27-user.jpg', '1');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('29', 'ofuscante', '158.645.641-64', 'fdscas@gmail.com', '123', 'pastor', '11', 'sem-foto.jpg', '1');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('34', 'Secretário Teste', '526.230.141-65', 'secretario_teste@yahoo.com', '123', 'secretario', '3', '22-06-2024-11-20-43-logo-IBMM-preta.png', '1');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('35', 'Tesoureiro Teste', '032.320.303-23', 'tesoureiro_teste@hotmail.com', '123', 'tesoureiro', '3', '17-01-2024-10-39-14-eu.jpg', '1');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('36', 'serra verdae', '151.515.645-64', 'dasdsafadfadsas@gmail.com', '123', 'pastor', '12', 'sem-foto.jpg', '1');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('46', 'gfndgshdsf', '156.454.954-98', 'sadsafafa@gmail.com', '123', 'secretario', '4', 'sem-foto.jpg', '1');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('47', 'bbbbbb', '154.848.948-48', 'bbbbbbbb@gmail.com', '123', 'secretario', '5', 'sem-foto.jpg', '1');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('48', 'vbgfbnhgnghjnhgnf', '759.874.668-48', 'asdgfgbfgbfgbfg@yahoo.com', '123', 'secretario', '6', 'sem-foto.jpg', '1');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('49', 'Jonathan Silva', '151.212.114-65', 'jonathan_s@hotmail.com', '123', 'tesoureiro', '4', '22-01-2024-15-49-08-eu.jpg', '2');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('50', 'Santos', '154.541.310-00', 'santos@hotmail.com', '123', 'tesoureiro', '5', '22-01-2024-15-52-52-logo-IBMM-preta.png', '1');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('51', 'Secretário Silva', '254.594.948-49', 'secretario_s@hotmail.com', '123', 'secretario', '7', '22-01-2024-15-57-27-eu.jpg', '2');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('52', 'Pedro Moraes', '015.154.545-45', 'pedromoraes@hotmail.com.br', '123', 'tesoureiro', '6', '22-01-2024-16-12-27-logo-IBMM-preta.png', '2');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('53', 'Suellen da Conceição', '154.154.545-44', 'suellen_con@hotmail.com', '123', 'tesoureiro', '7', 'sem-foto.jpg', '2');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('54', 'Igor Souza', '041.454.564-54', 'igor_souza033@gmail.com', '123', 'tesoureiro', '8', 'sem-foto.jpg', '2');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('55', 'Rodolfo Peixoto', '015.445.156-15', 'rodolfo_P@hotmail.com.br', '123', 'tesoureiro', '9', '22-01-2024-16-16-56-eu.jpg', '1');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('56', 'Adriano Marino', '545.454.545-64', 'AdrianoM00@yahoo.com.br', '123', 'tesoureiro', '10', 'sem-foto.jpg', '1');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('57', 'Ninho Abrantes', '512.845.456-45', 'ninho_br@hotmail.com', '123', 'tesoureiro', '11', 'sem-foto.jpg', '1');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('58', 'Matheus', '231.156.145-14', 'matheus_felipe@yahoo.com', '123', 'secretario', '8', 'sem-foto.jpg', '1');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('61', 'Gabriel Matos', '445.445.654-54', 'hokage_mm@gmail.com.br', '123', 'membro', '15', 'sem-foto.jpg', '1');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('63', 'Mariano Diniz andrade lima', '436.579.469-59', 'mariano@gmail.com', '123', 'membro', '20', '22-06-2024-11-28-55-arte-man.jpeg', '1');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('65', 'Bernardo Lima farias', '543.354.335-46', 'bernardo_li_fa@gmail.com', '123', 'membro', '21', 'sem-foto.jpg', '1');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('67', 'Samuel Goncalvez de andrade', '623.794.623-79', 'samuel.gonc@yahoo.com', '123', 'membro', '22', '22-06-2024-11-40-04-arte-man.jpeg', '1');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('68', 'fdspfdsp', '123.415.456-45', 'sdfsdfs@yahoo.com', '123', 'membro', '23', '24-07-2024-16-11-34-minha-foto.jpg', '2');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('69', 'Igor Matos Ferreira', '180.495.427-69', 'igormattoos3@gmail.com', '123', 'membro', '24', '24-07-2024-16-13-05-minha-foto.jpg', '2');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('70', 'Flávio', '254.897.897-98', 'falv_vv@gmail.com', '123', 'membro', '25', 'sem-foto.jpg', '2');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('71', 'Talita amorim ribeiro', '256.456.566-86', 'tati_amorim@outlook.com', '123', 'secretario', '10', 'sem-foto.jpg', '2');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('72', 'Guilherme vieira', '265.544.946-56', 'guilherme_agr@gmail.com', '123', 'membro', '35', 'sem-foto.jpg', '1');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('85', 'asdsadsa', '154.454.645-61', 'adsfdsf@gmail.com', '123', 'membro', '48', 'sem-foto.jpg', '1');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('86', 'congo', '152.344.654-65', 'CONGO@GMAIL.COM', '123', 'membro', '49', 'sem-foto.jpg', '1');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('87', 'Igor Vanilla Queiroz', '456.456.165-45', 'igor_vanilla746@gmail.com', '123', 'membro', '50', '17-09-2024-15-49-06-drum-set-1839383_1280.jpg', '1');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('88', 'dsfdsfdsf', '256.526.565-65', 'dsfshggdhgnff@gmail.com', '123', 'membro', '51', '17-09-2024-15-51-18-image(1).jpg', '2');
INSERT INTO `usuarios` (`id`, `nome`, `cpf`, `email`, `senha`, `nivel`, `id_pessoa`, `foto`, `igreja`) VALUES ('90', 'Igor Ferreira', '180.495.427-69', 'igormattoos3@gmail.com', '12345', 'Pastor Presidente', '20', 'sem-foto.jpg', '0');

-- TABLE: usuarios_permissoes
CREATE TABLE `usuarios_permissoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `permissao` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=822 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('232', '23', '25');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('234', '23', '2');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('235', '23', '3');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('418', '16', '1');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('419', '16', '2');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('420', '16', '3');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('421', '16', '4');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('422', '16', '5');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('423', '16', '6');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('424', '16', '7');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('425', '16', '8');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('426', '16', '9');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('427', '16', '10');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('428', '16', '11');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('429', '16', '12');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('430', '16', '13');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('431', '16', '14');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('432', '16', '15');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('433', '16', '16');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('434', '16', '17');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('435', '16', '18');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('436', '16', '19');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('437', '16', '20');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('438', '16', '21');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('439', '16', '22');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('440', '16', '23');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('441', '16', '24');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('442', '16', '25');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('446', '57', '25');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('478', '54', '25');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('480', '60', '25');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('481', '60', '21');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('482', '61', '25');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('484', '61', '21');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('517', '67', '25');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('519', '65', '25');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('704', '67', '27');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('705', '67', '21');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('706', '63', '25');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('707', '63', '21');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('715', '70', '21');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('718', '51', '21');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('724', '34', '21');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('725', '51', '1');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('731', '68', '25');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('733', '69', '25');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('734', '68', '21');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('735', '69', '21');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('742', '51', '11');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('743', '51', '17');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('745', '51', '12');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('747', '51', '6');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('748', '51', '5');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('749', '51', '22');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('750', '70', '25');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('752', '71', '25');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('753', '71', '21');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('755', '65', '21');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('756', '24', '25');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('757', '24', '21');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('792', '25', '1');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('793', '25', '2');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('794', '25', '3');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('795', '25', '4');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('796', '25', '5');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('797', '25', '6');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('798', '25', '7');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('799', '25', '8');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('800', '25', '9');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('801', '25', '10');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('802', '25', '11');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('803', '25', '12');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('804', '25', '13');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('805', '25', '14');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('806', '25', '15');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('807', '25', '16');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('808', '25', '17');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('809', '25', '18');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('810', '25', '19');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('811', '25', '20');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('812', '25', '21');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('813', '25', '22');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('814', '25', '23');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('815', '25', '24');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('816', '25', '25');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('817', '25', '26');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('818', '25', '27');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('819', '25', '28');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('820', '25', '29');
INSERT INTO `usuarios_permissoes` (`id`, `usuario`, `permissao`) VALUES ('821', '25', '30');

-- TABLE: vendas
CREATE TABLE `vendas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descricao` varchar(100) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `data` date NOT NULL,
  `usuario` int(11) NOT NULL,
  `igreja` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `vendas` (`id`, `descricao`, `valor`, `data`, `usuario`, `igreja`) VALUES ('1', 'Vendas da Cantina', '258.00', '2024-01-30', '16', '2');
INSERT INTO `vendas` (`id`, `descricao`, `valor`, `data`, `usuario`, `igreja`) VALUES ('2', 'Vendas da Cantina', '400.00', '2024-02-01', '16', '2');
INSERT INTO `vendas` (`id`, `descricao`, `valor`, `data`, `usuario`, `igreja`) VALUES ('3', 'Vendas do Domingo mais doce que o Mel (Crianças)', '210.00', '2024-02-01', '49', '2');
INSERT INTO `vendas` (`id`, `descricao`, `valor`, `data`, `usuario`, `igreja`) VALUES ('4', 'Vendas', '10.00', '2024-02-01', '49', '2');
INSERT INTO `vendas` (`id`, `descricao`, `valor`, `data`, `usuario`, `igreja`) VALUES ('5', 'Vendas da feijoada', '299.00', '2024-11-26', '16', '2');

-- TABLE: versiculos
CREATE TABLE `versiculos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `versiculo` varchar(1000) NOT NULL,
  `capitulo` varchar(25) NOT NULL,
  `igreja` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `versiculos` (`id`, `versiculo`, `capitulo`, `igreja`) VALUES ('1', '\"Guardo a tua palavra no meu coração para não pecar contra ti\"', 'Salmos 119:11', '1');
INSERT INTO `versiculos` (`id`, `versiculo`, `capitulo`, `igreja`) VALUES ('2', 'Assim brilhe a luz de vocês diante dos homens, para que\r\nvejam as suas boas obras e glorifiquem ao Pai de vocês que\r\nestá nos céus.', 'Mateus 5:16', '1');
INSERT INTO `versiculos` (`id`, `versiculo`, `capitulo`, `igreja`) VALUES ('3', '?Vocês, porém, são geração eleita, sacerdócio real, nação santa,\r\npovo exclusivo de Deus, para anunciar as grandezas daquele\r\nque os chamou das trevas para a sua maravilhosa luz.', '1 Pedro 2:9', '1');

-- TABLE: visitantes
CREATE TABLE `visitantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `desejo` varchar(255) DEFAULT NULL,
  `igreja` int(11) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
INSERT INTO `visitantes` (`id`, `nome`, `telefone`, `endereco`, `email`, `desejo`, `igreja`, `data`) VALUES ('2', 'Igor Matos', '(21) 99138-9267', 'Rua Buenos Aires 342', 'igormattoos3@gmail.com', 'Receber visita', '1', '2024-11-28');
INSERT INTO `visitantes` (`id`, `nome`, `telefone`, `endereco`, `email`, `desejo`, `igreja`, `data`) VALUES ('3', 'Camila Souza', '(21) 51945-4894', 'Rual tal, número tal...', 'camila@gmail.com', 'Receber oração', '1', '2024-11-28');

