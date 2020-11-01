-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 15, 2019 at 07:28 PM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ID281855_20182019`
--

-- --------------------------------------------------------

--
-- Table structure for table `int2_contact`
--

CREATE TABLE `int2_contact` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `int2_events`
--

CREATE TABLE `int2_events` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `info` text NOT NULL,
  `time` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `requirements` varchar(255) NOT NULL,
  `image` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `int2_events`
--

INSERT INTO `int2_events` (`id`, `name`, `date`, `price`, `slug`, `info`, `time`, `location`, `requirements`, `image`) VALUES
(1, 'Obstacle Run', '2019-09-15', '15', 'Het is zo ver! Onze jaarlijkse Obstacle Run staat voor de deur. Stel je klompen op de proef tijdens deze 5 km lange parcours. ', 'Voor dit event moet je stevig in je klompen staan. Je kan je verwachten aan een parcours vol met modder, water, obstakels en uitdagingen maar vooral veel fun! Zet je beste beentje voor en bewijs dat jij dé beste klompen kan maken. Deze uitdaging vraagt immers om stevige en comfortabele klompen. Zullen jou klompen deze uitdaging overleven?', '14:00 tot 18:00', 'Watersportbaan<br>\r\n9000 Gent', 'We raadden je een paar stevige klompen aan voor deze uitdaging.', 'obstaclerun'),
(2, 'Klompen voor Dummies', '2019-06-22', '20', 'Klaar voor een nieuwe uitdaging? Neem deel aan deze workshop. Samen met professionals leer je de basis van het maken van klompen. ', 'Kan jij niet wachten om jouw eigen paar unieke klompen samen te stellen? Dan is deze workshop zeker iets voor jou. Met keuze uit vijf verschillende houtsoorten en hulp van onze professionele klompenmakers, begeleiden we jou doorheen heel het proces. Deel jouw creatie via <span class=\"text--bold text--green\">#KlompKameraden</span>, iedere maand geven wij diegene die onze favoriete paar klompen maken een leuke goodiebag!', '16:00 tot 21:00', 'Uzien<br>De Cassinastraat 10<br>8540 Deerlijk', 'Alle materiaal en tools zijn voorzien, bovendien voorzien wij van een hapje en drankje.', 'workshop'),
(3, 'Materiaalbeurs', '2019-07-06', '0', 'Op zoek naar de nieuwste soorten materialen om jouw klomp te maken? Op deze materiaalbeurs vind je alles wat je nodig hebt.', 'Zin om de allernieuwste snufjes te vinden om je klomp te maken? Wil jij je klomp pimpen met dé gekste materialen? Op deze beurs vind je het allemaal. Van de modernste klomp-maak tools, tot gekke materialen om je klomp een nieuwe look te geven. Zin om gewoon wat rond te kijken en inspiratie op te doen? Dat kan ook. Geniet van een klompmodeshow, tentoonstelling en tal van andere leuke activiteiten.', '11:00 tot 18:00', 'Kortrijk Xpo<br>Doorniksesteenweg 216<br>8500 Kortrijk', 'Reserveer op tijd voor dit event, plaatsen zijn beperkt.', 'materiaalbeurs'),
(4, 'Klompvoetbal', '2019-08-04', '5', 'Voor de sportievelingen onder ons, die graag met zijn klompen op het voetbalveld loopt, deze wedstrijd is zeker een aanrader!', 'Hou je van sporten en wil je dit tot de next level brengen? Probeer klompvoetbal! Hoe je klomp eruitziet, kies jezelf. Of je nu afkomt met een twee meter lange klomp om de voetbal snel af te pakken, of je jouw klomp volhangt met toeters en bellen, de keuze is geheel aan jou. ', '13:00 tot 16:00', 'Botanische Tuin<br>Boulevard du Jardin Botanique<br>1000 Brussels', 'Klompen dragen is verplicht voor iedere speler.', 'klompvoetbal'),
(5, 'Pimp my Klomp', '2019-08-23', '10', 'Neem deel aan deze creatieve workshop, waar je hands-on te  werk gaat met creatieve materialen om jou klomp te pimpen naar jouw stijl.', 'Wil jij een hippe, trendy klomp ontwerpen? Kom dan zeker langs bij deze workshop. Je krijgt stijladvies over welke klomp bij jou zou passen en leuke tips &amp; tricks. Voor je het weet loop jij met je nieuwe paar omgetoverde klompen rechtstreeks naar de catwalk in Milaan!', '18:30 tot 21:00', 'De Fabriek<br>Kapiteinstraat 47<br>9000 Gen', 'Breng een paar klompen mee voor deze workshop.', 'pimpmyklomp'),
(6, 'Stadswandeling', '2019-08-24', '0', 'Ga mee op stap doorheen de natuur in klompen. De stadswandeling duurt twee uur, op het einde voorziet de organisatie een drankje.', 'Voor iedereen die zin heeft in een gezellige ochtendwandeling in klompen, bieden wij jou een leuk wandeling doorheen Brussel aan. We verzamelen \'s ochtends op de Grote Markt in Brussel. Onze gids zal je begeleidden door deze 8 km lange wandeling waar je de stad zal zien zoals nooit tevoren.', '8:30 tot 11:00', 'Grote Markt<br>1000 Brussel', 'Klompen dragen is verplicht.', 'stadswandeling'),
(7, 'Galabal', '2019-09-13', '15', 'Haal je mooiste klompje maar weer naar boven en zet je beste voetje voor op de dansvloer. Neem deel aan onze jaarlijkse galabal.', 'Het is niet enkel een dansfeest met een fancy outfit op een prachtige locatie, het is een knaller van een feest waar iedereen welkom is (op klompen weliswaar). De klompen zullen pas hetgeen zijn dat pas echt in de spotlight staat. We raadden aan om je klompen op voorhand te pimpen, verras iedereen met je creatieve skills! ', '20:00 tot 5:00', 'Le Bateau<br>\r\nAbeelstraat 1<br>\r\n9000 Gent', 'Het dragen van klompen is verplicht. Je kan je eigen paar klompen dragen of klompen huren aan de kassa aan een waarborg van €10.', 'galabal'),
(8, 'Beauty &amp; The Beast', '2019-10-02', '5', 'Bewijs dat jouw klompen dé mooiste zijn en win! Gewoon nieuwsgierig naar wat andere in petto hebben? Toeschouwers mogen gratis binnen.', 'Haal alvast je creatieve ideeën boven water, wij houden van een paar originele klompen! Je creatie wordt van top tot teen beoordeelt waarbij de gelukkige winnaar naar huis mag met een cheque van 500 euro. Schrijf je dus snel in en loop op de catwalk met je mooiste paar klompen waar jij mee kan pronken.', '14:00 tot 17:00', 'MOU<br>Markt 1<br>9700 Oudenaarde', 'De klompen moeten volledig zelfgemaakt zijn.', 'beauty'),
(9, 'Behind the Scènes', '2019-10-08', '0', 'Ben jij een grote klompen-fanaat en wil jij meer kennis verkrijgen over deze ambacht? Dan is deze gratis lezing zeker iets voor jou!', 'Duik mee de geschiedenis is en leer hoe deze wonderbaarlijke ambacht is ontstaan en deze evolueerde met de tijd. De internationaal gekende docent <span class=\"text--bold\">Klömpfer</span> specialiseert zich al meer dan 30 jaar in het maken van klompen. Als er iemand iets weet over klompen, is hij het wel!', '19:00 tot 21:30', 'UGent Aula<br>Voldersstraat 9<br>9000 Gent', 'Deze lezing wordt gehouden door Dhr. Klömfer', 'bts'),
(10, 'Meet the Professionals', '2019-10-24', '20', 'Noteer het in je agenda, op 24 oktober delen verschillende internationale klompen-makers hun geheimen van het vakmanschap. ', 'Heb jij vragen over het maken van klompen? Wil jij advies krijgen over hoe je je klomp kan verbeteren? Kom dan zeker langs, onze professionals staan jou te hulp. Meer dan 15 internationale professionele klompenmakers zullen aanwezig zijn om al jouw vragen te beantwoorden.', '15:00 tot 18:00', 'Budafabriek<br>Dam 2<br>8500 Kortrijk', 'Ben jij een ware klompen-kenner en wil je inschrijven als professional? Neem dan contact met ons op.', 'professionals');

-- --------------------------------------------------------

--
-- Table structure for table `int2_events_types`
--

CREATE TABLE `int2_events_types` (
  `id` int(11) NOT NULL,
  `event_id` varchar(30) NOT NULL,
  `type_id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `int2_events_types`
