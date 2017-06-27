-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 27, 2017 at 03:47 PM
-- Server version: 5.7.18-0ubuntu0.17.04.1
-- PHP Version: 7.0.18-0ubuntu0.17.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `AFPA Bay`
--

-- --------------------------------------------------------

--
-- Table structure for table `Film`
--

CREATE TABLE `Film` (
  `id` int(11) NOT NULL,
  `acteurs` varchar(1024) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `date_sortie` varchar(1024) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `genres` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `image` varchar(1024) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `nationalite` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `realisateur` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `synopsis` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `titre` varchar(256) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `trailer` varchar(1024) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Film`
--

INSERT INTO `Film` (`id`, `acteurs`, `date_sortie`, `genres`, `image`, `nationalite`, `realisateur`, `synopsis`, `titre`, `trailer`) VALUES
(2, 'Tom Cruise, Billy Connolly, Tony Goldwyn ', '2004', 'HIstorique, Guerre', 'http://a69.g.akamai.net/n/69/10688/v1/img5.allocine.fr/acmedia/medias/nmedia/18/35/14/62/18368781.jpg', 'Américain', 'Edward Zwick', 'En 1876, le capitaine Nathan Algren vit avec les souvenirs des batailles sanglantes menées contre les Sioux. Fort de son expérience au combat, il devient conseiller militaire pour le compte de l&#39;empereur japonais soucieux d&#39;ouvrir son pays aux traditions et au commerce occidentaux et d&#39;éradiquer l&#39;ancienne caste guerrière des samouraïs. Mais ceux-ci influent sur le capitaine Algren, qui se trouve bientôt pris entre deux feux, au coeur d&#39;une confrontation entre deux époques et deux mondes avec, pour le guider, son sens de l&#39;honneur. ', 'Le Dernier samouraï', 'https://www.youtube.com/watch?v=bPMasK8wie0'),
(3, 'Travis Fimmel, Toby Kebbell, Paula Patton', '2016', 'Fantastique, Action, Aventure', 'https://film-warcraft.judgehype.com/screenshots/news2016/68.jpg', 'Américain', 'Duncan Jones', 'Le pacifique royaume d&#39;Azeroth est au bord de la guerre alors que sa civilisation doit faire face à une redoutable race d’envahisseurs: des guerriers Orcs fuyant leur monde moribond pour en coloniser un autre. Alors qu’un portail s’ouvre pour connecter les deux mondes, une armée fait face à la destruction et l&#39;autre à l&#39;extinction. De côtés opposés, deux héros vont s’affronter et décider du sort de leur famille, de leur peuple et de leur patrie.', 'Warcraft : Le commencement', 'https://www.youtube.com/watch?v=VFQD4rNr_BU'),
(4, 'Bruce Willis, Gary Oldman, Ian Holm', '1997', 'Science fiction', 'http://fr.web.img6.acsta.net/pictures/14/08/21/14/17/385506.jpg', 'Français', 'Luc Besson', 'Au XXIII siècle, dans un univers étrange et coloré, où tout espoir de survie est impossible sans la découverte du cinquième élément, un héros affronte le mal pour sauver l&#39;humanité', 'Le cinquième élément', 'https://www.youtube.com/watch?v=5_FGaEq-aCY');

-- --------------------------------------------------------

--
-- Table structure for table `membres`
--

CREATE TABLE `membres` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `membres`
--

INSERT INTO `membres` (`id`, `pseudo`, `pass`, `email`) VALUES
(38, 'Devrok', 'b923c9e05d651b3453cca2cd827aca5a5030c88c', 'k.kroliko29@gmail.com'),
(39, 'Konrad', 'b923c9e05d651b3453cca2cd827aca5a5030c88c', 'k@gmail.com'),
(40, 'kk', '46e374c930668150423ee1a3028f30fdd8486291', 'connecté@test.fr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Film`
--
ALTER TABLE `Film`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membres`
--
ALTER TABLE `membres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Film`
--
ALTER TABLE `Film`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `membres`
--
ALTER TABLE `membres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
