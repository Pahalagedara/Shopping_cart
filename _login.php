<?php
    include "config.php";
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        // username and password sent from form 
        
        $myusername =$_POST['username'];
        $mypassword =$_POST['password']; 
        
        $sql = "SELECT * FROM user WHERE username=:un AND password=:pw";
        $stmt=$conn->prepare($sql);
        $stmt->bindParam(':un',$myusername);
        $passwordMd5=md5($mypassword);
        $stmt->bindParam(':pw',$passwordMd5);
        $stmt->execute();

        $count=$stmt->rowCount();
        $result=$stmt->fetchAll();
        $user_id=$result[0]['id'];
        $user_role=$result[0]['role'];
        
        // If result matched $myusername and $mypassword, table row must be 1 row
          
        if($count == 1) {
           //session_register("myusername");
           $_SESSION['user_id'] =$user_id;
           switch($user_role)
           {
                case 'Administrator':
                    header("location:admin.php");
                    break;
                case 'Seller':
                    header("location:seller.php");
                    break;
                case 'Buyer':
                    header("location:buyer.php");
                    break;
                default:
                    echo "<h1>ERROR 404</h1>";
                break;

           }
           
        }else {
           $error = "Your Login Name or Password is invalid";
           header("location:login.php?error=$error");

        }
    }
?>