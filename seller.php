<?php
 session_start();
 if(isset($_SESSION['user_id'])){
    $user_id=($_SESSION['user_id']);
     include "config.php";
     try{
        $sql="SELECT * FROM seller WHERE id='$user_id'";
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
        <title>seller</title>
        <link rel = "icon" href ="image/logo.png" type = "image/x-icon"> 
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

        <div class="upMiddle">
            <h3>Add item</h3>
            <form class="addItem" action="_seller.php"  method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-25">
                            <label for="itemName">Item Name</label>
                        </div>
                        <div class="col-75">
                            <input name="itemName" id="itemName" placeholder="Enter item name" type="text" required><br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-25">
                            <label for="fileToUpload">Images</label>
                        </div>
                        <div class="imageAline">
                            <input  name="fileToUpload0"  type="file" required/>
                            <input  name="fileToUpload1"  type="file" required/>
                            <input  name="fileToUpload2"  type="file" required/>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-25">
                            <label for="keywords">Keywords</label>
                        </div>
                        <div class="col-75">
                            <input name="keywords" id="keywords" placeholder="Enter keywords related this item" type="text" required><br>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-25">
                            <label for="quantity">Quantity</label>
                        </div>
                        <div class="col-75">
                            <input name="quantity" id="quantity" placeholder="Quantity of items" type="number" required><br>
                        </div>
                    </div>
                    
                    <br>           
                    <input name="btnAddItem" value="Add" type="submit" style="background-color: rgba(50, 50, 100, 0.5); height:30px; width:60px; " hover="background-color: rgba(50, 50, 100, 1);">
                    <?php
                        if(isset($_REQUEST["error"]) ){
                            $error=$_REQUEST["error"];
                            echo "<p style='color:red; margin-left:30%; '>$error</p>";
                        }
                        if(isset($_REQUEST["message"]) ){
                            $message=$_REQUEST['message'];
                            echo "<p style='color:green; margin-left:30%; '>$message</p>";
                        }

                    ?>
                    <br>
            </form>
           
        </div>

       


    </body>
</html>