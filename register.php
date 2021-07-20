<?php 

include "connect.php";
//this implies that the connection configuration is imported here

if (isset($_POST['submit'])){
  //isset-> if the submit button is run or is active, it does a post function

  $username= $_POST['username'];
  $email= $_POST['email'];
  $date=$_POST['date'];
  $postal=$_POST['postalcode'];
  $password= $_POST['password'];
  $rpassword=$_POST['rpassword'];
  $hash = md5($password);

// checking email existence
$sql = "SELECT * FROM credentials WHERE username='$username'" ;

     $result = mysqli_query($connection, $sql ) ;

     if( mysqli_num_rows( $result ) > 0 )
     {
$existserr = "There is already a user with that username!"  ;
     }
     else{
      if ( $password === $rpassword){
          //if there is a match in the password field,we should run a sql query to add them to the db
      
          $register_query = "INSERT INTO credentials (username, email,date,postalcode,password) VALUES ('$username', '$email', '$date','$postal', '$hash')";
      
          $addition= mysqli_query($connection,$register_query);
      
          if($addition){
           $success ="User registered!";
          }else{
           $regerr ="Data not entered correctly";
          }
      
      
        }else{
          $passworderr = "Password did not match!";
        }
      }
     
      
       
     }





?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="style.css">

    <title>Registration page</title>
</head>

<body>

    <div class="container">
      <?php
      // echo isset($passworderr);
      // echo isset($success);
      // echo isset($regerr);
      if(isset($passworderr)){
        echo $passworderr;
      }
      if(isset($existserr)){
        echo $existserr;
      }
      if(isset($success)){
        echo $success;
      }
      if(isset($regerr)){
        echo $regerr;
      }
      ?>
        <form action="regeee.php" method="POST" class="login-email">

            <p class="login-text" style="font-size: 2rem; font-weight:800;">Register Here</p>
            <div class="input-group">
                <!-- <label for="username">Username</label> -->
                <input type="text" placeholder="Username" name="username" required>
            </div>

            <div class="input-group">
                <!-- <label for="Email">Email</label> -->
                <input type="email" placeholder="Email" name="email" required>
            </div>
            <div class="input-group">
                <!-- <label for="date">Date</label> -->
                <input type="date" placeholder="Date of Birth" name="date" required>
            </div>
            <div class="input-group">
                <!-- <label for="postal">Postal</label> -->
                <input type="text" placeholder="PostCode" name="postalcode" required>
            </div>

            <!--            <br>-->
            <div class="input-group">
                <!-- <label for="password">Password</label> -->
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <!--           <br>-->
            <div class="input-group">
                <!-- <label for="password">Confirm Password</label> -->
                <input type="password" placeholder="Repeat Password" name="rpassword" required>
            </div>

           

            <div class="input-group">
                <button name="submit" type="submit"> Register</button>
            </div>
            <br>

            <div>
                <p class="login-register-text">Have an account? <a href="login.php"> Log in</a> here.</p>

            </div>


        </form>
    </div>

</body>

</html>