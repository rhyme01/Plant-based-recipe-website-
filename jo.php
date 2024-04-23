<?php

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

try {
    if(isset($_POST['cemail'], $_POST['cname'], $_POST['category'], $_POST['comment'])) {

    // If set, assign its value to another variable
    $email = $_POST['cemail'];
        // If set, assign its value to another variable
    $name = $_POST['cname'];
    // If set, assign its value to another variable
    $category = $_POST['category'];
    // If set, assign its value to another variable
    $comment = $_POST['comment'];

            $insertQuery = "INSERT INTO recipes (email,r_name,category,r_recipe) VALUES ('$email', '$name','$category','$comment')";
            if ($conn->query($insertQuery) === TRUE) {
                echo'';
            } else {
                // Error in insertion
                echo "Error: " . $insertQuery . "<br>" . $conn->error;
            }
            
}
else{throw new Exception("Direct Access.");}}
catch (Exception $e) {
    echo $e->getMessage();
    // Handle the exception as needed
} finally {
    $sql = "SELECT * FROM recipes";
            $result = $conn->query($sql); 
    echo "Welcome!!!!!";
}
  ?>
  
  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table</title>
    <style>
        *{
            background-image: url('img/userrecipebg.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid green;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .alert {
  padding: 20px;
  background-color:green;
  color: red;
}

.closebtn {
  margin-left: 15px;
  color: red;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  
}

.closebtn:hover {
  color: black;
}
    </style>
</head>
<body>
<div class="alert">
<span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
<strong>SUCCESSFULLY SUBMITTED!</strong> Thank You For Your Recipe!!!!!.
</div>
    <h2>User Recipe Table</h2>
    <table>
        <tr>
            <th>Email</th>
            <th>Name</th>
            <th>Category</th>
            <th>Recipe</th>
            <!-- Add more headers as needed -->
        </tr>

        <?php


        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row["email"]."</td>";
            echo "<td>".$row["r_name"]."</td>";
            echo "<td>".$row["category"]."</td>";
            echo "<td>".$row["r_recipe"]."</td>";
            // Add more cells as needed
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>

