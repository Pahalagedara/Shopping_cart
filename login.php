<?php 

        ?>
<html>
    <head>
        <title>Log in</title>
        <link rel = "icon" href ="image/logo.png" type = "image/x-icon"> 
        <link rel="stylesheet" type="text/css" href="styleSheet.css">
        <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">

    </head>
    <body>
        <div id="error"></div>
        <div class="nav">
            <div class="logo">
                <a href="index.php"><img  src="image/logo.png" style="height: 60px; width:250px; margin-left:5px"></a>
            </div>
            <ul>
                <li><a href="signup.php">Signup</a></li>
                <li style="text-decoration:underline;"><a href="login.php">Login</a></li>
            </ul>
        </div>
        <div class="inMiddle">
            <h3>Wellcome!</h3>
            <form class="login" action="_login.php" method="post">
                <div class="row">
                    <div class="col-25">
                        <label >Username</label>
                    </div>
                    <div class="col-75">
                        <input name="username" placeholder="Username" type="text" required>
                    </div><br>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label >password</label>
                    </div>
                    <div class="col-75">
                        <input name="password" placeholder="password" type="password" required>
                    </div>
                </div><br>
                <?php
                    if(isset($_REQUEST["error"]) ){
                        $error=$_REQUEST["error"];
                    
                    echo "<p style='color:red; margin-left:30%; '>$error</p>";
                }
                ?>
                <input type="submit" name="signin" value="SIGN IN">
            </form>
            <div class="row">
                <hr/>New member?<a href="signup.php">Register here.</a><hr/>
            </div>

        </div>
    </body>
</html>