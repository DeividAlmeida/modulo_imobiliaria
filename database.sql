SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

INSERT INTO `modulos` (`nome`, `url`, `icone`, `status`, `ordem`, `tabela`, `cod_head`, `data_atualizacao`, `chave`, `acao`)
SELECT 'Imobiliária', 'imobiliaria.php', 'icon-home', 1, 0, '', 'imobiliaria/imobiliaria.js', '2019-05-07', '72b4b1d7ce2b514a981a49b1db5790a7','{\"listagem\":[\"adicionar\",\"editar\",\"deletar\"],\"cidade\":[\"adicionar\",\"editar\",\"deletar\"],\"bairro\":[\"adicionar\",\"editar\",\"deletar\"],\"imovel\":[\"adicionar\",\"editar\",\"deletar\"],\"codigo\":[\"acessar\"],\"configuracao\":[\"acessar\"]}';

-- CATEGORIA
CREATE TABLE IF NOT EXISTS `imobiliaria_categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- CIDADE
CREATE TABLE IF NOT EXISTS `imobiliaria_cidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(255) NOT NULL,
  `descricao` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


-- BAIRRO
CREATE TABLE IF NOT EXISTS `imobiliaria_bairros` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `cidade` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- imovel
CREATE TABLE IF NOT EXISTS `imobiliaria` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `nome` varchar(255) NOT NULL,
  `resumo` text DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `codigo` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `palavras_chave` text NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `etiqueta` varchar(255) DEFAULT NULL,
  `etiqueta_cor` varchar(255) DEFAULT NULL,
  `a_consultar` enum('S', 'N') DEFAULT 'N',
  `tipo` varchar(255) DEFAULT NULL,
  `link_venda` varchar(255) DEFAULT NULL,
  `link_mapa` varchar(255) DEFAULT NULL,
  `id_imagem_capa` int(11) DEFAULT NULL,
  `btn_texto` varchar(255) DEFAULT NULL,
  `click` int(11) DEFAULT 0,
  `view` int(11) DEFAULT 0,
  `tamanho` decimal(10,2) DEFAULT NULL,
  `quartos` int(11) DEFAULT NULL,
  `andar` int(11) DEFAULT NULL,
  `banheiros` int(11) DEFAULT NULL,
  `garagem` text DEFAULT NULL,
  `mobiliado` text DEFAULT NULL,
  `pet` text DEFAULT NULL,
  `sol` text DEFAULT NULL,
  `livre` text DEFAULT NULL,
  `metro` text DEFAULT NULL,
  `ordem_manual` int(11) DEFAULT NULL,
  `count_add_cart` int(11) DEFAULT 0,
  `estado` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `taxas` text DEFAULT NULL,
  `numero` text DEFAULT NULL,
  `complemento` text DEFAULT NULL,
  `acao` varchar(255) DEFAULT NULL,
  `pesquisa` text DEFAULT NULL,
  `target_link` enum('_self','_blank') NOT NULL DEFAULT '_self'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- imovel - CATEGORIAS
CREATE TABLE IF NOT EXISTS `imobiliaria_imov_categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_imovel` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- imovel - IMAGENS
CREATE TABLE IF NOT EXISTS `imobiliaria_imov_imagens` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_imovel` int(11) NOT NULL,
  `uniq` varchar (255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- imovel - imovelS RELACIONADOS
CREATE TABLE IF NOT EXISTS `imobiliaria_imov_relacionados` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_imovel` int(11) NOT NULL,
  `id_imovel_relacionado` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- LISTAGEM
CREATE TABLE IF NOT EXISTS `imobiliaria_listas` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `titulo` varchar(255) NOT NULL,
  `ordenar_por` varchar(255) NOT NULL,
  `asc_desc` enum('ASC','DESC') NOT NULL DEFAULT 'ASC',
  `colunas` int(11) NOT NULL,
  `mostrar_paginacao` enum('S', 'N') DEFAULT 'N',
  `mostrar_filtro` enum('S', 'N') DEFAULT 'S',
  `paginacao` int(11),
  `carrocel` enum('S', 'N') DEFAULT 'N',
  `efeito` varchar(100) DEFAULT NULL,
  `tipo` enum('1', '2', '3', '4') DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;


