<?php
include 'sidebar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="website icon" type="image/png" href="Img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Montserrat Alternates', sans-serif;
        }
        body {
            background: linear-gradient(to right, #dce2ed, #b4c5ff);
            justify-content: center;
            box-sizing: border-box;
            height: 100vh;
        }
        h1{
            text-align: center;
            margin: 30px 40px;
        }
        .container {
            position: absolute;
            border-radius: 40px;
            top: 130px;
            left: 500px;
            align-self: center;
            background-color: #fff;
            width: 500px;
            max-width: 100%;
            min-height: 580px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
        }
        form {
            position: absolute;
            width: 100%;
            height: 100%;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 40px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        label{
            color: #604caf;
            font-size: 18px;
            padding: 10px;
        }
        input{
            position: relative;
            display: block;
            background-color: #ffffff;
            color: #131313;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);
        }
        .login{
            font-weight: bold;
            font-size: 15px;
            z-index: 9999;
        }
        button.login {
            float: right;
            background: #ffffff;
            padding: 10px 30px;
            color: #000000;
            border-radius: 10px;
            margin-right: 10px;
        }
        button.login:hover {
            transform: scale(1.1);
            filter: drop-shadow(0px 3px 5px #2c2b2b);
        }
        button.login.container {
            animation: glowing 1s infinite;
        }

    </style>
    <title>Admin Login</title>
</head>

<body>
<div class="container">
    <form action="Authenticator.php" method="POST" id="loginForm">
        <h1>Enter Admin Credentials</h1>
        <label>Username</label>
        <input type="text" name="username" class="form-control" placeholder="Username" required><br>
        <label>Password</label>
        <input type="text" name="password" class="form-control" placeholder="Password" required><br>
        <button type="submit" class="login" id="login" value="login">Login</button>
    </form>
</div>

</body>

<script>
    document.getElementById("loginForm").addEventListener("submit", function(event) {
        // Get username and password from form.
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;

        // Check if username or password is empty.
        if (username === "" || password === "") {
            // Display error message.
            alert("Error: Please fill out all inputs.");

            // Prevent form from submitting.
            event.preventDefault();
        }
    });
</script>


</html>