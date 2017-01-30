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
$user = $_REQUEST['char']or die("You do not input a name, please go back to input a valid name!");
//$user = "Jinbe";

//empty($_POST["char"])) or die("Please");

$link = 'http://onepiece.wikia.com/wiki/';

// Get the attributes of the user with the given username
$query = "SELECT * FROM Characters WHERE charname LIKE '%$user%'";
$result = mysqli_query($dbcon, $query)
or die('Query failed: ' . mysqli_error($dbcon));

// Can also check that there is only one tuple in the result
$tuple = mysqli_fetch_array($result)
or die("Character $user is not found!");

$query2 = "SELECT charname FROM Characters WHERE charname LIKE '%$user%'";
$result2 = mysqli_query($dbcon, $query2);
$username_full = mysqli_fetch_array($result2);
//print "The attributes of Character ";
do {
    print "The attributes of Character <b>$username_full[0]</b>  are the following :<br><br>";
    $query3 = "SELECT * FROM Characters WHERE charname = '$username_full[0]'";
    $result3 = mysqli_query($dbcon, $query3);
    echo "<table border='1'>
<tr>
<th>Name</th>
<th>Gender</th>
<th>Reward Amount</th>
<th>Age</th>
<th>Height</th>
</tr>";
    while ($tuple3 = mysqli_fetch_array($result3)){
        echo "<tr>";
        echo "<td>" . "<a href='$link$tuple3[0]'>$tuple3[0]</a>" . "</td>";
        echo "<td>" . $tuple3[1] . "</td>";
        echo "<td>" . $tuple3[2] . "</td>";
        echo "<td>" . $tuple3[3] . "</td>";
        echo "<td>" . $tuple3[4] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<br/>";
    echo "<br/>";
} while ($username_full = mysqli_fetch_array($result2));
//print " are the following :<br><br>";

//echo "<table border='1'>
//<tr>
//<th>Name</th>
//<th>Gender</th>
//<th>Reward Amount</th>
//<th>Age</th>
//<th>Height</th>
//</tr>";

// Printing user attributes in HTML
//print '<ul>';
//do {
//    echo "<tr>";
//    echo "<td>" . $tuple[0] . "</td>";
//    echo "<td>" . $tuple[1] . "</td>";
//    echo "<td>" . $tuple[2] . "</td>";
//    echo "<td>" . $tuple[3] . "</td>";
//    echo "<td>" . $tuple[4] . "</td>";
//    echo "</tr>";
//} while($tuple = mysqli_fetch_array($result));
//echo "</table>";
//print '</ul>';

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?>