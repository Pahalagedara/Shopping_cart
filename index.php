<?php
// Start Session
session_start();

// check user login
if(empty($_SESSION['user_id']))
{
    // header("Location: index.php");
}
?>

<html>
    <head>
        <title>Home</title>
        <link rel = "icon" href ="image/logo.png" type = "image/x-icon"> 
        <link rel="stylesheet" type="text/css" href="styleSheet.css">
        <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    </head>
    <body>
        <div class="nav">
            <div class="logo">
                <a href="index.php"><img  src="image/logo.png" style="height: 60px; width:250px; margin-left:5px"></a>
            </div>
            <ul>
                <li><a href="signup.php">Signup</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
        <div class="top">
            <form class="search" action="_index.php" method="post">
                 <input type="text" placeholder="Search..." name="Search">
                 <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="item">

        </div>
    </body>

</html>