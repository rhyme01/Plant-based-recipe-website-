<?php
session_start();
//include("index.html");
// subscription_form.php
$error=0;
require "connection.php";

if(isset($_POST['comment'])) {
    $comment = $_POST['comment'];}

// Process form data


    // Insert data into the database
    $insertQuery = "INSERT INTO feedback (comment) VALUES ('$comment')";
    

    if ($conn->query($insertQuery) === TRUE) {
        echo '<script>alert("Thank You for feedback")</script>'; 
        include("index.html");
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }



// Close the database connection

$conn->close();

?>
