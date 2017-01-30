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
$query = 'select * from Location';
$result = mysqli_query($dbcon, $query)
or die('Query failed: ' . mysqli_error());


print "The name of all the locations are as follows: <br><br>";

echo "<table border='1'>
<tr>
<th>Location</th>
</tr>";

// Printing table names in HTML
print '<ul>';
while ($tuple = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $tuple[0] . "</td>";
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