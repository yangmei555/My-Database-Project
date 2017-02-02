-- test whether we have constructed triggers
show triggers;



-- test the first trigger 

-- this modification will not activate the 
-- CharacterExistsTrigger
insert into HasBeenTo
values('Buggy', 'Marineford');

-- nothing new will be added to Characters table
select *
from Characters;

-- nothing new will be added to Location table
select *
from Location;

-- this modification will activate the 
-- CharacterExistsTrigger
insert into HasBeenTo
values('Enel', 'Infinite Earth');

-- new tuple with character name "Enel" will be 
-- added to Characters table
select *
from Characters;

-- new tuple with location name "Infinite Earth" 
-- will be added to Location table
select *
from Location;





-- test the second trigger

-- this modification will activate the trigger 
-- AgeCheckUpdateATrigger
update Characters
set age = 19
where charname = 'Vinsmoke Sanji';

-- Sanji's age is still 21, does not changed
select *
from Characters
where charname = 'Vinsmoke Sanji';

-- this modification will not activate the trigger 
-- AgeCheckUpdateATrigger
update Characters
set age = 96
where charname = 'Brook';

-- Brook's age has changed from 90 to 96
select *
from Characters
where charname = 'Brook';





-- test the third trigger

-- this modification will not activate the 
-- InsertParticipateTrigger
insert into Participate
values('Boa Hancock', 'Fishman Island episode');

-- nothing new will be added to ActivePirate table
select *
from ActivePirates;

-- this modification will activate the 
-- InsertParticipateTrigger
insert into Participate
values('Monkey D Luffy', 'Impel Down episode');

-- the active character and his participate times
-- will be added to ActivePirate table
select *
from ActivePirates;





-- test the fourth trigger

-- this modification will not activate the 
-- SetCapablePiratesTrigger
update Characters
set age = 38, rewardamount = 120000000
where charname = 'Franky';

-- nothing new will be added to CapablePirates table
select *
from CapablePirates;

-- this modification will activate the 
-- SetCapablePiratesTrigger
update Characters
set age = 23, rewardamount = 450000000
where charname = 'Roronoa Zoro';

-- the capable character's name and his age, old 
-- reward amount and new reward amount will be 
-- added to CapablePirates table
select *
from CapablePirates;

