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
                <div class="formBx" >
                    <h2>Your info</h2>
                    <form action="../../Backend/Signup/process_signup.php" method="post">
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
                            <input name="adress" type="text">
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
                            <input type="submit" value="Register">
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