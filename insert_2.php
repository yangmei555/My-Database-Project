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



$eventname = $_REQUEST['eventname']or die("You do not input the name of the organization,
please go back and input it!");
$length = $_REQUEST['length']or die("You do not input the leader of the organization,
please go back and input it!");
$enemy = "Charlotte Linlin";

if (preg_match("/[a-zA-Z]/",$length)) {
    die("Your input of the length is invalid, please go back and 
    input a valid number!");
}

$query1 = 'select *
from BigEvent';
$result1 = mysqli_query($dbcon, $query1)
or die('Query failed: ' . mysqli_error());

$query2 = "INSERT INTO BigEvent
VALUES
('$eventname','$length','$enemy')";
$result2 = mysqli_query($dbcon, $query2)
or die("There is already a tuple with primary key '$eventname' in the table!
Please insert another tuple with different primary keys!");

$query3 = 'select *
from BigEvent';
$result3 = mysqli_query($dbcon, $query3)
or die('Query failed: ' . mysqli_error());

$link = 'http://onepiece.wikia.com/wiki/';

echo "One tuple is successfully added!<br/><br/>";
echo "The table \"BigEvent\" before insertion is as below:<br/><br/>";
echo "<table border='1'>
<tr>
<th>Event Name</th>
<th>Length</th>
<th>Biggest Enemy</th>
</tr>";
while ($tuple1 = mysqli_fetch_array($result1)) {
    echo "<tr>";
    echo "<td>" . $tuple1[0] . "</td>";
    echo "<td>" . $tuple1[1] . "</td>";
    echo "<td>" . "<a href='$link$tuple1[2]'>$tuple1[2]</a>" . "</td>";
//    echo "<td>" . $tuple[3] . "</td>";
//    echo "<td>" . $tuple[4] . "</td>";
    echo "</tr>";
}
echo "</table>";
echo "<br/>";
echo "<br/>";

echo "After insertion, the table \"BigEvent\" is as below, you can see the change:<br/><br/>";
echo "<table border='1'>
<tr>
<th>Event Name</th>
<th>Length</th>
<th>Biggest Enemy</th>
</tr>";
while ($tuple3 = mysqli_fetch_array($result3)) {
    echo "<tr>";
    echo "<td>" . $tuple3[0] . "</td>";
    echo "<td>" . $tuple3[1] . "</td>";
    echo "<td>" . "<a href='$link$tuple3[2]'>$tuple3[2]</a>" . "</td>";
//    echo "<td>" . $tuple[3] . "</td>";
//    echo "<td>" . $tuple[4] . "</td>";
    echo "</tr>";
}
echo "</table>";
echo "<br/>";
echo "<br/>";

?>
