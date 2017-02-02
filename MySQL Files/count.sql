-- Replace 'myang3DB' with your own schema name;
-- After running this query, you must double click
-- to select your schema again, otherwise you can
-- not run other normal queries;
use information_schema;
select table_name,table_rows 
from tables
where TABLE_SCHEMA = 'myang3DB'
order by table_rows desc;


-- replace 'myang3DB' with your own schema name;
select count(*) as size
from myang3DB.Characters
union
select count(*) as size
from myang3DB.Organizations
union
select count(*) as size
from myang3DB.Forces
union
select count(*) as size
from myang3DB.DevilFruit
union
select count(*) as size
from myang3DB.BigEvent
union
select count(*) as size
from myang3DB.Location
union
select count(*) as size
from myang3DB.Friends
union
select count(*) as size
from myang3DB.Enemies
union
select count(*) as size
from myang3DB.BelongsTo1
union
select count(*) as size
from myang3DB.BelongsTo2
union
select count(*) as size
from myang3DB.BelongsTo3
union
select count(*) as size
from myang3DB.Own
union
select count(*) as size
from myang3DB.Participate
union
select count(*) as size
from myang3DB.HasBeenTo
union
select count(*) as size
from myang3DB.HappensAt;