
-- when some new characters and locations are added
-- to the HasBeenTo table, it was triggered;
drop trigger if exists CharacterExistsTrigger;
delimiter |
create trigger CharacterExistsTrigger
after insert on HasBeenTo
for each row
	begin 
		insert ignore into Characters(charname)
		values(new.charname);
        insert ignore into Location(Location.locname)
        value(new.Locations);
end; |
delimiter ;





-- before update the character's information, 
-- check the age, if the new age is smaller than
-- the old age, set the new age to be the old age
-- and then update, so that enforcing an attribute
-- constraint

drop trigger if exists AgeCheckUpdateATrigger;
delimiter |
create trigger AgeCheckUpdateTrigger
before update on Characters
for each row
	begin 
		if (new.age < old.age) then
			set new.age = old.age;
		end if;
end; |
delimiter ;





-- only when a character has participated less 
-- than 5 events, the new tuple will be added; 
-- otherwise, the insertion will be ignored;

drop table if exists ActivePirates;
create table ActivePirates(
	charname varchar(50),
    participateTime int,
    primary key(charname)
);

drop trigger if exists InsertParticipateTrigger;
delimiter |
create trigger InsertParticipateTrigger
before insert on Participate
for each row
begin 
	declare number int default 0;
	set number = (select count(*)
	from Participate
	where charname = new.charname);
	if (number + 1 > 5) then
		insert into ActivePirates(charname, participateTime)
		value(new.charname, number + 1);
	end if;
end;|
delimiter ;





-- if a character's reward amount grows more than
-- 100000000, and the character's age is less then
-- the average age of all the characters, put this
-- character into the capable pirates table;

drop table if exists CapablePirates;
create table CapablePirates(
	charname varchar(50),
    age int,
    oldRewardAmount int,
    newRewardAmount int,
    primary key(charname)
);

drop trigger if exists SetCapablePiratesTrigger;
delimiter |
create trigger SetCapablePiratesTrigger
after update on Characters
for each row
begin
	declare avgAge double;
    set avgAge = (select avg(age)
				from Characters);
	if (new.age < avgAge && 
    new.rewardamount - old.rewardamount > 100000000) then
		insert into CapablePirates(charname, age, oldRewardAmount, newRewardAmount)
        values (new.charname, new.age, old.rewardamount, new.rewardamount);
	end if;
end; |
delimiter ;

show triggers;


