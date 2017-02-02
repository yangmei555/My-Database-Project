-- select the straw hat pirate's memebers into a view
drop view if exists StrawHat;
create view StrawHat as
select charname,gender,rewardamount,age,height
from Characters
inner join BelongsTo1
on Characters.charname=BelongsTo1.Characters
where BelongsTo1.Organizations='Straw hat pirates';

-- find the member of straw hat who is the tallest
select charname,gender,rewardamount,age,height
from StrawHat
where height=(select max(height)
from StrawHat);

-- find the largest location members in straw hat have been to
select StrawHat.charname,max(Location.locrange)
from StrawHat
left outer join HasBeenTo
on StrawHat.charname=HasBeenTo.charname
left outer join Location
on Location.locname=HasBeenTo.Locations
group by StrawHat.charname;

-- select the characters who have participate in the top war
drop view if exists InTopWar;
create view InTopWar as
select charname,gender,rewardamount,age,height,eventname
from Characters
join Participate
using (charname)
where Participate.eventname='Top War';

-- select the characters who have participated in top war and their enemies if their enemies's reward amount is above 100000000
select InTopWar.charname,Enemies.Character2,Characters.rewardamount
from InTopWar
inner join Enemies
on InTopWar.charname=Enemies.Character1
inner join Characters
on Enemies.Character2=Characters.charname
where Characters.rewardamount>100000000; 

-- find the character that has participated in the top war and has the most powerful devil fruit
select InTopWar.charname,DevilFruit.fruitname,DevilFruit.power
from InTopWar
inner join Own
on InTopWar.charname=Own.charname
natural join DevilFruit
where DevilFruit.power=(select max(DevilFruit.power)
from InTopWar
inner join Own
on InTopWar.charname=Own.charname
natural join DevilFruit
)

