<?php

// Connection parameters
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'myang3';
$password = 'Abc002403024938';
$database = $username.'DB';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
or die('Could not connect: ' . mysqli_connect_error());
print 'Connected successfully!<br><br>';

// Selecting a database
//   Unnecessary in this case because we have already selected
//   the right database with the connect statement.
mysqli_select_db($dbcon, $database)
or die('Could not select database');
print 'Selected database successfully!<br><br>';

// Listing tables in your database
$query = 'select avg(rewardamount), avg(age), avg(height)
from(
select rewardamount, age, height
from Characters chr_a
natural join Participate
natural join HasBeenTo
where \'Dressrosa episode\' in(
select Participate.eventname
from Characters chr_b
natural join Participate
natural join HasBeenTo
where chr_a.charname=chr_b.charname)
group by chr_a.charname
having count(distinct HasBeenTo.Locations)>=3 )
table_a';
$result = mysqli_query($dbcon, $query)
or die('Query failed: ' . mysqli_error());


print "the average reward amount, average height, average age of the characters who participated
 in Dressrosa event and have been to at least 3 locations: <br><br>";

echo "<table border='1'>
<tr>
<th>Average Reward Amount</th>
<th>Average Age</th>
<th>Average Height</th>
</tr>";

// Printing table names in HTML
print '<ul>';
while ($tuple = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $tuple[0] . "</td>";
    echo "<td>" . $tuple[1] . "</td>";
    echo "<td>" . $tuple[2] . "</td>";
    //echo "<td>" . $tuple['height'] . "</td>";
    echo "</tr>";
}
echo "</table>";
print '</ul>';

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?>