--

INSERT INTO `int2_events_types` (`id`, `event_id`, `type_id`) VALUES
(1, '1', '2'),
(2, '1', '3'),
(3, '2', '1'),
(4, '3', '1'),
(5, '4', '2'),
(6, '4', '3'),
(7, '5', '1'),
(8, '6', '1'),
(9, '6', '2'),
(10, '7', '1'),
(11, '8', '1'),
(12, '8', '3'),
(13, '9', '1'),
(14, '10', '1');

-- --------------------------------------------------------

--
-- Table structure for table `int2_orders`
--

CREATE TABLE `int2_orders` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postalcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `int2_orders_events`
--

CREATE TABLE `int2_orders_events` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `int2_types`
--

CREATE TABLE `int2_types` (
  `id` int(11) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `int2_types`
--

INSERT INTO `int2_types` (`id`, `type`) VALUES
(1, 'social'),
(2, 'sport'),
(3, 'competitive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `int2_contact`
--
ALTER TABLE `int2_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `int2_events`
--
ALTER TABLE `int2_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `int2_events_types`
--
ALTER TABLE `int2_events_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `int2_orders`
--
ALTER TABLE `int2_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `int2_orders_events`
--
ALTER TABLE `int2_orders_events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `int2_types`
--
ALTER TABLE `int2_types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `int2_contact`
--
ALTER TABLE `int2_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `int2_events`
--
ALTER TABLE `int2_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `int2_events_types`
--
ALTER TABLE `int2_events_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `int2_orders`
--
ALTER TABLE `int2_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `int2_orders_events`
--
ALTER TABLE `int2_orders_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `int2_types`
--
ALTER TABLE `int2_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
