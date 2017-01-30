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



$age = $_REQUEST['age']or die("You do not input the age,
please go back and input it!");
$height = $_REQUEST['height']or die("You do not input the height,
please go back and input it!");

if (preg_match("/[a-zA-Z]/",$age)) {
    die("Your input of the age is invalid, please go back and
    input a valid number!");
}
if (preg_match("/[a-zA-Z]/",$height)) {
    die("Your input of the height is invalid, please go back and
    input a valid number!");
}
if ($age < 0) {
    die("Your input of the age is a negative number, but age can not be negative,
    please go back and input a non-negative number!");
}
if ($height < 0) {
    die("Your input of the height is a negative number, but height can not be negative, 
    please go back and input a non-negative number!");
}


$query = "SELECT * FROM Characters WHERE age > $age AND height < $height";
$result = mysqli_query($dbcon, $query)
or die('Query failed: ' . mysqli_error($dbcon));

$tuple = mysqli_fetch_array($result)
or die("There are no characters whose age is above '$age' and height is below '$height'!
       Please go back to input the age and height again!");

$query4 = "SELECT COUNT(*) FROM Characters WHERE age > $age AND height < $height";
$result4 = mysqli_query($dbcon, $query4)
or die('Query failed: ' . mysqli_error());
$tuple4 = mysqli_fetch_array($result4);
$num = $tuple4[0];


$query1 = 'select *
from Characters';
$result1 = mysqli_query($dbcon, $query1)
or die('Query failed: ' . mysqli_error());

echo "The character(s) whose age is above '$age' and height is below '$height' is: <br/>";
do {
    echo "$tuple[0] <br/>";
    $query2 = "Delete from Characters
                WHERE charname = '$tuple[0]'";
    $result2 = mysqli_query($dbcon, $query2)
    or die("There is not a tuple with primary key '$tuple[0]' in the table!");
} while($tuple = mysqli_fetch_array($result));
echo "<br/><br/>";

$query3 = 'select *
from Characters';
$result3 = mysqli_query($dbcon, $query3)
or die('Query failed: ' . mysqli_error());


$link = 'http://onepiece.wikia.com/wiki/';


echo "$num tuple(s) is(are) successfully deleted!<br/><br/>";
echo "The table \"Characters\" before deletion is as below:<br/><br/>";
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

echo "After deletion, the table \"Characters\" is as below, you can see the change:<br/><br/>";
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

$query3 = 'select *
from DevilFruit';
$result3 = mysqli_query($dbcon, $query3)
or die('Query failed: ' . mysqli_error());
$tuple3 = mysqli_fetch_array($result3)
or die("Now there are no tuples in table 'DevilFruit'!<br/><br/><br/><br/><br/><br/><br/><br/><br/>");
?>
