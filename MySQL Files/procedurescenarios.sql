-- show Nami's reward amount before we call 
-- procedure IncreaseRewardAmount
select charname, rewardamount
from Characters
where charname = 'Nami';

call IncreaseRewardAmount('Nami', 90000000);

-- Nami's reward amount increases to 900000000
-- after we call procedure IncreaseRewardAmount
select charname, rewardamount
from Characters
where charname = 'Nami';





-- show Luffy's friends and the members of the 
-- Straw Hat Pirates before we call
-- procedure AddNewMember
(select *
from Friends
where Friends.charname1='Monkey D Luffy')
union
(select *
from Friends
where Friends.charname2='Monkey D Luffy');

select *
from BelongsTo1
where Organizations = 'Straw Hat Pirates';

call AddNewMember('Monkey D Luffy', 'Silvers Rayleigh');

-- After calling the procedure, Rayleigh is added 
-- to Luffy's friends, and also been invited to 
-- join the Straw Hat Pirates
 (select *
from Friends
where Friends.charname1='Monkey D Luffy')
union
(select *
from Friends
where Friends.charname2='Monkey D Luffy');

select *
from BelongsTo1
where Organizations = 'Straw Hat Pirates';





-- show the three variables returned by calling
-- procedure getAverage
call getAverage(@averageLength, @averageRange, @averageRewardAmount);
select @averageLength, @averageRange, @averageRewardAmount;





-- show the number of Luffy's friends and his 
-- enemies after calling procedure CountFriendsAndEnemies
call CountFriendsAndEnemies('Monkey D Luffy', @numberOfFriends, @numberOfEnemies);
select @numberOfFriends, @numberOfEnemies;





-- show the members of 'Oka Shichibukai' before
-- we call procedure AbleToJoinOka
select *
from BelongsTo3
where Forces = 'Oka Shichibukai';

call AbleToJoinOka('Sengoku');

-- Sengoku is not qualified to join Oka Shichibukai,
-- so the members of Oka Shichibukai do not change
select *
from BelongsTo3
where Forces = 'Oka Shichibukai';

call AbleToJoinOka('Donquixote Doflamingo');

-- Doflamingo is qualified to join Oka Shichibukai,
-- so the members of Oka Shichibukai have been 
-- updated
select *
from BelongsTo3
where Forces = 'Oka Shichibukai';

