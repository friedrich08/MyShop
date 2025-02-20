-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2025 at 07:02 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `achat`
--

CREATE TABLE `achat` (
  `id_achat` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id_categorie` int(11) NOT NULL,
  `nom` varchar(35) NOT NULL,
  `id_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id_categorie`, `nom`, `id_produit`) VALUES
(6, 'hiver', 0),
(7, 'ete', 0),
(8, 'casual', 0),
(9, 'vestes', 0),
(10, 'business', 0),
(11, 'soiree', 0),
(12, 'sport', 0),
(13, 'autres', 0);

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `prenom` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `email`, `password`) VALUES
(1, 'Dawanou ', 'Friedrich', 'Friedrichdawanou08@gmail.com', '123'),
(2, 'Nenenor ', 'Jean', 'Nenenorj@gmail.com', '$2y$10$0mVUmQgo8FLGlanEoyzNee1DMzhIhS0ACsix2T'),
(3, 'Victor ', 'Hugo', 'victorhugo@gmail.com', '$2y$10$3UOKfVodr7/.Dqji4266ce5XbI/7OCQPTGwjZj'),
(4, 'Sam', 'Sam', 'samsam@gmail.com', '$2y$10$UsKEpMXCFrn5kP/GLG7T1uQAbi5J0JqIB8v.mq'),
(5, 'Louis', 'LeGrand', 'louis@gmail.com', '$2y$10$n2/CjPC8MNbwP8wdrhNfHuXcGmCAcdqkO0pcKS'),
(6, 'Sam', 'Sam', 'samsam@gmail.com', '$2y$10$ZuPBZVXahIyou1ZZ1Mxs4OBbSZAw8uexjLqTk8'),
(7, 'KOTO', 'Dominique ', 'dominiquekoto@gmail.com', '$2y$10$D6mmVKulOlvYyui5CdwrlOPCveoWfc5GtYpjML'),
(8, 'MOUSSOU', 'Maxime', 'moussoumaxime@gmail.com', '$2y$10$XZ4nv1BFRYPI0VG80auqTO.9nfjLIgpCH60JP/'),
(9, 'PAKOU', 'AGNILONDA', 'pakou@gail.com', '$2y$10$l1BONflITZ8C0QQE0rNCheV9RoxTRGLhBrawkl'),
(11, 'Agnilonda', 'Pakou', 'pakou@gmail.com', 'f73da44b5b26e1aeb4742b5dacd2355c9071fdb23d758'),
(12, 'hdlidhgsj', 'cvsqhbez', 'e@gmail.com', '$2y$10$SjDziwiUE7YNAVZaILTJJuFYiJMzngRPi3gM4W'),
(13, 'DEKU', 'Kodjo Parfait', 'deku@gmail.com', '$2y$10$LcaTGe/ReRVloMVEdm0eSedEzXAVDiH9v26cJP'),
(14, 'MOUSSA', 'Falila', 'falila@gmail.com', '$2y$10$NMz37fZ3kt6bY.HyHbSF8e6ol9yoTr.97FkXpY'),
(15, 'ADOM', 'martinienne', 'marti@gmail.com', '$2y$10$JwFdGy1yjFc.oifG3xWfcegLs.7OEyGURiodno'),
(16, 'Kondo', 'Koffi', 'koffikondo@gmailcom', '$2y$10$5b8ckNf1USxueCBKZ.1/1uwuZWm60SiRlKsq1PXjpmFReX6142eJS'),
(17, 'kondo', 'koffi', 'koffikondo@gmail.com', '$2y$10$xWAXMPSe91MNKbxw1XoIJeM7BlspaZwIul7m2.oK7s1HnAYPGfFti'),
(18, 'Jonathan', 'Cohen', 'cohen@gmail.com', '$2y$10$PFXKOZxbXOBo.Vomz2Sx6ua9vNtXKoPjvJn7bdRK17evj4m0143yK'),
(19, 'Robert', 'DJABAKOU', 'robert@gmail.com', '$2y$10$N.uDzAKAi7IsrTQK1jr6gOWpPvb.GXHMzxX3xBSxurz66seceVJQC'),
(20, 'AIDAM', 'Osias', 'osias@gmail.com', '$2y$10$Q.Xm/KWPomz/bIHR1sw83ugI4/82l.qfZuK85ZspdxqioTVcLi.mS');

-- --------------------------------------------------------

--
-- Table structure for table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id_fourn` int(11) NOT NULL,
  `nom_fourn` varchar(45) NOT NULL,
  `adresse_fourn` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL,
  `nom_produit` varchar(25) NOT NULL,
  `prix_produit` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id_produit`, `nom_produit`, `prix_produit`, `stock`, `image`, `id_categorie`) VALUES
(10, 'Jean Slim Fit', 3000, 10, 'jean.avif', 0),
(11, 'Robe d&#039;Été Florale', 6500, 10, 'robe ete.jpg', 6),
(12, 'Veste en Cuir', 15, 10, 'veste en cuire.avif', 0),
(13, 'T-shirt', 2000, 10, 'T-shirt.avif', 0),
(14, 'Chemise Business', 5000, 10, 'chemise.avif', 6),
(15, 'Short', 1500, 10, 'short.jpg', 0),
(16, 'Blazer Élégant', 20, 10, 'blazer.jpg', 0),
(17, 'Robe de Soirée', 10, 10, 'robe de soirée.jpg', 0),
(18, 'Pantalon Chino', 3000, 10, 'pantalon.avif', 0),
(19, 'Robe Cocktail', 6000, 10, 'robe cocktail.avif', 0),
(21, 'Jupe', 665, 541, 'uploads/67aae603b71d2.png', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achat`
--
ALTER TABLE `achat`
  ADD PRIMARY KEY (`id_achat`);

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id_categorie`),
  ADD UNIQUE KEY `nom` (`id_categorie`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id_fourn`),
  ADD UNIQUE KEY `adresse_fourn` (`adresse_fourn`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achat`
--
ALTER TABLE `achat`
  MODIFY `id_achat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id_categorie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id_fourn` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
