CREATE DATABASE Sterrenstelsel;

CREATE TABLE `planeten` (
  naam varchar(255)
);

INSERT INTO planeten (naam)
VALUES ('Zon'), 
('Mercurius'), 
('Venus'), 
('Aarde'), 
('Mars');

TRUNCATE TABLE planeten;

ALTER TABLE planeten
ADD diameter int(11),
ADD afstand int(11),
ADD massa int(11);

INSERT INTO planeten (naam, diameter, afstand, massa)
VALUES ('Zon', 1392000, 0, 332946),
('Mercurius', 4880, 57910000, 0),
('Venus', 12104, 108208930, 1),
('Aarde', 12756, 149597870, 1),
('Mars', 6794, 227936640, 0);

ALTER TABLE planeten
MODIFY COLUMN naam varchar(255) NOT NULL,
MODIFY COLUMN diameter int NOT NULL,
MODIFY COLUMN afstand int NOT NULL,
MODIFY COLUMN massa int NOT NULL;

ALTER TABLE planeten
ADD bezoekdatum date;

INSERT INTO planeten (naam, diameter, afstand, massa, bezoekdatum)
VALUES ('Maan', '3476', '150000000', '0', '1991-12-12');

UPDATE planeten
SET bezoekdatum = '1969-07-20'
WHERE naam = 'Maan';

UPDATE planeten
SET bezoekdatum = '1900-01-01'
WHERE naam = 'Aarde';

DELETE FROM planeten
WHERE ID = 8;

ALTER TABLE planeten ADD ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY;

INSERT INTO planeten (naam, diameter, afstand, massa)
VALUES ('Mars', 23532, 427936640, 3);

UPDATE planeten 
SET naam = 'Teenalp'
WHERE ID = 8;
