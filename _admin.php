<?php
    if( isset($_REQUEST['decision'])){
        $decision=$_REQUEST['decision'];
        $username=$_REQUEST['username'];
        $fullName=$_REQUEST['fullName'];
        $password=$_REQUEST['password'];
        $email=$_REQUEST['email'];
        $role=$_REQUEST['role'];
        $profilePicture=$_REQUEST['profilePicture'];

        include "config.php";

        if($_REQUEST['decision']==1){      
                
                $sqlUser_set="INSERT INTO user VALUES ('','$username','$password','$role')";
                $conn->query($sqlUser_set);

                $sqlUser_get="SELECT id FROM user WHERE username=:un AND password=:pass";
                $stmtUser_get=$conn->prepare($sqlUser_get);
                $stmtUser_get->bindParam(':un',$username);
                $stmtUser_get->bindParam(':pass',$password);
                $stmtUser_get->execute();
                $result=$stmtUser_get->fetchAll();
                $id=$result[0]['id'];

                switch($role){
                    case 'Administrator':
                        $sqlAdministrator_set="INSERT INTO administrator VALUES ('$id','$fullName','$email','$profilePicture')";
                        $conn->query($sqlAdministrator_set);
                        break;
                    case 'Seller':
                        $sqlSeller_set="INSERT INTO seller VALUES ('$id','$fullName','$email','$profilePicture')";
                        $conn->query($sqlSeller_set);
                        break;
                    default:
                        echo "<h1>ERROR 404</h1>";
                    break;
                }
                
            }
            $sqlRequest_delete="DELETE FROM request WHERE username='$username'";
            $conn->query($sqlRequest_delete);
            header("location:admin.php");
        }

?>