<?php
   $DB_SERVER= 'localhost';
   $DB_USERNAME= 'root';
   $DB_PASSWORD='';
   $DB_DATABASE='shopping_cart';
   try{
    $conn = new PDO("mysql:host=$DB_SERVER;dbname=$DB_DATABASE",$DB_USERNAME,$DB_PASSWORD);
    echo "connected successfully";
    }
   catch(PDOException $e)
   {
       echo "connection failed:". $e->getMessage();
   }
   
?>