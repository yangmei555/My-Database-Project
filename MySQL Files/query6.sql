-- find the name, reward amount, age and height
-- of characters who have participated in the 
-- top war and have been to Marineford
select charname, rewardamount, age, height
from Participate
join HasBeenTo
using(charname)
join Characters
using(charname)
where Participate.eventname='Top war'
and HasBeenTo.Locations='Marineford'
order by charname;


-- find the names of the characters and the places
-- they have been to for those characters who 
-- belong to Roger Pirates and have been to 
-- Fishman Island
select HasBeenTo.charname, HasBeenTo.Locations
from BelongsTo1 a
inner join HasBeenTo
on a.Characters=HasBeenTo.charname
where a.Organizations='Roger Pirates'
and 'Fishman Island' in(
select HasBeenTo.Locations
from BelongsTo1
inner join HasBeenTo
on BelongsTo1.Characters=HasBeenTo.charname
where BelongsTo1.Organizations='Roger Pirates'
and a.Characters=BelongsTo1.Characters);


-- find the average reward amount, average height,
-- average age of the characters who participated
-- in Dressrosa event and have been to at least 3
-- locations
select avg(rewardamount), avg(age), avg(height)
from(
select rewardamount, age, height
from Characters chr_a
natural join Participate
natural join HasBeenTo
where 'Dressrosa episode' in(
select Participate.eventname
from Characters chr_b
natural join Participate
natural join HasBeenTo
where chr_a.charname=chr_b.charname)
group by chr_a.charname
having count(distinct HasBeenTo.Locations)>=3 )
table_a;


-- find characters who belong to Straw Hat Pirates
-- and have at 3 friends
select *
from Friends a, BelongsTo1
where a.charname1=BelongsTo1.Characters
and BelongsTo1.Organizations='Straw Hat Pirates'
group by a.charname1
having (count(*) + (select count(*)
from Friends b
where a.charname1=b.charname2
and a.charname2!=b.charname1)>=3);


-- find the pair of characters who are enemies and
-- one belongs to White Beard Pirates and the other
-- belongs to Black Beard Pirates
(select Enemies.charname1, a.Organizations, 
Enemies.charname2, b.Organizations
from Enemies
inner join BelongsTo1 a
on Enemies.charname1=a.Characters
inner join BelongsTo1 b
on Enemies.charname2=b.Characters
where a.Organizations='White Beard Pirates'
and b.Organizations='Black Beard Pirates')
union
(select Enemies.charname1, a.Organizations, 
Enemies.charname2, b.Organizations
from Enemies
inner join BelongsTo1 a
on Enemies.charname1=a.Characters
inner join BelongsTo1 b
on Enemies.charname2=b.Characters
where a.Organizations='Black Beard Pirates'
and b.Organizations='White Beard Pirates');