<?php
session_start();
$error=0;
// subscription_form.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data
if(isset($_REQUEST['submit'])) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    if(empty($email)){
        echo "enter valid email";
        $error=1;
    }
    else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        include("subscription.php");
        echo '<script>alert("enter valid email");</script>';
        $error=1;
        
    }
    if($error==0){
        
        $_SESSION['email']=$email;

        // Check if the email already exists in the database
        $checkQuery = "SELECT * FROM subscription WHERE email = '$email'";
        $checkResult = $conn->query($checkQuery);
        $secure_pass = password_hash($password, PASSWORD_BCRYPT);
        
        
        if ($checkResult->num_rows > 0) {
            // Handle duplicate entry error
            include("subscription.php");
            echo '<script>alert("Data Already Exist....Please try with an another email id")</script>'; 
        } else {
            // Insert data into the database
            include("demo.php");
            $insertQuery = "INSERT INTO subscription (email,s_password,membership) VALUES ('$email', '$secure_pass','Membership paid')";
            
        
            if ($conn->query($insertQuery) === TRUE) {
                
            } else {
                // Error in insertion
                echo "Error: " . $insertQuery . "<br>" . $conn->error;
            }
        }
    }else{
       
        
            
        }

        }
// Close the database connection
$conn->close();
?>