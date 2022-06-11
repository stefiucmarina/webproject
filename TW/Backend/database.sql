DROP TABLE IF EXISTS USERS;
DROP TABLE IF EXISTS RACES;
DROP TABLE IF EXISTS USER_RACE;



CREATE TABLE `USERS` (
  `email` varchar(100) NOT NULL PRIMARY KEY,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `image` longblob,
  `balance` int(11)
) ENGINE=InnoDB DEFAULT CHARACTER SET = utf8;


CREATE TABLE `RACES` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `race` varchar(100) NOT NULL,
  `odd_1` decimal(3,2) NOT NULL,
  `odd_2` decimal(3,2) NOT NULL,
  `date` date NOT NULL,
  `winner` varchar(100)
) ENGINE=InnoDB DEFAULT CHARACTER SET = utf8;


CREATE TABLE `USER_RACE`(
    `id` int(11) NOT NULL,
    `email` varchar(100) NOT NULL,
    `race` varchar(100) NOT NULL,
    `date` date NOT NULL,
    `winner` varchar(100) NOT NULL,
    `outcome` int(11),
    PRIMARY KEY(id,email)
) ENGINE=InnoDB DEFAULT CHARACTER SET = utf8;


INSERT INTO USERS (email, password, first_name, last_name, adress) VALUES('maria.begu@gmail.com','parola1','Maria', 'Begu', 'Romania, Iasi, Iasi');
INSERT INTO USERS (email, password, first_name, last_name, adress) VALUES('marina.stefiuc@gmail.com','parola2','Marina', 'Stefiuc', 'Romania, Iasi, Valea Lupului');
INSERT INTO USERS (email, password, first_name, last_name, adress) VALUES('camelia.darie@gmail.com','parola3','Camelia', 'Darie', 'Romania, Galati, Galati');
INSERT INTO USERS (email, password, first_name, last_name, adress) VALUES('alexandru.blaga@gmail.com','parola4','Alexandru', 'Blaga', 'Romania, Neamt, Roman');
INSERT INTO USERS (email, password, first_name, last_name, adress) VALUES('andreea.florascu@gmail.com','parola5','Andreea', 'Florascu', 'Romania, Vaslui, Vaslui');



INSERT INTO RACES (race, odd_1, odd_2, date, winner) VALUES('Rick vs. Morty', 1.5, 2.1 ,'2022-06-10', 'Rick');
INSERT INTO RACES (race, odd_1, odd_2, date, winner) VALUES('Pablo vs. Escobar',2.3,3.4,'2022-06-11', 'Escobar');
INSERT INTO RACES (race, odd_1, odd_2, date, winner) VALUES('Billy vs. Mirel',1.1,2.7,'2022-06-12', 'Billy');
INSERT INTO RACES (race, odd_1, odd_2, date, winner) VALUES('Blue vs. Maya',2.3,4.3,'2022-06-13', 'Blue');
INSERT INTO RACES (race, odd_1, odd_2, date, winner) VALUES('Chloey vs. Alma',3.4,2.1,'2022-06-14', 'Alma');



INSERT INTO USER_RACE VALUES(1,'maria.begu@gmail.com','Rick vs. Morty','2022-06-10','Rick',50);
-- INSERT INTO USER_RACE VALUES();
-- INSERT INTO USER_RACE VALUES();
-- INSERT INTO USER_RACE VALUES();
-- INSERT INTO USER_RACE VALUES();