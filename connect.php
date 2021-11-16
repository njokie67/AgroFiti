<?php
$host= "localhost";
$user="root";
$password="";
$database="agrofine";

$connection= mysqli_connect($host,$user,$password);
// if(!$connection){
//     die("Connection failed");
// }else{
//     echo "connection successful";
// }

// $sql="CREATE DATABASE IF NOT EXISTS agroFine";
// if(mysqli_query($connection,$sql)) {
//      $connection=mysqli_connect($host,$user,$password);

//      if (!mysqli_query($connection,$sql)) {
//       echo "error".mysqli_error($connection);
//       }else{
//       echo "success";
//       }
//      }
 $sql="CREATE TABLE products (id INT(11)NOT NULL AUTO_INCREMENT PRIMARY KEY,itemname VARCHAR(25) NOT NULL, iteminitial FLOAT, itemprice FLOAT,itemimg VARCHAR(100))";
if (mysqli_query($connection,$sql)) {
     $connection=mysqli_connect($host,$user,$password,$database);

    //if (!mysqli_query($connection,$sql)) {
//    echo "error".mysqli_error($connection);
//       }else{
//       echo "success";
//       }

}
?>
