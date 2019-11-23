-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           5.7.27-0ubuntu0.18.04.1 - (Ubuntu)
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para merp
CREATE DATABASE IF NOT EXISTS `merp` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `merp`;

-- Copiando estrutura para tabela merp.appointment
CREATE TABLE IF NOT EXISTS `appointment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `speciality` varchar(50) DEFAULT NULL,
  `date_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela merp.medicals_pacients
CREATE TABLE IF NOT EXISTS `medicals_pacients` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `medical_id` int(11) unsigned DEFAULT NULL,
  `patient_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela merp.patients
CREATE TABLE IF NOT EXISTS `patients` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `cpf` varchar(50) DEFAULT NULL,
  `sex` int(1) unsigned zerofill DEFAULT '0',
  `birthdate` date DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `health_insurance` varchar(60) DEFAULT NULL,
  `number_covenant` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

-- Copiando estrutura para tabela merp.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(60) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `specialty` varchar(100) DEFAULT NULL,
  `crm` varchar(50) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Exportação de dados foi desmarcado.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
