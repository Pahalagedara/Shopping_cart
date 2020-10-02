
<html>
    <head>
        <title>Home</title>
        <link rel = "icon" href ="image/logo.png" type = "image/x-icon"> 
        <link rel="stylesheet" type="text/css" href="styleSheet.css">
        <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
    </head>
    <body>
        <?php
            // Start Session
            session_start();

            // check user login
            if(isset($_SESSION['user_id']))
            {
                
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

                echo '<div class="nav">';
                echo '<div class="logo">';
                echo '    <a href="index.php"><img  src="image/logo.png" style="height: 60px; width:250px; margin-left:5px"></a>';
                echo '</div>';
                echo '<ul>';
                echo '    <li><img src="'.$user_dp.'" style="height: 50px; width:50px;  border-radius: 50%;"></li>';
                echo '    <li><a href="buyer.php">'.$user_name.'</a></li>';
                echo '    <li><a href="_logout.php">Logout</a></li>';
                echo '</ul>';
                
            }else{
               
                echo '<div class="nav">';
                echo '<div class="logo">';
                echo '    <a href="index.php"><img  src="image/logo.png" style="height: 60px; width:250px; margin-left:5px"></a>';
                echo '</div>';
                echo '<ul>';
                echo '    <li><a href="signup.php">Signup</a></li>';
                echo '    <li><a href="login.php">Login</a></li>';
                echo '</ul>';
                
            }
            ?>

        </div>
        <div class="top">
            <form class="search" action="_index.php" method="post">
                 <input type="text" placeholder="Search..." name="Search">
                 <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
        <div class="item">
        <?php
                        include "config.php";
                        $sql="SELECT * FROM item";
                        $stmt=$conn->prepare($sql);
                        $stmt->execute();
                        $result=$stmt->fetchAll();
                        $count=$stmt->rowCount();

                        if($count>0){
                            foreach($result as $row){
                                $quantity=$row['quantity'];
                                $itemId=$row['itemId'];
                                $sellerId=$row['sellerId'];
                                $itemName=$row['itemName'];

                                $sqlItemimage_get="SELECT * FROM itemimage";
                                $stmtItemimage_get=$conn->prepare($sqlItemimage_get);
                                $stmtItemimage_get->execute();
                                $resultItemimage_get=$stmtItemimage_get->fetchAll();
                                $image;
                              
                               
                                 
                                echo '<div class="item">';
                                    
                                        foreach($resultItemimage_get as $row){
                                            $image=$row['image'];
                                            echo'<img src ="'. $image.'" style=" height:300px; width:300px;">';
                                        }
                                        
                                        
                                    echo '<ul>
                                            <li>
                                                <div class="description">quantity</div>
                                                <div class="value"> '.$quantity.' </div>
                                            </li>
                                            <li>
                                                <div class="description">itemName</div>
                                                <div class="value"> '.$itemName.' </div>
                                            </li>
                                            <li>
                                                <div class="description">sellerId</div>
                                                <div class="value"> '.$sellerId.' </div>
                                            </li>
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
    </body>

</html>