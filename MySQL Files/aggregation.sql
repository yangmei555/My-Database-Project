-- average height of characters whose reward amount is greater than 10000000
select avg(Characters.height)
from Characters
where Characters.rewardamount>10000000;

-- the number of different age of characters who has participated in the top war
select count(Characters.age)
from Characters,Participate
where Characters.charname=Participate.Characters
and Participate.Bigevent='Top War';

-- select the name, gender, reward amount, age and height of the character whose reward amount is the largest
select charname,gender,rewardamount,age,height
from Characters
where rewardamount=(select max(rewardamount)
from Characters);

-- find the shortest person who participates in Dressrosa episode
select Characters.charname
from Characters,Participate
where Participate.Bigevent='Dressrosa episode'
and Participate.Characters=Characters.charname
and Characters.height=(select min(height)
from Participate,Characters
where Participate.Bigevent='Dressrosa episode'
and Participate.Characters=Characters.charname
and Participate.Bigevent='Dressrosa episode');

-- find the number of persons who have participated in the top war
select count(Characters.charname)
from Characters,Participate
where Characters.charname=Participate.Characters
and Participate.Bigevent='Top War';

-- find the average age of the people who have the same height
select Characters.height, avg(Characters.age)
from Characters
group by Characters.height

