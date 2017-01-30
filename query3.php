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
$query = 'select charname, rewardamount, age, height
from Participate
join HasBeenTo
using(charname)
join Characters
using(charname)
where Participate.eventname=\'Top war\'
and HasBeenTo.Locations=\'Marineford\'
order by charname';
$result = mysqli_query($dbcon, $query)
or die('Query failed: ' . mysqli_error());


print "The name, reward amount, age and height of characters who have participated in the
top war and have been to Marineford are: <br><br>";

echo "<table border='1'>
<tr>
<th>Name</th>
<th>Reward Amount</th>
<th>Age</th>
<th>Height</th>
</tr>";

$link = 'http://onepiece.wikia.com/wiki/';


// Printing table names in HTML
print '<ul>';
while ($tuple = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . "<a href='$link$tuple[0]'>$tuple[0]</a>" . "</td>";
    echo "<td>" . $tuple['rewardamount'] . "</td>";
    echo "<td>" . $tuple['age'] . "</td>";
    echo "<td>" . $tuple['height'] . "</td>";
    echo "</tr>";
}
echo "</table>";
print '</ul>';

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?>