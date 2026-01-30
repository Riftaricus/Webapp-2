-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Generation Time: Jan 29, 2026 at 07:08 PM
-- Server version: 8.4.7
-- PHP Version: 8.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Flights`
--
CREATE DATABASE IF NOT EXISTS `Flights` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `Flights`;

-- --------------------------------------------------------

--
-- Table structure for table `Account_Data`
--

CREATE TABLE `Account_Data` (
  `UserId` int NOT NULL,
  `Username` varchar(45) NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `CreationDate` date NOT NULL,
  `Language` varchar(2) NOT NULL DEFAULT 'EN',
  `Person_Id` int NOT NULL DEFAULT '-1',
  `IsAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Account_Data`
--

INSERT INTO `Account_Data` (`UserId`, `Username`, `Password`, `CreationDate`, `Language`, `Person_Id`, `IsAdmin`) VALUES
(16, 'Max', '$2y$12$IoQrIWYcG.FsXrOvSsMUUu1cqQE473jQdXDRXJAGhOowNmsgQTYs2', '2026-01-15', 'EN', -1, 1),
(18, 'root', '$2y$12$GVQ0CwO4n4JjCFLpF8JujeRSIXhOtLQ35Ivy2bHniYk20mXasuU/2', '2026-01-21', 'EN', -1, 1),
(22, 'Morris', '$2y$12$NLLMyBTLwIADsq1eCZHiI.Dx7q.t9v6S.CzvWg7LNZvMXA8z72J0G', '2026-01-28', 'EN', -1, 1),
(23, 'daan', '$2y$12$8EtHYQ9gAzjXuyToZQ51j.gNhABvGtoI8vc27d.NKHLxH1u0R12zG', '2026-01-28', 'EN', -1, 0),
(24, 'NiekB', '$2y$12$qEk8OOi2HVkihKh8A7/4ceCX2ZDL5SJ.JCDjU0WKr5Mt.jmw7UgI2', '2026-01-28', 'EN', -1, 1),
(25, 'admin', '$2y$12$IWZDxXMM1VpXlXaP9wbCqePicBaHV9fRUDtbBG87Wbjw0870vw9by', '2026-01-29', 'EN', -1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Available_Flights`
--

