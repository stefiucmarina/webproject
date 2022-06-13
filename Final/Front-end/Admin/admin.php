<?php

$conn = mysqli_connect("localhost", "root", "", "tw");


if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

if (isset($_POST["addrace"])) {


    $id =  $_POST['id'];
    $race = $_POST['race'];
    $name1 =  $_POST['name1'];
    $name2 = $_POST['name2'];
    $odd1 = $_POST['odd1'];
    $odd2 = $_POST['odd2'];
    $date = $_POST['date'];
    $winner = $_POST['winner'];


    $error = FALSE;


    if ($id == '' || $race == '' || $name1 == '' || $name2 == '' || $odd1 == '' || $odd2 == '' || $date == '') {
        echo "All fields must be completed. \n";
        $error = TRUE;
    }

    $sql_id = "SELECT * FROM races WHERE id = '$id'";
    if (mysqli_num_rows(mysqli_query($conn, $sql_id)) != 0) {
        echo "ID already used. \n";
        $error = TRUE;
    }


    if ($error == FALSE) {
        $sql = "INSERT INTO races  VALUES ('$id', '$race', '$name1', '$name2','$odd1','$odd2','$date','$winner')";
        if (mysqli_query($conn, $sql)) {
            echo "Race added succsessfully. \n";
        } else {
            echo "Erorr. \n";
        }
    }
}

if (isset($_POST["delrace"])) {


    $id =  $_POST['id'];
    $race = $_POST['race'];
    $name1 =  $_POST['name1'];
    $name2 = $_POST['name2'];
    $odd1 = $_POST['odd1'];
    $odd2 = $_POST['odd2'];
    $date = $_POST['date'];
    $winner = $_POST['winner'];


    $error = FALSE;


    if ($id == '' || $race == '' || $name1 == '' || $name2 == '' || $odd1 == '' || $odd2 == '' || $date == '') {
        echo "All fields must be completed. \n";
        $error = TRUE;
    }

    $sql_id = "SELECT * FROM races WHERE id = '$id' AND race='$race' AND name1='$name1' AND name2='$name2' AND odd_1='$odd1' AND  odd_2='$odd2' AND date= '$date' and winner='$winner' ";
    if (mysqli_num_rows(mysqli_query($conn, $sql_id)) == 0) {
        echo "Race doesn't exist. \n";
        $error = TRUE;
    }


    if ($error == FALSE) {
        $sql = "DELETE FROM races WHERE  id = '$id'";
        if (mysqli_query($conn, $sql)) {
            echo "Race deleted succsessfully. \n";
        } else {
            echo "Erorr. \n";
        }
    }
}

if (isset($_POST["adduser"])) {


    $email =  $_POST['email'];
    $pwd = $_POST['pwd'];
    $fn =  $_POST['fn'];
    $ln = $_POST['ln'];
    $address = $_POST['address'];
    $balance = $_POST['balance'];


    $error = FALSE;


    if ($email == '' || $pwd == '' || $fn == '' || $ln == '' || $address == '' || $balance == '') {
        echo "All fields must be completed. \n";
        $error = TRUE;
    }

    $sql_id = "SELECT * FROM users WHERE email = '$email'";
    if (mysqli_num_rows(mysqli_query($conn, $sql_id)) != 0) {
        echo "This user already exists \n";
        $error = TRUE;
    }


    if ($error == FALSE) {
        $sql = "INSERT INTO users  VALUES ('$email', '$pwd', '$fn', '$ln','$address','$balance')";
        if (mysqli_query($conn, $sql)) {
            echo "User added succsessfully. \n";
        } else {
            echo "Erorr. \n";
        }
    }
}


