<?php

session_start();
$email = $_SESSION['user_email']; 

$conn = mysqli_connect("localhost", "root", "", "tw");


if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

$query=mysqli_query($conn,"select * from races ORDER by ID ASC");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "general-data_" . date('Y-m-d') . ".csv";

    $f = fopen('php://memory', 'w');

    $fields = array('ID', 'RACE','ODD1','ODD2','DATE', 'WINNER');
    fputcsv($f, $fields, $delimiter);

    while($row = $query->fetch_assoc()){
        $lineData = array($row['id'], $row['race'],$row['odd_1'],$row['odd_2'], $row['date'], $row['winner']);
        fputcsv($f, $lineData, $delimiter);

    }
    
    fseek($f, 0);
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');

    fpassthru($f);
}

exit;