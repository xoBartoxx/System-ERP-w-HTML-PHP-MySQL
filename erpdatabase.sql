-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 19 Lis 2023, 19:16
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `erpdatabase`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `Imie` varchar(30) DEFAULT NULL,
  `Nazwisko` varchar(45) DEFAULT NULL,
  `Adres` varchar(50) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `login` varchar(60) NOT NULL,
  `haslo` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `customers`
--

INSERT INTO `customers` (`id`, `Imie`, `Nazwisko`, `Adres`, `email`, `login`, `haslo`) VALUES
(2, 'jan', 'kowaslski', '14411 Liverpool Road, Ganton', 'test@wp.pl', 'test123', '098f6bcd4621d373cade4e832627b4f6'),
(3, 'Jakub', 'Lolek', 'Ul. Miodowa 32 Poznań', 'user@gmail.com', 'user', '6d932c406fa15164ee48ff5a52f81dae'),
(8, 'Krzysztof', 'Jaruzelski', 'Warszatowa 37 Piła', 'jaru@gmail.com', 'klient', '62630c01b8a1b5a5d14139bce3f60fea');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employeeactions`
--

CREATE TABLE `employeeactions` (
  `id_akcji` int(11) NOT NULL,
  `log` varchar(60) DEFAULT NULL,
  `data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `employeeactions`
--

INSERT INTO `employeeactions` (`id_akcji`, `log`, `data`) VALUES
(1, 'Dodano produkt Klawiatura membranowa Reinston EKP01', '2023-11-19'),
(2, 'Dodano produkt Mysz MAD DOG GM805 Czarny', '2023-11-19'),
(3, 'Dodano produkt Słuchawki HyperX Cloud Alpha', '2023-11-19'),
(5, 'Zedytowano produkt o numerze 1', '2023-11-19'),
(14, 'Dodano produkt Komputer', '2023-11-19'),
(15, 'Usunięto produkt o numerze 4', '2023-11-19'),
(16, 'Usunięto klienta o numerze 1', '2023-11-19'),
(17, 'Dodano pracownika o loginie pracownik', '2023-11-19'),
(18, 'Dodano klienta o loginie klient', '2023-11-19'),
(19, 'Dodano produkt HyperX Cloud Alpha II', '2023-11-19'),
(20, 'Dodano produkt Logitech G403 Hero', '2023-11-19');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `Imie` varchar(30) DEFAULT NULL,
  `Nazwisko` varchar(45) DEFAULT NULL,
  `Adres` varchar(50) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `login` varchar(60) NOT NULL,
  `haslo` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `employees`
--

INSERT INTO `employees` (`id`, `Imie`, `Nazwisko`, `Adres`, `email`, `login`, `haslo`) VALUES
(1, 'Janusz', 'Kopalnia', 'ul. Lipowa 2, Wrocław', 'janusz.kopalnia@gmail.com', 'pracownik', '491910ff69cf9f888d5bed54630ffbaa');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `orders`
--

CREATE TABLE `orders` (
  `id_zamowienia` int(11) NOT NULL,
  `id_produktu` int(11) DEFAULT NULL,
  `Ilosc` int(11) DEFAULT NULL,
  `data_zamowienia` date DEFAULT NULL,
  `Id_klienta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `orders`
--

INSERT INTO `orders` (`id_zamowienia`, `id_produktu`, `Ilosc`, `data_zamowienia`, `Id_klienta`) VALUES
(1, 1, 1, '2023-11-19', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `Nazwa` varchar(60) DEFAULT NULL,
  `Opis` varchar(100) DEFAULT NULL,
  `Cena` decimal(10,2) DEFAULT NULL,
  `Dostepnosc` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `products`
--

INSERT INTO `products` (`id`, `Nazwa`, `Opis`, `Cena`, `Dostepnosc`) VALUES
(1, 'Klawiatura membranowa Reinston EKP01', 'Klawiatura przewodowa EKP01 to idealny wybór, jeśli szukasz klasycznych akcesoriów komputerowych do ', '27.99', 3),
(5, 'HyperX Cloud Alpha II', 'Gamingowe słuchawki dla graczy', '270.99', 3),
(6, 'Logitech G403 Hero', 'Gamingowa myszka dla graczy', '350.69', 10);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `employeeactions`
--
ALTER TABLE `employeeactions`
  ADD PRIMARY KEY (`id_akcji`);

--
-- Indeksy dla tabeli `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_zamowienia`),
  ADD KEY `id_produktu` (`id_produktu`),
  ADD KEY `Id_klienta` (`Id_klienta`);

--
-- Indeksy dla tabeli `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `employeeactions`
--
ALTER TABLE `employeeactions`
  MODIFY `id_akcji` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT dla tabeli `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `orders`
--
ALTER TABLE `orders`
  MODIFY `id_zamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_produktu`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`Id_klienta`) REFERENCES `customers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
