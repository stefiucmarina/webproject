<?php

$conn = mysqli_connect("localhost", "root", "", "tw");


if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

if (isset($_POST["Signin"])) {


    $email = $_POST['email'];
    $password =  $_POST['password'];


    $error= FALSE;

    if ($password == '' || $email == '')
    {
        echo "All fields must be completed. \n";
        $error = TRUE;
    }

    if($error == FALSE)
    {
        $sql_mail="SELECT * FROM users WHERE email = '$email' AND password = '$password'";

        if (mysqli_num_rows(mysqli_query($conn, $sql_mail)) > 0) {
            echo "Successful login. \n";
            header('Location: ../Races/races.php');
        }
        else
        {
            echo "The information is incorrect. \n";
            $error=TRUE;
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

    <link rel="stylesheet" href="style_login.css">
    <title>Login</title>

</head>

<body>
    <div class="full-page">
        <div class="navbar">
            <nav>
                <div class="logo">
                    <h4>Login</h4>
                </div>

            </nav>
        </div>

        <section>
            <div class="imgBx">
                <img src="login4.jpg" alt="Cat">
            </div>

            <div class="contentBx">
                <div class="formBx">
                    <h2>Your Info</h2>
                    <form method="post" action="">
                        <div class="inputBx">
                            <span>Email</span>
                            <input type="text" name="email">
                        </div>
                        <div class="inputBx">
                            <span>Password</span>
                            <input type="password" name="password">
                        </div>
                        <div class="inputBx">
                            <input type="submit" value="Sign in" name="Signin">
                        </div>
                        <div class="inputBx">
                            <p>Don't have an account? <a href="signup.php">Sign up</a></p>
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