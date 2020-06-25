-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 25, 2020 at 05:50 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codflix`
--

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Horreur'),
(3, 'Science-Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `finish_date` datetime DEFAULT NULL,
  `watch_duration` int(11) NOT NULL DEFAULT '0' COMMENT 'in seconds'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `release_date` date NOT NULL,
  `summary` longtext NOT NULL,
  `trailer_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `genre_id`, `title`, `type`, `status`, `release_date`, `summary`, `trailer_url`) VALUES
(1, 2, 'Us', 'Film', 'Publié', '2019-03-20', 'De retour dans sa maison d’enfance, à Santa Cruz sur la côte Californienne, Adelaïde Wilson a décidé de passer des vacances de rêves avec son mari Gabe et leurs deux enfants : Zora et Jason. Un traumatisme aussi mystérieux qu’irrésolu refait surface suite à une série d’étranges coïncidences qui déclenchent la paranoïa de cette mère de famille de plus en plus persuadée qu’un terrible malheur va s’abattre sur ceux qu’elle aime. Après une journée tendue à la plage avec leurs amis les Tyler, les Wilson rentrent enfin à la maison où ils découvrent quatre personnes se tenant la main dans leur allée. Ils vont alors affronter le plus terrifiant et inattendu des adversaires : leurs propres doubles.', 'https://www.youtube.com/embed/hNCmb-4oXJA'),
(2, 1, 'Spider-man : Far From Home', 'Film', 'Publié', '2019-07-03', 'L\'araignée sympa du quartier décide de rejoindre ses meilleurs amis Ned, MJ, et le reste de la bande pour des vacances en Europe. Cependant, le projet de Peter de laisser son costume de super-héros derrière lui pendant quelques semaines est rapidement compromis quand il accepte à contrecoeur d\'aider Nick Fury à découvrir le mystère de plusieurs attaques de créatures, qui ravagent le continent !', 'https://www.youtube.com/embed/Nt9L1jCKGnE'),
(3, 3, 'The 100', 'Série', 'Publié', '2014-03-19', 'Après une apocalypse nucléaire causée par l\'Homme lors d\'une troisième Guerre Mondiale, les 318 survivants recensés se réfugient dans des stations spatiales et parviennent à y vivre et à se reproduire, atteignant le nombre de 4000. Mais 97 ans plus tard, le vaisseau mère, l\'Arche, est en piteux état. Une centaine de jeunes délinquants emprisonnés au fil des années pour des crimes ou des trahisons sont choisis comme cobayes par les autorités pour redescendre sur Terre et tester les chances de survie. Dès leur arrivée, ils découvrent un nouveau monde dangereux mais fascinant...', 'https://www.youtube.com/embed/ia1Fbg96vL0');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET latin1 NOT NULL,
  `movie_url` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `title`, `movie_url`) VALUES
(1, 'Us', 'https://www.youtube.com/embed/rUW-pcQGYzE'),
(2, 'Spider-man : Far From Home', 'https://www.youtube.com/embed/aHta6tlTCZk');

-- --------------------------------------------------------

--
-- Table structure for table `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `title` varchar(100) CHARACTER SET latin1 NOT NULL,
  `season_num` int(10) NOT NULL,
  `episode_num` int(10) NOT NULL,
  `episode_url` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `series`
--

INSERT INTO `series` (`id`, `title`, `season_num`, `episode_num`, `episode_url`) VALUES
(1, 'The 100', 1, 1, 'https://www.youtube.com/embed/Gb7C0R2MKaE'),
(2, 'The 100', 1, 2, 'https://www.youtube.com/embed/EBuSuOMXC4w'),
(3, 'The 100', 1, 3, 'https://www.youtube.com/embed/rVyfktcrjv0'),
(4, 'The 100', 1, 4, 'https://www.youtube.com/embed/76v9MecyuRA'),
(5, 'The 100', 1, 5, 'https://www.youtube.com/embed/zetaUCUfd7A'),
(6, 'The 100', 1, 6, 'https://www.youtube.com/embed/BuCyMLOkaEM'),
(7, 'The 100', 1, 7, 'https://www.youtube.com/embed/IMv_BQA7lRM'),
(8, 'The 100', 1, 8, 'https://www.youtube.com/embed/RD5mxffn0ac'),
(9, 'The 100', 1, 9, 'https://www.youtube.com/embed/iWFS_cW849I'),
(10, 'The 100', 2, 1, 'https://www.youtube.com/embed/mtKpUfUPQdM'),
(11, 'The 100', 2, 2, 'https://www.youtube.com/embed/DL4KWu6v1iU'),
(12, 'The 100', 2, 3, 'https://www.youtube.com/embed/d5RH1qtcNF4'),
(13, 'The 100', 2, 4, 'https://www.youtube.com/embed/1XBkzHkXgJ8'),
(14, 'The 100', 2, 5, 'https://www.youtube.com/embed/ePlHAxm5D8Y'),
(15, 'The 100', 2, 6, 'https://www.youtube.com/embed/AcKWNl6iJi0'),
(16, 'The 100', 2, 7, 'https://www.youtube.com/embed/JGhF2VX7ouQ'),
(17, 'The 100', 2, 8, 'https://www.youtube.com/embed/0QvooMkkDqM'),
(18, 'The 100', 2, 9, 'https://www.youtube.com/embed/V6nghV8jGM0'),
(19, 'The 100', 2, 10, 'https://www.youtube.com/embed/xyzsMWsz1Kw'),
(20, 'The 100', 2, 11, 'https://www.youtube.com/embed/kjCvHst_oz4');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(80) NOT NULL,
  `confirmkey` varchar(255) NOT NULL,
  `confirmed` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `confirmkey`, `confirmed`) VALUES
(1, 'coding@gmail.com', '123456', '', 0),
(4, 'codingtest@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', 0),
(12, 'kevin.ruault@edu.itescia.fr', 'ca978112ca1bbdcafac231b39a23dc4da786eff8147c4e72b9807785afee48bb', '3246720099295653040', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_user_id_fk_media_id` (`user_id`),
  ADD KEY `history_media_id_fk_media_id` (`media_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_genre_id_fk_genre_id` (`genre_id`) USING BTREE;

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_media_id_fk_media_id` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_user_id_fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_genre_id_b1257088_fk_genre_id` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
