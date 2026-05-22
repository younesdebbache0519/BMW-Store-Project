-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2026 at 03:11 PM
-- Server version: 8.4.8
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Base_Client`
--

-- --------------------------------------------------------

--
-- Table structure for table `Client`
--

CREATE TABLE `Client` (
  `Id_Clt` int NOT NULL,
  `No_Clt` varchar(50) DEFAULT NULL,
  `Pno_Clt` varchar(50) DEFAULT NULL,
  `Age_Clt` int DEFAULT NULL,
  `Wi_Clt` varchar(50) DEFAULT NULL,
  `Tel_Clt` int DEFAULT NULL,
  `Mail_Clt` varchar(100) DEFAULT NULL,
  `Adr_Clt` varchar(255) DEFAULT NULL,
  `Mot_Clt` varchar(255) DEFAULT NULL,
  `Sexe_Clt` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Commande_produit`
--

CREATE TABLE `Commande_produit` (
  `Id_client` int DEFAULT NULL,
  `Vendeur_prod` varchar(100) DEFAULT NULL,
  `Prix_prod` varchar(50) DEFAULT NULL,
  `Ref_prod` varchar(50) DEFAULT NULL,
  `Colr_prod` varchar(50) DEFAULT NULL,
  `Qant_prod` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`Id_Clt`);

--
-- Indexes for table `Commande_produit`
--
ALTER TABLE `Commande_produit`
  ADD KEY `Id_client` (`Id_client`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Client`
--
ALTER TABLE `Client`
  MODIFY `Id_Clt` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Commande_produit`
--
ALTER TABLE `Commande_produit`
  ADD CONSTRAINT `commande_produit_ibfk_1` FOREIGN KEY (`Id_client`) REFERENCES `Client` (`Id_Clt`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
