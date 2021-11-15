CREATE TABLE media ( id int PRIMARY KEY AUTO_INCREMENT, mediatype enum('serie','film'), title varchar(255), rating varchar(255), description varchar(255), awards int, duration int, releasedate date, seasons int, country varchar(255), lang enum('EN', 'NL'), trailerid varchar(255) );

INSERT INTO `media`(`mediatype`, `title`, `rating`, `description`, `awards`, `duration`, `releasedate`, `seasons`, `country`, `lang`, `trailerid`) VALUES ('film','James Bond','3','Stoere meneer met grote mannenspeelgoed','5','123','2021-12-12','0','VS','NL','aaaaxxxxxx')

INSERT INTO `media`(`mediatype`, `title`, `rating`, `description`, `awards`, `duration`, `releasedate`, `seasons`, `country`, `lang`, `trailerid`) VALUES ('serie','True Detective','5','Serie over detectives in de Verenigde Staten','5', NULL,'2016-08-08','3','VS','EN','bbbbbxxxxxx')

CREATE TABLE gebruikers ( id int PRIMARY KEY AUTO_INCREMENT, username varchar(30), password varchar(30) );

INSERT INTO `gebruikers` (`username`, `password`) VALUES ('JohnDoe','12345');

