-- find the character with the highest reward amount among those who have eaten devil fruits
select Characters.charname,Characters.gender,Characters.rewardamount
from Characters 
inner join Own
on Characters.charname=Own.charname
where Characters.rewardamount=(select max(Characters.rewardamount)
from Characters 
inner join Own
on Characters.charname=Own.charname);

-- select the name, age, height and reward amount of characters who has been to Alabasta
select Characters.charname, Characters.age, Characters.height, Characters.rewardamount
from Characters 
join HasBeenTo using(charname)
where HasBeenTo.Locations='Alabasta';

-- find the name, reward amount and the fruit name and catalog of people who have eaten devil fruits
select Characters.charname, Characters.rewardamount, DevilFruit.fruitname, DevilFruit.catagory
from Characters 
natural join Own
natural join DevilFruit;

-- find the places that the charaters with reward amount above 10000000 have been to
select Characters.charname,Characters.rewardamount, HasBeenTo.Locations
from Characters
left outer join HasBeenTo
on Characters.charname=HasBeenTo.charname
where Characters.rewardamount>100000000;

-- select the largest location every character has been to
select Characters.charname,HasBeenTo.Locations,max(Location.locrange)
from Characters
inner join HasBeenTo
on Characters.charname=HasBeenTo.charname
inner join Location
on HasBeenTo.Locations=Location.locname
group by Characters.charname;

-- select the characters who have participate in more than 2 big events
select Characters.charname
from Characters
inner join Participate
on Characters.charname=Participate.charname
group by Characters.charname
having count(*)>2;

-- select the longest episode of big event for each character has participated
select Characters.charname, BigEvent.eventname, max(BigEvent.length)
from Characters
inner join Participate
on Characters.charname=Participate.charname
inner join BigEvent
on Participate.eventname=BigEvent.eventname
group by Characters.charname;

-- find each character's enemy who has eaten the devil fruit
select Characters.charname,Enemies.Character2,Own.fruitname
from Characters
inner join Enemies
on Characters.charname=Enemies.Character1
inner join Own
on Enemies.Character2=Own.charname;

-- find each big event's participater with the highest reward amount and the length of the event should be above 50
select Participate.eventname,Characters.charname,max(Characters.rewardamount),BigEvent.length
from Participate
join Characters
using(charname)
join BigEvent
using(eventname)
group by Participate.eventname
having BigEvent.length>50;

-- find the most powerful devil fruit owned by the characters who belong to the straw hat pirate
select Characters.charname,DevilFruit.fruitname,DevilFruit.power
from Characters
natural join Own
natural join DevilFruit
join BelongsTo1
on Characters.charname=BelongsTo1.Characters
where BelongsTo1.Organizations='Straw hat pirates'
and DevilFruit.power=(select max(DevilFruit.power)
from Characters
natural join Own
natural join DevilFruit
join BelongsTo1
on Characters.charname=BelongsTo1.Characters
where BelongsTo1.Organizations='Straw hat pirates'
)