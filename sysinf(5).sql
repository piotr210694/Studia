-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Sty 2016, 19:27
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
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE IF NOT EXISTS `user` (
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
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `email`, `telefon`, `imie`, `nazwisko`, `data`) VALUES
(1, 'admin', '!?admin15?16', 'piotr210694@wp.pl', NULL, NULL, NULL, '2015-11-28'),
(2, 'brzoska', 'brzoska', 'brzoska@onet.pl', 4534534, 'brzoska', 'brzoska', '2015-12-01'),
(3, 'brzoska2', 'brzoska2', 'piotr210694@wp.pl', NULL, NULL, NULL, '2016-01-05'),
(4, 'andrzejek', 'elo', 'mail@o2.pl', NULL, NULL, NULL, '2016-01-05');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
