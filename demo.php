<?php
error_reporting(E_ALL);
if(session_status() === PHP_SESSION_NONE) {
    // If session is not active, start a new session
    session_start();
}
    if(isset($_POST['email'])) {
        $email = $_POST['email'];
    } 
 echo 'Welcome.....!!!!!!!!'.$email;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Recipes</title>
    <style>
              * {
            color:white;
            font-family: sans-serif;
            font-weight: 100px;
            font-weight: bold;
            background-image: url('img/demobg.jpeg');
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            opacity: 1;

        }

        body {
            
        }

        .p {


            padding: 0px;
            padding-left: 0px;
            padding-right: 9px;
            background-color:none;
            border-radius: 0px;
        }

        .name {}

        .inform {
            border-radius: 30px;
            box-shadow: 2px 11px 70px 20px rgb(221, 245, 202);
            border: solid rgb(251, 254, 246);
            padding: 60px;
            padding-top: 105px;
            padding-bottom: 110px;
            text-align: none;
        }


        .form {
            
            display: flex;
            justify-content: center;
        }

        .space {

            width: 100%;
            height: 10px;

            padding: 40px;
        }
        
    </style>
</head>

<body>

    <div class="space"></div>
    <div class="form">
        <div class="inform">
            <form id="recipeForm" action="jo.php" method="post" >
                <div class="em">
                    <label for="email">Enter your email</label><br>
                    <input type="text" name="cemail" id="cemail">
                    <span id="emailError" style="color: red;"></span>
                </div><br>
                
                <div class="name">
                    <label for="cname">Enter your name</label><br>
                    <input type="text" name="cname" id="cname">
                </div>
                <br>
                <div class="category">
                    <label for="category">Select category</label><br>
                    <select name="category" id="category">
                        <option value="lunch">Lunch</option>
                        <option value="breakfast">Breakfast</option>
                        <option value="dinner">Dinner</option>
                        <option value="brunch">Brunch</option>
                    </select>
                </div>
                <br>
                <div class="txtar">
                    <label for="txtar">Enter your recipe below</label>
                </div><br>
                <textarea name="comment" id="comment" rows="4" cols="50"></textarea>
                <span id="recipeError" style="color: red;"></span><br>
                <div class="submit">
                    <input type="submit" value="Submit">
                </div><br>
                <div class="submit">
                  <a href="logout.php"><input type="button" value="logout"></a>  
                </div>
            </form>
        </div>
    </div>

    

        
    

</body>
</html>