if (isset($_POST["delluser"])) {


    $email =  $_POST['email'];
    $pwd = $_POST['pwd'];


    $error = FALSE;


    if ($email == '' || $pwd == '') {
        echo "All fields must be completed. \n";
        $error = TRUE;
    }

    $sql_id = "SELECT * FROM users WHERE email = '$email' AND password='$pwd'";
    if (mysqli_num_rows(mysqli_query($conn, $sql_id)) == 0) {
        echo "This user doesn't exists or the password is incorect\n";
        $error = TRUE;
    }


    if ($error == FALSE) {
        $sql = "DELETE FROM users WHERE  email = '$email'";
        if (mysqli_query($conn, $sql)) {
            echo "User deleted succsessfully. \n";
        } else {
            echo "Erorr. \n";
        }
    }
}
if (isset($_POST["modrace"])) {
    $id =  $_POST['id'];
    $winner = $_POST['winner'];


    $error = FALSE;


    if ($winner == '') {
        echo "Please tell us the winner. \n";
        $error = TRUE;
    }

    $sql_id = "SELECT * FROM races WHERE id = '$id'";
    if (mysqli_num_rows(mysqli_query($conn, $sql_id)) == 0) {
        echo "Race doesn't exist. \n";
        $error = TRUE;
    }


    if ($error == FALSE) {
        $sql = "UPDATE races
            SET winner = '$winner'
            WHERE id = '$id' ";
        if (mysqli_query($conn, $sql)) {
            echo "Winner changed in races. ";
        } else {
            echo "Erorr. \n";
        }

        $sql1 = "UPDATE user_race
            SET winner = '$winner',
             outcome = IF(cat='$winner', amount* odd, '0')
            WHERE id = '$id'";

        if (mysqli_query($conn, $sql1)) {
            echo "Winner changed in races. ";
        } else {
            echo "Erorr. \n";
        }

        $sql2 = "SELECT email FROM user_race WHERE id = '$id'";

        $result = mysqli_query($conn, $sql2);

        while ($row = mysqli_fetch_array($result)) {

            $mail = $row['email'];

            // $sql1 = "UPDATE user_race
            // SET winner = '$winner',
            //  outcome = IF(cat='$winner', amount* odd, '0')
            // WHERE id = '$id' AND email='$mail'";

            // if (mysqli_query($conn, $sql1)) {
            //     echo "Winner changed in races and amount updated. ";
            // } else {
            //     echo "Erorr. \n";
            // }

            $sql01 = "SELECT outcome FROM user_race WHERE email ='$mail' AND id = '$id'";

            $result01 = mysqli_query($conn, $sql01);

            $row01 = mysqli_fetch_array($result01);

            $plus_money = $row01['outcome'];

            $sql2 = "UPDATE users
                SET balance= balance+$plus_money
                WHERE email='$mail'";

            if (mysqli_query($conn, $sql2)) {
                echo "Balances updated. ";
            } else {
                echo "Erorr. \n";
            }
        }
    }
}


mysqli_close($conn);
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

    <link rel="stylesheet" href="admin_style.css">
    <title>Admin</title>

</head>

