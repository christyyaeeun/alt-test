<?php
include('connect.php')
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Log In to Altitude!</title>
    <meta name="viewport" content="width=devide-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="login-style.css.php" />
</head>
<div class="d-flex flex-column text-center justify-content-center" style="
    margin-top: 4em; 
    max-width:450px;  
    background-color: lightslategray;">
    <body>
        <div class="d-flex flex-column text-center justify-content-center shadow-lg" style="
    margin: .5em; 
    padding:2em 3em 2em 3em;">

            <h3 class="container text-center" style="
            font-size: x-large;
            padding: .5em 0em 1em 0em;
            color: #7386d5;
            border-radius: 15px;
            word-spacing: 0.1em;
          ">Welcome Back!</h3>
            <form action="login.php" method="post">
                <input type="text" placeholder="Enter Username" name="username" class="form-control" />
                <input type="password" placeholder="Enter Password" name="password" class="form-control" />
                <div container="submit" id="sub-but" style="margin-left:2em; margin-right:2em;">
                    <button type="submit" class="btn btn-success form-control" name="user_login" ;>Login</button>
                </div>
                <p class="text-center" style="font-size:small;">
                    Don't have an account? <br />
                    <a href="./register.php" style="color: #7386d5;">Sign up </a>
                </p>
            </form>
        </div>
    </body>
</html>