<?php

// Connection parameters
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'myang3';
$password = 'Abc002403024938';
$database = $username.'DB';

$link = 'http://onepiece.wikia.com/wiki/';

// Attempting to connect
$dbcon = mysqli_connect($host, $username, $password, $database)
or die('Could not connect: ' . mysqli_connect_error());
print 'Connected successfully!<br><br>';

// Getting the input parameter (user):
$age = $_REQUEST['age']or die("You do not input the age, please go back and input a valid number!");
$height = $_REQUEST['height']or die("You do not input the height, please go back and input a valid number!");
//$user = "Jinbe";

if (preg_match("/[a-zA-Z]/",$age)) {
    die("Your input age is invalid, please go back and input a valid number!");
}

if (preg_match("/[a-zA-Z]/",$height)) {
    die("Your input height is invalid, please go back and input a valid number!");
}

// Get the attributes of the user with the given username
$query = "SELECT * FROM Characters WHERE age > $age and height < $height";
$result = mysqli_query($dbcon, $query)
or die('Query failed: ' . mysqli_error($dbcon));

// Can also check that there is only one tuple in the result
$tuple = mysqli_fetch_array($result)
or die("No one is older than $age years old and shorter than $height cm !");

print "The Characters who are older than $age years old and shorter than $height cm are the following :<br><br>";

echo "<table border='1'>
<tr>
<th>Name</th>
<th>Age</th>
<th>Height</th>
</tr>";

// Printing user attributes in HTML
//print '<ul>';
echo "<tr>";
echo "<td>" . "<a href='$link$tuple[0]'>$tuple[0]</a>" . "</td>";
//echo "<td>" . $tuple[1] . "</td>";
//echo "<td>" . $tuple[2] . "</td>";
echo "<td>" . $tuple[3] . "</td>";
echo "<td>" . $tuple[4] . "</td>";
echo "</tr>";

while ($tuple = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . "<a href='$link$tuple[0]'>$tuple[0]</a>" . "</td>";
//    echo "<td>" . $tuple[1] . "</td>";
//    echo "<td>" . $tuple[2] . "</td>";
    echo "<td>" . $tuple[3] . "</td>";
    echo "<td>" . $tuple[4] . "</td>";
    echo "</tr>";
}
echo "</table>";


echo "</table>";
//print '</ul>';

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?>