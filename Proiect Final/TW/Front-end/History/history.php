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

        <form class="form_date" method="post" autocomplete="off">
            <label for="match_day">Choose a date:</label>
            <input type="date" id="match_day" name="match_day">
            <input class="bsubmit" type="submit" name="Search">
            <?php
                $conn = mysqli_connect("localhost", "root", "", "tw");
         
                // Check connection
                if($conn === false){
                    die("ERROR: Could not connect. "
                    . mysqli_connect_error());
                }

                if(isset($_POST["Search"]))
                {
                    $selecttxt=$_POST["match_day"];
                    $query=mysqli_query($conn,"select * from races where date='$selecttxt'");
                    $count=mysqli_num_rows($query);
                    if ($count=="0")
                    {
                        echo "<h2> No records found! </h2>";
                    }
                    else
                    {
                      ?>
                      <div class="races">

                        <table border="1" id="matches">
                        <tr>
                            <th>ID</th>
                            <th>Race</th>
                            <th>Odd 1</th>
                            <th>Odd 2</th>
                            <th>Date</th>
                            <th>Winner</th>
                        </tr>
                      </div>
                      <?php
                      while ($row = mysqli_fetch_array($query))
                      {
                          echo "<tr><td>{$row["id"]}</td>
                          <td>{$row["race"]}</td>
                          <td>{$row["odd_1"]}</td>
                          <td>{$row["odd_2"]}</td>
                          <td>{$row["date"]}</td>
                          <td>{$row["winner"]}</td>
                                </tr>\n";
                                
                      }
                      
                    }
                }
            ?>
        </form>


        
        <!-- <button onclick="location.href='../Races/races.html'" class="braces">Try your luck now!</button> -->
    </div>



    <script src="app.js"></script>
</body>





</html>