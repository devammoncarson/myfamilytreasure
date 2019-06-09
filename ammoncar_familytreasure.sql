SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `users` (
  `userID` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rights` enum('1','2','','') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;


INSERT INTO `users` (`userID`, `firstName`, `lastName`, `email`, `password`, `rights`) VALUES
(1, 'Ammon', 'Carson', 'pianoace1315@gmail.com', 'password', '1'),
(2, 'Adam', 'Carson', 'adamm.carson@gmail.com', 'password', '2'),
(3, 'Aymee', 'Knight', 'pinkmonkey4me@gmail.com', 'password', '2'),
(4, 'Amber', 'Crumpley', 'crumpleya@gmail.com', 'password', '2'),
(5, 'April', 'Carson', 'april.mymail@gmail.com', 'password', '2'),
(6, 'Aaron', 'Carson', 'aaronc.carson@gmail.com', 'password', '2'),
(7, 'Michael', 'Carson', 'michaelccarson@gmail.com', 'password', '2'),
(8, 'MarLynn', 'Carson', 'mcmcarson@gmail.com', 'password', '2'),
(9, 'Admin', 'User', 'email@byui.edu', 'password', '1'),
(10, 'Taylor', 'Carson', 'taylortot14@gmail.com', 'password', '2');

CREATE TABLE IF NOT EXISTS `comments` (
  `commentID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `comment` varchar(2000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;


INSERT INTO `comments` (`commentID`, `userID`, `firstName`, `comment`) VALUES
(36, 1, 'Ammon', 'Hey Family! Welcome to my new forum site! Try it ouy and let me know what you think!'),
(37, 3, 'Aymee', 'You are so awesome! We can use this instead of slack now!'),
(38, 2, 'Adam', 'Good job! Looks good Ammon.'),
(39, 8, 'MarLynn', 'All my family in one place, I love this!'),
(40, 7, 'Michael', 'Wow, this is pretty neat! It is even user friendly for an old guy like me. Great job Ammon!'),
(41, 1, 'Ammon', 'Thank you so much for all of your love and support! I am turning this in tonight so I will let you know how I do as far as grading goes! Love you all!'),
(42, 6, 'Aaron', 'Good Luck. Make us proud hermano.'),
(43, 4, 'Amber', 'Yes Yes! Good luck Ammon! Praying for you! Love you!'),
(44, 5, 'April', 'This is awesome ammon! Great job! You are amazing!'),
(45, 1, 'Ammon', 'Thank you so much! I will keep you all updated! Also, I am excited to get image uploads, video uploads and other features  working :) Stay tuned!'),
(46, 2, 'Adam', 'Adding images and videos would be sweet.'),
(47, 10, 'Taylor', 'I have the most handsome, talented and incredibly sexy husband ever. ;)');


ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentID`), ADD KEY `userID` (`userID`), ADD KEY `userID_2` (`userID`);


ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);


ALTER TABLE `comments`
  MODIFY `commentID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;

ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;

ALTER TABLE `comments`
ADD CONSTRAINT `comment_user relationship` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

