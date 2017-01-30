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



$devilfruit = $_REQUEST['devilfruit']or die("You do not input the name of the devil fruit,
please go back and input it!");


//if (preg_match("/[a-zA-Z]/",$number)) {
//    die("Your input of the number of cadres is invalid, please go back and
//    input a valid number!");
//}
$query = "SELECT * FROM DevilFruit WHERE fruitname LIKE '%$devilfruit%'";
$result = mysqli_query($dbcon, $query)
or die('Query failed: ' . mysqli_error($dbcon));

$tuple = mysqli_fetch_array($result)
or die("None of the devil fruits match your input '$devilfruit' yet!");

$query4 = "SELECT COUNT(*) FROM DevilFruit WHERE fruitname LIKE '%$devilfruit%'";
$result4 = mysqli_query($dbcon, $query4)
or die('Query failed: ' . mysqli_error());
$tuple4 = mysqli_fetch_array($result4);
$num = $tuple4[0];


$query1 = 'select *
from DevilFruit';
$result1 = mysqli_query($dbcon, $query1)
or die('Query failed: ' . mysqli_error());

echo "The devil fruits that match your input '$devilfruit' is: <br/>";
do {
    echo "$tuple[0] <br/>";
    $query2 = "Delete from DevilFruit
                WHERE fruitname = '$tuple[0]'";
    $result2 = mysqli_query($dbcon, $query2)
    or die("There is not a tuple with primary key '$tuple[0]' in the table!");
} while($tuple = mysqli_fetch_array($result));
echo "<br/><br/>";

$query3 = 'select *
from DevilFruit';
$result3 = mysqli_query($dbcon, $query3)
or die('Query failed: ' . mysqli_error());




echo "$num tuple(s) is(are) successfully deleted!<br/><br/>";
echo "The table \"DevilFruit\" before deletion is as below:<br/><br/>";
echo "<table border='1'>
<tr>
<th>Devil Fruit</th>
<th>Catagory</th>
<th>Power</th>
</tr>";
while ($tuple1 = mysqli_fetch_array($result1)) {
    echo "<tr>";
    echo "<td>" . $tuple1[0] . "</td>";
    echo "<td>" . $tuple1[1] . "</td>";
    echo "<td>" . $tuple1[2] . "</td>";
//    echo "<td>" . $tuple[3] . "</td>";
//    echo "<td>" . $tuple[4] . "</td>";
    echo "</tr>";
}
echo "</table>";
echo "<br/>";
echo "<br/>";

echo "After deletion, the table \"DevilFruit\" is as below, you can see the change:<br/><br/>";
echo "<table border='1'>
<tr>
<th>Devil Fruit</th>
<th>Catagory</th>
<th>Power</th>
</tr>";
while ($tuple3 = mysqli_fetch_array($result3)) {
    echo "<tr>";
    echo "<td>" . $tuple3[0] . "</td>";
    echo "<td>" . $tuple3[1] . "</td>";
    echo "<td>" . $tuple3[2] . "</td>";
//    echo "<td>" . $tuple[3] . "</td>";
//    echo "<td>" . $tuple[4] . "</td>";
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
