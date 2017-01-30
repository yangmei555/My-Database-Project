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
$query = 'select *
from Friends a, BelongsTo1
where a.charname1=BelongsTo1.Characters
and BelongsTo1.Organizations=\'Straw Hat Pirates\'
group by a.charname1
having (count(*) + (select count(*)
from Friends b
where a.charname1=b.charname2
and a.charname2!=b.charname1)>=3)';
$result = mysqli_query($dbcon, $query)
or die('Query failed: ' . mysqli_error());


print "The name of characters who belong to Straw Hat Pirates and have at least 3 friends: <br><br>";

echo "<table border='1'>
<tr>
<th>Name</th>
</tr>";

$link = 'http://onepiece.wikia.com/wiki/';


// Printing table names in HTML
print '<ul>';
while ($tuple = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . "<a href='$link$tuple[0]'>$tuple[0]</a>" . "</td>";
//    echo "<td>" . $tuple['rewardamount'] . "</td>";
//    echo "<td>" . $tuple['age'] . "</td>";
//    echo "<td>" . $tuple['height'] . "</td>";
    echo "</tr>";
}
echo "</table>";
print '</ul>';

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?>