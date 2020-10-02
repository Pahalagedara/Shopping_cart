<?php
    if(isset($_REQUEST['error'])){
        $error=$_REQUEST['error'];
        echo "$error";

    }

?>
<html>
    <head>
        <title>signUp</title>
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
                <li style="text-decoration:underline;"><a href="signup.php">Signup</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
       <div class="upMiddle">
            <h3>Create your account</h3>
            <form class="signup" action="_signup.php"  method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-25">
                    <label for="fullName">Full Name</label>
                </div>
                <div class="col-75">
                    <input name="fullName" id="fullName" placeholder="Enter full name" type="text" required><br>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="username">Username</label>
                </div>
                <div class="col-75">
                    <input name="username" id="username" placeholder="username" type="text" required><br>
                </div>
            </div>
            
            <div class="row">
                <div class="col-25">
                    <label for="password">Password</label>
                </div>
                <div class="col-75">
                    <input name="password" id="password" placeholder="password" type="password" required><br>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="repassword">Re-enter password</label>
                </div>
                <div class="col-75">
                    <input name="repassword" id="repassword" placeholder="passwrod" type="password" required><br>              
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="role">Register as a</label>
                </div>
                <div class="col-75">
                    <select name="role" id="role">
                        <option value="Buyer">Buyer</option>
                        <option value="Seller">Seller</option>
                        <option value="Administrator">Admin</option>
                    </select><br> 
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="email">Email</label>
                </div>
                <div class="col-75">
                    <input name="email" id="email" placeholder="Enter your email" type="email" required><br>
                </div>
            </div>
            
            <input  name="fileToUpload"  type="file" required/>
            <br>           
            <input name="btnSignUP" value="SIGN UP" type="submit">
           
        </div>
        <div style="display: flex;margin-top:10px;">
            <hr/>Already a member?<a href="login.php">Log in</a><hr/>
        </div>
    </body>
</html>
