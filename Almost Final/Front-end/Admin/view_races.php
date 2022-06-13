<?php

$conn = mysqli_connect("localhost", "root", "", "tw");


if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

$sql = " SELECT * FROM races ORDER BY id ASC ";

$result = $conn->query($sql);

$conn->close();

?>


<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>

<html lang="en">
 
<head>

    <meta charset="UTF-8">

    <title>View Races from Admin</title>

    <!-- CSS FOR STYLING THE PAGE -->

    <style>

        table {

            margin: 0 auto;

            font-size: large;

            border: 1px solid black;

        }
 

        h1 {

            text-align: center;

            color: #006600;

            font-size: xx-large;

            font-family: 'Gill Sans', 'Gill Sans MT',

            ' Calibri', 'Trebuchet MS', 'sans-serif';

        }
 

        td {

            background-color: #E4F5D4;

            border: 1px solid black;

        }
 

        th,

        td {

            font-weight: bold;

            border: 1px solid black;

            padding: 10px;

            text-align: center;

        }
 

        td {

            font-weight: lighter;

        }

    </style>
</head>
 
<body>

    <section>

        <h1>Raport HTML</h1>

        <!-- TABLE CONSTRUCTION -->

        <table>

            <tr>

                <th>ID</th>

                <th>Race</th>

                <th>Name1</th>

                <th>Name2</th>

                <th>Odd 1</th>

                <th>Odd 2</th>

                <th>Date</th>

                <th>Winner</th>

            </tr>

            <!-- PHP CODE TO FETCH DATA FROM ROWS -->

            <?php 

                // LOOP TILL END OF DATA

                while($rows=$result->fetch_assoc())

                {

            ?>

            <tr>

                <!-- FETCHING DATA FROM EACH

                    ROW OF EVERY COLUMN -->

                <td><?php echo $rows['id'];?></td>

                <td><?php echo $rows['race'];?></td>

                <td><?php echo $rows['name1'];?></td>

                <td><?php echo $rows['name2'];?></td>

                <td><?php echo $rows['odd_1'];?></td>

                <td><?php echo $rows['odd_2'];?></td>

                <td><?php echo $rows['date'];?></td>

                <td><?php echo $rows['winner'];?></td>

            </tr>

            <?php

                }

            ?>

        </table>

    </section>
</body>
 
</html>