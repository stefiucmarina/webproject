DROP TABLE IF EXISTS USERS;
DROP TABLE IF EXISTS RACES;
DROP TABLE IF EXISTS USER_RACE;



CREATE TABLE `USERS` (
  `email` varchar(100) NOT NULL PRIMARY KEY,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARACTER SET = utf8;


CREATE TABLE `RACES` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `race` varchar(100) NOT NULL,
  `name1`  varchar(100) NOT NULL,
  `name2` varchar(100) NOT NULL,
  `odd_1` decimal(3,2) NOT NULL,
  `odd_2` decimal(3,2) NOT NULL,
  `date` date NOT NULL,
  `winner` varchar(100)
) ENGINE=InnoDB DEFAULT CHARACTER SET = utf8;


CREATE TABLE `USER_RACE`(
    `id` int(11) NOT NULL,
    `email` varchar(100) NOT NULL,
    `race` varchar(100) NOT NULL,
    `date1` date NOT NULL,
    `winner` varchar(100) NOT NULL,
    `outcome` float,
    `amount` int(11) NOT NULL,
    `cat`  varchar(100) NOT NULL,
    `odd` float,
    PRIMARY KEY(id,email)
) ENGINE=InnoDB DEFAULT CHARACTER SET = utf8;


INSERT INTO USERS (email, password, first_name, last_name, adress,balance) VALUES('maria.begu@gmail.com','parola1','Maria', 'Begu', 'Romania, Iasi, Iasi',100);
INSERT INTO USERS (email, password, first_name, last_name, adress) VALUES('marina.stefiuc@gmail.com','parola2','Marina', 'Stefiuc', 'Romania, Iasi, Valea Lupului');
INSERT INTO USERS (email, password, first_name, last_name, adress) VALUES('camelia.darie@gmail.com','parola3','Camelia', 'Darie', 'Romania, Galati, Galati');
INSERT INTO USERS (email, password, first_name, last_name, adress) VALUES('alexandru.blaga@gmail.com','parola4','Alexandru', 'Blaga', 'Romania, Neamt, Roman');
INSERT INTO USERS (email, password, first_name, last_name, adress) VALUES('andreea.florascu@gmail.com','parola5','Andreea', 'Florascu', 'Romania, Vaslui, Vaslui');

INSERT INTO USERS (email, password, first_name, last_name, adress) VALUES('admin.admin@gmail.com','parola_admin','Admin', 'Admin', 'Adminia');


INSERT INTO RACES (race,name1,name2, odd_1, odd_2, date, winner) VALUES('Rick vs. Morty','Rick','Morty', 1.5, 2.1 ,'2022-06-12', 'Rick');
INSERT INTO RACES (race,name1,name2, odd_1, odd_2, date, winner) VALUES('Pablo vs. Escobar', 'Pablo','Escobar',2.3,3.4,'2022-06-13', 'Escobar');
INSERT INTO RACES (race,name1,name2, odd_1, odd_2, date, winner) VALUES('Billy vs. Mirel','Billy','Mirel',1.1,2.7,'2022-06-13', 'Billy');
INSERT INTO RACES (race,name1,name2, odd_1, odd_2, date, winner) VALUES('Blue vs. Maya','Blue','Maya',2.3,4.3,'2022-06-13',"-");
INSERT INTO RACES (race, name1,name2,odd_1, odd_2, date, winner) VALUES('Chloey vs. Alma','Chloey','Alma',3.4,2.1,'2022-06-14',"-");



INSERT INTO USER_RACE VALUES(1,'maria.begu@gmail.com','Rick vs. Morty','2022-06-12','Rick',75,50,'Rick',1.5);