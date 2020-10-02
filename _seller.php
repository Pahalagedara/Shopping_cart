<?php
    session_start();
    if(isset($_SESSION['user_id'])&&isset($_REQUEST['itemName'])){
        $user_id=$_SESSION['user_id'];
        $NumberOfImage=3;
        
        $itemName=$_REQUEST['itemName'];;
        $keywords=$_REQUEST['keywords'];
        $quantity=$_REQUEST['quantity'];

        include "config.php";

        $sqlItem_set="INSERT INTO item VALUES('','$quantity','$user_id','$keywords','$itemName')";
        $conn->query($sqlItem_set);
        $itemId = $conn->lastInsertId();


        for($i=0;$i<3;$i++){//image upload
            if(isset($_FILES['fileToUpload'.$i.''])){
    
                $errors= null;
                $file_tmp =$_FILES['fileToUpload'.$i.'']['tmp_name'];
                $file_ext=strtolower(end(explode('.',$_FILES['fileToUpload'.$i.'']['name'])));
                $fileToUpload=$user_id.$i.''.".".$file_ext;
                
                $extensions= array("jpeg","jpg","png");
                
                if(in_array($file_ext,$extensions)=== false){
                $error="extension not allowed, please choose a JPEG or PNG file.";
                }
                
                
                if(empty($errors)==true){
                try{
                    move_uploaded_file($file_tmp,"image/item/".$fileToUpload);
                    $sqlItemImage_set="INSERT INTO itemimage VALUES('$itemId','image/item/$fileToUpload')";
                    $conn->query($sqlItemImage_set);

                }catch(Exception $e){
                    echo "$e";
                }

    
                }else{
                header("location:seller.php?error=$error");     
            }
            }
            else{
                header("location:seller.php?error=no image");
            }
        }


 
        
    }
    header("location:seller.php?message=Successful your adding");
?>