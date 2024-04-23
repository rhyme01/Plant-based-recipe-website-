<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subscription Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(./img/subscbg.jpg);
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;

        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 5px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #e23f29;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        .plan {
            display: flex;
        }

        .added-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>

<body>


    <form id="subscriptionForm" action="subsdb.php" method="POST" name="subscription">

        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
            required>
        <br>
        <div class="plan">

            <label for="Plan">
                <h2>Basic Plan</h2>
                <p>You can add your own Recipe</p>
                <p>Standard Definition</p>
                <p>$8.99/month</p>
            </label><br>
        </div>
        <button type="submit" name="submit" value="submit" id="addButton">Subscribe</button>
        
    </form>
</body>
<script>

    //function ValidateEmail(mail) {
    //    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(subscription.email.value)) {
      //      return (true)
     //   }
      //  document.getElementById("d").style.visibility = "visible";
//document.subscription.email.focus();
        
       // return (false)
  //  }
    

    // Check if the user is logged in
    


</script>

</html>
