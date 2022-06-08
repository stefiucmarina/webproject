<!DOCTYPE html>
<html Lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="history_style.css">
    <title>History</title>

</head>

<body>
    <nav>
        <div class="logo">
            <h4>HISTORY</h4>
        </div>
        <ul class="nav-links">
            <li><a href="../About/about.php">About</a></li>
            <li><a href="../Profile/profile.php">Profile</a></li>
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

        <form class="form_date">
            <label for="match_day">Choose a date:</label>
            <input type="date" id="match_day" name="match_day">
            <input class="bsubmit" type="submit">
        </form>

        <div class="races">
            <table id="matches">
                <tr>
                    <th>Race</th>
                    <th>Date</th>
                    <th>Winner</th>
                    <th>Outcome</th>
                </tr>
                <tr>
                    <td>Pablo vs. Escobar</td>
                    <td>10.04.2022</td>
                    <td>Pablo</td>
                    <td>+20$</td>
                </tr>
                <tr>
                    <td>Yuki vs. Cookie</td>
                    <td>10.04.2022</td>
                    <td>Cookie</td>
                    <td>-</td>
                </tr>
            </table>
        </div>

        <button onclick="location.href='../Races/races.php'" class="braces">Try your luck now!</button>

    </div>



    <script src="app.js"></script>
</body>





</html>