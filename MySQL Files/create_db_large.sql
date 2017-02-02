drop table if exists Characters;
create table Characters(
	charname varchar(50),
    gender varchar(50),
    rewardamount int,
    age int,
    height int,
    primary key(charname)
);

drop table if exists Organizations;
create table Organizations(
	orgname varchar(50),
    leader varchar(50),
    numberOfCadre int,
    primary key(orgname)
);

drop table if exists Forces;
create table Forces(
	forcename varchar(50),
    highestleader varchar(50),
    primary key(forcename)
);

drop table if exists DevilFruit;
create table DevilFruit(
	fruitname varchar(50),
    catagory varchar(50),
    power int,
    speciality varchar(500),
    primary key(fruitname)
);

drop table if exists BigEvent;
create table BigEvent(
	eventname varchar(50),
    length int,
    biggistenemy varchar(50),
    primary key(eventname)
);

drop table if exists Location;
create table Location(
	locname varchar(50),
    locrange varchar(50),
    primary key(locname)
);

drop table if exists Friends;
create table Friends(
	charname1 varchar(50),
    charname2 varchar(50),
    primary key(charname1,charname2)
);

drop table if exists Enemies;
create table Enemies(
	charname1 varchar(50),
    charname2 varchar(50),
    primary key(charname1,charname2)
);

drop table if exists BelongsTo1;
create table BelongsTo1(
	Characters varchar(50),
    Organizations varchar(50),
    primary key(Characters,Organizations)
);

drop table if exists BelongsTo2;
create table BelongsTo2(
	Organizations varchar(50),
    Forces varchar(50),
    primary key(Organizations, Forces)
);

drop table if exists BelongsTo3;
create table BelongsTo3(
	Characters varchar(50),
    Forces varchar(50),
    primary key(Characters, Forces)
);

drop table if exists Own;
create table Own(
	charname varchar(50),
    fruitname varchar(50),
    primary key(charname)
);

drop table if exists Participate;
create table Participate(
	charname varchar(50),
    eventname varchar(50),
    primary key(charname,eventname)
);

drop table if exists HasBeenTo;
create table HasBeenTo(
	charname varchar(50),
    Locations varchar(50),
    primary key(charname,Locations)
);

drop table if exists HappensAt;
create table HappensAt(
	BigEvent varchar(50),
    Locations varchar(50),
    primary key(BigEvent)
);

