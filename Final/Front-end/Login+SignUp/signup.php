<?php

$conn = mysqli_connect("localhost", "root", "", "tw");


if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

if (isset($_POST["Register"])) {


    $first_name =  $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password =  $_POST['password'];
    $adress = $_POST['adress'];
    $email = $_POST['email'];
    $pass_conf = $_POST['confirm_pass'];


    $error= FALSE;

    if ($first_name == '' || $last_name == '' || $password == '' || $adress == '' || $email == '' || $pass_conf == '' )
    {
        echo "All fields must be completed. \n";
        $error = TRUE;
    }

    if($error == FALSE && $password !== $pass_conf)
    {
        echo "Passwords don't match. \n";
        $error = TRUE;
    }

    if($error == FALSE)
    {
        $sql_mail="SELECT * FROM users WHERE email = '$email'";

        if (mysqli_num_rows(mysqli_query($conn, $sql_mail)) > 0) {
            echo "The email is already taken. \n";
            $error=TRUE;
        }
    }

    if($error ==FALSE)
    {
        $sql = "INSERT INTO users  VALUES ('$email', '$password', '$first_name', '$last_name','$adress')";
        if (mysqli_query($conn, $sql)) {
            echo "Successful registration. \n";
            header('Location: ../Races/races.php');
        } else {
            echo "Erorr. \n";
        }
    }
}


mysqli_close($conn);
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

    <link rel="stylesheet" href="style_signup.css">
    <title>Sign Up</title>

</head>

<body>
    <div class="full-page">
        <div class="navbar">
            <nav>
                <div class="logo">
                    <h4>Sign Up</h4>
                </div>


            </nav>
        </div>

        <section>
            <div class="imgBx">
                <img src="login4.jpg" alt="Cat">
            </div>

            <div class="contentBx">
                <div class="formBx">
                    <h2>Your info</h2>
                    <form method="post" action="">
                        <div class="inputBx">
                            <span>First Name</span>
                            <input name="first_name" type="text">
                        </div>
                        <div class="inputBx">
                            <span>Last Name</span>
                            <input name="last_name" type="text">
                        </div>
                        <div class="inputBx">
                            <span>Email</span>
                            <input name="email" type="text">
                        </div>
                        <div class="inputBx">
                            <span>Adress</span>
                            <input name="adress" type="text" placeholder="Country, County, City">
                        </div>
                        <div class="inputBx">
                            <span>Password</span>
                            <input name="password" type="password">
                        </div>
                        <div class="inputBx">
                            <span>Confirm Password</span>
                            <input name="confirm_pass" type="password">
                        </div>
                        <div class="inputBx">
                            <input type="submit" value="Register" name="Register">
                        </div>
                        <div class="inputBx">
                            <p>Already have an account? <a href="login.php">Login</a></p>
                            <p>Click here to return to <a href="../Home/home.php">Home</a> page.</p>
                        </div>
                    </form>

                </div>

            </div>
        </section>


    </div>

    <script src="app.js"></script>
</body>

</html>