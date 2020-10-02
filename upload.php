<?php

   if(isset($_FILES['fileToUpload'])){

      $errors= null;
      $file_name = $_FILES['fileToUpload']['name'];
      $file_size =$_FILES['fileToUpload']['size'];
      $file_tmp =$_FILES['fileToUpload']['tmp_name'];
      $file_type=$_FILES['fileToUpload']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['fileToUpload']['name'])));
      $fileToUpload=$username.".".$file_ext;
      
      $extensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$extensions)=== false){
         $error="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      
      if(empty($errors)==true){
        try{
            move_uploaded_file($file_tmp,"image/dp/".$fileToUpload);
            echo "Success";
        }catch(Exception $e){
            echo "$e";
        }

      }else{
        header("location:signup.php?error=$error");     
     }
   }
   else{
       header("location:signup.php?error=no image");
   }
?>