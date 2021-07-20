<?php

$host= "localhost";
$user="root";
$password="";
$database="regeee";

$connection= mysqli_connect($host, $user, $password, $database);
//this returns a boolean value, so if the value is false, it should die

if(!$connection){
    // echo "<script>alert("Connection failed.")</script>";

    die("Connection failed");
}


//we need to create a database that shall store the values we are entering

//$createDb = "CREATE DATABASE registrations";
//
//if(mysqli_query($connection,$createDb)){
//    echo ("Database successfully created");
//}else{
//    echo ("Problem with creation of the database".mysqli_error($connectionVariable));
//}

//$createTable = "CREATE TABLE users(id int PRIMARY KEY auto_increment , username varchar(20)NOT NULL , email varchar(20) NOT NULL , password varchar(20) NOT NULL)";
//
//if(mysqli_query($connectionVariable, $createTable)){
//    echo ("Users table created successfully");
//}else{
//    echo ("Table creation failed". mysqli_error($connectionVariable));
//}

//used for input sanitization ie prevent sql injections
// $formInputname = mysqli_escape_string($connection,$_POST['username']);
// $formInputMail = mysqli_escape_string($connection,$_POST['email']);

// //password hashing -> for encrypting password
// $formInputPass = mysqli_escape_string($connection,password_hash($_POST['password'],PASSWORD_BCRYPT));
//password_hash($_POST['password'], PASSWORD_BCRYPT)


?>