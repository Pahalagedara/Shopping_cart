<?php
 session_start();
 if(isset($_SESSION['user_id'])){
    $user_id=($_SESSION['user_id']);
     include"config.php";
     try{
        $sql="SELECT * FROM administrator WHERE id='$user_id'";
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
                <div class="logo"><a href="#"><img  src="image/logo.png" style="height: 60px; width:250px; margin-left:5px"></a>
            </div>
            <ul>
                <li><img src="<?php echo"$user_dp" ?>" style="height: 50px; width:50px;  border-radius: 50%;"></li>
                <li><a href="admin.php"><?php echo"$user_name" ?></a></li>
                <li><a href="_logout.php">Logout</a></li>
            </ul>
        </div>
            <div class="operation">
                <div class="pending">
                    <?php
                        include "config.php";
                        $sql="SELECT * FROM request";
                        $stmt=$conn->prepare($sql);
                        $stmt->execute();
                        $result=$stmt->fetchAll();
                        $count=$stmt->rowCount();

                        if($count>0){
                            foreach($result as $row){
                                $username=$row['username'];
                                $fullName=$row['fullName'];
                                $password=$row['password'];
                                $email=$row['email'];
                                $role=$row['role'];
                                $profilePicture=$row['profilePicture'];

                                echo ' 
                                    <div class="item">
                                        <img src ="'.$profilePicture.'" style=" height:300px; width:300px;">
                                        <ul>
                                            <li>
                                                <div class="description">Full name </div>
                                                <div class="value"> '.$fullName.' </div>
                                            </li>
                                            <li>
                                                <div class="description">Username </div>
                                                <div class="value"> '.$username.' </div>
                                            </li>
                                            <li>
                                                <div class="description">Email </div>
                                                <div class="value"> '.$email.' </div>
                                            </li>
                                            <li>
                                                <div class="description">Role </div>
                                                <div class="value"> '.$role.' </div>
                                            </li>
                                            <br>
                                            <li><a class="approvals_button" style="background-color:rgba(19, 116, 7, 1);" href="_admin.php?decision=1&username='.$username.'&fullName='.$fullName.'&password='.$password.'&email='.$email.'&role='.$role.'&profilePicture='.$profilePicture.'">Accept</a></li>
                                            <li><a class="approvals_button" style="background-color:rgba(161, 7, 7, 1);" href="_admin.php?decision=0&username='.$username.'&fullName='.$fullName.'&password='.$password.'&email='.$email.'&role='.$role.'&profilePicture='.$profilePicture.'">Eject</a></li>
                                        </ul>
                                    </div>
                                
                                
                                
                                ';

                                echo"<br>";
                                echo"<br><br>";
                             }
                            }
                            else{
                                echo'
                                <div class="box">
                                    <p>no any pending</p>
                                </div>';
                            }
                    ?>
                </div>
            </div>
        <div class="deleting">

        </div>
       


    </body>
</html>