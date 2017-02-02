-- if the new reward amount is larger than the 
-- previous one, then increase it in the table
drop procedure if exists IncreaseRewardAmount;
delimiter |
create procedure IncreaseRewardAmount(
	in char_Name varchar(50),
    in newAmount int)
begin
	declare oldAmount int;
    set oldAmount = (select rewardamount
					from Characters
					where charname = char_Name);
	if (newAmount > oldAmount) then
		update Characters
        set rewardamount = newAmount
        where charname = char_Name;
	end if;
end; |
delimiter ;





-- if a character becomes a friend of a captain of
-- a group of pirates, then he will be invited to 
-- join that organization
drop procedure if exists AddNewMember;
delimiter |
create procedure AddNewMember(
	in friend_1 varchar(50),
    in friend_2 varchar(50))
begin 
	declare captain varchar(50);
    declare org_Name varchar(50);
    declare flag int default 0;
    
    declare isCaptain cursor for
    select leader, orgname
    from Organizations;
    
    declare continue handler for
    not found
    set flag = 1;
    
	insert into Friends(charname1, charname2)
    values(friend_1, friend_2);
    
    open isCaptain;
    repeat 
		fetch isCaptain
        into captain, org_Name;
			if (captain = friend_1) then
				insert ignore into BelongsTo1(Characters, Organizations)
                values(friend_2, org_name);
			end if;
		until flag = 1
	end repeat;
    close isCaptain;
end; |
delimiter ;





-- get the average length of big events, average
-- range of the locations, and average reward amount
-- of all the characters through this procedure            
drop procedure if exists getAverage;
delimiter |
create procedure getAverage(
	out averageLength decimal(10, 2),
    out averageRange decimal(10, 2),
    out averageRewardAmount decimal(12, 2))
begin
    select avg(length) into averageLength
	from BigEvent;
    select avg(locrange) into averageRange
	from Location;
    select avg(rewardamount) into averageRewardAmount
	from (select rewardamount
	from Characters
	where rewardamount > 0) AllAmount;
end; |
delimiter ;





-- find how many friends and how many enemies does
-- a character have
drop procedure if exists CountFriendsAndEnemies;
delimiter |
create procedure CountFriendsAndEnemies(
	in oneName varchar(50),
    out numberOfFriends int,
    out numberOfEnemies int)
begin
	select count(*) into numberOfFriends
    from Friends
    where charname1 = oneName
    or charname2 = oneName;
    
    select count(*) into numberOfEnemies
    from Enemies
    where charname1 = oneName
    or charname2 = oneName;
end; |
delimiter ;





-- if a character is a captain of an organization,
-- and his reward amount is greater than 300000000,
-- and his has participated in no less than 3 big
-- events, then he has the qualification to join
-- 'Oka Shichibukai'
drop procedure if exists AbleToJoinOka;
delimiter |
create procedure AbleToJoinOka(
	in char_name varchar(50))
begin
	declare leader_name varchar(50);
    declare amount int;
    declare times int;
	declare flag_1 int default 0;
    declare flag_2 int default 0;
    declare flag_3 int default 0;
    declare flag_4 int default 0;
	
    declare isLeader cursor for
    select leader
    from Organizations;
    
    declare continue handler for
    not found
    set flag_4 = 1;
    
    set amount = (select rewardamount
					from Characters
                    where charname = char_name);
	if (amount > 300000000) then
		set flag_1 = 1;
	end if;
        
	set times = (select count(*)
					from Participate
                    where charname = char_name);
	if (times >= 3) then
		set flag_2 = 1;
	end if;
        
	open isLeader;
    repeat 
		fetch isLeader
        into leader_name;
			if (leader_name = char_name) then
				set flag_3 = 1;
			end if;
		until flag_4 = 1
	end repeat;
    close isLeader;
    
    if (flag_1 = 1 && flag_2 = 1 && flag_3 = 1) then
		insert ignore into BelongsTo3(Characters, Forces)
        values(char_name, 'Oka Shichibukai');
	end if;
end; |
delimiter ;



-- show each procedure's status
show procedure status;


