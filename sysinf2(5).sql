-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 15 Mar 2016, 18:00
-- Wersja serwera: 5.6.21
-- Wersja PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `sysinf2`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `artykuly`
--

CREATE TABLE IF NOT EXISTS `artykuly` (
  `id_artykulu` int(10) NOT NULL,
  `id_kategorii` int(2) NOT NULL,
  `tytul` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `tresc` text COLLATE utf8_polish_ci NOT NULL,
  `link` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `artykuly`
--

INSERT INTO `artykuly` (`id_artykulu`, `id_kategorii`, `tytul`, `tresc`, `link`, `data`) VALUES
(1, 1, 'Pierwszy', '<h1> 1-szy artykuÅ‚ </h1>\r\n<p> To ja! Pierwszy artykuÅ‚ </p>', 'admin/article/artykuly/Pierwszy.php', '2016-03-06'),
(2, 1, 'Drugi', '<h1> Jestem drugi na liÅ›cie </h1>', 'admin/article/artykuly/Drugi.php', '2016-03-06'),
(3, 2, 'nowyy', 'gsgd', 'admin/article/artykuly/nowyy.php', '2016-03-14');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `datowanie`
--

CREATE TABLE IF NOT EXISTS `datowanie` (
  `id` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `id_kursu` int(11) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `datowanie`
--

INSERT INTO `datowanie` (`id`, `id_uzytkownika`, `id_kursu`, `data`) VALUES
(1, 1, 1, '2016-01-27 18:44:53'),
(2, 2, 2, '2016-01-28 11:31:41');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategoria`
--

CREATE TABLE IF NOT EXISTS `kategoria` (
  `id_kategorii` int(2) NOT NULL,
  `nazwa` varchar(40) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kategoria`
--

INSERT INTO `kategoria` (`id_kategorii`, `nazwa`) VALUES
(2, 'Druga kategoria'),
(3, 'nowa'),
(4, 'nowiuÅ›ka'),
(1, 'Pierwsza kategoria');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategoria-artykul`
--

CREATE TABLE IF NOT EXISTS `kategoria-artykul` (
  `id` int(10) NOT NULL,
  `id_artykulu` int(10) NOT NULL,
  `id_kategorii` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kategoria-artykul`
--

INSERT INTO `kategoria-artykul` (`id`, `id_artykulu`, `id_kategorii`) VALUES
(1, 1, 1),
(3, 3, 1),
(4, 4, 1),
(5, 5, 1),
(6, 6, 2),
(7, 7, 2),
(8, 8, 2),
(9, 9, 2),
(10, 1, 1),
(11, 2, 1),
(13, 4, 1),
(14, 5, 1),
(15, 6, 2),
(16, 7, 2),
(17, 8, 2),
(18, 9, 2),
(19, 10, 3),
(20, 11, 3),
(21, 12, 2),
(22, 3, 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarz`
--

CREATE TABLE IF NOT EXISTS `komentarz` (
  `ID_komentarza` int(3) NOT NULL,
  `ID_artykulu` int(10) NOT NULL,
  `tresc` text COLLATE utf8_polish_ci NOT NULL,
  `data` datetime NOT NULL,
  `ID_uzytkownika` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `komentarz`
--

INSERT INTO `komentarz` (`ID_komentarza`, `ID_artykulu`, `tresc`, `data`, `ID_uzytkownika`) VALUES
(1, 6, 'nom', '2016-03-08 13:52:35', 4),
(2, 6, 'nono', '2016-03-08 13:52:38', 4),
(3, 6, 'hm...', '2016-03-08 13:52:42', 4),
(4, 6, 'rewrewrew', '2016-03-08 14:07:33', 4),
(5, 7, 'hohojp', '2016-03-08 14:12:32', 1),
(6, 7, 'hmmmm', '2016-03-08 14:12:36', 1),
(7, 7, 'i?', '2016-03-08 14:12:40', 1),
(8, 9, 'fsdfd', '2016-03-08 14:51:54', 1),
(9, 9, 'dsfdsf', '2016-03-08 14:51:57', 1),
(10, 9, 'dfdfdfdfd', '2016-03-08 14:52:02', 1),
(11, 3, 'pfff', '2016-03-14 07:02:27', 1),
(12, 3, 'hmm\r\n', '2016-03-14 07:02:30', 1),
(13, 3, 'i vo?', '2016-03-14 07:02:34', 1),
(14, 3, 'dfsdfd', '2016-03-14 07:08:31', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarz-artykul`
--

CREATE TABLE IF NOT EXISTS `komentarz-artykul` (
  `id` int(11) NOT NULL,
  `id_komentarza` int(10) NOT NULL,
  `id_artykulu` int(15) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `komentarz-artykul`
--

INSERT INTO `komentarz-artykul` (`id`, `id_komentarza`, `id_artykulu`, `id_uzytkownika`) VALUES
(1, 1, 6, 4),
(2, 2, 6, 4),
(3, 3, 6, 4),
(4, 4, 6, 4),
(5, 5, 7, 1),
(6, 6, 7, 1),
(7, 7, 7, 1),
(8, 8, 9, 1),
(9, 9, 9, 1),
(10, 10, 9, 1),
(11, 11, 3, 1),
(12, 12, 3, 1),
(13, 13, 3, 1),
(14, 14, 3, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kurs`
--

CREATE TABLE IF NOT EXISTS `kurs` (
  `id_kursu` int(11) NOT NULL,
  `nazwa` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `cena` int(11) NOT NULL,
  `stan` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kurs`
--

INSERT INTO `kurs` (`id_kursu`, `nazwa`, `cena`, `stan`) VALUES
(3, 'kursik', 124, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ocena_quizu`
--

CREATE TABLE IF NOT EXISTS `ocena_quizu` (
  `id_oceny` int(11) NOT NULL,
  `ocena` int(1) NOT NULL,
  `id_quizu` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `id_quizu` int(11) NOT NULL,
  `nazwa` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `tresc` text COLLATE utf8_polish_ci NOT NULL,
  `id_autora` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `samouczek`
--

CREATE TABLE IF NOT EXISTS `samouczek` (
  `id_samouczka` int(11) NOT NULL,
  `id_autora` int(11) NOT NULL,
  `nazwa` varchar(40) COLLATE utf8_polish_ci NOT NULL,
  `tresc` text COLLATE utf8_polish_ci NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE IF NOT EXISTS `uzytkownik` (
  `id` int(15) NOT NULL,
  `login` varchar(35) COLLATE utf8_polish_ci NOT NULL,
  `password` varchar(35) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(35) COLLATE utf8_polish_ci NOT NULL,
  `telefon` int(15) DEFAULT NULL,
  `imie` varchar(25) COLLATE utf8_polish_ci DEFAULT NULL,
  `nazwisko` varchar(35) COLLATE utf8_polish_ci DEFAULT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`id`, `login`, `password`, `email`, `telefon`, `imie`, `nazwisko`, `data`) VALUES
(1, 'admin', '!?admin15?16', 'piotr210694@wp.pl', 343443, 'adam', 'Kowalski', '2016-01-24'),
(4, 'brzoska', 'Brzoska15!', 'brzo@wp.pl', 123456789, 'Daniel', 'Brzoska', '2016-02-24'),
(5, 'elo2d', 'elo', 'elo@wp.pl23', 0, '', '', '2016-02-21'),
(6, 'Tomek', 'Tomek16!', 'te@dsfds.pl', NULL, NULL, NULL, '2016-03-06'),
(7, 'Tomasz', 'BasaÅ‚aj15!', 'bio@on.pl', NULL, NULL, NULL, '2016-03-06');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `artykuly`
--
ALTER TABLE `artykuly`
  ADD PRIMARY KEY (`id_artykulu`);

--
-- Indexes for table `datowanie`
--
ALTER TABLE `datowanie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`id_kategorii`), ADD UNIQUE KEY `nazwa` (`nazwa`);

--
-- Indexes for table `kategoria-artykul`
--
ALTER TABLE `kategoria-artykul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `komentarz`
--
ALTER TABLE `komentarz`
  ADD PRIMARY KEY (`ID_komentarza`);

--
-- Indexes for table `komentarz-artykul`
--
ALTER TABLE `komentarz-artykul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kurs`
--
ALTER TABLE `kurs`
  ADD PRIMARY KEY (`id_kursu`);

--
-- Indexes for table `ocena_quizu`
--
ALTER TABLE `ocena_quizu`
  ADD PRIMARY KEY (`id_oceny`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id_quizu`);

--
-- Indexes for table `samouczek`
--
ALTER TABLE `samouczek`
  ADD PRIMARY KEY (`id_samouczka`);

--
-- Indexes for table `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `login` (`login`), ADD UNIQUE KEY `email` (`email`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
