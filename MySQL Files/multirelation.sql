-- find all enemies of characters who have participated in the Dressrosa episode
select Enemies.Character2
from Participate, Enemies
where Participate.Bigevent = 'Dressrosa episode'
and Participate.Characters=Enemies.Character1 
order by Enemies.Character2;

-- find all characters who have participated in Top War and have been to Women Island
select Participate.Characters
from Participate, HasBeenTo
where Participate.Bigevent='Top War'
and HasBeenTo.Locations='Women Island'
and Participate.Characters=HasBeenTo.Characters;

-- find all pairs of different locations a character has been to
select A.Locations,B.Locations
from HasBeenTo A, HasBeenTo B
where A.Characters=B.Characters
and A.Locations!=B.Locations
and A.Locations>B.Locations;

-- find all forces which have members from characters and from orgarizations
select distinct BelongsTo2.Forces
from BelongsTo2,BelongsTo3,Characters,Organizations
where BelongsTo2.Forces=BelongsTo3.Forces
and BelongsTo2.Organizations=Organizations.orgname
and BelongsTo3.Characters=Characters.charname;

-- find all characters who have been to the same places where Monkey D Luffy has been to
select HasBeenTo.Characters
from HasBeenTo
where HasBeenTo.Characters!='Monkey D Luffy'
and HasBeenTo.Locations=any (select HasBeenTo.Locations
from HasBeenTo
where HasBeenTo.Characters='Monkey D Luffy');

-- find the devil fruits eaten by characters whose reward amount is greater than 3000000
select Own.Devilfruit
from Own
where Own.Characters=any (select Characters.charname
from Characters
where Characters.rewardamount>3000000)