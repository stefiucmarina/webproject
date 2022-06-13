<?php


$table = 'races';


$conn = mysqli_connect("localhost", "root", "", "tw");

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

$query = $conn->query("SELECT * FROM $table");


echo "# $table";
echo "<br>";
echo "| ID | Race | Name1 | Name2 | Odd1 | Odd2 | Date | Winner |";
echo "<br>";
echo "| --- | ---  | --- | --- | --- | --- | --- | --- |";
echo "<br>";

while ($row = $query->fetch_assoc()) {
    echo "| " . $row['id'] . " | " . $row['race'] . " | " . $row['name1'] . " | " . $row['name2'] . " | " 
    . $row['odd_1'] . " | " . $row['odd_2'] . " | " . $row['date'] . " | " . $row['winner']. " |";
    echo "<br>";
}
