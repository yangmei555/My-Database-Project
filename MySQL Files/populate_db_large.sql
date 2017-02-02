insert into Characters
values
('Monkey D. Luffy','male',500000000,19,174),
('Roronoa Zoro','male',320000000,21,181),
('Nami','female',66000000,20,170),
('Usopp','male',200000000,19,176),
('Vinsmoke Sanji','male',177000000,21,180),
('Tony Tony Chopper','male',100,17,150),
('Nico Robin','female',130000000,30,180),
('Franky','male',94000000,36,240),
('Brook','male',83000000,90,266),
('Gol D. Roger','male',1500000000,53,178),
('Silvers Rayleigh','male',600000000,90,191),
('Edward Newgate','male',1200000000,72,650),
('Shanks','male',700000000,39,184),
('Charlotte Linlin','female',700000000,58,280),
('Kaido','male',1100000000,62,450),
('Marshall D. Teach','male',800000000,40,344),
('Bartholomew Kuma','male',296000000,47,689),
('Boa Hancock','female',80000000,31,191),
('Buggy','male',15000000,38,176),
('Dracule Mihawk','male',90000000,43,198),
('Sir Crocodile','male',81000000,46,253),
('Jinbe','male',400000000,46,301),
('Gekko Moria','male',320000000,50,692),
('Trafalgar Law','male',500000000,26,191),
('Donquixote Doflamingo','male',340000000,41,305),
('Sakazuki','male', null, 55, 190),
('Borsalino', 'male',null, 59, 195),
('Kuzan', 'male',null, 49, 188),
('Sengoku','male',null, 79, 179),
('Monkey D. Garp','male',null, 82, 178);

-- load data
-- local infile "data/Characters.txt"
-- replace into table Characters
-- fields terminated by '|'
-- LINES TERMINATED BY '\r\n'
-- (charname, gender, rewardamount, age, height);



insert into Organizations
values
('Straw Hat Pirates','Monkey D. Luffy',9),
('Red Hair Pirates','Shanks',9),
('Roger Pirates','Gol D. Roger',5),
('White Beard Pirates','Edward Newgate',18),
('Black Beard Pirates','Marshall D. Teach',11),
('Donquixote Pirates','Donquixote Doflamingo',18), 
('Buggy Pirates','Buggy',12),
('Nine Snake Pirates','Boa Hancock',9),
('Wild Beast Pirates','Kaido',6),
('Big Mom Pirates','Charlotte Linlin',20),
('The Baroque Workshop','Sir Crocodile',22),
('Thriller Barque','Gekko Moria',24),
('Heart Pirates','Trafalgar Law',6),
('Fishman Pirates','Jinbe',10);



insert into Forces
values
('Naval Headquarters','Sengoku'),
('Revolutionary Army','Monkey D. Dragon'),
('Impel down','Magellan'),
('Enies Lobby','Spandam'),
('Oka Shichibukai','Donquixote Doflamingo'),
('The Four Emperors','Edward Newgate'),
('Navy headquarters senior general','Sakazuki'),
('Gorosei','none'),
('Supernova 11', 'none'),
('Worst generation','none'),
('The Pirates','none');

insert into DevilFruit
values
('Gum-Gum Fruit','superman series',100,'Makes the body becomes somthing like robber'),
('Chop-Chop Fruit','superman series',70,'Splits the body into several parts freely'),
('Slip-Slip Fruit','superman series',75,'Makes the skin very smooth and makes the user pretty'),
('Human-Human Fruit','animal series',133,'Makes an animal become a human or makes a human become an animal'),
('Smoke Fruit','natrual series',147,'Controls the smoke and changes the body into smoke'),
('Sand Fruit','natrual series',378,'Controls the sand and changes the body into sand'),
('Ice Fruit','natrual series',489,'Controls the ice and changes the body into ice'),
('Thunder fruit','natrual series',452,'Controls the thunder and changes the body into thunder'),
('Snake fruit','animal series',89,'Makes the user become a kind of snake'),
('Soul fruit','superman series',376,'Deals freely with other\'s souls'),
('Revive-Revive Fruit','superman series',32,'Makes the dead user become alive once');



