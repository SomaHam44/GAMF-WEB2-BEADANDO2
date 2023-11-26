-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1:3306
-- Létrehozás ideje: 2023. Nov 26. 09:02
-- Kiszolgáló verziója: 8.0.31
-- PHP verzió: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `forgalomkorlatozas`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

DROP TABLE IF EXISTS `felhasznalok`;
CREATE TABLE IF NOT EXISTS `felhasznalok` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `csaladi_nev` varchar(45) NOT NULL,
  `utonev` varchar(45) NOT NULL,
  `bejelentkezes` varchar(12) NOT NULL,
  `jelszo` varchar(40) NOT NULL,
  `jogosultsag` varchar(3) NOT NULL DEFAULT '_1_',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`id`, `csaladi_nev`, `utonev`, `bejelentkezes`, `jelszo`, `jogosultsag`) VALUES
(1, 'Jó', 'Játék', 'jojatek', '76191e44c8418bb5ab394fc97128a9a2f691d90e', '_1_');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `korlatozas`
--

DROP TABLE IF EXISTS `korlatozas`;
CREATE TABLE IF NOT EXISTS `korlatozas` (
  `az` int NOT NULL AUTO_INCREMENT,
  `utszam` int NOT NULL,
  `kezdet` double NOT NULL,
  `veg` double NOT NULL,
  `telepules` varchar(100) NOT NULL,
  `mettol` date NOT NULL,
  `meddig` date NOT NULL,
  `megnevid` int NOT NULL,
  `mertekid` int NOT NULL,
  `sebesseg` int NOT NULL,
  PRIMARY KEY (`az`),
  KEY `megnevezes_ibfk_1` (`megnevid`),
  KEY `mertek_ibfk_1` (`mertekid`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8mb3;

--
-- A tábla adatainak kiíratása `korlatozas`
--

INSERT INTO `korlatozas` (`az`, `utszam`, `kezdet`, `veg`, `telepules`, `mettol`, `meddig`, `megnevid`, `mertekid`, `sebesseg`) VALUES
(1, 1, 74, 75, 'Almásfüzitő', '2010-06-03', '2010-06-21', 1, 1, 30),
(2, 1, 169, 170, 'Levél', '2010-03-16', '2010-06-30', 2, 2, 40),
(3, 3, 178, 187, 'Miskolc', '2010-05-31', '2010-06-30', 3, 1, 30),
(4, 4, 304, 313, 'Nyírtass', '2010-05-29', '2010-10-05', 4, 1, 40),
(5, 4, 306, 307, 'Nyírtass', '2010-03-24', '2010-10-05', 2, 1, 40),
(6, 4, 336, 341, 'Záhony', '2010-05-29', '2010-10-05', 4, 1, 40),
(7, 4, 287, 288, 'Nyírtura', '2010-03-10', '2010-10-05', 4, 1, 40),
(8, 4, 319, 319, 'Kisvárda', '2010-05-29', '2010-10-05', 4, 1, 40),
(9, 4, 313, 315, 'Pátroha', '2010-05-05', '2010-10-05', 4, 1, 40),
(10, 4, 241, 248, 'Hajdúhadház - Téglás', '2010-07-08', '2010-07-30', 4, 5, 60),
(11, 4, 248, 260, 'Újfehértó', '2010-03-16', '2010-10-30', 5, 1, 30),
(12, 4, 336, 337, 'Tiszabezdéd', '2010-03-10', '2010-10-05', 2, 1, 40),
(13, 4, 180, 200, 'Püspökladány - Hajdúszoboszló', '2010-03-09', '2010-07-31', 4, 3, 40),
(14, 6, 66, 67, 'Dunaújváros', '2010-06-01', '2010-06-15', 6, 1, 40),
(15, 8, 43, 44, 'Litér', '2010-10-15', '2010-11-30', 2, 1, 50),
(16, 11, 37, 37, 'Dunabogdány', '2010-05-17', '2010-06-21', 4, 3, 30),
(17, 11, 24, 24, 'Leányfalu', '2010-05-17', '2010-06-25', 4, 1, 30),
(18, 11, 25, 26, 'Leányfalu', '2010-05-03', '2010-06-30', 4, 1, 30),
(19, 13, 3, 3, 'Komárom', '2010-04-26', '2010-08-15', 2, 1, 40),
(20, 21, 15, 16, 'Apc', '2010-03-15', '2010-09-30', 4, 1, 60),
(21, 21, 7, 9, 'Lőrinci', '2010-03-15', '2010-09-30', 4, 1, 60),
(22, 21, 57, 58, 'Salgótarján', '2010-05-17', '2010-06-15', 4, 2, 30),
(23, 31, 27, 32, 'Maglód - Mende', '2010-03-17', '2010-06-18', 4, 3, 20),
(24, 31, 34, 40, 'Mende', '2010-03-17', '2010-06-18', 4, 3, 20),
(25, 31, 32, 34, 'Mende', '2010-03-17', '2010-06-18', 4, 3, 20),
(26, 31, 25, 34, 'Maglód - Mende', '2010-03-09', '2010-07-27', 4, 3, 40),
(27, 32, 57, 58, 'Újszász', '2010-03-17', '2010-06-15', 7, 3, 40),
(28, 32, 27, 27, 'Jászberény', '2010-05-07', '2010-08-06', 2, 1, 30),
(29, 38, 12, 12, 'Rakamaz', '2010-05-10', '2010-06-30', 4, 1, 30),
(30, 42, 5, 5, 'Püspökladány', '2010-04-15', '2010-06-30', 2, 3, 40),
(31, 42, 41, 41, 'Berettyóújfalu', '2010-06-03', '2010-06-30', 8, 3, 40),
(32, 47, 1, 1, 'Debrecen', '2010-03-30', '2010-06-30', 4, 1, 30),
(33, 47, 217, 218, 'Algyő', '2010-03-17', '2010-06-30', 4, 2, 60),
(34, 55, 100, 100, 'Baja', '2010-03-22', '2010-07-31', 2, 4, 30),
(35, 61, 154, 155, 'Böhönye - Vése', '2010-03-15', '2010-11-15', 7, 1, 50),
(36, 61, 165, 166, 'Vése - Inke', '2010-03-15', '2010-11-15', 7, 1, 40),
(37, 61, 157, 158, 'Vése', '2010-03-15', '2010-11-15', 7, 1, 50),
(38, 61, 161, 163, 'Vése', '2010-03-15', '2010-11-15', 7, 1, 30),
(39, 61, 176, 177, 'Iharosberény', '2010-03-15', '2010-11-15', 7, 1, 30),
(40, 61, 183, 185, 'Pogányszentpéter', '2010-03-15', '2010-11-15', 7, 1, 30),
(41, 61, 176, 176, 'Iharosberény', '2010-03-15', '2010-11-15', 7, 1, 30),
(42, 61, 172, 173, 'Inke', '2010-03-15', '2010-11-15', 7, 1, 30),
(43, 61, 167, 169, 'Inke', '2010-03-15', '2010-11-15', 7, 1, 30),
(44, 67, 8, 9, 'Szigetvár - Szentlászló', '2010-05-24', '2010-06-25', 7, 3, 40),
(45, 72, 6, 6, 'Litér', '2010-10-15', '2010-11-30', 2, 1, 50),
(46, 75, 56, 58, 'Lenti', '2010-06-02', '2010-07-06', 5, 1, 40),
(47, 76, 36, 40, 'Padár - Nagykapornak', '2010-05-31', '2010-06-30', 4, 3, 40),
(48, 76, 27, 27, 'Zalacsány', '2010-06-01', '2010-06-30', 7, 2, 40),
(49, 76, 40, 53, 'Alsónemesapáti - Zalaegerszeg', '2010-03-22', '2010-11-10', 4, 3, 40),
(50, 81, 60, 60, 'Mezőörs', '2010-05-16', '2010-06-30', 6, 4, 30),
(51, 81, 59, 70, 'Pér - Mezőörs', '2010-03-22', '2010-07-15', 4, 3, 30),
(52, 86, 6, 8, 'Resznek', '2010-06-01', '2010-07-31', 4, 2, 40),
(53, 86, 2, 5, 'Rédics', '2010-04-19', '2010-08-01', 7, 3, 40),
(54, 86, 94, 98, 'Szeleste', '2010-09-08', '2010-11-30', 4, 1, 40),
(55, 86, 19, 21, 'Kálócfa - Kozmadombja', '2010-04-19', '2010-08-31', 4, 3, 30),
(56, 86, 159, 160, 'Bősárkány', '2010-04-26', '2010-06-30', 4, 3, 30),
(57, 451, 25, 27, 'Csongrád', '2010-03-22', '2010-08-27', 2, 1, 40),
(58, 471, 71, 72, 'Mátészalka', '2010-03-30', '2010-06-30', 4, 1, 30),
(59, 471, 27, 28, 'Nyíradony', '2010-04-01', '2010-06-30', 10, 1, 30),
(60, 1109, 6, 6, 'Csobánka', '2010-05-24', '2010-06-21', 4, 1, 30),
(61, 1111, 26, 26, 'Esztergom', '2010-06-04', '2010-06-18', 10, 3, 30),
(62, 1119, 27, 29, 'Tarján', '2010-05-13', '2010-06-15', 7, 3, 40),
(63, 1406, 1, 2, 'Mosonmagyaróvár - Máriakálnok', '2010-06-03', '2010-07-15', 4, 1, 50),
(64, 2105, 13, 14, 'Galgamácsa', '2010-05-16', '2010-06-30', 6, 4, 0),
(65, 2105, 13, 14, 'Galgamácsa', '2010-06-01', '2010-06-30', 6, 4, 0),
(66, 2109, 18, 19, 'Palotás', '2010-05-17', '2010-06-15', 4, 3, 30),
(67, 2119, 4, 11, 'Balassagyarmat - Csitár', '2010-05-03', '2010-06-15', 4, 3, 40),
(68, 2124, 9, 12, 'Cserháthaláp - Szanda', '2010-05-03', '2010-06-15', 4, 3, 40),
(69, 2126, 2, 2, 'Ecseg', '2010-05-03', '2010-06-15', 4, 3, 40),
(70, 2127, 2, 4, 'Csécse', '2010-05-03', '2010-06-15', 4, 3, 40),
(71, 2206, 8, 10, 'Karancskeszi', '2010-04-06', '2010-06-30', 4, 1, 30),
(72, 2301, 0, 2, 'Bátonyterenye - Rákóczibánya', '2010-05-03', '2010-06-15', 4, 3, 40),
(73, 2302, 7, 7, 'Kazár', '2010-05-03', '2010-06-15', 4, 3, 30),
(74, 2504, 0, 0, 'Eger', '2010-05-03', '2010-08-02', 10, 4, 0),
(75, 2504, 0, 1, 'Eger', '2010-05-03', '2010-08-02', 10, 1, 30),
(76, 2505, 52, 53, 'Miskolc', '2010-05-31', '2010-06-30', 9, 3, 30),
(77, 2505, 53, 58, 'Miskolc', '2010-05-31', '2010-06-30', 3, 3, 30),
(78, 2507, 4, 4, 'Borsodnádasd', '2010-06-01', '2010-10-31', 10, 3, 30),
(79, 2507, 3, 4, 'Borsodnádasd', '2010-06-01', '2010-07-31', 6, 3, 30),
(80, 2519, 1, 3, 'Miskolc', '2010-05-31', '2010-06-30', 4, 3, 30),
(81, 3216, 28, 28, 'Tiszabura - Tiszaroff', '2010-06-04', '2010-06-30', 6, 4, 0),
(82, 4422, 39, 39, 'Makó', '2010-07-24', '2010-08-31', 4, 2, 30),
(83, 4516, 16, 16, 'Szentes', '2010-02-22', '2010-08-31', 4, 1, 30),
(84, 4516, 16, 16, 'Szentes', '2010-05-28', '2010-06-15', 4, 1, 30),
(85, 4517, 2, 2, 'Csongrád', '2010-03-22', '2010-08-27', 2, 1, 40),
(86, 4519, 1, 1, 'Csongrád', '2010-03-22', '2010-08-27', 2, 1, 40),
(87, 4609, 23, 24, 'Jászkarajenő', '2010-06-03', '2010-06-30', 6, 1, 40),
(88, 4612, 0, 0, 'Abony', '2010-06-03', '2010-06-30', 7, 1, 30),
(89, 4911, 0, 2, 'Nyíregyháza', '2010-03-16', '2010-10-30', 5, 1, 30),
(90, 4918, 0, 3, 'Mátészalka - Nyírcsaholy', '2010-03-30', '2010-06-30', 4, 1, 30),
(91, 5113, 5, 11, 'Őcsény - Decs', '2010-05-06', '2010-06-15', 7, 3, 30),
(92, 5113, 11, 13, 'Decs', '2010-04-28', '2010-07-15', 6, 4, 30),
(93, 5204, 0, 9, 'Bugyi - Kiskunlacháza', '2010-03-16', '2010-07-17', 4, 4, 30),
(94, 5701, 0, 4, 'Bóly - Szederkény', '2010-03-01', '2010-08-31', 4, 4, 0),
(95, 5711, 4, 4, 'Kozármisleny', '2010-08-01', '2010-08-31', 4, 4, 30),
(96, 6231, 0, 0, 'Paks', '2010-03-16', '2010-06-15', 4, 2, 30),
(97, 6316, 2, 3, 'Medina', '2010-04-21', '2010-07-09', 7, 1, 40),
(98, 6535, 16, 16, 'Tevel', '2010-06-03', '2010-06-25', 10, 3, 30),
(99, 6541, 19, 19, 'Magyaregregy', '2010-04-09', '2010-08-31', 11, 3, 30),
(100, 7306, 0, 2, 'Ajka', '2010-07-06', '2010-07-30', 4, 1, 30),
(101, 7417, 0, 2, 'Kerkafalva', '2010-02-01', '2010-12-31', 10, 6, 30),
(102, 7522, 19, 21, 'Esztergályhorváti', '2010-05-31', '2010-06-30', 10, 3, 40),
(103, 7540, 3, 4, 'Letenye - Kistolmács', '2010-05-10', '2010-06-15', 7, 1, 40),
(104, 8101, 32, 32, 'Szárliget', '2010-05-13', '2010-06-15', 7, 3, 30),
(105, 8102, 17, 18, 'Budakeszi', '2010-04-12', '2010-06-30', 10, 1, 30),
(106, 8113, 7, 11, 'Szárliget', '2010-05-13', '2010-06-15', 7, 3, 40),
(107, 8116, 9, 15, 'Pákozd - Sukoró', '2010-03-16', '2010-06-30', 11, 1, 30),
(108, 8127, 26, 26, 'Dad - Kocs', '2010-01-26', '2010-06-30', 10, 5, 0),
(109, 8135, 20, 21, 'Dad - Császár', '2010-05-31', '2010-06-18', 6, 3, 40),
(110, 8135, 10, 10, 'Kecskéd', '2010-05-13', '2010-06-15', 7, 3, 40),
(111, 8136, 18, 19, 'Nagyigmánd', '2010-03-24', '2010-06-30', 1, 2, 40),
(112, 8139, 15, 15, 'Komárom', '2010-03-24', '2010-06-30', 1, 1, 40),
(113, 8142, 0, 1, 'Komárom', '2010-03-24', '2010-06-30', 1, 1, 30),
(114, 8147, 5, 6, 'Nagyigmánd', '2010-06-24', '2010-06-30', 4, 1, 40),
(115, 8301, 17, 32, 'Bakonybél - Nagygyimót', '2010-06-03', '2010-06-30', 6, 1, 40),
(116, 8302, 2, 25, 'Pápa - Gic', '2010-06-03', '2010-06-30', 6, 1, 40),
(117, 8302, 18, 18, 'Pápateszér', '2010-02-24', '2010-06-30', 4, 3, 30),
(118, 8416, 8, 9, 'Malomsok', '2010-06-02', '2010-06-30', 6, 3, 30),
(119, 8437, 0, 2, 'Vashosszúfalu', '2010-03-25', '2010-07-23', 4, 3, 30),
(120, 8445, 2, 3, 'Vép - Nemesbőd', '2010-04-23', '2010-11-15', 4, 5, 40),
(121, 8446, 11, 12, 'Szeleste', '2010-09-08', '2010-09-30', 4, 1, 40),
(122, 8446, 1, 2, 'Sárvár', '2010-03-29', '2010-08-30', 4, 3, 30),
(123, 8453, 0, 1, 'Tokorcs - Kemenesmihályfa', '2010-03-16', '2010-07-13', 4, 3, 30),
(124, 8509, 3, 7, 'Markotabödöge', '2010-06-01', '2010-06-17', 3, 3, 30),
(125, 8627, 10, 11, 'Lövő', '2010-05-29', '2010-06-25', 4, 3, 30),
(126, 8901, 2, 2, 'Szombathely', '2010-06-02', '2010-09-30', 2, 2, 30),
(127, 11129, 0, 0, 'Tát', '2010-05-13', '2010-06-15', 7, 3, 40),
(128, 12126, 0, 0, 'Borsosberény', '2010-05-17', '2010-06-15', 4, 3, 30),
(129, 14101, 0, 1, 'Öttevény', '2010-06-01', '2010-06-16', 3, 3, 30),
(130, 21112, 1, 7, 'Sződ', '2010-05-05', '2010-06-16', 7, 3, 30),
(131, 21153, 6, 10, 'Legénd', '2010-05-03', '2010-06-15', 4, 3, 40),
(132, 22101, 8, 9, 'Dejtár', '2010-05-03', '2010-06-15', 4, 3, 40),
(133, 22109, 6, 7, 'Karancsalja', '2010-05-17', '2010-06-15', 4, 3, 30);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `megnevezes`
--

DROP TABLE IF EXISTS `megnevezes`;
CREATE TABLE IF NOT EXISTS `megnevezes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nev` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb3;

--
-- A tábla adatainak kiíratása `megnevezes`
--

INSERT INTO `megnevezes` (`id`, `nev`) VALUES
(1, 'kábel fektetés'),
(2, 'csomópont építés'),
(3, 'kátyúzás'),
(4, 'útépítés'),
(5, 'aszfaltmarás'),
(6, 'árvíz'),
(7, 'aszfaltozás'),
(8, 'hézagkiöntés'),
(9, 'nyomvályú megszüntetés'),
(10, 'csatorna'),
(11, 'árok- és padkarendezés');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `menu`
--

DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `url` varchar(30) NOT NULL,
  `nev` varchar(30) NOT NULL,
  `szulo` varchar(30) NOT NULL,
  `jogosultsag` varchar(3) NOT NULL,
  `sorrend` tinyint NOT NULL,
  PRIMARY KEY (`url`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- A tábla adatainak kiíratása `menu`
--

INSERT INTO `menu` (`url`, `nev`, `szulo`, `jogosultsag`, `sorrend`) VALUES
('admin', 'Admin', '', '001', 80),
('belepes', 'Belépés', '', '100', 60),
('elerhetoseg', 'Elérhetőség', '', '111', 20),
('kilepes', 'Kilépés', '', '011', 70),
('lekerdezo', 'Lekérdező', '', '110', 30),
('nyitolap', 'Nyitólap', '', '111', 10),
('uzenet', 'Nekünk írták', '', '011', 55);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `mertek`
--

DROP TABLE IF EXISTS `mertek`;
CREATE TABLE IF NOT EXISTS `mertek` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nev` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3;

--
-- A tábla adatainak kiíratása `mertek`
--

INSERT INTO `mertek` (`id`, `nev`) VALUES
(1, 'útszűkület'),
(2, 'sávlezárás'),
(3, 'félpályás lezárás'),
(4, 'teljes lezárás'),
(5, 'nincs lezárás'),
(6, 'nehezen járható');

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `korlatozas`
--
ALTER TABLE `korlatozas`
  ADD CONSTRAINT `megnevezes_ibfk_1` FOREIGN KEY (`megnevid`) REFERENCES `megnevezes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mertek_ibfk_1` FOREIGN KEY (`mertekid`) REFERENCES `mertek` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
