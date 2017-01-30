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
$query = 'select Characters.charname,DevilFruit.fruitname,DevilFruit.power
from Characters
natural join Own
natural join DevilFruit
join BelongsTo1
on Characters.charname=BelongsTo1.Characters
where BelongsTo1.Organizations=\'Straw hat pirates\'
and DevilFruit.power=(select max(DevilFruit.power)
from Characters
natural join Own
natural join DevilFruit
join BelongsTo1
on Characters.charname=BelongsTo1.Characters
where BelongsTo1.Organizations=\'Straw hat pirates\'
)';
$result = mysqli_query($dbcon, $query)
or die('Query failed: ' . mysqli_error());

$link = 'http://onepiece.wikia.com/wiki/';

print "The most powerful devil fruit owned by the character who belongs to the straw hat pirate: <br><br>";

echo "<table border='1'>
<tr>
<th>Character</th>
<th>Devil Fruit</th>
<th>Power</th>
</tr>";

// Printing table names in HTML
print '<ul>';
while ($tuple = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . "<a href='$link$tuple[0]'>$tuple[0]</a>" . "</td>";
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