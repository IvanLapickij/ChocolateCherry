-- Drop the table if it exists
DROP TABLE IF EXISTS `cbtable`;

-- Drop the database if it exists
DROP DATABASE IF EXISTS `cbdatabase`;

-- Create the 'chocolatebars' database if it doesn't exist
CREATE DATABASE IF NOT EXISTS cbdatabase;

-- Switch to the 'chocolatebars' database
USE cbdatabase;


CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uLogin` varchar(50) DEFAULT NULL,
  `uPass` varchar(255) DEFAULT NULL, -- Assuming you're storing hashed passwords
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Inserting users with plain text passwords
INSERT INTO `users` (`uLogin`, `uPass`) VALUES 
('admin', 'pass'),
('user1', 'pass'),
('user2', 'pass');
-- Create the 'chocolatebar' table with the 'description' field
CREATE TABLE `cbtable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `price` decimal(10, 2) DEFAULT NULL,
  `chocolate_type` varchar(45) DEFAULT NULL,
  `taste` varchar(45) DEFAULT NULL,
  `sugar_percent` decimal(5, 2) DEFAULT NULL,
  `description` text, -- New column for description
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

-- Lock the 'cbtable' table for writing
LOCK TABLES `cbtable` WRITE;
/*!40000 ALTER TABLE `cbtable` DISABLE KEYS */;

-- Insert 10 chocolate bars into the 'cbtable' table with cool names and descriptions
INSERT INTO `cbtable` (`name`, `price`, `chocolate_type`, `taste`, `sugar_percent`, `description`) VALUES
('Galactic Delight', 2.99, 'Milk', 'Strawberry', 30.5, 'Description for Galactic Delight'),
('Midnight Bliss', 3.49, 'Dark', 'Hazelnut', 25.0, 'Description for Midnight Bliss'),
('Snowy Serenade', 2.79, 'White', 'Caramel', 40.0, 'Description for Snowy Serenade'),
('Raspberry Dream', 2.99, 'Milk', 'Raspberry', 32.5, 'Description for Raspberry Dream'),
('Minty Eclipse', 3.99, 'Dark', 'Mint', 20.0, 'Description for Minty Eclipse'),
('Orange Oasis', 2.49, 'Milk', 'Orange', 28.0, 'Description for Orange Oasis'),
('Almond Adventure', 3.29, 'Dark', 'Almond', 22.5, 'Description for Almond Adventure'),
('Coconut Cascade', 2.69, 'White', 'Coconut', 38.0, 'Description for Coconut Cascade'),
('Peanut Butter Paradise', 3.79, 'Milk', 'Peanut Butter', 27.5, 'Description for Peanut Butter Paradise'),
('Cherry Bliss', 3.49, 'Dark', 'Cherry', 23.0, 'Description for Cherry Bliss');

-- Unlock the 'cbtable' table
/*!40000 ALTER TABLE `cbtable` ENABLE KEYS */;
UNLOCK TABLES;

-- Restore session settings
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;


select * from cbtable;
select * from users;