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

// Getting the input parameter (user):
$num = $_REQUEST['number']or die("You do not input, please go back and input a valid number!");
//$user = "Jinbe";

//empty($_POST["char"])) or die("Please");
if (preg_match("/[a-zA-Z]/",$num)) {
    die("Your input is invalid, please go back and input a valid number!");
}

// Get the attributes of the user with the given username
$query = "SELECT * FROM Characters WHERE rewardamount >= $num";
$result = mysqli_query($dbcon, $query)
or die('Query failed: ' . mysqli_error($dbcon));

// Can also check that there is only one tuple in the result
$tuple = mysqli_fetch_array($result)
or die("Your input is so large, all the characters' reward amount is below your input,
please go back and input a smaller number!");

print "The Characters whose reward amount is larger than <b>$num</b> are the following :<br><br>";

$link = 'http://onepiece.wikia.com/wiki/';

echo "<table border='1'>
<tr>
<th>Name</th>
<th>Gender</th>
<th>Reward Amount</th>
<th>Age</th>
<th>Height</th>
</tr>";

// Printing user attributes in HTML
//print '<ul>';
echo "<tr>";
echo "<td>" . "<a href='$link$tuple[0]'>$tuple[0]</a>" . "</td>";
echo "<td>" . $tuple[1] . "</td>";
echo "<td>" . $tuple[2] . "</td>";
echo "<td>" . $tuple[3] . "</td>";
echo "<td>" . $tuple[4] . "</td>";
echo "</tr>";

while ($tuple = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . "<a href='$link$tuple[0]'>$tuple[0]</a>" . "</td>";
    echo "<td>" . $tuple[1] . "</td>";
    echo "<td>" . $tuple[2] . "</td>";
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