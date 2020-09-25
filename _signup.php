<?php
    include "config.php";
    $fullName=$_REQUEST['fullName'];
    $username=$_REQUEST['username'];
    $password=md5($_REQUEST['password']);
    $role=$_REQUEST['role'];
    $email=$_REQUEST['email'];
    $fileToUpload=$_REQUEST['fileToUpload'];
    
    $sqlUser_set="INSERT INTO user VALUES ('','$username','$password','$role')";
    try{
        $conn->query($sqlUser_set);
        if($role=='Buyer'){
            $sqlUser_get="SELECT id FROM user WHERE username=:un AND password=:pass";
            $stmtUser_get=$conn->prepare($sqlUser_get);
            $stmtUser_get->bindParam(':un',$username);
            $stmtUser_get->bindParam(':pass',$password);
            $stmtUser_get->execute();
            $result=$stmtUser_get->fetchAll();
            $id=$result[0]['id'];

            $sqlBuyer_set="INSERT INTO buyer VALUES ('$id','$fullName','$email','image/dp/$fileToUpload')";
            $conn->query($sqlBuyer_set);
            header("location:login.php");
        }
        else{
            $sqlRequest_set="INSERT INTO request VALUES ('$username','$fullName','$password','$email','$role','image/dp/$fileToUpload')";
            $conn->query($sqlRequest_set);
            header("location:login.php?error=your request is sended,please login latter");
        }
        
    }catch(Exception $e){
        echo "New record created unsuccessfully";
        echo "Error: " . $sql . "<br>" . $conn->error;
        echo "$e";
    }
?>