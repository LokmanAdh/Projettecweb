-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 08, 2022 at 02:05 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `approvisionnement`
--

DROP TABLE IF EXISTS `approvisionnement`;
CREATE TABLE IF NOT EXISTS `approvisionnement` (
  `A_num` int(11) NOT NULL AUTO_INCREMENT,
  `A_date` date NOT NULL,
  `F_id` int(11) NOT NULL,
  PRIMARY KEY (`A_num`),
  KEY `Approvisionnement_Fournisseur_FK` (`F_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approvisionnement`
--

INSERT INTO `approvisionnement` (`A_num`, `A_date`, `F_id`) VALUES
(12, '2021-12-04', 5),
(13, '2021-12-18', 5);

-- --------------------------------------------------------

--
-- Table structure for table `approvisionnementinfo`
--

DROP TABLE IF EXISTS `approvisionnementinfo`;
CREATE TABLE IF NOT EXISTS `approvisionnementinfo` (
  `P_reference` varchar(50) NOT NULL,
  `A_num` int(11) NOT NULL,
  `approvisionnement_quantite` int(11) NOT NULL,
  PRIMARY KEY (`P_reference`,`A_num`),
  KEY `Concerner_Approvisionnement0_FK` (`A_num`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `approvisionnementinfo`
--

INSERT INTO `approvisionnementinfo` (`P_reference`, `A_num`, `approvisionnement_quantite`) VALUES
('AAAAA', 12, 500),
('AAAAB', 12, 500),
('AAAAC', 12, 500);

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

DROP TABLE IF EXISTS `categorie`;
CREATE TABLE IF NOT EXISTS `categorie` (
  `C_reference` varchar(50) NOT NULL,
  `C_description` varchar(50) NOT NULL,
  PRIMARY KEY (`C_reference`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`C_reference`, `C_description`) VALUES
('AAA', 'IT'),
('AAB', 'Books'),
('AAC', 'Fashion'),
('AAD', 'Home&Kitchen'),
('AAF', 'School');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_nom` varchar(50) NOT NULL,
  `client_prenom` varchar(50) NOT NULL,
  `client_email` varchar(30) NOT NULL,
  `client_tel` varchar(15) NOT NULL,
  `client_addresse` varchar(30) NOT NULL,
  `client_username` varchar(15) DEFAULT NULL,
  `client_password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`client_id`, `client_nom`, `client_prenom`, `client_email`, `client_tel`, `client_addresse`, `client_username`, `client_password`) VALUES
(15, 'lok', 'ad', 'lokadadlok@gmail.com', '06', 'safi 3al lb7ar', NULL, NULL),
(17, 'test', 'test', 'hrth@gmail', '0661626101', 'Massira safi 1000', NULL, NULL),
(19, 'lokman', 'adhaim', 'lokman@gmail.com', '0661626364', 'massira', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

DROP TABLE IF EXISTS `commande`;
CREATE TABLE IF NOT EXISTS `commande` (
  `commande_num` int(11) NOT NULL AUTO_INCREMENT,
  `commande_date` date NOT NULL,
  `client_id` int(11) NOT NULL,
  PRIMARY KEY (`commande_num`),
  KEY `Commande_Client_FK` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`commande_num`, `commande_date`, `client_id`) VALUES
(5, '2021-12-24', 19);

-- --------------------------------------------------------

--
-- Table structure for table `commandeinfo`
--

DROP TABLE IF EXISTS `commandeinfo`;
CREATE TABLE IF NOT EXISTS `commandeinfo` (
  `commande_num` int(11) NOT NULL AUTO_INCREMENT,
  `P_reference` varchar(50) NOT NULL,
  `commande_quantite` int(11) NOT NULL,
  PRIMARY KEY (`commande_num`,`P_reference`),
  KEY `Commandeinfo_Produit0_FK` (`P_reference`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commandeinfo`
--

INSERT INTO `commandeinfo` (`commande_num`, `P_reference`, `commande_quantite`) VALUES
(5, 'AAAAA', 100),
(5, 'AAAAB', 100),
(5, 'AAAAC', 100);

-- --------------------------------------------------------

--
-- Table structure for table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `F_id` int(11) NOT NULL AUTO_INCREMENT,
  `F_nom` varchar(50) NOT NULL,
  `F_email` varchar(50) NOT NULL,
  `F_tel` varchar(15) NOT NULL,
  `F_addresse` varchar(30) NOT NULL,
  PRIMARY KEY (`F_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fournisseur`
--

INSERT INTO `fournisseur` (`F_id`, `F_nom`, `F_email`, `F_tel`, `F_addresse`) VALUES
(3, 'ad', 'lokadadlok@gmail.com', '0661626346', 'Massira safi'),
(5, 'Jumia', 'jumia@gmail.com', '0661626360', 'casa');

-- --------------------------------------------------------

--
-- Stand-in structure for view `pdf`
-- (See below for the actual view)
--
DROP VIEW IF EXISTS `pdf`;
CREATE TABLE IF NOT EXISTS `pdf` (
`client_id` int(11)
,`commande_num` int(11)
,`P_reference` varchar(50)
,`P_libelle` varchar(1000)
,`P_description` varchar(10000)
,`P_stock_quantite` int(11)
,`P_prix_unitaire` double
,`P_prix_achat` double
,`P_prix_vente` double
,`image` varchar(30)
,`C_reference` varchar(50)
,`commande_quantite` int(11)
,`commande_date` date
,`client_nom` varchar(50)
,`client_prenom` varchar(50)
,`client_email` varchar(30)
,`client_tel` varchar(15)
,`client_addresse` varchar(30)
,`client_username` varchar(15)
,`client_password` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `P_reference` varchar(50) NOT NULL,
  `P_libelle` varchar(1000) NOT NULL,
  `P_description` varchar(10000) NOT NULL,
  `P_stock_quantite` int(11) NOT NULL DEFAULT '0',
  `P_prix_unitaire` double NOT NULL,
  `P_prix_achat` double NOT NULL,
  `P_prix_vente` double NOT NULL,
  `image` varchar(30) NOT NULL,
  `C_reference` varchar(50) NOT NULL,
  PRIMARY KEY (`P_reference`),
  KEY `Produit_Categorie_FK` (`C_reference`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`P_reference`, `P_libelle`, `P_description`, `P_stock_quantite`, `P_prix_unitaire`, `P_prix_achat`, `P_prix_vente`, `image`, `C_reference`) VALUES
('AAAAA', 'test', 'test', 400, 100, 10000, 40000, 'AAAAA.jpg', 'AAA'),
('AAAAB', 'test', 'test', 400, 100, 10000, 40000, 'AAAAB.jpg', 'AAA'),
('AAAAC', 'f', 'f', 400, 100, 10000, 40000, 'AAAAC.jpg', 'AAA');

-- --------------------------------------------------------

--
-- Structure for view `pdf`
--
DROP TABLE IF EXISTS `pdf`;

DROP VIEW IF EXISTS `pdf`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `pdf`  AS  select `commande`.`client_id` AS `client_id`,`commandeinfo`.`commande_num` AS `commande_num`,`produit`.`P_reference` AS `P_reference`,`produit`.`P_libelle` AS `P_libelle`,`produit`.`P_description` AS `P_description`,`produit`.`P_stock_quantite` AS `P_stock_quantite`,`produit`.`P_prix_unitaire` AS `P_prix_unitaire`,`produit`.`P_prix_achat` AS `P_prix_achat`,`produit`.`P_prix_vente` AS `P_prix_vente`,`produit`.`image` AS `image`,`produit`.`C_reference` AS `C_reference`,`commandeinfo`.`commande_quantite` AS `commande_quantite`,`commande`.`commande_date` AS `commande_date`,`client`.`client_nom` AS `client_nom`,`client`.`client_prenom` AS `client_prenom`,`client`.`client_email` AS `client_email`,`client`.`client_tel` AS `client_tel`,`client`.`client_addresse` AS `client_addresse`,`client`.`client_username` AS `client_username`,`client`.`client_password` AS `client_password` from (((`produit` join `commandeinfo` on((`produit`.`P_reference` = `commandeinfo`.`P_reference`))) join `commande` on((`commandeinfo`.`commande_num` = `commande`.`commande_num`))) join `client` on((`commande`.`client_id` = `client`.`client_id`))) ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `approvisionnement`
--
ALTER TABLE `approvisionnement`
  ADD CONSTRAINT `Approvisionnement_Fournisseur_FK` FOREIGN KEY (`F_id`) REFERENCES `fournisseur` (`F_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `approvisionnementinfo`
--
ALTER TABLE `approvisionnementinfo`
  ADD CONSTRAINT `Concerner_Approvisionnement0_FK` FOREIGN KEY (`A_num`) REFERENCES `approvisionnement` (`A_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Concerner_Produit_FK` FOREIGN KEY (`P_reference`) REFERENCES `produit` (`P_reference`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `Commande_Client_FK` FOREIGN KEY (`client_id`) REFERENCES `client` (`client_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `commandeinfo`
--
ALTER TABLE `commandeinfo`
  ADD CONSTRAINT `Commandeinfo_Commande_FK` FOREIGN KEY (`commande_num`) REFERENCES `commande` (`commande_num`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Commandeinfo_Produit0_FK` FOREIGN KEY (`P_reference`) REFERENCES `produit` (`P_reference`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `Produit_Categorie_FK` FOREIGN KEY (`C_reference`) REFERENCES `categorie` (`C_reference`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