<body>
    <nav>
        <div class="logo">
            <h4>ADMIN</h4>
        </div>
    </nav>

    <div class="content">

        <div class="profile-card">

            <div class="card-header">

                <div class="view-commands">

                    <div class="view-races">
                        <button onclick="location.href='view_races.php'">View Races</button>
                    </div>


                    <div class="view-users">
                        <button onclick="location.href='view_users.php'">View Users</button>
                    </div>

                    <div class="view-feedbacks">
                        <!-- <button>View Feedbacks</button> -->
                        <button onclick="location.href='mailto:CRW_support@gmail.com'">View Messages</button>
                    </div>

                </div>
            </div>

            <div class="card-footer">

                <div class="options">
                    <button onclick="location.href='../Home/home.php'" class="blogout">Logout</button>
                </div>

            </div>
        </div>

        <div class="change-commands">
            <div class="races">
                <h5>Races</h5>
                <div class="add-race">

                    <button onclick="popup('popup')">Add Race</button>
                </div>
                <div class="delete-race">
                    <button onclick="popup('deletepopup')">Delete Race </button>
                </div>
                <div class="modrace">
                    <button onclick="popup('modrace')">Update Race </button>
                </div>
            </div>

            <div class="users">
                <h5>Users</h5>
                <div class="add-user">
                    <button onclick="popup('adduser')">Add User </button>
                </div>
                <div class="delete-user">
                    <button onclick="popup('delluser')">Delete User</button>
                </div>
            </div>


        </div>

    </div>
    <div class="bgd_blurr popup" id="popup">

        <div class="contentBx">
            <div class="formBx">
                <button onclick="popup('popup')">
                    x
                </button>
                <h2>Add Race</h2>
                <form method="post" action="">
                    <div class="inputBx">
                        <span>Id</span>
                        <input name="id" type="text">
                    </div>
                    <div class="inputBx">
                        <span>Race</span>
                        <input name="race" type="text">
                    </div>
                    <div class="inputBx">
                        <span>Name 1</span>
                        <input name="name1" type="text">
                    </div>
                    <div class="inputBx">
                        <span>Name 2</span>
                        <input name="name2" type="text">
                    </div>
                    <div class="inputBx">
                        <span>Odd 1</span>
                        <input name="odd1" type="text">
                    </div>
                    <div class="inputBx">
                        <span>Odd 2</span>
                        <input name="odd2" type="text">
                    </div>
                    <div class="inputBx">
                        <span>Date</span>
                        <input name="date" type="text">
                    </div>
                    <div class="inputBx">
                        <span>Winner</span>
                        <input name="winner" type="text">
                    </div>
                    <div class="inputBx">
                        <input type="submit" value="Add the race" name="addrace">
                    </div>

                </form>

            </div>

        </div>


    </div>

    <div class="bgd_blurr popup" id="deletepopup">

        <div class="contentBx">
            <div class="formBx">
                <button onclick="popup('deletepopup')">
                    x
                </button>
                <h2>Delete Race</h2>
                <form method="post" action="">
                    <div class="inputBx">
                        <span>Id</span>
                        <input name="id" type="text">
                    </div>
                    <div class="inputBx">
                        <span>Race</span>
                        <input name="race" type="text">
                    </div>
                    <div class="inputBx">
                        <span>Name 1</span>
                        <input name="name1" type="text">
                    </div>
                    <div class="inputBx">
                        <span>Name 2</span>
                        <input name="name2" type="text">
                    </div>
                    <div class="inputBx">
                        <span>Odd 1</span>
                        <input name="odd1" type="text">
                    </div>
                    <div class="inputBx">
                        <span>Odd 2</span>
                        <input name="odd2" type="text">
                    </div>
                    <div class="inputBx">
                        <span>Date</span>
                        <input name="date" type="text">
                    </div>
                    <div class="inputBx">
                        <span>Winner</span>
                        <input name="winner" type="text">
                    </div>
                    <div class="inputBx">
                        <input type="submit" value="Delete race" name="delrace">
                    </div>

                </form>

            </div>

        </div>


    </div>

    <div class="bgd_blurr popup" id="adduser">

        <div class="contentBx">
            <div class="formBx">
                <button onclick="popup('adduser')">
                    x
                </button>
                <h2>Add user</h2>
                <form method="post" action="">
                    <div class="inputBx">
                        <span>Email</span>
                        <input name="email" type="text">
                    </div>
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
                        <span>Balance</span>
                        <input name="balance" type="text">
                    </div>
                    <div class="inputBx">
                        <input type="submit" value="Add the user" name="adduser">
                    </div>

                </form>

            </div>

        </div>


    </div>


    <div class="bgd_blurr popup" id="adduser">

        <div class="contentBx">
            <div class="formBx">
                <button onclick="popup('adduser')">
                    x
                </button>
                <h2>Add user</h2>
                <form method="post" action="">
                    <div class="inputBx">
                        <span>Email</span>
                        <input name="email" type="text">
                    </div>
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
                        <span>Balance</span>
                        <input name="balance" type="text">
                    </div>
                    <div class="inputBx">
                        <input type="submit" value="Add the user" name="adduser">
                    </div>

                </form>

            </div>

        </div>


    </div>


    <div class="bgd_blurr popup" id="delluser">

        <div class="contentBx">
            <div class="formBx">
                <button onclick="popup('delluser')">
                    x
                </button>
                <h2>Delete User</h2>
                <form method="post" action="">
                    <div class="inputBx">
                        <span>Email</span>
                        <input name="email" type="text">
                    </div>
                    <div class="inputBx">
                        <span>Password</span>
                        <input name="pwd" type="text">
                    </div>
                    <div class="inputBx">
                        <input type="submit" value="Delete the user" name="delluser">
                    </div>

                </form>

            </div>

        </div>


    </div>

    <div class="bgd_blurr popup" id="modrace">

        <div class="contentBx">
            <div class="formBx">
                <button onclick="popup('modrace')">
                    x
                </button>
                <h2>Who is the winner?</h2>

                <form method="post" action="">
                    <div class="inputBx">
                        <span>Id</span>
                        <input name="id" type="text">
                    </div>
                    <div class="inputBx">
                        <span>Winner</span>
                        <input name="winner" type="text">
                    </div>
                    <div class="inputBx">
                        <input type="submit" value="Modify race" name="modrace">
                    </div>

                </form>

            </div>

        </div>


    </div>


</body>





</html>