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



$charname = $_REQUEST['charname']or die("You do not input,
please go back and input it!");
$orgname = $_REQUEST['orgname']or die("You do not input,
please go back and input it!");



$query1 = "select *
from BelongsTo1
WHERE Characters = '$charname'";
$result1 = mysqli_query($dbcon, $query1)
or die('Query failed: ' . mysqli_error());
$tuple1 = mysqli_fetch_array($result1);

//echo "$tuple1[1]";
//echo "$orgname";
//print "hahaha";

if (strcasecmp($tuple1[1], $orgname) == 0){
    die("Your input information is the same as the orinigal information, please go back to
    select the input again!");
}

//echo $tuple1[1];
//echo "<br/>";
//echo $orgname;
//echo "<br/>";
//print "hahaha";


$query2 = "update BelongsTo1
set Organizations = '$orgname'
WHERE Characters = '$charname'";
$result2 = mysqli_query($dbcon, $query2)
or die("There is already a tuple with primary key '$org' in the table!
Please insert another tuple with different primary keys!");

$query3 = "select *
from BelongsTo1
WHERE Characters = '$charname'";
$result3 = mysqli_query($dbcon, $query3)
or die('Query failed: ' . mysqli_error());

$link = 'http://onepiece.wikia.com/wiki/';

echo "One tuple is successfully updated!<br/><br/>";


echo "The tuple in table \"BelongsTo1\" before updating is as below:<br/><br/>";
echo "<table border='1'>
<tr>
<th>Character</th>
<th>Organization</th>
</tr>";
do {
    echo "<tr>";
    echo "<td>" . "<a href='$link$tuple1[0]'>$tuple1[0]</a>" . "</td>";
    echo "<td>" . $tuple1[1] . "</td>";
//    echo "<td>" . $tuple1[2] . "</td>";
//    echo "<td>" . $tuple[3] . "</td>";
//    echo "<td>" . $tuple[4] . "</td>";
    echo "</tr>";
}while ($tuple1 = mysqli_fetch_array($result1));
echo "</table>";
echo "<br/>";
echo "<br/>";

echo "After updating, the tuple in table \"BelongsTo1\" is as below, you can see the change:<br/><br/>";
echo "<table border='1'>
<tr>
<th>Character</th>
<th>Organization</th>
</tr>";
while ($tuple3 = mysqli_fetch_array($result3)) {
    echo "<tr>";
    echo "<td>" . "<a href='$link$tuple3[0]'>$tuple3[0]</a>" . "</td>";
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
