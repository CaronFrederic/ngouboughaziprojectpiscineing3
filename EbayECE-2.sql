-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 16, 2020 at 01:30 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `EbayECE`
--

-- --------------------------------------------------------

--
-- Table structure for table `Acheteurs`
--

CREATE TABLE `Acheteurs` (
  `ID` int(11) NOT NULL,
  `Mail` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Adresse1` varchar(255) NOT NULL,
  `Adresse2` varchar(255) NOT NULL,
  `Ville` varchar(255) NOT NULL,
  `CodePostal` varchar(255) NOT NULL,
  `Pays` varchar(255) NOT NULL,
  `Telephone` int(11) NOT NULL,
  `CartePaiement` varchar(255) NOT NULL,
  `NumCarte` int(11) NOT NULL,
  `NomTitu` varchar(255) NOT NULL,
  `MontantPlafond` int(11) NOT NULL,
  `DateExp` year(4) NOT NULL,
  `CodeSecu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Acheteurs`
--

INSERT INTO `Acheteurs` (`ID`, `Mail`, `Password`, `Nom`, `Adresse1`, `Adresse2`, `Ville`, `CodePostal`, `Pays`, `Telephone`, `CartePaiement`, `NumCarte`, `NomTitu`, `MontantPlafond`, `DateExp`, `CodeSecu`) VALUES
(1, 'riyad.sene@edu.ece.fr', 'riyad01', 'Sene Riyad', '2 Rue des Capucines', '', 'Paris', '75008', 'France', 604030506, 'Visa', 1234567890, 'Sene Riyad', 100000, 2025, 321),
(2, 'sam.van-kote@edu.ece.fr', 'sam01', 'Van Kote Sam', '82 Boulevard Flandrin', '', 'Lyon', '69003', 'France', 765443221, 'Mastercard', 986547885, 'Van Kote Sam', 2000, 2023, 301),
(3, 'quentin.lim@edu.ece.fr', 'quentin01', 'Lim Quentin', '1 Boulevard de la Chapelle ', '', 'Paris', '75017', 'France', 467895362, 'American Express', 567233480, 'Lim Quentin', 15000, 2022, 9673);

-- --------------------------------------------------------

--
-- Table structure for table `Administrateur`
--

CREATE TABLE `Administrateur` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) CHARACTER SET ascii NOT NULL,
  `password` varchar(255) CHARACTER SET ascii NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Administrateur`
--

INSERT INTO `Administrateur` (`ID`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `Items`
--

CREATE TABLE `Items` (
  `ID` int(11) NOT NULL,
  `Vendeur` varchar(255) CHARACTER SET ascii NOT NULL,
  `Categorie` varchar(255) CHARACTER SET ascii NOT NULL,
  `Nom` varchar(255) CHARACTER SET ascii NOT NULL,
  `Media` varchar(255) CHARACTER SET ascii NOT NULL,
  `Description` varchar(255) CHARACTER SET ascii NOT NULL,
  `Prix` int(11) NOT NULL,
  `BestOffre` tinyint(1) NOT NULL,
  `Enchere` tinyint(1) NOT NULL,
  `PrixDepart` int(11) NOT NULL,
  `AchatImediat` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Items`
--

INSERT INTO `Items` (`ID`, `Vendeur`, `Categorie`, `Nom`, `Media`, `Description`, `Prix`, `BestOffre`, `Enchere`, `PrixDepart`, `AchatImediat`) VALUES
(1, 'Ngoubou Caron', 'FOT', 'Piece commemorant Monaco 2015 ', '2euro.jpg', 'Piece de 2 euros commemorative Monaco 2015 commemorant le 800eme anniversaire de la Fondation de la Forteresse du Rocher de Monaco.\r\n- Piece qualite Belle Epreuve, vendue sous capsule dans son coffret d origine avec certificat numerote.', 1250, 0, 0, 0, 1),
(2, 'Saidani Sofiane', 'AVIP', 'Rolex Daytona', 'rolex-daytona-ref-116523.jpg', 'Rolex, Cosmograph Daytona, Ref. 116523, n G24xxx,arround 2011Legendary stainless gold and steel chronograph', 0, 0, 1, 10000, 0),
(3, 'Ghazi Said', 'BPM', 'The comedian de Maurizio Cattelan', 'banane.jpg', ' L artiste italien Maurizio Cattelan a devoile il y a quelques jours sa derniere creation baptisee The Comedian.\r\nExposee lors de l evenement artistique de Miami, la fameuse banane scotchee a attire de nombreux curieux.', 0, 0, 1, 150000, 0),
(4, 'Saidani Sofiane', 'BPM', 'Le Baiser de Stratos', 'baiser.jpg', 'L art de STRATOS est identifiable entre tous, et ses oeuvres sont avant tout l essence meme d une tendresse poetique avant d etre des sculptures', 5450, 1, 0, 0, 1),
(5, 'Ngoubou Caron', 'FOT', '1971 DUCATI 250 MARK 3', 'dcati.jpg', 'Les Ducati Mark 3 naquirent a partir du monocylindre a petit carter. En particulier, le premier modele est considere comme un magnifique exemple du design italien et exemplaires sont tres recherches par les collectionneurs du monde entier.', 7000, 1, 0, 0, 0),
(6, 'Ghazi Said', 'AVIP', 'SAC SADDLE DIOR OBLIQUE', 'diorsaddle.jpeg', 'Sac Saddle toile Dior Oblique et veau graine noir, detail boucle Christian Dior', 0, 0, 1, 2200, 0),
(7, 'Ghazi Said', 'FOT', 'Les trois mousquetaires de Alexandres Dumas', '3ousquetaires.jpg', 'Edition originale des Trois Mousquetaires, le plus celebre des romans d Alexandre Dumas ', 0, 0, 1, 12000, 0),
(8, 'Saidani Sofiane', 'BPM', 'Appareil photo numerique', '1erappareilphoto.jpeg', 'Il s agit d un des premier appareil photo numerique commercialise en 1975.Il a ete restaure et est en etat de marche.', 6800, 1, 0, 0, 0),
(9, 'Ngoubou Caron', 'AVIP', 'Nike HyperAdapt 1.0', 'retour.jpg', ' Nike Air Mag, les fameuses baskets de Retour vers le Futur. Le concept a aussi de quoi faire rever la nouvelle generation impregnee de ce classique de la culture populaire.', 15000, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Vendeurs`
--

CREATE TABLE `Vendeurs` (
  `ID` int(11) NOT NULL,
  `pseudo` varchar(255) CHARACTER SET ascii NOT NULL,
  `mail` varchar(255) CHARACTER SET ascii NOT NULL,
  `nom` varchar(255) CHARACTER SET ascii NOT NULL,
  `photo` varchar(255) CHARACTER SET ascii NOT NULL,
  `fond` varchar(255) CHARACTER SET ascii NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Vendeurs`
--

INSERT INTO `Vendeurs` (`ID`, `pseudo`, `mail`, `nom`, `photo`, `fond`) VALUES
(1, 'caron01', 'caron.ngoubou@edu.ece.fr', 'Ngoubou Caron', 'gamer-mascotte-garcon-geek-esports-logo-avatar-personnage-dessin-anime-casque-lunettes_8169-228.jpg', 'mayumba.jpg'),
(2, 'said01', 'said.ghazi@edu.ece.fr', 'Ghazhi Said', 'batman.png', 'allocine.jpg'),
(3, 'sofiane01', 'sofiane.saidani@edu.ece.fr', 'Saidani Sofiane', 'game_of_thrones_game_thrones_series_character_avatar_jon_snow-512.png', 'cinqueterre.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Acheteurs`
--
ALTER TABLE `Acheteurs`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Mail` (`Mail`,`Nom`);

--
-- Indexes for table `Administrateur`
--
ALTER TABLE `Administrateur`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `Items`
--
ALTER TABLE `Items`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Nom` (`Nom`);

--
-- Indexes for table `Vendeurs`
--
ALTER TABLE `Vendeurs`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `pseudo` (`pseudo`,`nom`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Acheteurs`
--
ALTER TABLE `Acheteurs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Administrateur`
--
ALTER TABLE `Administrateur`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Items`
--
ALTER TABLE `Items`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Vendeurs`
--
ALTER TABLE `Vendeurs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
