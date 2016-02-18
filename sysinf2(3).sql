-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 18 Lut 2016, 10:35
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
(1, 1, 'Pierwszy test', '<h1> Pierwszy test </h1>\r\n\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus eleifend nulla, non accumsan urna varius eget. Fusce sem risus, hendrerit id dolor non, ornare vestibulum libero. In mauris urna, tincidunt non semper sit amet, mattis sit amet metus. Vivamus ac varius sapien. Fusce lobortis eros eros, vitae suscipit leo condimentum sit amet. Sed commodo pulvinar dui sit amet gravida. Nam eu urna quis orci tempus sodales.<p>\r\n\r\n<p>Mauris non ante cursus, auctor purus id, condimentum lacus. Mauris bibendum lobortis nunc in ullamcorper. Fusce tempor cursus quam, porttitor varius nisi imperdiet vitae. Vestibulum suscipit ullamcorper metus, a maximus nisi aliquam ut. Suspendisse vel est viverra, pharetra ex et, luctus mauris. Aenean quis arcu turpis. Etiam eget interdum leo, sit amet rutrum ante. Integer eget ipsum vulputate, porttitor purus ut, maximus nisi. Suspendisse sit amet odio arcu. Praesent facilisis pellentesque ultrices.<p>\r\n\r\n<p>Cras elementum laoreet arcu, bibendum imperdiet nibh sollicitudin non. Duis hendrerit non enim eu egestas. Nam nec neque lorem. Suspendisse in condimentum elit. Pellentesque luctus ultrices turpis. Nullam sit amet dignissim erat, a eleifend massa. In hac habitasse platea dictumst. Etiam ut erat vel sapien interdum bibendum. Mauris nec eros eget elit cursus venenatis.<p>\r\n\r\n<p>Nam tincidunt, ligula eget congue feugiat, lorem sapien tristique purus, non mattis lorem neque et neque. Nunc quis turpis tortor. Ut euismod ultricies varius. Etiam eget purus congue, laoreet metus sit amet, dictum ante. Duis quis rhoncus dolor. Proin eu pretium quam, vel pharetra elit. Nullam nec convallis nisi, tincidunt volutpat metus. Maecenas placerat quis enim non pellentesque. Nulla gravida tincidunt egestas. Phasellus vehicula dolor nibh. Nulla facilisi. Proin accumsan pretium tincidunt. Duis ut tellus euismod, sollicitudin enim in, lobortis lorem.<p>\r\n\r\n<p>Nulla posuere ligula sit amet leo imperdiet consectetur. Donec vel efficitur turpis, non tempor libero. Duis id laoreet lectus. Curabitur quis purus bibendum, dapibus lectus quis, ultricies mi. Morbi ac tortor nec erat feugiat blandit ut eget risus. Nullam ut ligula dignissim dui vestibulum blandit sed vitae leo. Curabitur rhoncus libero sit amet turpis faucibus, vel sollicitudin ipsum tristique. Aenean id sem justo. Aliquam auctor vel lorem ut porttitor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec a sodales mauris. Phasellus placerat, erat id gravida commodo, urna enim dictum magna, nec semper ligula magna quis magna.<p> \r\n\r\n<p>Nam tincidunt, ligula eget congue feugiat, lorem sapien tristique purus, non mattis lorem neque et neque. Nunc quis turpis tortor. Ut euismod ultricies varius. Etiam eget purus congue, laoreet metus sit amet, dictum ante. Duis quis rhoncus dolor. Proin eu pretium quam, vel pharetra elit. Nullam nec convallis nisi, tincidunt volutpat metus. Maecenas placerat quis enim non pellentesque. Nulla gravida tincidunt egestas. Phasellus vehicula dolor nibh. Nulla facilisi. Proin accumsan pretium tincidunt. Duis ut tellus euismod, sollicitudin enim in, lobortis lorem.<p>\r\n\r\n<p>Nulla posuere ligula sit amet leo imperdiet consectetur. Donec vel efficitur turpis, non tempor libero. Duis id laoreet lectus. Curabitur quis purus bibendum, dapibus lectus quis, ultricies mi. Morbi ac tortor nec erat feugiat blandit ut eget risus. Nullam ut ligula dignissim dui vestibulum blandit sed vitae leo. Curabitur rhoncus libero sit amet turpis faucibus, vel sollicitudin ipsum tristique. Aenean id sem justo. Aliquam auctor vel lorem ut porttitor. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec a sodales mauris. Phasellus placerat, erat id gravida commodo, urna enim dictum magna, nec semper ligula magna quis magna.<p> ', 'admin/article/artykuly/Pierwszy test.php', '2016-01-25'),
(3, 1, 'nowy3', 'asdsad', 'admin/article/artykuly/nowy3.php', '2016-01-28'),
(4, 1, 'nowy4', 'dsfsdf', 'admin/article/artykuly/nowy4.php', '2016-01-28'),
(5, 1, 'artykulikkk', '<h1>tytul<h1>\r\n<p>siema</p>', 'admin/article/artykuly/artykulikkk.php', '2016-01-28'),
(6, 2, 'nowy', '<h1> tresc naglowka </h1>', 'admin/article/artykuly/nowy.php', '2016-01-29');

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
(6, 6, 2);

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
(1, 4, 'fsdfs', '2016-01-28 00:04:39', 2),
(2, 3, 'Komentarzyk', '2016-01-29 09:52:44', 2);

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
(1, 1, 4, 2),
(2, 2, 3, 2);

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
(2, 'brzoska', 'brzoska', 'brzo@mail.ff', 5454554, NULL, NULL, '2016-01-24');

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
