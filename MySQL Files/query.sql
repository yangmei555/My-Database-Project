select * from Characters where age=20;
select * from Characters where rewardamount>100000000;
select charname from Characters where rewardamount<100000000;
select orgname from Organizations where (amoutofmember>10);
select eventname from BigEvent ;
select * from Organizations where ('C'<leader and leader<'Q')