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



$locname = $_REQUEST['locname']or die("You do not input the name of the organization,
please go back and input it!");
$area = $_REQUEST['area']or die("You do not input the leader of the organization,
please go back and input it!");


if (preg_match("/[a-zA-Z]/",$area)) {
    die("Your input of the number of cadres is invalid, please go back and 
    input a valid number!");
}

$query1 = "select *
from Location
WHERE locname = '$locname'";
$result1 = mysqli_query($dbcon, $query1)
or die('Query failed: ' . mysqli_error());

$query2 = "update Location
set locrange = $area
WHERE locname = '$locname'";
$result2 = mysqli_query($dbcon, $query2)
or die("There is already a tuple with primary key '$org' in the table!
Please insert another tuple with different primary keys!");

$query3 = "select *
from Location
WHERE locname = '$locname'";
$result3 = mysqli_query($dbcon, $query3)
or die('Query failed: ' . mysqli_error());


echo "One tuple is successfully updated!<br/><br/>";


echo "The tuple in table \"Location\" before updating is as below:<br/><br/>";
echo "<table border='1'>
<tr>
<th>Location</th>
<th>Area</th>
</tr>";
while ($tuple1 = mysqli_fetch_array($result1)) {
    echo "<tr>";
    echo "<td>" . $tuple1[0] . "</td>";
    echo "<td>" . $tuple1[1] . "</td>";
//    echo "<td>" . $tuple1[2] . "</td>";
//    echo "<td>" . $tuple[3] . "</td>";
//    echo "<td>" . $tuple[4] . "</td>";
    echo "</tr>";
}
echo "</table>";
echo "<br/>";
echo "<br/>";

echo "After updating, the tuple in table \"Location\" is as below, you can see the change:<br/><br/>";
echo "<table border='1'>
<tr>
<th>Location</th>
<th>Area</th>
</tr>";
while ($tuple3 = mysqli_fetch_array($result3)) {
    echo "<tr>";
    echo "<td>" . $tuple3[0] . "</td>";
    echo "<td>" . $tuple3[1] . "</td>";
 //   echo "<td>" . $tuple3[2] . "</td>";
//    echo "<td>" . $tuple[3] . "</td>";
//    echo "<td>" . $tuple[4] . "</td>";
    echo "</tr>";
}
echo "</table>";
echo "<br/>";
echo "<br/>";

?>
