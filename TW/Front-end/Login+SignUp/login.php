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
                    <form>
                        <div class="inputBx">
                            <span>Email</span>
                            <input type="text">
                        </div>
                        <div class="inputBx">
                            <span>Password</span>
                            <input type="password">
                        </div>
                        <div class="remember">
                            <label><input type="checkbox">Remember me</label>
                        </div>
                        <div class="inputBx">
                            <input type="button" onclick="location.href='../Races/races.php'" value="Sign in">
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