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
$loc = $_REQUEST['location']or die("You do not input, please go back and input a valid number!");
//$user = "Jinbe";
$link = 'http://onepiece.wikia.com/wiki/';

//empty($_POST["char"])) or die("Please");
//if (preg_match("/[a-zA-Z]/",$num)) {
//    die("Your input is invalid, please go back and input a valid number!");
//}

// Get the attributes of the user with the given username
$query = "SELECT * FROM HasBeenTo WHERE Locations LIKE '%$loc%'";
$result = mysqli_query($dbcon, $query)
or die('Query failed: ' . mysqli_error($dbcon));

// Can also check that there is only one tuple in the result
$tuple = mysqli_fetch_array($result)
or die("No one has been to Location $loc yet!");

$query2 = "SELECT DISTINCT Locations FROM HasBeenTo WHERE Locations LIKE '%$loc%'";
$result2 = mysqli_query($dbcon, $query2);
$loc_full = mysqli_fetch_array($result2);
//print "The Characters who have been to ";
do {
    print "The Characters who have been to <b>$loc_full[0]</b> are the following :<br><br> ";
    $query3 = "SELECT * FROM HasBeenTo WHERE Locations = '$loc_full[0]'";
    $result3 = mysqli_query($dbcon, $query3);

    echo "<table border='1'>
<tr>
<th>Name</th>
<th>Location</th>
</tr>";
    while ($tuple3 = mysqli_fetch_array($result3)) {
        echo "<tr>";
        echo "<td>" . "<a href='$link$tuple3[0]'>$tuple3[0]</a>" . "</td>";
        echo "<td>" . $tuple3[1] . "</td>";
//    echo "<td>" . $tuple[2] . "</td>";
//    echo "<td>" . $tuple[3] . "</td>";
//    echo "<td>" . $tuple[4] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
    echo "<br/>";
    echo "<br/>";
} while ($loc_full = mysqli_fetch_array($result2));
//print " are the following :<br><br>";

//echo "<table border='1'>
//<tr>
//<th>Name</th>
//<th>Location</th>
//</tr>";
//
//// Printing user attributes in HTML
////print '<ul>';
//echo "<tr>";
//echo "<td>" . $tuple[0] . "</td>";
//echo "<td>" . $tuple[1] . "</td>";
////echo "<td>" . $tuple[2] . "</td>";
////echo "<td>" . $tuple[3] . "</td>";
////echo "<td>" . $tuple[4] . "</td>";
//echo "</tr>";
//
//while ($tuple = mysqli_fetch_array($result)) {
//    echo "<tr>";
//    echo "<td>" . $tuple[0] . "</td>";
//    echo "<td>" . $tuple[1] . "</td>";
////    echo "<td>" . $tuple[2] . "</td>";
////    echo "<td>" . $tuple[3] . "</td>";
////    echo "<td>" . $tuple[4] . "</td>";
//    echo "</tr>";
//}
//echo "</table>";
//
//
//echo "</table>";
//print '</ul>';

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?>