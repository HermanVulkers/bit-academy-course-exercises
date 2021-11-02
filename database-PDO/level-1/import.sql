CREATE TABLE films (
ID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
titel varchar(255) NOT NULL,
duur varchar(255) NOT NULL,
datumuitkomst date,
landuitkomst varchar(255),
omschrijving varchar(255) NOT NULL,
idtrailer varchar(255) NOT NULL
);

INSERT INTO films (titel, duur, datumuitkomst, landuitkomst, omschrijving, idtrailer)
VALUES ('No Time To Die', '163m', '2021-09-30', 'VS', '25ste James Bond-film', 'BIhNsAtPbPI&ab_channel=JamesBond007'),
('Eternals', '158m', '2021-11-03', 'VS', 'Marvel Studios Eternals volgt een groep buitenaardse helden', 'x_me3xsvDgk&ab_channel=MarvelEntertainment'),
('Dune', '156m', '2021-09-16', 'VS', 'Dune vertelt het mythische en emotionele heldenverhaal van Paul Atreides', '8g18jFHCLXk&ab_channel=WarnerBros.Pictures'),
('Antlers', '99m', '2021-10-28', 'VS', 'In Antlers ontdekken een lerares uit Oregon en haar broer dat een jonge leerling een gevaarlijk geheim bewaart', 'ng5eyOfL8qM&ab_channel=SearchlightPictures'),
('Liefde Zonder Grenzen', '95m', '2021-10-14', 'NL', 'De liefdeslevens van de zussen Eva en Lieke, broer Maarten en vader Ferry zijn totaal verschillend van elkaar', 'zt1V8oQOXJM&ab_channel=SplendidFilm');