-- LISTAGEM - CATEGORIAS
CREATE TABLE IF NOT EXISTS `imobiliaria_lista_categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `id_lista` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- CONFIGURAÇÃO DO CATALOGO
CREATE TABLE IF NOT EXISTS `imobiliaria_config` (
  `id` varchar(255) NOT NULL,
  `valor` varchar(255) DEFAULT NULL,
  UNIQUE (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO `imobiliaria_config` (`id`, `valor`) VALUES
('pagina_carrinho', ''),
('pagina_resultado_busca', ''),
('email_servidor', ''),
('email_usuario', ''),
('email_senha', ''),
('email_porta', ''),
('email_protocolo_seguranca', 'ssl'),
('email_disparo', ''),
('email_recebimento', ''),
('email_cor_bg', ''),
('email_cor_header_bg', ''),
('email_cor_header_texto', ''),
('matriz_imovel', ''),
('listagem_cor_titulo', ''),
('listagem_cor_preco', ''),
('listagem_cor_borda', ''),
('listagem_cor_botao', ''),
('listagem_cor_hover_botao', ''),
('listagem_cor_filtro', ''),
('listagem_estilo', ''),
('busca_btn_tipo', 'ambos'),
('busca_btn_cor', ''),
('busca_btn_cor_hover', ''),
('busca_btn_tamanho', 'normal'),
('btn_carrinho_cor_btn_meu_carrinho', ''),
('btn_carrinho_cor_fundo', ''),
('btn_carrinho_cor_texto', ''),
('btn_carrinho_cor_btn_ver_carrinho', ''),
('btn_carrinho_cor_hover_btn_ver_carrinho', ''),
('btn_carrinho_cor_texto_btn_ver_carrinho', ''),
('imovel_cor_titulo', ''),
('imovel_cor_texto_botao', ''),
('imovel_cor_preco', ''),
('imovel_cor_botao', ''),
('imovel_cor_hover_botao', ''),
('imovel_cor_texto_descricao', ''),
('imovel_cor_tag_categoria', ''),
('imovel_cor_texto_tag_categoria', '');

INSERT INTO `imobiliaria_config` (`id`, `valor`) VALUES
('busca_limite_pagina', '10'),
('busca_btn_cor_texto', ''),
('carrocel_cor_btn', ''),
('carrocel_cor_hover_btn', ''),
('carrocel_cor_btn_texto', ''),
('carrocel_cor_titulo', ''),
('carrocel_cor_hover_titulo', ''),
('carrocel_cor_descricao', ''),
('carrocel_cor_setas', ''),
('carrocel_cor_hover_setas', ''),
('carrinho_cor_btns', ''),
('carrinho_cor_btn_finalizar', '');

INSERT INTO `imobiliaria_categorias` (`id`, `nome`, `descricao`) VALUES (1, 'Apartamento', NULL), (2, 'Área / Terreno', NULL), (3, 'Casa', NULL), (4, 'Chácara / Sítio', NULL), (5, 'Edifício', NULL), (6, 'Lote', NULL), (7, 'Andar', NULL), (8, 'Box / Garagem ', NULL), (9, 'Galpão / Armazém', NULL), (10, 'Loja', NULL), (11, 'Loja Shopping', NULL), (12, 'Prédio Comercial', NULL), (13, 'Sala / Conjunto', NULL), (14, 'Salão', NULL), (15, 'Sobreloja', NULL);
INSERT INTO `imobiliaria_config` (`id`, `valor`) VALUES ('moeda', 'R&#x00024;');
INSERT INTO `imobiliaria_config` (`id`, `valor`) VALUES ('tipo_orcamento', 'email');
INSERT INTO `imobiliaria_config` (`id`, `valor`) VALUES ('whatsapp', '5511912345678');