insert into BigEvent
values
('East sea episode',60,'Smoker'),
('Alabasta episode',70,'Sir Crocodile'),
('Sky Piea episode',52,'Enel'),
('Enies Lobby episode',99,'CP9'),
('Thriller Barque episode',47,'Gekko Moria'),
('Women Island episode',14,'Boa Hancock'),
('Impel Down episode',35,'Magellan'),
('Top war',48,'Naval Headquarters'),
('Fishman Island episode',58,'Hordy Jones'),
('Punk Hazard episode',50,'Donquixote Doflamingo'),
('Dressrosa episode',118,'Donquixote Doflamingo');



insert into Location
values
('Enies Lobby',17900),
('East Sea',230000),
('South Sea',250000),
('Impel Down',1800),
('Fishman Island',5300),
('Shampoo Islands',4700),
('Women Island',3300),
('Dressrosa',3500),
('Punk Hazard',12800),
('Alabasta',800000),
('West Sea',283000),
('North Sea',176000),
('Marineford',28800);


insert into Friends
values
('Monkey D. Luffy','Shanks'),
('Roronoa Zoro','Monkey D. Luffy'),
('Vinsmoke Sanji','Monkey D. Luffy'),
('Monkey D. Luffy','Boa Hancock'),
('Shanks','Buggy'),
('Gol D. Roger','Edward Newgate'),
('Jinbe','Edward Newgate'),
('Trafalgar Law','Monkey D. Luffy'),
('Nami','Nico Robin'),
('Monkey D. Luffy','Jinbe'),
('Vinsmoke Sanji','Roronoa Zoro'),
('Roronoa Zoro','Jinbe'),
('Roronoa Zoro','Trafalgar Law'),
('Vinsmoke Sanji','Nico Robin'),
('Vinsmoke Sanji','Nami'),
('Nico Robin','Monkey D. Luffy');

-- load data
-- local infile "data/Friends.txt"
-- replace into table Friends
-- fields terminated by '|'
-- LINES TERMINATED BY '\r\n'
-- (charname1, charname2);

insert into Enemies
values
('Monkey D. Luffy','Charlotte Linlin'),
('Gol D. Roger','Edward Newgate'),
('Sir Crocodile','Donquixote Doflamingo'),
('Trafalgar Law','Donquixote Doflamingo'),
('Monkey D. Luffy','Marshall D. Teach'),
('Gekko Moria','Monkey D. Luffy'),
('Kaido','Gekko Moria'),
('Gekko Moria','Dracule Mihawk'),
('Gekko Moria','Donquixote Doflamingo'),
('Charlotte Linlin','Shanks'),
('Donquixote Doflamingo','Monkey D. Luffy'),
('Bartholomew Kuma','Roronoa Zoro');

-- load data
-- local infile "data/Enemies.txt"
-- replace into table Enemies
-- fields terminated by '|'
-- LINES TERMINATED BY '\r\n'
-- (charname1, charname2);


