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
$name = $_REQUEST['char']or die("You do not input, please go back and input a name!");
//$user = "Jinbe";

//if (preg_match("/[a-zA-Z]/",$age)) {
//    die("Your input age is invalid, please go back and input a valid number!");
//}
//
//if (preg_match("/[a-zA-Z]/",$height)) {
//    die("Your input height is invalid, please go back and input a valid number!");
//}

// Get the attributes of the user with the given username
$query1 = "SELECT * FROM Friends WHERE charname1 = '$name'";
$query2 = "SELECT * FROM Friends WHERE charname2 = '$name'";
$result1 = mysqli_query($dbcon, $query1)
or die('Query failed: ' . mysqli_error($dbcon));
$result2 = mysqli_query($dbcon, $query2)
or die('Query failed: ' . mysqli_error($dbcon));

// Can also check that there is only one tuple in the result
$tuple1 = mysqli_fetch_array($result1);
$tuple2 = mysqli_fetch_array($result2);
if (empty($tuple1) && empty($tuple2)){
    echo "$name does not have friends! <br>";
} else {

    print "The friends of $name are the following :<br><br>";

    echo "<table border='1'>
    <tr>
    <th>Name</th>
   
    </tr>";

//// Printing user attributes in HTML
////print '<ul>';
    if (!empty($tuple1)) {
        echo "<tr>";
        echo "<td>" . "<a href='$link$tuple1[1]'>$tuple1[1]</a>" . "</td>";
////echo "<td>" . $tuple[1] . "</td>";
////echo "<td>" . $tuple[2] . "</td>";
//echo "<td>" . $tuple[3] . "</td>";
//echo "<td>" . $tuple[4] . "</td>";
        echo "</tr>";
    }

    while ($tuple1 = mysqli_fetch_array($result1)) {
        echo "<tr>";
        echo "<td>" . "<a href='$link$tuple1[1]'>$tuple1[1]</a>" . "</td>";
//    echo "<td>" . $tuple[1] . "</td>";
//    echo "<td>" . $tuple[2] . "</td>";
//        echo "<td>" . $tuple[3] . "</td>";
//        echo "<td>" . $tuple[4] . "</td>";
        echo "</tr>";
    }

    if (!empty($tuple2)) {
        echo "<tr>";
        echo "<td>" . "<a href='$link$tuple2[0]'>$tuple2[0]</a>" . "</td>";
////echo "<td>" . $tuple[1] . "</td>";
////echo "<td>" . $tuple[2] . "</td>";
//echo "<td>" . $tuple[3] . "</td>";
//echo "<td>" . $tuple[4] . "</td>";
        echo "</tr>";
    }

    while ($tuple2 = mysqli_fetch_array($result2)) {
        echo "<tr>";
        echo "<td>" . "<a href='$link$tuple2[0]'>$tuple2[0]</a>" . "</td>";
//    echo "<td>" . $tuple[1] . "</td>";
//    echo "<td>" . $tuple[2] . "</td>";
//        echo "<td>" . $tuple[3] . "</td>";
//        echo "<td>" . $tuple[4] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}

echo "<br><br>";




$query1 = "SELECT * FROM Enemies WHERE charname1 = '$name'";
$query2 = "SELECT * FROM Enemies WHERE charname2 = '$name'";
$result1 = mysqli_query($dbcon, $query1)
or die('Query failed: ' . mysqli_error($dbcon));
$result2 = mysqli_query($dbcon, $query2)
or die('Query failed: ' . mysqli_error($dbcon));

// Can also check that there is only one tuple in the result
$tuple1 = mysqli_fetch_array($result1);
$tuple2 = mysqli_fetch_array($result2);

if (empty($tuple1) && empty($tuple2)){
    echo "$name does not have enemies! <br>";
} else {

    print "The enemies of $name are the following :<br><br>";

    echo "<table border='1'>
    <tr>
    <th>Name</th>
   
    </tr>";

//// Printing user attributes in HTML
////print '<ul>';
    if (!empty($tuple1)) {
        echo "<tr>";
        echo "<td>" . "<a href='$link$tuple1[1]'>$tuple1[1]</a>" . "</td>";
////echo "<td>" . $tuple[1] . "</td>";
////echo "<td>" . $tuple[2] . "</td>";
//echo "<td>" . $tuple[3] . "</td>";
//echo "<td>" . $tuple[4] . "</td>";
        echo "</tr>";
    }

    while ($tuple1 = mysqli_fetch_array($result1)) {
        echo "<tr>";
        echo "<td>" . "<a href='$link$tuple1[1]'>$tuple1[1]</a>" . "</td>";
//    echo "<td>" . $tuple[1] . "</td>";
//    echo "<td>" . $tuple[2] . "</td>";
//        echo "<td>" . $tuple[3] . "</td>";
//        echo "<td>" . $tuple[4] . "</td>";
        echo "</tr>";
    }

    if (!empty($tuple2)) {
        echo "<tr>";
        echo "<td>" . "<a href='$link$tuple2[0]'>$tuple2[0]</a>" . "</td>";
////echo "<td>" . $tuple[1] . "</td>";
////echo "<td>" . $tuple[2] . "</td>";
//echo "<td>" . $tuple[3] . "</td>";
//echo "<td>" . $tuple[4] . "</td>";
        echo "</tr>";
    }

    while ($tuple2 = mysqli_fetch_array($result2)) {
        echo "<tr>";
        echo "<td>" . "<a href='$link$tuple2[0]'>$tuple2[0]</a>" . "</td>";
//    echo "<td>" . $tuple[1] . "</td>";
//    echo "<td>" . $tuple[2] . "</td>";
//        echo "<td>" . $tuple[3] . "</td>";
//        echo "<td>" . $tuple[4] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
}
//print '</ul>';

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?>