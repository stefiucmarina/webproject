<?php
error_reporting(-1);
$reg = @$_POST['reg'];
session_start();
$email = $_SESSION['user_email'];



$conn = mysqli_connect("localhost", "root", "", "tw");


if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

?>



<!DOCTYPE html>
<html Lang="en">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="races_style.css">
    <title>Races</title>

</head>

<body>
    <nav>
        <div class="logo">
            <h4>RACES</h4>
        </div>
        <ul class="nav-links">
            <li><a href="../About/about.php">About</a></li>
            <li><a href="../Profile/profile.php">Profile</a></li>
            <li><a href="../History/history.php">History</a></li>
            <li><a href="../Report/report.php">Report</a></li>

        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>

        </div>
    </nav>

    <div class="content">

        <form class="form_date" method="post" autocomplete="off">
            <!-- <label for="match_day">Choose a date:</label>
            <input type="date" id="match_day" name="match_day"> -->
            <input class="bsubmit" type="submit" name="Search" value="Show current matches">
            <?php


            if (isset($_POST["Search"])) {
                // $selecttxt = $_POST["match_day"];
                $query = mysqli_query($conn, "select * from races where date between CURDATE() and '2022-12-31'");
                $count = mysqli_num_rows($query);
                if ($count == "0") {
                    echo "<h2> No records found! </h2>";
                } else {
            ?>
                    <div class="races">

                        <table border="1" id="matches">
                            <tr>
                                <th>ID</th>
                                <th>Race</th>
                                <th>Odd1</th>
                                <th>Odd2</th>
                                <th>Date</th>
                                <th>Winner</th>
                            </tr>

                        <?php
                        while ($row = mysqli_fetch_array($query)) {
                            echo "<tr><td>{$row["id"]}</td><td>{$row["race"]}</td>
                            <td>{$row["odd_1"]}</td><td>{$row["odd_2"]}</td>
                            <td>{$row["date"]}</td><td>{$row["winner"]}</td>
                                </tr>\n";
                        }
                    }


                        ?>

                        </table>
                    </div>

                <?php
            }
                ?>
        </form>

        <div class="info">
            <h5>Place your bet</h5>
            <form class="ticket" method="post">
                <label for="code">Race ID:</label><br>
                <input type="text" id="code" name="code"><br>
                <label for="cat">Cat:</label><br>
                <input type="text" id="cat" name="cat"><br>
                <label for="odd">Odd: </label><br>
                <input type="text" id="odd" name="odd"><br><br>
                <label for="money">Amount ($): </label><br>
                <input type="number" id="money" name="money"><br><br>
                <input type="submit" value="Bet now!" name="Bet">

                <?php

                if (isset($_POST['Bet'])) {

                    $race_id = $_POST['code'];
                    $race_cat = $_POST['cat'];
                    $race_amount = $_POST['money'];
                    $race_odd = $_POST['odd'];

                    $error = FALSE;

                    if ($race_id == '' || $race_cat == '' || $race_amount == '') {
                        echo "All fields must be completed. \n";
                        $error = TRUE;
                    }

                    if ($error == FALSE) {
                        $sql_id = "SELECT * FROM races WHERE id = '$race_id' AND winner = '-'";

                        if (mysqli_num_rows(mysqli_query($conn, $sql_id)) == 0) {
                            echo "ID not valid or Race already ended. \n";
                            $error = TRUE;
                        }
                    }

                    if ($error == FALSE) {
                        $sql_cat = "SELECT * FROM races WHERE (name1 = '$race_cat' OR name2 = '$race_cat') AND id = '$race_id'";

                        if (mysqli_num_rows(mysqli_query($conn, $sql_cat)) == 0) {
                            echo "Wrong cat. \n";
                            $error = TRUE;
                        }


                    }


                    if ($error == FALSE) {
                        $sql_amount = "SELECT balance FROM  users WHERE email = '$email'";
                        $result = $conn->query($sql_amount);
                        $row = $result->fetch_assoc();

                        if ($row['balance'] < $race_amount) {
                            echo "Not enough balance. \n";
                            $error = TRUE;
                        }
                    }

                    if ($error == FALSE) {
                        $sql_race = "SELECT * FROM races where id='$race_id'";

                        $res = $conn->query($sql_race);
                        $row_race = $res->fetch_assoc();

                        $name_race = $row_race['race'];
                        $date_race = $row_race['date'];

                        $sql_user_race = "INSERT INTO user_race VALUES('$race_id' ,'$email', '$name_race', '$date_race',' ','0',$race_amount,'$race_cat',$race_odd)";

                        $sql_email_select = "SELECT * FROM user_race WHERE email='$email' AND id='$race_id'";

                        if (mysqli_query($conn, $sql_user_race)) {
                            // echo "New record created successfully. ";
                        } else {
                            echo "Error: " . $sql_user_race . "<br>" . mysqli_error($conn);
                        }

                        if (mysqli_num_rows(mysqli_query($conn, $sql_email_select)) == 0) {
                            echo "Insert error. ";
                            $error = TRUE;
                        }
                    }


                    if ($error == FALSE) {

                        $sql_user_old = "SELECT balance FROM users where email='$email'";

                        $result_old = $conn->query($sql_user_old);
                        $row_old = $result_old->fetch_assoc();

                        $balancey = $row_old['balance'] - $race_amount;

                        $sql_update = "UPDATE users SET balance='$balancey' WHERE email='$email'";

                        if (mysqli_query($conn, $sql_update)) {
                            // echo "Update successful. ";
                        } else {
                            echo "No update. ";
                            $error = TRUE;
                        }
                    }

                    if ($error == FALSE) {
                        echo "Success. \n";
                    } else {
                        echo "Fail. \n";
                    }
                }
                ?>
            </form>

        </div>

    </div>


    <script src="app.js"></script>
</body>





</html>