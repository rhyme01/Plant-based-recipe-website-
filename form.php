<?php

session_start(); // Start the session

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
if(isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if the email already exists in the database
    $checkQuery = "SELECT * FROM login WHERE email = '$email'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        // Handle duplicate entry error
        echo '<script>alert("Data Already Exist")</script>'; 
    } else {
        // Insert data into the database with hashed password
        $insertQuery = "INSERT INTO login (PASSWORD, Email) VALUES ('$hashedPassword', '$email')";

        if ($conn->query($insertQuery) === TRUE) {
            echo '<script>alert("Successfully Login")</script>'; 
            header("Location: form.php");
            exit(); // Add exit to prevent further execution
        } else {
            echo "Error: " . $insertQuery . "<br>" . $conn->error;
        }
    }
}

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta name="theme-colour" content="#9d4edd">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/form.css">



    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Mini-Project</title>
</head>

<body onload="bodyload()">




    <div class="container">



        <p id="lt" class="tabs" onclick="loginTabFun()">Log In</p>
        <p id="rt" class="tabs" onclick="regTabFun()">Sign Up</p>

        <div class="clear"></div>

        <div class="box">
            <div id="login" class="subbox">

                <h3>Log In <i class='bx bx-log-in-circle'></i></h3>
                
                    <input id="se" type="email" name="email" placeholder="Email" />

                    <input id="sp" type="password" name="password" placeholder="Password" />

                    <div class="form-element">
                        <input type="checkbox" onclick="showPass()">
                        <label>Show Password</label>
                    </div>

                    <input type="submit" onclick="login()" value="Submit" />
                
                <div class="para">
                    <p>Don't have an account? <span onclick="regTabFun()"><strong>Sign up</strong></span><i
                            class='bx bxl-telegram'></i></p>
                </div>
            </div>


            <div id="register" class="subbox">

                <h3>Sign Up <i class='bx bx-log-out-circle'></i></h3>

                <form action="form.php" method="post">
                    <input id="re" type="email" name="email" placeholder="Email" />

                    <div class="tooltip">
                        <i class="bi bi-info-circle-fill"></i>
                        <span class="tooltiptext">
                            <ul>
                                <li>Must be at least 4 to 15 <br>char long.</li>
                                <li>Must contain a digits or Special Char</li>
                                <li>Must contain a lowercase letter.</li>
                                <li>Must contain an uppercase letter.</li>
                            </ul>
                        </span>
                    </div>


                    <input id="rp" type="password" name="password" placeholder="Password" />
                    <input id="rrp" type="password" value="" placeholder="Re write Password" />
                    <input type="submit" onclick="register()" value="Submit" />
                </form>
                
            </div>

        </div>

    </div>


</body>
<script src="js/main.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</html>