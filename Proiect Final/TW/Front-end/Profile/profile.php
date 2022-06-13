<?php

session_start();
$email = $_SESSION['user_email'];


$conn = mysqli_connect("localhost", "root", "", "tw");

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

if (isset($_POST["popup"])) {

    $pwd = $_POST['pwd'];
    $fn =  $_POST['fn'];
    $ln = $_POST['ln'];
    $address = $_POST['address'];

    $error = FALSE;


    if ($pwd == '' && $fn == '' && $ln == '' && $address == '') {
        echo "At least one filed must be completed. \n";
        $error = TRUE;
    }

    if ($error == FALSE) {
        
        
        if ($pwd != '') {
            $sql = "UPDATE users
        SET password = '$pwd'
        WHERE email = '$email' ";
            if (mysqli_query($conn, $sql)) {
                echo "Password changed. ";
            } else {
                echo "Erorr. \n";
            }
        }
        if ($fn != '') {
            $sql = "UPDATE users
        SET first_name = '$fn'
        WHERE email = '$email' ";
            if (mysqli_query($conn, $sql)) {
                echo "First name changed. ";
            } else {
                echo "Erorr. \n";
            }
        }
        if ($ln != '') {
            $sql = "UPDATE users
        SET last_name = '$ln'
        WHERE email = '$email' ";
            if (mysqli_query($conn, $sql)) {
                echo "Last Name changed. ";
            } else {
                echo "Erorr. \n";
            }
        }
        if ($address != '') {
            $sql = "UPDATE users
        SET adress = '$address'
        WHERE email = '$email' ";
            if (mysqli_query($conn, $sql)) {
                echo "Address changed. ";
            } else {
                echo "Erorr. \n";
            }
        }
    }
}

?>



<!DOCTYPE html>
<html Lang="en">
<script src="admin.js"></script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="profile_style.css">
    <title>Profile</title>

</head>

<body>
    <nav>
        <div class="logo">
            <h4>PROFILE</h4>
        </div>
        <ul class="nav-links">
            <li><a href="../About/about.php">About</a></li>
            <li><a href="../History/history.php">History</a></li>
            <li><a href="../Races/races.php">Races</a></li>
            <li><a href="../Report/report.php">Report</a></li>

        </ul>
        <div class="burger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>

        </div>
    </nav>

    <div class="content">

        <div class="profile-card">

            <div class="card-header">

                <div class="picture">
                    <img src="Users_pics/user.jpg" alt="User">
                </div>

                <div class="personal-info">

                    <?php
                    $sql_user = "SELECT * FROM  users WHERE email = '$email'";
                    $result = $conn->query($sql_user);
                    $row = $result->fetch_assoc();
                    ?>

                    <div class="name">
                        <?php
                        echo $row['first_name'] . ' ' . $row['last_name'];
                        ?>
                    </div>

                    <div class="adress">
                        <?php
                        echo $row['adress'];
                        ?>
                    </div>

                    <div class="mail">
                        <?php
                        echo $email;
                        ?>
                    </div>

                </div>
            </div>

            <div class="card-footer">

                <div class="options">

                    <button onclick="popup('popup')" class="bedit">Edit</button>

                    <button onclick="location.href='../Home/home.php'" class="blogout">Logout</button>
                    <a class="bsupport" href="mailto:CRW_support@gmail.com">Support</a>
                    <!-- <button class="bsupport">Support</button> -->
                </div>

            </div>
        </div>

        <div class="info">
            <?php
            $query = mysqli_query($conn, "select * from user_race where email='$email'");
            $count = mysqli_num_rows($query);
            if ($count == "0") {
                echo "<h2> No records found! </h2>";
            } else {
            ?>

                <div class="races">

                    <h5>My Races</h5>

                    <table border="1" id="matches">
                        <tr>
                            <th>ID</th>
                            <th>Race</th>
                            <th>Date</th>
                            <th>Winner</th>
                            <th>Outcome</th>
                        </tr>


                        <?php
                        while ($row = mysqli_fetch_array($query)) {
                            echo "<tr><td>{$row["id"]}</td><td>{$row["race"]}</td><td>
                                {$row["date1"]}</td><td>{$row["winner"]}</td><td>{$row["outcome"]}</td>
                                </tr>\n";
                        }

                        ?>

                    </table>
                </div>

            <?php

            }
            ?>

            <div class="download">

                <h5>Download Raport</h5>
                <ul>
                    <li>
                        <button onclick="location.href='exportData.php'">CSV</button>
                        <button onclick="location.href='html.php'">HTML</button>
                        <button onclick="location.href='markdown.php'">Markdown</button>
                        <button onclick="location.href='dbxml.php'">XML</button>
                    </li>
                </ul>
            </div>
            <div class="balance">
                <h5>Balance</h5>
                <form method="post">
                    <input type="number" id="input_money" name="input_money">
                    <input type="submit" id="btn_submit" name="btn_submit" value="Go!">
                </form>

                <?php

                if (isset($_POST["btn_submit"])) {


                    $balance_add =  $_POST['input_money'];

                    $error = FALSE;

                    if ($balance_add == '') {
                        echo "Please give us your money! ";
                        $error = TRUE;
                    }

                    if ($error == FALSE) {
                        $sql = "UPDATE users
                        SET balance = balance + $balance_add
                        WHERE email = '$email'";
                        if (mysqli_query($conn, $sql)) {
                            echo "Money Added. ";
                            $balance_add = 0;
                            echo "<br>";
                        } else {
                            echo "Erorr. \n";
                        }
                    }
                }

                $sql_all = "SELECT balance FROM  users WHERE email = '$email'";
                $result = $conn->query($sql_all);
                $row = $result->fetch_assoc();
                echo "Total balance: ";
                echo $row['balance'];


                ?>
            </div>
        </div>

    </div>


    <div class="bgd_blurr popup" id="popup">

        <div class="contentBx">
            <div class="formBx">
                <button onclick="popup('popup')">
                    x
                </button>
                <h2>What do you want to change?</h2>
                <form method="post" action="">
                    <div class="inputBx">
                        <span>Password</span>
                        <input name="pwd" type="text">
                    </div>
                    <div class="inputBx">
                        <span>First Name</span>
                        <input name="fn" type="text">
                    </div>
                    <div class="inputBx">
                        <span>Last Name</span>
                        <input name="ln" type="text">
                    </div>
                    <div class="inputBx">
                        <span>Address</span>
                        <input name="address" type="text">
                    </div>
                   
                    <div class="inputBx">
                        <input type="submit" value="Save" name="popup">
                    </div>

                </form>

            </div>



        </div>
    </div>

    <script src="app.js">
    </script>
</body>

</html>