CREATE TABLE `Available_Flights` (
  `Flight_Id` int NOT NULL,
  `Flight_Cost` int NOT NULL,
  `Flight_Duration` int NOT NULL COMMENT 'In hours',
  `From_Country_Id` int NOT NULL,
  `To_Country_Id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Available_Flights`
--

INSERT INTO `Available_Flights` (`Flight_Id`, `Flight_Cost`, `Flight_Duration`, `From_Country_Id`, `To_Country_Id`) VALUES
(326, 8011, 22, 20, 0),
(327, 5574, 24, 12, 10),
(328, 8179, 8, 1, 26),
(329, 5714, 5, 2, 11),
(330, 3406, 13, 7, 9),
(331, 3305, 12, 12, 26),
(332, 3897, 16, 4, 22),
(333, 8695, 16, 32, 5),
(334, 1635, 5, 12, 4),
(335, 2608, 22, 29, 16),
(336, 7366, 12, 17, 35),
(337, 2999, 23, 39, 22),
(338, 4332, 20, 33, 11),
(339, 8369, 21, 39, 28),
(340, 8930, 14, 30, 26),
(341, 5620, 18, 4, 31),
(342, 3830, 24, 13, 29),
(343, 9383, 4, 2, 7),
(344, 2537, 20, 21, 0),
(345, 6709, 4, 8, 36),
(346, 8782, 10, 3, 0),
(347, 4674, 19, 21, 15),
(348, 5713, 12, 22, 31),
(349, 2643, 3, 31, 30),
(350, 5795, 23, 12, 19),
(351, 7033, 4, 5, 32),
(352, 2321, 10, 30, 31),
(353, 7456, 21, 19, 21),
(354, 6242, 19, 10, 31),
(355, 192, 5, 30, 16),
(356, 1172, 22, 28, 17),
(357, 9682, 18, 11, 0),
(358, 6292, 6, 39, 15),
(359, 6597, 19, 15, 11),
(360, 2644, 6, 20, 36),
(361, 9477, 7, 18, 28),
(362, 8173, 24, 2, 11),
(363, 1582, 11, 32, 30),
(364, 1454, 5, 6, 31),
(365, 4755, 9, 33, 29),
(366, 6723, 4, 13, 38),
(367, 7470, 13, 3, 24),
(368, 250, 5, 25, 11),
(369, 8837, 5, 9, 12),
(370, 1732, 14, 32, 12),
(371, 4451, 4, 9, 37),
(372, 5088, 19, 27, 31),
(373, 9169, 23, 31, 27),
(374, 5933, 6, 34, 16),
(375, 866, 20, 19, 24),
(376, 5916, 7, 39, 6),
(377, 2546, 9, 29, 34),
(378, 9916, 20, 27, 32),
(379, 5690, 17, 27, 0),
(380, 6828, 23, 39, 3),
(381, 1048, 6, 8, 2),
(382, 8094, 10, 19, 18),
(383, 7618, 21, 10, 12),
(384, 2460, 21, 1, 18),
(385, 9382, 2, 13, 6),
(386, 5303, 13, 16, 12),
(387, 6174, 20, 16, 13),
(388, 3399, 21, 16, 32),
(389, 4130, 4, 26, 25),
(390, 6082, 3, 3, 10),
(391, 160, 23, 31, 1),
(392, 240, 23, 37, 7),
(393, 9533, 4, 25, 33),
(394, 7292, 15, 21, 34),
(395, 336, 9, 10, 0),
(396, 8996, 12, 21, 2),
(397, 7625, 2, 3, 39),
(398, 8229, 18, 14, 37),
(399, 3479, 3, 33, 4),
(400, 8683, 14, 21, 18),
(401, 6339, 19, 25, 22),
(402, 2381, 14, 34, 25),
(403, 6333, 21, 6, 11),
(404, 4200, 18, 38, 31),
(405, 3262, 2, 27, 19),
(406, 3369, 7, 6, 29),
(407, 4952, 19, 12, 38),
(408, 5671, 10, 36, 24),
(409, 1445, 21, 11, 27);

-- --------------------------------------------------------

--
-- Table structure for table `Bank_Information`
--

CREATE TABLE `Bank_Information` (
  `Bank Account Number` int NOT NULL,
  `Bank Card Number` int NOT NULL,
  `Validation Date` date NOT NULL,
  `CVV` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Booked_Flights`
--

CREATE TABLE `Booked_Flights` (
  `id` int NOT NULL,
  `Flight_Id` int NOT NULL,
  `From_Country_Id` int NOT NULL,
  `To_Country_Id` int NOT NULL,
  `UserId` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Booked_Flights`
--

INSERT INTO `Booked_Flights` (`id`, `Flight_Id`, `From_Country_Id`, `To_Country_Id`, `UserId`) VALUES
(9, 368, 25, 11, 25);

-- --------------------------------------------------------

--
-- Table structure for table `Country`
--

CREATE TABLE `Country` (
  `Country_Id` int NOT NULL,
  `Country_Name` varchar(45) NOT NULL,
  `Country_Description` varchar(2550) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Country`
--

INSERT INTO `Country` (`Country_Id`, `Country_Name`, `Country_Description`) VALUES
(0, 'Netherlands', 'The Netherlands blends historic canals, modern design, and vibrant cities like Amsterdam and Rotterdam. Known for cycling culture, tulip fields, and open-minded society, it offers a mix of charm, innovation, and relaxed European living.\nIf you want it shorter or with a specific tone, I can tune it.\n\n'),
(1, 'United States', 'The United States offers vast landscapes, iconic cities, and a mix of cultures and ideas. From national parks to bustling metros, it’s a place of innovation, diversity, and big experiences across 50 unique states.'),
(2, 'Vietnam', 'Vietnam offers vibrant cities, peaceful countryside, and a rich blend of history and culture. From Hanoi’s old streets to Ha Long Bay and the Mekong Delta, it’s a destination full of flavor, scenery, and warm hospitality.\nReady for the next country whenever you are.\n'),
(3, 'Greece', 'Greece blends ancient history, sun-soaked islands, and vibrant Mediterranean culture. From Athens’ iconic ruins to crystal-blue coastlines and charming villages, it offers timeless beauty, warm hospitality, and unforgettable landscapes.'),
(4, 'Japan', 'Japan blends ancient tradition with cutting‑edge modern life. From serene temples and scenic mountains to neon-lit cities and world‑famous cuisine, it offers a rich cultural experience shaped by history, innovation, and natural beauty.'),
(5, 'Switzerland', 'Switzerland is known for its stunning Alps, pristine lakes, and charming villages. With world‑class skiing, efficient cities, and a blend of cultures, it offers peaceful landscapes, precision craftsmanship, and a uniquely scenic European experience.'),
(6, 'Australia', 'Australia offers vast landscapes, vibrant cities, and unique wildlife. From the Great Barrier Reef to the Outback and coastal beaches, it blends adventure, natural beauty, and a relaxed lifestyle shaped by diverse cultures.'),
(7, 'France', 'France blends iconic art, cuisine, and history with diverse landscapes—from Paris’s landmarks to sunny Riviera beaches and charming villages. It offers rich culture, world‑famous food, and a timeless sense of style.'),
(8, 'Germany', 'Germany blends historic cities, modern innovation, and diverse landscapes. From Berlin’s culture to Bavaria’s mountains and the Rhine’s castles, it offers rich history, efficient transport, and a vibrant mix of traditions and creativity.'),
(9, 'Italy', 'Italy blends ancient history, artistic treasures, and diverse landscapes. From Rome’s ruins to Tuscany’s hills and the Amalfi Coast, it offers world‑famous cuisine, vibrant culture, and a timeless sense of beauty.'),
(10, 'Afghanistan', 'Afghanistan offers dramatic mountains, ancient history, and diverse cultural traditions. Its landscapes range from rugged peaks to desert plains, reflecting a long heritage shaped by trade routes, craftsmanship, and resilient communities.'),
(11, 'Albania', 'Albania offers rugged mountains, clear beaches, and a mix of Ottoman, Mediterranean, and Balkan heritage. Its lively cities, ancient sites, and unspoiled nature make it a rising destination full of charm and adventure.'),
(12, 'Algeria', 'Algeria offers vast desert landscapes, Mediterranean coastlines, and a blend of Arab, Berber, and French influences. From the Sahara’s dunes to historic cities, it’s a country of striking contrasts and deep cultural heritage.'),
(13, 'Andorra', 'Andorra is a small mountain nation known for its ski resorts, scenic valleys, and duty‑free shopping. Nestled in the Pyrenees between France and Spain, it offers peaceful nature, charming villages, and year‑round outdoor activities.'),
(14, 'Angola', 'Angola features sweeping savannas, Atlantic coastlines, and a vibrant mix of African and Portuguese influences. Its wildlife, music, and rapidly growing cities create a dynamic blend of natural beauty and cultural energy.'),
(15, 'Antigua and Barbuda', 'Antigua and Barbuda offer turquoise waters, coral reefs, and a famously relaxed island vibe. With 365 beaches, colorful towns, and rich Caribbean culture, the twin islands are perfect for sunshine, sailing, and easygoing coastal escapes.'),
(16, 'Argentina', 'Argentina offers vibrant cities, dramatic mountains, and wide-open plains. From Buenos Aires’ culture and tango to Patagonia’s glaciers and the Iguazú Falls, it blends natural wonders, rich traditions, and a lively spirit.'),
(17, 'Armenia', 'Armenia offers ancient monasteries, dramatic mountains, and a deep cultural heritage. From Yerevan’s lively streets to Lake Sevan and historic highlands, it blends tradition, hospitality, and striking natural beauty.'),
(18, 'Austria', 'Austria offers alpine scenery, elegant cities, and a rich musical heritage. From Vienna’s imperial charm to Salzburg’s mountain views and the lakes of the Salzkammergut, it blends culture, nature, and timeless European beauty.'),
(19, 'Azerbaijan', 'Azerbaijan blends Caspian Sea coastlines, mountain landscapes, and a rich mix of Turkic, Persian, and Caucasian influences. From Baku’s modern skyline to ancient fire temples and rugged highlands, it offers striking contrasts and deep cultural heritage.\nReady for the next country whenever you are.\n'),
(20, 'Bahamas, The', 'The Bahamas is a coral‑based archipelago of about 700 islands known for turquoise waters, vibrant marine life, and a relaxed Caribbean atmosphere. With Nassau as its lively hub, it blends natural beauty, culture, and warm coastal charm.'),
(21, 'Bahrain', 'Bahrain is a small island nation in the Persian Gulf known for its modern skyline, rich pearl‑diving history, and a blend of Arab culture and cosmopolitan life. With Manama as its vibrant hub, it mixes tradition, innovation, and coastal charm.'),
(22, 'Bangladesh', 'Bangladesh is a river‑woven, densely populated South Asian nation known for its vibrant culture, fertile delta, and resilient spirit. From bustling Dhaka to lush countryside and rich traditions, it blends natural beauty, history, and creativity.'),
(23, 'Barbados', 'Barbados is a Caribbean island known for its coral beaches, warm culture, and vibrant coastal life. With Bridgetown as its lively center, it blends British‑influenced heritage, tropical scenery, and a famously welcoming island atmosphere.'),
(24, 'Belarus', 'Belarus is a landlocked Eastern European country known for its forests, lakes, and Soviet‑era architecture. Centered around Minsk, it blends Slavic traditions, quiet countryside, and a strong cultural identity shaped by history and resilience.'),
(25, 'Belgium', 'Belgium blends medieval cities, modern culture, and a rich mix of Dutch‑, French‑, and German‑speaking traditions. Known for chocolate, waffles, and art, it offers charming towns, vibrant Brussels, and a uniquely diverse European identity.'),
(26, 'Belize', 'Belize is a Central American country known for its English‑speaking culture, Caribbean vibe, and incredible biodiversity. Famous for the Belize Barrier Reef, the Great Blue Hole, and Maya ruins, it blends tropical nature, rich history, and cultural diversity.\n\n'),
(27, 'Benin', 'Benin is a West African nation known for its vibrant cultures, historic kingdoms, and rich traditions. From Porto‑Novo and bustling Cotonou to the wildlife of Pendjari and the legacy of Dahomey, it blends history, diversity, and coastal charm.'),
(28, 'Bhutan', 'Bhutan is a Himalayan kingdom known for its dramatic mountains, Buddhist heritage, and focus on Gross National Happiness. With monasteries like Tiger’s Nest and a deeply traditional culture, it blends serenity, spirituality, and stunning natural landscapes.'),
(29, 'Bolivia', 'Bolivia is a landlocked South American country known for its Andean peaks, salt flats, and rich Indigenous cultures. From La Paz’s dramatic altitude to the Uyuni Salt Flats and Amazon regions, it blends striking landscapes with deep historical heritage.'),
(30, 'Bosnia and Herzegovina', 'Bosnia and Herzegovina blends Ottoman, Austro‑Hungarian, and Balkan influences, with Sarajevo as its cultural heart. Known for its mountains, rivers, and historic towns like Mostar, it offers striking landscapes, deep history, and rich multicultural heritage.\n'),
(31, 'Botswana', 'Botswana is a stable, landlocked Southern African nation known for its vast wilderness, thriving wildlife, and strong democracy. From the Okavango Delta to the Kalahari, it blends natural beauty, cultural depth, and a reputation for safety and conservation.'),
(32, 'Brazil', 'Brazil is South America’s largest country, known for the Amazon rainforest, vibrant cities like Rio and São Paulo, and a rich blend of Indigenous, African, and Portuguese cultures. Its landscapes, music, and energy make it one of the world’s most dynamic nations.'),
(33, 'Brunei', 'Brunei is a small, wealthy sultanate on Borneo’s northern coast, known for its oil‑driven economy, lush rainforests, and deeply rooted Malay‑Islamic culture. Centered around Bandar Seri Begawan, it blends tradition, stability, and natural beauty.'),
(34, 'Canada', 'Canada is the world’s second‑largest country, stretching from the Atlantic to the Pacific and up to the Arctic. Known for its vast wilderness, multicultural cities like Toronto, and its bilingual identity, it’s a stable, diverse, and highly developed nation.'),
(35, 'China', 'China is a vast East Asian nation known for its long history, cultural influence, and rapid modernization. With Beijing as its capital and Shanghai as its largest city, it spans diverse landscapes, ethnic groups, and traditions, making it one of the world’s most influential countries.'),
(36, 'Denmark', 'Denmark is a Scandinavian country known for its high quality of life, cycling culture, and strong social welfare system. With Copenhagen as its capital, it blends modern design, Viking history, and a reputation as one of the world’s happiest nations.'),
(37, 'Egypt', 'Egypt is a transcontinental country linking Africa and the Middle East, known for the Nile River, ancient pharaohs, and iconic monuments like the pyramids and the Sphinx. Centered around Cairo, it blends deep history, vibrant culture, and modern urban life.'),
(38, 'Samoa', 'Samoa is a Polynesian island nation in the South Pacific, known for its lush landscapes, strong communal culture (fa’a Samoa), and two main islands, Upolu and Savai‘i. Centered around Apia, it blends tradition, natural beauty, and a warm, welcoming identity.\n'),
(39, 'Morocco', 'Morocco is a North African kingdom known for its blend of Arab, Amazigh, and Mediterranean cultures. With cities like Marrakech, Casablanca, and Rabat, plus the Atlas Mountains and Sahara dunes, it offers rich history, diverse landscapes, and vibrant traditions.'),
(40, 'Cabo Verde', 'Cabo Verde (Cape Verde) is a small island nation off the northwest coast of Africa in the Atlantic Ocean. It is known for its volcanic landscapes, dry climate, and rich Creole culture shaped by African and Portuguese influences. The country has a stable democracy, a service-based economy, and is especially recognized for music styles like morna, as well as tourism centered on its beaches and scenic islands.'),
(41, 'Cambodia', 'Cambodia is a Southeast Asian country known for its rich history, most famously the Angkor temple complex, a UNESCO World Heritage site. It has a predominantly agrarian economy, with agriculture, textiles, and tourism playing key roles. Cambodian culture is deeply influenced by Buddhism, reflected in its traditions, architecture, and daily life, and the country continues to develop following decades of conflict in the late 20th century.'),
(42, 'Colombia', 'Colombia is a diverse country in northern South America, bordered by both the Caribbean Sea and the Pacific Ocean. It is known for its varied landscapes, including the Andes Mountains, Amazon rainforest, and tropical coastlines. Colombia has a rich cultural heritage blending Indigenous, African, and Spanish influences, a growing economy driven by energy, agriculture, and services, and is internationally recognized for its coffee, music, and biodiversity.'),
(43, 'Chad', 'Chad is a landlocked country in north-central Africa characterized by vast deserts in the north, the Sahel in the center, and savannas in the south. Its economy relies heavily on agriculture, livestock, and oil production. Chad is ethnically and culturally diverse, with many languages and traditions, and faces ongoing development challenges related to poverty, infrastructure, and political instability.'),
(44, 'Cyprus', 'Cyprus is an island nation in the eastern Mediterranean Sea, located at the crossroads of Europe, Asia, and the Middle East. It is known for its ancient history, strategic location, and blend of Greek and Turkish cultural influences. Cyprus has a service-oriented economy centered on tourism, finance, and shipping, and remains politically divided between the Republic of Cyprus and the Turkish-controlled northern part of the island.'),
(45, 'Costa Rica', 'Costa Rica is a Central American country known for its stable democracy, strong environmental policies, and remarkable biodiversity. It features lush rainforests, volcanoes, and coastlines on both the Pacific Ocean and the Caribbean Sea. Costa Rica’s economy is driven by ecotourism, agriculture (especially coffee and bananas), and technology, and its culture emphasizes peace, education, and sustainability.'),
(46, 'Fiji', 'Fiji is an island nation in the South Pacific, composed of over 300 islands, known for its tropical climate, coral reefs, and vibrant marine life. Its population is culturally diverse, with Indigenous Fijian and Indo-Fijian communities shaping traditions, language, and festivals. Fiji’s economy relies on tourism, sugar exports, and remittances, and it is recognized for its strong community-oriented culture and political resilience.'),
(47, 'New Zealand', 'Famous for its dramatic landscapes, from fjords to mountains and beaches, New Zealand is ideal for adventure tourism, hiking, and exploring Maori culture.'),
(48, 'Thailand', 'Known for its vibrant street life, ornate temples, tropical beaches, and flavorful cuisine, Thailand offers destinations like Bangkok, Chiang Mai, Phuket, and Krabi.'),
(50, 'Peru', 'Home to the iconic Machu Picchu and the Andes mountains, Peru offers rich Incan history, Amazon rainforest excursions, and a vibrant culinary scene.');

-- --------------------------------------------------------

--
-- Table structure for table `Personal_Data`
--

CREATE TABLE `Personal_Data` (
  `Person_Id` int NOT NULL,
  `First_Name` varchar(45) NOT NULL,
  `Surname` varchar(45) NOT NULL,
  `Email_Adress` varchar(45) NOT NULL,
  `Home_Adress` varchar(45) NOT NULL,
  `Country_Id` int DEFAULT NULL,
  `User_Id` int NOT NULL,
  `Bank_Account_Number` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Review`
--

CREATE TABLE `Review` (
  `Review_Id` int NOT NULL,
  `Rating` tinyint NOT NULL,
  `User_Id` int NOT NULL,
  `Message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `Review`
--

INSERT INTO `Review` (`Review_Id`, `Rating`, `User_Id`, `Message`) VALUES
(56, 4, 18, 'Loved the flight, just forgot my child at home. Other than that, perfect flight!'),
(57, 1, 18, 'One star review, I didn\'t like that the plane took off, couldn\'t the plane just have driven there?'),
(58, 2, 18, 'My plane fell apart, but it was a nice ride down.'),
(59, 5, 18, '5 star review, it was very nice that there were snakes to accommodate the ride'),
(60, 3, 18, 'My uncle crashed in the plane sadly, he was the best pilot in the world'),
(61, 4, 18, 'it was fine.'),
(62, 4, 18, 'Best flight of my life, kind of sad about my pet snakes that I lost on the plane though.'),
(63, 5, 18, 'Used you for my summer vacation, was very fun! yay!!!!! (P.S if you smell the smell, it\'s not mine)'),
(64, 5, 18, 'Arrived at North Korea in 6 minutes'),
(65, 4, 18, 'Imagine being named *CENSORED*'),
(66, 1, 18, 'I\'m blind, but I think I heard our plane crash?'),
(68, 5, 18, 'When code codes, we don\'t question it, when the plane does a flip, we don\'t question it'),
(69, 5, 18, 'Zero lost bags. Zero emotional baggage. A rare combo. (AI generated by *CENSORED*)'),
(70, 1, 18, 'There was a skeleton in my seat! #GetTheSeatYouPaidFor #StolenSeat'),
(71, 5, 18, 'great plane ride, cheap tickets. but imagine being called *CENSORED*'),
(72, 5, 18, 'I was just walking around when a brick fell on my head. Nothing to do with Volare.'),
(73, 1, 18, 'WHAT THE FLIP MY FLIPPITY FLIP FLOP FLIPPED ME'),
(74, 5, 18, 'I did some weed and imagined i was on this plane, 5 stars!'),
(75, 1, 18, 'It sucked. Or as *Censored* would say, it sucked someone.'),
(76, 1, 18, 'Imagine a monkey and a bird had a child, that\'s who Tarzan was. Oh wrong location.'),
(77, 5, 18, 'I was on the plane, and then people just started dying?'),
(78, 4, 18, 'Famous last words: Imagine crashing, Posted right before a crash.\n'),
(79, 1, 18, '1 star, would not recommend Daan'),
(80, 5, 18, 'Would recommend! Just not Daan'),
(81, 5, 18, 'I slammed my head into a wall and turned into a ghost, but as a ghost i can confirm that Volare is the greatest at flying and dying.'),
(82, 5, 18, 'All reviews are written by real people, and not by the person with userid 18 and name \"Admin\", that\'s just a visual bug'),
(83, 5, 18, 'my SSN is 536-69-7950'),
(84, 3, 18, 'When i arrived at the plane to take off, the plane was already gone, apparently someone claimed they were pilot?');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Account_Data`
--
ALTER TABLE `Account_Data`
  ADD PRIMARY KEY (`UserId`),
  ADD KEY `Person_Id` (`Person_Id`) USING BTREE;

--
-- Indexes for table `Available_Flights`
--
ALTER TABLE `Available_Flights`
  ADD PRIMARY KEY (`Flight_Id`),
  ADD KEY `From_Country_Id` (`From_Country_Id`) USING BTREE,
  ADD KEY `From_Country_Id_2` (`From_Country_Id`) USING BTREE,
  ADD KEY `To_Country_Id` (`To_Country_Id`) USING BTREE;

--
-- Indexes for table `Bank_Information`
--
ALTER TABLE `Bank_Information`
  ADD PRIMARY KEY (`Bank Account Number`);

--
-- Indexes for table `Booked_Flights`
--
ALTER TABLE `Booked_Flights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Country_Id` (`From_Country_Id`,`To_Country_Id`),
  ADD KEY `To_Country_Id` (`To_Country_Id`),
  ADD KEY `User_Id` (`UserId`),
  ADD KEY `Flight_Id` (`Flight_Id`);

--
-- Indexes for table `Country`
--
ALTER TABLE `Country`
  ADD PRIMARY KEY (`Country_Id`),
  ADD KEY `Country_Id` (`Country_Id`) USING BTREE,
  ADD KEY `Country_Id_2` (`Country_Id`) USING BTREE;

--
-- Indexes for table `Personal_Data`
--
ALTER TABLE `Personal_Data`
  ADD PRIMARY KEY (`Person_Id`),
  ADD KEY `User_Id` (`User_Id`),
  ADD KEY `Bank_Account_Number` (`Bank_Account_Number`);

--
-- Indexes for table `Review`
--
ALTER TABLE `Review`
  ADD PRIMARY KEY (`Review_Id`),
  ADD KEY `User_Id` (`User_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Account_Data`
--
ALTER TABLE `Account_Data`
  MODIFY `UserId` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `Available_Flights`
--
ALTER TABLE `Available_Flights`
  MODIFY `Flight_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=410;

--
-- AUTO_INCREMENT for table `Booked_Flights`
--
ALTER TABLE `Booked_Flights`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `Country`
--
ALTER TABLE `Country`
  MODIFY `Country_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `Personal_Data`
--
ALTER TABLE `Personal_Data`
  MODIFY `Person_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Review`
--
ALTER TABLE `Review`
  MODIFY `Review_Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Available_Flights`
--
ALTER TABLE `Available_Flights`
  ADD CONSTRAINT `Available_Flights_ibfk_1` FOREIGN KEY (`From_Country_Id`) REFERENCES `Country` (`Country_Id`),
  ADD CONSTRAINT `Available_Flights_ibfk_2` FOREIGN KEY (`To_Country_Id`) REFERENCES `Country` (`Country_Id`);

--
-- Constraints for table `Booked_Flights`
--
ALTER TABLE `Booked_Flights`
  ADD CONSTRAINT `Booked_Flights_ibfk_1` FOREIGN KEY (`To_Country_Id`) REFERENCES `Country` (`Country_Id`),
  ADD CONSTRAINT `Booked_Flights_ibfk_2` FOREIGN KEY (`From_Country_Id`) REFERENCES `Country` (`Country_Id`),
  ADD CONSTRAINT `Booked_Flights_ibfk_3` FOREIGN KEY (`UserId`) REFERENCES `Account_Data` (`UserId`),
  ADD CONSTRAINT `Booked_Flights_ibfk_4` FOREIGN KEY (`Flight_Id`) REFERENCES `Available_Flights` (`Flight_Id`);

--
-- Constraints for table `Personal_Data`
--
ALTER TABLE `Personal_Data`
  ADD CONSTRAINT `Personal_Data_ibfk_2` FOREIGN KEY (`Bank_Account_Number`) REFERENCES `Bank_Information` (`Bank Account Number`),
  ADD CONSTRAINT `Personal_Data_ibfk_3` FOREIGN KEY (`Person_Id`) REFERENCES `Account_Data` (`UserId`);

--
-- Constraints for table `Review`
--
ALTER TABLE `Review`
  ADD CONSTRAINT `Review_ibfk_1` FOREIGN KEY (`User_Id`) REFERENCES `Account_Data` (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
