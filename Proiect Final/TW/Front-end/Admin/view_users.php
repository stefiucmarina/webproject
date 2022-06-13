<?php

$conn = mysqli_connect("localhost", "root", "", "tw");


if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

$sql = " SELECT * FROM users";

$result = $conn->query($sql);

$conn->close();

?>


<!-- HTML code to display data in tabular format -->
<!DOCTYPE html>

<html lang="en">
 
<head>

    <meta charset="UTF-8">

    <title>View Users from Admin</title>

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

                <th>Email</th>

                <th>Password</th>

                <th>First name</th>

                <th>Last name</th>

                <th>Address</th>

                <th>Balance</th>

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

                <td><?php echo $rows['email'];?></td>

                <td><?php echo $rows['password'];?></td>

                <td><?php echo $rows['first_name'];?></td>

                <td><?php echo $rows['last_name'];?></td>

                <td><?php echo $rows['adress'];?></td>

                <td><?php echo $rows['balance'];?></td>

            </tr>

            <?php

                }

            ?>

        </table>

    </section>
</body>
 
</html>