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



$char_name = $_REQUEST['char_name']or die("You do not input the name of the organization,
please go back and input it!");
$reward = $_REQUEST['reward']or die("You do not input the reward amount,
please go back and input it!");
$age = $_REQUEST['age']or die("You do not input the age,
please go back and input it!");
$height = $_REQUEST['height']or die("You do not input the height,
please go back and input it!");


if (preg_match("/[a-zA-Z]/",$reward)) {
    die("Your input of reward amount is invalid, please go back and 
    input a valid number!");
}
if (preg_match("/[a-zA-Z]/",$age)) {
    die("Your input of age is invalid, please go back and 
    input a valid number!");
}
if (preg_match("/[a-zA-Z]/",$height)) {
    die("Your input of height is invalid, please go back and 
    input a valid number!");
}

if ($reward < 0) {
    die("Your input of reward amount is negative, please go back and 
    input a non-negative number!");
}
if ($age < 0) {
    die("Your input of age is negative, please go back and 
    input a non-negative number!");
}
if ($height < 0) {
    die("Your input of height is negative, please go back and 
    input a non-negative number!");
}

$query1 = "select *
from Characters
WHERE charname = '$char_name'";
$result1 = mysqli_query($dbcon, $query1)
or die('Query failed: ' . mysqli_error());

$tuple1 = mysqli_fetch_array($result1);
if ($tuple1[2] >= $reward){
    die("The original reward amount of this character is $tuple1[2],
    Your input of reward amount is smaller than or equal to the original value, please go back to 
    enter a larger reward amount!");
} else if ($tuple1[3] >= $age){
    die("The original age of this character is $tuple1[3],
    Your input of age is smaller than or equal to the original value, please go back to 
    enter a larger age!");
}



$query2 = "update Characters
set rewardamount = $reward, age = $age, height = $height
WHERE charname = '$char_name'";
$result2 = mysqli_query($dbcon, $query2)
or die("There is already a tuple with primary key '$org' in the table!
Please insert another tuple with different primary keys!");

$query3 = "select *
from Characters
WHERE charname = '$char_name'";
$result3 = mysqli_query($dbcon, $query3)
or die('Query failed: ' . mysqli_error());


echo "One tuple is successfully updated!<br/><br/>";

$link = 'http://onepiece.wikia.com/wiki/';


echo "The tuple in table \"Characters\" before updating is as below:<br/><br/>";
echo "<table border='1'>
<tr>
<th>Character</th>
<th>Gender</th>
<th>Reward Amount</th>
<th>Age</th>
<th>Height</th>
</tr>";
do {
    echo "<tr>";
    echo "<td>" . "<a href='$link$tuple1[0]'>$tuple1[0]</a>" . "</td>";
    echo "<td>" . $tuple1[1] . "</td>";
    echo "<td>" . $tuple1[2] . "</td>";
    echo "<td>" . $tuple1[3] . "</td>";
    echo "<td>" . $tuple1[4] . "</td>";
    echo "</tr>";
} while ($tuple1 = mysqli_fetch_array($result1));
echo "</table>";
echo "<br/>";
echo "<br/>";

echo "After updating, the tuple in table \"Characters\" is as below, you can see the change:<br/><br/>";
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
