-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.21-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for moviedb
CREATE DATABASE IF NOT EXISTS `moviedb` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `moviedb`;

-- Dumping structure for table moviedb.actor
CREATE TABLE IF NOT EXISTS `actor` (
  `ActorID` int(11) NOT NULL AUTO_INCREMENT,
  `ActorName` varchar(50) DEFAULT NULL,
  `ActorGender` varchar(10) DEFAULT NULL,
  `ActorAge` int(11) DEFAULT NULL,
  `ActorPicture` varchar(50) DEFAULT NULL,
  `ActorDescription` varchar(500) DEFAULT NULL,
  `RegisterDate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ActorID`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table moviedb.actor: ~11 rows (approximately)
INSERT INTO `actor` (`ActorID`, `ActorName`, `ActorGender`, `ActorAge`, `ActorPicture`, `ActorDescription`, `RegisterDate`) VALUES
	(3, 'Dwayne Johnson', 'Male', 50, 'kuqFzlYMc2IrsOyPznMd1FroeGq.jpg', 'Dwayne Johnson, byname the Rock, (born May 2, 1972, Hayward, California, U.S.), American professional wrestler and actor whose charisma and athleticism made him a success in both fields. Johnson was born into a wrestling family.', '2022-08-13 16:24:08'),
	(5, 'Vin Diesel', 'Male', 55, '9uxTwqB8anAiPomB6Kqm6A73VTV.jpg', 'Mark Sinclair (born July 18, 1967), known professionally as Vin Diesel, is an American actor and producer. One of the world\'s highest-grossing actors, he is best known for playing Dominic Toretto in the Fast & Furious franchise. ', '2022-08-13 16:40:54'),
	(7, 'Angelina Jolie', 'Female', 47, 'k3W1XXddDOH2zibPkNotIh5amHo.jpg', 'Angelina Jolie, original name Angelina Jolie Voight, (born June 4, 1975, Los Angeles, California, U.S.), American actress and director known for her sex appeal and edginess as well as for her humanitarian work. She won an Academy Award for her supporting role as a mental patient in Girl, Interrupted (1999).', '2022-08-13 17:25:40'),
	(8, 'Chris Evans', 'Male', 41, '3bOGNsHlrswhyW79uvIHH1V43JI.jpg', 'Christopher Robert Evans (born June 13, 1981) is an American actor. He began his career with roles in television series, such as in Opposite Sex in 2000.', '2022-08-13 20:37:38'),
	(9, 'Tobey Maguire', 'Male', 47, 'ncF4HivY2W6SQW5dEP3N3I4mfT0.jpg', 'Tobias Vincent Maguire (born June 27, 1975) is an American actor and film producer. He is best known for playing the title character from Sam Raimi\'s Spider-Man trilogy (2002–2007), a role he later reprised in Spider-Man: No Way Home (2021). Santa Monica, California, U.S.', '2022-08-13 20:39:40'),
	(10, 'Robert Downey Jr.', 'Male', 57, '5qHNjhtjMD4YWH3UP0rm4tKwxCL.jpg', '(born April 4, 1965) is an American actor and producer. His career has been characterized by critical and popular success in his youth, followed by a period of substance abuse and legal troubles, before a resurgence of commercial success later in his career.', '2022-08-13 20:40:35'),
	(11, 'Tom Holland', 'Male', 26, 'l6zPRmg8NI7Y65G5GUqwvjxFdsx.jpg', 'Thomas Stanley Holland (born 1 June 1996) is an English actor. His accolades include a British Academy Film Award, three Saturn Awards, a Guinness World Record and an appearance on the Forbes 30 Under 30 Europe list. Some publications have called him one of the most popular actors of his generation.', '2022-08-13 20:42:11'),
	(13, 'Megan Fox', 'Female', 36, 'cQ1gKHIsOkHuh9njSvjMnCUdD0p.jpg', 'Megan Denise Fox[1] (born May 16, 1986) is an American actress and model. Fox made her acting debut in the family film Holiday in the Sun (2001), which was followed by numerous supporting roles in film and television, such as the teen musical comedy Confessions of a Teenage Drama Queen (2004), as well as a starring role in the ABC sitcom Hope & Faith (2004–2006). ', '2022-08-13 20:45:12'),
	(14, 'Chris Hemsworth', 'Male', 39, 'jpurJ9jAcLCYjgHHfYF32m3zJYm.jpg', 'Christopher Hemsworth[1] AM (born 11 August 1983[2]) is an Australian actor. He rose to prominence playing Kim Hyde in the Australian television series Home and Away (2004–2007) before beginning a film career in Hollywood. In the Marvel Cinematic Universe (MCU), Hemsworth started playing Thor with the 2011 film of the same name and most recently reprised the role in Thor: Love and Thunder (2022), which established him among the world\'s highest-paid actors.', '2022-08-13 20:51:15'),
	(15, 'benedict cumberbatch', 'Male', 46, 'benedict cumberbatch.png', 'Benedict Cumberbatch, in full Benedict Timothy Carlton Cumberbatch, (born July 19, 1976, London, England), acclaimed British motion-picture, theatre, and television actor known for his portrayals of intelligent, often upper-crust characters, for his deep resonant voice, and for his distinctive name. He gained widespread popularity playing a modern Sherlock Holmes in the television series Sherlock (2010– ) and subsequently garnered a succession of substantial roles in mainstream features.', '2022-08-13 21:03:27'),
	(16, 'kiano revees', 'Male', 57, 'Keanu_Reeves_(crop_and_levels)_(cropped).jpg', 'Keanu Charles Reeves (/kiˈɑːnuː/ kee-AH-noo; born September 2, 1964) is a Canadian actor. Born in Beirut and raised in Toronto, Reeves began acting in theatre productions and in television films before making his feature film debut in Youngblood (1986).', '2022-08-13 21:08:50');

-- Dumping structure for table moviedb.actor_movie
CREATE TABLE IF NOT EXISTS `actor_movie` (
  `ActorID` int(11) NOT NULL,
  `MovieID` int(11) NOT NULL,
  PRIMARY KEY (`ActorID`,`MovieID`),
  KEY `MovieID` (`MovieID`),
  CONSTRAINT `actor_movie_ibfk_1` FOREIGN KEY (`MovieID`) REFERENCES `movie` (`MovieID`),
  CONSTRAINT `actor_movie_ibfk_2` FOREIGN KEY (`ActorID`) REFERENCES `actor` (`ActorID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table moviedb.actor_movie: ~16 rows (approximately)
INSERT INTO `actor_movie` (`ActorID`, `MovieID`) VALUES
	(3, 10),
	(3, 11),
	(5, 8),
	(7, 18),
	(8, 17),
	(9, 14),
	(10, 17),
	(11, 14),
	(11, 15),
	(11, 17),
	(13, 16),
	(14, 8),
	(14, 17),
	(15, 14),
	(15, 17),
	(16, 11);

-- Dumping structure for table moviedb.movie
CREATE TABLE IF NOT EXISTS `movie` (
  `MovieID` int(11) NOT NULL AUTO_INCREMENT,
  `MovieName` varchar(50) DEFAULT NULL,
  `MoviePicture` varchar(50) DEFAULT NULL,
  `MovieType` varchar(50) DEFAULT NULL,
  `MovieRating` float DEFAULT NULL,
  `Description_Movie` varchar(500) DEFAULT NULL,
  `ReleaseDate` date DEFAULT NULL,
  `RegisterDate` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`MovieID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table moviedb.movie: ~8 rows (approximately)
INSERT INTO `movie` (`MovieID`, `MovieName`, `MoviePicture`, `MovieType`, `MovieRating`, `Description_Movie`, `ReleaseDate`, `RegisterDate`) VALUES
	(8, 'Thor: Love and Thunder', 'pIkRyD18kl4FhoCNQuWxWu5cBLM.jpg', 'Action', 6.77, 'After his retirement is interrupted by Gorr the God Butcher, a galactic killer who seeks the extinction of the gods, Thor enlists the help of King Valkyrie, Korg, and ex-girlfriend Jane Foster, who now inexplicably wields Mjolnir as the Mighty Thor. Together they embark upon a harrowing cosmic adventure to uncover the mystery of the God Butcher’s vengeance and stop him before it’s too late.', '2022-07-06', '2022-08-13 16:12:09'),
	(10, 'Jurassic World Dominion', 'kAVRgw7GgK1CfYEJq8ME6EvRIgU.jpg', 'adventure', 5.7, 'Four years after Isla Nublar was destroyed, dinosaurs now live—and hunt—alongside humans all over the world. This fragile balance will reshape the future and determine, once and for all, whether human beings are to remain the apex predators on a planet they now share with history’s most fearsome creatures.', '2022-06-29', '2022-08-13 16:16:44'),
	(11, 'John Wick 4', 'john-wick-4-2-1658423468533.jpg', 'action', 7.4, 'John Wick (Keanu Reeves) takes on his most lethal adversaries yet in the upcoming fourth installment of the series. With the price on his head ever increasing, Wick takes his fight against the High Table global as he seeks out the most powerful players in the underworld', '2023-03-24', '2022-08-13 16:20:55'),
	(14, 'Spider-Man: No Way Home', '1g0dhYtq4irTY1GPXvft6k4YLjm.jpg', 'action', 8.3, 'Peter Parker is unmasked and no longer able to separate his normal life from the high-stakes of being a super-hero. When he asks for help from Doctor Strange the stakes become even more dangerous, forcing him to discover what it truly means to be Spider-Man.', '2021-12-17', '2022-08-13 20:27:56'),
	(15, 'Uncharted', 'rJHC1RUORuUhtfNb4Npclx0xnOf.jpg', 'action', 6.4, 'A young street-smart, Nathan Drake and his wisecracking partner Victor “Sully” Sullivan embark on a dangerous pursuit of “the greatest treasure never found” while also tracking clues that may lead to Nathan’s long-lost brother.', '2022-02-18', '2022-08-13 20:35:32'),
	(16, 'Transformers: Dark of the Moon', '28YlCLrFhONteYSs9hKjD1Km0Cj.jpg', 'action', 6.2, 'The Autobots continue to work for NEST, now no longer in secret. But after discovering a strange artifact during a mission in Chernobyl, it becomes apparent to Optimus Prime that the United States government has been less than forthright with them.', '2011-06-29', '2022-08-13 20:49:43'),
	(17, 'avengers endgame', 'or06FN3Dka5tukK1e9sl16pB3iy.jpg', 'action', 8.4, 'After the devastating events of Avengers: Infinity War, the universe is in ruins due to the efforts of the Mad Titan, Thanos. With the help of remaining allies, the Avengers must assemble once more in order to undo Thanos\' actions and restore order to the universe once and for all, no matter what consequences may be in store.', '2019-04-26', '2022-08-13 20:54:08'),
	(18, 'Eternals', 'lFByFSLV5WDJEv3KabbdAF959F2.jpg', 'action', 6.3, 'The Eternals are a team of ancient aliens who have been living on Earth in secret for thousands of years. When an unexpected tragedy forces them out of the shadows, they are forced to reunite against mankind’s most ancient enemy, the Deviants.', '2021-11-03', '2022-08-13 21:14:53');

-- Dumping structure for table moviedb.user
CREATE TABLE IF NOT EXISTS `user` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `Fname` varchar(50) DEFAULT NULL,
  `Lname` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `PhoneNumber` varchar(11) DEFAULT NULL,
  `UserPassword` varchar(20) DEFAULT NULL,
  `UserRole` int(11) DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table moviedb.user: ~3 rows (approximately)
INSERT INTO `user` (`UserID`, `Fname`, `Lname`, `Email`, `PhoneNumber`, `UserPassword`, `UserRole`) VALUES
	(1, 'Assem', 'Mohamed', 'aseemmohamed045@gmail.com', '01270790801', 'admin123', 0),
	(2, 'Ahmed', 'Salah', 'ahmedsalah@gmail.com', '01234567899', 'admin123', 0),
	(3, 'user', 'user', 'user@gmail.com', '01234567899', 'user1234', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
