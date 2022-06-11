<?php

session_start();
$email = $_SESSION['user_email'];

include_once 'dbConfig.php';

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
                    <img src="Users_pics/user_01.jpg" alt="User">
                </div>

                <div class="personal-info">

                    <div class="name">
                        Jane Doe
                    </div>

                    <div class="adress">
                        Portland, Oregon
                    </div>

                    <div class="mail">
                        jane.doe@gmail.com
                    </div>

                </div>
            </div>

            <div class="card-footer">

                <div class="options">

                    <button class="bedit">Edit</button>

                    <button onclick="location.href='../Home/home.php'" class="blogout">Logout</button>

                    <a class="bsupport" href="mailto:CRW_support@gmail.com">Support</a>
                    <!-- <button class="bsupport">Support</button> -->
                </div>

            </div>
        </div>

        <div class="info">
            <?php
            $conn = mysqli_connect("localhost", "root", "", "tw");

            // Check connection
            if ($conn === false) {
                die("ERROR: Could not connect. "
                    . mysqli_connect_error());
            }
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
                                {$row["date"]}</td><td>{$row["winner"]}</td><td>{$row["outcome"]}</td>
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
                        <button>Markdown</button>
                        <button onclick="location.href='dbxml.php'">XML</button>
                    </li>
                </ul>
            </div>
            <div class="balance">
                <h5>Balance</h5>
                <p>400 $</p>
                <button onClick="OpenNewWindow()">Add Money</button>
            </div>
        </div>

    </div>


    <script type="text/javascript">
        function OpenNewWindow() {
            window.open('', 'windowname', 'height=200,width=400,scrollbars=yes');
        }

    </script>



    <script src="app.js">
    </script>
</body>

</html>