-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Gazda: localhost
-- Timp de generare: 26 Dec 2015 la 21:17
-- Versiune server: 5.6.12-log
-- Versiune PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Bază de date: `mobi`
--
CREATE DATABASE IF NOT EXISTS `mobi` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `mobi`;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `detalii_sponsorizare`
--

CREATE TABLE IF NOT EXISTS `detalii_sponsorizare` (
  `id` int(11) NOT NULL,
  `desc` varchar(45) NOT NULL,
  `pachet_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`pachet_id`),
  KEY `fk_detalii_sponsorizare_pachete_sponsorizare1_idx` (`pachet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(45) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `start_time` varchar(45) DEFAULT NULL,
  `end_time` varchar(45) DEFAULT NULL,
  `color` varchar(45) NOT NULL DEFAULT '#cacaca',
  `location_name` varchar(45) DEFAULT NULL,
  `location_x` varchar(45) DEFAULT '0',
  `location_y` varchar(45) DEFAULT '0',
  `description` varchar(300) DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `organizations_id` int(11) NOT NULL DEFAULT '1',
  `CreatedAt` date DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `UpdatedAt` date DEFAULT NULL,
  `UpdatedBy` int(11) DEFAULT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT '0',
  `enabled` int(11) DEFAULT '0',
  `eventCategory` int(11) NOT NULL DEFAULT '1',
  `businessOk` int(11) NOT NULL DEFAULT '0',
  `FbPage` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `draft` int(11) NOT NULL DEFAULT '0',
  `start_hour` varchar(45) DEFAULT NULL,
  `start_minutes` varchar(45) DEFAULT NULL,
  `end_hour` varchar(45) DEFAULT NULL,
  `end_minutes` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`event_id`,`organizations_id`,`eventCategory`),
  KEY `fk_events_organizations1_idx` (`organizations_id`),
  KEY `fk_event_eventCategory1_idx` (`eventCategory`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Salvarea datelor din tabel `event`
--

INSERT INTO `event` (`event_id`, `project_name`, `start_date`, `end_date`, `start_time`, `end_time`, `color`, `location_name`, `location_x`, `location_y`, `description`, `type`, `organizations_id`, `CreatedAt`, `CreatedBy`, `UpdatedAt`, `UpdatedBy`, `isDeleted`, `enabled`, `eventCategory`, `businessOk`, `FbPage`, `address`, `draft`, `start_hour`, `start_minutes`, `end_hour`, `end_minutes`) VALUES
(3, 'imSMART', '2016-04-06', '2016-04-19', '20:01', '36:12', '#ce3', 'Cluj-Napoca', '46.766667', '23.583333', 'CONCURS DE CREIERE!', NULL, 1, '2015-07-05', 5, NULL, NULL, 0, 1, 5, 0, 'https://www.facebook.com/imsmart.project?fref', 'Cluj-Napoca, Romania', 1, '20', '01', '36', '12'),
(4, 'Cariere 2013', '2015-10-03', '2015-10-14', '10:20', '12:21', '#123456', 'Facultatea de MatematicÄƒ È™i InformaticÄƒ', '44.435486', '26.099682', 'Cariere este un proiect ASMI aflat la a 4-a editie ce pune in contact angajatorii din domeniu si studentii facultatii, prin prezentari si workshopuri.', NULL, 2, '2015-07-05', 5, NULL, NULL, 0, 1, 4, 0, 'https://www.facebook.com/cariere.asmi?fref=ts', 'Strada Academiei, BucureÈ™ti 010014, Romania', 1, '10', '20', '12', '21'),
(5, 'S.T.A.R.T 2015', '2015-07-15', '2015-07-07', '08:51', '09:06', '#C40DDD', 'BraÈ™ov', '45.666667', '25.616667', 'CEL MAI TARE PROIECT ASMI AL VERII', NULL, 1, '2015-07-06', 5, NULL, NULL, 0, 1, 5, 0, 'https://www.facebook.com/startinnovation.ro', 'BraÈ™ov, Romania', 1, '08', '51', '09', '06'),
(6, 'S.T.A.R.T 2030', '2015-07-07', '2015-07-21', '20:00', '23:30', '#cacaca', 'SÃ£o Paulo', '-23.5505199', '-46.6333094', 'addasdasdasda', NULL, 1, '2015-07-08', 5, NULL, NULL, 0, 1, 5, 0, NULL, 'SÃ£o Paulo - State of SÃ£o Paulo, Brazil', 1, '20', '00', '23', '30'),
(7, 'Ler Party', '2015-07-22', '2015-07-30', '22:00', '10:23', '#3bd66a', 'Facultatea de Constructii Civile', '44.463522', '26.124832', 'PENTRECERE DE CRACIUN', NULL, 6, '2015-07-11', 5, NULL, NULL, 0, 1, 4, 0, 'as-mi.ro', 'Bulevardul Lacul Tei 124, BucureÈ™ti, Romania', 1, '22', '00', '10', '23'),
(8, 'start 2015 LOOOL', '2015-06-29', '2015-07-14', '23:00', '00:00', '#cacaca', 'London', '51.5073509', '-0.12775829999998', 'LOOOL', NULL, 1, '2015-07-11', 5, NULL, NULL, 0, 1, 1, 0, NULL, 'London, UK', 1, '23', '00', '00', '00'),
(9, 'asdasdas', '2015-07-14', '2015-07-06', '23:00', '24:00', '#cacaca', 'Los Angeles', '34.0522342', '-118.2436849', 'k;ldk;as', NULL, 1, '2015-07-18', 5, NULL, NULL, 0, 1, 1, 0, NULL, 'Los Angeles, CA, USA', 1, '23', '00', '24', '00'),
(10, 'ZILELE ASMI', NULL, NULL, NULL, NULL, '#cacaca', NULL, '0', '0', NULL, NULL, 1, '2015-07-18', 5, NULL, NULL, 1, 2, 3, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(11, 'Petrecere de craciun', '2015-11-29', '2015-12-10', '20:20', '20:30', '#cacaca', 'Fire Club', '44.4312939', '26.1021456', 'SDASD', NULL, 1, '2015-07-18', 5, NULL, NULL, 0, 1, 1, 0, NULL, 'Strada Gabroveni 12, BucureÈ™ti, Romania', 1, '20', '20', '20', '30'),
(12, '#treSaCaut 2015', '2015-07-17', '2015-07-23', '03:20', '09:08', '#cacaca', 'National Bank of Romania', '44.43269', '26.099562', 'TRASURE HUNT!', NULL, 1, '2015-07-18', 5, NULL, NULL, 0, 1, 4, 0, NULL, 'Strada Lipscani 25, BucureÈ™ti 030031, Romani', 1, '03', '20', '09', '08'),
(13, NULL, NULL, NULL, NULL, NULL, '#cacaca', NULL, '0', '0', NULL, NULL, 1, NULL, NULL, NULL, NULL, 0, 0, 1, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(14, 'TED', NULL, NULL, NULL, NULL, '#cacaca', NULL, '0', '0', NULL, NULL, 1, '2015-07-24', 5, NULL, NULL, 0, 0, 1, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(15, 'MyLocalSoul', NULL, NULL, NULL, NULL, '#cacaca', NULL, '0', '0', NULL, NULL, 1, '2015-07-26', 16, NULL, NULL, 0, 0, 1, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(16, 'HIE', NULL, NULL, NULL, NULL, '#cacaca', NULL, '0', '0', NULL, NULL, 11, '2015-07-26', 16, NULL, NULL, 0, 0, 1, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(17, 'Ratusca', '2015-12-02', '2016-01-08', '21:25', 'null:null', '#cacaca', 'Facultatea de MatematicÄƒ È™i InformaticÄƒ', '44.435495', '26.099642', 'erqeewq', NULL, 1, '2015-07-26', 16, NULL, NULL, 0, 1, 1, 0, NULL, 'Strada Academiei, BucureÈ™ti 010014, Romania', 1, '21', '25', NULL, NULL),
(18, 'Ratusca2', NULL, NULL, NULL, NULL, '#cacaca', NULL, '0', '0', NULL, NULL, 1, '2015-07-26', 16, NULL, NULL, 1, 2, 1, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(19, 'Media', '2015-10-10', '2015-12-03', '20:30', '08:17', '#cacaca', 'IDM Club', '44.443568', '26.048787', 'asdasdakj', NULL, 11, '2015-07-26', 16, NULL, NULL, 0, 1, 5, 0, NULL, 'Splaiul IndependenÈ›ei 319, BucureÈ™ti 060044', 1, '20', '30', '08', '17'),
(20, 'Vector', '2015-07-25', '2015-07-16', '12:01', '04:45', '#cacaca', 'PiaÅ£a Victoriei', '44.4527097', '26.0862948', 'dasdasda', NULL, 11, '2015-07-26', 16, NULL, NULL, 0, 1, 1, 0, NULL, 'PiaÅ£a Victoriei, BucureÈ™ti, Romania', 1, '12', '01', '04', '45'),
(21, 'asd', '2015-08-12', '2015-08-17', '13:31', '23:00', '#cacaca', 'Eiffel Tower', '48.85837', '2.294481', 'as', NULL, 11, '2015-07-29', 16, NULL, NULL, 0, 1, 1, 0, NULL, 'Champ de Mars, 5 Avenue Anatole France, 75007', 1, '13', '31', '23', '00'),
(22, 'dsadasda', NULL, NULL, NULL, NULL, '#cacaca', NULL, '0', '0', NULL, NULL, 11, '2015-07-29', 16, NULL, NULL, 0, 0, 1, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(23, 'aaasdaaaaa', '2015-08-11', '2015-08-13', '12:00', '04:07', '#cacaca', 'Empire State Bldg', '40.7484404', '-73.9856554', 'ss', NULL, 11, '2015-07-29', 16, NULL, NULL, 0, 1, 1, 0, NULL, 'Empire State Bldg, 350 5th Ave, New York, NY ', 1, '12', '00', '04', '07'),
(24, 'ddddddddd', NULL, NULL, NULL, NULL, '#cacaca', NULL, '0', '0', NULL, NULL, 11, '2015-07-29', 16, NULL, NULL, 0, 0, 1, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(25, 'TEST', '2015-10-03', '2015-12-11', '12:00', '13:25', '#cacaca', 'Los Angeles', '34.0522342', '-118.2436849', 'asdlaskdÈ™aso', NULL, 1, '2015-09-04', 5, NULL, NULL, 0, 1, 3, 0, NULL, 'Los Angeles, CA, USA', 1, '12', '00', '13', '25'),
(28, 'TEST PRO', '2015-09-29', '2015-12-10', '14:36', '18:28', '#cacaca', 'Rahova', '44.3962362', '26.0566495', 'E un fapt bine stabilit cÄƒ cititorul va fi sustras de conÅ£inutul citibil al unei pagini atunci cÃ¢nd se uitÄƒ la aÅŸezarea Ã®n paginÄƒ. Scopul utilizÄƒrii a Lorem Ipsum, este acela cÄƒ are o distribuÅ£ie a literelor mai mult sau mai puÅ£in normale, faÅ£Äƒ de utilizarea a ceva de genul "ConÅ£inut a', NULL, 11, '2015-09-04', 16, NULL, NULL, 0, 1, 1, 0, NULL, 'Rahova, Bucharest, Romania', 1, '14', '36', '18', '28'),
(29, 'wjklehdqw', '2016-02-24', '2016-03-11', '22:30', '13:31', '#cacaca', 'Asheville', '35.5950581', '-82.5514869', 'dfvs', NULL, 11, '2015-09-05', 16, NULL, NULL, 0, 1, 1, 0, NULL, 'Asheville, NC, USA', 1, '22', '30', '13', '31'),
(30, '63', NULL, NULL, NULL, NULL, '#cacaca', NULL, '0', '0', NULL, NULL, 1, '2015-09-15', 5, NULL, NULL, 0, 0, 1, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(31, 'looj wed wed wed wed', '2015-12-04', '2016-01-18', '03:30', '10:00', '#cacaca', 'Moscow', '55.755826', '37.6173', 'wedwdwed', NULL, 12, '2015-10-04', 5, NULL, NULL, 0, 1, 6, 0, NULL, 'Moscow, Moscow, Russia', 1, '03', '30', '10', '00'),
(32, 'teeest 2', NULL, NULL, NULL, NULL, '#cacaca', NULL, '0', '0', NULL, NULL, 1, '2015-11-01', 5, NULL, NULL, 0, 0, 1, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(33, 'r', '2015-11-09', '2015-11-11', '13:30', '23:30', '#cacaca', 'National Museum of Romanian History', '44.431447', '26.097454', 'w,wÈ™ re rwe', NULL, 11, '2015-11-01', 16, NULL, NULL, 1, 2, 1, 0, NULL, 'Calea Victoriei 12, BucureÈ™ti 030026, Romani', 0, '13', '30', '23', '30'),
(34, 'wsd', NULL, NULL, NULL, NULL, '#cacaca', NULL, '0', '0', NULL, NULL, 1, '2015-11-01', 5, NULL, NULL, 0, 0, 1, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL),
(35, 'PhotoTEST', '2015-11-22', '2015-12-15', '04:42', '02:14', '#cacaca', 'FM Cariappa Colony', '12.977923', '77.6120835', 'dasd', NULL, 6, '2015-11-29', 5, NULL, NULL, 0, 1, 1, 0, NULL, 'FM Cariappa Colony, Sivanchetti Gardens, Beng', 1, '04', '42', '02', '14'),
(36, 'Test Name', '2015-11-28', '2015-12-30', '20:00', '21:00', '#cacaca', 'London', '51.5073509', '-0.12775829999998', 'asdasdas', NULL, 1, '2015-11-29', 5, NULL, NULL, 0, 1, 1, 0, NULL, 'London, UK', 1, '20', '00', '21', '00'),
(37, 'a das das asdas', '2015-12-01', '2015-12-16', '3:4', '4:3', '#cacaca', '32819', '28.4630493', '-81.460856', 'e', NULL, 1, '2015-11-30', 5, NULL, NULL, 0, 1, 1, 0, NULL, 'Orlando, FL 32819, USA', 1, '3', '4', '4', '3');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `eventcategory`
--

CREATE TABLE IF NOT EXISTS `eventcategory` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(45) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `CreatedAt` date DEFAULT NULL,
  `UpdatedBy` int(11) DEFAULT NULL,
  `UpdatedAt` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `eventcategory`
--

INSERT INTO `eventcategory` (`id`, `categoryName`, `description`, `CreatedBy`, `CreatedAt`, `UpdatedBy`, `UpdatedAt`) VALUES
(1, 'Educational', NULL, NULL, NULL, NULL, NULL),
(2, 'Cariera', NULL, NULL, NULL, NULL, NULL),
(3, 'Social', NULL, NULL, NULL, NULL, NULL),
(4, 'Distractie', NULL, NULL, NULL, NULL, NULL),
(5, 'Concurs', NULL, NULL, NULL, NULL, NULL),
(6, 'Training', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL DEFAULT 'anonim',
  `message` varchar(300) NOT NULL,
  `grade` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `event_id` int(11) NOT NULL,
  `businessOk` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`event_id`),
  KEY `fk_feedback_events1_idx` (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Salvarea datelor din tabel `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `message`, `grade`, `date`, `event_id`, `businessOk`) VALUES
(1, 'Liviu', 'lool', NULL, '2015-07-25', 8, 2),
(2, 'anonim', 'Lool', NULL, '2015-07-25', 8, 1),
(3, 'NICU LIVIU', 'FOARTE TARE', NULL, '2015-07-25', 8, 2),
(4, 'Popa', 'foarte tare', NULL, '2015-07-25', 6, 0),
(5, 'Liviu', 'Imi place la Brasov!', NULL, '2015-07-25', 5, 1),
(6, 'anonim', 'Imi place prorgamul', NULL, '2015-07-26', 4, 1),
(7, 'Liviu', 'da, a fost un eveniment reusit', NULL, '2015-07-26', 4, 1),
(8, 'anonim', 'Obositor', NULL, '2015-07-26', 12, 0);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `join_event`
--

CREATE TABLE IF NOT EXISTS `join_event` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Salvarea datelor din tabel `join_event`
--

INSERT INTO `join_event` (`id`, `user_id`, `event_id`) VALUES
(23, 5, 28),
(31, 5, 29),
(42, 0, 31),
(43, 0, 29),
(44, 0, 25),
(45, 0, 28),
(46, 5, 25),
(47, 5, 31),
(48, 5, 4);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `organization`
--

CREATE TABLE IF NOT EXISTS `organization` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `org_name` varchar(45) NOT NULL,
  `createdAt` date DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT '0',
  `orgType` int(11) NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedAt` date DEFAULT NULL,
  PRIMARY KEY (`id`,`orgType`),
  UNIQUE KEY `idOrganizations_UNIQUE` (`id`),
  KEY `fk_organization_orgType1_idx` (`orgType`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Salvarea datelor din tabel `organization`
--

INSERT INTO `organization` (`id`, `org_name`, `createdAt`, `createdBy`, `isDeleted`, `orgType`, `updatedBy`, `updatedAt`) VALUES
(1, 'ASMI', '2015-07-05', 5, 0, 1, NULL, NULL),
(2, 'ASAA', '2015-07-05', 5, 0, 1, NULL, NULL),
(3, 'BCR', '2015-07-05', 5, 0, 2, NULL, NULL),
(4, 'ASG', '2015-07-05', 5, 0, 1, NULL, NULL),
(5, 'USR', '2015-07-05', 5, 0, 1, NULL, NULL),
(6, 'ASUB', '2015-07-05', 5, 0, 1, NULL, NULL),
(7, 'sdsdf', '2015-07-11', 5, 0, 2, NULL, NULL),
(8, 'loooooooooooooooool', '2015-07-18', 5, 0, 1, NULL, NULL),
(9, 'ASMI_RO', NULL, NULL, 0, 1, NULL, NULL),
(10, 'ASMI_EN', NULL, NULL, 0, 1, NULL, NULL),
(11, 'CST', '2015-07-25', 16, 0, 1, NULL, NULL),
(12, 'Lolozaur', '2015-07-26', 24, 0, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `orgtype`
--

CREATE TABLE IF NOT EXISTS `orgtype` (
  `id` int(11) NOT NULL,
  `type` varchar(45) NOT NULL,
  `CreatedBy` int(11) DEFAULT NULL,
  `CreatedAt` date DEFAULT NULL,
  `UpdatedBy` varchar(45) DEFAULT NULL,
  `UpdatedAt` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Salvarea datelor din tabel `orgtype`
--

INSERT INTO `orgtype` (`id`, `type`, `CreatedBy`, `CreatedAt`, `UpdatedBy`, `UpdatedAt`) VALUES
(1, 'ONG', NULL, NULL, NULL, NULL),
(2, 'Business', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `pachete_sponsorizare`
--

CREATE TABLE IF NOT EXISTS `pachete_sponsorizare` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nume_nivel` varchar(45) NOT NULL,
  `suma` int(11) NOT NULL,
  `moneda` varchar(45) DEFAULT 'euro',
  `id_event` int(11) NOT NULL,
  PRIMARY KEY (`id`,`id_event`),
  UNIQUE KEY `idpachete_sponsorizare_UNIQUE` (`id`),
  KEY `fk_pachete_sponsorizare_event1_idx` (`id_event`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `program`
--

CREATE TABLE IF NOT EXISTS `program` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `start_hour` varchar(45) NOT NULL,
  `end_hour` varchar(45) NOT NULL,
  `s_desc` varchar(45) NOT NULL,
  `s_date` date NOT NULL,
  `event_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`event_id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_program_event1_idx` (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Salvarea datelor din tabel `program`
--

INSERT INTO `program` (`id`, `start_hour`, `end_hour`, `s_desc`, `s_date`, `event_id`) VALUES
(2, '14:52', '01:39', 'Ceai', '2015-07-25', 4),
(3, '17:00', '15:15', 'Cafea', '2015-07-28', 4),
(4, '13:10', '10:10', 'Pauza', '2015-07-29', 4),
(5, '01:20', '20:00', 'program', '2015-07-24', 14),
(6, '12:00', '12:30', 'lool', '2015-07-26', 9),
(7, '13:03', '23:30', '32asd asdasd', '2015-09-18', 29),
(8, '12:30', '13:13', 'adf.sdÈ™asdasd asd asdasd', '2015-09-30', 29);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Salvarea datelor din tabel `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'admin'),
(2, 'mobile'),
(3, 'business'),
(4, 'moderator');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `statistics`
--

CREATE TABLE IF NOT EXISTS `statistics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `screen` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `phone_id` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`event_id`),
  UNIQUE KEY `idstatistics_UNIQUE` (`id`),
  KEY `fk_statistics_event1_idx` (`event_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `rol` int(11) NOT NULL DEFAULT '1',
  `createdAt` date DEFAULT NULL,
  `createdBy` int(11) DEFAULT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT '0',
  `updatedAt` date DEFAULT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `organization_id` int(11) NOT NULL DEFAULT '-1',
  PRIMARY KEY (`id`,`organization_id`),
  UNIQUE KEY `idusers_UNIQUE` (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- Salvarea datelor din tabel `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `email`, `pass`, `rol`, `createdAt`, `createdBy`, `isDeleted`, `updatedAt`, `updatedBy`, `organization_id`) VALUES
(5, 'Nicu', 'Liviu', 'liviu.nicu@sniff.ro', 'l', 1, '2015-06-27', NULL, 0, NULL, NULL, -1),
(10, 'Ene', 'Andreea', 'ene.andreea@gmail.com', 'andreea', 2, '2015-07-03', NULL, 0, NULL, NULL, -1),
(11, 'Oana', 'Stamate', 'stamate.oana', 'oana', 2, '2015-07-03', NULL, 0, NULL, NULL, -1),
(12, 'Raduta', 'Bogdan', 'raduta.bogdan', 'raduta', 3, '2015-07-03', NULL, 0, NULL, NULL, -1),
(13, 'errg', 'gsd', 'gds', 'gds', 3, '2015-07-11', NULL, 0, NULL, NULL, -1),
(14, 'Valentin', 'Valentin', 'valentin@v.ro', '123', 4, '2015-07-24', NULL, 0, NULL, NULL, 9),
(15, 'Ilie', 'Stefan', 'stefan@ilie.ro', '1234', 4, '2015-07-24', NULL, 0, NULL, NULL, 10),
(16, 'Daniel', 'Ilinca', 'daniel@cst-us.com', 'cst', 4, '2015-07-25', NULL, 0, NULL, NULL, 11),
(17, 'Sniff', 'Sniff', 'sniff@sniff.ro', 's', 3, '2015-07-25', NULL, 0, NULL, NULL, -1),
(20, 'Louis', 'CK', 'louis@louis.com', 'lool', 3, '2015-07-25', NULL, 0, NULL, NULL, -1),
(21, 'Test', 'test', 'test@test.ro', 'test', 2, '2015-07-26', NULL, 0, NULL, NULL, -1),
(22, 'qweqw', 'adas', 'asdsa@asdas.com', 'aasdas', 2, '2015-07-26', NULL, 0, NULL, NULL, -1),
(23, 'ww', 'ae', 'aaasd@asdsda.com', 'assd', 2, '2015-07-26', NULL, 0, NULL, NULL, -1),
(24, 'Cristina', 'Pixel', 'pixel@cst-us.com', 'cst', 4, '2015-07-26', NULL, 0, NULL, NULL, 12),
(25, 'mobile', 'mobi', 'mobi@mobi.ro', 'mobi', 2, '2015-09-13', NULL, 0, NULL, NULL, -1),
(27, 'm', 'm', 'm@m.ro', 'm', 2, '2015-09-13', NULL, 0, NULL, NULL, -1),
(28, 'h', 'g', 'g@c', 'f', 2, '2015-09-13', NULL, 0, NULL, NULL, -1),
(29, 'd', 'f', 'g', 'h', 2, '2015-09-13', NULL, 0, NULL, NULL, -1),
(31, 'z', 'c', 'f', 'f', 2, '2015-09-13', NULL, 0, NULL, NULL, -1),
(32, 'liviu', 'mobil', 'liviu@mobil.ro', 'mobil', 2, '2015-09-13', NULL, 0, NULL, NULL, -1),
(33, 'liviu', 'liviu2', 'liviu@liviu.ro', 'liviu', 2, '2015-09-13', NULL, 0, NULL, NULL, -1),
(38, 'moo', 'moom', 'moom@moom.ro', 'moom', 2, '2015-09-13', NULL, 0, NULL, NULL, -1),
(39, 'ljs', 'shsms', 'aaaa@aaaa.ro', 'aaaa', 2, '2015-09-13', NULL, 0, NULL, NULL, -1),
(40, 'aaa', 'bbb', 'ccc@ccc', 'as', 2, '2015-09-13', NULL, 0, NULL, NULL, -1),
(41, 'aaaaaa', 'aaaaa', 'aaa@aaa', 'qqqqqq', 2, '2015-09-13', NULL, 0, NULL, NULL, -1),
(42, 'Nicu', 'Liviu-Alexandru', 'liviu@mobile.ro', 'liviumobile', 2, '2015-09-13', NULL, 0, NULL, NULL, -1),
(43, 'liviu', 'test', 'test', '', 2, '2015-09-13', NULL, 0, NULL, NULL, -1);

--
-- Restrictii pentru tabele sterse
--

--
-- Restrictii pentru tabele `detalii_sponsorizare`
--
ALTER TABLE `detalii_sponsorizare`
  ADD CONSTRAINT `fk_detalii_sponsorizare_pachete_sponsorizare1` FOREIGN KEY (`pachet_id`) REFERENCES `pachete_sponsorizare` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrictii pentru tabele `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `fk_events_organizations1` FOREIGN KEY (`organizations_id`) REFERENCES `organization` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_event_eventCategory1` FOREIGN KEY (`eventCategory`) REFERENCES `eventcategory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrictii pentru tabele `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `fk_feedback_events1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrictii pentru tabele `organization`
--
ALTER TABLE `organization`
  ADD CONSTRAINT `fk_organization_orgType1` FOREIGN KEY (`orgType`) REFERENCES `orgtype` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrictii pentru tabele `pachete_sponsorizare`
--
ALTER TABLE `pachete_sponsorizare`
  ADD CONSTRAINT `fk_pachete_sponsorizare_event1` FOREIGN KEY (`id_event`) REFERENCES `event` (`event_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrictii pentru tabele `program`
--
ALTER TABLE `program`
  ADD CONSTRAINT `fk_program_event1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrictii pentru tabele `statistics`
--
ALTER TABLE `statistics`
  ADD CONSTRAINT `fk_statistics_event1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
