-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 08 Sty 2016, 20:36
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `artykuly`
--

INSERT INTO `artykuly` (`id_artykulu`, `id_kategorii`, `tytul`, `tresc`, `link`, `data`) VALUES
(1, 1, 'PIERWSZY', '<html>\r\n<body>\r\n<h1>FAZA</h1>\r\n</body>\r\n\r\n</html>', 'admin/article/artykuly/PIERWSZY.php', '2016-01-08'),
(2, 1, 'fdsfsd', '$esfsdf', 'admin/article/artykuly/fdsfsd.php', '2016-01-08'),
(3, 1, 'sadsa', 'In dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulumIn dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulum', 'admin/article/artykuly/sadsa.php', '2016-01-08'),
(4, 1, 'trzecio', 'In dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulum\r\nIn dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulum\r\nIn dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulum\r\nIn dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulum\r\nIn dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulum', 'admin/article/artykuly/trzecio.php', '2016-01-08'),
(5, 1, 'czwarty', 'In dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulumIn dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulumIn dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulumIn dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulumIn dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulumIn dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulumIn dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulumIn dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulumIn dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulumIn dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulumIn dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulumIn dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulumIn dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulumIn dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulumIn dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulumIn dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulumIn dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulumIn dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulumIn dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulumIn dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulumIn dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulumIn dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulumIn dui turpis, varius nec neque id, mollis cursus neque. Pellentesque eget laoreet nulla. Nam lectus ex, vehicula ut euismod et, rhoncus in lectus. Donec luctus, sapien a venenatis vulputate, sapien ante condimentum lectus, ut molestie enim velit vitae magna. Suspendisse varius neque pulvinar enim ornare, nec lobortis enim lobortis. Ut eu ex neque. Vestibulum feugiat ligula et arcu rhoncus, quis maximus mauris pellentesque. Vivamus fermentum ultrices lacus vel vulputate. Morbi ultrices dolor nulla, ac lobortis nisl vestibulum sed. Vestibulum iaculis, lectus eget condimentum sodales, lorem nulla fermentum tellus, volutpat congue lacus dolor et quam. Phasellus ac risus blandit nisi rutrum suscipit non eu mauris. Vestibulum fringilla non neque vitae vestibulum', 'admin/article/artykuly/czwarty.php', '2016-01-08');

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
  `tresc` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `data` date NOT NULL,
  `ID_uzytkownika` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'admin', '!?admin15?16', 'piotr210694@wp.pl', NULL, NULL, NULL, '2015-11-28'),
(2, 'brzoska', 'brzoska', 'brzoska@onet.pl', 45242, 'brzoska', 'brzoska', '2015-12-01'),
(3, 'brzoska2', 'brzoska2', 'piotr210694@wp.pl', NULL, NULL, NULL, '2016-01-05'),
(4, 'andrzejek', 'elo', 'mail@o2.pl', NULL, NULL, NULL, '2016-01-05');

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
  ADD PRIMARY KEY (`ID_komentarza`), ADD UNIQUE KEY `FK` (`ID_uzytkownika`), ADD KEY `ID_artykulu` (`ID_artykulu`), ADD FULLTEXT KEY `tresc` (`tresc`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `artykuly`
--
ALTER TABLE `artykuly`
  MODIFY `id_artykulu` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `id_kategorii` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `komentarz`
--
ALTER TABLE `komentarz`
  MODIFY `ID_komentarza` int(11) NOT NULL AUTO_INCREMENT;
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
