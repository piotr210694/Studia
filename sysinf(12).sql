-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 24 Sty 2016, 12:05
-- Wersja serwera: 5.6.21
-- Wersja PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `sysinf`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `artykuly`
--

CREATE TABLE IF NOT EXISTS `artykuly` (
  `id_artykulu` int(11) NOT NULL,
  `id_kategorii` int(11) NOT NULL,
  `tytul` varchar(30) COLLATE utf8_polish_ci NOT NULL,
  `tresc` text COLLATE utf8_polish_ci NOT NULL,
  `link` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `artykuly`
--

INSERT INTO `artykuly` (`id_artykulu`, `id_kategorii`, `tytul`, `tresc`, `link`, `data`) VALUES
(1, 1, 'nowy', 'sdfdsfsdf', 'admin/article/artykuly/nowy.php', '2016-01-12'),
(2, 1, 'artykul test', '<h1> Ciekawe czy dziaÅ‚a</h1>\r\n\r\n\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eu nisi mattis, tristique urna ac, tincidunt turpis. Sed ut tempus sapien, nec elementum eros. Nam convallis aliquet orci, et euismod urna laoreet nec. Sed vel turpis eu nibh consectetur feugiat a eu mauris. Aenean tempus, libero non tristique tincidunt, nisi nibh fringilla massa, a lobortis sapien lectus non est. Proin facilisis a tortor eget accumsan. Nulla accumsan tellus et mauris consectetur sollicitudin. Phasellus lacus urna, dictum eget massa non, volutpat rutrum arcu. Duis molestie vitae ipsum non mollis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris porta dignissim sapien nec pulvinar. Sed nibh massa, bibendum sed aliquet gravida, vehicula vitae dui. Fusce urna nisl, lacinia a purus vitae, varius maximus justo. Praesent ut erat sit amet lacus convallis commodo.\r\n\r\nPellentesque sed dapibus tortor. Nunc et elit arcu. Vivamus vel leo eu massa congue euismod. In ac velit eu urna posuere efficitur. Mauris eget tristique justo. Integer ultricies cursus felis, id hendrerit est sodales at. Vestibulum eleifend, urna ac sagittis pretium, erat turpis luctus est, eget semper risus dolor et dolor. Cras ultricies metus a nisi ullamcorper, non faucibus magna ultricies. Quisque feugiat lacus mi, in ultrices dui placerat a. Pellentesque non mi ut lacus sagittis tempor. Nam hendrerit, eros elementum mattis posuere, tellus sem finibus turpis, sed cursus purus sapien a risus. Phasellus consectetur posuere posuere.\r\n\r\nNunc diam justo, accumsan eu risus sit amet, tincidunt elementum libero. Vivamus ut risus vitae libero consequat placerat. Nulla ipsum arcu, congue a augue et, faucibus tincidunt arcu. Suspendisse nisi neque, dapibus eu nisi ut, dignissim maximus diam. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec in urna in arcu maximus euismod vel id augue. In eget cursus orci, sit amet volutpat lacus. Fusce faucibus lorem eu finibus euismod. Nam eget mauris neque. Morbi vel commodo tellus. Fusce condimentum quam at nibh lacinia, quis sollicitudin dui maximus. Fusce quis metus vitae leo dapibus sagittis. Vestibulum eget eleifend velit.\r\n\r\nVivamus mollis et leo vel rhoncus. Integer ullamcorper justo viverra, condimentum erat vitae, tincidunt sapien. Nunc convallis egestas orci at egestas. Curabitur gravida non lectus et pharetra. Vestibulum vulputate nulla iaculis elit sagittis tristique. Vivamus justo risus, pellentesque sit amet ultrices eu, accumsan a ex. Morbi eu consequat ex, nec tristique ipsum. Interdum et malesuada fames ac ante ipsum primis in faucibus. Vestibulum nisi lectus, tristique at mi eu, ullamcorper imperdiet libero.\r\n\r\nCras ac ultrices lorem. Mauris semper lectus nunc, a molestie turpis aliquam id. Vivamus et egestas orci, ac cursus est. Proin cursus imperdiet tortor, ut vehicula magna elementum id. Morbi sodales nisl et purus hendrerit malesuada. Etiam laoreet malesuada venenatis. Maecenas nec pharetra diam. Aliquam erat volutpat. Etiam congue magna ac felis porttitor, sed ornare neque lobortis. Fusce pretium pretium ultricies. Maecenas placerat, odio nec sodales fringilla, est lacus ultricies nisl, ut tristique nulla massa at lorem. Curabitur nec urna nibh. Quisque facilisis id lacus eget pharetra. Donec sed iaculis velit. ', 'admin/article/artykuly/artykul test.php', '2016-01-14'),
(3, 1, 'tester', '<h1>Jest z komentem?</h1>\r\nhm?', 'admin/article/artykuly/tester.php', '2016-01-18'),
(4, 1, 'lukaszek', '<h1> elo elo</h1>\r\nTo ja Åukaszek!', 'admin/article/artykuly/lukaszek.php', '2016-01-19');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategoria`
--

CREATE TABLE IF NOT EXISTS `kategoria` (
  `id_kategorii` int(11) NOT NULL,
  `nazwa` varchar(20) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kategoria`
--

INSERT INTO `kategoria` (`id_kategorii`, `nazwa`) VALUES
(1, 'Pierwsza kategoria'),
(2, 'Druga kategoria');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `komentarz`
--

CREATE TABLE IF NOT EXISTS `komentarz` (
  `ID_komentarza` int(11) NOT NULL,
  `ID_artykulu` int(11) NOT NULL,
  `tresc` text COLLATE utf8_polish_ci NOT NULL,
  `data` datetime NOT NULL,
  `ID_uzytkownika` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `komentarz`
--

INSERT INTO `komentarz` (`ID_komentarza`, `ID_artykulu`, `tresc`, `data`, `ID_uzytkownika`) VALUES
(1, 2, 'jestem brzoska', '2016-01-16 19:05:08', 2),
(2, 2, 'Jestem admin', '2016-01-16 19:05:32', 1),
(3, 1, 'dsfdsf', '2016-01-17 00:00:00', 1),
(4, 2, 'Brzoska po raz 2gi', '2016-01-17 10:15:52', 2),
(5, 3, 'Nowy komentarz dla testera', '2016-01-18 13:33:21', 2),
(6, 4, 'Ale ten Åukasze to frajer', '2016-01-19 21:20:21', 2),
(7, 4, 'Nowy komentarz', '2016-01-22 10:41:44', 2),
(8, 3, 'nowerwew', '2016-01-22 10:41:56', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kurs`
--

CREATE TABLE IF NOT EXISTS `kurs` (
  `ID_kursu` int(11) NOT NULL,
  `nazwa` varchar(15) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `cena` int(10) NOT NULL,
  `stan` varchar(15) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ocena_quizu`
--

CREATE TABLE IF NOT EXISTS `ocena_quizu` (
  `ID_oceny` int(11) NOT NULL,
  `ID_uzytkownika` int(11) NOT NULL,
  `ID_quizu` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `ID_quizu` int(11) NOT NULL,
  `ID_oceny` int(11) NOT NULL,
  `nazwa` varchar(15) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `autor` varchar(15) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `samouczek`
--

CREATE TABLE IF NOT EXISTS `samouczek` (
  `ID_samouczka` int(11) NOT NULL,
  `ID_uzytkownika` int(11) NOT NULL,
  `nazwa` varchar(15) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `tresc` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE IF NOT EXISTS `uzytkownik` (
  `id` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `password` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `telefon` int(11) DEFAULT NULL,
  `imie` text COLLATE utf8_polish_ci,
  `nazwisko` text COLLATE utf8_polish_ci,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownik`
--

INSERT INTO `uzytkownik` (`id`, `login`, `password`, `email`, `telefon`, `imie`, `nazwisko`, `data`) VALUES
(1, 'admin', '!?admin15?16', 'piotr210694@wp.pl', 486, NULL, NULL, '2015-11-28'),
(2, 'brzoska', 'brzoska', 'pio@on.pl', 73226323, 'eelelele', 'werwe', '2015-12-01');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `artykuly`
--
ALTER TABLE `artykuly`
  ADD PRIMARY KEY (`id_artykulu`), ADD FULLTEXT KEY `tresc` (`tresc`);

--
-- Indexes for table `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`id_kategorii`);

--
-- Indexes for table `komentarz`
--
ALTER TABLE `komentarz`
  ADD PRIMARY KEY (`ID_komentarza`), ADD UNIQUE KEY `ID_komentarza` (`ID_komentarza`), ADD KEY `ID_artykulu` (`ID_artykulu`), ADD FULLTEXT KEY `tresc` (`tresc`);

--
-- Indexes for table `kurs`
--
ALTER TABLE `kurs`
  ADD PRIMARY KEY (`ID_kursu`);

--
-- Indexes for table `ocena_quizu`
--
ALTER TABLE `ocena_quizu`
  ADD PRIMARY KEY (`ID_oceny`), ADD UNIQUE KEY `ID_uzytkownika` (`ID_uzytkownika`), ADD UNIQUE KEY `ID_quizu` (`ID_quizu`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`ID_quizu`), ADD UNIQUE KEY `ID_oceny` (`ID_oceny`);

--
-- Indexes for table `samouczek`
--
ALTER TABLE `samouczek`
  ADD PRIMARY KEY (`ID_samouczka`), ADD UNIQUE KEY `ID_uzytkownika` (`ID_uzytkownika`), ADD FULLTEXT KEY `tresc` (`tresc`);

--
-- Indexes for table `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `artykuly`
--
ALTER TABLE `artykuly`
  MODIFY `id_artykulu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `id_kategorii` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `komentarz`
--
ALTER TABLE `komentarz`
  MODIFY `ID_komentarza` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT dla tabeli `kurs`
--
ALTER TABLE `kurs`
  MODIFY `ID_kursu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `ocena_quizu`
--
ALTER TABLE `ocena_quizu`
  MODIFY `ID_oceny` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `quiz`
--
ALTER TABLE `quiz`
  MODIFY `ID_quizu` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `samouczek`
--
ALTER TABLE `samouczek`
  MODIFY `ID_samouczka` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