insert into BelongsTo1
values
('Monkey D. Luffy','Straw Hat Pirates'),
('Roronoa Zoro','Straw Hat Pirates'),
('Vinsmoke Sanji','Straw Hat Pirates'),
('Nami','Straw Hat Pirates'),
('Usopp','Straw Hat Pirates'),
('Tony Tony Chopper','Straw Hat Pirates'),
('Nico Robin','Straw Hat Pirates'),
('Franky','Straw Hat Pirates'),
('Brook','Straw Hat Pirates'),
('Donquixote Doflamingo','Donquixote Pirates'),
('Gol D. Roger','Roger Pirates'),
('Silvers Rayleigh','Roger Pirates'),
('Edward Newgate','White Beard Pirates'),
('Shanks','Red Hair Pirates'),
('Charlotte Linlin','Big Mom Pirates'),
('Kaido','Wild Beast Pirates'),
('Marshall D. Teach','Black Beard Pirates'),
('Bartholomew Kuma','Wild Beast Pirates'),
('Boa Hancock','Nine Snake Pirates'),
('Buggy','Buggy Pirates'),
('Dracule Mihawk','Buggy Pirates'),
('Sir Crocodile','Buggy Pirates'),
('Jinbe','Fishman Pirates'),
('Gekko Moria','Thriller Barque'),
('Trafalgar Law','Heart Pirates'),
('Sakazuki','Naval Headquarters'),
('Borsalino','Naval Headquarters'),
('Kuzan','Naval Headquarters'),
('Sengoku','Naval Headquarters'),
('Monkey D. Garp','Naval Headquarters');


-- load data
-- local infile "data/BelongsTo1.txt"
-- replace into table BelongsTo1
-- fields terminated by '|'
-- LINES TERMINATED BY '\r\n'
-- (Characters, Organizations);



insert into BelongsTo2
values
('Straw hat pirates','Pirates'),
('Red Hair Pirates','Pirates'),
('Big Mom Pirates','Pirates'),
('Nine Snake Pirates','Oka Shichibukai'),
('White Beard Pirates','The Four Emperors'),
('Wild Beast Pirates','The Four Emperors');




insert into BelongsTo3
values
('Monkey D. Luffy','Supernova 11'),
('Trafalgar Law','Supernova 11'),
('Dracule Mihawk','Oka Shichibukai'),
('Boa Hancock','Oka Shichibukai'),
('Charlotte Linlin','The Four Emperors'),
('Kaido','The Four Emperors'),
('Bartholomew Kuma','Oka Shichibukai');


insert into Own
values
('Monkey D. Luffy','Gum-Gum Fruit'),
('Brook','Revive-Revive Fruit'),
('Tony Tony Chopper','Human-Human Fruit'),
('Buggy','Chop-Chop Fruit'),
('Charlotte Linlin','Soul fruit'),
('Sir Crocodile','Sand Fruit');



-- ('East sea episode',60,'Smoker'),
-- ('Alabasta episode',70,'Sir Crocodile'),
-- ('Sky Piea episode',52,'Enel'),
-- ('Enies Lobby episode',99,'CP9'),
-- ('Thriller Barque episode',47,'Gekko Moria'),
-- ('Women Island episode',14,'Boa Hancock'),
-- ('Impel Down episode',35,'Magellan'),
-- ('Top war',48,'Naval Headquarters'),
-- ('Fishman Island episode',58,'Hordy Jones'),
-- ('Punk Hazard episode',50,'Donquixote Doflamingo'),
-- ('Dressrosa episode',118,'Donquixote Doflamingo');

