<html>

<head>
    <title>
        Process Request
    </title>
</head>

<body>
    <?php
        
        $conn = mysqli_connect("localhost", "root", "", "tw");
         
        // Check connection
        if($conn === false){
             die("ERROR: Could not connect. "
                 . mysqli_connect_error());
        }
          
        // Taking all 5 values from the form data(input)
         $first_name =  $_REQUEST['first_name'];
         $last_name = $_REQUEST['last_name'];
         $password =  $_REQUEST['password'];
         $adress = $_REQUEST['adress'];
         $email = $_REQUEST['email'];
         $pass_conf=$_REQUEST['confirm_pass'];
          
         // Performing insert query execution
         // here our table name is college
         if($password == $pass_conf){
            $sql = "INSERT INTO users  VALUES ('$email', '$password', '$first_name',
                '$last_name','$adress')";
          
            if(mysqli_query($conn, $sql)){
                echo "<h3>data stored in a database successfully."
                    . " Please browse your localhost php my admin"
                    . " to view the updated data</h3>";
  
                echo nl2br("\n$first_name\n $last_name\n "
                    . "$password\n $adress\n $email");
            } else{
                echo "ERROR: Hush! Sorry $sql. "
                    . mysqli_error($conn);
            }
        } else{
            echo "Passwords don't match \n";
        }
         // Close connection
         mysqli_close($conn);
         ?>
        
</body>

</html>