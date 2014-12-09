<?php 
 $connection = mysqli_connect("localhost", "root", "", "web_uas");
  if(mysqli_connect_errno()){
   die("Database connection failed: " . 
   mysqli_connect_error() . 
   " (".mysqli_connect_errno(). ") "
   );
  };
?>
