-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.2.0 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.12.0.7122
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para simplestock
CREATE DATABASE IF NOT EXISTS `simplestock` /*!40100 DEFAULT CHARACTER SET latin1 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `simplestock`;

-- Copiando estrutura para tabela simplestock.departamento
CREATE TABLE IF NOT EXISTS `departamento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `statusRegistro` int NOT NULL DEFAULT '1' COMMENT '1=Ativo;2=Inativo;',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `descricao` (`descricao`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela simplestock.movimentacao
CREATE TABLE IF NOT EXISTS `movimentacao` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `produto_id` int NOT NULL,
  `tipo` int NOT NULL COMMENT '1=Entrada; 11=Saida',
  `data_movimento` datetime NOT NULL DEFAULT (now()),
  `quantidade` int NOT NULL,
  `valorUnitario` decimal(14,2) NOT NULL,
  `custoUnitario` decimal(14,4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK1_produto_id` (`produto_id`),
  KEY `FK2_usuario_id` (`usuario_id`),
  CONSTRAINT `FK1_produto_id` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`),
  CONSTRAINT `FK2_usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela simplestock.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `id` int NOT NULL AUTO_INCREMENT,
  `departamento_id` int NOT NULL,
  `statusRegistro` int NOT NULL DEFAULT '1' COMMENT '1=Ativo; 2=Inativo;',
  `descricao` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `detalhes` mediumtext NOT NULL,
  `saldoEmEstoque` decimal(14,3) NOT NULL DEFAULT '0.000',
  `precoVenda` decimal(14,2) NOT NULL DEFAULT '0.00',
  `custoTotal` decimal(14,2) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `descricao` (`descricao`) USING BTREE,
  KEY `FK1_departamento_id` (`departamento_id`),
  CONSTRAINT `FK1_departamento_id` FOREIGN KEY (`departamento_id`) REFERENCES `departamento` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela simplestock.produtoimagem
CREATE TABLE IF NOT EXISTS `produtoimagem` (
  `id` int NOT NULL AUTO_INCREMENT,
  `produto_id` int NOT NULL,
  `arquivo` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK1_produtoimagem_produto_id` (`produto_id`),
  CONSTRAINT `FK1_produtoimagem_produto_id` FOREIGN KEY (`produto_id`) REFERENCES `produto` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela simplestock.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `senha` varchar(250) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `nivel` int NOT NULL DEFAULT '11' COMMENT '1=Administrador; 11=Visitante;',
  `statusRegistro` int NOT NULL DEFAULT '1' COMMENT '1=Ativo; 2=Inativo',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `email_UNIQUE` (`email`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela simplestock.usuariorecuperasenha
CREATE TABLE IF NOT EXISTS `usuariorecuperasenha` (
  `id` int NOT NULL AUTO_INCREMENT,
  `usuario_id` int NOT NULL,
  `chave` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `statusRegistro` int NOT NULL DEFAULT '1' COMMENT '1=Ativo;2=Inativo',
  `created_at` datetime NOT NULL DEFAULT (now()),
  PRIMARY KEY (`id`) USING BTREE,
  KEY `FK1_usuariorecuperacaosenha` (`usuario_id`) USING BTREE,
  CONSTRAINT `FK1_usuariorecuperacaosenha` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para trigger simplestock.movimentacao_after_delete
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='';
DELIMITER //
CREATE TRIGGER `movimentacao_after_delete` AFTER DELETE ON `movimentacao` FOR EACH ROW BEGIN
	IF OLD.tipo = 1 THEN
		UPDATE produto
		SET saldoEmEstoque = saldoEmEstoque - OLD.quantidade, 
		    custoTotal = custoTotal - (OLD.quantidade * OLD.valorUnitario)
		WHERE id = OLD.produto_id;
	ELSE
		UPDATE produto
		SET saldoEmEstoque = saldoEmEstoque + OLD.quantidade, 
		    custoTotal = custoTotal + (OLD.quantidade * OLD.valorUnitario)
		WHERE id = OLD.produto_id;
	END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Copiando estrutura para trigger simplestock.movimentacao_after_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='';
DELIMITER //
CREATE TRIGGER `movimentacao_after_insert` AFTER INSERT ON `movimentacao` FOR EACH ROW BEGIN
	IF NEW.tipo = 1 THEN
		UPDATE produto
		SET saldoEmEstoque = saldoEmEstoque + NEW.quantidade, 
		    custoTotal = custoTotal + (NEW.quantidade * NEW.valorUnitario)
		WHERE id = NEW.produto_id;
	ELSE
		UPDATE produto
		SET saldoEmEstoque = saldoEmEstoque - NEW.quantidade, 
		    custoTotal = custoTotal - (NEW.quantidade * NEW.valorUnitario)
		WHERE id = NEW.produto_id;
	END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Copiando estrutura para trigger simplestock.movimentacao_after_update
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='';
DELIMITER //
CREATE TRIGGER `movimentacao_after_update` AFTER UPDATE ON `movimentacao` FOR EACH ROW BEGIN
	/*
	* Atualiza Estoque como se estivesse excluindo o movimento
	*/
	IF OLD.tipo = 1 THEN
		UPDATE produto
		SET saldoEmEstoque = saldoEmEstoque - OLD.quantidade, 
		    custoTotal = custoTotal - (OLD.quantidade * OLD.valorUnitario)
		WHERE id = OLD.produto_id;
	ELSE
		UPDATE produto
		SET saldoEmEstoque = saldoEmEstoque + OLD.quantidade, 
		    custoTotal = custoTotal + (OLD.quantidade * OLD.valorUnitario)
		WHERE id = OLD.produto_id;
	END IF;
	
	/*
	* Atualiza o estoque com o se estivesse incluindo o movimento
	*/
	IF NEW.tipo = 1 THEN
		UPDATE produto
		SET saldoEmEstoque = saldoEmEstoque + NEW.quantidade, 
		    custoTotal = custoTotal + (NEW.quantidade * NEW.valorUnitario)
		WHERE id = NEW.produto_id;
	ELSE
		UPDATE produto
		SET saldoEmEstoque = saldoEmEstoque - NEW.quantidade, 
		    custoTotal = custoTotal - (NEW.quantidade * NEW.valorUnitario)
		WHERE id = NEW.produto_id;
	END IF;
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
