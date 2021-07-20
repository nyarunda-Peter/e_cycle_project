<?php 
 $attempt=0;
include "connect.php";
//this implies that the connection configuration is imported here

//check if the locked session has been created
if(isset($_SESSION["locked"])){
  $difference=time()-$_SESSION["locked"];
  if($difference>10){
    unset($_SESSION["locked"]);
  }
}

if (isset($_POST['submit'])){
  //isset-> if the submit button is run or is active, it does a post function
  $username= $_POST['username'];
  $password= $_POST['password'];
  $attempt=$_POST['hidden'];
  $hash = md5($password);
 

  if($attempt<4){
// checking email existence
$sql = "SELECT * FROM credentials WHERE username='$username'" ;

     $result = mysqli_query($connection, $sql ) ;

     if( mysqli_num_rows( $result ) == 0 )
     {
$notregistered=  "This username is not registered";
     }
     else{
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            // echo "ID :{$row['id']}  <br> ".
            //    " Username: {$row['username']} <br> ".
            //    " Email: {$row['email']} <br> ".
            //    "--------------------------------<br>";
               $dbpass=$row['password'];
            //    echo $dbpass;
               if(md5($password)==$dbpass){
$success='You are logged in';
header("location:index.php");
            }else{
              $attempt++;
                  $autherror= "wrong password";
                  echo '<script type="text/javascript"> alert("error and try again. the no. of attempts is '.$attempt.'") </script>';
               }
            }
          
    //   if (  mysqli_num_rows( $result ) > 0 ){
    //       //if there is a match in the password field,we should run a sql query to add them to the db
      
    //       $register_query = "INSERT INTO credentials (username, email, password) VALUES ('$username', '$email', '$hash')";
      
    //       $addition= mysqli_query($connection,$register_query);
      
    //       if($addition){
    //        $success ="User registered!";
    //       }else{
    //        $regerr ="Data not entered correctly";
    //       }
      
      
    //     }else{
    //       $passworderr = "Password did not match!";
    //     }
    //   }
     
      
       
     }
  }
  if($attempt==4){
    
        $_SESSION["locked"]=time();
        $wait="  Please wait for 10 minutes";
        

  }

    
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="style.css" />

    <title>Login page</title>
</head>

<body>
    <div class="container">
    <?php
      // echo isset($passworderr);
      // echo isset($success);
      // echo isset($regerr);
      if(isset($notregistered)){
        echo $notregistered;
      }
      if(isset($existserr)){
        echo $existserr;
      }
      if(isset($success)){
        echo $success;
      }
      if(isset($autherror)){
        echo $autherror;
      }
      if(isset($wait)){
        echo $wait;
      }
      ?>
        <form action="login.php" method="POST" class="login-email">

        <?php
        echo"<input type='hidden' name='hidden' value='".$attempt."'>";
        

        ?>
        
            <p class="login-text" style="font-size: 2rem; font-weight: 800">
                Log in with email and password
            </p>

            <div class="input-group">
                <!-- <label for="username">Username</label> -->
                <input type="text" placeholder="Username" name="username" <?php if($attempt==4){ ?> disabled="disabled"<?php }?> required>
            </div>

            <!--            <br>-->
            <div class="input-group">
                <!-- <label for="password">Password</label> -->
                <input type="password" placeholder="Password" name="password" required />
            </div>
            <!--           <br>-->

            <div class="input-group">
                <button type="submit" name="submit" <?php if($attempt==4){ ?> disabled="disabled"<?php }?>>Login</button>
            </div>
            <!--           <br>-->

            <div>
                <p class="login-register-text">
                    No account? <a href="register.php"> Click here </a> to register
                </p>
            </div>
        </form>
    </div>
</body>

</html>