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



$charname = $_REQUEST['charname']or die("You do not input the primary key,
please go back and input it!");
$gender = $_REQUEST['gender'];
$reward = $_REQUEST['reward'];
$age = $_REQUEST['age'];
$height = $_REQUEST['height'];

if (preg_match("/[a-zA-Z]/",$reward)) {
    die("Your input of the reward amount is invalid, please go back and 
    input a valid number!");
}

if (preg_match("/[a-zA-Z]/",$age)) {
    die("Your input of the age is invalid, please go back and 
    input a valid number!");
}

if (preg_match("/[a-zA-Z]/",$height)) {
    die("Your input of the height is invalid, please go back and 
    input a valid number!");
}

if ($reward < 0) {
    die("Your input of the reward amount is less than 0, please go back and 
    input a non-negative number!");
}

if ($age < 0) {
    die("Your input of the age is less than 0, please go back and 
    input a non-negative number!");
}

if ($height < 0) {
    die("Your input of the height is less than 0, please go back and 
    input a non-negative number!");
}

$query1 = 'select *
from Characters';
$result1 = mysqli_query($dbcon, $query1)
or die('Query failed: ' . mysqli_error());

$query2 = "INSERT INTO Characters
VALUES
('$charname','$gender','$reward', '$age', '$height')";
$result2 = mysqli_query($dbcon, $query2)
or die("There is already a tuple with primary key '$charname' in the table!
Please insert another tuple with different primary keys!");

$query3 = 'select *
from Characters';
$result3 = mysqli_query($dbcon, $query3)
or die('Query failed: ' . mysqli_error());

$link = 'http://onepiece.wikia.com/wiki/';

echo "One tuple is successfully added!<br/><br/>";
echo "The table \"Characters\" before insertion is as below:<br/><br/>";
echo "<table border='1'>
<tr>
<th>Character</th>
<th>Gender</th>
<th>Reward Amount</th>
<th>Age</th>
<th>Height</th>
</tr>";
while ($tuple1 = mysqli_fetch_array($result1)) {
    echo "<tr>";
    echo "<td>" . "<a href='$link$tuple1[0]'>$tuple1[0]</a>" . "</td>";
    echo "<td>" . $tuple1[1] . "</td>";
    echo "<td>" . $tuple1[2] . "</td>";
    echo "<td>" . $tuple1[3] . "</td>";
    echo "<td>" . $tuple1[4] . "</td>";
    echo "</tr>";
}
echo "</table>";
echo "<br/>";
echo "<br/>";

echo "After insertion, the table \"Characters\" is as below, you can see the change:<br/><br/>";
echo "<table border='1'>
<tr>
<th>Character</th>
<th>Gender</th>
<th>Reward Amount</th>
<th>Age</th>
<th>Height</th>
</tr>";
while ($tuple3 = mysqli_fetch_array($result3)) {
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

?>
