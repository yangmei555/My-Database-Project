-- insert a single tuple
insert into Participate(Characters,Bigevent)
values('Dracule Mihawk','Top war');

-- insert a single tuple
insert into HasBeenTo(Characters,Locations)
values('Marshall D Teach','Marineford');

-- insert a subquery
drop table if exists PotentialFriendsOfLuffy;
create table PotentialFriendsOfLuffy(
	name VARCHAR(50)
);
INSERT INTO PotentialFriendsOfLuffy
(select Participate.Characters
from Participate
where Participate.Characters!='Monkey D Luffy'
and Participate.Bigevent='Top War');

-- insert a subquery
drop table if exists PotentialLocationLuffyHasBeenTo;
create table PotentialLocationLuffyHasBeenTo(
	name VARCHAR(50)
);
INSERT INTO PotentialLocationLuffyHasBeenTo
(select distinct HasBeenTo.Locations
from Friends,HasBeenTo
where Friends.Character2='Monkey D Luffy'
and Friends.Character1=HasBeenTo.Characters
and HasBeenTo.Locations='East Sea');

-- delete
delete from Characters
where Characters.age>30
and Characters.height<200;

-- delete
delete from DevilFruit
where DevilFruit.catagory='natrual series'
and DevilFruit.fruitname>'D';

-- update
update Characters
set Characters.age=33
where Characters.age>33;

-- update
update Characters
set Characters.rewardamount=100000000
where Characters.rewardamount<100000000