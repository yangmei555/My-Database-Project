insert into Characters
values
('Monkey D Luffy','male',500000000,19,174),
('Roronoa Zoro','male',320000000,21,181),
('Nami','female',66000000,20,170),
('Usopp','male',200000000,19,176),
('Vinsmoke Sanji','male',177000000,21,180),
('Tony Tony Chopper','male',100,17,150),
('Nico Robin','female',130000000,30,180),
('Franky','male',94000000,36,240),
('Brook','male',83000000,90,266),
('Gol D Roger','male',1500000000,53,178),
('Silvers Rayleigh','male',600000000,90,191),
('Edward Newgate','male',1200000000,72,650),
('Akakami no shankusu','male',700000000,39,184),
('Charlotte Linlin','female',700000000,58,280),
('Kaido','male',1100000000,62,450),
('Marshall D Teach','male',800000000,40,344),
('Bartholemew Kuma','male',296000000,47,689),
('Boa Hancock','female',80000000,31,191),
('Buggy','male',15000000,38,176),
('Dracule Mihawk','male',90000000,43,198),
('Sir Crocodile','male',81000000,46,253),
('Jinbe','male',400000000,46,301),
('Gekko Moria','male',320000000,50,692),
('Trafalgar Law','male',500000000,26,191),
('Donquixote Doflamingo','male',340000000,41,305),
('AkainuSakazuki','male', null, 55, 190),
('Borsalino', 'male',null, 59, 195),
('Kuzan', 'male',null, 49, 188),
('Sengoku','male',null, 79, 179),
('Monkey D Garp','male',null, 82, 178);




insert into Organizations
values
('Straw Hat Pirates','Monkey D Luffy',9),
('Red Hair Pirates','Akakami no shankusu',9),
('Roger Pirates','Gol D Roger',5),
('White Beard Pirates','Edward Newgate',18),
('Black Beard Pirates','Marshall D Teach',11),
('Donquixote Pirates','Donquixote Doflamingo',18), 
('Buggy Pirates','Buggy',12),
('Nine Snake Pirates','Boa Hancock',9),
('Wild Beast Pirates','Kaido',6),
('Big Mom Pirates','Charlotte Linlin',20),
('The Baroque Workshop','Sir Crocodile',22),
('Thriller Barque','Gekko Moria',24),
('Heart Pirates','Trafalgar Law',6);



insert into Forces
values
('Naval Headquarters','Sengoku'),
('Revolutionary Army','Monkey D Dragon'),
('Impel down','Magellan'),
('Enies Lobby','Spandam'),
('Oka Shichibukai','Donquixote Doflamingo'),
('The Four Emperors','Edward Newgate'),
('Navy headquarters senior general','AkainuSakazuki'),
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
('Dressrosa episode',145,'Donquixote Doflamingo');



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
('Monkey D Luffy','Akakami no shankusu'),
('Roronoa Zoro','Monkey D. Luffy'),
('Vinsmoke Sanji','Monkey D. Luffy'),
('Monkey D Luffy','Boa Hancock'),
('Akakami no shankusu','Buggy'),
('Gol D Roger','Edward Newgate'),
('Jinbe','Monkey D. Luffy'),
('Trafalgar Law','Monkey D. Luffy'),
('Nami','Nico Robin');



insert into Enemies
values
('Monkey D Luffy','Charlotte Linlin'),
('Gol D Roger','Edward Newgate'),
('Sir Crocodile','Donquixote Doflamingo'),
('Trafalgar Law','Donquixote Doflamingo'),
('Monkey D Luffy','Marshall D Teach'),
('Gekko Moria','Monkey D. Luffy'),
('Kaido','Gekko Moria'),
('Charlotte Linlin','Akakami no shankusu'),
('Donquixote Doflamingo','Monkey D Luffy'),
('Bartholemew Kuma','Roronoa Zoro');




insert into BelongsTo1
values
('Monkey D Luffy','Straw hat pirates'),
('Roronoa Zoro','Straw hat pirates'),
('Vinsmoke Sanji','Straw hat pirates'),
('Nami','Straw hat pirates'),
('Usopp','Straw hat pirates'),
('Tony Tony Chopper','Straw hat pirates'),
('Nico Robin','Straw hat pirates'),
('Franky','Straw hat pirates'),
('Brook','Straw hat pirates'),
('Donquixote Doflamingo','Donquixote Pirates'),
('Sir Crocodile','The Baroque Workshop'),
('Boa Hancock','Nine Snake Pirates'),
('Gol D Roger','Roger Pirates');




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
('Bartholemew Kuma','Oka Shichibukai');


insert into Own
values
('Monkey D Luffy','Gum-Gum Fruit'),
('Brook','Revive-Revive Fruit'),
('Tony Tony Chopper','Human-Human Fruit'),
('Buggy','Chop-Chop Fruit'),
('Charlotte Linlin','Soul fruit'),
('Sir Crocodile','Sand Fruit');



insert into Participate
values
('Monkey D Luffy','Top war'),
('Sir Crocodile','Alabasta episode'),
('Sir Crocodile','Top war'),
('Gekko Moria','Thriller Barque episode'),
('Donquixote Doflamingo','Dressrosa episode'),
('Donquixote Doflamingo','Top war'),
('Boa Hancock','Women Island episode'),
('Boa Hancock','Top war'),
('Vinsmoke Sanji','East sea episode'),
('Nami','Sky Piea episode'),
('Nico Robin','Enies Lobby episode'),
('Trafalgar Law','Dressrosa episode'),
('Franky','Enies Lobby episode'),
('Edward Newgate','Top war'),
('Roronoa Zoro','Enies Lobby episode'),
('Roronoa Zoro','Alabasta episode'),
('Roronoa Zoro','Thriller Barque episode'),
('Nami','Thriller Barque episode'),
('Tony Tony Chopper','Thriller Barque episode'),
('Vinsmoke Sanji','Enies Lobby episode'),
('Vinsmoke Sanji','Thriller Barque episode'),
('Monkey D Luffy','Enies Lobby episode'),
('Monkey D Luffy','Thriller Barque episode'),
('Monkey D Luffy','Sky Piea episode'),
('Monkey D Luffy','Dressrosa episode');


insert into HasBeenTo
values
('Monkey D Luffy','Enies Lobby'),
('Usopp','East Sea'),
('Usopp','Alabasta'),
('Bartholemew Kuma','Shampoo Islands'),
('Trafalgar Law','Punk Hazard'),
('Monkey D Luffy','Women Island'),
('Boa Hancock','Women Island'),
('Marshall D Teach','Impel Down'),
('Sir Crocodile','Alabasta'),
('Monkey D Luffy','Impel Down'),
('Monkey D Luffy','Alabasta'),
('Monkey D Luffy','Fishman Island'),
('Roronoa Zoro','Alabasta'),
('Nico Robin','Alabasta'),
('Nami','Alabasta');



insert into HappensAt
values
('Top war','Marineford');