insert into Participate
values
('Monkey D. Luffy','Top war'),
('Monkey D. Luffy','Women Island episode'),
('Monkey D. Luffy','Enies Lobby episode'),
('Monkey D. Luffy','Thriller Barque episode'),
('Monkey D. Luffy','Sky Piea episode'),
('Monkey D. Luffy','Alabasta episode'),
('Monkey D. Luffy','Dressrosa episode'),
('Monkey D. Luffy','East sea episode'),
('Monkey D. Luffy','Punk Hazard episode'),
('Monkey D. Luffy','Impel Down episode'),
('Monkey D. Luffy','Fishman Island episode'),
('Roronoa Zoro','Top war'),
('Roronoa Zoro','Women Island episode'),
('Roronoa Zoro','Enies Lobby episode'),
('Roronoa Zoro','Thriller Barque episode'),
('Roronoa Zoro','Sky Piea episode'),
('Roronoa Zoro','Alabasta episode'),
('Roronoa Zoro','Dressrosa episode'),
('Roronoa Zoro','East sea episode'),
('Roronoa Zoro','Punk Hazard episode'),
('Roronoa Zoro','Impel Down episode'),
('Roronoa Zoro','Fishman Island episode'),
('Vinsmoke Sanji','Top war'),
('Vinsmoke Sanji','Women Island episode'),
('Vinsmoke Sanji','Enies Lobby episode'),
('Vinsmoke Sanji','Thriller Barque episode'),
('Vinsmoke Sanji','Sky Piea episode'),
('Vinsmoke Sanji','Alabasta episode'),
('Vinsmoke Sanji','Dressrosa episode'),
('Vinsmoke Sanji','East sea episode'),
('Vinsmoke Sanji','Punk Hazard episode'),
('Vinsmoke Sanji','Impel Down episode'),
('Vinsmoke Sanji','Fishman Island episode'),
('Sir Crocodile','Alabasta episode'),
('Sir Crocodile','Top war'),
('Gekko Moria','Thriller Barque episode'),
('Donquixote Doflamingo','Dressrosa episode'),
('Donquixote Doflamingo','Top war'),
('Donquixote Doflamingo','Fishman Island episode'),
('Boa Hancock','Women Island episode'),
('Boa Hancock','Top war'),
('Nami','Sky Piea episode'),
('Nico Robin','Enies Lobby episode'),
('Trafalgar Law','Dressrosa episode'),
('Franky','Enies Lobby episode'),
('Edward Newgate','Top war'),
('Sakazuki', 'Top war'),
('Borsalino', 'Top war'),
('Marshall D. Teach', 'Top war'),
('Shanks', 'Top war'),
('Kuzan', 'Top war'),
('Sengoku', 'Top war'),
('Monkey D. Garp', 'Top war'),
('Nami','Thriller Barque episode'),
('Tony Tony Chopper','Thriller Barque episode');


-- load data
-- local infile "data/Participate.txt"
-- replace into table Participate
-- fields terminated by '|'
-- LINES TERMINATED BY '\r\n'
-- (charname, eventname);


insert into HasBeenTo
values
('Monkey D. Luffy','Dressrosa'),
('Usopp','Dressrosa'),
('Trafalgar Law','Dressrosa'),
('Nami','Dressrosa'),
('Nico Robin','Dressrosa'),
('Monkey D. Luffy','Enies Lobby'),
('Usopp','East Sea'),
('Usopp','Alabasta'),
('Bartholomew Kuma','Shampoo Islands'),
('Trafalgar Law','Punk Hazard'),
('Monkey D. Luffy','Women Island'),
('Boa Hancock','Women Island'),
('Marshall D. Teach','Impel Down'),
('Marshall D. Teach','North Sea'),
('Sir Crocodile','Alabasta'),
('Monkey D. Luffy','Impel Down'),
('Monkey D. Luffy','Alabasta'),
('Monkey D. Luffy','Fishman Island'),
('Roronoa Zoro','Alabasta'),
('Nico Robin','Alabasta'),
('Nami','Alabasta'),
('Monkey D. Luffy','Marineford'),
('Edward Newgate','Marineford'),
('Sir Crocodile','Marineford'),
('Trafalgar Law','Marineford'),
('Sir Crocodile','South Sea'),
('Trafalgar Law','Women Island'),
('Donquixote Doflamingo','Marineford'),
('Donquixote Doflamingo','Fishman Island'),
('Donquixote Doflamingo','Punk Hazard'),
('Roronoa Zoro','West Sea'),
('Vinsmoke Sanji','West Sea'),
('Donquixote Doflamingo','South Sea');
-- load data
-- local infile "data/HasBeenTo.txt"
-- replace into table HasBeenTo
-- fields terminated by '|'
-- LINES TERMINATED BY '\r\n'
-- (charname, Locations);



insert into HappensAt
values
('Top war','Marineford');