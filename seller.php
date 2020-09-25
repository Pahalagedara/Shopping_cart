<?php 
   $x='thilina pahalagedara';
   ?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="styleSheet.css">
        <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    </head>
    <body>
        <div class="nav">
            <div class="logo">
                <img src="image/logo.jpg" style="height: 50px; width:60px; margin-left:5px">
                <h1 style="margin-left: 10px;">GaNtA</h1>
            </div>
            <ul>
                <li><a href="#">Signin</a></li>
                <li><?php echo $x; ?></li>
            </ul>
        </div>
    </body>
</html>