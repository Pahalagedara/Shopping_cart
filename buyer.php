<?php
 session_start();
 if(isset($_SESSION['user_id'])){
    $user_id=($_SESSION['user_id']);
     include "config.php";
     try{
        $sql="SELECT * FROM buyer WHERE id='$user_id'";
        $stmt=$conn->prepare($sql);
        $stmt->execute();
        $result=$stmt->fetchAll();
        $count=$stmt->rowCount();
        if($count==1){
            $user_name=$result[0]['fullName'];
            $user_dp=$result[0]['profilePicture'];
        }else{
            header("location:login.php?error=something wrong! try again!!!");
        }

     }catch(Exception $e){
         echo "$e";
         header("location:login.php?error=something wrong! try again!!!");
     }
 }
 else{
    header("location:login.php?error=something wrong! try again!!!");
 }
?>
<html>
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="styleSheet.css">
        <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    </head>
    <body>
        <div class="nav">
                <div class="logo"><a href="index.php"><img  src="image/logo.png" style="height: 60px; width:250px; margin-left:5px"></a>
            </div>
            <ul>
                <li><img src="<?php echo"$user_dp" ?>" style="height: 50px; width:50px;  border-radius: 50%;"></li>
                <li><a href="buyer.php"><?php echo"$user_name" ?></a></li>
                <li><a href="_logout.php">Logout</a></li>
            </ul>
        </div>

       


    </body>
</html>